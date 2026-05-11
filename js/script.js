document.addEventListener("DOMContentLoaded", function() {
    if(document.querySelector('.testimonial-slider-wrapper')) {
        document.querySelectorAll('.testimonial-slider-wrapper .splide').forEach(function(slider) {
            var hasMultipleSlides = slider.querySelectorAll('.splide__slide').length > 1;

            new Splide(slider, {
                type   : 'fade',
                perPage: 1,
                autoplay: true,
                arrows: hasMultipleSlides,
                rewind: true,
                pagination: false,
                autoHeight: true,
            }).mount();       
        });
    }
});