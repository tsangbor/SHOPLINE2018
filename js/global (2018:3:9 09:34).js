var _auth, _loaded, _scrolled, bannerSwiper, caseSwiper, getScrollBarWidth, init, loadingNum, md, msrc, n, nowModal, planSwiper, scrollEvent, scrollPageHandle, scrollPageTo, scrolled, stickyInit, tab1Swiper, tab2Swiper, tab3Swiper, tabSwiper, tight;

loadingNum = null;

_loaded = false;

Pace.on("start", function() {
  loadingNum = setInterval(function() {
    var str;
    return str = $('.pace-progress').attr("data-progress-text");
  }, 100);
});

Pace.on("done", function() {
  if (_loaded === false) {
    clearInterval(loadingNum);
    _loaded = true;
    stickyInit();
  }
});

// init()
Pace.start();

// Mobile Detect
md = new MobileDetect(window.navigator.userAgent);

$(function() {
  if (md.mobile()) {
    $("html").addClass("is-mobile");
  } else {
    $("html").addClass("is-desktop");
  }
});

//# scroll
tight = false;

scrolled = false;

$(function() {
  $(window).trigger("resize");
  $(window).scroll(function() {
    scrollEvent();
  });
});

scrollEvent = function() {
  var st, sv;
  st = $(window).scrollTop();
  sv = $(window).height();
  if (st >= 20) {
    $("body").addClass("is-scrolled");
  } else {
    $("body").removeClass("is-scrolled");
  }
};

$(function() {
  $(document).delegate("*[js-scroll]", "click", function(event) {
    var str;
    event.preventDefault();
    str = $(this).attr("js-target");
    if (str === void 0) {
      str = $(this).attr("href");
    }
    scrollPageTo(str);
  });
});

scrollPageTo = function(str) {
  var oy, st;
  oy = $(str).offset().top - $(".header--push").height();
  st = $(window).scrollTop();
  if (md.mobile() === null) {
    scrollPageHandle(oy);
  } else {
    scrollPageHandle(oy);
  }
};

scrollPageHandle = function(n) {
  $('html,body').stop(true, false).animate({
    scrollTop: n,
    easing: "ease"
  }, {
    duration: 777
  });
};

getScrollBarWidth = function() {
  var $outer, widthWithScroll;
  $outer = $('<div>').css({
    visibility: 'hidden',
    width: 100,
    overflow: 'scroll'
  }).appendTo('body');
  widthWithScroll = $('<div>').css({
    width: '100%'
  }).appendTo($outer).outerWidth();
  $outer.remove();
  return 100 - widthWithScroll;
};

//# resize
$(function() {
  $(window).resize(function() {
    // browserWidthResize = $(window).width()
    // alert "here"
    $(".section--overlay").css("min-height", $(window).height());
  });
  // $('.modal').modal 'handleUpdate'
  // $mq = window.matchMedia "(max-width: 767px)"
  // if $mq.matches == true
  // 	$(".mobile--default").click()
  // 	return
  $(window).trigger("resize");
});

//# swiper
caseSwiper = null;

planSwiper = null;

tabSwiper = null;

tab1Swiper = null;

tab2Swiper = null;

tab3Swiper = null;

$(function() {
  if ($("#articleSwiper").length > 0) {
    tabSwiper = new Swiper("#articleSwiper", {
      speed: 777,
      spaceBetween: 20,
      slidesPerView: 3,
      simulateTouch: true,
      navigation: {
        nextEl: '.articleSwiper--wrapper .swiper-button-next',
        prevEl: '.articleSwiper--wrapper .swiper-button-prev'
      },
      breakpoints: {
        768: {
          slidesPerView: 1
        }
      }
    });
  }
  if ($("#drawerSwiperBeginner .swiper-container").length > 0) {
    tab1Swiper = new Swiper("#drawerSwiperBeginner .swiper-container", {
      speed: 777,
      spaceBetween: 20,
      slidesPerView: 3,
      simulateTouch: true,
      navigation: {
        nextEl: '#drawerSwiperBeginner .swiper-button-next',
        prevEl: '#drawerSwiperBeginner .swiper-button-prev'
      }
    });
  }
  if ($("#drawerSwiperCaseshare .swiper-container").length > 0) {
    tab2Swiper = new Swiper("#drawerSwiperCaseshare .swiper-container", {
      speed: 777,
      spaceBetween: 20,
      slidesPerView: 3,
      simulateTouch: true,
      navigation: {
        nextEl: '#drawerSwiperCaseshare .swiper-button-next',
        prevEl: '#drawerSwiperCaseshare .swiper-button-prev'
      }
    });
  }
  if ($("#drawerSwiperDelivery .swiper-container").length > 0) {
    tab3Swiper = new Swiper("#drawerSwiperDelivery .swiper-container", {
      speed: 777,
      spaceBetween: 20,
      slidesPerView: 3,
      simulateTouch: true,
      navigation: {
        nextEl: '#drawerSwiperDelivery .swiper-button-next',
        prevEl: '#drawerSwiperDelivery .swiper-button-prev'
      }
    });
  }
});

