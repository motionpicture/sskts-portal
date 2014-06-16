var setTimeOut=5000;
//time : 区切りに変換
function getTimeFormat(time) {
	var a = time.substr(0,2);
	var b = time.substr(2,2);
return a+":"+b;
}
//date/に変換
function getDateFormat(date){

	var y = date.substr(0,4);
	var m = date.substr(4,2);
	var d = date.substr(6,2);

	var jd = new Date(y,m-1,d);
	var w = ["日","月","火","水","木","金","土"];


	return y+"年"+m+"月"+d+"日"+"("+w[jd.getDay()]+")";

}
//Get値を取得するぜ
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
function makeBlock() {
	$('.movieListBox').block({message:'<div><img style="margin:0 auto;" src="../../images/common/ajax-loader.gif" /></div>',fadeIn:1, css:{border:'none', backgroundColor:'none',padding:'20px'} });
}
function makeBlockResult() {
	$('.movieListBox').block({message:'<div><img style="margin:0 auto;" src="./images/common/ajax-loader.gif" /></div>',fadeIn:1, css:{border:'none', backgroundColor:'none',padding:'20px'} });
}

function isEmpty_O(data) {

	//console.log(te);
	//console.log(data.length);
	//console.log(data);
	if (data.length != undefined) {
		return false;
	} else {
		return true;
	}
}

