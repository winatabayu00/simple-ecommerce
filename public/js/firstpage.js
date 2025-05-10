
$(function () {

    "use strict";

    // Global variables
    var $win = $(window);

    /*==========   Mobile Menu   ==========*/
    var $navToggler = $('.navbar-toggler');
    var $dropToggler = $('.dropdown-toggle');
    var $btnRegister = $('.btn_register');
    // $navToggler.on('click', function () {
    //     $(this).toggleClass('actived');
    // })
    // $navToggler.on('click', function () {
    //     $('.navbar-collapse').toggleClass('menu-opened');
    // })
    // $dropToggler.on('click', function () {
    //     $('.navbar-toggler').toggleClass('actived');
    // })
    // $dropToggler.on('click', function () {
    //     $('.navbar-collapse').toggleClass('menu-opened');
    // })
    // $btnRegister.on('click', function () {
    //     $('.navbar-toggler').toggleClass('actived');
    // })
    // $btnRegister.on('click', function () {
    //     $('.navbar-collapse').toggleClass('menu-opened');
    // })

    /*==========   Sticky Navbar   ==========*/
    // $win.on('scroll', function () {
    //     if ($win.width() >= 992) {
    //         var $navbar = $('.sticky-navbar');
    //         if ($win.scrollTop() > 260) {
    //             $navbar.addClass('fixed-navbar');
    //         } else {
    //             $navbar.removeClass('fixed-navbar');
    //         }
    //     }
    // });
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 260) { // Set position from top to add class
            $('.sticky-navbar').addClass('fixed-navbar');
        }
        else {
            $('.sticky-navbar').removeClass('fixed-navbar');
        }
    });

    /*==========  Module Search   ==========*/
    var $moduleBtnSearch = $('.module__btn-search'),
        $moduleSearchContainer = $('.module__search-container');
    // Show Module Search
    $moduleBtnSearch.on('click', function (e) {
        e.preventDefault();
        $moduleSearchContainer.toggleClass('active', 'inActive').removeClass('inActive');
    });
    // Close Module Search
    $('.close-search').on('click', function () {
        $moduleSearchContainer.removeClass('active').addClass('inActive');
    });


    /*==========   Scroll Top Button   ==========*/
    var $scrollTopBtn = $('#scrollTopBtn');
    // Show Scroll Top Button
    $win.on('scroll', function () {
        if ($(this).scrollTop() > 700) {
            $scrollTopBtn.addClass('actived');
        } else {
            $scrollTopBtn.removeClass('actived');
        }
    });
    // Animate Body after Clicking on Scroll Top Button
    $scrollTopBtn.on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    /*==========   Equal Height Elements   ==========*/
    // var maxHeight = 0;
    // $(".equal-height").each(function () {
    //     if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
    // });
    // $(".equal-height").height(maxHeight);


    /*==========   Set Background-img to section   ==========*/
    $('.bg-img').each(function () {
        var imgSrc = $(this).children('img').attr('src');
        $(this).parent().css({
            'background-image': 'url(' + imgSrc + ')',
            'background-size': 'cover',
            'background-position': 'center',
        });
        $(this).parent().addClass('bg-img');
        $(this).remove();
    });


    /*==========   Add active class to accordions   ==========*/
    $('.a-header').on('click', function () {

        $(this).parent('.a-item').siblings().removeClass('opened');

        if ($(this).parent('.a-item').hasClass('opened')) {
            $(this).parent('.a-item').removeClass('opened');
        } else {
            $(this).parent('.a-item').addClass('opened');
        }
    });
    $('.a-header').on('click', function () {

        var dataImg = $(this).attr('data-img');

        // var image = $("#img-features");
        // image.fadeOut('fast', function () {
        //     image.attr('src', dataImg);
        //     image.fadeIn('fast');
        // });
        $('.img-features').slideUp();
        $("#img-features-" + dataImg).slideDown();

    });

    $('.a-title').on('click', function (e) {
        e.preventDefault()
    });

    $("#slider-checkbox").on('click', function () {
        var data = $('#customSwitch1').val();
        if (data == 1) {
            $('#customSwitch1').val(0);
            $('#experienced-user').hide();
            $('#new-users').show();
            $('#label-left').addClass('active');
            $('#label-right').removeClass('active');
        } else {
            $('#customSwitch1').val(1);
            $('#new-users').hide();
            $('#experienced-user').show();
            $('#label-right').addClass('active');
            $('#label-left').removeClass('active');
        }

    });

    $('.accordion-header').on('click', function () {
        // $(this).parent('.accordion-items').addClass('opened');
        if ($(this).parent('.accordion-items').hasClass('opened')) {
            $(this).parent('.accordion-items').removeClass('opened');
        } else {
            $(this).parent('.accordion-items').addClass('opened');
        }
        // $(this).parent('.accordion-items').siblings().removeClass('opened');
    });
    $('.accordion-title').on('click', function (e) {
        e.preventDefault()
    });

    $('#see-all').on('click', function () {
        $('.accordion-items').addClass('opened');
        $('.accordion-items').find('.collapse').addClass('show');
    });

    /*==========   Load More Items  ==========*/
    function loadMore(loadMoreBtn, loadedItem) {
        $(loadMoreBtn).on('click', function (e) {
            e.preventDefault();
            $(this).fadeOut();
            $(loadedItem).fadeIn();
        })
    }

    loadMore('.loadMoreBlog', '.hidden-blog-item');
    loadMore('.loadMoreServices', '.hidden-service');
    loadMore('.loadMoreProjects', '.project-hidden > .project-item');

    /*==========   Add Animation to About Img ==========*/
    if ($win.width() >= 992) {
        if ($(".about-2").length > 0) {
            $(window).on('scroll', function () {
                var aboutOffset = $(".about").offset().top - 300,
                    aboutHight = $(this).outerHeight(),
                    winScrollTop = $(window).scrollTop();
                if (winScrollTop > aboutOffset - 1 && winScrollTop < aboutOffset + aboutHight - 1) {
                    $('.about__img').addClass('animated-img');
                }
            });
        }
    } else {
        $('.about__img').addClass('animated-img');
    }

    /*==========   Owl Carousel  ==========*/
    $('.carousel').each(function () {
        $(this).owlCarousel({
            nav: $(this).data('nav'),
            dots: $(this).data('dots'),
            loop: $(this).data('loop'),
            margin: $(this).data('space'),
            center: $(this).data('center'),
            dotsSpeed: $(this).data('speed'),
            autoplay: $(this).data('autoplay'),
            transitionStyle: $(this).data('transition'),
            animateOut: $(this).data('animate-out'),
            animateIn: $(this).data('animate-in'),
            autoplayTimeout: 15000,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                700: {
                    items: 1,
                },
                1000: {
                    items: 1,
                }
            }
        });
    });

    // Owl Carousel With Thumbnails
    $('.thumbs-carousel').owlCarousel({
        thumbs: true,
        thumbsPrerendered: true,
        loop: true,
        margin: 0,
        autoplay: $(this).data('autoplay'),
        nav: $(this).data('nav'),
        dots: $(this).data('dots'),
        dotsSpeed: $(this).data('speed'),
        transitionStyle: $(this).data('transition'),
        animateOut: $(this).data('animate-out'),
        animateIn: $(this).data('animate-in'),
        autoplayTimeout: 15000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    /*==========  Popup Video  ==========*/
    // var video = $("#popup-video").attr("href");
    // $('.popup-video').magnificPopup({
    //     mainClass: 'mfp-fade',
    //     removalDelay: 0,
    //     preloader: false,
    //     fixedContentPos: false,
    //     type: 'iframe',
    //     iframe: {
    //         markup: '<div class="mfp-iframe-scaler">' +
    //             '<div class="mfp-close"></div>' +
    //             '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
    //             '</div>',
    //         patterns: {
    //             youtube: {
    //                 index: 'youtube.com/',
    //                 id: 'v=',
    //                 src: video
    //             }
    //         },
    //         srcAction: 'iframe_src',
    //     }
    // });

    /*==========   counterUp  ==========*/
    $(".counter").counterUp({
        delay: 10,
        time: 4000
    });

    /*==========   Projects Filtering and Sorting  ==========*/
    $("#filtered-items-wrap").mixItUp();
    $(".projects-filter li a").on("click", function (e) {
        e.preventDefault();
    });


    /*==========   scroll smoth  ==========*/
    $(".nav__item-link").on('click', function (e) {
        var full_url = this.href;
        var parts = full_url.split("#");
        var trgt = parts[1];
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset.top;

        $('html,body').animate({ scrollTop: target_top - 70 }, 1000);

        return false;
    });

    $(".btn_register").on('click', function (e) {
        var full_url = this.href;
        var parts = full_url.split("#");
        var trgt = parts[1];
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset.top;

        $('html,body').animate({ scrollTop: target_top - 70 }, 1000);

        return false;
    });

});

