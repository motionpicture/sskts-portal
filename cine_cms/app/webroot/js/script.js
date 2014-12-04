$(function(){
	$('.free .autoNum').click(function(){
	    	var text  = $("#textValue").val();
        	var text2  = "";
        	var target  = "";
        	var flg = false;
        	var movieName  = "";
        	var rep;
        	// 連想配列の初期化
        	var bnr = {};
        	var nums = {};
        	var err = {};
        	var theaters = {
        		ポータルTOP: 'top' ,
			池袋: 'ikebukuro' ,
			平和島: 'heiwajima' ,
			沼津: 'numazu' ,
			北島: 'kitajima' ,
			衣山: 'kinuyama' ,
			大街道: 'okaido' ,
			大洲: 'ozu' ,
			重信: 'shigenobu' ,
			土浦: 'tsuchiura' ,
			かほく: 'kahoku',
			エミフルMASAKI: 'masaki' ,
			大和郡山: 'yamatokoriyama' ,
			下関: 'shimonoseki'
		};

        	$('.tableElement').css("background","#e0e0e0");

        	text = text.replace(/\r\n|\r/g, "\n");

        	//変換配列の用意
        	$.each($('.bnrTitle'),function(i){
        	    bnr[$('.bnrNum').eq(i).text()] = $(this).text();
            	});

        	//入力された内容を1行ずつ配列に分割
        	var lines = text.split('\n');
        	$.each(lines,function(){
        	    target = "";

	            //入力された内容を今度はタブごとに分割
        	    text2 = this.replace(/\t+$/,'');
        	    text2 = text2.split('\t');

        	    $.each(text2,function(i){
	    	        //一番最初は劇場名とする
        		if(i == 0){
	        	    target = this;
	        	    nums[target] = "";
	        	    err[target] = "";
	        	    return true;
	        	}

	    	        //映画のタイトルを取得
	            	movieName = "";
	            	movieName = this;
	            	flg = false;

	    	        //登録されている映画のタイトルからID番号を取得して配列に収める。
	        	$.each(bnr,function(k2,i2){
	        	    	if(i2 == movieName){
		                	$('.left_' + k2).css("background","#fff");
		                	$('.right_' + k2).css("background","#fff");
		        	    	nums[target] = nums[target] + k2 + ',';
			            	flg = true;
		        	    	return false;
	        	    	}
		        });

	        	if(flg == false){
	        	    	nums[target] = nums[target] + 'xxx,';
	        	    	err[target] += '<p style="color:red;">' + target + 'の' + i + '番目の作品(' + movieName +')の登録がありません。<br /></p>';
	        	}
	            });
        	});

        	//末尾の「,」を消してからinputに挿入
		$(".err").text("");
        	$.each(nums,function(k3,i3){
        	    rep = "";
        	    rep = this.replace(/,$/,'');
        	    if($("body").find(".input_" + theaters[k3]).hasClass("input_" + theaters[k3])){
                	    if(err[k3]){
	            		$(".err").append(err[k3]);
        	    	    }

            		    $(".input_" + theaters[k3]).val("");
	            	    $(".input_" + theaters[k3]).val(rep);
        	    }
	        });

	alert("反映が完了しました。");
    });
});