
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

		  // Update the site title in real time...
		  wp.customize( 'blogdescription', function( value ) {
		    value.bind( function( newval ) {
		      $( '.site-description a' ).text( newval );
		    } );
		  } ); 

		  // //Update site title color in real time...
       wp.customize( 'header_textcolor', function( value ) {
         value.bind( function( newval ) {
           $( '.site-title, .site-title a, .site-description, .site-description a' ).css({
               color: newval
             });
                
         } );
       } );



	});
})(jQuery);


