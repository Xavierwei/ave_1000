$(document).ready(function() {
    //home modules overlay
    $('.home_infor').live({
        'mouseenter':function(){
            $(this).children('.home_infopop').fadeIn();
        },
        'mouseleave':function(){
            $(this).children('.home_infopop').fadeOut();
        }
    })

    // countdown tips
    $('.CDAbox').live({
        'mouseenter':function(){
            $(this).children('.CDApop').fadeIn();
        },
        'mouseleave':function(){
            $(this).children('.CDApop').fadeOut();
        }
    })
});
