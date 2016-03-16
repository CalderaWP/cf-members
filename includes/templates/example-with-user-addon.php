<?php
/**
 *  Example form for Members for Caldera Forms with user registration/login
 *
 * @package   cf_members
 * @author    Josh Pollock for CalderaWP LLC (email : Josh@CalderaWP.com)
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock for CalderaWP LLC
 */
return  array(
	'_last_updated' => 'Wed, 16 Mar 2016 04:21:11 +0000',
	'ID' => 'membership-with-user-registration',
	'cf_version' => '1.3.4-b1',
	'name' => 'Membership With User Registration',
	'description' => '',
	'db_support' => 1,
	'pinned' => 0,
	'hide_form' => 1,
	'check_honey' => 1,
	'success' => 'Form has been successfully submitted. Thank you.',
	'avatar_field' => '',
	'form_ajax' => 1,
	'custom_callback' => '',
	'form_visibility' => 'all',
	'layout_grid' =>
		array(
			'fields' =>
				array(
					'fld_1965359' => '1:1',
					'fld_6187209' => '1:2',
					'fld_7526903' => '1:2',
					'fld_3049119' => '2:1',
					'fld_1848465' => '2:1',
					'fld_8215325' => '2:2',
					'fld_6252294' => '2:2',
					'fld_7739430' => '3:1',
					'fld_8925727' => '3:2',
					'fld_9960615' => '3:2',
					'fld_4312526' => '3:2',
				),
			'structure' => '6:6|6:6|6:6',
		),
	'fields' =>
		array(
			'fld_1965359' =>
				array(
					'ID' => 'fld_1965359',
					'type' => 'email',
					'label' => 'Email Address',
					'slug' => 'email_address',
					'conditions' =>
						array(
							'type' => '',
						),
					'required' => 1,
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'placeholder' => '',
							'default' => '{user:user_email}',
						),
				),
			'fld_6187209' =>
				array(
					'ID' => 'fld_6187209',
					'type' => 'toggle_switch',
					'label' => 'Login Or Register?',
					'slug' => 'login_or_register',
					'conditions' =>
						array(
							'type' => '',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'orientation' => 'horizontal',
							'selected_class' => 'btn-success',
							'default_class' => 'btn-default',
							'auto_type' => '',
							'taxonomy' => 'category',
							'post_type' => 'post',
							'value_field' => 'name',
							'orderby_tax' => 'name',
							'orderby_post' => 'name',
							'order' => 'ASC',
							'default' => 'opt1314026',
							'option' =>
								array(
									'opt1314026' =>
										array(
											'value' => 'Login',
											'label' => 'Login',
										),
									'opt1519376' =>
										array(
											'value' => 'Register',
											'label' => 'Register',
										),
								),
						),
				),
			'fld_7526903' =>
				array(
					'ID' => 'fld_7526903',
					'type' => 'html',
					'label' => 'You are Logged In!',
					'slug' => 'you_are_logged_in',
					'conditions' =>
						array(
							'type' => '',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'user',
							'default' => '',
						),
				),
			'fld_3049119' =>
				array(
					'ID' => 'fld_3049119',
					'type' => 'text',
					'label' => 'First Name',
					'slug' => 'first_name',
					'conditions' =>
						array(
							'type' => 'con_fld_3049119',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'placeholder' => '',
							'default' => '',
							'mask' => '',
							'type_override' => 'text',
						),
				),
			'fld_1848465' =>
				array(
					'ID' => 'fld_1848465',
					'type' => 'text',
					'label' => 'Last Name',
					'slug' => 'last_name',
					'conditions' =>
						array(
							'type' => 'con_fld_1848465',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'placeholder' => '',
							'default' => '',
							'mask' => '',
							'type_override' => 'text',
						),
				),
			'fld_8215325' =>
				array(
					'ID' => 'fld_8215325',
					'type' => 'password',
					'label' => 'Password',
					'slug' => 'password_login',
					'conditions' =>
						array(
							'type' => '',
						),
					'required' => 1,
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'confirm_pass' => 1,
							'confirm_description' => 'Confirm Password',
							'pass_strength' => 'good',
						),
				),
			'fld_6252294' =>
				array(
					'ID' => 'fld_6252294',
					'type' => 'password',
					'label' => 'Password',
					'slug' => 'password_register',
					'conditions' =>
						array(
							'type' => '',
						),
					'required' => 1,
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'confirm_pass' => 1,
							'confirm_description' => 'Confirm Password',
							'pass_strength' => 'good',
						),
				),
			'fld_8925727' =>
				array(
					'ID' => 'fld_8925727',
					'type' => 'button',
					'label' => 'Login',
					'slug' => 'login',
					'conditions' =>
						array(
							'type' => 'con_fld_8925727',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'type' => 'submit',
							'class' => 'btn btn-default',
							'target' => '',
						),
				),
			'fld_9960615' =>
				array(
					'ID' => 'fld_9960615',
					'type' => 'button',
					'label' => 'Register',
					'slug' => 'register',
					'conditions' =>
						array(
							'type' => 'con_fld_9960615',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'public',
							'type' => 'submit',
							'class' => 'btn btn-default',
							'target' => '',
						),
				),
			'fld_4312526' =>
				array(
					'ID' => 'fld_4312526',
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
							'visibility' => 'user',
							'visibility_role' =>
								array(
									'administrator' => 1,
									'editor' => 1,
									'author' => 1,
									'contributor' => 1,
									'subscriber' => 1,
									'shop_manager' => 1,
									'shop_accountant' => 1,
									'shop_worker' => 1,
									'shop_vendor' => 1,
									'customer' => 1,
									'give_manager' => 1,
									'give_accountant' => 1,
									'give_worker' => 1,
									'sa_client' => 1,
									'bbp_keymaster' => 1,
									'bbp_spectator' => 1,
									'bbp_blocked' => 1,
									'bbp_moderator' => 1,
									'bbp_participant' => 1,
								),
							'type' => 'submit',
							'class' => 'btn btn-default',
							'target' => '',
						),
				),
			'fld_7739430' =>
				array(
					'ID' => 'fld_7739430',
					'type' => 'dropdown',
					'label' => 'Choose A Plan',
					'slug' => 'choose_a_plan',
					'conditions' =>
						array(
							'type' => '',
						),
					'caption' => '',
					'config' =>
						array(
							'custom_class' => '',
							'visibility' => 'all',
							'placeholder' => '',
							'auto_type' => '',
							'taxonomy' => 'category',
							'post_type' => 'post',
							'value_field' => 'name',
							'orderby_tax' => 'count',
							'orderby_post' => 'ID',
							'order' => 'ASC',
							'default' => '',
							'option' =>
								array(
									'opt1118102' =>
										array(
											'value' => '',
											'label' => 'Good',
										),
									'opt1195944' =>
										array(
											'value' => '',
											'label' => 'Awesome',
										),
									'opt1881021' =>
										array(
											'value' => '',
											'label' => '#Everything',
										),
								),
						),
				),
		),
	'page_names' =>
		array(
			0 => 'Page 1',
		),
	'conditional_groups' =>
		array(
			'conditions' =>
				array(
					'con_fld_3049119' =>
						array(
							'id' => 'con_fld_3049119',
							'name' => 'First Name',
							'type' => 'show',
							'fields' =>
								array(
									'cl6324682737' => 'fld_6187209',
								),
							'group' =>
								array(
									'rw81999243815' =>
										array(
											'cl6324682737' =>
												array(
													'parent' => 'rw81999243815',
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1519376',
												),
										),
								),
						),
					'con_fld_1848465' =>
						array(
							'id' => 'con_fld_1848465',
							'name' => 'Last Name',
							'type' => 'show',
							'fields' =>
								array(
									'cl10589239367' => 'fld_6187209',
								),
							'group' =>
								array(
									'rw27759232163' =>
										array(
											'cl10589239367' =>
												array(
													'parent' => 'rw27759232163',
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1519376',
												),
										),
								),
						),
					'con_fld_8733305' =>
						array(
							'id' => 'con_fld_8733305',
							'name' => 'Website',
							'type' => 'show',
							'fields' =>
								array(
									'cl7066615807' => 'fld_6187209',
								),
							'group' =>
								array(
									'rw60415834355' =>
										array(
											'cl7066615807' =>
												array(
													'parent' => 'rw60415834355',
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1519376',
												),
										),
								),
						),
					'con_fld_9062254' =>
						array(
							'id' => 'con_fld_9062254',
							'name' => 'Twitter User Name',
							'type' => 'show',
							'fields' =>
								array(
									'cl6538305895' => 'fld_6187209',
								),
							'group' =>
								array(
									'rw45669507217' =>
										array(
											'cl6538305895' =>
												array(
													'parent' => 'rw45669507217',
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1519376',
												),
										),
								),
						),
					'con_fld_8925727' =>
						array(
							'id' => 'con_fld_8925727',
							'name' => 'Login',
							'type' => 'show',
							'fields' =>
								array(
									'cl1087815585' => 'fld_6187209',
								),
							'group' =>
								array(
									'rw7512498355' =>
										array(
											'cl1087815585' =>
												array(
													'parent' => 'rw7512498355',
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1314026',
												),
										),
								),
						),
					'con_fld_9960615' =>
						array(
							'id' => 'con_fld_9960615',
							'name' => 'Register',
							'type' => 'show',
							'fields' =>
								array(
									'cl5717854184' => 'fld_6187209',
								),
							'group' =>
								array(
									'rw10385536234' =>
										array(
											'cl5717854184' =>
												array(
													'parent' => 'rw10385536234',
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1519376',
												),
										),
								),
						),
				),
		),
	'processors' =>
		array(
			'fp_43784583' =>
				array(
					'ID' => 'fp_43784583',
					'runtimes' =>
						array(
							'insert' => 1,
						),
					'type' => 'user_login',
					'config' =>
						array(
							'user' => 'fld_1965359',
							'_required_bounds' =>
								array(
									0 => 'user',
								),
							'pass' => 'fld_8215325',
							'remember' => '',
							'redirect' => '',
							'fail_message' => '',
						),
					'conditions' =>
						array(
							'type' => 'use',
							'group' =>
								array(
									'rw4138412193' =>
										array(
											'cl6015951156' =>
												array(
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1314026',
												),
										),
								),
						),
				),
			'fp_66038140' =>
				array(
					'ID' => 'fp_66038140',
					'runtimes' =>
						array(
							'insert' => 1,
						),
					'type' => 'user_register',
					'config' =>
						array(
							'user_login' => 'fld_6187209',
							'_required_bounds' =>
								array(
									0 => NULL,
									1 => 'user_login',
								),
							'user_pass' => 'fld_8215325',
							'user_email' => 'fld_1965359',
							'do_login' => 1,
							'role' => 'subscriber',
							'first_name' => 'fld_3049119',
							'last_name' => 'fld_1848465',
							'nickname' => NULL,
							'display_name' => NULL,
							'description' => NULL,
							'user_url' => 'fld_1965359',
						),
					'conditions' =>
						array(
							'type' => 'use',
							'group' =>
								array(
									'rw61475382880' =>
										array(
											'cl17752982719' =>
												array(
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1519376',
												),
										),
								),
						),
				),
			'fp_90950826' =>
				array(
					'ID' => 'fp_90950826',
					'runtimes' =>
						array(
							'insert' => 1,
						),
					'type' => 'cf_members',
					'config' =>
						array(
							'plan_name' => '%choose_a_plan%',
							'plan_slug' => '%choose_a_plan%',
						),
					'conditions' =>
						array(
							'type' => 'not',
							'group' =>
								array(
									'rw15032064020' =>
										array(
											'cl6025085356' =>
												array(
													'field' => 'fld_6187209',
													'compare' => 'is',
													'value' => 'opt1314026',
												),
										),
								),
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
			'sender_name' => 'Caldera Forms Notification',
			'sender_email' => 'admin@local.dev',
			'reply_to' => '',
			'email_type' => 'html',
			'recipients' => '',
			'bcc_to' => '',
			'email_subject' => 'Membership With User Registration',
			'email_message' => '{summary}',
		),
);
