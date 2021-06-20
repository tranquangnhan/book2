$('.control-item').click(function (e) { 
    e.preventDefault();
    var active = $(this).hasClass('control-active');

    if (!active) {        
        var num = $(this).attr('data-show');
        var numActive = $('.control-active').attr('data-show');
        console.log(num, numActive);
        $('div[data-content="'+ numActive +'"]').removeClass('active');
        $('div[data-content="'+ num +'"]').addClass('active');

        $('div[data-show="'+ num +'"]').addClass('control-active');
        $('div[data-show="'+ numActive +'"]').removeClass('control-active');        
    } 

});