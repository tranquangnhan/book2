
$('#kind-carousel').owlCarousel({
    nav: false,
    pagination: false,
    autoplay: true,
    autoplayTimeout: true,
    autoplaySpeed: 20000/true,
    loop:true,
    margin: 10,
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