$(document).ready(function () {
    $('.mask-number').mask('00000000000000000000')
});


new WOW().init();


$(".lang").select2({
    minimumResultsForSearch: Infinity,
    templateResult: formatState,
    templateSelection: formatState
});

function formatState(opt) {
    if (!opt.id) {
        return opt.text.toUpperCase();
    }

    var optimage = $(opt.element).attr('data-image');
    if (!optimage) {
        return opt.text.toUpperCase();
    } else {
        var $opt = $(
            '<span><img src="' + optimage + '" width="20px" style="margin-right: 5px;" /> ' + opt.text.toUpperCase() + '</span>'
        );
        return $opt;
    }
};

$(function () {
    // bind change event to select
    $('#dynamic_select').on('change', function() {
        var lang = $(this).val(); // get selected value
        var url = $('#dynamic_select').attr('data-url'); // get selected value
        // alert(url+'set-language/'+lang);
        window.location = url + '/set-language/' + lang; // redirect
        return false;
    });

    $('#dynamic_select2').on('change', function() {
        var lang = $(this).val(); // get selected value
        var url = $('#dynamic_select2').attr('data-url'); // get selected value
        // alert(url+'set-language/'+lang);
        window.location = url + '/set-language/' + lang; // redirect
        return false;
    });
});

