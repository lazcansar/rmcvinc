import './bootstrap';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';
import AOS from 'aos';
import 'aos/dist/aos.css';
import 'jquery/src/jquery.js';

AOS.init({
    duration: 1000,
});


var swiper = new Swiper('.slider', {
    slidesPerView: 1,
    autoplay: true,
    loop: true,
    pagination: {
        clickable: true,
    },
});
