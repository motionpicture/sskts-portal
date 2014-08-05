function checkAndSubmit(form){

	

	var noError = true;

	

	var notNullArray = new Array(

									'name',

									'furigana',

									'gender',

									'age',

									'zip1',

									'zip2',

									'pref',

									'address1',

									'tel',

									'mail1',

									'mail2',

									'occupation',
									
									'present' );

	

	var notNullJArray = new Array(

									

									'お名前',

									'お名前(フリガナ)',

									'性別',

									'年齢',

									'郵便番号1',

									'郵便番号2',

									'都道府県',

									'住所1',

									'電話番号',

									'メールアドレス',

									'メールアドレス(確認用)',

									'職業',
									
									'プレゼント' );

	

	for(var i=0; i<notNullArray.length; i++){

		var item = form[notNullArray[i]];

		if(item.value == ""){

			alert("[" + notNullJArray[i] + "]は、入力又は選択必須項目です");

			item.focus();

			$(item).css("background-color", "#eba4a4");

			noError = false;

			break;

		}else{

			$(item).css("background-color", "");

		}

	}

	

	if(noError && $('#formMail1').val() != $('#formMail2').val()){

		alert("メールアドレス(確認用)に同じアドレスを正しく入力してください");

		noError = false;

	}

	

	if(noError && $('#formAgreement:checked').val() != "1"){

		alert("特記事項に同意してください");

		noError = false;

	}

	  

	  

	if(noError){

		form.submit();

	}

	

	return noError;

	

}

