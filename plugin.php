<?php
/**
 * Plugin Name: Members for Caldera Forms
 * Plugin URI:  https://CalderaWP.com/downloads/cf-members
 * Description: Simple membership plugin, powered by Caldera Forms
 * Version:     0.1.0
 * Author:      Josh Pollock for CalderaWP LLC
 * Author URI:  https://CalderaWP.com
 * License:     GPLv2+
 * Text Domain: cf-members
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2016 Josh Pollock for CalderaWP LLC (email : Josh@CalderaWP.com) for CalderaWP LLC
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * Define constants
 */
define( 'CF_MEMBERS_VER', '0.1.0' );
define( 'CF_MEMBERS_URL',     plugin_dir_url( __FILE__ ) );
define( 'CF_MEMBERS_PATH',    dirname( __FILE__ ) . '/' );
define( 'CF_MEMBERS_CORE',    dirname( __FILE__ )  );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function cf_members_init_text_domain() {
	load_plugin_textdomain( 'cf-members', FALSE, CF_MEMBERS_PATH . 'languages' );
}

/**
 * Include Files
 */
// load dependencies
include_once CF_MEMBERS_PATH . 'vendor/autoload.php';

// pull in the functions file
include CF_MEMBERS_PATH . 'includes/functions.php';

/**
 * Hooks
 */
//register text domain
add_action( 'init', 'cf_members_init_text_domain' );

// add filter to register addon with Caldera Forms
add_filter('caldera_forms_get_form_processors', 'cf_members_register');

// filter to initialize the license system
add_action( 'admin_init', 'cf_members_init_license' );

//add our example form
//add_filter( 'caldera_forms_get_form_templates', 'cf_braintree_example_form' );
