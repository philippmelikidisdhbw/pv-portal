<?php
/**
 * Keep this file as is. 
 * You can optionally add array() values to allow to customize theme design
 * See themes/customize.php as reference
 */

return array(
    array(
        'label' => esc_html__('Arrows', 'ml-slider'),
        'name' => 'arrows',
        'type' => 'section',
        'default' => 'on',
        'settings' => array(
            array(
                'label' => esc_html__('Background', 'ml-slider'),
                'type' => 'fields',
                'fields' => array(
                    array(
                        'label' => esc_html__('Default', 'ml-slider'),
                        'name' => 'arrows_color',
                        'type' => 'color',
                        'default' => 'rgba(255,255,255,0)',
                        'css' => '[ms_id] .flexslider ul.flex-direction-nav li a { background: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Hover', 'ml-slider'),
                        'name' => 'arrows_color_hover',
                        'type' => 'color',
                        'default' => 'rgba(255,255,255,0.3)',
                        'css' => '[ms_id] .flexslider:hover ul.flex-direction-nav li a { background: [ms_value] }'
                    )
                )
            ),
            array(
                'label' => esc_html__('Icon Colors', 'ml-slider'),
                'type' => 'fields',
                'fields' => array(
                    array(
                        'label' => esc_html__('Default', 'ml-slider'),
                        'name' => 'arrows_icon',
                        'type' => 'color',
                        'default' => '#ffffff',
                        'css' => '[ms_id] .flexslider .flex-direction-nav li a:before { background-color: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Hover', 'ml-slider'),
                        'name' => 'arrows_icon_hover',
                        'type' => 'color',
                        'default' => '#ffffff',
                        'css' => '[ms_id] .flexslider .flex-direction-nav li a:hover:before { background-color: [ms_value] }'
                    )
                )
            ),
            array(
                'label' => esc_html__('Distance from Edge', 'ml-slider'),
                'name' => 'arrows_distance_edge',
                'type' => 'range',
                'default' => 0,
                'metric' => 'px',
                'min' => -100,
                'max' => 100,
                'css' => array(
                    '[ms_id] .flexslider .flex-direction-nav li a.flex-prev { left: [ms_value]px }',
                    '[ms_id] .flexslider .flex-direction-nav li a.flex-next { right: [ms_value]px }'
                )
            ),
            /*array(
                'label' => esc_html__('Vertical Position', 'ml-slider'),
                'info' => esc_html__('Taking top as reference point. Set 50 to center.', 'ml-slider'),
                'name' => 'arrows_vertical_position',
                'type' => 'range',
                'default' => 50,
                'metric' => '%',
                'min' => 0,
                'max' => 100,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a.flex-prev, [ms_id] .flexslider .flex-direction-nav li a.flex-next { top: [ms_value]% }'
            ),*/
            array(
                'label' => esc_html__('Height', 'ml-slider'),
                'name' => 'arrows_height',
                'type' => 'range',
                'default' => 100,
                'metric' => 'px',
                'min' => 20,
                'max' => 150,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a { height: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Width', 'ml-slider'),
                'name' => 'arrows_width',
                'type' => 'range',
                'default' => 50,
                'metric' => 'px',
                'min' => 20,
                'max' => 150,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a { height: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Icon Size', 'ml-slider'),
                'name' => 'arrows_icon_size',
                'type' => 'range',
                'default' => 47,
                'metric' => 'px',
                'min' => 10,
                'max' => 60,
                'css' => '[ms_id] .flexslider ul.flex-direction-nav li a:before { mask-size: [ms_value]px auto }'
            ),
            array(
                'label' => esc_html__('Border Radius', 'ml-slider'),
                'name' => 'arrows_border_radius',
                'type' => 'range',
                'default' => 0,
                'metric' => '%',
                'min' => 0,
                'max' => 50,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a { border-radius: [ms_value]% }'
            )
        )
    ),
    array(
        'label' => esc_html__('Navigation', 'ml-slider'),
        'name' => 'navigation',
        'type' => 'section',
        'default' => 'on',
        'settings' => array(
            array(
                'label' => esc_html__('Colors', 'ml-slider'),
                'type' => 'fields',
                'fields' => array(
                    array(
                        'label' => esc_html__('Default', 'ml-slider'),
                        'name' => 'navigation_color',
                        'type' => 'color',
                        'default' => 'rgba(255,255,255,0.8)',
                        'css' => '[ms_id] .flexslider ol.flex-control-nav:not(.flex-control-thumbs) li a:not(.flex-active):not(:hover) { background: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Hover', 'ml-slider' ),
                        'name' => 'navigation_color_hover',
                        'type' => 'color',
                        'default' => 'rgba(255,255,255,0.8)',
                        'css' => '[ms_id] .flexslider ol.flex-control-nav:not(.flex-control-thumbs) li a:hover { border-color: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Active', 'ml-slider' ),
                        'name' => 'navigation_color_active',
                        'type' => 'color',
                        'default' => 'rgba(255,255,255,0.8)',
                        'css' => '[ms_id] .flexslider ol.flex-control-nav li a.flex-active { border-color: [ms_value] }'
                    )
                )
            ),
            /*array(
                'label' => esc_html__('Position', 'ml-slider'),
                'name' => 'navigation_position',
                'type' => 'select',
                'default' => 'bottom-center',
                'options' => array(
                    array(
                        'label' => esc_html__('Top Center', 'ml-slider'),
                        'value' => 'top-center'
                    ),
                    array(
                        'label' => esc_html__('Bottom Center', 'ml-slider'),
                        'value' => 'bottom-center'
                    ),
                    array(
                        'label' => esc_html__('Top Left', 'ml-slider'),
                        'value' => 'top-left'
                    ),
                    array(
                        'label' => esc_html__('Bottom Left', 'ml-slider'),
                        'value' => 'bottom-left'
                    ),
                    array(
                        'label' => esc_html__('Top Right', 'ml-slider'),
                        'value' => 'top-right'
                    ),
                    array(
                        'label' => esc_html__('Bottom Right', 'ml-slider'),
                        'value' => 'bottom-right'
                    )
                ),
                'css' => 'css_rules',
                'css_rules' => array(
                    'bottom-center' => '[ms_id] .flexslider .flex-control-nav:not(.flex-control-thumbs) { top: unset; bottom: 15px; justify-content: center; padding-left: unset; padding-right: unset }',
                    'top-center' => '[ms_id] .flexslider .flex-control-nav:not(.flex-control-thumbs) { top: 22px; bottom: unset; justify-content: center; padding-left: unset; padding-right: unset }',
                    'bottom-left' => '[ms_id] .flexslider .flex-control-nav:not(.flex-control-thumbs) { top: unset; bottom: 15px; justify-content: start; padding-left: 22px }',
                    'top-left' => '[ms_id] .flexslider .flex-control-nav:not(.flex-control-thumbs) { top: 22px; bottom: unset; justify-content: start; padding-left: 22px }',
                    'bottom-right' => '[ms_id] .flexslider .flex-control-nav:not(.flex-control-thumbs) { top: unset; bottom: 15px; justify-content: end; padding-left: unset; padding-right: 22px }',
                    'top-right' => '[ms_id] .flexslider .flex-control-nav:not(.flex-control-thumbs) { top: 22px; bottom: unset; justify-content: end; padding-left: unset; padding-right: 22px }',
                )
            ),*/
            array(
                'label' => esc_html__('Dots Border Radius', 'ml-slider'),
                'name' => 'navigation_border_radius',
                'type' => 'range',
                'default' => 0,
                'metric' => 'px',
                'min' => 0,
                'max' => 30,
                'css' => '[ms_id] .flexslider .flex-control-nav li a { border-radius: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Dots Size', 'ml-slider'),
                'name' => 'navigation_size',
                'type' => 'range',
                'default' => 15,
                'metric' => 'px',
                'min' => 5,
                'max' => 30,
                'css' => '[ms_id] .flexslider .flex-control-nav li a { width: [ms_value]px; height: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Dots Border Width', 'ml-slider'),
                'info' => esc_html__('Visible in active and hover navigation dot', 'ml-slider'),
                'name' => 'navigation_border_width',
                'type' => 'range',
                'default' => 2,
                'metric' => 'px',
                'min' => 1,
                'max' => 10,
                'css' => '[ms_id] .flexslider .flex-control-nav li a { border-width: [ms_value]px }'
            ),
        )
    ),
    array(
        'label' => esc_html__('Caption', 'ml-slider'),
        'name' => 'caption',
        'type' => 'section',
        'default' => 'on',
        'settings' => array(
            array(
                'label' => esc_html__('Colors', 'ml-slider'),
                'type' => 'fields',
                'fields' => array(
                    array(
                        'label' => esc_html__('Background', 'ml-slider'),
                        'name' => 'caption_background',
                        'type' => 'color',
                        'default' => 'rgba(0,0,0,0.8)',
                        'css' =>  '[ms_id] .flexslider .caption-wrap { background: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Text', 'ml-slider'),
                        'name' => 'caption_text_color',
                        'type' => 'color',
                        'default' => '#ffffff',
                        'css' => '[ms_id] .flexslider .caption-wrap .caption { color: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Links', 'ml-slider'),
                        'name' => 'caption_links_color',
                        'type' => 'color',
                        'default' => '#ffffff',
                        'css' => '[ms_id] .flexslider .caption-wrap a { color: [ms_value] }'
                    )
                )
            ),
            /*array(
                'label' => esc_html__('Position', 'ml-slider'),
                'name' => 'caption_position',
                'type' => 'select',
                'default' => 'bottom',
                'options' => array(
                    array(
                        'label' => esc_html__('Top', 'ml-slider'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => esc_html__('Bottom', 'ml-slider'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => esc_html__('Center', 'ml-slider'),
                        'value' => 'center'
                    )
                ),
                'css' => 'css_rules', // refer to css_rules where 'value' => '.lorem {}' is based on 'options' value
                'css_rules' => array(
                    'center' => '[ms_id] .flexslider .caption-wrap { bottom: unset; top: 50%; transform: translateY(-50%) }',
                    'bottom' => '[ms_id] .flexslider .caption-wrap { top: unset; bottom: 0 }',
                    'top' => '[ms_id] .flexslider .caption-wrap { top: 0; bottom: unset }'
                )
            ),*/
            array(
                'label' => esc_html__('Font Size', 'ml-slider'),
                'name' => 'caption_font_size',
                'type' => 'range',
                'default' => 0.9,
                'metric' => 'rem',
                'min' => 0.5,
                'max' => 3,
                'step' => 0.1,
                'css' => '[ms_id] .flexslider .caption-wrap .caption { font-size: [ms_value]rem }'
            ),
            array(
                'label' => esc_html__('Line Height', 'ml-slider'),
                'name' => 'caption_line_height',
                'type' => 'range',
                'default' => 1.4,
                'metric' => 'em',
                'min' => 0.5,
                'max' => 3,
                'step' => 0.1,
                'css' => '[ms_id] .flexslider .caption-wrap .caption { line-height: [ms_value]em }'
            ),
            array(
                'label' => esc_html__('Text Align', 'ml-slider'),
                'name' => 'caption_text_align',
                'type' => 'select',
                'default' => 'center',
                'options' => array(
                    array(
                        'label' => esc_html__('Left', 'ml-slider'),
                        'value' => 'left'
                    ),
                    array(
                        'label' => esc_html__('Right', 'ml-slider'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => esc_html__('Center', 'ml-slider'),
                        'value' => 'center'
                    )
                ),
                'css' => '[ms_id] .flexslider .caption-wrap .caption { text-align: [ms_value] }'
            ),
        )
    )
);