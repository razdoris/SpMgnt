$(document).ready(function(){
    $('.carousselFeature').slick({
        slidesToShow: 8,
        slidesToScroll:1,
        autoplay: true,
        autoplaySpeed: 0,
        speed:9000,
        arrows:false,
        adaptiveHeight:true,
        cssEase:'linear',
        responsive:[
            {breakpoint:1200,
            settings:{
                slidesToShow: 6,
            }},
            {breakpoint:920,
                settings:{
                    slidesToShow: 5,
                }},
            {breakpoint:740,
                settings:{
                    slidesToShow: 4,
                }},
            {breakpoint:610,
                settings:{
                    slidesToShow: 3,
                }},
            {breakpoint:480,
                settings:{
                    slidesToShow: 2,
                }}
        ]

    });
});
