(function ($) {
    "use strict";

    var Medi = {
        init: function () {
            this.Basic.init();
        },

        Basic: {
            init: function () {
                this.scrollTop();
                this.BackgroundImage();
                this.Select2();
                this.Slider();
            },
            scrollTop: function () {
                $(window).on("scroll", function () {
                    var ScrollBarPosition = $(this).scrollTop();
                    if (ScrollBarPosition > 200) {
                        $(".scroll-top").fadeIn();
                    } else {
                        $(".scroll-top").fadeOut();
                    }
                });
                $(".scroll-top").on("click", function () {
                    $("body,html").animate({
                        scrollTop: 0,
                    });
                });
            },
            BackgroundImage: function () {
                $("[data-background]").each(function () {
                    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
                });
            },
            Select2: function () {
                $(document).ready(function () {
                    $(".ct-select-one").select2({
                        dropdownCssClass: "ls-select-one",
                        selectionCssClass: "ls-select-one-container",
                        containerCssClass: "container-ls-select",
                        customClass: "Myselectbox",
                    });
                });
            },
            Slider: function () {
                // Carousel only
                var swiperOnly = new Swiper(".carouselOnly", {
                    autoplay: {
                        delay: 1000,
                    },
                    loop: true,
                    slidesPerView: 2,
                    spaceBetween: 10,
                    breakpoints: {
                        576: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        1024: {
                            slidesPerView: 6,
                        },
                    },
                });

                // Carousel controls only
                var swiperOnly = new Swiper(".carouselControlsOnly", {
                    autoplay: true,
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });

                // Carousel Indicators only
                var swiperOnly = new Swiper(".carouselIndicatorsOnly", {
                    autoplay: true,
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination",
                    },
                });

                // Thumbs
                var swiper = new Swiper(".review-three-content", {
                    loop: true,
                    spaceBetween: 10,
                    slidesPerView: 1,
                    freeMode: true,
                    watchSlidesProgress: true,
                    centeredSlides: true,
                });
                var swiper2 = new Swiper(".review-three-thumb", {
                    loop: true,
                    slidesPerView: 1,
                    centeredSlides: true,
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 250,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    thumbs: {
                        swiper: swiper,
                    },
                });
            },
        },
    };
    jQuery(document).ready(function () {
        Medi.init();
    });
})(jQuery);


