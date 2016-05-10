<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'portfolio-one'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'portfolio-one' ),
		'two' => __( 'Two', 'portfolio-one' ),
		'three' => __( 'Three', 'portfolio-one' ),
		'four' => __( 'Four', 'portfolio-one' ),
		'five' => __( 'Five', 'portfolio-one' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'portfolio-one' ),
		'two' => __( 'Pancake', 'portfolio-one' ),
		'three' => __( 'Omelette', 'portfolio-one' ),
		'four' => __( 'Crepe', 'portfolio-one' ),
		'five' => __( 'Waffle', 'portfolio-one' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Basic Settings', 'portfolio-one' ),
		'type' => 'heading'
	);

	$options[] = array(
	 'name' => __('Publicidad', 'portfolio-one'),
	 'type' => 'heading');

	$options[] = array(
	 'name' => __('Link Ad Header', 'portfolio-one'),
	 'desc' => __('Link conteniendo http://...', 'portfolio-one'),
	 'id' => 'link_ad_header',
	 'type' => 'text');

	$options[] = array(
	 'name' => __('Imagen Ad Header', 'portfolio-one'),
	 'desc' => __('400x60px', 'portfolio-one'),
	 'id' => 'image_ad_header',
	 'type' => 'upload');

	$options[] = array(
	 'name' => __('Link Ad Footer', 'portfolio-one'),
	 'desc' => __('Link conteniendo http://...', 'portfolio-one'),
	 'id' => 'link_ad_footer',
	 'std' => 'Default',
	 'type' => 'text');

	$options[] = array(
	 'name' => __('Imagen Ad Footer', 'portfolio-one'),
	 'desc' => __('281x100px', 'portfolio-one'),
	 'id' => 'image_ad_footer',
	 'type' => 'upload');

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'portfolio-one' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'portfolio-one' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	return $options;
}