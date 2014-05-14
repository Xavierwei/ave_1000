$(document).ready(function() {
    var dNav = $('.header .nav');

    // weixin popup
    $('.ft_weixin').live({
        'mouseenter':function(){
            $(this).children('.weixin_pop').fadeIn();
        },
        'mouseleave':function(){
            $(this).children('.weixin_pop').fadeOut();
        }
    })

    // header nav list
    $('.header .navbtn').bind('touchstart', function () {
        dNav.toggle();
    })
});
