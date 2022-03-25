<div class="obpress-special-offer-holder">
    <div class="obpress-swiper" data-allow-loop="<?= $settings_so['so_allow_loop']; ?>" data-centered-slides="<?= $settings_so['so_center_slides']; ?>" data-slides-per-view="<?= $settings_so['so_slides_per_view']['size']; ?>" data-space-between="<?= $settings_so['so_slider_space_between']['size']; ?>" data-transition="<?= $settings_so['obpress_slider_transition']['size']; ?>" data-pagination="<?= $settings_so['so_slide_pagination'] ?>" data-number-of-slides="<?= $settings_so['so_number_of_slides']; ?>">
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php
                    $slides = $settings_so['so_number_of_slides'];
                    $slide = 0;
                ?>

                <?php if (!empty($package_offers)) : ?>
                    <?php foreach ($package_offers as $key => $package_offer) : ?>
                        <?php foreach ($package_offer as $offer_key => $offer) : ?>
                            <?php
                            foreach ($hotels->PropertiesType->Properties as $hotel) {
                                if ($key == $hotel->HotelRef->HotelCode) {
                                    $hotelName = $hotel->HotelRef->HotelName;

                                    break;
                                }
                            }
                            ?>
                            <div class="swiper-slide">

                                <div class="obpress-swiper-image" style="background-image:url(<?php
                                        if (isset($offer["image"]->ImageItemsType->ImageItems[0]->URL->Address)) {
                                            echo $offer["image"]->ImageItemsType->ImageItems[0]->URL->Address;
                                        } else {
                                            echo $plugin_directory_path . '/assets/icons/placeholderNewWhite.svg';
                                        }
                                    ?>
                                )">
                                </div>

                                <div class="obpress-offer-info-holder">
                                    <div class="obpress-offer-partial obpress-offer-partial-left">
                                        <?php _e('Pay up to','OBPress_SpecialOffers') ?><?= $HotelDescriptiveContents[$key]->MaxPartialPaymentParcel . 'x' ?> 
                                    </div>
                                    <div class="obpress-offer-info">
                                        <div class="obpress-offer-description">
                                            <h5><?= $offer["get_rate_plans"]->RatePlanName ?></h5>
                                            <h6 class="obpress-offer-hotel-name"><?= $hotelName ?></h6>
                                            <?php
                                            if (strlen($offer["get_rate_plans"]->RatePlanDescription->Description) > 180) {
                                                $offer["get_rate_plans"]->RatePlanDescription->Description = substr($offer["get_rate_plans"]->RatePlanDescription->Description, 0, 180) . '...';
                                            }
                                            ?>
                                            <p><?= $offer["get_rate_plans"]->RatePlanDescription->Description ?></p>
                                        </div>
                                        <div class="obpress-offer-price-button">
                                            <div class="obpress-offer-price">
                                                <p>
                                                    <?php _e('Starting at','OBPress_SpecialOffers') ?> 
                                                    <br>
                                                    <span class="obpress-offer-number">
                                                        <?= Lang_Curr_Functions::ValueAndCurrencyCulture($offer["room_rate"]->Total->AmountBeforeTax, $currencies, $currency, $language) ?>
                                                    </span>
                                                    <span class="obpress-offer-night">/<?php _e('Night','OBPress_SpecialOffers') ?> </span>
                                                </p>
                                            </div>
                                            <div class="obpress-offer-button <?= $settings_so['so_custom_button_width']; ?>">
                                                <a class="obpress-offer-more" href="/package?package_id=<?= $offer["rate_plan"]->RatePlanID ?>"><?php _e('See more','OBPress_SpecialOffers') ?> </a>
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
                <div class="swiper-button-prev so-obpress-swiper-prev" <?php if (!empty($prevIcon)) echo 'style="background-image: url(' . $prevIcon . ')"';  ?>>
                </div>
                <div class="swiper-pagination so-obpress-swiper-pagination <?= 'obpress-swiper-' . $pagination_type; ?>"></div>
                <div class="swiper-button-next so-obpress-swiper-next" <?php if (!empty($nextIcon)) {
                                                                        echo 'style="background-image: url(' . $nextIcon . ')"';
                                                                    } ?>>
                </div>
            </div>
        </div>
    </div>
    <div class="obpress-special-offer-link-holder">
        <a href="/packages"><?php _e('See all','OBPress_SpecialOffers') ?> </a>
    </div>
</div>

<div class="obpress-special-offer-holder-mobile">
    <?php if (!empty($package_offers)) : ?>
        <?php foreach ($package_offers as $key => $package_offer) : ?>
            <?php foreach ($package_offer as $offer_key => $offer) : ?>
                <?php
                    foreach ($hotels->PropertiesType->Properties as $hotel) {
                        if ($key == $hotel->HotelRef->HotelCode) {
                            $hotelName = $hotel->HotelRef->HotelName;

                            break;
                        }
                    }
                ?>
                <div class="obpress-so-mob-slide">
                    <div class="obpress-so-mob-partial-payment">
                        <div class="obpress-so-mob-partial obpressso-mob-partial-left">
                            <?php _e('Pay up to','OBPress_SpecialOffers') ?><?= $HotelDescriptiveContents[$key]->MaxPartialPaymentParcel . 'x' ?>
                        </div>                        
                    </div>
                    <div class="obpress-so-mob-slide-image" style="background-image:url(<?php
                    if (isset($offer["image"]->ImageItemsType->ImageItems[0]->URL->Address)) {
                        echo $offer["image"]->ImageItemsType->ImageItems[0]->URL->Address;
                    } else {
                        echo $plugin_directory_path . '/assets/icons/placeholderNewWhite.svg';
                    }
                    ?>
                    )">
                    </div>
                    <div class="obpress-so-mob-slide-title">
                        <span class="offer-name"><?= $offer["get_rate_plans"]->RatePlanName ?></span>
                        <span class="hotel-name"><?= $hotelName ?></span>
                    </div>
                    <div class="obpress-so-mob-slide-desc">
                        <?php
                            if (strlen($offer["get_rate_plans"]->RatePlanDescription->Description) > 180) {
                                $offer["get_rate_plans"]->RatePlanDescription->Description = substr($offer["get_rate_plans"]->RatePlanDescription->Description, 0, 180) . '...';
                            }
                        ?>
                        <p><?= $offer["get_rate_plans"]->RatePlanDescription->Description ?></p>
                    </div>
                    <div class="obpress-so-mob-slide-price-holder">
                        <p class="obpress-so-mob-slide-price-string"><?php _e('Starting at','OBPress_SpecialOffers') ?> </p>
                        <p class="obpress-so-mob-slide-price-val"><?= Lang_Curr_Functions::ValueAndCurrencyCulture($offer["room_rate"]->Total->AmountBeforeTax, $currencies, $currency, $language) ?></p>
                    </div>
                    <div class="obpress-so-mob-slide-button-holder">
                        <a href="/package?package_id=<?= $offer["rate_plan"]->RatePlanID ?>" class="obpress-so-mob-slide-button"><?php _e('View More','OBPress_SpecialOffers') ?> </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>