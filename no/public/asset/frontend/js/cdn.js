jQuery(document).ready(function(){
    //<!-- Global site tag (gtag.js) - Google Analytics -->
$.getScript('https://www.googletagmanager.com/gtag/js?id=G-77ZLR7M5GT')
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-77ZLR7M5GT');
  // Include cookiealert script
  $.getScript('https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js');
  // Bootstrap Js
  // $.getScript('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
  //popper js for popups
  //$.getScript('https://www.slottomat.com/asset/frontend/js/popper.min.js');
  // Wow.js
  $.getScript('https://cdn.boomcdn.com/libs/wow-js/1.3.0/wow.min.js');
  // For Alert on forms submits
  $.getScript('https://cdn.jsdelivr.net/npm/sweetalert2@9');

});
