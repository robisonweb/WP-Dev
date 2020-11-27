<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

tainacan_blocks_initialize();

function tainacan_blocks_initialize() {
	global $wp_version;

	if(is_plugin_active('gutenberg/gutenberg.php') ||  $wp_version >= '5') {
		tainacan_blocks_add_gutenberg_blocks_actions();
	}
}

function tainacan_blocks_add_gutenberg_blocks_actions() {

	add_action('init', 'tainacan_blocks_get_common_styles');

	add_action('init', 'tainacan_blocks_register_tainacan_terms_list');
	add_action('init', 'tainacan_blocks_register_tainacan_items_list');
	add_action('init', 'tainacan_blocks_register_tainacan_dynamic_items_list');
	add_action('init', 'tainacan_blocks_register_tainacan_carousel_items_list');
	add_action('init', 'tainacan_blocks_register_tainacan_carousel_terms_list');
	add_action('init', 'tainacan_blocks_register_tainacan_search_bar');
	add_action('init', 'tainacan_blocks_register_tainacan_faceted_search');
	add_action('init', 'tainacan_blocks_register_tainacan_collections_list');
	add_action('init', 'tainacan_blocks_register_tainacan_carousel_collections_list');
	add_action('init', 'tainacan_blocks_register_tainacan_facets_list');

	add_action('init', 'tainacan_blocks_add_plugin_settings');
	
	add_filter('block_categories', 'tainacan_blocks_register_categories', 10, 2);
	add_action('init', 'tainacan_blocks_register_category_icon');
}

function tainacan_blocks_register_categories($categories, $post){

	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'tainacan-blocks',
				'title' => __( 'Tainacan', 'tainacan' ),
			),
		)
	);
}

function tainacan_blocks_register_tainacan_terms_list(){
	global $TAINACAN_BASE_URL;

	wp_register_script(
		'terms-list',
		$TAINACAN_BASE_URL . '/assets/js/block_terms_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'underscore')
	);

	wp_set_script_translations('terms-list', 'tainacan');

	wp_register_style(
		'terms-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-terms-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/terms-list', array(
			'editor_script' => 'terms-list',
			'style'         => 'terms-list'
		) );
	}
}

function tainacan_blocks_register_tainacan_facets_list(){
	global $TAINACAN_BASE_URL;

	wp_enqueue_script(
		'facets-list-theme',
		$TAINACAN_BASE_URL . '/assets/js/block_facets_list_theme.js',
		array('wp-components')
	);
	wp_set_script_translations('facets-list-theme', 'tainacan');

	wp_register_script(
		'facets-list',
		$TAINACAN_BASE_URL . '/assets/js/block_facets_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);
	wp_set_script_translations('facets-list', 'tainacan');

	wp_register_style(
		'facets-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-facets-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/facets-list', array(
			'editor_script' => 'facets-list',
			'style'         => 'facets-list',
			'script'		=> 'facets-list-theme'
		) );
	}
}

function tainacan_blocks_register_tainacan_items_list(){
	global $TAINACAN_BASE_URL;

	wp_register_script(
		'items-list',
		$TAINACAN_BASE_URL . '/assets/js/block_items_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);

	wp_register_style(
		'items-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-items-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	wp_set_script_translations('items-list', 'tainacan');

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/items-list', array(
			'editor_script' => 'items-list',
			'style'         => 'items-list'
		) );
	}
}

function tainacan_blocks_register_tainacan_dynamic_items_list(){
	global $TAINACAN_BASE_URL;

	wp_enqueue_script(
		'dynamic-items-list-theme',
		$TAINACAN_BASE_URL . '/assets/js/block_dynamic_items_list_theme.js',
		array('wp-components', 'wp-i18n')
	);
	wp_set_script_translations('dynamic-items-list-theme', 'tainacan');

	wp_register_script(
		'dynamic-items-list',
		$TAINACAN_BASE_URL . '/assets/js/block_dynamic_items_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);
	wp_set_script_translations('dynamic-items-list', 'tainacan');

	wp_register_style(
		'dynamic-items-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-dynamic-items-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/dynamic-items-list', array(
			'editor_script' => 'dynamic-items-list',
			'style'         => 'dynamic-items-list',
			'script'		=> 'dynamic-items-list-theme'
		) );
	}
}

function tainacan_blocks_register_tainacan_faceted_search(){
	global $TAINACAN_BASE_URL;
	global $TAINACAN_VERSION;

	wp_register_script(
		'tainacan-search',
		$TAINACAN_BASE_URL . '/assets/js/theme_search.js',
		['underscore'],
		TAINACAN_VERSION
	);

	wp_register_script(
		'faceted-search',
		$TAINACAN_BASE_URL . '/assets/js/block_faceted_search.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);

	wp_set_script_translations('faceted-search', 'tainacan');

	wp_register_style(
		'faceted-search',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-faceted-search.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/faceted-search', array(
			'editor_script' => 'faceted-search',
			'style'         => 'faceted-search',
			'script'		=> 'tainacan-search'
		) );
	}
}

function tainacan_blocks_register_tainacan_carousel_items_list(){
	global $TAINACAN_BASE_URL;

	wp_enqueue_script(
		'carousel-items-list-theme',
		$TAINACAN_BASE_URL . '/assets/js/block_carousel_items_list_theme.js',
		array('wp-components')
	);
	wp_set_script_translations('carousel-items-list-theme', 'tainacan');

	wp_register_script(
		'carousel-items-list',
		$TAINACAN_BASE_URL . '/assets/js/block_carousel_items_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);
	wp_set_script_translations('carousel-items-list', 'tainacan');

	wp_register_style(
		'carousel-items-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-carousel-items-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/carousel-items-list', array(
			'editor_script' => 'carousel-items-list',
			'style'         => 'carousel-items-list',
			'script'		=> 'carousel-items-list-theme'
		) );
	}
}

