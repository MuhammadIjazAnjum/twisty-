
(function($) {
 'use strict';

	 $(function() {
		// Update the site title in real time...
		  wp.customize( 'blogname', function( value ) {
		        value.bind( function( newval ) {
		        $( '.site-title a' ).text( newval );
		    } );
		  } );
		 // Update the site title in real time...
		  wp.customize( 'blogdescription', function( value ) {
		    value.bind( function( newval ) {
		      $( '.site-description a' ).text( newval );
		    } );
		  } ); 
	});
})(jQuery);


