var marginTop = 0;
$(window).scroll(function() {    
    var hH    = $('.right.fix').outerHeight(),
        wH    = $(window).height(),
        wS    = $(this).scrollTop(),
        hT    = $('.fixed-location').offset().top + 500,
        hBody = $('body').height();                
    
    if (wS < hBody - 1200) {
        if (wS > hT){        
            marginTop = wS - hT;        
        } else {
            marginTop = 0;
        }
        $('.right.fix').css('margin-top', marginTop);            
    }
 });