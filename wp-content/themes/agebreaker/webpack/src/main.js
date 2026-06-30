import 'slick-carousel';
import 'bootstrap';
import 'magnific-popup';
import 'magnific-popup/dist/magnific-popup.css';

jQuery(window).scroll(scrollCheck);

window.addEventListener('scroll', parallax);



function parallax() {
  var index = 0;
  $('.parallax-container').each(function(){
    var id=$(this).attr('id');
    if(!id) {
      $(this).attr('id', 'parallax-'+index);
      id = 'parallax-'+index;
    }
    

    var parallaxContainer = $('#'+id);

    
    var containerTop = parallaxContainer.position().top-parallaxContainer.height();
    
    var scrollTop = window.pageYOffset;
    var scrollPosition = scrollTop - containerTop;

    parallaxContainer.find('.parallax-item').each(function() {
      
      const speed = parseFloat($(this).attr('data-speed'));
      const translateY = (scrollPosition * speed) - 100;
      

      

      $(this).css({
        'transform': 'translateY('+translateY+'px)',
       
      });
    });

    index++;
  });


  

  // parallaxContainer.style.transform = `translateY(${scrollPosition * 0.4}px)`;

  
}

function scrollCheck(){       
      // if (jQuery('#is_desctop').is(':visible')){
      var offset = $('#masthead').height()/2;

        if (jQuery(this).scrollTop() >= offset) {
            jQuery('body').addClass('scrolled');
        }
        else {
            jQuery('body').removeClass('scrolled');
        }
      // }
    
}

document.addEventListener('DOMContentLoaded', function() {
  // Pobierz wysokość nagłówka
  const header = document.querySelector('.navbar, header');
  const headerHeight = header ? header.offsetHeight : 70;

  // Dodaj offset do scrollowania
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();
          
          const targetId = this.getAttribute('href');
          const targetElement = document.querySelector(targetId);
          
          if (targetElement) {
              const elementPosition = targetElement.getBoundingClientRect().top;
              const offsetPosition = elementPosition + window.pageYOffset - headerHeight;
              
              window.scrollTo({
                  top: offsetPosition,
                  behavior: 'smooth'
              });
          }
      });
  });
  
  // Obsługa hash w URL przy ładowaniu strony
  if (window.location.hash) {
      const targetElement = document.querySelector(window.location.hash);
      if (targetElement) {
          setTimeout(() => {
              const elementPosition = targetElement.getBoundingClientRect().top;
              const offsetPosition = elementPosition + window.pageYOffset - headerHeight;
              
              window.scrollTo({
                  top: offsetPosition,
                  behavior: 'smooth'
              });
          }, 100);
      }
  }
});

function scrollTo(hash){
  $('html, body').animate({
    scrollTop: $(hash).offset().top - $('#masthead').height()
  }, 500);
}

function openContactForm(){
  $('#contactForm').addClass('active');
  $('body').addClass('contactFormActive');
  return false;
}

function closeContactForm(){
  $('#contactForm').removeClass('active');
  $('body').removeClass('contactFormActive');
  return false;
}

$(document).ready(function() {
  // Obsługa kliknięcia przycisku #searchInput
  $("#searchInput").click(function() {
      // Pobranie części adresu URL zawierającej parametry (wszystko po znaku ?)
      var queryString = window.location.search;
      
      // Usunięcie znaku zapytania z początku, jeśli istnieje
      if (queryString.charAt(0) === '?') {
          queryString = queryString.substring(1);
      }
      
      // Przekierowanie do strony docelowej z parametrami
      if (queryString) {
          // Jeśli są parametry, dodajemy je do nowego adresu
          window.location.href = "/baza-aktywnosci/?" + queryString;
      } else {
          // Jeśli nie ma parametrów, przekierowujemy do adresu bez parametrów
          window.location.href = "/baza-aktywnosci/";
      }
  });
});

jQuery(document).ready(function($){

    $('#site-navigation .menu-toggle').on('click', function(){
      $(this).toggleClass('active');

      $('#site-navigation .menu').toggleClass('active');
    });

    $('#base_holder .filter-toggle').on('click', function(){
      $('#base_holder').toggleClass('active');

          // Sprawdź, czy element ma teraz klasę 'active'
          if ($('#base_holder').hasClass('active')) {
              // Jeśli ma klasę 'active', stwórz i dodaj nowy element
              $('#base_holder').append('<div class="base_holder_bg"></div>');

              $('#base_holder .base_holder_bg').on('click', function(){
                $('#base_holder .base_holder_bg').remove();
                $('#base_holder').toggleClass('active');
              });
          } else {
              // Jeśli nie ma klasy 'active', usuń element
              $('#base_holder .base_holder_bg').remove();
          }
    });

    $('.openForm').each(function(){
      $(this).on('click', openContactForm);
    });

    $('#contactForm .close').on('click', closeContactForm);
    $('#contactFormShadow').on('click', closeContactForm);


  parallax()
    $('#search-trigger').on('click', function(){
      $(this).parent().toggleClass('active');
    });

    $('.image-link').magnificPopup({type:'image'});
  
    $('#djacc_trigger').click(function(){
      $('.djacc__panel').toggleClass('djacc__panel--active');
      return false;
    });

    $('.click-link').each(function(){
      $(this).click(function(){
        var url = $(this).find('a').attr('href');
        window.open(url, '_self');
      });
    });

    $('#scroll').on('click', function(){
      scrollTo($('#page'));
    });

    $('html').addClass('loaded');

    updateContent($('body'));


    $('a').each(function(){

      var h = $(this).attr('href');
      if(h){
        var hashArr = h.split("#");

        if(hashArr[1]){
          var hash = hashArr[1];
          $(this).click(function(){
            scrollTo('#'+hash);
            return false;
          })

        }
      }

    });

});



