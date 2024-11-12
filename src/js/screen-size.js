;(function($){
  // Initialize the window size global variable on page load
  window.screenSize = 'wide';
  
  if (window.matchMedia("(max-width: 980px)").matches) {
    window.screenSize = 'not-desktop';
  } else if (window.matchMedia("(max-width: 768px)").matches) {
    $('.fullscreen').css({height:window.innerHeight});
    window.screenSize = 'narrow';
  }
  
  $(document).ready(function() {
    
    /**
    * Fix 100vh on mobile 
    * */ 
     $(window).on('resize',function() {
      window.screenSize = 'wide';
      if (window.matchMedia("(max-width: 768px)").matches) {
        // console.log('narrow device');
        $('.fullscreen').css({height:window.innerHeight});
        window.screenSize = 'narrow';
      }
    });

  });
  
})(jQuery)