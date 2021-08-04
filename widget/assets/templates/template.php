<div class="obpress-special-offer-holder">
    <div class="obpress-swiper" data-allow-loop="<?= $settings_so['so_allow_loop']; ?>" data-centered-slides="<?= $settings_so['so_center_slides']; ?>" data-slides-per-view="<?= $settings_so['so_slides_per_view']['size']; ?>" data-space-between="<?= $settings_so['so_slider_space_between']['size']; ?>" data-transition="<?= $settings_so['obpress_slider_transition']['size']; ?>" data-pagination="<?= $settings_so['so_slide_pagination'] ?>"  data-number-of-slides="<?= $settings_so['so_number_of_slides']; ?>">
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php  
                    $slides = $settings_so['so_number_of_slides'] ;
                    $slide = 0;
                ?>

                <?php if(!empty($package_offers)) : ?>
                    <?php foreach($package_offers as $key=>$package_offer): ?>
                        <?php foreach($package_offer as $offer_key => $offer): ?>
                           
                            <?php 
                                foreach($hotels->PropertiesType->Properties as $hotel) {
                                    if($key == $hotel->HotelRef->HotelCode) {
                                        $hotelName = $hotel->HotelRef->HotelName;
                                       
                                        break;
                                    }
                                }                                
                            ?>
                            <div class="swiper-slide">
                                <div class="obpress-swiper-image" style="background-image:url(<?= $offer["image"]->ImageItemsType->ImageItems[0]->URL->Address ?>)">
                                </div>
                                <div class="obpress-offer-info-holder">
                                    <div class="obpress-offer-partial obpress-offer-partial-left">
                                        <?= 'Pay up to ' . $HotelDescriptiveContents[$key]->MaxPartialPaymentParcel . 'x' ?>  
                                    </div>                        
                                    <div class="obpress-offer-info">
                                        <div class="obpress-offer-description">
                                            <h5><?= $offer["get_rate_plans"]->RatePlanName ?></h5>
                                            <h6 class="obpress-offer-hotel-name"><?= $hotelName ?></h6>
                                            <?php
                                                if(strlen($offer["get_rate_plans"]->RatePlanDescription->Description) > 180) {
                                                    $offer["get_rate_plans"]->RatePlanDescription->Description = substr($offer["get_rate_plans"]->RatePlanDescription->Description, 0, 180) . '...';
                                                }
                                            ?>
                                            <p><?= $offer["get_rate_plans"]->RatePlanDescription->Description ?></p>
                                        </div>
                                        <div class="obpress-offer-price-button">
                                            <div class="obpress-offer-price">
                                                <p>Starting at <br><span class="obpress-offer-number">
                                                <?= Lang_Curr_Functions::ValueAndCurrencyCulture($offer["room_rate"]->Total->AmountBeforeTax, $currencies, $currency, $language) ?>
                                                </span><span class="obpress-offer-night">/Night</span></p>
                                            </div>
                                            <div class="obpress-offer-button">
                                                <button class="obpress-offer-more">See more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                // break when enough sldies

                                $slide++;

                                if ($slide >= $slides) {
                                    break;
                                }


                            ?>



                        <?php endforeach; ?>

                        <?php
                            // break when enough sldies

                                if ($slide >= $slides) {
                                    break;
                                }
                           
                        ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="obpress-swiper-nav">
                <div class="swiper-button-prev obpress-swiper-prev" <?php if(!empty($prevIcon)){ echo 'style="background-image:<?= '. $prevIcon . '?>"';} ?>>
                </div>
                <div class="swiper-pagination obpress-swiper-pagination <?php if($settings_so['so_slide_pagination'] == 'lines'){echo 'obpress-swiper-lines';} ?><?php if($settings_so['so_slide_pagination'] == 'disabled'){echo 'obpress-swiper-pagination-disabled';} ?>"></div>
                <div class="swiper-button-next obpress-swiper-next" <?php if(!empty($nextIcon)){ echo 'style="background-image:<?= '. $nextIcon . '?>"';} ?>>
                </div>
            </div>
        </div>
    </div>
</div>