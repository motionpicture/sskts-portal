$(document).ready(function(){
    $('.accordion_head').click(function() {
        $(this).closest('td').find('.sentence').not(":animated").slideToggle();
    }).parents().find('.sentence').hide();
});