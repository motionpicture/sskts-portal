(function($){
  $(function() {
    var imageBlock = function(e) {
      e.preventDefault();
    };
    $(document)
      .on('mousedown', 'img', imageBlock)
      .on('contextmenu', 'img', imageBlock);
  });
})(jQuery);
