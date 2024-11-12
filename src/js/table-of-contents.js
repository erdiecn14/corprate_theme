;(function($)  {
  $(document).ready(function() {

    if (window.screenSize) {
    
      $('.toc-toggle').on('click', function(e) {
        let $button = $(this);
        let wasPreviouslyExpanded = $button.attr('aria-expanded') == 'true';
        if (wasPreviouslyExpanded) {
          $button.attr('aria-expanded', 'false');
        } else {
          $button.attr('aria-expanded', 'true');
        }
      });
      
      $('.tax-toggle').on('click', function(e) {
        let $button = $(this);
        let wasPreviouslyExpanded = $button.attr('aria-expanded') == 'true';
        if (wasPreviouslyExpanded) {
          $button.attr('aria-expanded', 'false');
          $button.parents('.tax-nav-header').siblings().prop('hidden', true);
        } else {
          $button.attr('aria-expanded', 'true');
          $button.parents('.tax-nav-header').siblings().prop('hidden', false);
        }
      });
    
      // $('#toc-toggle').on('click', function(e) {
      //   let $button = $(this);
      //   let wasPreviouslyExpanded = $button.attr('aria-expanded') == 'true';
      //   if (wasPreviouslyExpanded) {
      //     $button.attr('aria-expanded', 'false');
      //   } else {
      //     $button.attr('aria-expanded', 'true');
      //   }
      // });
    }
    
  })
})(jQuery);