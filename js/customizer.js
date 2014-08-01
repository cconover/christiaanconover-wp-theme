/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).text( newval );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).text( newval );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a, .site-description' ).css( 'color', newval );
		} );
	} );
	// Header background color.
	wp.customize( 'header_bgcolor', function( value ) {
		value.bind( function( newval ) {
			$( '.site-header' ).css( 'background', newval );
		} );
	} );
	// Main menu color
	wp.customize( 'main_menu_color', function( value ) {
		value.bind( function( newval ) {
			$( '.main-navigation a' ).css( 'color', newval );
		} );
	} );
	
	// Body text color.
	wp.customize( 'body_textcolor', function( value ) {
		value.bind( function( newval ) {
			$( 'body, button, input, select, textarea' ).css( 'color', newval );
		} );
	} );
	// Link color
	wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'a:not( .site-header a, .site-footer a)' ).css( 'color', newval );
		} );
	} );
	
	// Footer text color.
	wp.customize( 'footer_textcolor', function( value ) {
		value.bind( function( newval ) {
			$( '.site-footer' ).css( 'color', newval );
		} );
	} );
	// footer background color.
	wp.customize( 'footer_bgcolor', function( value ) {
		value.bind( function( newval ) {
			$( '.site-footer' ).css( 'background', newval );
		} );
	} );
	// Footer link color
	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-footer a' ).css( 'color', newval );
		} );
	} );
} )( jQuery );
