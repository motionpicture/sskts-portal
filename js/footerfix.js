(function()
	{
	    build();
	    function build()
	    {
	        $(document).ready(function()
	        {
	            var minH = 100;
	            var h   = $('#footerFixed').height();
            $('#footerFixed').height(minH);

            var overed      = false;
            var animated    = false;
            $('#footerFixed').mouseover(function(e)
            {
                if ( animated ) return false;
                if ( overed ) return false;

                var obj = {height : h};
                if ( $.browser.msie && 7 > $.browser.version ) obj['top']  = $(this).offset().top - (h - minH);

                animated    = true;
                $('#footerFixed').animate(obj, function(){animated = false;});
                overed  = true;
            });

            $('#footerFixed').mouseout(function(e)
            {
                if ( animated ) return false;
                if ( !overed ) return false;

                if ( $(this).offset().top <= (e.pageY - 5) ) return false;
                var obj = {height:minH};
                if ( $.browser.msie && 7 > $.browser.version ) obj['top']  = $(this).offset().top + (h - minH);

                animated    = true;
                $('#footerFixed').animate(obj, function(){animated = false});
                overed  = false;
            });

            $('.rightSection p img').click(function(e)
            {
            	$('#footerFixed').css("display","none");
            });

            if ( $.browser.msie && 7 > $.browser.version ) {
                $('#footerShade').css('left', '0px').css('top', '0px');
                $('#footerFixed').css('position', 'absolute').css('left', '0px').css('top', (document.documentElement.clientHeight || document.body.clientHeight) - $('#footerFixed').height() + (document.documentElement.scrollTop || document.body.scrollTop) + 'px');
                $(window).scroll(function(){ $('#footerFixed').css('position', 'absolute').css('left', '0px').css('top', (document.documentElement.clientHeight || document.body.clientHeight) - $('#footerFixed').height() + (document.documentElement.scrollTop || document.body.scrollTop) + 'px') });
                $(window).resize(function(){ $('#footerFixed').css('position', 'absolute').css('left', '0px').css('top', (document.documentElement.clientHeight || document.body.clientHeight) - $('#footerFixed').height() + (document.documentElement.scrollTop || document.body.scrollTop) + 'px') });
            }
        });
    }
})();
