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

    // countdown
    var isCounted = false,
        coundown = function () {
            if (isCounted) return;

            $.ajax({
                url : './countdown.php',
                method:'get',
                success: function(nSeconds) {
                    var nDay = Math.floor(nSeconds/86400);

                    $('.CDAbox .CDAmun').html(nDay);

                    isCounted = true;
                },
                error: function () {
                    setTimout(function () {
                        coundown();
                    }, 2000)
                }
            })
        }

    coundown();
})