function updateContent(parent){
  $(parent).find('.slickSlider').each(function(){
    var ID = $(this).attr('id');
    var resp = $(this).attr('slick_per_page').split('_');
    var showDots = $(this).attr('slick_show_dots') && $(this).attr('slick_show_dots')=='1' ? true : false;
    var hideArrows = $(this).attr('slick_hide_arrows') && $(this).attr('slick_hide_arrows')=='1' ? false : true;
    var varWidth = $(this).attr('variable_width') && $(this).attr('variable_width')=='1' ? true : false;
    var center_mode = $(this).attr('center_mode') && $(this).attr('center_mode')=='0' ? false : true;
    var infinite = $(this).attr('infinite') && $(this).attr('infinite')=='0' ? false : true;
    var speed = $(this).attr('speed') ? $(this).attr('speed') : 5000;
    var fade = $(this).attr('fade') && $(this).attr('fade')=='1' ? true : false;
    var asNavFor = $(this).attr('asNavFor') ? $(this).attr('asNavFor') : false;
    var onClickGoTo = $(this).attr('onClickGoTo') && $(this).attr('onClickGoTo') == 1 ? true : false;

    

    var resp_1 = circumference(resp[0] ? resp[0] : 4);
    var resp_2 = circumference(resp[1] ? resp[1] : 3);
    var resp_3 = circumference(resp[2] ? resp[2] : 1);
    var resp_4 = circumference(resp[3] ? resp[3] : 1);

    console.log(ID, resp_4);

    var customArrows = $(this).attr('navigation') ? true : false;
    var prevArr = customArrows ? $('#'+$(this).attr('navigation')+' .slick-prev') : '<button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true" style="">Previous</button>';
    var nextArr = customArrows ? $('#'+$(this).attr('navigation')+' .slick-next') : '<button class="slick-next slick-arrow slick-disabled" aria-label="Next" type="button" style="" aria-disabled="true">Next</button>';

    $('#'+ID).slick({
      dots: showDots,
      arrows: hideArrows,
      infinite: infinite,
      speed: 500,
      fade: fade,
      autoplay: false,
      autoplaySpeed: speed,
      variableWidth: varWidth,
      centerMode: false, 
      cssEase: 'linear',
      slidesToShow: resp_1,
      slidesToScroll: resp_1,
      prevArrow: prevArr,
      nextArrow: nextArr,
      pauseOnHover:true,
      asNavFor: asNavFor,
      focusOnSelect: onClickGoTo,

      responsive: [
        {
          breakpoint: 1200,
          settings: {
            dots: showDots,
            slidesToShow: resp_2,
            slidesToScroll: resp_2,
            infinite: infinite,
            variableWidth: false,
            variableWidth: false
          }
        },
        {
          breakpoint: 920,
          settings: {
            slidesToShow: resp_3,
            slidesToScroll: resp_3,
            variableWidth: false
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: resp_4,
            slidesToScroll: resp_4,
            centerMode: false, 
            variableWidth: true
          }
        }

      ]
    }); 
  
  $('#'+ID).on('afterChange', slickInit);
  $('#'+ID).trigger('afterChange');

  $('#'+ ID).find('.slider-menu li').each(function(){
      $(this).on('click', function(){
        
          $('#'+ ID).slick('slickGoTo', $(this).attr('slider-index'));
          return false;
      });
  });
  
});
}

  function circumference(r) {
    if (Number.isNaN(Number.parseFloat(r))) {
      return 0;
    }
    return parseFloat(r) ;
  }

  function slickInit(slick, currentTarget){
    // console.log(currentTarget)
    // $(event.currentTarget).find('.loadAjax').each(function(){
    //     $(this).on('click', loadAjax);
    // });
  }



  document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('#sections .qa .item');
    
    items.forEach(item => {
        const question = item.querySelector('.question');
        question.addEventListener('click', () => {
            // Zamknij wszystkie otwarte elementy
            items.forEach(openItem => {
                if (openItem !== item && openItem.classList.contains('active')) {
                    openItem.classList.remove('active');
                }
            });
            
            // Przełącz stan klikniętego elementu
            item.classList.toggle('active');
        });
    });
  });