<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Module Name: Audio
 */
class TB_Audio_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Audio', 'builder-audio' ),
			'slug' => 'audio'
		));
	}

	function get_assets() {
		$instance = Builder_Audio::get_instance();

		return array(
			'selector' => '.module-audio, .module-type-audio',
			'css' => themify_enque($instance->url . 'assets/style.css'),
			'js' => themify_enque($instance->url . 'assets/script.js'),
			'ver' => $instance->version
		);
	}

	public function get_options() {
		return array(
			array(
				'id' => 'mod_title_playlist',
				'type' => 'text',
				'label' => __( 'Module Title', 'builder-audio' ),
				'class' => 'large',
				'render_callback' => array(
					'binding' => 'live'
				)
			),
			array(
				'id' => 'music_playlist',
				'type' => 'builder',
				'options' => array(
					array(
						'id' => 'audio_name',
						'type' => 'text',
						'label' => __( 'Audio Name', 'builder-audio' ),
						'class' => 'large',
						'render_callback' => array(
							'binding' => 'live',
							'repeater' => 'music_playlist'
						)
					),
					array(
						'id' => 'audio_url',
						'type' => 'audio',
						'label' => __( 'Audio File URL', 'builder-audio' ),
						'class' => 'xlarge',
						'render_callback' => array(
							'binding' => 'live',
							'repeater' => 'music_playlist',
							'control_type' => 'textonchange'
						)
					),
					array(
						'id' => 'audio_buy_button_text',
						'type' => 'text',
						'label' => __( 'Buy Button Text', 'builder-audio' ),
						'class' => 'large',
						'render_callback' => array(
							'binding' => 'live',
							'repeater' => 'music_playlist'
						)
					),
					array(
						'id' => 'audio_buy_button_link',
						'type' => 'text',
						'label' => __( 'Buy Button Link', 'builder-audio' ),
						'class' => 'large',
						'render_callback' => array(
							'binding' => 'live',
							'repeater' => 'music_playlist'
						)
					)
				),
				'render_callback' => array(
					'binding' => 'live',
					'control_type' => 'repeater'
				)
			),
			array(
				'id' => 'hide_download_audio',
				'type' => 'select',
				'label' => __( 'Hide Download Link', 'builder-audio' ),
				'options' => array(
					'yes' => __( 'Yes', 'builder-audio' ),
					'no' => __( 'No', 'builder-audio' )
				),
				'render_callback' => array(
					'binding' => 'live'
				)
			),
			// Additional CSS
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr/>')
			),
			array(
				'id' => 'add_css_audio',
				'type' => 'text',
				'label' => __( 'Additional CSS Class', 'builder-audio' ),
				'class' => 'large exclude-from-reset-field',
				'help' => sprintf( '<br/><small>%s</small>', __( 'Add additional CSS class(es) for custom styling', 'builder-audio' ) ),
				'render_callback' => array(
					'binding' => 'live'
				)
			)
		);
	}

	public function get_default_settings() {
		return array(
			'music_playlist' => array( array(
				'audio_name' => esc_html__( 'Song Title', 'builder-audio' ),
				'audio_url'	 => 'https://themify.me/demo/themes/themes/wp-content/uploads/addon-samples/sample-song.mp3'
			) )
		);
	}

	public function get_animation() {
		$animation = array(
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . esc_html__( 'Appearance Animation', 'builder-audio' ) . '</h4>')
			),
			array(
				'id' => 'multi_Animation Effect',
				'type' => 'multi',
				'label' => __( 'Effect', 'builder-audio' ),
				'fields' => array(
					array(
						'id' => 'animation_effect',
						'type' => 'animation_select',
						'title' => __( 'Effect', 'builder-audio' )
					),
					array(
						'id' => 'animation_effect_delay',
						'type' => 'text',
						'title' => __( 'Delay', 'builder-audio' ),
						'class' => 'xsmall',
						'description' => __( 'Delay (s)', 'builder-audio' ),
					),
					array(
						'id' => 'animation_effect_repeat',
						'type' => 'text',
						'title' => __( 'Repeat', 'builder-audio' ),
						'class' => 'xsmall',
						'description' => __( 'Repeat (x)', 'builder-audio' ),
					),
				)
			)
		);

		return $animation;
	}

	public function get_styling() {
		$general = array(
			array(
				'id' => 'separator_image_background',
				'title' => '',
				'description' => '',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Background', 'builder-audio' ) . '</h4>' )
			),
			array(
				'id' => 'background_color',
				'type' => 'color',
				'label' => __( 'Background Color', 'builder-audio' ),
				'class' => 'small',
				'prop' => 'background-color',
				'selector' => '.module-audio'
			),
			// Font
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr />' )
			),
			array(
				'id' => 'separator_font',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Font', 'builder-audio' ) . '</h4>' )
			),
			array(
				'id' => 'font_family',
				'type' => 'font_select',
				'label' => __( 'Font Family', 'builder-audio' ),
				'class' => 'font-family-select',
				'prop' => 'font-family',
				'selector' => array( '.module-audio' )
			),
			array(
				'id' => 'font_color',
				'type' => 'color',
				'label' => __( 'Font Color', 'builder-audio' ),
				'class' => 'small',
				'prop' => 'color',
				'selector' => array( '.module-audio', '.module-audio a', '.module-audio .album-playlist .mejs-controls .mejs-playpause-button button' )
			),
			array(
				'id' => 'multi_font_size',
				'type' => 'multi',
				'label' => __( 'Font Size', 'builder-audio' ),
				'fields' => array(
					array(
						'id' => 'font_size',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'font-size',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'font_size_unit',
						'type' => 'select',
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => 'em', 'name' => __( 'em', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' )),
						)
					)
				)
			),
			array(
				'id' => 'multi_line_height',
				'type' => 'multi',
				'label' => __( 'Line Height', 'builder-audio' ),
				'fields' => array(
					array(
						'id' => 'line_height',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'line-height',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'line_height_unit',
						'type' => 'select',
						'meta' => array(
							array('value' => '', 'name' => ''),
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => 'em', 'name' => __( 'em', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					)
				)
			),
			array(
				'id' => 'text_align',
				'label' => __( 'Text Align', 'builder-audio' ),
				'type' => 'radio',
				'meta' => array(
					array( 'value' => '', 'name' => __( 'Default', 'builder-audio' ), 'selected' => true ),
					array( 'value' => 'left', 'name' => __( 'Left', 'builder-audio' ) ),
					array( 'value' => 'center', 'name' => __( 'Center', 'builder-audio' ) ),
					array( 'value' => 'right', 'name' => __( 'Right', 'builder-audio' ) ),
					array( 'value' => 'justify', 'name' => __( 'Justify', 'builder-audio' ) )
				),
				'prop' => 'text-align',
				'selector' => '.module-audio'
			),
			// Padding
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr />' )
			),
			array(
				'id' => 'separator_padding',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Padding', 'builder-audio' ) . '</h4>' )
			),
			array(
				'id' => 'multi_padding_top',
				'type' => 'multi',
				'label' => __( 'Padding', 'builder-audio' ),
				'fields' => array(
					array(
						'id' => 'padding_top',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'padding-top',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'padding_top_unit',
						'type' => 'select',
						'description' => __( 'top', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			array(
				'id' => 'multi_padding_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_right',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'padding-right',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'padding_right_unit',
						'type' => 'select',
						'description' => __( 'right', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			array(
				'id' => 'multi_padding_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_bottom',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'padding-bottom',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'padding_bottom_unit',
						'type' => 'select',
						'description' => __( 'bottom', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			array(
				'id' => 'multi_padding_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'padding_left',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'padding-left',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'padding_left_unit',
						'type' => 'select',
						'description' => __( 'left', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			// "Apply all" // apply all padding
			array(
				'id' => 'checkbox_padding_apply_all',
				'class' => 'style_apply_all style_apply_all_padding',
				'type' => 'checkbox',
				'label' => false,
				'options' => array(
					array( 'name' => 'padding', 'value' => __( 'Apply to all padding', 'builder-audio' ) )
				)
			),
			// Margin
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_margin',
				'type' => 'separator',
				'meta' => array('html'=>'<h4>'.__('Margin', 'builder-audio' ).'</h4>'),
			),
			array(
				'id' => 'multi_margin_top',
				'type' => 'multi',
				'label' => __( 'Margin', 'builder-audio' ),
				'fields' => array(
					array(
						'id' => 'margin_top',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'margin-top',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'margin_top_unit',
						'type' => 'select',
						'description' => __( 'top', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			array(
				'id' => 'multi_margin_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'margin_right',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'margin-right',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'margin_right_unit',
						'type' => 'select',
						'description' => __( 'right', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			array(
				'id' => 'multi_margin_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'margin_bottom',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'margin-bottom',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'margin_bottom_unit',
						'type' => 'select',
						'description' => __( 'bottom', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			array(
				'id' => 'multi_margin_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'margin_left',
						'type' => 'text',
						'class' => 'xsmall',
						'prop' => 'margin-left',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'margin_left_unit',
						'type' => 'select',
						'description' => __( 'left', 'builder-audio' ),
						'meta' => array(
							array('value' => 'px', 'name' => __( 'px', 'builder-audio' )),
							array('value' => '%', 'name' => __( '%', 'builder-audio' ))
						)
					),
				)
			),
			// "Apply all" // apply all margin
			array(
				'id' => 'checkbox_margin_apply_all',
				'class' => 'style_apply_all style_apply_all_margin',
				'type' => 'checkbox',
				'label' => false,
				'options' => array(
					array( 'name' => 'margin', 'value' => __( 'Apply to all margin', 'builder-audio' ) )
				)
			),
			// Border
			array(
				'type' => 'separator',
				'meta' => array('html'=>'<hr />')
			),
			array(
				'id' => 'separator_border',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Border', 'builder-audio' ) . '</h4>' )
			),
			array(
				'id' => 'multi_border_top',
				'type' => 'multi',
				'label' => __( 'Border', 'builder-audio' ),
				'fields' => array(
					array(
						'id' => 'border_top_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-top-color',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_top_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-top-width',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_top_style',
						'type' => 'select',
						'description' => __( 'top', 'builder-audio' ),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-top-style',
						'selector' => '.module-audio'
					)
				)
			),
			array(
				'id' => 'multi_border_right',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'border_right_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-right-color',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_right_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-right-width',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_right_style',
						'type' => 'select',
						'description' => __( 'right', 'builder-audio' ),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-right-style',
						'selector' => '.module-audio'
					)
				)
			),
			array(
				'id' => 'multi_border_bottom',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'border_bottom_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-bottom-color',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_bottom_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-bottom-width',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_bottom_style',
						'type' => 'select',
						'description' => __( 'bottom', 'builder-audio' ),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-bottom-style',
						'selector' => '.module-audio'
					)
				)
			),
			array(
				'id' => 'multi_border_left',
				'type' => 'multi',
				'label' => '',
				'fields' => array(
					array(
						'id' => 'border_left_color',
						'type' => 'color',
						'class' => 'small',
						'prop' => 'border-left-color',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_left_width',
						'type' => 'text',
						'description' => 'px',
						'class' => 'style_border style_field xsmall',
						'prop' => 'border-left-width',
						'selector' => '.module-audio'
					),
					array(
						'id' => 'border_left_style',
						'type' => 'select',
						'description' => __( 'left', 'builder-audio' ),
						'meta' => Themify_Builder_model::get_border_styles(),
						'prop' => 'border-left-style',
						'selector' => '.module-audio'
					)
				)
			),
			// "Apply all" // apply all border
			array(
				'id' => 'checkbox_border_apply_all',
				'class' => 'style_apply_all style_apply_all_border',
				'type' => 'checkbox',
				'label' => false,
				'default'=>'border',
				'options' => array(
					array( 'name' => 'border', 'value' => __( 'Apply to all border', 'builder-audio' ) )
				)
			),
		);

		$button_link = array(
			// Background
			array(
				'id' => 'audio_buy_button',
				'title' => '',
				'description' => '',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Background', 'themify' ) . '</h4>'),
			),
			array(
				'id' => 'audio_button_background_color',
				'type' => 'color',
				'label' => __( 'Background Color', 'themify' ),
				'class' => 'small',
				'prop' => 'background-color',
				'selector' => '.module-audio .track-buy'
			),
			array(
				'id' => 'audio_button_hover_background_color',
				'type' => 'color',
				'label' => __( 'Background Hover', 'themify' ),
				'class' => 'small',
				'prop' => 'background-color',
				'selector' => '.module-audio .track-buy:hover'
			),
			// Link
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr />' )
			),
			array(
				'id' => 'separator_link',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Link', 'themify' ) . '</h4>' )
			),
			array(
				'id' => 'audio_link_color',
				'type' => 'color',
				'label' => __( 'Color', 'themify' ),
				'class' => 'small',
				'prop' => 'color',
				'selector' => '.module-audio .track-buy'
			),
			array(
				'id' => 'audio_link_color_hover',
				'type' => 'color',
				'label' => __( 'Color Hover', 'themify' ),
				'class' => 'small',
				'prop' => 'color',
				'selector' => '.module-audio .track-buy:hover'
			),
			array(
				'id' => 'audio_text_decoration',
				'type' => 'select',
				'label' => __( 'Text Decoration', 'themify' ),
				'meta'	=> Themify_Builder_Model::get_text_decoration(),
				'prop' => 'text-decoration',
				'selector' => '.module-audio .track-buy'
			),
			// Padding
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr />' )
			),
			array(
				'id' => 'separator_padding',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Padding', 'themify' ) . '</h4>' ),
			),
			Themify_Builder_Model::get_field_group( 'padding', '.module-audio .track-buy', 'top', 'audio' ),
			Themify_Builder_Model::get_field_group( 'padding', '.module-audio .track-buy', 'right', 'audio' ),
			Themify_Builder_Model::get_field_group( 'padding', '.module-audio .track-buy', 'bottom', 'audio' ),
			Themify_Builder_Model::get_field_group( 'padding', '.module-audio .track-buy', 'left', 'audio' ),
			Themify_Builder_Model::get_field_group( 'padding', '.module-audio .track-buy', 'all', 'audio' ),
			// Margin
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr />' )
			),
			array(
				'id' => 'separator_margin',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Margin', 'themify' ) . '</h4>' ),
			),
			Themify_Builder_Model::get_field_group( 'margin', '.module-audio .track-buy', 'top', 'audio' ),
			Themify_Builder_Model::get_field_group( 'margin', '.module-audio .track-buy', 'right', 'audio' ),
			Themify_Builder_Model::get_field_group( 'margin', '.module-audio .track-buy', 'bottom', 'audio' ),
			Themify_Builder_Model::get_field_group( 'margin', '.module-audio .track-buy', 'left', 'audio' ),
			Themify_Builder_Model::get_field_group( 'margin', '.module-audio .track-buy', 'all', 'audio' ),
			// Border
			array(
				'type' => 'separator',
				'meta' => array( 'html' => '<hr />' )
			),
			array(
				'id' => 'separator_border',
				'type' => 'separator',
				'meta' => array( 'html' => '<h4>' . __( 'Border', 'themify' ) . '</h4>' ),
			),
			Themify_Builder_Model::get_field_group( 'border', '.module-audio .track-buy', 'top', 'audio' ),
			Themify_Builder_Model::get_field_group( 'border', '.module-audio .track-buy', 'right', 'audio' ),
			Themify_Builder_Model::get_field_group( 'border', '.module-audio .track-buy', 'bottom', 'audio' ),
			Themify_Builder_Model::get_field_group( 'border', '.module-audio .track-buy', 'left', 'audio' ),
			Themify_Builder_Model::get_field_group( 'border', '.module-audio .track-buy', 'all', 'audio' )
		);

		return array(
			array(
				'type' => 'tabs',
				'id' => 'module-styling',
				'tabs' => array(
					'general' => array(
					'label' => __( 'General', 'themify' ),
					'fields' => $general
					),
					'button_link' => array(
						'label' => __( 'Buy Button', 'themify' ),
						'fields' => $button_link
					)
				)
			)
		);
	}

	protected function _visual_template() {
		$module_args = $this->get_module_args();?>
		<div class="module module-<?php echo esc_attr( $this->slug ); ?> {{ data.add_css_audio }}">

			<# if( data.mod_title_playlist ) { #>
				<?php echo $module_args['before_title']; ?>
				{{{ data.mod_title_playlist }}}
				<?php echo $module_args['after_title']; ?>
			<# } 

			if( data.music_playlist ) { #>
				<div class="album-playlist">
					<div class="jukebox">
						<ol class="tracklist">
							<# _.each( data.music_playlist, function( item ) { #>
								<li class="track is-playable" itemprop="track" itemscope="" itemtype="http://schema.org/MusicRecording">
									<# if( item.audio_buy_button_link || item.audio_buy_button_text ) { #>
										<a class="ui builder_button default track-buy" href="{{ item.audio_buy_button_link || '#' }}">{{ item.audio_buy_button_text || 'Buy Now' }}</a>
									<# } #>
									
									<a class="track-title" href="#" itemprop="url">
										<# if( item.audio_name ) { #>
											<span itemprop="name">{{{ item.audio_name }}}</span>
										<# } #>
									</a>
									<# if( 'no' == data.hide_download_audio && item.audio_url ) { #>
										<a href="{{ item.audio_url }}" class="builder-audio-download" download><i class="fa fa-download"></i></a>
									<# } #>
									<# if( item.audio_url ) { #>
										<audio src="{{ item.audio_url }}"></audio>
									<# } #>
								</li>
							<# } ); #>
						</ol>
					</div><!-- .jukebox -->
				</div><!-- .album-playlist -->
			<# } #>
		</div>
	<?php
	}
}

Themify_Builder_Model::register_module( 'TB_Audio_Module' );