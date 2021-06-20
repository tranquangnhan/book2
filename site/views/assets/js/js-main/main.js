// another config



// another config
(function($) {

	
	

	"use strict";

	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	// fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.carousel-testimony').owlCarousel({
			center: false,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 4
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var counter = function() {
		
		$('#section-counter, .hero-wrap, .ftco-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();


	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });


  $('.checkin_date, .checkout_date').datepicker({
	  'format': 'm/d/yyyy',
	  'autoclose': true
	});



})(jQuery);

$('#video-carousel').owlCarousel({
    navigation: true,
    navigationText: ["<",">"],
    loop:true,
    margin: 10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})


$('.show-option').click(function (e) { 
    e.preventDefault();
    var active = $(this).hasClass('option-active');

    if (!active) {        
        var num = $(this).attr('data-show-op');
        var numActive = $('.option-active').attr('data-show-op');
        console.log(num, numActive);

        $('div[data-option="'+ numActive +'"]').removeClass('active');
        $('div[data-option="'+ num +'"]').addClass('active');

        $('div[data-show-op="'+ num +'"]').addClass('option-active');
        $('div[data-show-op="'+ numActive +'"]').removeClass('option-active');        
    } 
});



//////////// code phân trang //////////

function paginationItemHtml(i, active) {
    var html = `
        <li class="` + active + `"><a href="javascript:void(0)" onclick="movePage(`+ i +`)" data-item="` + i + `" class="pagination-item">` + i + `</a></li>
    `;

    return html;
}

function paginationItemHtmlFirst(html) {
    html += paginationItemHtml(1, '');                
    html += paginationItemHtml(2, '');
    html += '<li><span data-item="near-start">...</span></li>';

    return html;
}

function removeAndAddNewLi(html) {
    $('.page-list li').remove();
    $('.page-list').append(html); 
}

function paginationItemHtmlLast(html, pageNumber) {
    html += '<li><span>...</span></li>';
    html += paginationItemHtml(pageNumber - 1, '');                
    html += paginationItemHtml(pageNumber, '');

    return html;
}

var pageNumber = $('.pageNumber').val();
pageNumber     = parseInt(pageNumber);
var pageCur = 1;

function moveNext() {
    pageCur++;
    if (pageCur <= pageNumber) {
        renderPage(pageCur);
    } else {
        pageCur = 1;
        renderPage(pageCur);
    }
}

function moveBack() {
    pageCur--;
    if (pageCur < 1) {
        pageCur = pageNumber;
        renderPage(pageCur);
    } else {
        renderPage(pageCur);
    }
}

function movePage(_pageCur) {
    pageCur = _pageCur;
    renderPage(pageCur);
}

function renderPage(pageCur) {
    if (pageNumber > 1) {    
        var html = '';
        var pageNum = pageCur;

        if (pageNum > 5) {
            html += paginationItemHtml(1, '');
            html += paginationItemHtml(2, '');
            html += '<li><span data-item="near-end">...</span></li>';
            for (let i = pageNum - 2; i <= pageNum -1; i++) {             
                html += paginationItemHtml(i, '');
            }
        } else if (pageNum > 1) {
            for (let i = 1; i < pageNum; i++) {             
                html += paginationItemHtml(i, '');
            }
        }
        
        html += paginationItemHtml(pageNum, 'active');
        pageNum++;
        var pageNext2 = pageNum + 1;
        if (pageNext2 > pageNumber) {
            pageNext2 = pageNumber;
        }

        for (pageNum; pageNum <= pageNext2; pageNum++) {             
            html += paginationItemHtml(pageNum, '');              
        }
        
        if (pageNum < pageNumber - 1) {
            html += '<li><span data-item="near-end">...</span></li>';
            html += paginationItemHtml(pageNumber - 1, '');
            html += paginationItemHtml(pageNumber, '');
        } else {
            for (pageNum; pageNum <= pageNumber; pageNum++) {             
                html += paginationItemHtml(pageNum, '');              
            }
        }   

        obj.getData(pageCur);
        removeAndAddNewLi(html);
    }
}

//////////// code phân trang //////////

var obj = {
    url: '',
    filterOb: '',
    getData: function(form) {
        console.log(form);
        goToByScroll('nav-chil');
        if ($('.ftco-loader').hasClass('show') == false) {
            $('.product-box .product-item').remove();
            $('.ftco-loader').addClass('show');    
        }
    
        clearTimeout(timeRequest);
    
        timeRequest = setTimeout(
            function() { 
                setDataAndRequest(obj.filterOb, form, obj.url);                        
            }, 600);    

    },

    renderPage: function() {

    }
};

function goToByScroll(id) {
    id = id.replace("link", "");
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top
    }, 50);
}

function reloadPage() {    
    var html = '';
    pageNumber = parseInt(pageNumber);
    if (pageNumber <= 6) {
        for (let i = 1; i < pageNumber + 1; i++) {
            if (i == 1) {
                html += paginationItemHtml(i, 'active');
            } else {
                html += paginationItemHtml(i, '');
            }
        }
    } else {
        for (let i = 1; i < pageNumber + 1; i++) {
            if (i < 4) {
                if (i == 1) {
                    html += paginationItemHtml(i, 'active');
                } else {
                    html += paginationItemHtml(i, '');
                }
            }            
        }

        if (pageNumber > 6) {
            html = paginationItemHtmlLast(html, parseInt(pageNumber));            
        }        
    }
    
    removeAndAddNewLi(html);
}

