import './screen-size';
import './navigation';
import './table-of-contents';
import './togglize';
import './columnize';
import 'SLICK/slick.js';
import 'MFP/jquery.magnific-popup.js';
import './hero-video';
import './tabbit';
import './animations';
import { defineCustomElements } from '@smore/core';

defineCustomElements(window);

(function($){

  $(document).ready(function() {
      
    function reduceAllMotion() {
      console.log('reducing motion...');
      $('video').prop('autoplay',false)
        .siblings('.video-control-button-container').find('.video-control-button').attr('aria-label','play');
    }
    
    /**
     * Flag Prefers Reduced Motion
     */
    const reducedMotionMediaQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
    if (!reducedMotionMediaQuery || reducedMotionMediaQuery.matches) {
      reduceAllMotion();
    }

    let $faqToggles = $(".faq-column").togglize({ action: "toggle", animate: true, animateSpeed: ".5s", firstOpen: false, adaptiveHeight: true });
    let $toggles = $(".togglize-me").togglize({ action: "toggle", animate: true, animateSpeed: ".5s", firstOpen: false });
    let $accordions = $(".accordionize-me").togglize({ action: "accordion", animate: true, animateSpeed: "0.75s" })
    let twoCols = $(".two-col-content").twoColumnize()

    $('.testimonial-slider').slick({
      infinite: true,
      slidesToShow: 1,
      dots: true,
      arrows: false
    });
    
    /**
     * Copy Email Address to Clipboard
     */
    $('#team-member-list').on('click', ".email-copy-button", function(e) {
      let $emailButton = $(this); 
      let email = $emailButton.data('email');
      navigator.clipboard.writeText(email)
      .then(
        function copySuccess() {
          let emailButtonOriginalContent = $emailButton.html();
          $emailButton.text('Email Copied to Clipboard!');
          setTimeout(function resetToOldText() {
            $emailButton.html(emailButtonOriginalContent);
          }, 5000);
        },
        function copyFailed() {
          $emailButton.parent()
          .append($(`<span>Your Browser Does Not Support the Clipboard</span><br><span class='fit-email'>${email}</span>`));
          $emailButton.remove();
        }
      )
    })

    $(".sfpt-lightbox-image").magnificPopup({
      type: "image",
      image: {
        titleSrc: function (item) {
          // lightbox images are not setup with the title attribute
          // so this will return nothing, which is what we want for now
          return item.el.find("img").attr("title");
        }
      },
      closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span aria-hidden="true">&#215;</span></button>',
      tClose: "Close Lightbox (Esc)",
      closeOnContentClick: true
    });

    // $("#load-more-portfolio-cards").on('click', async function(e) {
    //   console.log("click clack");
    
    //   async function getPosts(page = null) {
    //     const newLocal = page ? "&page=" + page : "";
    //     return await fetch(`/wp-json/wp/v2/asset?per_page=100` + newLocal).then(res => {
    //       return res.json().then(json => {
    //         return json.data?.status ? [] : json;
    //       });
    //     });
    //   }
    
    //   const portfolioData = await getPosts();
    //   console.log(portfolioData);
    
    //   const renderNewStatePosts = function (posts) {
    //     console.log(posts, "posts");
    //     let postCards = posts.map(post => {
    //       let card = document.createElement("div");
    //       card.classList.add("card");
    //       card.innerHTML = `
    //           <div class="image--cover no-marg">
    //              ${post.asset_image_srcset}
                
    //           </div>
    //           <div class="card-copy">
    //             <h3>${post.asset_info.rendered}</h3>

    //           </div>
    //         </div>
    //       `;
    //       return card;
    //     });
    
    //     let communityCards = document.getElementById("community-cards");
    //     postCards.forEach((card, index) => {
    //       setTimeout(() => {
    //         communityCards.appendChild(card);
    //       }, 300 * (index + 1));
    //     });
    //   };
    
    //   renderNewStatePosts(portfolioData);
    // }); // end async
      
  })
})(jQuery);