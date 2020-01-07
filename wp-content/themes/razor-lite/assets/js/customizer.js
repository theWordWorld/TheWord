/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Color Settings
	wp.customize( 'razor_lite_head_overlay_color', function( value ) {
		value.bind( function( to ) {
			$( '.post.has-post-thumbnail .entry-title, .intro-content h1, .intro-content p, .intro-content a' ).css( {
					'color': to
				} );
			$( '.intro-content a' ).css( {
					'border-color': to
				} );
		} );
	} );
	wp.customize( 'razor_lite_headings_color', function( value ) {
		value.bind( function( to ) {
			$( '.entry-title, .entry-title a, .comments-title, .comment-reply-title' ).css( {
					'color': to
				} );
		} );
	} );
	wp.customize( 'razor_lite_additional_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-branding, .site-branding a, .site-info, .site-info a, .page-title, .page-header' ).css( {
					'color': to
				} );
		} );
	} );
	wp.customize( 'razor_lite_header_bgcolor', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( {
					'background-color': to
				} );
		} );
	} );
	// Hide Site Title
	wp.customize( 'razor_lite_display_title', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.site-title' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Hide Site Tagline
	wp.customize( 'razor_lite_display_subtitle', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Site Copyright
	wp.customize( 'razor_lite_copy_text', function( value ) {
		value.bind( function( to ) {
			$( '.site-copyright span' ).text( to );
		} );
	} );
	// Header Intro Title
	wp.customize( 'header_intro_title', function( value ) {
		value.bind( function( to ) {
			$( '.intro-content h1' ).text( to );
		} );
	} );
	// Hide Theme Credits
	wp.customize( 'razor_lite_display_credit', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.theme-credits' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.theme-credits' ).css( {
					'display': 'block'
				} );
			}
		} );
	} );
} )( jQuery );
