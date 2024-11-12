(function ($) {
  $(function () {

    
    // const autoplayVideoCollection = document.querySelectorAll('.autoplay-video');
    const lazyVideoCollection = document.querySelectorAll(".lazy-video");

    $(".video-control-button").on("click", function (e) {
      // console.log('click',e);
      let $this = $(this);
      let label = $this.attr("aria-label");
      if (label === "play") {
        $this.attr("aria-label", "pause");
        $this.parent().siblings("video").trigger("play");
      } else {
        $this.attr("aria-label", "play");
        $this.parent().siblings("video").trigger("pause");
      }
    });

    const loadVideo = function ($video) {
      $(".fallback-image").css({ display: "none" });
      const videoSourceElementCollection = $video.find("source");
      videoSourceElementCollection.each(function (index, vidSourceElement) {
        const $source = $(vidSourceElement);
        const srcUrl = $source.attr("data-src");
        const smallVidSrcUrl = $source.attr("data-src-small");
        if (window.screenSize == "narrow" && smallVidSrcUrl !== undefined) {
          // load the smaller video on smaller devices
          $source.attr("src", smallVidSrcUrl);
          $video.attr("width", $video.attr("data-small-width"));
          $video.attr("height", $video.attr("data-small-height"));
        } else {
          // load the full size video
          $source.attr("src", srcUrl);
        }
        $video[0].load();
      });
      $video.css({
        height: "100%",
        width: "100%",
      });
      $(".video-control-button-container").css({ display: "flex" });
    };

    let videoInViewObserver = new IntersectionObserver(
      (entryList, observer) => {
        entryList.forEach((entry) => {
          console.log("entry: ", entry);
          if (entry.isIntersecting) {
            if (navigator.connection && !!navigator.connection.effectiveType) {
              if (navigator.connection.effectiveType === "4g") {
                loadVideo($(entry.target));
              } else {
                // too slow for video
                console.log("Slow connection...");
                $(entry.target)
                  .parent(".video-component")
                  .children(".fallback-image")
                  .css({ opacity: "1" });
                // $('.fallback-image').css({'opacity': '1'});
              }
            } else {
              console.log("Navigator API not supported...");
              loadVideo($(entry.target));
            }
            observer.unobserve(entry.target);
          }
        });
      }
    );

    // autoplayVideoCollection.forEach((autoplayVideo) => {
    //  videoInViewObserver.observe(autoplayVideo);
    // });

    lazyVideoCollection.forEach((autoplayVideo) => {
      videoInViewObserver.observe(autoplayVideo);
    });
  });
})(jQuery);
