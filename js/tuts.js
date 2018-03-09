(function() {
  $(function() {
    $('body').scrollspy({
      target: ".nav-scrollspy",
      offset: 120
    });
  });

  // $(window).scroll ->
// 	st = $(window).scrollTop()
// 	if st >= ( $('.tutsScrollSpy1').offset().top ) and st < ( $('.scrollspyLast').offset().top )
// 		$('.section--scrollspyyy').css 'position': 'fixed'
// 		$('.section--scrollspyyy').css 'top': '120px'
// 	else if st < ( $('.tutsScrollSpy1').offset().top )
// 		$('.section--scrollspyyyy').css 'top': $('.section--scrollspy').offset().top
// 		$('.section--scrollspyyy').css 'position': 'absolute'
// 	else
// 		$('.section--scrollspyyy').css 'top': $('.section--scrollspy').offset().top
// 		$('.section--scrollspyyy').css 'position': 'absolute'
// 	return
// $(window).trigger 'scroll'

}).call(this);
