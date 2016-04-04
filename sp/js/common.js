(function(){
  $(function(){
    var cinemaSP = {
      elm: {
        menu: $('.menu'),
        cover: $('.menu-cover'),
        menuBtn: $('.menu-btn a')
      },
      settingEvent: function() {
        cinemaSP.elm.menuBtn.on('click', function(e){
          e.preventDefault();
          var flag = cinemaSP.elm.menu.is(':hidden');
          cinemaSP.menuToggle(flag);
        });
        cinemaSP.elm.cover.on('click', function(e){
          cinemaSP.menuToggle(false);
        });
      },
      menuToggle: function(_flag) {
        if (_flag) {
          var header = $('#header');
          var h = header.outerHeight() + header.offset().top;
          cinemaSP.elm.menu.css('top', h);
          cinemaSP.elm.cover.addClass('active');
          cinemaSP.elm.menu.addClass('active');
          cinemaSP.elm.menuBtn.addClass('active');
        } else {
          cinemaSP.elm.menu.removeClass('active');
          cinemaSP.elm.cover.removeClass('active');
          cinemaSP.elm.menuBtn.removeClass('active');
        }
      }
    };
    cinemaSP.settingEvent();
  });
})();
