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
    });
})(jQuery);