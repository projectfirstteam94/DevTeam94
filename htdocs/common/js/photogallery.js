// 画像一覧JS

jQuery(function($){
	$(".bl_photoCurrent img").bind("load",function(){
		var ImgHeight = $(this).height();
		$('.bl_photoCurrent').css('height',ImgHeight);
	});

	$('.bl_photoThumb a').click(function(){
		if($(this).hasClass('is_over') == false){
			$('.bl_photoThumb a').removeClass('is_over');
			$(this).addClass('is_over');
			$('.bl_photoCurrent img').hide().attr('src',$(this).attr('href')).fadeIn();
			$('.bl_photoCurrent a').hide().attr('href',$(this).attr('href')).fadeIn();
		};
		return false;
	}).filter(':eq(0)').click();
});

jQuery(function($){
	$(".bl_photoCurrent_two img").bind("load",function(){
		var ImgHeight = $(this).height();
		$('.bl_photoCurrent_two').css('height',ImgHeight);
	});

	$('.bl_photoThumb_two a').click(function(){
		if($(this).hasClass('is_over') == false){
			$('.bl_photoThumb_two a').removeClass('is_over');
			$(this).addClass('is_over');
			$('.bl_photoCurrent_two img').hide().attr('src',$(this).attr('href')).fadeIn();
			$('.bl_photoCurrent_two a').hide().attr('href',$(this).attr('href')).fadeIn();
		};
		return false;
	}).filter(':eq(0)').click();
});
