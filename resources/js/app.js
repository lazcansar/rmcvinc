import './bootstrap';
import Jquery from 'jquery';
import 'swiper/swiper-bundle.css';
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 1000,
});

document.addEventListener('DOMContentLoaded', function() {
    const galleryImages = document.querySelectorAll('.gallery-image');
    const modal = document.getElementById('modal');
    const modalImageContainer = document.querySelector('.modal-image-container');
    const closeModalButton = document.getElementById('close-modal');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    let currentImageIndex = 0;

    function openModal(imageSrc, index) {
        modalImageContainer.innerHTML = '';

        galleryImages.forEach((img, i) => {
            const largeImage = document.createElement('img');
            largeImage.src = img.src;
            largeImage.classList.add('modal-image', 'max-h-[80vh]', 'object-cover');
            if(i === index){
                largeImage.classList.add('active-modal-image');
            }
            modalImageContainer.appendChild(largeImage);

        });
        currentImageIndex = index;
        modal.classList.remove('hidden');
        updateActiveImage();
    }
    function updateActiveImage() {
        const modalImages = modalImageContainer.querySelectorAll('.modal-image');

        modalImages.forEach((img, index) => {
            if (index === currentImageIndex) {
                img.classList.add('active-modal-image');

                img.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'center'
                });
            } else {
                img.classList.remove('active-modal-image');
            }
        });
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
        updateActiveImage();
    }


    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
        updateActiveImage();
    }



    galleryImages.forEach((image, index) => {
        image.addEventListener('click', function() {
            openModal(this.src, index);
        });
    });


    closeModalButton.addEventListener('click', function() {
        modal.classList.add('hidden');
    });


    nextButton.addEventListener('click', nextImage);
    prevButton.addEventListener('click', prevImage);


    document.addEventListener('keydown', function(event) {
        if (!modal.classList.contains('hidden')) {
            if (event.key === 'ArrowRight') {
                nextImage();
            } else if (event.key === 'ArrowLeft') {
                prevImage();
            } else if (event.key === 'Escape') {
                modal.classList.add('hidden');
            }
        }
    });


    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
});


// Mobile Toggle Button
const mobileButton = document.getElementById('mobile-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileButton.addEventListener('click', function() {
    mobileMenu.classList.toggle('hidden');
});
