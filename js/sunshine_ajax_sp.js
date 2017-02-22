	var theaterSelector="#theaterSelect";
	var daySelector="#daySelect";
	var movieSelector="#movieSelect";
	var transporting=false;
	var postDate="";
	var postMovie="";
	var postTheater="";
	$(function(){
		$(theaterSelector).change( function(){
			initDate();
			initMovie();

			loadingDate();
			loadingMovie();
			setDisable();
			getJson( $(this).val() ); // 選択されている値を引数に
			//getJson( $(this).val(),$(daySelector).val() );
		}).change();

		$(daySelector).change( function(){
			initMovie();
			loadingMovie();
			setDisable();
			getJson($(theaterSelector).val(), $(this).val() ); // 選択されている値を引数に
		});

	});

	//date movie 初期化
	function initDate() {
		$(daySelector).find( "option" ).remove();
		//$(movieSelector).find( "option" ).remove();
	}
	//movie 初期化
	function initMovie(){
		$(movieSelector).find( "option" ).remove();
	}


	function setDisable(){
		$('.disable_class').block({message:'<div><img style="width:15px;height:15px;margin:0 auto;" src="../images/common/ajax-loader_s.gif" /></div>',fadeIn:1, css:{border:'none', backgroundColor:'none'}} );
		/*$(theaterSelector + " option").each(function() {
			if ($(this).attr("selected") != "selected") {
				$(this).attr("disabled","disabled");
			}

		});
		$(daySelector + " option").each(function() {
			if ($(this).attr("selected") != "selected") {
				$(this).attr("disabled","disabled");
			}

		});
		$(movieSelector + " option").each(function() {
			if ($(this).attr("selected") != "selected") {
				$(this).attr("disabled","disabled");
			}

		});*/
	}
	function setAble(){
		$('.disable_class').unblock({fadeOut:0 });
		/*$(theaterSelector + " option").each(function() {
			$(this).removeAttr("disabled","disabled");
		});
		$(daySelector + " option").each(function() {
			$(this).removeAttr("disabled","disabled");
		});
		$(movieSelector + " option").each(function() {
			$(this).removeAttr("disabled","disabled");
		})*/;
	}

	//loadingDate
	function loadingDate() {
    	var elm = $("<option>").html("Loading...").attr({ value: "" });
    	$(daySelector).append(elm);
	}
	//loading Movie
	function loadingMovie(){
		var elm = $("<option>").html("Loading...").attr({ value: "" });
    	$(movieSelector).append(elm);
	}

	function getJson(theater,date) {
		//console.log(theater);
		var params;
		var judge;

		//movie
		if (theater !== undefined  && date !== undefined ) {
			judge="date";
			params = {
					"theater": theater,
					"date": date
					//"noCache": noCache
				}

		} else if(theater!== undefined) {
			judge="theater";
			params = {
					"theater": theater
					//"noCache": noCache
				}
		}else {
			//エラー処理
		}

		transporting =$.ajaxSetup({ cache: false });
		//ajaxCall=  $.getJSON(
		$.ajax({
					dataType: "json",
			//"http://localhost/cinemasunshine/lib/getJson.php",            // リクエストURL
				    url:"../lib/getJson.php",
				    data:params,
				    timeout:20000, // SSKTS-112
					success: function(data, status) {    // 通信成功時にデータを表示
					    	//console.log(data.error);

						    //Loadingをクリアする。

						    if (judge == "date") {
						    	initMovie();
							} else {
								initDate();
							}

				    		//1のdateのみ取得して再度実行させる。
				    		//劇場選択の際自動的にmovieリストまで出力させるため。
				    		var cnt=1;
				    		var selected_date=null;

				    		//console.log(getUrlVars()['theater']);
					    	//iがkey
						    for (i in data.data) {
								if(cnt==1) {
									//Getがない場合は一番上の値でmovieを取得
									selected_date=i;
								}
								//dateを選択したらmovieを追加する
						    	if (judge == "date"){
							    	var elm;
							    	//console.log(decodeURI(getUrlVars()['movie']));
							    	//console.log(data.data[i]);
							    	//選択してくださいを追加
							    	if(cnt==1) {
							    		elm = $("<option>").html("選択してください。").attr({ value: "" });
							    		$(movieSelector).append(elm);
							    	}
							    	if (i==postMovie){
							    		elm = $("<option>").html(data.data[i]).attr({ value: i,selected:"selected" });

								    } else {
								    	elm = $("<option>").html(data.data[i]).attr({ value: i });

									}
							    	$(movieSelector).append(elm);
								//劇場を選択したらdataを追加する。
								} else {
									var elm;
									if (i==postDate){
										//Get値がある場合はもう一度セット
										selected_date=i;
										//elm = $("<option>").html(i).attr({ value: i ,selected:"selected","disabled":"disabled"});
										elm = $("<option>").html(i).attr({ value: i ,selected:"selected"});
									} else {
										//elm = $("<option>").html(i).attr({ value: i ,"disabled":"disabled"});
										elm = $("<option>").html(i).attr({ value: i });
									}


							    	$(daySelector).append(elm);
							    }
						    	//console.log("key"+i);
						    	//console.log("vl"+data.data[i]);
								cnt++;
							}

							if (judge == "date") {
								setAble();
							}
						    //劇場を選択すると作品リストまでまとめて出力する処理
							if(judge=="theater" && selected_date != null) {
								getJson( $(theaterSelector).val(),selected_date );
							}
							isneedtoKillAjax=false;
				    },
				    error: function(jqXHR, status, errorThrown){
				    	if(status=="timeout") {
				        	 alert("スケジュール取得に失敗しました。再度読み込み直してください。");
							 setAble();
				        }
				     }

		});
	}
