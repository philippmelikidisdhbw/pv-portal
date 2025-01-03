<?php
namespace QCLD;
use QCLD\Slider_Hero;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class QCLD_SLIDER_HERO_MAIN {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'add_actions' ] );

	}

	/**
	 * Add Actions
	 * 
	 * Call all Essential Action hooks from here
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function add_actions(){

		// Enqueue Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles' ] );

		// Enqueue Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'enqueue_scripts' ] );
		
		// Register widget
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	/**
	 * Register Widget
	 * 
	 * Register Elementor Before After Image Comparison Slider From Here
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register_widgets() {

		require_once( 'widgets/slider-hero.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Slider_Hero\QCLD_SLIDER_HERO() );
	}

	public function enqueue_styles(){}

	public function enqueue_scripts(){}

}

new QCLD_SLIDER_HERO_MAIN();