new Swiper('.card-wrapper', {
  slidesPerView: 1.2, // bisa disesuaikan
  spaceBetween: 20,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2.2,
    },
    1024: {
      slidesPerView: 3,
    },
    1100: {
      slidesPerView: 3,
    },
  }
});
