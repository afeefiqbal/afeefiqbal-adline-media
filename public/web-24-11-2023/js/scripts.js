//Services slider
$('.servicesSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    appendArrows: $('.slick-slider-nav-sp'),
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 575,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Services slider

//Projects slider
$('.projectsSlider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    appendArrows: $('.slick-slider-nav-projects'),
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 4, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 525,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Projects slider

//Testimonial slider
$('.testimonialSlider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    appendArrows: $('.slick-slider-nav-testimonial'),
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 1,}
        },
        {
            breakpoint: 525,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Testimonial slider


//Partners slider
$('.partnersSlider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    appendArrows: $('.slick-slider-nav-partners'),
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 5, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 525,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 360,
            settings: {slidesToShow: 2,}
        },
    ]
});
//Partners slider

//Blog Slider slider
$('.blogSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    appendArrows: $('.slick-slider-nav-blog'),
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 575,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Blog Slider slider

//Blog Slider slider
$('.teamSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    appendArrows: $('.slick-slider-nav-team'),
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 4, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 440,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Blog Slider slider

//Portfolio Slider Start

$('.slider-portfolio-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    autoplay: false,
    focusOnSelect: true,
    swipeToSlide: true,
    draggable: true,
    asNavFor: '.slider-portfolio-nav'
});
$('.slider-portfolio-nav').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.slider-portfolio-for',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    autoplay: false,
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 5, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 4, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 5,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 575,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 400,
            settings: {slidesToShow: 3,}
        },
    ]
});

//Portfolio Slider End

// Mega Menu Start
document.addEventListener("DOMContentLoaded", function(){

    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element){
        element.addEventListener('click', function (e) {
            if(!$(this).hasClass('product-list-dropdown-menu'))
                e.stopPropagation();
        });
    });

    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.megasubmenu').forEach(function(everysubmenu){
                    // hide every submenu as well
                    everysubmenu.style.display = 'none';
                });
            })
        });

        document.querySelectorAll('.has-megasubmenu a').forEach(function(element){
            element.addEventListener('click', function (e) {

                let nextEl = this.nextElementSibling;
                if(nextEl && nextEl.classList.contains('megasubmenu')) {
                    // prevent opening link if link needs to open dropdown
                    e.preventDefault();

                    if(nextEl.style.display == 'block'){
                        nextEl.style.display = 'none';
                    } else {
                        nextEl.style.display = 'block';
                    }

                }
            });
        })
    }
    // end if innerWidth
});
// Mega Menu End

//sticky header
$(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
        $('header').addClass('sticky')
    } else {
        $('header').removeClass('sticky')
    }
});
//sticky header

//Portfolio start
$(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        console.log('yes');
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

        }

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
    });
});
//Portfolio End

// File Upload Start

$('document').ready(function(){

    var $file = $('#file-input'),
        $label = $file.next('label'),
        $labelText = $label.find('span'),
        $labelRemove = $('i.remove'),
        labelDefault = $labelText.text();

    // on file change
    $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop();
        if( fileName ){
            console.log($file)
            $labelText.text(fileName);
            $labelRemove.show();
        }else{
            $labelText.text(labelDefault);
            $labelRemove.hide();
        }
    });
})

$('document').ready(function(){

    var $file = $('#file-input02'),
        $label = $file.next('label'),
        $labelText = $label.find('span'),
        $labelRemove = $('i.remove'),
        labelDefault = $labelText.text();

    // on file change
    $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop();
        if( fileName ){
            console.log($file)
            $labelText.text(fileName);
            $labelRemove.show();
        }else{
            $labelText.text(labelDefault);
            $labelRemove.hide();
        }
    });
})

$('document').ready(function(){

    var $file = $('#file-input03'),
        $label = $file.next('label'),
        $labelText = $label.find('span'),
        $labelRemove = $('i.remove'),
        labelDefault = $labelText.text();

    // on file change
    $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop();
        if( fileName ){
            console.log($file)
            $labelText.text(fileName);
            $labelRemove.show();
        }else{
            $labelText.text(labelDefault);
            $labelRemove.hide();
        }
    });
})

// File Upload End