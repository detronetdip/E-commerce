<script>
      $(document).ready(function () {
        $(".owl-carousel").owlCarousel();
      });
      var owl = $(".main-slider");
      owl.owlCarousel({
        items: 4,
        loop: true,
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 2,
          },
          1000: {
            items: 3,
          },
          1200: {
            items: 4,
          },
          1400: {
            items: 4,
          },
        },
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        dots: false,
      });

      $(".cate-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: [
          "<i class='uil uil-angle-left'></i>",
          "<i class='uil uil-angle-right'></i>",
        ],
        responsive: {
          0: {
            items: 2,
          },
          375: {
            items: 2,
          },
          600: {
            items: 3,
          },
          1000: {
            items: 4,
          },
          1200: {
            items: 6,
          },
          1400: {
            items: 6,
          },
        },
      });

      $(".product-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: [
          "<i class='uil uil-angle-left'></i>",
          "<i class='uil uil-angle-right'></i>",
        ],
        responsive: {
          0: {
            items: 1,
          },
          610: {
            items: 2,
          },
          600: {
            items: 3,
          },
          1000: {
            items: 4,
          },
        },
      });
    </script>