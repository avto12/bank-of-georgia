import Swiper from 'swiper/bundle';

const swiper = new Swiper( '.hero-slider-block__slider', {
    slidesPerView: 1,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    loop: true,
} );