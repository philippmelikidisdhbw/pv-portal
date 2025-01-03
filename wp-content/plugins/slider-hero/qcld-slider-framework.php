<?php



add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );

function qcld_slider_remove_ot_menu() {
	remove_submenu_page( 'themes.php', 'ot-theme-options' );
}
add_action( 'admin_init', 'qcld_slider_remove_ot_menu' );

add_filter( 'ot_header_version_text', 'sliderhero_ot_version_text_custom' );
function sliderhero_ot_version_text_custom() {
	$text = 'Developed by Web Design Company - QuantumCloud';

	return $text;
}

/**
 * Hook to register admin pages
 */
add_action( 'init', 'sliderhero_register_options_pages' );

/**
 * Registers all the required admin pages.
 */

function sliderhero_register_options_pages() {

	// Only execute in admin & if OT is installed
	if ( is_admin() && function_exists( 'ot_register_settings' ) ) {

		// Register the pages
		ot_register_settings(
			array(
				array(
					'id'    => 'sh_plugin_options',
					'pages' => array(
						array(
							'id'              => 'sliderhero_options',
							'parent_slug'     => 'Slider-Hero',
							'page_title'      => 'Settings',
							'menu_title'      => 'Settings',
							'capability'      => 'edit_theme_options',
							'menu_slug'       => 'sh-options-page',
							'icon_url'        => null,
							'position'        => null,
							'updated_message' => 'Hero Options Updated.',
							'reset_message'   => 'Hero Options Reset.',
							'button_text'     => 'Save Changes',
							'show_buttons'    => true,
							'screen_icon'     => 'options-general',
							'contextual_help' => null,

							'sections'        => array(
								array(
									'id'    => 'general',
									'title' => __( 'General', 'theme-text-domain' ),
								),
								array(
									'id'    => 'custom_css',
									'title' => __( 'Custom Code', 'theme-text-domain' ),
								),

							),
							'settings'        => array(

								array(
									'label'     => __( 'Enable Preloader' ),
									'id'        => 'hero_enable_preloader',
									'type'      => 'on-off',
									'desc'      => __( '' ),
									'std'       => 'on',
									'rows'      => '',
									'post_type' => '',
									'taxonomy'  => '',
									'class'     => '',
									'section'   => 'general',
								),
								array(
									'label'     => __( 'Preloader Image (Pro)' ),
									'id'        => 'hero_enable_preloader_image',
									'type'      => 'Upload',
									'desc'      => __( 'It\'s a pro feature. This will not work in free version.' ),
									'std'       => '',
									'rows'      => '',
									'post_type' => '',
									'taxonomy'  => '',
									'class'     => 'hero_pro_feature',
									'section'   => 'general',
								),

								array(
									'label'     => __( 'Enable CSS Override for page Background (Pro)' ),
									'id'        => 'hero_enable_css_override',
									'type'      => 'on-off',
									'desc'      => __( 'It\'s a pro feature. This will not work in free version.' ),
									'std'       => 'off',
									'rows'      => '',
									'post_type' => '',
									'taxonomy'  => '',
									'class'     => 'hero_pro_feature',
									'section'   => 'general',
								),
								array(
									'label'     => 'Custom Css',
									'id'        => 'sh_custom_style',
									'type'      => 'css',
									'desc'      => __( 'Write your custom CSS here.' ),
									'std'       => '',
									'rows'      => '',
									'post_type' => '',
									'taxonomy'  => '',
									'class'     => '',
									'section'   => 'custom_css',
								),
								array(
									'label'     => 'Custom Javascript',
									'id'        => 'sh_custom_js',
									'type'      => 'javascript',
									'desc'      => __( 'Write your custom Javascript code here. Do not need any script tag.' ),
									'std'       => '',
									'rows'      => '',
									'post_type' => '',
									'taxonomy'  => '',
									'class'     => '',
									'section'   => 'custom_css',
								),

							),
						),
					),
				),
			)
		);

	}

}