// navbar collapse close when window scroll
$(document).ready(function () {
    // Put your offset checking in a function
    function checkOffset() {
        // if ($(".navbar").offset().top > 50) {
        //     $(".navbar-fixed-top").addClass("top-nav-collapse");
        // }
        // else {
        //     $(".navbar-fixed-top").removeClass("top-nav-collapse");
        // }
        $(".navbar-toggler").removeClass("actived");
        $(".collapse").removeClass("menu-opened");
    }
    // Run it when the page loads
    checkOffset();
    // Run function when scrolling
    $(window).scroll(function () {
        checkOffset();
    });
});


var swiper = new Swiper(".swiper-journey", {
    slidesPerView: 'auto',
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination-journey",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        }
    },
});

$(document).ready(function () {
    $('.btn-tab').on('click', function () {

        var white   = $(this).attr('data-white');
        var grey    = $(this).attr('data-grey');
        var tab     = $(this).attr('data-tab');
        var now     = $(this).attr('.active');


        $(this).children('img').attr('src', white);
        $('.tab-content-text').hide();
        $('#' + tab).show();

        $('.btn-tab').removeClass('active');
        $(this).addClass('active');

        var grey2   = $('.btn-tab:not(.active)').attr('data-grey');

        $('.btn-tab').siblings().not('.active').find('img').attr('src', grey2);


    });

    $(".btn-tab").hover(function () {
        var white = $(this).attr('data-white');
        var grey = $(this).attr('data-grey');

        var white2 = $('.btn-tab.active').attr('data-white');
        var grey2 = $('.btn-tab.active').attr('data-grey');
        //alert(white);
        $(this).find('img').attr('src', white);
        $('.btn-tab.active').find('img').attr('src', white2);
    });

    $(".btn-tab").mouseleave(function () {
        var white = $(this).attr('data-white');
        var grey = $(this).attr('data-grey');

        var white2 = $('.btn-tab.active').attr('data-white');
        var grey2 = $('.btn-tab.active').attr('data-grey');

        $(this).find('img').attr('src', grey);
        $('.btn-tab.active').find('img').attr('src', white2);
    });


    $(".card-product-crown").hover(function () {
        var img1 = $(this).attr('data-img1');
        var el2 = $(this).attr('data-element2');
        //alert(white);
        $(this).find('.img-crown').attr('src', img1);
        $(this).find('.element').attr('src', el2);
    });

    $(".card-product-crown").mouseleave(function () {
        var img2 = $(this).attr('data-img2');
        var el1 = $(this).attr('data-element1');
        $(this).find('.img-crown').attr('src', img2);
        $(this).find('.element').attr('src', el1);
    });
});


var swiper = new Swiper(".swiper-award-new", {
    slidesPerView: 1.5,
    spaceBetween: 20,
    centeredSlides: false,
    // pagination: {
    //     el: ".swiper-pagination-award",
    //     clickable: true,
    // },
    navigation: {
        nextEl: ".nav-award-next",
        prevEl: ".nav-award-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 3.5,
            spaceBetween: 30,
        }
    },
});


var swiper = new Swiper(".swiper-coverage", {
    slidesPerView: 'auto',
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination-coverage",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        }
    },
});

$(document).ready(function () {
    $('.btn-coverage').on('click', function () {
        $('.btn-coverage').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-tab');
        if (data == 'all') {
            $('.card-coverage').show();
            $('.coverage-data').show();
        } else {
            $('.card-coverage').hide();
            $('.coverage-data').hide();
            $('.' + data).show();
        }
    });
});

/*==========   Add active class to accordions   ==========*/
// $('.accordion__item-header').on('click', function () {
//     $(this).parent('.accordion__item-title').addClass('active');
//     $(this).parent('.accordion__item-title').siblings().removeClass('active');
// });
$('.accordion__item-header').on('click', function () {
    //e.preventDefault();

    var hdr = $(this);

    if (hdr.hasClass('collapsed')) {
        hdr.find('.fa').addClass('fa-chevron-up');
        hdr.find('.fa').removeClass('fa-chevron-down');
    } else {
        hdr.find('.fa').addClass('fa-chevron-down');
        hdr.find('.fa').removeClass('fa-chevron-up');
    }
});
$(document).ready(function () {
    $('#copyBtn').on('click', function () {
        // e.preventDefault();

        /* Get the text field */
        var copyText = document.getElementById("copy-to-clipboard-input");

        /* Prevent iOS keyboard from opening */
        copyText.readOnly = true;

        /* Change the input's type to text so its text becomes selectable */
        copyText.type = 'text';

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Change the input's type back to hidden */
        copyText.type = 'hidden';

        Swal.fire('Success', 'Url successfully copied!', 'success')
    });
});

