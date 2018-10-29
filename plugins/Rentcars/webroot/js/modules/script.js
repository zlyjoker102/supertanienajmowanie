
  $(document).ready(function () {
    setTimeout(function () {
      $('div.message').fadeOut('fast');
    }, 5000);

    if( $("#reviews").length){
      $("#reviews").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        infinite: false,
        dots: false,
        responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            dots: false
          }
  
        },
          {
            breakpoint: 300,
            settings: "unslick" // destroys slick
          }]
      });
    }

  });

  $(window).scroll(function() {
    if ($("#main-menu").offset().top > 100) {
      $("#main-menu").addClass("navbar-shrink");
    } else {
      $("#main-menu").removeClass("navbar-shrink");
    }
  });