$(function() {
  $(document).delegate("*[js-toggle=\"slide-to\"]", "click", function(event) {
    var str;
    str = $(this).attr("js-target");
    $("body").removeClass("is-open-drawer");
    appSlideTo(str);
  });
  $(document).delegate("*[js-toggle=\"slide-to-next\"]", "click", function(event) {
    appSwiper.slideNext();
  });
  $(document).delegate("*[js-toggle=\"slide-to-prev\"]", "click", function(event) {
    appSwiper.slidePrev();
  });
});

//# sticky
stickyInit = function() {
  var $mq;
  $mq = window.matchMedia("(max-width: 62em)");
  console.log("stickyInit");
  if ($("#sticky").length > 0) {
    $("#sticky").sticky({
      topSpacing: 50,
      // bottomSpacing: $("body").height() - $("#stickyEnd").position().top
      zIndex: 9
    });
  }
  if ($("#scrollspy").length > 0 && $("#stickyEnd").length > 0) {
    console.log($("#scrollspy").height());
    $("#scrollspy").sticky({
      topSpacing: 160,
      bottomSpacing: $("body").height() - $("#stickyEnd").position().top + $(".nav-scrollspy").height() + 100,
      zIndex: 9
    });
  }
};

// tab
$(function() {});


// drawer
// $('.tab--sellection').tab('show')
// $('a[data-toggle="tab"]').on 'shown.bs.tab', (e) ->
// 	if $(e.target).attr("data-target") != "#toastDetail"
// 		$("a.nav-link.now").removeClass("now")
// 	scrollPageTo "#top"
// 	switch $(e.target).attr("data-target")
// 		when "#self"
// 			$("input.comment-set").val("0")
// 		when "#set"
// 			$("input.comment-set").val commentSwiper.activeIndex+1
// 	return
// $(document).delegate "*[js-go-privacy]", "click", (event) ->
// 	event.preventDefault()
// 	$("a.nav-link[data-target=\"#privacy\"]").click()
// 	return
// $('a[data-toggle="tab"]').on 'shown.bs.tab', (e) ->
// 	switch $(e.target).attr("data-target")
// 		when "#eventRules"
// 			$('#evenRules__title').show()
// 			$('#privacy__title').hide()
// 		when "#privacy"
// 			$('#privacy__title').show()
// 			$('#evenRules__title').hide()
$(function() {
  $(document).delegate("*[js-toggle=\"drawer\"]", "click", function(e) {
    var menu;
    $('.hamburger').toggleClass("is-active");
    $("body").toggleClass("is-open-drawer");
    menu = $('.hamburger');
    $('.drawer--mask').click(function() {
      $("body").removeClass("is-open-drawer");
      menu.removeClass('is-active');
    });
  });
  $(document).delegate("*[js-toggle=\"search\"]", "click", function(e) {
    $("body").toggleClass("is-open-search");
    $('.button--closeSearch').click(function() {
      $("body").removeClass("is-open-search");
    });
  });
});

// global

//###jQuery.fx.interval = 16.666
md = new MobileDetect(window.navigator.userAgent);

nowModal = "";

bannerSwiper = "";

_loaded = false;

_scrolled = false;

_auth = false;

msrc = "";

n = 0;

$.fn.extend({
  animateCss: function(animationName) {
    var animationEnd;
    animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    $(this).addClass('animated ' + animationName).one(animationEnd, function() {
      $(this).removeClass('animated ' + animationName);
    });
  }
});

