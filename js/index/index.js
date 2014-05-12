$(document).ready(function() {
    //home modules overlay
    $('.home_infor').live({
        'mouseenter':function(){
            $(this).children('.home_infopop').show()
        },
        'mouseleave':function(){
            $(this).children('.home_infopop').hide()
        }
    })

    // countdown tips
    $('.CDAbox').live({
        'mouseenter':function(){
            $(this).children('.CDApop').show()
        },
        'mouseleave':function(){
            $(this).children('.CDApop').hide()
        }
    })
});
