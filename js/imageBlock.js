(function($){
  $(function() {
    var imageBlock = function(e) {
      e.preventDefault();
    };
    $(document)
      .on('mousedown', 'img', imageCancel)
      .on('contextmenu', 'img', imageCancel);
  });
})(jQuery);
