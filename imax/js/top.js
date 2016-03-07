// IFrame Player API LOAD
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

(function($){
  $(function(){
    onYouTubeIframeAPIReady = function() {
      dom.show();
      ytPlayer = new YT.Player('youtube', youtubeObj);
    };
    onPlayerStateChange = function(e) {
      if (e.data == YT.PlayerState.ENDED) {
        youtubeClose();
      }
    }
    var youtubeObj = {
      width: 960,
      height: 540,
      videoId: 'kQL20hldtvE',
      playerVars: {
        rel: 0,
        autoplay: 1
      },
      events: {
        'onStateChange': onPlayerStateChange
      }
    };
    var dom = $('<div class="modal-cover">\
                  <div class="modal">\
                    <div id="youtube"></div>\
                    <div class="close_btn"><a href="#"><img src="/imax/images/common/close_btn.png"></a></div>\
                  </div>\
                </div>');
    var youtubeClose = function() {
      dom.remove();
    };
    $('#wrapper').append(dom);
    dom.find('#youtube').css({
      marginTop: (youtubeObj.height / 2 * -1) + 'px',
      marginLeft: (youtubeObj.width / 2 * -1) + 'px'
    });
    dom.find('.close_btn').css({
      marginTop: (youtubeObj.height / 2 * -1) + 'px'
    });
    $('.modal-cover').live('click', function(e) {
      e.preventDefault();
      youtubeClose();
    });
    dom.find('.close_btn a').live('click', function(e) {
      e.preventDefault();
      youtubeClose();
    });

  });
})(jQuery);
