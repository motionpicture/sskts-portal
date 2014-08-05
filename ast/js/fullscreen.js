$(function() {
	setSize();
	//リサイズしたら実行
	$(window).resize(function(){
	   setSize();
	});
});

function setSize() {
	//画像サイズ指定
	var imgW = 1280;
	var imgH = 800;
	//ウィンドウサイズ取得
	var winW = $(window).width();
	var winH = $(window).height();
	var scaleW = winW / imgW;
	var scaleH = winH / imgH;
	var fixScale = Math.max(scaleW, scaleH);
	var setW = imgW * fixScale;
	var setH = (imgH * fixScale);
	var moveX = Math.floor((winW - setW) / 2.5);
	var moveY = Math.floor((winH - setH) / 2.5);
	var footer_width = $("#footer").height();
	
	$('#bg').css({
		'width': setW,
		'height': (setH-footer_width),
		'left' : moveX,
		'top' : moveY
	});
}