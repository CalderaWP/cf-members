<?php
/**
 * Processor config UI for Members for Caldera Forms
 *
 * @package   cf_members
 * @author    Josh Pollock Josh Pollock for CalderaWP LLC (email : Josh@CalderaWP.com)
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock for CalderaWP LLC for CalderaWP LLC
 */


if ( class_exists( 'Caldera_Forms_Processor_UI' )  ) {
	echo Caldera_Forms_Processor_UI::config_fields( cf_members_fields() );
	?>
	<script>
		(function ( window, undefined ) {
			'use strict';
			jQuery( document ).ready( function ( $ ) {
			$( '#plan_slug' ).on( 'change', function () {
					$( this ).val( $( this ).val().replace( /[^a-z0-9_-]/gi, '' ).toLowerCase() );
			} );

			} );
		})();
	</script>
<?php
}

