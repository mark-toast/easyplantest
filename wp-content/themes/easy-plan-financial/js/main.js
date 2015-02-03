jQuery(document).ready(function($) {

    updateSidebar();

    // Listen for resize changes
    window.addEventListener("resize", function() {
        updateSidebar();
    }, false);


    if($('body').hasClass('home')) {
        var max = 20;
        $('#lenders ul').children('li:gt(' + (max - 1) + ')').wrapAll('<ul>').parent().hide();
    }

    $('#lenders-lip').click(function() {
        $(this).toggleClass('active');
        if($(document).width() > 768) {
            $('#lenders-arrow, #more-text').toggle(0);
        }
        if($('body').hasClass('home')) {
            $('#lenders ul ul').slideToggle();
        } else {
            $('#lenders > ul').slideToggle();
        }
    })

    $('#mobile-trigger').on('click', function() {

        var options = {};

        if($('body').hasClass('open')) {
            options = {
                'margin-left' : '-260px'
            }
        } else {
            options = {
                'margin-left' : '0'
            }
        }

        $('body, html, #page-wrapper, #mobile-trigger').toggleClass('open');

        $('#mobile-nav').stop(true,true).animate(options, 500);

    });



    $('#menu-quick-links > li > a').click(function(e) {
        $('#menu-quick-links > li ul').hide();
        $('#menu-quick-links').find('.current-menu-item').removeClass('current-menu-item');
        $(this).parent().addClass('current-menu-item');
        $(this).siblings('ul').show();
        e.preventDefault();
    });

    $('#menu-mobile-menu > li > a').click(function(e) {
        $('#menu-mobile-menu > li ul').hide();
        $('#menu-mobile-menu').find('.current-menu-item').removeClass('current-menu-item');
        $(this).parent().addClass('current-menu-item');
        $(this).siblings('ul').show();
        if($(this).siblings('ul').length > 0) {
            e.preventDefault();
        }
    });

});


function updateSidebar() {

    var $width = document.documentElement.clientWidth,
        $height = document.documentElement.clientHeight,
        $main = jQuery('#page-wrapper').height();

    if($width >= 768) {

        //jQuery('body, #page-wrapper').width(jQuery('#content-wrapper').width());

        /*if($main > $height) {
            jQuery('#mobile-nav .scroll-box').css({'height': $main + 6});
        } else {
            jQuery('#mobile-nav .scroll-box').css({'height': $height + 6});
        }*/

    } else {

        jQuery('#mobile-nav').removeAttr('style');

    }

}
