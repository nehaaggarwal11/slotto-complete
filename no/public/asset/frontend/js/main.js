
function singlePop(jImgCasinoUrl,jImgCasinoAlt,jCasinoName,jCasinoLink){
  var urlPath = window.location.pathname;
  if(urlPath.search('slot/') == 1){
    $('#gameModal .provider-logo').html("<img src='"+jImgCasinoUrl+"' alt='"+jImgCasinoAlt+"'/>");
    $('#gameModal .provider-name').html('<h3>'+jCasinoName+'</h3>');
    $('#gameModal #popAgree a').addClass('closePop').attr({'href':'javascript:void(0);','data-dismiss':'modal'});
    $('#gameModal #popDisagree a').attr({'href':"/free-slots"});
    $('#gameModal').addClass('show').fadeIn();
  }
  else if(urlPath.search('casino/') == 1){
      $('#gameModal .modal-body').append("<a href='#' class='clos closePop casino-close-btn' data-dismiss='modal'><p style='color:#fff;font-size:14px;margin-bottom:0;padding-top:2px;'>Read Review</p><img src='/asset/frontend/img/popup/arrow.png' alt='moving arrow' class='read-review-arrow' /><img src='/asset/frontend/img/popup/cancel.png' alt='close icon'>");
      $('#gameModal .provider-logo').html("<img src='"+jImgCasinoUrl+"' alt='"+jImgCasinoAlt+"'/>");
      $('#gameModal .provider-name').html('<h3>'+jCasinoName+'</h3>');
      $('#gameModal #popAgree a').attr({'href':jCasinoLink, 'target':'_blank', 'rel':'noreferrer'});
      $('#gameModal').addClass('show').fadeIn();
  }
}

$.fn.loadingButton = function(action) {
    var loadingText = this.data('loading-text') || '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
    if (action === 'loading' && loadingText) {
        this.data('original-text', this.html()).html(loadingText).prop('disabled', true);
    }
    if (action === 'reset' && this.data('original-text')) {
        this.html(this.data('original-text')).prop('disabled', false);
    }
};
////get links
$(window).load(function(){
    $.getScript('https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js');
    //$.getScript('https://www.slottomat.com/asset/frontend/js/popper.min.js');
    $.getScript('https://cdn.jsdelivr.net/npm/sweetalert2@9');
        if($('.gameContent').length <= 4){
            $('.scrlable').removeClass('scrol');
        }
        else{
          $('.scrlable').addClass('scrol');
        }

        $.each($('.game-content').parent(), function(){
          if($(this).attr('id') != "game_list"){
              if($(this).children().length >= 19){
                $(this).css("height","517px").addClass('scrol');
              }
              else{
                $(this).removeClass('scrol');
              }
            }
        });
      $('#slider-section').removeClass('shiftCon');

		 setTimeout(function() {
            // $("#newsletterModal").modal('show');
        }, 10000);
});

