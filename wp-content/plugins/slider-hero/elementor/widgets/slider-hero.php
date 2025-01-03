<?php
namespace QCLD\Slider_Hero;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Elementor Slider Hero Widget.
 *
 * Main widget that create the slider hero widget
 *
 * @since 1.0.0
*/
class QCLD_SLIDER_HERO extends \Elementor\Widget_Base
{

	/**
	 * Get widget name
	 *
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'qcld-slider-hero-elementor';
	}

	/**
	 * Get widget title
	 *
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html( 'Slider Hero', 'elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-columns';
	}

	/**
	 * Retrieve the widget category.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_categories() {
		return [ 'quantumcloud-element' ];
	}

	/**
	 * Retrieve the widget category.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_name',
			[
				'label' => esc_html( 'Slider Heor', 'elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		
		global $wpdb;
		$table_name = $wpdb->prefix.'qcld_slider_hero_sliders';
		$squery   = "SELECT * FROM " . $table_name ;
		$qcherodata = $wpdb->get_results( $squery );

		$sliders_list = [
			0 => 'Select a Slider'
		];
		foreach ($qcherodata as $slider_key) {
			$sliders_list += [$slider_key->id => $slider_key->title];
		}

		$this->add_control(
			'slider_hero_id',
			[
				'label' => __( 'Select A Slider', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 0,
				'options' => $sliders_list,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$element_id = $this->get_id();
		$slider_id = intval($settings['slider_hero_id']);


		if( $slider_id > 0 ){
			if( is_admin() ){
				echo '[qcld_hero id='.esc_attr( $slider_id ).']';
			}else{
		?>
				<div class="qc_slider_hero_elemetor_block">
					<?php echo do_shortcode('[qcld_hero id='.esc_attr( $slider_id ).']'); ?>
				</div>
		<?php
			}
		}else{
		?>
			<div class="qc_slider_hero_elemetor_block">Select a Slider</div>
		<?php
		}
	}
}