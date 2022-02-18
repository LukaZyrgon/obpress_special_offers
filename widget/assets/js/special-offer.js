jQuery(window).on("elementor/frontend/init", function () {

  //hook name is 'frontend/element_ready/{widget-name}.{skin} - i dont know how skins work yet, so for now presume it will
  //always be 'default', so for example 'frontend/element_ready/slick-slider.default'
  //$scope is a jquery wrapped parent element
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/SpecialOffer.default",
    function ($scope, $) {
      console.log(screen.width);
      var isMobile = false;
      if(screen.width < 480) {
        isMobile = true;
      }

      var swiperSettings = {};
      var swiperSelector = jQuery(".obpress-swiper");

      swiperSettings.loop = swiperSelector.attr("data-allow-loop");
      swiperSettings.centeredSlides = swiperSelector.attr(
        "data-centered-slides"
      );

      swiperSettings.slidesPerView = swiperSelector.attr(
        "data-slides-per-view"
      );

      swiperSettings.spaceBetween = parseInt(
        swiperSelector.attr("data-space-between")
      );
      swiperSettings.speed =
        parseFloat(swiperSelector.attr("data-transition")) * 1000;
      swiperSettings.pagination = swiperSelector.attr("data-pagination");


      if (swiperSettings.loop != "true") {
        swiperSettings.loop = false;
      } else {
        swiperSettings.loop = true;
      }

      if (swiperSettings.centeredSlides != "true") {
        swiperSettings.centeredSlides = false;
      } else {
        swiperSettings.centeredSlides = true;
      }

      jQuery(".obpress-swiper")
        .find(".obpress-offer-info-holder")
        .css(
          "-webkit-transition",
          "opacity " + swiperSettings.speed / 1000 + "s ease-in"
        );

      const swiper = new Swiper(".obpress-swiper .swiper-container", {        
        // Optional parameters
        direction: "horizontal",
        loop: swiperSettings.loop,
        speed: swiperSettings.speed,
        slidesPerView: swiperSettings.slidesPerView,
        centeredSlides: swiperSettings.centeredSlides,
        spaceBetween: swiperSettings.spaceBetween,
        autoHeight: true,

        // If we need pagination
        pagination: {
          el: ".obpress-swiper .swiper-pagination",
        },

        // Navigation arrows
        navigation: {
          nextEl: ".obpress-swiper .swiper-button-next",
          prevEl: ".obpress-swiper .swiper-button-prev",
        },
        on: {
          init: function(){
            $(".obpress-special-offer-holder").css("opacity", '1');
          },
        }
      });

      

      swiper.on('init', function(){
        console.log('asd');
      });

    }
  );
});
