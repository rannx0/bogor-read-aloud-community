<!-- JS Implementing Plugins -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/vendor/aos/dist/aos.js')}}"></script>

<!-- JS Front -->
<script src="{{ asset('assets/js/theme.min.js')}}"></script>

<!-- Scroll Gallery -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.querySelectorAll('a.nav-link').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const targetId = this.getAttribute('href');
    const targetElement = document.querySelector(targetId);
    
    window.scrollTo({
      top: targetElement.offsetTop - 72, // Sesuaikan offset sesuai dengan tinggi navbar
      behavior: 'smooth'
    });
  });
});
</script>


<!-- Include Fancybox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
      // FANCYBOX
      $(".fancybox").fancybox({
          buttons : [ 
              'slideShow',
              'share',
              'zoom',
              'fullScreen',
              'close'
          ],
          openEffect: "none",
          closeEffect: "none"
      });

      // CAROUSEL
      let carousel = document.querySelector('#recipeCarousel');
      if (carousel) {
          let items = carousel.querySelectorAll('.carousel .carousel-item');

          items.forEach((el) => {
              const minPerSlide = 4;
              let next = el.nextElementSibling;
              for (var i = 1; i < minPerSlide; i++) {
                        if (!next) {
                            next = items[0];
                        }
                        let cloneChild = next.cloneNode(true);
                        el.appendChild(cloneChild.children[0].cloneNode(true));
                        next = next.nextElementSibling;
                    }
          });
      }
  });
</script>

{{-- Blog --}}
<script>
    $(document).ready(function() {
        var swiper = new Swiper('#blogSection .js-swiper-card-grid', {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: '.js-swiper-card-grid-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                620: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1440: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
            },
        });
    });
</script>

<!-- Events Swiper. -->
<script>
// Swiper Card Grid untuk Events
var swiper = new Swiper('#eventSection .js-swiper-card-grid', {
  slidesPerView: 3, /* Sesuaikan dengan lebar card */
  spaceBetween: 30, /* Jarak antar card */
  pagination: {
    el: '#eventSection .js-swiper-card-grid-pagination',
    dynamicBullets: true,
    clickable: true,
  },
  breakpoints: {
    620: {
      slidesPerView: 2, /* Tampilkan 2 card pada layar medium */
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3, /* Tampilkan 3 card pada layar besar */
      spaceBetween: 10,
    },
  },
});
</script>



<!-- JS Plugins Init. -->
<script>
    (function() {
    // INITIALIZATION OF HEADER
    // =======================================================
    new HSHeader('#header').init()


    // INITIALIZATION OF MEGA MENU
    // =======================================================
    new HSMegaMenu('.js-mega-menu', {
        desktop: {
        position: 'left'
        }
    })


    // INITIALIZATION OF SHOW ANIMATIONS
    // =======================================================
    new HSShowAnimation('.js-animation-link')


    // INITIALIZATION OF BOOTSTRAP VALIDATION
    // =======================================================
    HSBsValidation.init('.js-validate', {
    onSubmit: data => {
        data.event.preventDefault()
        alert('Submited')
    }
    })


    // INITIALIZATION OF BOOTSTRAP DROPDOWN
    // =======================================================
    HSBsDropdown.init()


    // INITIALIZATION OF GO TO
    // =======================================================
    new HSGoTo('.js-go-to')


    // INITIALIZATION OF AOS
    // =======================================================
    AOS.init({
    duration: 650,
    once: true
    });


    // INITIALIZATION OF TEXT ANIMATION (TYPING)
    // =======================================================
    HSCore.components.HSTyped.init('.js-typedjs')


    // INITIALIZATION OF SWIPER
    // =======================================================
    
})()
</script>

<script>
    (function() {
      // INITIALIZATION OF SWIPER
      // =======================================================
      var navigation = new Swiper('.js-swiper-navigation', {
        navigation: {
          nextEl: '.js-swiper-navigation-button-next',
          prevEl: '.js-swiper-navigation-button-prev',
        },
        pagination: {
          el: '.js-swiper-pagination',
          clickable: true, // Menambahkan clickable pagination
        },
        autoplay: {
          delay: 3000, // Set delay to 3 seconds
          disableOnInteraction: false, // Autoplay tetap jalan meskipun ada interaksi
        },
        effect: 'fade', // Menambahkan efek fade untuk transisi yang halus
        fadeEffect: {
          crossFade: true, // Mengaktifkan crossfade agar lebih smooth
        },
        loop: true // Mengaktifkan looping agar slider terus berjalan
      });
    })();
  </script>