$(function() {
	setSize();
	//リサイズしたら実行
	$(window).resize(function(){
	   setSize();
	});
});

function setSize() {
	//画像サイズ指定
	var imgW = 1116;
	var imgH = 674;
	//ウィンドウサイズ取得
	var winW = $(window).width();
	var winH = $(window).height();
	var scaleW = winW / imgW;
	var scaleH = winH / imgH;
	var fixScale = Math.max(scaleW, scaleH);
	var setW = imgW * fixScale;
	var setH = imgH * fixScale;
	var moveX = Math.floor((winW - setW) / 2);
	var moveY = Math.floor((winH - setH) / 2);

	$('#bg').css({
		'width': setW,
		'height': setH,
		'left' : moveX,
		'top' : moveY
	});
}