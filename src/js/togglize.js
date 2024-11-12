(function($) {
  $.fn.togglize = function(options) {

    /**
      Individual lists open and close independently
     */
    const toggleAction = function(event) {
      // let $target = $(event.target)
      let $target = $(this);
      let $expandableWrapper = event.data.expandableTarget
      const expanded = $target.attr("aria-expanded") === "true" || false
      $target.attr("aria-expanded", !expanded)
      $expandableWrapper.prop("hidden", expanded)
      const expandableHeight = $expandableWrapper[0].scrollHeight
      if (expanded === false && event.data.toggleSettings.animate) {
        $expandableWrapper.css({ "max-height": expandableHeight })
      } else if (expanded === true && event.data.toggleSettings.animate) {
        $expandableWrapper.css({ "max-height": "0" })
      }
    }

    /**
      Only one list can be open at a time. Opening a list closes other open lists.
     */
    const accordionAction = function(event) {
      // let $target = $(event.target)
      let target = $(this);
      const expanded = $target.attr("aria-expanded") === "true" || false
      let $expandableWrapper = event.data.expandableTarget
      if (expanded === false) {
        console.log('---expandable height : ',$expandableWrapper[0].scrollHeight);
        $expandableWrapper.prop("hidden", false)
        $expandableWrapper.siblings(".expandable").prop("hidden", true)
        $expandableWrapper.siblings(":header").find("button").attr("aria-expanded", false)
        $target.attr("aria-expanded", "true")
        const expandableHeight = $expandableWrapper[0].scrollHeight
        if (event.data.toggleSettings.animate) {
          $expandableWrapper.siblings(".expandable").css({ "max-height": "0" })
          console.log("setting wrapper height to: ", expandableHeight)
          $expandableWrapper.css({ "max-height": expandableHeight })
        }
      }
    }
    
    const makeButtonAndExpandable = function(index, heading) {
      const $heading = $(heading)
      const headingText = $heading.html()
      $heading.html($("<button>").attr("aria-expanded", "false").addClass("togglize-button").html(headingText))
      const $nonHeadings = $(heading).nextUntil(":header")
      const $expandableWrapper = $("<div>").addClass("expandable").prop("hidden", true)

      if (settings.animate) {
        $expandableWrapper.css({ "max-height": "0", transition: `max-height ease-in-out ${settings.animateSpeed}`, overflow: "hidden" })
      }

      $expandableWrapper.append($nonHeadings)
      $heading.after($expandableWrapper)

      if (settings.action == "toggle") {
        $heading.on("click", "button", { expandableTarget: $expandableWrapper, toggleSettings: settings }, toggleAction)
      }

      if (settings.action == "accordion") {
        $heading.on("click", "button", { expandableTarget: $expandableWrapper, toggleSettings: settings }, accordionAction)
      }
    }
    
    const setFixedToggleGroupHeight = function($toggleGroup, $headingButtons) {
      // Need to set a min height so the layout doesn't shift every time you click a toggle
      // get the heights of all the sections of copy that will be toggled
      let expandableHeights = $headingButtons.next('.expandable').map((i,e) => e.scrollHeight);
      // find the tallest section of copy that will be toggled
      let tallestExpandableSectionHeight = Math.max.apply(Math, expandableHeights); 
      // need the total height of all heading/buttons to figure out the required full height   
      let totalHeadingsHeight = $.makeArray($headingButtons.map((i,e) => e.scrollHeight)).reduce((prev, curr) => prev + curr); 
      let minSectionHeight = totalHeadingsHeight + tallestExpandableSectionHeight;
      $toggleGroup.css({'min-height': minSectionHeight });
    }
    
    const initToggles = function(index, element) {
      const $copySection = $(element)
      const $headings = $copySection.find(":header")
      $headings.each(makeButtonAndExpandable);

      if (settings.adaptiveHeight === false) {
        setFixedToggleGroupHeight($copySection, $headings);
        $(window).on('resize', function() {
          console.log('resetting toggle group sizes...');
          setFixedToggleGroupHeight($copySection, $headings);
        });
      } 

      if (settings.firstOpen) {
        $($headings[0]).find("button").attr("aria-expanded", "true")
        $($headings[0]).next(".expandable").prop("hidden", false)
        if (settings.animate) {
          const expandedHeight = $($headings[0]).next(".expandable")[0].scrollHeight
          $($headings[0]).next(".expandable").css({ "max-height": expandedHeight })
        }
      }
    }

    const settings = $.extend(
      {
        action: "toggle",
        animate: false,
        animateSpeed: "0.2s",
        firstOpen: true,
        adaptiveHeight: false
      },
      options
    );

    return this.each(initToggles);

  }
})(jQuery);