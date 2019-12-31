$('.extra_services_slider').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: "<button class='prev'></button>",
    nextArrow: "<button class='next'></button>",
    appendArrows: $('.extra_services_controls'),
    responsive: [
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1.5,
            }
        },
    ]
});
