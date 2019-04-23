// The jQuery script that makes the Arrows for quantity work.
jQuery(document).ready(function($) {

    $(window).on('load', function () {
        // Animate loader off screen
        $(".pre-loader").fadeOut("slow");
    });


    $(document).foundation();

    $(".nav-icon").click(function () {
        $(this).toggleClass('open');
        // $(".body").toggleClass("overflowNone");
        $("#menu-mobile").toggleClass("nav-open");
    });

    // (function ($) {
    //     $(window).on("load", function () {
    //         $("body").on("click", ".site-menu-mobile ul li a", function () {
    //             $(".nav-icon").trigger("click");
    //         });
    //     });
    // })(jQuery);

    $("#menu-mobile a").click(function () {
        console.log("element was clicked"); // or alert("click");
        $(".nav-icon").trigger("click");
    });

    if ($(".owl-hero")[0]) {
        $('.owl-hero').owlCarousel({
            loop: true,
            autoplay: true,
            autoplaySpeed: 450,
            autoplayHoverPause: true,
            items: 1,
            margin: 0,
            nav: false,
            dots: true,
        });
    }

    if ($(".owl-vantagens")[0]) {
        $('.owl-vantagens').owlCarousel({
            // loop: true,
            // autoplay: true,
            // autoplaySpeed: 450,
            // autoplayHoverPause: true,
            items: 1,
            margin: 0,
            nav: false,
            dots: true,
        });
    }

    var solucoesBtn = document.querySelector("#solucoes-btn");
    var cover = document.querySelector(".solucoes-cover");
    var bulletColor = document.querySelector(".owl-solucoes .owl-dots .owl-dot.active span");

    $(solucoesBtn).click(function () {
        $(cover).fadeOut();
        $(cover).removeClass('visible');
    });

    if ($(cover).hasClass('visible')) {
        $(bulletColor).css({
            'background-color': '#fff',
        });
    } else {
        $(bulletColor).removeAttr("style");
    }


    if ($("#sbig")[0]) {
        $('#sbig').owlCarousel({
            loop: true,
            // autoplay: true,
            // autoplaySpeed: 450,
            // autoplayHoverPause: true,
            items: 1,
            margin: 0,
            nav: true,
            dots: true,
        });
    }

    if ($(".owl-empresas")[0]) {
        $('.owl-empresas').owlCarousel({
            loop: true,
            margin: 45,
            nav: false,
            dots: false,
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 3,
                },
                // breakpoint from 480 up
                669 : {
                    items: 4,
                },
                // breakpoint from 768 up
                1024 : {
                    items: 5,
                }
            }
        });
    }

    // $('.smooth-scroll a[href*="#"]:not([href="#"])').click(function() {
    //     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    //         var target = $(this.hash);
    //         target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //         if (target.length) {
    //             $('html, body').animate({
    //             scrollTop: target.offset().top-87
    //             }, 1000);
    //             return false;
    //         }
    //     }
    // });

    var scrollLink = $('.smooth-scroll a');

    // Smooth scrolling
    scrollLink.click(function (e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: $(this.hash).offset().top - 85
        }, 1000);
    });

    // Active link switching
    $(window).scroll(function () {
        var scrollbarLocation = $(this).scrollTop();

        scrollLink.each(function () {

            var sectionOffset = $(this.hash).offset().top - 86;

            if (sectionOffset <= scrollbarLocation) {
                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');
            }
        })

    })





    $(".cases-video-link-bg").click(function () {
        $(".cases-video-container").addClass("open");
    });
    $(".cases-video-fechar").click(function (e) {
        e.preventDefault();
        $(".cases-video-container").removeClass("open");
        var video = $("#videoPlayer").children('iframe').attr("src");
        $("#videoPlayer").children('iframe').attr("src", "");
        $("#videoPlayer").children('iframe').attr("src", video);
    });
});
