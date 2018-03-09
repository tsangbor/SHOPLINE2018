$(function() {
  $('body').scrollspy({
    target: ".nav-scrollspy",
    offset: 500
  });
});

// $(window).scroll ->
// 	st = $(window).scrollTop()
// 	ss = $('.featureScrollSpyStart').offset().top - ($(window).height() - 200)
// 	se = $('.scrollspyLast').offset().top
// 	if st < ss
// 		console.log "a"
// 		$('.section--scrollspy').css 'top': $('.section--scrollspy').offset().top
// 		$('.section--scrollspy').css 'position': 'absolute'
// 		$('.section--scrollspy').css 'top': 'auto'
// 	else if st >= ss and st < se
// 		console.log "b"
// 		$('.section--scrollspy').css 'position': 'fixed'
// 		$('.section--scrollspy').css 'top': '200px'
// 	else
// 		console.log "c"
// 		$('.section--scrollspy').css 'position': 'absolute'
// 		$('.section--scrollspy').css 'top': se
// 	return
// $(window).trigger 'scroll'
