jQuery(function ($) {
  /**
   * =================================================
   * Sticky Header
   * =================================================
   */

  $(window).on('load scroll', function() {
    if ($(window).scrollTop() > 0) {
      $('.main-header').addClass('scrolled');
    } else {
      $('.main-header').removeClass('scrolled');
    }
});

  let stickyHeader = $('.main-header');
  const scrollTrigger = function (e) {
    $('.navbar-sticky').removeClass('header-hidden');
    stickyHeader.removeClass('sticky-nav-open');

    
    if ($(window).scrollTop() > 50) {
      $('.main-header').addClass('is-not-top');
    } else if ($(window).scrollTop() < 50) {
      $('.main-header').removeClass('is-not-top');
    }
  };

  // scrollTrigger();
  if ($('body').hasClass('single-thematic_area')) {
    var scrollEvent = 'mousewheel';
  } else {
    var scrollEvent = 'scroll';
  }
  $(window).on(scrollEvent, function () {
    scrollTrigger();
  });

  // //auto hide header
  var mainHeader = stickyHeader,
    headerHeight = mainHeader.height();
  // mainHeader.addClass('fixed');

  $('header.wp-block-template-part .masthead').css('height', headerHeight);

  $(window).on('resize', function () {
    headerHeight = mainHeader.height();
    $('header.wp-block-template-part .masthead').css('height', headerHeight);
  });

  //set scrolling variables
  var scrolling = false,
    previousTop = 0,
    currentTop = 0,
    scrollDelta = 1,
    scrollOffset = 0;

  $(window).on(scrollEvent, function () {
    if (!scrolling) {
      scrolling = true;
      !window.requestAnimationFrame ? setTimeout(autoHideHeader, 0) : requestAnimationFrame(autoHideHeader);
    }
  });

  $(window).on('resize', function () {
    headerHeight = mainHeader.height();
  });

  function autoHideHeader() {
    var currentTop = $(window).scrollTop();
    checkSimpleNavigation(currentTop);

    previousTop = currentTop;
    scrolling = false;
  }

  function checkSimpleNavigation(currentTop) {
    if (previousTop - currentTop > scrollDelta) {
      //if scrolling up...
      mainHeader.removeClass('is-hidden');
      // $('.navbar-sticky').removeClass('header-hidden');
      // $('.navbar-sticky').removeClass('nav-to-top');
      // $('.section-navigation.sticky').css('top', '78px');
    } else if (currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
      //if scrolling down...
      $('.section-navigation.sticky').css('top', '0px');
      mainHeader.addClass('is-hidden');
      // $('.navbar-sticky').addClass('header-hidden');
      $('.nav-toggle').removeClass('open');
      $('.menu-toggle').removeClass('active');
      $('.menu-item').removeClass('active');
      $('.sub-menu').removeClass('show');
    }
  }

  /**
   * =================================================
   * Header responsive toggle menu
   * =================================================
   */
  $(function () {
    const $element = $('.wp-block-navigation:not(.has-background) .wp-block-navigation__responsive-container');

    const observer = new MutationObserver(function (mutationsList, observer) {
      mutationsList.forEach((mutation) => {
        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
          if ($element.hasClass('is-menu-open')) {
            $element.find('ul.wp-block-navigation__container').addClass('show');
          } else {
            $element.find('ul.wp-block-navigation__container').removeClass('show');
          }
        }
      });
    });

    observer.observe($element.get(0), { attributes: true });

    // Attach click event handler to parent element
    $element.on('click', '.wp-block-navigation-item', function () {
      $(this).children().next().next().slideToggle();
      $(this).toggleClass('active');
    });
  });

  /**
   * =================================================
   * Add placeholder Search in input field
   * =================================================
   */

  $('.wp-block-search .wp-block-search__inside-wrapper .wp-block-search__input').attr('placeholder', 'Search...');

  /**
   * =================================================
   * Footer responsive toggle menu
   * =================================================
   */

  const toggleFooterMenu = window.matchMedia('(max-width: 640px)');
  menuFooter(toggleFooterMenu);
  toggleFooterMenu.addEventListener('change', menuFooter);

  function menuFooter(toggleFooterMenu) {
    const $footerLinks = $('.footer-list-wrap .wp-block-column h2').next();
    if (toggleFooterMenu.matches) {
      // // Hide the footer menu initially
      // $($footerLinks).slideUp();

      $('.footer-list-wrap .wp-block-column h2').on('click', function () {
        //  $footerLinks.not($(this).next()).slideUp();
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
    }
  }

  /**
   * =================================================
   * Search icon open & close
   * =================================================
   */
  $(' .main-header .safe-svg-cover').on('click', function () {
    $('.main-navigation-items .wp-block-search').toggleClass('show');
  });

  $(document).on('click', function (event) {
  const target = $(event.target);
  if (!target.closest('.main-header .safe-svg-cover').length && !target.closest('.main-navigation-items .wp-block-search').length) {
    $('.main-navigation-items .wp-block-search').removeClass('show');
  }
});

  /**
   * =================================================
   * slick slider Our-partner
   * =================================================
   */
  $('.partner-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 20000,
    cssEase: 'linear',
    arrows: false,
    variableWidth: true,
  });

  
  

  /**
   * =================================================
   * Partner Data filter
   * =================================================
   */

  const pTax = $('.partner_category li');

  if (pTax.length > 0) {
    const pItem = $('.partner-data .partner-item:not(.no-data)');
    const pExcerpt = $('.partner-data .excerpt');

    pTax.on('click', function () {
      const filterValue = $(this).attr('data-filter');

      if (filterValue == 'all') {
        pItem.show();
        pExcerpt.hide();
      } else {
        pItem.hide();
        pExcerpt.hide();

        $('.partner-data .' + filterValue + '-excerpt').show();
        $('.partner-data .' + filterValue).show();
      }

      $(this).addClass('active').siblings().removeClass('active');
    });

    // $('.partner_category li[data-filter="all"]').click();
  }

  /**
   * =================================================
   * team Data filter
   * =================================================
   */

  const tCat = $('.team_category li');

  if (tCat.length > 0) {
    $('.team_category li').on('click', function () {
      // Get the filter value
      const filterValue = $(this).attr('data-filter');
      // Show all partner data elements if "All" filter is selected
      if (filterValue == 'all') {
        $('.team-data .board, .team-data .staff').show();
      } else {
        // Hide all partner data elements
        $('.team-data .board, .team-data .staff').hide();
        // Show partner data elements with matching data-filter attribute
        $('.team-data .' + filterValue).show();
      }
      // Add active class to the clicked filter button
      $(this).addClass('active').siblings().removeClass('active');
    });
    // Show all content when page loads
    $('.team_category li[data-filter="all"]').click();
  }

  /**
   * =================================================
   * Multimedia video player
   * =================================================
   */
  $('.video-btn').on('click', function () {
    $('body').css('overflow-y', 'hidden');
    $('.video-page').addClass('show');
    var vidSource = $(this).attr('data-src');
    $('iframe').attr('src', vidSource);
    $('.main-header').css({ 'z-index': '10' });
  });
  $('.video-close').on('click', function () {
    $('body').css('overflow-y', 'auto');
    $('.video-page').removeClass('show');
    $('iframe').attr('src', $('iframe').attr('src'));
    $('.main-header').css({ 'z-index': '50' });
  });
  $('.popup-page').on('click', function (e) {
    e.stopPropagation();
    $('.popup-page').removeClass('show');
    $('body').css('overflow-y', 'auto');
    $('iframe').attr('src', $('iframe').attr('src'));
  });

  /**
   * =================================================
   * Multimedia gallery viewer
   * =================================================
   */

  var lightGallery = $('.gallery-images');
  // alert(0);
  if (lightGallery.length > 0) {
    lightGallery.lightGallery({
      pager: true,
      selector: '.item',
      fullScreen: true,
      download: true,
      autoplay: false,
      autoplayControls: true,
      hash: false,
      share: false,
      actualSize: false,
      zoom: true,
    });
  }

  $('.gallery-btn').on('click', function () {
    // console.log($(this).parent().children('.gallery-images').children('.item')[0]);
    $(this).parent().parent().children('.gallery-images').children('.item').trigger('click');
  });

  /**
   * =================================================
   * Multimedia video and photos thumbnail
   * =================================================
   */

  $('.video-btn').each(function () {
    var vidURL = $(this).data('src');
    // console.log(vidURL);
    VID_REGEX = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    vidID = vidURL.match(VID_REGEX)[1];
    var vidThumb = 'http://img.youtube.com/vi/' + vidID + '/maxresdefault.jpg';
    $(this).closest('.post-card').children('.feature-image').children('img').attr('src', vidThumb);
  });

  // $('.post-card').each(function () {
  //   if ($(this).hasClass('video')) {
  //     $(this).children('.photo-gallery-container').css('display', 'none');
  //   } else if ($(this).hasClass('photo')) {
  //     console.log($(this).children('.feature-image'));
  //     $(this).children('.feature-image').css('display', 'none');
  //   }
  // });

  // $('.photo-thumbnail-gallery').slick({
  //   lazyLoad: 'ondemand',
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   infinite: true,
  //   autoplay: true,
  //   autoplaySpeed: 2000,
  //   speed: 1000,
  //   cssEase: 'cubic-bezier(0.600, -0.280, 0.735, 0.045)',
  //   arrows: false,
  // });

  /**
   * =================================================
   * Sticky navbar
   * =================================================
   */

  $(window).on('scroll', function () {
    if ($('.main-header').hasClass('is-hidden')) {
      // console.log('Hidden');
      $('.navbar-sticky').addClass('header-hidden');
    } else {
      // console.log('Shown');
      $('.navbar-sticky').removeClass('header-hidden');
    }
  });

  var yourNavigation = $('.navbar-sticky');
  stickyDiv = 'sticky';
  yourHeader = $('.thematic-hero').height();

  $(window).on('scroll', function () {
    if ($(this).scrollTop() > yourHeader) {
      yourNavigation.addClass(stickyDiv);
    } else {
      yourNavigation.removeClass(stickyDiv);
    }
  });

  $(document).on('scroll', function () {
    var cutoff = $(window).scrollTop();

    $('.nav-items').each(function () {
      if ($(this).offset().top + $(this).height() > cutoff) {
        $('.nav-items').removeClass('current');
        $(this).addClass('current');
        var currSection = $(this).attr('id');
        $('.nav-item').removeClass('active');
        $('.nav-item[data-id=' + currSection + ']').addClass('active');
        return false;
      }
    });
  });

  $('.nav-item').on('click', function () {
    if ($('.main-header').hasClass('is-hidden')) {
    } else {
      $('.main-header').addClass('is-hidden');
      $('.navbar-sticky').addClass('header-hidden');
    }
  });

  /**
   * =================================================
   * Page loader
   * =================================================
   */

  $(window).on('load', function () {
    $('#loading').hide();
  });

  /**
   * =================================================
   * Select2option
   * =================================================
   */
  $(function () {
    $('.form-select').select2();

    $('.form-select').select2({
      width: 'resolve',
      // minimumResultsForSearch: Infinity,
    });
  });

  //  $(function () {
  //   $('div.frm12.frm_first').nextUntil('div.frm12.frm_first', '.frm_form_field').addBack().wrapAll('<div class="form-wrapper"></div>');
  // });

  /**
   * =================================================
   * Header color if there is't any images
   * =================================================
   */

  // document.addEventListener('DOMContentLoaded', function() {
  const careBanner = document.getElementById('care-banner');

  if (careBanner) {
    const content = careBanner.innerHTML;
    const hasImgTag = content.includes('<img');

    if (!hasImgTag) {
      const mainHeader = document.querySelector('.main-header');
      mainHeader.classList.add('no-banner');
    }
  } else {
    const mainHeader = document.querySelector('.main-header');
    mainHeader.classList.add('no-banner');
  }
  // });

  // let careBanner = document.querySelectorAll("care-banner");
  // if (careBanner) {
  //   console.log('there is a banner id');
  // } else {
  //    console.log('there is a no banner  id');
  // }

  // const careBannerId = document.querySelector('#care-banner');
  // console.log(careBannerId);
  // if (careBannerId != null) {

  //   console.log('No care-banner id found');
  // } else {
  //     console.log('careBannerId');
  // }

  /**
   * =================================================
   * Sticky Crisis Response
   * =================================================
   */
  $('.crisis-btn-icon').on('mouseenter', function () {
    $('.crisis-btn').addClass('slideInRight-open');
  });
  $('.crisis-btn').on('mouseleave', function () {
    $('.crisis-btn').removeClass('slideInRight-open');
  });

   /**
   * =================================================
   * Thematic area btn animation
   * =================================================
   */
  $('.animate').on('mouseenter', function() {
    $(this).removeClass('bounce-out').addClass('bounce-in');
  }).on('mouseleave', function() {
    $(this).removeClass('bounce-in').addClass('bounce-out');
  });

  

  /**
   * Add your codes above this comment
   * Console log if everything is ok in the code
   */
  console.log('Website Loaded Successfully.');
});