function tainacan_blocks_register_tainacan_carousel_terms_list(){
	global $TAINACAN_BASE_URL;

	wp_enqueue_script(
		'carousel-terms-list-theme',
		$TAINACAN_BASE_URL . '/assets/js/block_carousel_terms_list_theme.js',
		array('wp-components')
	);
	wp_set_script_translations('carousel-terms-list-theme', 'tainacan');

	wp_register_script(
		'carousel-terms-list',
		$TAINACAN_BASE_URL . '/assets/js/block_carousel_terms_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);
	wp_set_script_translations('carousel-terms-list', 'tainacan');

	wp_register_style(
		'carousel-terms-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-carousel-terms-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/carousel-terms-list', array(
			'editor_script' => 'carousel-terms-list',
			'style'         => 'carousel-terms-list',
			'script'		=> 'carousel-terms-list-theme'
		) );
	}
}

function tainacan_blocks_register_tainacan_search_bar(){
	global $TAINACAN_BASE_URL;

	wp_enqueue_script(
		'search-bar-theme-script',
		$TAINACAN_BASE_URL . '/assets/js/block_search_bar_script.js',
		array('wp-components')
	);

	wp_register_script(
		'search-bar',
		$TAINACAN_BASE_URL . '/assets/js/block_search_bar.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);

	wp_set_script_translations('search-bar-list', 'tainacan');

	wp_register_style(
		'search-bar',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-search-bar.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/search-bar', array(
			'editor_script' => 'search-bar',
			'style'         => 'search-bar'
		) );
	}
}

function tainacan_blocks_register_tainacan_collections_list(){
	global $TAINACAN_BASE_URL;

	wp_register_script(
		'collections-list',
		$TAINACAN_BASE_URL . '/assets/js/block_collections_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);

	wp_register_style(
		'collections-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-collections-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	wp_set_script_translations('collections-list', 'tainacan');

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/collections-list', array(
			'editor_script' => 'collections-list',
			'style'         => 'collections-list'
		) );
	}
}

function tainacan_blocks_register_tainacan_carousel_collections_list(){
	global $TAINACAN_BASE_URL;

	wp_enqueue_script(
		'carousel-collections-list-theme',
		$TAINACAN_BASE_URL . '/assets/js/block_carousel_collections_list_theme.js',
		array('wp-components')
	);
	wp_set_script_translations('carousel-collections-list-theme', 'tainacan');

	wp_register_script(
		'carousel-collections-list',
		$TAINACAN_BASE_URL . '/assets/js/block_carousel_collections_list.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
	);
	wp_set_script_translations('carousel-collections-list', 'tainacan');

	wp_register_style(
		'carousel-collections-list',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-carousel-collections-list.css',
		array('wp-edit-blocks', 'tainacan-blocks-common-styles')
	);

	if (function_exists('register_block_type')) {
		register_block_type( 'tainacan/carousel-collections-list', array(
			'editor_script' => 'carousel-collections-list',
			'style'         => 'carousel-collections-list',
			'script'		=> 'carousel-collections-list-theme'
		) );
	}
}

function tainacan_blocks_get_plugin_js_settings(){
	global $TAINACAN_BASE_URL;

	$settings = [
		'root'     	=> esc_url_raw( rest_url() ) . 'tainacan/v2',
		'nonce'   	=> is_user_logged_in() ? wp_create_nonce( 'wp_rest' ) : false,
		'base_url' 	=> $TAINACAN_BASE_URL,
		'admin_url' => admin_url(),
		'site_url'	=> site_url(),
		'theme_items_list_url' => esc_url_raw( get_site_url() ) . '/' . \Tainacan\Theme_Helper::get_instance()->get_items_list_slug(),
	];

	return $settings;
}

function tainacan_blocks_add_plugin_settings() {

	$settings = tainacan_blocks_get_plugin_js_settings();

	wp_localize_script( 'terms-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'items-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'dynamic-items-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'carousel-items-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'carousel-terms-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'search-bar', 'tainacan_blocks', $settings );
	wp_localize_script( 'faceted-search', 'tainacan_blocks', $settings );
	wp_localize_script( 'collections-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'carousel-collections-list', 'tainacan_blocks', $settings );
	wp_localize_script( 'facets-list', 'tainacan_blocks', $settings );

	// The facet facteded search block uses a different settings object, the same used on the theme items list
	wp_localize_script( 'tainacan-search', 'tainacan_plugin', \Tainacan\Admin::get_instance()->get_admin_js_localization_params() );
}

function tainacan_blocks_get_common_styles() {
	global $TAINACAN_BASE_URL;
	
	wp_enqueue_style(
		'tainacan-blocks-common-styles',
		$TAINACAN_BASE_URL . '/assets/css/tainacan-gutenberg-block-common-styles.css',
		array('wp-edit-blocks')
	);
}

function tainacan_blocks_register_category_icon() {
	global $TAINACAN_BASE_URL;
	
	wp_enqueue_script(
		'tainacan-blocks-register-category-icon',
		$TAINACAN_BASE_URL . '/assets/js/tainacan_blocks_category_icon.js',
		array('wp-blocks')
	);
}
