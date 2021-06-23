
$('#kind-carousel').owlCarousel({
    nav: true,
    pagination: true,
    loop:true,
    dots: false,
    margin: 10,

    // autoplay: true,
    // autoplayTimeout: true,
    // autoplaySpeed: 20000/true,
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