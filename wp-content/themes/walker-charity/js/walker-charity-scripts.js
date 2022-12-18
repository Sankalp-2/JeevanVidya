jQuery(document).scroll(function() {
  var scroll = jQuery(window).scrollTop();
 jQuery(".banner-background").css("background-position", "0%" + (scroll / -5) + "px"); 
});

jQuery(document).ready(function () {
  var tSwiper = new Swiper(".walker-charity-testimonial", {
    spaceBetween: 30,
    slidesPerView:1,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 3,
        },
      }
  });
  var tSwiperTwo = new Swiper(".walker-charity-testimonial-2", {
    spaceBetween: 30,
    slidesPerView:1,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 2,
        },
      }
  });

  var swiper_brands = new Swiper(".walker-charity-brands", {
    spaceBetween: 0,
    slidesPerView:1,
    centeredSlides: false,
        pagination: {
          el: ".brands-pagination",
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 4,
        },
        1460: {
          slidesPerView: 6,
        },
      }
  });
  var swiper_brandss = new Swiper(".walker-charity-brands-box", {
    spaceBetween: 0,
    slidesPerView:1,
    centeredSlides: false,
        pagination: {
          el: ".brands-pagination",
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 4,
        },
        1460: {
          slidesPerView: 4,
        },
      }
  });
  var swiper_donations = new Swiper(".walker-charity-donation-list", {
    spaceBetween: 40,
    slidesPerView:1,
    centeredSlides: false,
        pagination: {
          el: ".donation-pagination",
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 3,
        },
        1460: {
          slidesPerView: 3,
        },
      }
  });
  var portfolioSwiper = new Swiper(".walker-charity-portfolio-slider", {
    spaceBetween: 0,
    slidesPerView:1,
    freeMode: false,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
          el: ".folio-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.walker-charity-folio-next',
          prevEl: '.walker-charity-folio-prev',
          clickable: true,
      },
      breakpoints: {
        560: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 4,
        },
      }
  });

var swipes_slider1 = new Swiper('.banner-slider-one', {
      loop: true,
      parallax: true,
      speed: 600,
      // effect: 'fade',
      navigation: {
          nextEl: '.wc-slider-next',
          prevEl: '.wc-slider-prev',
          clickable: true,
      },
      autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
      pagination: {
          el: '.wc-slider-pagination',
          clickable: true,
      },
  });
var featuredSliderSwiper = new Swiper(".banner-slider-centered", {
    spaceBetween: 0,
    slidesPerView:1,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.wc-slider-next',
          prevEl: '.wc-slider-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 2,
        },
      }
  });

//init isotop for portfolio
  var $container = jQuery('.walker-charity-portfolio');
    $container.isotope({
      itemSelector: '.portfolio-item',
      masonry: {
        columnWidth: '.portfolio-item',
    }
  });
  // filter items on button click
  jQuery('.filter-button-group').on('click', 'button', function () {
    var filterValue = jQuery(this).attr('data-filter');
    $container.isotope({ filter: filterValue });
    // $container2.isotope({ filter: filterValue });
  });
  // change active class on buttons
  jQuery('.button-group').each(function (i, buttonGroup) {
    var $buttonGroup =jQuery(buttonGroup);
    $buttonGroup.on('click', 'button', function () {
      $buttonGroup.find('.active').removeClass('active');
      jQuery(this).addClass('active');
    });
  });


  /*navmenu-toggle control*/
var menuFocus, navToggleItem, focusBackward;
var menuToggle = document.querySelector('.menu-toggle');
var navMenu = document.querySelector('.nav-menu');
var navMenuLinks = navMenu.getElementsByTagName('a');
var navMenuListItems = navMenu.querySelectorAll('li');
var nav_lastIndex = navMenuListItems.length - 1;
var navLastParent = document.querySelectorAll('.main-navigation > ul > li').length - 1;

document.addEventListener('menu_focusin', function () {
    menuFocus = document.activeElement;
    if (navToggleItem && menuFocus !== navMenuLinks[0]) {
        document.querySelectorAll('.main-navigation > ul > li')[navLastParent].querySelector('a').focus();
    }
    if (menuFocus === menuToggle) {
        navToggleItem = true;
    } else {
        navToggleItem = false;
    }
}, true);


document.addEventListener('keydown', function (e) {
    if (e.shiftKey && e.keyCode == 9) {
        focusBackward = true;
    } else {
        focusBackward = false;
    }
});


for (el of navMenuLinks) {
    el.addEventListener('blur', function (e) {
        if (!focusBackward) {
            if (e.target === navMenuLinks[nav_lastIndex]) {
                menuToggle.focus();
            }
        }
    });
}
menuToggle.addEventListener('blur', function (e) {
    if (focusBackward) {
        navMenuLinks[nav_lastIndex].focus();
    }
});

});
jQuery(function($, win) {
  $.fn.inViewport = function(cb) {
    return this.each(function(i,el){
      function visPx(){
        var H = $(this).height(),
            r = el.getBoundingClientRect(), t=r.top, b=r.bottom;
        return cb.call(el, Math.max(0, t>0? H-t : (b<H?b:H)));  
      } visPx();
      $(win).on("resize scroll", visPx);
    });
  };
}(jQuery, window));

jQuery(function($) { 
  $(".count-number").inViewport(function(px) { 
    if(px>0 && !this.initNumAnim) { 
      this.initNumAnim = true;
      $(this).prop('Counter',0).animate({
        Counter: $(this).text()
      }, {
        duration: 1000,
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });         
    }
  });
});
jQuery(function($) { 
  $(".about-wraper .wc-container, .donation-wraper .wc-container, .features-wraper .wc-container, .testimonial-wraper .wc-container,.recentpost-wraper .wc-container, .wc-container.extra-page-1, .wc-container.extra-page-2, .cta-box.text-center, .conatct-layout-1 .info-col, .conatct-layout-1 .form-col, .brands-wraper .wc-container, .team-wraper .wc-container, .portfolio-wraper .wc-container, .featured-cta-wraper .wc-container, .counter-wraper .wc-container").inViewport(function(px) { 
    if(px>0 && !this.initNumAnim) { 
      this.initNumAnim = true;
      jQuery(this).addClass('walkerFadeInUp');
    }
  });
});

jQuery(window).scroll(function(){ 
      if (jQuery(this).scrollTop() > 100) { 
          jQuery('a.walker-charity-top').fadeIn(); 
      } else { 
          jQuery('a.walker-charity-top').fadeOut(); 
      } 
  }); 
jQuery('a.walker-charity-top').click(function(){ 
    jQuery("html, body").animate({ scrollTop: 0 }, 600); 
    return false; 
}); 

jQuery(window).scroll(function() {
  if (jQuery(this).scrollTop() >= 50) {
      jQuery('.sticky-header').addClass('stikcy-enabled');
      
  }
  else {
      jQuery('.sticky-header').removeClass('stikcy-enabled');
  }
});