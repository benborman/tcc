jQuery( window ).load( function() {
    if ( 'true' == woo_localized_data.slideshow ) { woo_localized_data.slideshow = true; } else { woo_localized_data.slideshow = false; }
    if ( 'true' == woo_localized_data.directionNav ) { woo_localized_data.directionNav = true; } else { woo_localized_data.directionNav = false; }
    if ( 'true' == woo_localized_data.controlNav ) { woo_localized_data.controlNav = true; } else { woo_localized_data.controlNav = false; }
    if ( 'true' == woo_localized_data.pauseOnHover ) { woo_localized_data.pauseOnHover = true; } else { woo_localized_data.pauseOnHover = false; }
    if ( 'true' == woo_localized_data.pauseOnAction ) { woo_localized_data.pauseOnAction = true; } else { woo_localized_data.pauseOnAction = false; }
    if ( 'true' == woo_localized_data.touch ) { woo_localized_data.touch = true; } else { woo_localized_data.touch = false; }
    if ( 'true' == woo_localized_data.smoothHeight ) { woo_localized_data.smoothHeight = true; } else { woo_localized_data.smoothHeight = false; }

    // Cast the speed variables as floats.
    woo_localized_data.slideshowSpeed = parseFloat( woo_localized_data.slideshowSpeed );
    woo_localized_data.animationDuration = parseFloat( woo_localized_data.animationDuration );

    function setActiveSlide(slide) {
        curSlide = slide;
        jQuery('#slider-pagination ul li').removeClass('active');
        jQuery('#slider-pagination ul li.slide-control:eq(' + curSlide + ')').addClass('active');
    }

    jQuery( '#featured-slider' ).flexslider({
        animation: woo_localized_data.animation,
        controlsContainer: woo_localized_data.controlsContainer,
        smoothHeight: woo_localized_data.smoothHeight,
        directionNav: false,
        controlNav: false,
        manualControls: woo_localized_data.manualControls,
        slideshow: woo_localized_data.slideshow,
        pauseOnHover: woo_localized_data.pauseOnHover,
        slideshowSpeed: woo_localized_data.slideshowSpeed,
        animationDuration: woo_localized_data.animationDuration,
        touch: woo_localized_data.touch,
        pauseOnHover: woo_localized_data.pauseOnHover,
        pauseOnAction: woo_localized_data.pauseOnAction,
        start: function(slider){
            setActiveSlide(slider.currentSlide);
        },        
        after: function(slider){
            setActiveSlide(slider.currentSlide);
        }
    });

    jQuery('#slider-pagination ul li a').click(function(e) {
        e.preventDefault();
        var slide = jQuery( this ).data( 'slidepag' );
        if ( 'prev' != slide && 'next' != slide ) {
            slide = parseInt( slide );
        }
        jQuery('#featured-slider').flexslider( slide );
    });

});