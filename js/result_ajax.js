
			function getJsonR(theater,date,movie) {
			var params;
			var judge;


			//movie
			params = {
					"theater": theater,
					"date": date,
					"movie":movie,
					"result":"true"
					//"noCache": noCache
				}

			transporting =$.ajaxSetup({ cache: false });
			//ajaxRCall =  $.getJSON(
			$.ajax({
				dataType: "json",
					 url: "./lib/getJson.php",            // リクエストURL
					   // "/cinemasunshine/lib/getJson.php",
					   data: params,
					   timeout:setTimeOut,
					   success: function(data, status) {    // 通信成功時にデータを表示
						   //console.log(data.data);
								var useable = data.data.usable;
								var date = data.data.date;

								var all_html = document.createElement('div');
								$(all_html).addClass('movieListBox');

								$('.start').html(data.attention);
						    	var datebox = document.createElement('h3');
						    	$(datebox).html("シネマサンシャイン"+theaterList[theater]+"<br>"+getDateFormat(date));
						    	$(datebox).addClass('redTitle');
						    	$(all_html).append(datebox);

								//console.log(datebox);

								var repeatbox;

								//movie1件対応
								var movies = new Array();
								if (data.data.movie.length == undefined) {
									movies[0] =data.data.movie;

								}else {
									movies =data.data.movie;
								}

							    for (i in movies) {
								    //console.log(movies[i].name);

							    	//ajax 要素
							    	var movie =movies[i];

									//movie名
									var movieName = movie.name;

									var xml_comment="";
									if (!isEmpty_O(movie.comment)) {
										xml_comment = "  /"+movie.comment;
									}
									//ename
									var movieEname=isEmpty_O(movie.ename) ? "" : movie.ename;
									movieEname = movieEname +xml_comment ;

									//上映時間
									var running=isEmpty_O(movie.running_time) ? "" : movie.running_time;

									//公式サイト
									var offical_site=isEmpty_O(movie.official_site) ? "" : movie.official_site;

									//html生成
									repeatbox = document.createElement('div');
							    	$(repeatbox).addClass('movieRepeattBox').addClass('clearfix').addClass('start');

								    	var repeattop = document.createElement('div');
								    	$(repeattop).addClass('top').addClass('clearfix');

								    	$(repeatbox).append(repeattop);

									    	var repeatTopLeft=document.createElement('div');
									    	$(repeatTopLeft).addClass('left');


										    	var repeatTopLeftTitle=document.createElement('p');
										    	$(repeatTopLeftTitle).addClass('movieTitle');

										    	if(offical_site!=""){
											    	var offA = document.createElement('a');
											    	$(offA).attr('href',offical_site);
											    	$(offA).attr("target","_blank")
											    	$(offA).text(movieName);
											    	$(repeatTopLeftTitle).append(offA);
										    	} else {
										    		$(repeatTopLeftTitle).text(movieName);
											    }

										    	var repeatTopLeftNote=document.createElement('p');
										    	$(repeatTopLeftNote).addClass('movieNote');

										    	$(repeatTopLeftNote).text(isEmpty_O(movieEname) ? "" : movieEname);

										    	$(repeatTopLeft).append(repeatTopLeftTitle).append(repeatTopLeftNote);
										    	$(repeattop).append(repeatTopLeft);

									    	var repeatTopRight=document.createElement('div');
									    	$(repeatTopRight).addClass('right');

										    	var repeatTopRightTime=document.createElement('p');
										    	$(repeatTopRightTime).addClass('movieTime');
										    	$(repeatTopRightTime).text("上映時間： "+running+"分");

										    	$(repeatTopRight).append(repeatTopRightTime);

										    $(repeattop).append(repeatTopRight);

									    	$(repeatbox).append(repeattop)
									    	//console.log(movie);


									 //screen1件対応
									var screens =new Array();;
									if (movie.screen.length == undefined) {
										screens[0] =movie.screen;
									}else {
										screens =movie.screen;
									}

									//console.log(screens);
							    	for(j in screens) {
								    	//console.log(screen);
							    		var screen =screens[j];

									    //screen 名
										var screenName = screen.name;

								    	var repeatBottom=document.createElement('div');
								    	$(repeatBottom).addClass('bottom');

								    		var repeatUl=document.createElement('ul');

								    		var cnt=1;

								    		//時間1件対応
											var times =new Array();;
											if (screen.time.length == undefined) {
												times[0] =screen.time;
											}else {
												times =screen.time;
											}

								    		for(k in times) {
									    		var time = times[k];

												if(cnt==6) {
													//5を超える場合はli初期化(新しいbottom)
													$(repeatBottom).append(repeatUl);
													$(repeatbox).append(repeatBottom);

													repeatBottom=document.createElement('div');
											    	$(repeatBottom).addClass('bottom');
											    	repeatUl=document.createElement('ul');
											    	cnt=1;
												}

										    	var timeLi=document.createElement('li');
										    	if (cnt==1) {
										    		$(timeLi).addClass('start');
										    	}

										    	var timeTxt=document.createElement('p');
										    	$(timeTxt).addClass('timeTxt');
										    	$(timeTxt).html('<span>'+getTimeFormat(time.start_time)+'</span>～'+(isEmpty_O(time.end_time) ? "" : getTimeFormat(time.end_time)));


										    	var timeBtn=document.createElement('p');
										    	$(timeBtn).addClass('buyBtn');


										    	if(time.available==6) {
										    		$(timeBtn).html('<span>'+screenName+'</span>');
										    	}else if(time.available==1 || time.available==4) {
											    	var buyBtnImg = document.createElement('img');
											    	$(buyBtnImg).attr('src','./images/common/btn_buyPtn1.png');

											    	$(timeBtn).html('<span>'+screenName+'</span>');
											    	$(timeBtn).append(buyBtnImg);

										    	} else if (time.available==5) {
											    	var buyBtnImg = document.createElement('img');
											    	$(buyBtnImg).attr('src','./images/common/btn_buyPtn5.png');

											    	$(timeBtn).html('<span>'+screenName+'</span>');
											    	$(timeBtn).append(buyBtnImg);

										    	} else {
										    		var buyBtnA = document.createElement('a');
										    		if (theater !== 'aira' && theater !== 'kitajima') {
										    			$(buyBtnA).attr("target","_blank");
										    		}
											    	var buyBtnImg = document.createElement('img');
											    	$(buyBtnA).attr('href',time.url);
											    	$(buyBtnImg).attr('src','./images/common/btn_buyPtn'+time.available+'.png');
											    	$(buyBtnA).append(buyBtnImg);

											    	$(timeBtn).html('<span>'+screenName+'</span>');
											    	$(timeBtn).append(buyBtnA);
										    	}


										    	var timeCornet=document.createElement('p');


										    	if (time.late =="2") {
										    		$(timeCornet).addClass('corner');
											    	$(timeCornet).text("★");
										    	} else if(time.late =="1") {
										    		$(timeCornet).addClass('corner2');
										    		$(timeCornet).html('<img src="./images/common/icon_morning2.png">');
										    	}

										    	cnt++;

										    	$(timeLi).append(timeTxt).append(timeBtn).append(timeCornet);
										    	$(repeatUl).append(timeLi);



									    	}//movie終わり


									    	//空のliを生成
									    	if(cnt < 6) {
										    	for (cnt; cnt < 6; cnt++) {
											    	var timeLi=document.createElement('li');

											    	var timeTxt=document.createElement('p');
											    	$(timeTxt).addClass('timeTxt');

											    	var timeBtn=document.createElement('p');
											    	$(timeBtn).addClass('buyBtn');

											    	var timeCornet=document.createElement('p');
											    	$(timeCornet).addClass('corner');


											    	$(timeLi).append(timeTxt).append(timeBtn).append(timeCornet);
											    	$(repeatUl).append(timeLi);
										    	}
									    	}
								    		$(repeatBottom).append(repeatUl);
								    		$(repeatbox).append(repeatBottom);


								    }//screen終わり
								    		$(all_html).append(repeatbox);
								}

							    $('.movieListBox').unblock({fadeOut:300 });
							    $('.movieListBox').remove();
							    $('.scheduleBox').prepend(all_html);

					    },
					    error: function(jqXHR, status, errorThrown){
					    	if(status=="timeout") {
					        	 alert("スケジュール取得に失敗しました。再度読み込み直してください。");
					        	 $('.movieListBox').unblock({fadeOut:300 });
					        }
					     }
			});
		}
