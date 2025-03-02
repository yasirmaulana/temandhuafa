$(document).ready(function(){
    $('.zakat-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 5,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 500,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 500,
            settings: {
                slidesToShow: 5
            }
        }]
    });
});


$(document).ready(function(){
    $('.lembaga-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 500,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 500,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});