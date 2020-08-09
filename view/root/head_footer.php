
<script   src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script   src="<?php echo HTTP;?>assets/js/plugin/antigravity.js"></script>
 <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 2,
      spaceBetween: 0,
      keyboard: {
        enabled: true,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>