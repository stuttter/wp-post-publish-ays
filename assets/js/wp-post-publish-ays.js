/* global WP_Post_Publish_AYS */
( function( $ ) {
    'use strict';

	var button  = $( '#publish' ),
		spinner = $( '#publishing-action .spinner' );

	if ( button.val() === WP_Post_Publish_AYS.publish ) {
		button.click(function() {
			if ( confirm( WP_Post_Publish_AYS.confirm ) ) {
				return true;
			} else {
				spinner.hide();
				button.removeClass( 'button-primary-disabled' );
				return false;
			}
		} );
	}
}( jQuery ) );
