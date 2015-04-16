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
            margin: 50,
            items: 3,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            freeDrag: false,
            navigation: true, // Show next and prev buttons
            responsiveClass: true,
            slideSpeed: 1000
        });
    });
})(jQuery);