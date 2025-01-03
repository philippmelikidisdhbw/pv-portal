<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function qcld_slider_hero_block_assets() { // phpcs:ignore
	// Styles.
	wp_enqueue_style(
		'qcld-slider-hero-style-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ) // Dependency to include the CSS after it.
	);
}

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'qcld_slider_hero_block_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function qcld_slider_hero_editor_assets() { // phpcs:ignore
	// Scripts.
	wp_enqueue_script(
		'qcld-slider-hero-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		true // Enqueue the script in the footer.
	);

	wp_localize_script( 'qcld-slider-hero-block-js', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );

	// Styles.
	wp_enqueue_style(
		'qcld-slider-hero-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
	);
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'qcld_slider_hero_editor_assets' );


//register server side block
register_block_type(
	'qcld-slider-hero/render-all-sliders',
	array(
		'render_callback' => 'qcld_slider_hero_list',
	)
);

function qcld_slider_hero_list(){
	global $wpdb;
	$sliders = $wpdb->get_results( "SELECT * FROM ".QCLD_TABLE_SLIDERS, ARRAY_A  );
	ob_start();
?>
	<img class="shortcode-static-graphics" src="<?php echo QCLD_SLIDERHERO_IMAGES.'/superman.png' ?>" alt="Slider Hero Graphics" width="150" height="150">
	<label>Select A Slider: <br />
        <select class='qcld_hero_shortcode_maker'>
        	<option value="0"><?php echo __('Select A Slider', 'qchero'); ?> </option>
        	<?php foreach ($sliders as $key => $value) { ?>
            	<option value="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></option>
            <?php } ?>
        </select>
    </label>
<?php
	return ob_get_clean();
}