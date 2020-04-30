(function ($, window, document, undefined) {
    'use strict';

    /*============================================
     MagnificPopup Bar
     ==============================================*/
    $('.mp-lightbox').magnificPopup({
        removalDelay: 300,
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true
        }
    });

    /* ---------------------------------------------------------------- */
    /* Flexslider
     /* ---------------------------------------------------------------- */
    $('#main_slider').flexslider({
        animation: 'slide',
        useCSS: false,
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: '#main_thumbs'
    });

    $('#main_thumbs').flexslider({
        animation: 'slide',
        useCSS: false,
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        minItems: 3,
        maxItems: 4,
        itemWidth: 103.75,
        itemMargin: 10,
        asNavFor: '#main_slider'
    });

    $('.cd-lightbox-image').magnificPopup({
        removalDelay: 300,
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true
        }
    });

})(jQuery, window, document);

