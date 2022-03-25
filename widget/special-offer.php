<?php

class SpecialOffer extends \Elementor\Widget_Base
{

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		
		wp_register_script( 'special-offer_js',  plugins_url( '/OBPress_SpecialOffers/widget/assets/js/special-offer.js'), [ 'elementor-frontend' ], '1.0.0', true );

		wp_register_style( 'special-offer_css', plugins_url( '/OBPress_SpecialOffers/widget/assets/css/special-offer.css') );        
	}

	public function get_script_depends()
	{
		return ['special-offer_js'];
	}

	public function get_style_depends()
	{
		return ['special-offer_css'];
	}
	
	public function get_name()
	{
		return 'SpecialOffer';
	}

	public function get_title()
	{
		return __('Special Offers', 'OBPress_SpecialOffers');
	}

	public function get_icon()
	{
		return 'fa fa-calendar';
	}

	public function get_categories()
	{
		return ['OBPress'];
	}
	
	protected function _register_controls()
	{

		$this->start_controls_section(
			'image_section',
			[
				'label' => __('Image Section', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offer_image_height',
			[
				'label' => __( 'Height', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 400,
				],
				'range' => [
					'px' => [
						'max' => 500,
						'min' => 150,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-swiper-image' => 'min-height: {{SIZE}}px',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'offer_image_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'OBPress_SpecialOffers' ),
				'selector' => '.obpress-special-offer-holder .obpress-swiper .swiper-slide-active .obpress-swiper-image',
				'fields_options' => [
					'box_shadow_type' => [ 
						'default' =>'yes' 
					],
					'box_shadow' => [
						'default' =>[
							'horizontal' => 0,
							'vertical' => 14,
							'blur' => 24,
							'color' => '#bead8e33'
						]
					]
				]
			]
		);

		$this->add_control(
			'offer_image_ribbon_background_color',
			[
				'label' => __('Ribbon Backgroung Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder div.obpress-offer-partial-left' => 'background-color: {{offer_image_ribbon_background_color}}'
				],
			]
		);

		$this->add_control(
			'offer_image_ribbon_padding',
			[
				'label' => __( 'Ribbon Padding', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '10',
					'right' => '28',
					'bottom' => '10',
					'left' => '28',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder div.obpress-offer-partial-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'offer_image_ribbon_color',
			[
				'label' => __('Ribbon Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-special-offer-holder div.obpress-offer-partial-left' => 'color: {{offer_image_ribbon_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_image_ribbon_typography',
				'label' => __('Ribbon Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder div.obpress-offer-partial-left',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '16',
						],
					],
					'font_weight' => [
						'default' => '400',
					]
				],
			]
		);

		$this->add_control(
			'ribbon_vertical_position',
			[
				'label' => __( 'Ribbon Vertical Position', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'max' => 500,
						'min' => 0,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-special-offer-holder div.obpress-offer-partial-left' => 'top: {{SIZE}}px',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'info_box_section',
			[
				'label' => __('Info Section', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offer_info_box_bg_color',
			[
				'label' => __('Background Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-info-holder' => 'background-color: {{offer_info_box_bg_color}}'
				],
			]
		);

		$this->add_control(
			'offer_info_box_width',
			[
				'label' => __( 'Width', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 85,
				],
				'range' => [
					'px' => [
						'max' => 100,
						'min' => 0,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-info-holder' => 'max-width: {{SIZE}}%',
				],
			]
		);

		$this->add_control(
			'offer_info_box_padding',
			[
				'label' => __( 'Padding', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '20',
					'right' => '27',
					'bottom' => '27',
					'left' => '30',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'offer_info_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'OBPress_SpecialOffers' ),
				'selector' => '.obpress-special-offer-holder .obpress-offer-info',
				'fields_options' => [
					'box_shadow_type' => [ 
						'default' =>'yes' 
					],
					'box_shadow' => [
						'default' => [
							'horizontal' => 0,
							'vertical' => 14,
							'blur' => 54,
							'color' => '#bead8e33'
						]
					]
				]
			]
		);

		$this->add_control(
			'offer_info_justify_content',
			[
				'label' => __( 'Box Horizontal Alignmant', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'space-between',
				'options' => [
					'space-between'  => __( 'Space Between', 'OBPress_SpecialOffers' ),
					'space-around'  => __( 'Space Around', 'OBPress_SpecialOffers' ),
					'space-evenly'  => __( 'Space Evenly', 'OBPress_SpecialOffers' ),
					'flex-start'  => __( 'Flex Start', 'OBPress_SpecialOffers' ),
					'center' => __( 'Center', 'OBPress_SpecialOffers' ),
					'flex-end'  => __( 'Flex End', 'OBPress_SpecialOffers' ),
				],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-info' => 'justify-content: {{offer_info_justify_content}}'
				],
			]
		);

		$this->add_control(
			'offer_name_color',
			[
				'label' => __('Offer Name Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#222222',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-description h5' => 'color: {{offer_name_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_name_typography',
				'label' => __('Offer Name Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-offer-description h5',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '700',
					]
				],
			]
		);

		$this->add_responsive_control(
			'offer_name_alignment',
			[
				'label' => __( 'Offer Name Alignment', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-description h5' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'offer_name_margin',
			[
				'label' => __( 'Offer Name Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '7',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-description h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hotel_name_color',
			[
				'label' => __('Hotel Name Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#BEAD8E',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-hotel-name' => 'color: {{hotel_name_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotel_name_typography',
				'label' => __('Hotel Name Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-offer-hotel-name',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '600',
					]
				],
			]
		);

		$this->add_control(
			'hotel_name_margin',
			[
				'label' => __( 'Hotel Name Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '17',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-hotel-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'offer_description_color',
			[
				'label' => __('Offer Description Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#2c2f33',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-description p' => 'color: {{offer_description_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_description_typography',
				'label' => __('Offer Description Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-offer-description p',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '400',
					]
				],
			]
		);

		$this->add_responsive_control(
			'offer_description_alignment',
			[
				'label' => __( 'Decription Alignment', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-description p' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'so_button_section',
			[
				'label' => __('Price And Button', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offer_price_message_color',
			[
				'label' => __('Price Message Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#2c2f33',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-price p' => 'color: {{offer_price_message_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_price_message_typography',
				'label' => __('Price Message Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-offer-price p',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '12',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '15',
						],
					],
					
				],
			]
		);

		$this->add_responsive_control(
			'offer_price_message_alignment',
			[
				'label' => __( 'Price Message Alignment', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-price p' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'offer_price_color',
			[
				'label' => __('Price Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#bead8e',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-number, .obpress-special-offer-holder .obpress-offer-night' => 'color: {{offer_price_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_price_typography',
				'label' => __('Price Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-offer-number',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_price_night_typography',
				'label' => __('Night Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-offer-night',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
				],
			]
		);

		$this->add_control(
			'offer_price_margin',
			[
				'label' => __( 'Offer Price Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '7',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-number, .obpress-special-offer-holder .obpress-offer-night' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'so_custom_button_width',
			[
				'label' => esc_html__( 'Custom Button Width And Height', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'OBPress_SpecialOffers' ),
				'label_off' => esc_html__( 'Hide', 'OBPress_SpecialOffers' ),
				'return_value' => 'custom_width',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'button_alignment',
			[
				'label' => __( 'Alignment', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-button.custom_width' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'so_custom_button_width' => 'custom_width',
				],	
			]
		);

		$this->add_control(
			'custom_button_width',
			[
				'label' => esc_html__( 'Width', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-button.custom_width' => 'width: {{SIZE}}%',
				],
				'condition' => [
					'so_custom_button_width' => 'custom_width',
				],	
			]
		);

		$this->add_control(
			'custom_button_height',
			[
				'label' => esc_html__( 'Height', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 150,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-offer-button.custom_width a.obpress-offer-more' => 'height: {{SIZE}}px',
				],
				'condition' => [
					'so_custom_button_width' => 'custom_width',
				],	
			]
		);

		$this->add_control(
			'so_button_bg_color',
			[
				'label' => __('Button Background Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder a.obpress-offer-more' => 'background-color: {{so_button_bg_color}}'
				],
			]
		);

		$this->add_control(
			'so_button_color',
			[
				'label' => __('Button Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-special-offer-holder a.obpress-offer-more' => 'color: {{so_button_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'so_button_typography',
				'label' => __('Button Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder a.obpress-offer-more',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '700',
					]
				],
			]
		);

		$this->add_control(
			'so_button_bg_hover_color',
			[
				'label' => __('Button Background Hover Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder a.obpress-offer-more:hover' => 'background-color: {{so_button_bg_hover_color}}'
				],
			]
		);

		$this->add_control(
			'so_button_hover_color',
			[
				'label' => __('Button Hover Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-special-offer-holder a.obpress-offer-more:hover' => 'color: {{so_button_hover_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'so_buuton_border',
				'label' => __( 'Button Border', 'OBPress_SpecialOffers' ),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => '1',
							'right' => '1',
							'bottom' => '1',
							'left' => '1',
							'isLinked' => true,
						],
					],
					'color' => [
						'default' => '#000',
					],
				],
				'selector' => '.obpress-special-offer-holder a.obpress-offer-more',
			]
		);

		$this->add_control(
			'so_button_hover_border_color',
			[
				'label' => __('Button Hover Border Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder a.obpress-offer-more:hover' => 'border-color: {{so_button_hover_border_color}}'
				],
			]
		);

		$this->add_control(
			'so_button_hover_transition',
			[
				'label' => __( 'Button Transition', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-special-offer-holder a.obpress-offer-more' => 'transition: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'so_slider_section',
			[
				'label' => __('Slider', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'so_allow_loop',
			[
				'label' => __('Allow Image Looping', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'OBPress_SpecialOffers'),
				'label_off' => __('Off', 'OBPress_SpecialOffers'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'so_center_slides',
			[
				'label' => __('Centered Slides', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'OBPress_SpecialOffers'),
				'label_off' => __('Off', 'OBPress_SpecialOffers'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'so_slides_per_view',
			[
				'label' => __('Slides Per View', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['slides'],
				'range' => [
					'slides' => [
						'min' => 1,
						'max' => 10,
						'step' => 0.1,
					]
				],
				'default' => [
					'unit' => 'slides',
					'size' => 2.7,
				]
			]
		);

		$this->add_control(
			'so_slider_space_between',
			[
				'label' => __( 'Space Between Slides', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				]
			]
		);

		$this->add_control(
			'obpress_slider_transition',
			[
				'label' => __( 'Slider Transition(seconds)', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 's'],
				'range' => [
					's' => [
						'min' => 0,
						'max' => 5,
						'step' => 0.1,
					]
				],
				'default' => [
					'unit' => 's',
					'size' => 1,
				]
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'so_pagination_section',
			[
				'label' => __('Pagination And Buttons', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'so_slider_previous_nest_btn_width',
			[
				'label' => __( 'Button Width', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'.obpress-special-offer-holder div.so-obpress-swiper-prev, .obpress-special-offer-holder div.so-obpress-swiper-next' => 'width: {{SIZE}}px',
				]
			]
		);

		$this->add_control(
			'so_slider_previous_nest_btn_height',
			[
				'label' => __( 'Button Height', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'.obpress-special-offer-holder div.so-obpress-swiper-prev, .obpress-special-offer-holder div.so-obpress-swiper-next' => 'height: {{SIZE}}px',
				]
			]
		);

		$this->add_control(
			'so_previous_button_margin',
			[
				'label' => __( 'Previous Button Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '0',
					'right' => '80',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder div.so-obpress-swiper-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'so_next_button_margin',
			[
				'label' => __( 'Nest Button Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '80',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder div.so-obpress-swiper-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'obpress_so_pagination_bullet_back_icon',
			[
				'label' => __( 'Back Icon', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'obpress_so_pagination_bullet_next_icon',
			[
				'label' => __( 'Next Icon', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'so_slide_pagination',
			[
				'label' => __( 'Slider Pagination', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'lines',
				'options' => [
					'lines'  => __( 'Lines', 'OBPress_SpecialOffers' ),
					'bullets' => __( 'Bullets', 'OBPress_SpecialOffers' ),
					'disabled' => __( 'Disabled', 'OBPress_SpecialOffers')
				],
			]
		);

		$this->add_control(
			'so_number_of_slides',
			[
				'label' => __( 'Number of Pagination Bullets', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
					'2'  => __( '2', 'OBPress_SpecialOffers' ),
					'3' => __( '3', 'OBPress_SpecialOffers' ),
					'4' => __( '4', 'OBPress_SpecialOffers'),
					'5' => __( '5', 'OBPress_SpecialOffers')
				],
			]
		);

		$this->add_control(
			'obpress_so_pagination_bullet_color',
			[
				'label' => __('Pagination Bullet Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-swiper-nav .swiper-pagination-bullet' => 'background-color: {{obpress_so_pagination_bullet_color}}'
				],
			]
		);

		$this->add_control(
			'so_pagination_margin',
			[
				'label' => __( 'Pagination Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '0',
					'right' => '10',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-swiper-nav .swiper-pagination-bullet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'so_pagination_active_width',
			[
				'label' => __( 'Pagination Active Width', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-swiper-lines .swiper-pagination-bullet-active' => 'width: {{SIZE}}px!important',
				]
			]
		);

		$this->add_control(
			'so_pagination_inactive_width',
			[
				'label' => __( 'Pagination Width', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-swiper-lines .swiper-pagination-bullet' => 'width: {{SIZE}}px',
				]
			]
		);

		$this->add_control(
			'so_pagination_height',
			[
				'label' => __( 'Pagination Height', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 8,
				],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-swiper-nav .swiper-pagination-bullet' => 'height: {{SIZE}}px',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'so_see_all_button_section',
			[
				'label' => __('See All Section', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'so_see_all_margin',
			[
				'label' => __( 'Margin', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '28',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-special-offer-holder .obpress-special-offer-link-holder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'so_see_all_justify_content',
			[
				'label' => __( 'Horizontal Alignment', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'OBPress_SpecialOffers' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-special-offer-link-holder' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'so_see_all_color',
			[
				'label' => __('Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-special-offer-link-holder a' => 'color: {{so_see_all_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'so_see_all_typography',
				'label' => __('Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-special-offer-holder .obpress-special-offer-link-holder a',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '500',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
					'text_decoration' => [
						'default' => 'underline',
					]
				],
			]
		);

		$this->add_control(
			'so_see_all_hover_color',
			[
				'label' => __('Hover Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-special-offer-link-holder a:hover' => 'color: {{so_see_all_hover_color}}'
				],
			]
		);

		$this->add_control(
			'so_see_all_transition',
			[
				'label' => __( 'Button Transition', 'OBPress_SpecialOffers' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-special-offer-holder .obpress-special-offer-link-holder a' => 'transition: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		ini_set("xdebug.var_display_max_children", '-1');
		ini_set("xdebug.var_display_max_data", '-1');
		ini_set("xdebug.var_display_max_depth", '-1');

		$settings_so = $this->get_settings_for_display();
		$chain = get_option('chain_id');

		require_once(WP_CONTENT_DIR . '/plugins/obpress_plugin_manager/BeApi/BeApi.php');
		
		require_once(WP_PLUGIN_DIR . '/obpress_plugin_manager/class-lang-curr-functions.php');
		new Lang_Curr_Functions();

		Lang_Curr_Functions::chainOrHotel($id);


		$languages = Lang_Curr_Functions::getLanguagesArray();
		$language = Lang_Curr_Functions::getLanguage();
		$language_object = Lang_Curr_Functions::getLanguageObject();        
	
		$currencies = Lang_Curr_Functions::getCurrenciesArray();
		$currency = Lang_Curr_Functions::getCurrency();
	

		// $currencies = BeApi::getCurrencies($chain);

		foreach ($currencies as $currency_from_api) {
			if ($currency_from_api->UID == $currency) {
				$currency_string = $currency_from_api->CurrencySymbol;
				break;
			}
		}



		// $hotels = BeApi::getHotelSearchForChain($chain, "true", $language);
		$hotels = BeApi::ApiCache('hotel_search_chain_'.$chain.'_'.$language.'_true', BeApi::$cache_time['hotel_search_chain'], function() use ($chain, $language){
            return BeApi::getHotelSearchForChain($chain, "true",$language);
        });		

		if ($hotels->PropertiesType != null) {
			$properties = $hotels->PropertiesType->Properties;
			foreach ($properties as $key => $propertyFromHotels) {
				$properties[$propertyFromHotels->HotelRef->HotelCode] = $propertyFromHotels;
				unset($properties[$key]);
			}

			$HotelDescriptiveContents = $properties;
		} else {
			$HotelDescriptiveContents = null;
		}

		// $available_packages = BeApi::getClientAvailablePackages($chain, $currency, $language);
        $available_packages = BeApi::ApiCache('available_packages_4_'.$chain.'_'.$currency.'_'.$language.'_'.$mobile, BeApi::$cache_time['available_packages_4'], function() use ($chain, $currency, $language, $mobile){
            return BeApi::getClientAvailablePackages($chain, $currency, $language);
        });		

		$rateplans = [];
		$package_offers = [];

		if ($available_packages->RoomStaysType != null) {
			$hotels_from_packages = [];
			foreach ($available_packages->RoomStaysType->RoomStays as $RoomStay) {
				$hotels_from_packages[] = $RoomStay->BasicPropertyInfo->HotelRef->HotelCode;
			}

			foreach ($hotels_from_packages as $hotel_from_packages) {

				// $rateplans[] = BeApi::getHotelRatePlans($hotel_from_packages, $language);
                $rateplans[] = BeApi::ApiCache('rateplans_array_'.$hotel_from_packages.'_'.$language, BeApi::$cache_time['rateplans_array'], function() use ($hotel_from_packages, $language){
                    $response = BeApi::getHotelRatePlans($hotel_from_packages, $language);

                    if($response != false) {
                        return $response;
                    }
                    else {
                        return [];
                    }
                });				
			}

			$rateplans_per_hotel = [];
			foreach ($rateplans as $rateplan) {
				if (isset($rateplan->RatePlans)) {
					foreach ($rateplan->RatePlans->RatePlan as $RatePlan) {
						if ($RatePlan->RatePlanTypeCode == 11) {
							$rateplans_per_hotel[$rateplan->RatePlans->HotelRef->HotelCode][$RatePlan->RatePlanID] = $RatePlan;
						}
					}
				}
			}

			foreach ($available_packages->RoomStaysType->RoomStays as $RoomStay) {
				foreach ($RoomStay->RatePlans as $RatePlan) {
					$package_offers[$RoomStay->BasicPropertyInfo->HotelRef->HotelCode][$RatePlan->RatePlanID]["rate_plan"] = $RatePlan;
				}
				foreach ($RoomStay->RoomRates as $RoomRate) {
					$package_offers[$RoomStay->BasicPropertyInfo->HotelRef->HotelCode][$RoomRate->RatePlanID]["room_rate"] = $RoomRate;
				}
			}

			if ($available_packages->TPA_Extensions != null) {
				foreach ($available_packages->TPA_Extensions->MultimediaDescriptionsType->MultimediaDescriptions as  $MultimediaDescription) {
					foreach ($package_offers as $hotel_code => $package_offer) {
						foreach ($package_offer as $rate_plan_code => $offer) {
							if ($MultimediaDescription->ID == $rate_plan_code) {
								$package_offers[$hotel_code][$rate_plan_code]["image"] = $MultimediaDescription;
							}
						}
					}
				}
			}

			foreach ($package_offers as $hotel_code => $package_offer) {
				foreach ($package_offer as $rate_plan_code => $offer) {
					foreach ($rateplans_per_hotel as $hotel_code2 => $per_hotel) {
						foreach ($per_hotel as $rate_plan_code2 => $rateplan) {
							if ($rate_plan_code2 == $rate_plan_code) {
								$package_offers[$hotel_code][$rate_plan_code]["get_rate_plans"] = $rateplan;
							}
						}
					}
				}
			}
		}

		$prevIcon = "";
		$nextIcon = "";


		if(isset($settings_so['obpress_so_pagination_bullet_back_icon']['value']['url']) && !empty($settings_so['obpress_so_pagination_bullet_back_icon']['value']['url'])) {
			$prevIcon = $settings_so['obpress_so_pagination_bullet_back_icon']['value']['url'];
		}

		if(isset($settings_so['obpress_so_pagination_bullet_next_icon']['value']['url']) && !empty($settings_so['obpress_so_pagination_bullet_next_icon']['value']['url'])){
			$nextIcon = $settings_so['obpress_so_pagination_bullet_next_icon']['value']['url'];
		}


		$plugin_directory_path = plugins_url( '', __FILE__ );

		$pagination_type = $settings_so['so_slide_pagination'];

		require_once(WP_PLUGIN_DIR . '/OBPress_SpecialOffers/widget/assets/templates/template.php');
	}
}
