<?php
/**
 * Class for managing a user in this plan
 *
 * @package   cf-members
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 Josh Pollock
 */
class CF_Member {

	/**
	 * @var WP_User
	 */
	protected  $user;

	/**
	 * @var string
	 */
	protected $plan;

	/**
	 * @var array
	 */
	protected $members = [];

	/**
	 * Create object for a user + plan
	 *
	 * @since 0.1.0
	 *
	 * @param string $plan Slug of plan
	 * @param \WP_User $user User object
	 * @param bool $get_members Optional. Query for all members when instantiating class? Default is false.
	 */
	public function __construct( $plan, WP_User $user, $get_members = false ){
		$this->plan = $plan;
		$this->user = $user;
		$this->update_members_property();

	}

	/**
	 * Get all members with this plan
	 *
	 * @since 0.1.0
	 *
	 * @param bool|false $refresh Refresh from DB? Default is false.
	 *
	 * @return array
	 */
	public function get_members( $refresh = false ){
		if( $refresh ){
			$this->update_members_property();
		}

		return $this->members;
	}

	/**
	 * Get plan slug
	 *
	 * @since 0.1.0
	 *
	 * @return string
	 */
	public function get_plan(){
		return $this->plan;
	}

	/**
	 * Update the members property from the DB
	 *
	 * @since 0.1.0
	 */
	public function update_members_property(){
		$this->members = update_option( cf_members_plan_key( $this->plan ), [ ], false );
		if( ! is_array( $this->members ) ){
			$this->members = [];
		}
	}

	/**
	 * Does this user have this plan?
	 *
	 * @since 0.1.0
	 *
	 * @return bool
	 */
	public function has_plan(){
		return in_array( $this->user->ID, $this->members );
	}

	/**
	 * Add this user to the plan
	 *
	 * @since 0.1.0
	 */
	public function add(){
		$this->get_members( true );
		$this->write_user_meta();
		$this->add_to_list();

		/**
		 * Runs after a member is added to a plan
		 *
		 * @since 0.1.0
		 *
		 * @param int $user User ID
		 * @param string $plan_slug Plan slug
		 */
		do_action( 'cf_member_added', $this->user->ID, $this->plan );
	}

	/**
	 * Remove this user from the plan
	 *
	 * @since 0.1.0
	 */
	public function remove(){
		$this->get_members( true );
		$this->remove_from_list();
		$this->remove_meta();

		/**
		 * Runs after a member is removed from a plan
		 *
		 * @since 0.1.0
		 *
		 * @param int $user User ID
		 * @param string $plan_slug Plan slug
		 */
		do_action( 'cf_member_removed', $this->user->ID, $this->plan );
	}

	/**
	 * Write user meta for putting member in plan
	 *
	 * @since 0.1.0
	 */
	protected function write_user_meta(){
		update_user_meta( $this->user->ID, cf_members_plan_key( $this->plan ), true );
	}

	/**
	 * Add user to list of members of this plan
	 *
	 * @since 0.1.0
	 */
	protected function add_to_list(){
		if( $this->has_plan() ){
			$this->members[] = $this->user->ID;
			update_option( cf_members_plan_key( $this->plan ), $this->members, false );
		}
	}

	/**
	 * Remove this user for the list of users with this plan
	 *
	 * @since 0.1.0
	 */
	protected function remove_from_list() {
		if ( $this->has_plan() ) {
			unset( $this->members[ array_search( $this->user->ID, $this->members ) ] );
			update_option( cf_members_plan_key( $this->plan ), $this->members, false );
		}
	}

	/**
	 * Remove the meta key for this plan from this user
	 *
	 * @since 0.1.0
	 */
	protected function remove_meta() {
		delete_user_meta( $this->user->ID, cf_members_plan_key( $this->plan ) );
	}

	/**
	 * Save extra details/meta of this user's plan
	 *
	 * @since 0.1.0
	 *
	 * @param array $details
	 */
	public function add_details( array $details ){
		$details[ 'modified' ] = current_time( 'mysql' );
		update_user_meta(  $this->user->ID, $this->details_key(), $details );
	}

	/**
	 * Get extra details/meta of this user's plan
	 *
	 * @since 0.1.0
	 *
	 */
	public function get_details(){
		get_user_meta(  $this->user->ID, $this->details_key(), true );
	}

	/**
	 * Meta key for the details meta key
	 *
	 * @since 0.1.0
	 *
	 * @return string
	 */
	protected function details_key(){
		return 'details_' . cf_members_plan_key( $this->plan );
	}
}
