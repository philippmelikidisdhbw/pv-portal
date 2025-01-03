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
                        'default' => '#016fb9',
                        'css' => '[ms_id] .flexslider .flex-direction-nav li a { background-color: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Hover', 'ml-slider'),
                        'name' => 'arrows_color_hover',
                        'type' => 'color',
                        'default' => '#016fb9',
                        'css' => '[ms_id] .flexslider .flex-direction-nav li a:hover { background-color: [ms_value] }'
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
                        'css' => '[ms_id] .flexslider .flex-direction-nav li a:after { background-color: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Hover', 'ml-slider'),
                        'name' => 'arrows_icon_hover',
                        'type' => 'color',
                        'default' => '#ffffff',
                        'css' => '[ms_id] .flexslider .flex-direction-nav li a:hover:after { background-color: [ms_value] }'
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
                'max' => 50,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a.flex-prev, [ms_id] .flexslider .flex-direction-nav li a.flex-next { top: [ms_value]% }'
            ),*/
            array(
                'label' => esc_html__('Height', 'ml-slider'),
                'name' => 'arrows_height',
                'type' => 'range',
                'default' => 36,
                'metric' => 'px',
                'min' => 20,
                'max' => 100,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a { height: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Width', 'ml-slider'),
                'name' => 'arrows_width',
                'type' => 'range',
                'default' => 60,
                'metric' => 'px',
                'min' => 20,
                'max' => 100,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a { width: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Icon Size', 'ml-slider'),
                'name' => 'arrows_icon_size',
                'type' => 'range',
                'default' => 12,
                'metric' => 'px',
                'min' => 0,
                'max' => 30,
                'css' => '[ms_id] .flexslider .flex-direction-nav li a:after { mask-size: [ms_value]px auto }'
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
                        'default' => '#016fb9',
                        'css' => array(
                            '[ms_id] .flexslider .flex-control-nav li a:not(.flex-active) { background: [ms_value] }',
                            '[ms_id] .flexslider .flex-control-nav li a.flex-active { border-color: [ms_value] }'
                        )
                    ),
                    array(
                        'label' => esc_html__('Hover', 'ml-slider'),
                        'name' => 'navigation_color_hover',
                        'type' => 'color',
                        'default' => '#016fb9',
                        'css' => array(
                            '[ms_id] .flexslider .flex-control-nav li a:not(.flex-active):hover { background: [ms_value] }',
                            '[ms_id] .flexslider .flex-control-nav li a.flex-active { border-color: [ms_value] }'
                        )
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
                    'bottom-center' => '[ms_id] .flexslider .flex-control-nav { top: unset; bottom: 20px; text-align: center; padding-left: unset; padding-right: unset }',
                    'top-center' => '[ms_id] .flexslider .flex-control-nav { top: 20px; bottom: unset; text-align: center; padding-left: unset; padding-right: unset }',
                    'bottom-left' => '[ms_id] .flexslider .flex-control-nav { top: unset; bottom: 20px; text-align: left; padding-left: 20px }',
                    'top-left' => '[ms_id] .flexslider .flex-control-nav { top: 20px; bottom: unset; text-align: left; padding-left: 20px }',
                    'bottom-right' => '[ms_id] .flexslider .flex-control-nav { top: unset; bottom: 20px; text-align: right; padding-left: unset; padding-right: 20px }',
                    'top-right' => '[ms_id] .flexslider .flex-control-nav { top: 20px; bottom: unset; text-align: right; padding-left: unset; padding-right: 20px }',
                )
            ),*/
            array(
                'label' => esc_html__('Dots Border Radius', 'ml-slider'),
                'name' => 'navigation_border_radius',
                'type' => 'range',
                'default' => 0,
                'metric' => '%',
                'min' => 0,
                'max' => 50,
                'css' => '[ms_id] .flexslider .flex-control-nav li a { border-radius: [ms_value]% }'
            ),
            array(
                'label' => esc_html__('Dots Size', 'ml-slider'),
                'name' => 'navigation_size',
                'type' => 'range',
                'default' => 16,
                'metric' => 'px',
                'min' => 5,
                'max' => 30,
                'css' => '[ms_id] .flexslider .flex-control-nav li a { width: [ms_value]px; height: [ms_value]px }'
            ),
            array(
                'label' => esc_html__('Dots Border Width', 'ml-slider'),
                'name' => 'navigation_border_width',
                'type' => 'range',
                'default' => 1,
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
                        'default' => '#ffffff',
                        'css' => '[ms_id] .flexslider .caption-wrap .caption { background: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Text', 'ml-slider'),
                        'name' => 'caption_text_color',
                        'type' => 'color',
                        'default' => '#333333',
                        'css' => '[ms_id] .flexslider .caption-wrap .caption { color: [ms_value] }'
                    ),
                    array(
                        'label' => esc_html__('Links', 'ml-slider'),
                        'name' => 'caption_links_color',
                        'type' => 'color',
                        'default' => '#016fb9',
                        'css' => '[ms_id] .flexslider .caption-wrap a { color: [ms_value] }'
                    )
                )
            ),
            array(
                'label' => esc_html__('Font Size', 'ml-slider'),
                'name' => 'caption_font_size',
                'type' => 'range',
                'default' => 1,
                'metric' => 'em',
                'min' => 0.5,
                'max' => 3,
                'step' => 0.1,
                'css' => '[ms_id] .flexslider .caption-wrap .caption { font-size: [ms_value]em }'
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
                'default' => 'left',
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