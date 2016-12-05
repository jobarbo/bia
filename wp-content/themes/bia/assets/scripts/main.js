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

  $(document).ready(function() {
      var ua = window.navigator.userAgent;
      var msie = ua.indexOf("MSIE ");
      if (msie > 0) // If Internet Explorer, return version number
      {
        $("input").each(function(){
          if($(this).val()=="" && $(this).attr("placeholder")!=""){
            $(this).val($(this).attr("placeholder"));
            $(this).focus(function(){
              if($(this).val()==$(this).attr("placeholder")) $(this).val("");
            });
            $(this).blur(function(){
              if($(this).val()=="") $(this).val($(this).attr("placeholder"));
            });
          }
        });
    }
  });

  function resizePartenaires(){
    if($('body').hasClass('club-bia')){
      var maxHeight = 0;

      $('#list-partenaires .post-in-list').each(function(){
        $(this).outerHeight('auto');
      });

      $('#list-partenaires .post-in-list').each(function(){
        if($(this).outerHeight() > maxHeight){
          maxHeight = $(this).outerHeight();
        }
      });

      $('#list-partenaires .post-in-list').each(function(){
        $(this).outerHeight(maxHeight);
      });

      $('#list-partenaires').css('opacity','1'); 
    }
  }

  function configurer() {

    $('#listInterets').on('click', function(event){
      $(this).toggleClass('active');
      $('#list-interet').slideToggle();
      event.preventDefault();
    });

    $('h2').each(function(){
      $(this).addClass('visually-visible');
    });


    window.onresize = function(){
      resizePartenaires();
    }

    var isIOS7 = function() {
      var deviceAgent = navigator.userAgent.toLowerCase();
      return /(iphone|ipod|ipad).* os 7_/.test(deviceAgent);
    }

    var isIOS8 = function() {
      var deviceAgent = navigator.userAgent.toLowerCase();
      return /(iphone|ipod|ipad).* os 8_/.test(deviceAgent);
    }

   if(isIOS7() || isIOS8()){
      var windowHeight = $(window).height();
      $('#splash').css('height','768px');
      $('#barreV').css('height','768px');
      $('#listeProfessionel .imgProfessionel').css('height','1024px');
      $('#listeProfessionel').css('height','1024px');
      $('#splash').css('min-height','initial');
      $('#listeProfessionel').css('min-height','initial');
      $('#barreV').css('min-height','initial');
      //alert(windowHeight)
   }


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
  
  
  if($(this).hasClass('open-menu')){
    window.scrollTo(0, 0);
    $('#p-gauche').removeClass('open-menu');
    $('#p-droite').removeClass('open-menu');
    $('.background-menu').removeClass('open-menu');
    $('li.bold').each(function(e){
      $(this).removeClass('visually-visible');
    });
    setTimeout(function(){
      $('#side-menu').toggleClass('visually-hidden');
      setTimeout(function(){
        $('#side-menu').css('display','none');
      },800);
    },500);
  }else{
      $('#side-menu').css('display','block');
        setTimeout(function(){
        $('#side-menu').toggleClass('visually-hidden');
          setTimeout(function(){
            $('#p-gauche').addClass('open-menu');
            $('#p-droite').addClass('open-menu');
            $('.background-menu').addClass('open-menu');

            var timerTime = 500;
            //Pour chaque élément de menu
            $('li.bold').each(function() {
              var currentLi = $(this);
              //Après un certain temps, appraît.
              setTimeout(function() {
                currentLi.addClass('visually-visible');
              }, timerTime);
              //Incrémentation du timer pour ajouter un petit délai (150ms)
              timerTime = timerTime + 100;
            });

          }, 650);
      },200);
  }

  

  $(this).toggleClass('open-menu');
  $('body, html').toggleClass('no-scroll');

  
});

  function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
  }


    if($(window).width() > 768){
      $(window).on('resize',function(){
        $('#instagramFeed .image').each(function(){
            var width = $(this).width();
            $(this).height(width);
        });
      });
    }

      $.ajax({
      type: "GET",
      dataType: "jsonp",
      url: "https://api.instagram.com/v1/users/3447817271/media/recent/?access_token=3447817271.1677ed0.bf0236ef472546348b31d902a48ce06c&count=4",

      success: function(res) {
        for (i = 0; i < 4; i++) {
          var imgUrl = res.data[i].images.thumbnail.url;
          if(imgUrl.indexOf('/s150x150') !== -1){ 
            imgUrl = imgUrl.replace('/s150x150','/s640x640');
          }                        
                            
          var imageInta = "<div class='instagramImage'><a target='_blank' class='image-cont' href='" + res.data[i].link + "'><div class='image' style='background-image:url(" + imgUrl + ");'><div class='content-background'><div class='content'></div></div></div></a></div>";
            $('#instagramFeed').prepend(imageInta);
          }


          $('#instagramFeed .image').each(function(){
            var currentWidth = $(this).width();
            $(this).height(currentWidth);
          })
      }


                
    });


    if($(window).width() > 1025){
      var s = skrollr.init({
          forceHeight: false,
          mobileDeceleration: 0.004
      });
    }

    if($('#list-post-blog-faq').length > 0){
      if($('#list-post-blog-faq').attr('data-return') == '1'){
        $('html, body').animate({
          scrollTop: $('#list-post-blog-faq').offset().top-25
        }, 'slow');
      }
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

    resizePartenaires();

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
              arrValuesString = arrValues.toString();
              arrValuesTiret = replaceAll(arrValuesString,',','-');
              $('#'+input).val(arrValuesTiret);
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