$(function() {
  var root;
  root = typeof exports === "function" ? exports(this) : void 0;
  $(".invisible").fadeOut(0);
  $(".invisible").removeClass("invisible");
  $(window).trigger("scroll");
  $(window).trigger("resize");
});

// if $('.buttons').length > 0
// 	$('.buttons').on 'click', ->
// 		$('.block--wrapper').css 'justify-content' : 'space-between'
// 		return
// if $('.buttons2').length > 0
// 	$('.buttons2').on 'click', ->
// 		$('.block--wrapper').css 'justify-content' : 'center'
// 		return

// $("body").on "click", (e) ->
// 	switch true
// 		when $("body").hasClass("cut1")
// 			$("body").removeClass "cut1"
// 			$("body").addClass "cut2"
// 		when $("body").hasClass("cut2")
// 			$("body").removeClass "cut2"
// 			$("body").addClass "cut3"
// 		when $("body").hasClass("cut3")
// 			$("body").removeClass "cut3"
// 			$("body").addClass "cut1"
// 	return

// $(document).mousemove (e) ->
// 	box = $(".meteor3D")
// 	# $mouseAry++
// 	boxCenter = [
// 		box.offset().left + box.width() / 2
// 		box.height() / 2
// 	]
// 	angle = Math.atan2(e.pageY - boxCenter[0], (boxCenter[1]) )*(90/Math.PI)
// 	angle = angle * 3
// 	# box.css 'transform' : 'rotateX( ' + angle + 'deg)' 
// 	# console.log angle
// 	return
init = function() {
  setTimeout(function() {
    return $(".app__loading").fadeOut(777, function() {
      return $(".from").removeClass("from");
    });
  }, 777);
};

// $mq = window.matchMedia "(max-width: 62em)"
// console.log $mq.matches
$(function() {
  $(document).delegate("*[js-alert]", "click", function(e) {
    var str;
    str = $(this).attr("js-alert");
    alert(str);
  });
  $(document).delegate("*[js-trigger]", "click", function(event) {
    var fn;
    fn = $(this).attr("js-trigger");
    eval(fn)();
  });
});

// alert fn
$(function() {
  $(document).delegate("*[js-catalog]", "click", function(e) {
    n = $(this).parent().index();
    tabSwiper.slideTo(n);
  });
  // $(this).addClass "active"
  // $(this).parent().siblings().children(".nav-link").removeClass "active"
  $(document).delegate("*[js-toggle-open]", "click", function(e) {
    $(this).toggleClass("is-open");
  });
  $(document).delegate("*[js-toggle-plan]", "click", function(e) {
    switch ($("#switchYearMonth").is(":checked")) {
      case true:
        $(".card--plan").addClass("is-year");
        $(".card--plan").removeClass("is-month");
        break;
      case false:
        $(".card--plan").addClass("is-month");
        $(".card--plan").removeClass("is-year");
    }
  });
  $(document).delegate("*[js-plan]", "click", function(e) {
    var v;
    v = $(this).attr("js-plan");
    $(this).addClass("active");
    $(this).parent().siblings().children(".nav-link").removeClass("active");
    $(".table--price").removeClass("is-plan-1");
    $(".table--price").removeClass("is-plan-2");
    $(".table--price").removeClass("is-plan-3");
    switch (v) {
      case "1":
        $(".table--price").addClass("is-plan-1");
        break;
      case "2":
        $(".table--price").addClass("is-plan-2");
        break;
      case "3":
        $(".table--price").addClass("is-plan-3");
    }
  });
  $(document).delegate("*[js-toggle-list]", "click", function(e) {
    $(".row--client").addClass("is-list");
    $(".switch--list").addClass("is-list");
    $(".row--client").removeClass("is-block");
    $(".switch--list").removeClass("is-block");
    $(".row--client").fadeOut(0);
    $(".row--client").fadeIn();
  });
  $(document).delegate("*[js-toggle-block]", "click", function(e) {
    $(".row--client").addClass("is-block");
    $(".switch--list").addClass("is-block");
    $(".row--client").removeClass("is-list");
    $(".switch--list").removeClass("is-list");
    $(".row--client").fadeOut(0);
    $(".row--client").fadeIn();
  });
  if ($('.section--news').length > 0) {
    $('.news__caption p span').each(function() {
      var text;
      text = $(this).text().slice(0, 124) + '...';
      $(this).text(text);
    });
    return;
  }
});
