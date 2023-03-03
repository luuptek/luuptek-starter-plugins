<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enable only certain blocks for Gutenberg
 * ie. disable some Core Gutenberg Blocks
 *
 * https://rudrastyh.com/gutenberg/remove-default-blocks.html
 *
 * Disabled Core Blocks:
 * 'core/button',
 * 'core/buttons',
 * 'core/cover'
 * 'core/code',
 * 'core/freeform',
 * 'core/group',
 * 'core/html',
 * 'core/preformatted',
 * 'core/verse',
 * 'core/more',
 * 'core/nextpage',
 * 'core/spacer',
 * 'core/archives',
 * 'core/categories',
 * 'core/latest-comments',
 * 'core/latest-posts',
 * 'core/search',
 * 'core/social-links',
 * 'core/social-link',
 * 'core/tag-cloud',
 * 'core/calendar',
 * 'core/rss',
 * 'core/latest-posts'
 * 'core-embed/twitter',
 * 'core-embed/youtube',
 * 'core-embed/facebook',
 * 'core-embed/instagram',
 * 'core-embed/wordpress',
 * 'core-embed/soundcloud',
 * 'core-embed/spotify',
 * 'core-embed/flickr',
 * 'core-embed/vimeo',
 * 'core-embed/animoto',
 * 'core-embed/cloudup',
 * 'core-embed/collegehumor',
 * 'core-embed/dailymotion',
 * 'core-embed/funnyordie',
 * 'core-embed/hulu',
 * 'core-embed/imgur',
 * 'core-embed/issuu',
 * 'core-embed/kickstarter',
 * 'core-embed/meetup-com',
 * 'core-embed/mixcloud',
 * 'core-embed/photobucket',
 * 'core-embed/polldaddy',
 * 'core-embed/reddit',
 * 'core-embed/reverbnation',
 * 'core-embed/screencast',
 * 'core-embed/scribd',
 * 'core-embed/slideshare',
 * 'core-embed/smugmug',
 * 'core-embed/speaker-deck',
 * 'core-embed/ted',
 * 'core-embed/tumblr',
 * 'core-embed/videopress',
 * 'core-embed/wordpress-tv',
 *
 * @param bool|array $allowed_block_types Array of block type
 *                                                          slugs, or boolean
 *                                                          to enable/disable
 *                                                          all.
 * @param WP_Block_Editor_Context $block_editor_context The current block
 *                                                          editor context.
 */
add_filter( 'allowed_block_types_all', function ( $allowed_blocks, $block_editor_context ) {

	// Allow devs to disable this plugin.
	if ( apply_filters( 'disable_luuptek_allowed_blocks', false ) ) {
		return $allowed_blocks;
	}

	$post = ! empty( $block_editor_context->post ) ? $block_editor_context->post : 0;

	$luuptek_allowed_blocks = [
		// Allow reusable blocks
		'core/block',
		// Allow reusable blocks, which has content in multiple lines
		'core/template',
		'core/paragraph',
		// Has custom image size (Image Dimensions) as option, but didn't find a way to remove it
		'core/image',
		// Has h1 as option, but didn't find a way to remove it
		'core/heading',
		'core/gallery',
		'core/list',
		'core/quote',
		'core/audio',
		'core/file',
		'core/video',
		'core/pullquote',
		'core/table',
		'core/columns',
		'core/media-text',
		'core/separator',
		'core/embed',
		'core/shortcode',
		// Allow form-block of Gravity Forms
		'gravityforms/form',
	];

	/**
	 * Filters allowed blocks.
	 *
	 * To allow all blocks, return empty array from this hook.
	 *
	 * In this hook, you can allow/disallow blocks for specific post type with
	 * if( $post->post_type === 'page' ) {
	 *     $allowed_blocks[] = 'core/shortcode';
	 * }
	 *
	 * @param array $luuptek_allowed_blocks Ids of allowed blocks by luuptek.
	 * @param array $allowed_blocks Ids of allowed blocks set by some another.
	 * @param WP_Post $post Post object of current post.
	 */
	return apply_filters( 'luuptek_allowed_gutenberg_blocks', $luuptek_allowed_blocks, $allowed_blocks, $post );

}, 9999, 2 );


/**
 * Disable some options of core -blocks
 *
 * See https://richtabor.com/disable-gutenberg-colors/
 */
