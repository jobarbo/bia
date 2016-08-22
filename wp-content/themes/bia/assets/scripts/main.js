/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };


  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  function configurer() {

    $('#listInterets').on('click', function(event){
      $(this).toggleClass('active');
      $('#list-interet').slideToggle();
      event.preventDefault();
    });
//------- ANCHOR ANIMATION -------
  $('a[href^="#"]').on('click touchend', function() {
    var the_id = $(this).attr("href");
    $('html, body').animate({
      scrollTop: $(the_id).offset().top
    }, 'slow');

    return false;
  });

//---------------------------------

$("#btMenu").click(function () {
  $('#side-menu').toggleClass('visually-hidden');
  $(this).toggleClass('open-menu');
  $('body, html').toggleClass('no-scroll');
});



    if($(window).width() > 768){
      $('#instagramFeed .instagramImage .image').each(function(){
          var width = $(this).width();
          $(this).height(width);
      });

      $(window).on('resize',function(){
        $('#instagramFeed .instagramImage .image').each(function(){
            var width = $(this).width();
            $(this).height(width);
        });
      });  

      

    }
    if($(window).width() > 1025){
      var s = skrollr.init({
          forceHeight: false,
          mobileDeceleration: 0.004
      });
    }

    if($('body').hasClass('page-template-page-formations')){
      var toList =  $('#list-formations').attr('data-to-list-formation');
      if(toList === '1'){
        $('html, body').animate({
          scrollTop: $('#list-formations').offset().top
        }, 'slow');
      }

      $('#btFiltres').click(function(){
        $('#form-filtres').submit();
      });
    }

    //Filtres page formations
    $('#filtres .section-filtre button').click(function(e){
      var dataFiltre = $(this).attr('data-filtre');

      
        $('.list-filtre').each(function(){
          $(this).slideUp(300);
        });

        $('.section-filtre button').each(function(){
          $(this).removeClass('active');
        });
        
          if($('#'+dataFiltre).is(':visible') == false){      
            $('#'+dataFiltre).slideToggle(400);
            $(this).toggleClass('active');
          }        
    });

    $('.list-filtre .list-item').click(function(e){
        var input = $(this).attr('data-input');
        var id = $(this).attr('data-id');

        var currentValue = $('#'+input).val();

        if($(this).hasClass('single-option')){          

          if($(this).hasClass('active')){
            $('#'+input).val('');
            $(this).removeClass('active');
          }else{
            $('#'+input).val(id);
            $(this).parent().find('.list-item').removeClass('active');
            $(this).addClass('active');
          }
        }else{

          if(currentValue){
            var already = false;
            var arrValues = currentValue.split('-');
            for(var cpt=0; cpt < arrValues.length; cpt++){
              if(id == arrValues[cpt]){
                already = true;
              }
            }
            if(already){
              arrValues.splice(arrValues.indexOf(id),1);
              $('#'+input).val(arrValues);
            }else{
              $('#'+input).val(currentValue+'-'+id);
            }
            
          }else{
            $('#'+input).val(id);
          }  

          $(this).toggleClass('active');       
          
        }     
        
    });



}
  window.onload = configurer;
  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
