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
		return __('Special Offers', 'plugin-name');
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
			'color_section',
			[
				'label' => __('Colors', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_so_box_ribbon_background_color',
			[
				'label' => __('Info Box Ribbon Background Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-offer-partial' => 'background-color: {{obpress_so_box_ribbon_background_color}}',
					'.obpress-so-mob-partial' => 'background-color: {{obpress_so_box_ribbon_background_color}}',
					'div.obpress-offer-partial-left::before' => 'border-right: 10px solid {{obpress_so_box_ribbon_background_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_so_box_ribbon_text_color',
			[
				'label' => __('Info Box Ribbon Text Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-offer-partial' => 'color: {{obpress_so_box_ribbon_text_color}}',
					'.obpress-so-mob-partial' => 'color: {{obpress_so_box_ribbon_text_color}}'
				],
			]
		);


		$this->add_control(
			'obpress_so_box_background_color',
			[
				'label' => __('Info Box Background Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-offer-info' => 'background-color: {{obpress_so_box_background_color}}',
					'.obpress-so-mob-slide' => 'background-color {{obpress_so_box_background_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_so_box_title_color',
			[
				'label' => __('Info Box Title Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#222222',
				'selectors' => [
					'.obpress-offer-description h5' => 'color: {{obpress_so_box_title_color}}',
					'.obpress-so-mob-slide-title .offer-name' => 'color: {{obpress_so_box_title_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_so_box_hotel_name_color',
			[
				'label' => __('Info Box Hotel Name Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#BEAD8E',
				'selectors' => [
					'.obpress-offer-description h6' => 'color: {{obpress_so_box_hotel_name_color}}',
					'.obpress-so-mob-slide-title .hotel-name' => 'color: {{obpress_so_box_hotel_name_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_so_box_text_color',
			[
				'label' => __('Info Box Text Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#2c2f33',
				'selectors' => [
					'.obpress-offer-description p, .obpress-offer-price p' => 'color: {{obpress_so_box_text_color}}',
					'.obpress-so-mob-slide-desc p' => 'color: {{obpress_so_box_text_color}}',
				],
			]
		);

		$this->add_control(
			'obpress_so_box_price_color',
			[
				'label' => __('Info Box Text Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#bead8e',
				'selectors' => [
					'.obpress-offer-number, .obpress-offer-night' => 'color: {{obpress_so_box_price_color}}',
					'.obpress-so-mob-slide-price-val' => 'color: {{obpress_so_box_price_color}}',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'so_button_section',
			[
				'label' => __('Button', 'OBPress_SpecialOffers'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_so_button_background_color',
			[
				'label' => __('Button Background Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-offer-more' => 'background-color: {{obpress_so_button_background_color}}',
					'.obpress-so-mob-slide-button' => 'background-color: {{obpress_so_button_background_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_so_button_text_color',
			[
				'label' => __('Button Text Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-offer-more' => 'color: {{obpress_so_button_text_color}}',
					'.obpress-so-mob-slide-button' => 'color: {{obpress_so_button_text_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'so_buttons_typography',
				'label' => __('Typography', 'OBPress_SpecialOffers'),
				'selector' => '.obpress-offer-more, .obpress-so-mob-slide-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'OBPress_SearchBarPlugin'),
				'selector' => '.obpress-offer-more, .obpress-so-mob-slide-button',
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
				'label' => __( 'Slider Transition(seconds)', 'OBPress_SearchBarPlugin' ),
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

		$this->add_control(
			'so_slide_pagination',
			[
				'label' => __( 'Slider Pagination', 'OBPress_SearchBarPlugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'lines',
				'options' => [
					'lines'  => __( 'Lines', 'plugin-domain' ),
					'bullets' => __( 'Bullets', 'plugin-domain' ),
					'disabled' => __( 'Disabled', 'plugin-domain')
				],
			]
		);

		$this->add_control(
			'so_number_of_slides',
			[
				'label' => __( 'Number of Pagination Bullets', 'OBPress_SearchBarPlugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
					'2'  => __( '2', 'plugin-domain' ),
					'3' => __( '3', 'plugin-domain' ),
					'4' => __( '4', 'plugin-domain'),
					'5' => __( '5', 'plugin-domain')
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
					'.obpress-swiper-nav .swiper-pagination-bullet' => 'background-color: {{obpress_so_pagination_bullet_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_so_pagination_bullet_back_icon',
			[
				'label' => __( 'Back Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'obpress_so_pagination_bullet_next_icon',
			[
				'label' => __( 'Next Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
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

		// var_dump($settings_so['so_slides_per_view']);
		// var_dump($settings_so['so_number_of_slides']);

		$plugin_directory_path = plugins_url( '', __FILE__ );

		require_once(WP_PLUGIN_DIR . '/OBPress_SpecialOffers/widget/assets/templates/template.php');
	}
}