add_action( 'after_setup_theme', function () {

	// Allow devs to disable this plugin.
	if ( apply_filters( 'disable_luuptek_server_gutenberg', false ) ) {
		return;
	}

	/**
	 * Filters editor color palette ie. colors that are available in Gutenberg.
	 *
	 * By default we add empty array as editor_color_palette, which will disable Gutenberg default color palette.
	 *
	 * If you want to add custom color palette, use filter and read
	 * https://richtabor.com/gutenberg-color-palettes/ and
	 * https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
	 */
	$editor_color_palette = apply_filters( 'luuptek_add_editor_color_palette', [] );
	add_theme_support( 'editor-color-palette', $editor_color_palette );

	// Disable color picker.
	// see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
	if ( apply_filters( 'luuptek_disable_custom_colors', true ) ) {
		add_theme_support( 'disable-custom-colors' );
	}

	// Disable pixel-based font sizing. Ie. the box where user can input font size in pixels
	// see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
	if ( apply_filters( 'luuptek_disable_custom_font_sizes', true ) ) {
		add_theme_support( 'disable-custom-font-sizes' );
	}

	// Disable custom gradient builder.
	// https://www.billerickson.net/wordpress-color-palette-button-styling-gutenberg/
	// https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-gradients
	if ( apply_filters( 'luuptek_disable_custom_gradients', true ) ) {
		add_theme_support( 'disable-custom-gradients' );
	}


	// Disable custom button color palette at least in buttons block.
	// https://www.billerickson.net/wordpress-color-palette-button-styling-gutenberg/
	// https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-gradient-presets
	add_theme_support( 'editor-gradient-presets', apply_filters( 'luuptek_add_editor_gradient_presets', [] ) );

	// Disable editor font sizes. Ie. the box where user can select font size like Medium and Large.
	// This is disabled, since usually theme styles override styles of gutenberg.
	// Thus classes like .has-large-font-size doesn't work in frontend
	if ( apply_filters( 'luuptek_disable_editor_font_sizes', true ) ) {
		add_theme_support( 'editor-font-sizes', [] );
	}

	// Disable core block patterns.
	// https://make.wordpress.org/core/2020/07/16/block-patterns-in-wordpress-5-5/
	if ( apply_filters( 'luuptek_disable_core_block_patterns', true ) ) {
		remove_theme_support( 'core-block-patterns' );
	}

	// Disable Gutenberg widgets
	// See: https://github.com/WordPress/classic-widgets/blob/trunk/classic-widgets.php#L30-L33
	if ( apply_filters( 'luuptek_disable_gutenberg_widgets', true ) ) {
		// Disables the block editor from managing widgets in the Gutenberg plugin.
		add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
		// Disables the block editor from managing widgets.
		add_filter( 'use_widgets_block_editor', '__return_false' );
	}

}, 9999 );


function luuptek_gutenberg_mu_plugin_enqueue() {
	// Allow devs to disable this plugin.
	if ( apply_filters( 'disable_luuptek_server_gutenberg', false ) ) {
		return;
	}

	/*
	 * Disable Gutenberg's full screen editor by default.
	 * User can still use full screen editing, but once page is reloaded
	 * the full screen editing mode will be disabled again.
	 *
	 * Fullscreen setting is saved to local storage, so to test this, delete WP_DATA_USER_{USER_ID} from local storage
	 */
	if ( apply_filters( 'luuptek_gutenberg_disable_fullscreen_default', true ) ) {
		$script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
		wp_add_inline_script( 'wp-blocks', $script );
	}

	wp_enqueue_script(
		'luuptek-gutenberg-mu-plugin',
		plugins_url( 'gutenberg.js', __FILE__ ),
		[ 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ],
		filemtime( plugin_dir_path( __FILE__ ) . '/gutenberg.js' )
	);

	$settings = [
		'disableButtonStyles' => true,
		'disableTextColor'    => false,
	];
	wp_localize_script(
		'luuptek-gutenberg-mu-plugin',
		'luuptekGutenbergSettings',
		apply_filters( 'luuptek_gutenberg_js_settings', $settings )
	);
}

add_action( 'enqueue_block_editor_assets', 'luuptek_gutenberg_mu_plugin_enqueue' );

/**
 * Remove unnecessary style-tags that were created in WP 5.9 onwards
 */
//remove_filter( 'render_block', 'wp_render_layout_support_flag', 10 );
//remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10 );
