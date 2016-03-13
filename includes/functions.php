<?php
/**
 * Functions for Members for Caldera Forms
 *
 * @package   cf_members
 * @author    Josh Pollock for CalderaWP LLC (email : Josh@CalderaWP.com)
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock for CalderaWP LLC
 */


/**
 * Registers the Members for Caldera Forms Processor
 *
 * @uses "caldera_forms_get_form_processors" filter
 *
 * @since 0.1.0
 * @param array		$processors		Array of current registered processors
 *
 * @return array	Array of registered processors
 */
function cf_members_register($processors){
	if( ! class_exists( 'Caldera_Forms_Processor_Load') ){
		return $processors;
	}
	$processors['cf_members'] = array(
		"name"				=>	__( 'Members for Caldera Forms', 'cf-members'),
		"description"		=>	__( 'Simple membership plugin, powered by Caldera Forms', 'cf-members'),
		"icon"				=>	CF_MEMBERS_URL . "icon.png",
		"author"			=>	'Josh Pollock for CalderaWP LLC',
		"author_url"		=>	'https://CalderaWP.com',
		"pre_processor"		=>	'cf_members_pre_process',
		"post_processor" => 'cf_members_post_process',
		"template"			=>	CF_MEMBERS_PATH . "includes/config.php",

	);

	return $processors;

}

/**
 * Post process -- used to save details about plan creation
 *
 * @since 0.0.1
 *
 * @param array $config Processor config
 * @param array $form Form config
 * @param string $process_id Process ID
 */
function cf_members_post_process( $config, $form, $process_id ){
	$entry_id = Caldera_Forms::get_field_data( '_entry_id', $form );
	global $transdata;
	$values = $transdata[ $process_id ][ 'values' ];
	$member = cf_member_class( $values[ 'plan_slug' ], wp_get_current_user() );
	$details = [
		'entry_id' => $entry_id,
		'form_id' => $form[ 'ID' ],
		'created' => current_time( 'mysql' ),
		'process_id' => $process_id
	];

	/**
	 * Filter details to save for new plan
	 *
	 * @since 0.1.0
	 *
	 * @param array $details Details to save
	 */
	apply_filters( 'cf_members_create_details', $details );
	$member->add_details( $details );

}

/**
 * Pre-Process -- add member to plan
 *
 * @since 0.0.1
 *
 * @param array $config Processor config
 * @param array $form Form config
 * @param string $process_id Process ID
 *
 * @return array
 */
function cf_members_pre_process( $config, $form, $process_id ) {
	if( ! get_current_user_id() ) {
		return array(
			'type' => 'error',
			'note' => __( 'You must be logged in', 'cf-members' )
		);
	}
	$proccesor = new Caldera_Forms_Processor_Get_Data( $config, $form, cf_members_fields() );

	$values = $proccesor->get_values();
	global $transdata;
	$transdata[ $process_id ][ 'values' ] = $values;

	$member = cf_member_class( $values[ 'plan_slug' ], wp_get_current_user() );
	$member->add();

}

/**
 * Include classes
 *
 * @since 0.1.0
 */
function cf_members_include_classes(){
	if( ! did_action( 'cf_members_include_classes')) {
		include dirname( __FILE__ ) . '/class-cf-member.php';
		include dirname( __FILE__ ) . '/class-cf-members.php';

		/**
		 * Runs after classes are included
		 *
		 * @since 0.1.0
		 */
		do_action( 'cf_members_include_classes' );
	}

}

/**
 * @param $plan_slug
 * @param $user
 *
 * @return \CF_Member|void
 */
function cf_member_class( $plan_slug, $user ){
	cf_members_include_classes();
	if( is_numeric( $user ) ){
		$user = get_user_by( 'ID', $user );
	}

	if( is_a( $user, 'WP_User' ) ){
		$member = CF_Members::instance()->get_member( $plan_slug );
		if( ! $member ){
			$member = new CF_Member( $plan_slug, $user );
			CF_Members::instance()->add_member( $member );
		}

		return $member;
	}
}

/**
 * Get key for plan
 *
 * @since 0.0.1
 *
 * @param string $slug
 *
 * @return string
 */
function cf_members_plan_key( $slug ){
	return md5( 'cf_members_plan_' . $slug );
}

/**
 * Check if user has a plan
 *
 * @since 0.0.1
 *
 * @param string $slug Plan slug
 * @param bool|false $user_id Optional. User ID to check for. If false the current user ID will be used
 *
 * @return bool|mixed
 */
function cf_members_has_plan( $slug, $user_id = false ){
	$user_id = absint( $user_id );
	if( 0 < $user_id  ){
		$user_id = get_current_user_id();
	}

	if( 0 < $user_id ) {
		return get_user_meta( $user_id, cf_members_plan_key( $slug ), true );
	}

	return false;

}

/**
 * Shortcode for content restriction
 *
 * @since 0.0.1
 *
 * @param $atts
 * @param $content
 *
 * @return mixed|void
 */
function cf_members_plan_shortcode( $atts, $content = '' ) {
	$atts = shortcode_atts( array(
		'plan' => '',
		'user_id' => false,
		'sign_up' => false,
	), $atts, 'cf_members' );

	if( cf_members_has_plan( $atts[ 'plan' ], $atts[ 'user_id' ] ) ){
		return $content;
	}else{
		if( is_string( $atts[ 'sign_up' ] ) && is_array( $form = Caldera_Forms::get_form( $atts[ 'sign_up'] ) ) ){
			return $form;
		}
		return apply_filters( 'cf_members_content_restriction_message', $atts[ 'plan' ], $atts[ 'user_id' ] );
	}
}
add_shortcode( 'cf_members', 'cf_members_plan_shortcode' );


/**
 * The fields for this processor.
 *
 * @since 1.1.0
 *
 * @return array Array of fields
 */
function cf_members_fields() {
	return array(
		array(
			'id'   => 'plan_name',
			'label' => __( 'Plan Name', 'cf-members' ),
			'desc' => __( 'Human readable name of membership plan.', 'cf-members' ),
			'type' => 'text',
			'required' => true,
			'magic' => true,
		),
		array(
			'id'   => 'plan_slug',
			'label' => __( 'Plan Slug', 'cf-members' ),
			'desc' => __( 'Slug used to reference plan in .', 'cf-members' ),
			'type' => 'text',
			'required' => true,
			'magic' => true,
		),
	);
}

/**
 * Initializes the licensing system
 *
 * @uses "admin_init" action
 *
 * @since 0.1.0
 */
function cf_members_init_license(){

	$plugin = array(
		'name'		=>	'Members for Caldera Forms',
		'slug'		=>	'members-for-caldera-forms',
		'url'		=>	'https://calderawp.com/downlaods/members-for-caldera-forms',
		'version'	=>	CF_MEMBERS_VER,
		'key_store'	=>  'cf_members_license',
		'file'		=>  CF_MEMBERS_CORE,
	);

	new \calderawp\licensing_helper\licensing( $plugin );

}


/**
 * Add our example form
 *
 * @uses "caldera_forms_get_form_templates"
 *
 * @since 0.1.0
 *
 * @param array $forms Example forms.
 *
 * @return array
 */
function cf_members_example_form( $forms ) {
	$forms['cf_members']	= array(
		'name'	=>	__( 'Members for Caldera Forms Example', 'cf-members' ),
		'template'	=>	include CF_MEMBERS_PATH . 'includes/templates/example.php'
	);

	return $forms;

}

