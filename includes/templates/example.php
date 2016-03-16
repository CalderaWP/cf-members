<?php
/**
 * Basic example form for Members for Caldera Forms
 *
 * @package   cf_members
 * @author    Josh Pollock for CalderaWP LLC (email : Josh@CalderaWP.com)
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock for CalderaWP LLC
 */
return array(
	'_last_updated' => 'Wed, 16 Mar 2016 04:01:59 +0000',
	'ID' => 'simple-membership-form',
	'cf_version' => '1.3.4-b1',
	'name' => 'Simple Membership Form',
	'description' => '',
	'db_support' => 1,
	'pinned' => 0,
	'hide_form' => 1,
	'check_honey' => 1,
	'success' => 'Thanks for signing up!',
	'avatar_field' => '',
	'form_ajax' => 1,
	'custom_callback' => '',
	'layout_grid' =>
		array(
			'fields' =>
				array(
					'fld_6089614' => '1:1',
					'fld_2459621' => '1:2',
					'fld_1037626' => '2:1',
				),
			'structure' => '6:6|12',
		),
	'fields' =>
		array(
			'fld_6089614' =>
				array(
					'ID' => 'fld_6089614',
					'type' => 'text',
					'label' => 'Name',
					'slug' => 'name',
					'conditions' =>
						array(
							'type' => '',
						),
					'required' => 1,
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'placeholder' => '',
							'default' => '',
							'mask' => '',
							'type_override' => 'text',
						),
				),
			'fld_2459621' =>
				array(
					'ID' => 'fld_2459621',
					'type' => 'email',
					'label' => 'Email',
					'slug' => 'email',
					'conditions' =>
						array(
							'type' => '',
						),
					'required' => 1,
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'placeholder' => '',
							'default' => '',
						),
				),
			'fld_1037626' =>
				array(
					'ID' => 'fld_1037626',
					'type' => 'button',
					'label' => 'Join',
					'slug' => 'join',
					'conditions' =>
						array(
							'type' => '',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'type' => 'submit',
							'class' => 'btn btn-default',
							'target' => '',
						),
				),
		),
	'page_names' =>
		array(
			0 => 'Page 1',
		),
	'conditional_groups' =>
		array(
			'_open_condition' => '',
		),
	'processors' =>
		array(
			'fp_93501362' =>
				array(
					'ID' => 'fp_93501362',
					'runtimes' =>
						array(
							'insert' => 1,
						),
					'type' => 'cf_members',
					'config' =>
						array(
							'plan_name' => 'Wonderful',
							'plan_slug' => 'wonderful',
						),
					'conditions' =>
						array(
							'type' => '',
						),
				),
			'fp_5173045' =>
				array(
					'ID' => 'fp_5173045',
					'runtimes' =>
						array(
							'insert' => 1,
						),
					'type' => 'form_redirect',
					'config' =>
						array(
							'url' => '/members-area',
							'message' => 'Taking you to the members area!',
						),
					'conditions' =>
						array(
							'type' => '',
						),
				),
		),
	'settings' =>
		array(
			'responsive' =>
				array(
					'break_point' => 'sm',
				),
		),
	'mailer' =>
		array(
			'on_insert' => 1,
			'sender_name' => 'Wonderful Membership Site',
			'sender_email' => 'admin@wonderfulmembershipsite.com',
			'reply_to' => 'admin@wonderfulmembershipsite.com',
			'email_type' => 'html',
			'recipients' => '%email%',
			'bcc_to' => '',
			'email_subject' => 'Thanks for signing up!',
			'email_message' => 'Thanks for joining the Wonderful Membership Site(TM). You now have the Wonderful Plan!
',
		),
);
