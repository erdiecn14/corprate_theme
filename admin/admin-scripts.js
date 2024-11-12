(function($) {
  $(function() {
    
    /**
     * Theme Setup Scripts
     * -------------------------------------------------- 
     */
    
    /**
     * Post Authoring Scripts
     * --------------------------------------------------
     */
    
    /**
     *  Add classes to style background color swatch buttons for layouts. 
     */  
    let $bgColorButtons = $('.admin-bg-color-num-buttons');
    $bgColorButtons.each(function customizePickers(index, buttonGroup) {
      let $bgColorInputLabels = $(buttonGroup).find('.acf-button-group').find('label');
      let $thisButtonGroup = $(this);
      $bgColorInputLabels.each(function addClassesAndDataAttr(index, element) {
        let $this = $(this);
        let inputValue = $this.find('input').val(); 
        let colorNum = inputValue.replace('color_', '');
        if ($this.hasClass('selected')) {
          $thisButtonGroup.attr('data-live-field-bg',`bg-${colorNum}`);
        }
        $this.addClass(['bg-color-label', `bg-${colorNum}`]);
        $this.attr('data-color-num', colorNum);
      });
    })
    
    /**
     * Add a background class to the whole button group field to change the color
     * to match the current selection 
     */
    $bgColorButtons.on('click', function setGroupBgColor(e) {
      let $target = $(e.target);
      if ($target.hasClass('bg-color-label')) {
        let colorNum = 'w';
        let isSelecting = $target.hasClass('selected') === false; 
        if (isSelecting) {
          colorNum = $target.data('color-num');
        }
        $(this).attr('data-live-field-bg',`bg-${colorNum}`);
      }
    });
    
  });
})(jQuery);