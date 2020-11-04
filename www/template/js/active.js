const mycookie = {
  set: function (cname, cvalue, exdays) {
    var d = new Date()
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000)
    var expires = 'expires=' + d.toUTCString()
    document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/'
  },
  get: function (cname) {
    var name = cname + '='
    var ca = document.cookie.split(';')
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i]
      while (c.charAt(0) == ' ') {
        c = c.substring(1)
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length)
      }
    }
    return ''
  },
  accepted:function(){
      mycookie.set('accepted','I accept',30);
      document.querySelector(".cookies").style="display:none";
  }
};
(function( elm) {
    if(mycookie.get("accepted")!==""){
        elm.querySelector(".cookies").style="display:none";
    }
})(document);
(function ($) {
  'use strict'

  var browserWindow = $(window)

  // :: 1.0 Preloader Active Code
  browserWindow.on('load', function () {
    $('#preloader').fadeOut('slow', function () {
      $(this).remove()
    })
  })

  // :: 2.0 Countdown Active Code
  $('[data-countdown]').each(function () {
    var $this = $(this),
      finalDate = $(this).data('countdown')
    $this.countdown(finalDate, function (event) {
      $this.html(
        event.strftime(
          '<div>%D <span>Days</span></div> <div>%H <span>Hours</span></div> <div>%M <span>Minutes</span></div> <div>%S <span>Seconds</span></div>',
        ),
      )
    })
  })

  // :: 3.0 Nav Active Code
  if ($.fn.classyNav) {
    $('#cleverNav').classyNav()
  }

  // :: 4.0 Sliders Active Code
  if ($.fn.owlCarousel) {
    var tutors = $('.tutors-slide')
    tutors.owlCarousel({
      items: 3,
      margin: 0,
      loop: true,
      nav: true,
      navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
      ],
      dots: false,
      autoplay: true,
      autoplayTimeout: 6000,
      smartSpeed: 1000,
      center: true,
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 2,
        },
        992: {
          items: 3,
        },
      },
    })
  }

  // :: 5.0 Gallery Active Code
  if ($.fn.magnificPopup) {
    $('.video-btn').magnificPopup({
      type: 'iframe',
    })
  }

  // :: 6.0 ScrollUp Active Code
  if ($.fn.scrollUp) {
    browserWindow.scrollUp({
      scrollSpeed: 1500,
      scrollText: '<i class="fa fa-angle-up"></i>',
    })
  }

  // :: 7.0 CouterUp Active Code
  if ($.fn.counterUp) {
    $('.counter').counterUp({
      delay: 10,
      time: 2000,
    })
  }

  // :: 8.0 Sticky Active Code
  if ($.fn.sticky) {
    $('.clever-main-menu').sticky({
      topSpacing: 0,
    })
  }

  // :: 9.0 wow Active Code
  if (browserWindow.width() > 767) {
    new WOW().init()
  }

  // :: 10.0 prevent default a click
  $('a[href="#"]').click(function ($) {
    $.preventDefault()
  })
})(jQuery)
