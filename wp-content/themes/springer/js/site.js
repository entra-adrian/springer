jQuery(document).ready(function($) {
    document.ontouchmove = function(e){
        return true;
    }

    // Hamburger
    $(".hamburger").on("click", function(event) {
        event.preventDefault();

        $(this).toggleClass("is-active");
        $("html, body").toggleClass("is-noscroll is-open-menu");
        $("#main-nav").toggleClass("is-open-menu");
    });

    // Handle main nav dropdown menu functionality
    $(".main-nav .menu-item-has-children > a").on("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        console.log('clicked on menu a');
        var $menuItemLink = $(this);
        var $thisMenu = $menuItemLink.parent();
        var isMenuOpen = $menuItemLink.parent().hasClass("open-submenu");
        // check if this submenu is open
        if (isMenuOpen) {
            console.log('is menu open');
            // remove classes from the current open sub-menu <li>
            $menuItemLink.parent().removeClass("open-submenu current-open-menu");
            // find the closest open sub-menu <li> in the parent tree and add current class to it
            $menuItemLink.closest(".open-submenu").addClass("current-open-menu");
        } else {
            console.log('is menu not open');
            // remove classes from all open sub-menu <li>
            $(".main-nav .open-submenu").removeClass("open-submenu current-open-menu");
            // find this and all parent sub-menu <li>, add open class
            $menuItemLink.parents(".menu-item-has-children").addClass("open-submenu");
            // add current class to this sub-menu <li>
            $thisMenu.addClass("current-open-menu");
        }
    });

    // Remove Navigation when clicked outside
    //$(document).mouseup(function (event) {
    //	var container = $('.main-nav');
    //
    //	if (!container.is(event.target) && container.has(event.target).length === 0) {
    //		container.find('.menu-item').removeClass('open-submenu current-open-menu');
    //	}
    //});
    
    // sticky header
    var lastScrollTop = 0;
    $(window).on('scroll', function(e) {
        var scroll_top = $(this).scrollTop();
        if ( scroll_top < lastScrollTop || scroll_top < $('.header').height() ){
            $('.header').removeClass("sticky");
        } else {
            $('.header').addClass("sticky");
        }
        lastScrollTop = scroll_top;

    });

    // Define Flickity options & initialise Flickity slideshows
    $(document).ready(function() {
        var flickity_defaults = {
            accessibility: false,
            autoPlay: false,
            cellAlign: "center",
            cellSelector: ".slideshow-slide",
            contain: true,
            draggable: ">1",
            imagesLoaded: true,
            pageDots: false,
            prevNextButtons: true
        };
    
        $(".slideshow").each(function() {
            var $slideshow = $(this); // Reference the current slideshow
            if ($slideshow.find('.slideshow-slide').length > 1) {
                // Fetch Flickity options from data attribute if available
                var customOptions = $slideshow.data("flickity-options");
                var flickity_options = $.extend({}, flickity_defaults, customOptions || {});
                
                // Initialize Flickity
                $slideshow.flickity(flickity_options);
            }
        });
    });
    
    // accordion
    $('.accordion-title').on('click', function(e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.hasClass('is-active')) {
            $this.removeClass('is-active');
            $this.next().removeClass('is-active');
        } else {
            $this.parents('.accordion').find('.accordion-panel').removeClass('is-active');
            $this.parents('.accordion').find('.accordion-title').removeClass('is-active');
            $this.next().toggleClass('is-active');
            $this.toggleClass('is-active');
        }
    });

    // Tabs
    $('body').on('click', '.tabs-navigation a', function(e) {
        e.preventDefault();
        var target = $(this).data('tab');
        var $tabs_nav = $(this).closest('.tabs-navigation');
        var $parent = $(this).closest('.tabs');

        $tabs_nav.find('a').not($(this)).removeClass('is-selected');
        $(this).addClass('is-selected');

        $parent.find('.tab-panel').not('[data-tab-panel="'+ target +'"]').removeClass('is-selected');
        $parent.find('.tab-panel[data-tab-panel="'+ target +'"]').addClass('is-selected');
    });

    // cookie banner
    if ($(".cookie-notification").length > 0) {
        setTimeout(function () {
            $(".cookie-notification").addClass("animate-in");
        }, 5000);
    }
    
    $(".cookie-notification-dismiss").on('click', function (e) {
        e.preventDefault();

        Cookies.set("site-cookie-status", "dismissed", { expires: 30 });
        // remove the animate-in class
        $(".cookie-notification").removeClass("animate-in");
    });

    // gallery lightbox
    $('.image-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });
    
    $('.play-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.show-more-button').on('click', function() {
        var items = $('.timeline-items-wrapper .item.timeline');
        
        if ($(this).hasClass('showing')) {
            items.slice(3).slideUp(); // Hide items after the first 3
            $(this).text('Show More').removeClass('showing');
        } else {
            items.slideDown(); // Show all items
            $(this).text('Show Less').addClass('showing');
        }
    });

    // News Popup functionality
    // Open the popup for the specific item clicked
    $('.read-more-button').on('click', function (e) {
        e.preventDefault();

        const $article = $(this).closest('article'); // Target the specific article
        $article.addClass('open-popup'); // Add the class to open the popup
        $('body').addClass('dark no-scroll'); // Add classes to body for overlay effects
    });

    // Close the popup when clicking button-close or outside popup-inner
    $(document).on('click', function (e) {
        const $target = $(e.target);

        // Check if the clicked element is button-close or inside button-close
        if ($target.closest('.button-close').length) {
            e.preventDefault(); // Prevent the page from refreshing

            const $article = $target.closest('article.open-popup'); // Find the open article
            $article.removeClass('open-popup'); // Remove the open class
            $('body').removeClass('dark no-scroll'); // Remove overlay classes from body
        }

        // Check if the click is outside of popup-inner
        else if (!$target.closest('.popup-inner').length && $target.closest('.item-popup').length) {
            const $article = $target.closest('article.open-popup'); // Find the open article
            $article.removeClass('open-popup'); // Remove the open class
            $('body').removeClass('dark no-scroll'); // Remove overlay classes from body
        }
    });


});
