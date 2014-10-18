<?php
/**
 * Christiaan Conover Theme Customizer
 *
 * @package Christiaan Conover
 */

/**
 * Add elements to the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function christiaanconover_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	
	/* Settings */
	// Body text color
	$wp_customize->add_setting( 'text_color', array(
		'default'		=> '#404040',
		'transport'		=> 'postMessage'
	) );
	// Link color
	$wp_customize->add_setting( 'link_color', array(
		'default'		=> '#a30000',
		'transport'		=> 'postMessage'
	) );
	// Link hover color
	$wp_customize->add_setting( 'link_hover_color', array(
		'default'		=> '#3084cf',
		'transport'		=> 'refresh'
	) );
	
	// Header background color
	$wp_customize->add_setting( 'header_bgcolor', array(
		'default'		=> '#ffffff',
		'transport'		=> 'postMessage'
	) );
	// Header text color
	$wp_customize->add_setting( 'header_textcolor', array(
		'default'		=> '#303030',
		'transport'		=> 'postMessage'
	) );
	
	// Main menu color
	$wp_customize->add_setting( 'main_menu_color', array(
		'default'		=> 'a30000',
		'transport'		=> 'postMessage'
	) );
	
	// Footer background color
	$wp_customize->add_setting( 'footer_bgcolor', array(
		'default'		=> '#2b3542',
		'transport'		=> 'postMessage'
	) );
	// Footer text color
	$wp_customize->add_setting( 'footer_textcolor', array(
		'default'		=> '#9499a0',
		'transport'		=> 'postMessage'
	) );
	// Footer link color
	$wp_customize->add_setting( 'footer_link_color', array(
		'default'		=> '#ffffff',
		'transport'		=> 'postMessage'
	) );
	
	// Twitter
	$wp_customize->add_setting( 'twitter_url', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );
	// Facebook
	$wp_customize->add_setting( 'facebook_url', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );
	/* End Settings */
	
	/* Sections */
	$wp_customize->add_section( 'social', array(
		'title'			=> __( 'Social', 'christiaanconover' ),
		'priority'		=> 110
	) );
	/* End Sections */
	
	/* Controls */
	// Text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'			=> __( 'Text Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'text_color',
		'priority'		=> 11
	) ) );
	// Link color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'			=> __( 'Link Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'link_color',
		'priority'		=> 12
	) ) );
	// Link hover color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'			=> __( 'Link Hover Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'link_hover_color',
		'priority'		=> 13
	) ) );
	
	// Header background color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor', array(
		'label'			=> __( 'Header Background Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'header_bgcolor',
		'priority'		=> 14
	) ) );
	// Header text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label'			=> __( 'Header Text Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'header_textcolor',
		'priority'		=> 15
	) ) );
	
	// Main menu color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_color', array(
		'label'			=> __( 'Main Menu Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'main_menu_color',
		'priority'		=> 16
	) ) );
	
	// Footer background color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bgcolor', array(
		'label'			=> __( 'Footer/Caption Background Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'footer_bgcolor',
		'priority'		=> 17
	) ) );
	// Footer text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_textcolor', array(
		'label'			=> __( 'Footer/Caption Text Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'footer_textcolor',
		'priority'		=> 18
	) ) );
	// Footer link color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
		'label'			=> __( 'Footer/Caption Link Color', 'christiaanconover' ),
		'section'		=> 'colors',
		'settings'		=> 'footer_link_color',
		'priority'		=> 19
	) ) );
	
	// Twitter URL
	$wp_customize->add_control( 'twitter_url', array(
		'label'			=> __( 'Twitter URL', 'christiaanconover' ),
		'section'		=> 'social',
		'settings'		=> 'twitter_url'
	) );
	// Facebook URL
	$wp_customize->add_control( 'facebook_url', array(
		'label'			=> __( 'Facebook URL', 'christiaanconover' ),
		'section'		=> 'social',
		'settings'		=> 'facebook_url'
	) );
	/* End Controls */
}
add_action( 'customize_register', 'christiaanconover_customize_register' );

/**
 * Output CSS to site <head>
 */
function christiaanconover_customizer_header_output() {
	?>
	<!-- Customizer CSS -->
	<style type="text/css">
		<?php christiaanconover_customizer_css_generate( 'a', 'color', 'link_color' ); ?>
		<?php christiaanconover_customizer_css_generate( 'a:hover, a:active, a:focus', 'color', 'link_hover_color' ); ?>
		<?php christiaanconover_customizer_css_generate( 'body, button, input, select, textarea', 'color', 'text_color' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-header', 'background', 'header_bgcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-title a', 'color', 'header_textcolor', '#' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-description', 'color', 'header_textcolor', '#' ); ?>
		<?php christiaanconover_customizer_css_generate( '.main-navigation a', 'color', 'main_menu_color' ); ?>
		<?php christiaanconover_customizer_css_generate( '.main-navigation a:hover, .main-navigation a:active, .main-navigation a:focus', 'color', 'link_hover_color' ); ?>
		<?php christiaanconover_customizer_css_generate( '.featured-image-caption', 'background', 'footer_bgcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.featured-image-caption', 'color', 'footer_textcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.featured-image-caption a', 'color', 'footer_link_color' ); ?>
		<?php christiaanconover_customizer_css_generate( '.wp-caption .wp-caption-text', 'background', 'footer_bgcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.wp-caption .wp-caption-text', 'color', 'footer_textcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.wp-caption .wp-caption-text a', 'color', 'footer_link_color' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-footer', 'background', 'footer_bgcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-footer', 'color', 'footer_textcolor' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-footer a', 'color', 'footer_link_color' ); ?>
		<?php christiaanconover_customizer_css_generate( '.site-footer a:hover, .site-footer a:active, .site-footer a:focus', 'color', 'link_hover_color' ); ?>
	</style>
	<?php
} // End christiaanconover_customizer_header_output()
add_action( 'wp_head', 'christiaanconover_customizer_header_output' );

/**
 * CSS generator
 * Generates the CSS output
 * @uses get_theme_mod()
 * @param string $selector CSS selector
 * @param string $property the CSS property to modify
 * @param string $mod_name the name of the Customizer setting to fetch
 * @param string $prefix Optional. Anything that needs to be output before the CSS property value
 * @param string $postfix Optional. Anything that needs to be output after the CSS property value
 * @param bool $echo Optional. Whether to print directly to the page (default: true)
 * @return string Returns a single line of CSS with selectors and a property
 * @since Christiaan Conover 1.0.0
 */
function christiaanconover_customizer_css_generate( $selector, $property, $mod_name, $prefix='', $postfix='', $echo=true ) {
	// Start out with empty line
	$return = null;
	
	// Get the value of the Customizer setting
	$mod = get_theme_mod( $mod_name );
	
	// If 'mod' has a value, assemble the line of CSS
	if ( ! empty( $mod ) ) {
		$return = sprintf( '%s { %s: %s; }',
			$selector,
			$property,
			$prefix.$mod.$postfix
		);
		
		// If 'echo' is true, print the line
		if ( $echo ) {
			echo $return;
		}
	}
	return $return;
} // End christiaanconover_customizer_css_generate()

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function christiaanconover_customize_preview_js() {
	wp_enqueue_script( 'christiaanconover_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'christiaanconover_customize_preview_js' );
