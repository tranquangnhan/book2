
$('#kind-carousel').owlCarousel({
    nav: true,
    pagination: true,
    loop:true,
    dots: true,
    margin: 10,

    items:3,
    autoplayHoverPause:true,
    autoplay: true,
    autoplayTimeout: 3000,
    // autoplaySpeed: 1000/true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

