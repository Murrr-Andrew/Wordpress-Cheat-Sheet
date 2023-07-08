function swiperSliderInit() {
    const sliders = document.querySelectorAll( '.swiper-container' );

    sliders.forEach( ( slider, index ) => {
        const config = JSON.parse( slider.dataset.config );
        
        const swiper = new Swiper( slider, config );
    } );
}

document.addEventListener( 'DOMContentLoaded', swiperSliderInit );