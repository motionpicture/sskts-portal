
var MM_contentVersion = 8
;
var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
if ( plugin ) {
		var words = navigator.plugins["Shockwave Flash"].description.split(" ");
	    for (var i = 0; i < words.length; ++i)
	    {
		if (isNaN(parseInt(words[i])))
		continue;
		var MM_PluginVersion = words[i]; 
	    }
	var MM_FlashCanPlay = MM_PluginVersion >= MM_contentVersion;
}
else if (navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0 
   && (navigator.appVersion.indexOf("Win") != -1)) {
	document.write('<scr' + 'ipt language=VBScript\> \n'); //FS hide this from IE4.5 Mac by splitting the tag
	document.write('on error resume next \n');
	document.write('MM_FlashCanPlay = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & MM_contentVersion)))\n');
	document.write('</scr' + 'ipt\> \n');
}

function set_flash(swfname,swfwidth,swfheight){
	if ( MM_FlashCanPlay ) {
		document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"');
		document.write(' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0"');
		document.write(' id="' + swfname + '" width="' + swfwidth + '" height="' + swfheight +'" align="">');
		document.write('<param name=movie value="' + swfname + '"><param name="wmode" value="transparent"><param name="quality" value="high"><param name="bgcolor" value="#000000"><param name="menu" value="false">'); 
		document.write('<embed src="' + swfname + '" quality="high" bgcolor="#000000" menu="false"');
		document.write(' swLiveConnect="FALSE" width="' + swfwidth + '" height="' + swfheight + '" name="' + swfname + '" align=""');
		document.write(' type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent">');
		document.write('</embed>');
		document.write('</object>');
	} 
}
