<?php
/**
 * Theme Customizer
 * @package Razor Lite
 */

function razor_lite_customizer( $wp_customize ) {

	/**
	 * Rename Sections Titles
	 */
	$wp_customize->get_section('colors')->title = esc_html__( 'General Colors', 'razor-lite' );

	/**
	 * Set transports for the Customizer.
	 */
	$wp_customize->get_setting( 'background_color' )->transport 	= 'postMessage';
	$wp_customize->get_setting( 'blogname' )->transport         	= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport 	= 'postMessage';


	/**
	 * Helper functions
	 */
	function is_homepage_template(){
    		// Get the page's template
    		$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    		$is_template = preg_match( '%homepage-one.php%', $template );
    			if ( $is_template == 0 ){
        				return false;
    			} else {
        				return true;
    			}
	}
	function is_headline_page(){
    			if ( is_front_page() || is_home() ){
        				return true;
    			} else {
        				return false;
    			}
	}
	function is_blog_page(){
    			if ( is_home() || is_archive() ){
        				return true;
    			} else {
        				return false;
    			}
	}
	function is_single_post(){
    			if ( is_singular( 'post' ) ){
        				return true;
    			} else {
        				return false;
    			}
	}
	function is_puper_plugin_active(){
    		// Check for the slider plugin class
    		if ( !class_exists( 'PuperSuperPlugin' ) ){
    			// If it doesn't exist it won't show the section/panel/control
        			return false;
    		} else {
    			// If it does, we do show it
        			return true;
    		}
	}


	/**
	 * Theme Customizer Options and Sections.
	 */

	// Adding to default title_tagline section

	/* Hide Site Title */
	$wp_customize->add_setting( 
		'razor_lite_display_title',
		array(
			'default' => FALSE,
			'sanitize_callback' => 'razor_lite_sanitize_checkbox',
            			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'razor_lite_display_title',
		array(
			'section'   => 'title_tagline',
			'label'     => esc_html__( 'Hide Site Title', 'razor-lite' ),
			'type'      => 'checkbox'
		)
	);

	/* Hide Site Tagline */
	$wp_customize->add_setting( 
		'razor_lite_display_subtitle',
		array(
			'default' => FALSE,
			'sanitize_callback' => 'razor_lite_sanitize_checkbox',
            			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'razor_lite_display_subtitle',
		array(
			'section'   => 'title_tagline',
			'label'     => esc_html__( 'Hide Site Tagline', 'razor-lite' ),
			'type'      => 'checkbox'
		)
	);
	
	// Adding to default color section
	$body_colors = array();

	$body_colors[] = array(
		'slug'=>'main_color', 
		'default' => '#22262b',
		'label' => esc_html__('Main Color', 'razor-lite'),
		'transport' => 'refresh'
	);
	$body_colors[] = array(
		'slug'=>'secondary_color',
		'default' => '#82909D', // #AAB7B9
		'label' => esc_html__('Secondary Color', 'razor-lite'),
		'transport' => 'refresh'
	);
	$body_colors[] = array(
		'slug'=>'additional_color',
		'default' => '#b1b9bf',
		'label' => esc_html__('Additional Color', 'razor-lite'),
		'transport' => 'postMessage'
	);

	foreach( $body_colors as $color ) {
		$wp_customize->add_setting(
			'razor_lite_' . $color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => $color['transport']
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array(
					'label' => $color['label'], 
					'section' => 'colors',
					'settings' => 'razor_lite_' . $color['slug']
				)
			)
		);
	}


	/*-----------------------------------------------------------
	 * Header Intro Text
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'razor_lite_headline',
			array(
				'title'     => esc_html__( 'Header Intro Text', 'razor-lite' ),
      				'description' => esc_html__( 'Only works with the Header Image.', 'razor-lite' ),
				'priority'  => 65,
				'active_callback' => 'is_headline_page',
			)
	);
	$wp_customize->add_setting( 'header_intro_title', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback' => 'razor_lite_sanitize_txt',
	) );
	$wp_customize->add_control( 'header_intro_title', array(
    		'type' => 'text',
		'section'       => 'razor_lite_headline',
		'label' => esc_html__( 'Intro Title', 'razor-lite' ),
		'description' => esc_html__( 'The text that you type here will be wrapped in the H1 title tag.', 'razor-lite' ),
	) );

	$wp_customize->add_setting( 'header_intro', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
		'sanitize_callback' => 'razor_lite_sanitize_textarea',
	) );
	$wp_customize->add_control( 'header_intro', array(
    		'type' => 'textarea',
		'section'       => 'razor_lite_headline',
		'label' => esc_html__( 'Intro Text', 'razor-lite' ),
		'description' => esc_html__( 'Here you can use some html tags (e.g. <strong>, <br>). The text that you type here will be wrapped in the paragraph tag', 'razor-lite' ),
	) );

	$wp_customize->add_setting( 'intro_link_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'intro_link_url', array(
    		'type' => 'text',
		'section'       => 'razor_lite_headline',
		'label' => esc_html__( 'Intro link URL', 'razor-lite' ),
	) );

	$wp_customize->add_setting( 'intro_link_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'refresh',
		'sanitize_callback' => 'razor_lite_sanitize_txt',
	) );
	$wp_customize->add_control( 'intro_link_text', array(
    		'type' => 'text',
		'section'       => 'razor_lite_headline',
		'label' => esc_html__( 'Link Text', 'razor-lite' ),
	) );

	/*-----------------------------------------------------------*
	 * Footer Options
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'razor_lite_display_options',
		array(
			'title'     => esc_html__( 'Footer options', 'razor-lite' ),
			'priority'  => 330
		)
	);

	/* Copyright */

	$wp_customize->add_setting(
		'razor_lite_copy_text',
		array(
			'default'            => 'All Rights Reserved',
			'sanitize_callback'  => 'razor_lite_sanitize_txt',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'razor_lite_copy_text',
		array(
			'section'  => 'razor_lite_display_options',
			'label'    => esc_html__( 'Copyright Message', 'razor-lite' ),
			'type'     => 'text'
		)
	);


} // razor_lite_customizer
add_action( 'customize_register', 'razor_lite_customizer', 11 );

	/*-----------------------------------------------------------*
	 * Sanitize
	 *-----------------------------------------------------------*/
	function razor_lite_sanitize_textarea( $input ) {
		return wp_kses_post( force_balance_tags($input) );
	}
	function razor_lite_sanitize_txt( $input ) {
		return sanitize_text_field( $input );
	}
	function razor_lite_sanitize_checkbox( $value ) {
        		if ( 'on' != $value )
        			    $value = false;
        		return $value;
    	}
	function razor_lite_sanitize_css( $input ) {
		return wp_strip_all_tags( $input );
	}
	function razor_lite_sanitize_image( $image, $setting ) {

		// Array of valid image file types.
    		$mimes = array(
    		    'jpg|jpeg|jpe' => 'image/jpeg',
    		    'gif'          => 'image/gif',
    		    'png'          => 'image/png',
    		    'bmp'          => 'image/bmp',
    		    'tif|tiff'     => 'image/tiff',
    		    'ico'          => 'image/x-icon'
    		);

		// Return an array with file extension and mime_type.
    		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it
    		return ( $file['ext'] ? $image : $setting->default );
	}
	function razor_lite_sanitize_nohtml( $nohtml ) {
		return wp_filter_nohtml_kses( $nohtml );
	}
	function razor_lite_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );
	
		// If the input is an absolute integer, return it
		return ( $number ? $number : $setting->default );
	}

	/*-----------------------------------------------------------*
	 * Styles print
	 *-----------------------------------------------------------*/
	function razor_lite_customizer_css() {
?>

<!--Customize CSS -->
<style type="text/css">
body, select, textarea, a.post-edit-link { color: <?php echo esc_attr( get_option( 'razor_lite_main_color', '#22262b' ) ); ?> !important; }
.site-branding, .site-branding a, .site-info, .site-info a, .slide-panel .widget-area, .slide-panel .widget-area a, .slide-panel h3, .slide-panel h5,
.page-title, .page-header, .social-navigation a:before { color: <?php echo esc_attr( get_option( 'razor_lite_additional_color', '#b1b9bf' ) ); ?>; }
.entry-meta, .entry-footer, .logged-in-as, .entry-meta a, .entry-footer a, .entry-summary p, .entry-content blockquote p, .nav-links a, .comment-metadata time, .logged-in-as a, #comments label, .form-allowed-tags, .form-allowed-tags a { color: <?php echo esc_attr( get_option( 'razor_lite_secondary_color', '#82909D' ) ); ?>; }
body.blog article:after, .archive article:after, .single .site-main:after { border-right-color: #<?php echo esc_attr( get_theme_mod( 'background_color', '343b47' ) ); ?> !important; }

<?php
	if ( true === get_theme_mod( 'razor_lite_display_title' ) ) { ?>
		.site-title { clip: rect(1px 1px 1px 1px); position: absolute; }
<?php
	}

	if ( true === get_theme_mod( 'razor_lite_display_subtitle' ) ) { ?>
		.site-description { clip: rect(1px 1px 1px 1px); position: absolute; }
<?php
	} ?>

</style>

<?php
	} // razor_lite_customizer_css()
	add_action( 'wp_head', 'razor_lite_customizer_css', 999 );

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function razor_lite_customize_preview_js() {
		wp_enqueue_script( 'razor_lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '06102016', true );
	}
	add_action( 'customize_preview_init', 'razor_lite_customize_preview_js' );