$(document).ready(function(){
    $('.rmore').click(function(e){
        var rmore = $(this);
        var slideContent =  $(this).prev().slideToggle(500,function(){
              rmore.text(function(){
                 return slideContent.is(":visible") ? "Les Mindre" : "Les Mer";
            });
       });
    });
    
    $('.rmore').text('Les Mer');

    $("a[target='_blank']").each(function(){
      $(this).attr('rel','noreferrer');
    });
  $(".casino-modal-link").on("click", function () {
          var dataName = $(this).attr("data-name");
          var dataImage = $(this).attr("data-img");
          //alert(dataImage);
          var dataLink = $(this).attr("data-link");
          var dataImageAltText = $(this).attr("data-img-alt-text");
          $('#gameModal .modal-body').append("<a href='javascript:void(0);' id='dismissBtn' class='closePop clos casino-close-btn' ><img src='/asset/frontend/img/popup/cancel.png' alt='close icon'></a>");
          $(".provider-name").html("<h3 class='casino-name'>"+dataName+"</h3>");
          $("#popAgree a").attr({'href':dataLink, 'target':'_blank', 'rel':'noreferrer'});
          $(".provider-logo").html("<img src="+dataImage+" alt="+dataImageAltText+">");
          //$('#gamemodal').modal('show');
          $.closePop();
          $('#gameModal').removeClass('fade').addClass('show').fadeIn();
      });
      $.closePop = function(){
        $('.closePop').click(function(){
            //console.log($(this).attr('id'));
            $('#gameModal').removeClass('show fade').fadeOut();
        });
      }
      $(document).keyup(function(e){
          var key_code = 27;
          if(e.key == "Escape"){
            var display =   $('#gameModal').attr('style');
            if(display == "display: block;"){
              $('#gameModal').removeClass('show fade').fadeOut();
            }
          }
      });
      $('a').click(function(){
          $(this).toggleClass('custActive');
          $(this).children('.fa').toggleClass('fa-angle-down fa-angle-up');
      });

      $('#mobileFilterBtn button').click(function(){
         $('#sideFilter').slideToggle();
      });

      $('.menuToggle').click(function(){
              $('.menu-Icon i').toggleClass('fa-bars fa-times');
              $('.oc-header--desktop').toggleClass('ann');
              if($('.oc-header--desktop').hasClass('ann')){
                  $('#menuOverlay').fadeIn();
                  $('.oc-header--desktop').animate({left:'0'},500);
              }
              else{
                  $('#menuOverlay').fadeOut();
                   $('.oc-header--desktop').animate({left:'-300px'},500);
              }
          });
          $('.menuColla > i').click(function(e){
              e.preventDefault()
              e.stopImmediatePropagation();
              $(this).toggleClass('fa-angle-down fa-angle-up');
              $(this).parent().siblings('ul').slideToggle();
              $(this).parent().parent().siblings('.dropdown-menu--sub').slideToggle();
          });

    var i = 1;
     setInterval(function () {
        i++;
           if(i == '100'){
            i=0;
             $("div.gamenumin").html(i);
           }
          else{
               $("div.gamenumin").html(i);
           }
       }, 1000
     );

       $.getScript('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js',function(){
         $('form.subscribeForm').each(function () {
             $(this).validate({
                 submitHandler: function (_form) {
                     console.log('_form', _form);
                     const form = $(_form);
                     const subBtn = form.find('button[type=submit]');
                     subBtn.loadingButton('loading');
                     if(!form.find('input[name="agree"]').is(':checked')){
                         Swal.fire('Godta vilkår og betingelser', 'De oppgitte dataene var ugyldige.', 'error');
                         subBtn.loadingButton('reset');
                         return false;
                     }
                     $.ajax({
                         url: form.attr('action'),
                         type: "post",
                         data: form.serialize(),
                         dataType: "json",
                         complete: function (xhr,status) {
                             subBtn.loadingButton('reset');
                             const data = xhr.responseJSON;
                             if(status === 'error'){
                                 Swal.fire(data.errors.email[0], data.message, 'error');
                             }else{
                                 Swal.fire('Godt jobbet!', 'En bekreftelses -e -post ble sendt. Vennligst bekreft', 'success')
                                 .then(function () {
                                     $('#newsletterModal').modal('hide');
                                 });
                                 form.find('input[name="email"]').val('');
                             }
                             return false;
                         }
                     })
                     return false;
                 }
             });
         });
       });

    // Initiate the wowjs animation library
    $.getScript('https://cdn.boomcdn.com/libs/wow-js/1.3.0/wow.min.js',function(){
      if(typeof WOW !== 'undefined'){
          new WOW().init();
      }
    });


    $('form#games_filter_form input').on("change, click", function () {
        document.forms.games_filter_form.submit();
    });

    setTimeout(function() {
        $('#success-msg').fadeOut('fast');
    }, 3000);
    $('.counterSelector').click(function(){
        $(this).toggleClass('active');
        $('#multisite_selector ul').slideToggle();
    });
    $('#multisite_selector li').click(function () {
     window.location.href = $(this).attr('data-link');
   });
      if(window.location.href=="https://www.slottomat.com/online-casinos-in-india"){
        $('.counterSelector').html('<img src="https://www.slottomat.com/asset/frontend/img/logo/Flag_of_India.png" alt="india_flag" width="16">&nbsp India');
      }
   $.closePop();
    
  });
