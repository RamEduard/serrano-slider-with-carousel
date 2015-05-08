(function($) {
    $(document).ready(function () {
        $('.slider-container').owlCarousel({
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1,
            itemsDesktop: false,
            itemsDesktopSmall: false,
            itemsTablet: false,
            itemsMobile: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            freeDrag: false,
            navigation: true, // Show next and prev buttons
            paginationSpeed: 1000,
            responsiveClass: true,
            slideSpeed: 1000
        });
        $('.slide-item-category-carousel').owlCarousel({
            navText: ['<i class="fa fa-2 fa-chevron-left"></i>', '<i class="fa fa-2 fa-chevron-right"></i>'],
            loop: false,
            margin: 50,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: false
                },
                600: {
                    items: 2,
                    nav: true,
                    loop: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                1280: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                1600: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        });

        var setBackgroundSlidesNavs = function() {
            var imagesOrdered = [];

            $('.slide-item-category-carousel').each(function() {
                imagesOrdered.push({
                    "thumb": $(this).attr('data-thumb-src'),
                    "full": $(this).attr('data-full-src'),
                    "title": $(this).attr('data-title')
                });
            });

            var dots   = $('.slider-container > div.owl-controls > div.owl-dots > div.owl-dot span');
            var slides = $('.slider-container div.slide-item-category-carousel');

            for (var i = 0; i < dots.length; i++) {
                $(dots[i]).css('background-image', 'url(' + imagesOrdered[i].thumb + ')')
                          .css('background-size', 'contain')
                          .attr('title', imagesOrdered[i].title);
                $(slides[i]).css('background-image', 'url(' + imagesOrdered[i].full + ')')
                            .css('background-repeat', 'no-repeat')
                            .css('background-size', '100% 300px');
            }
        };

        var setTooltips = function() {
            $('.slider-container > div.owl-controls > div.owl-dots > div.owl-dot span').tooltip();
        };

        setTimeout(setBackgroundSlidesNavs, 1);
        setTimeout(setTooltips, 2);
    });
})(jQuery);