
// スムーズスクロール
$(function(){
	$('a[href^="#"]').click(function() {
		var speed = 400;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});
});


// viewport切り替え
$(window).on("resize orientationchange", function (e) {
	var wsw = window.screen.width;
	if (wsw <= 750) {
		$("meta[name='viewport']").attr("content", "width=device-width,initial-scale=1.0,minimum-scale=1.0");
	} else if (wsw < 1080) {
		$("meta[name='viewport']").attr("content", "width=900");
	} else {
		$("meta[name='viewport']").attr("content", "width=device-width,initial-scale=1.0,minimum-scale=1.0");
	}
}).trigger("resize");


// SP Gnav
$(function(){
	$(".js_spGnavBtn").on("click", function() {
		$(this).next().slideToggle();
		$("html").toggleClass("is_gnavOpen");
	});
});


// Googleアナリティクス
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-126023437-1');
