$(document).ready(function() {
    var dOpened = null,
        aImgs = $('#mycarousel li img');

    $('#mycarousel').jcarousel({
        wrap: 'circular'
    });

    aImgs.live({
        'mouseenter':function(){
            aImgs.css({
                'opacity' : 0.7
            })

            $(this).css({
                'opacity' : 1
            })
        },
        'mouseleave':function(){
            aImgs.css({
                'opacity' : 1
            })
        }
    })

    // tips
    $('.quesMobile .quesM_compop').bind('touchstart', function () {
        // touched self
        if ($(this).hasClass('active')) {
            dOpened = null;

            $(this).removeClass('active');

            return;
        }

        // touched others
        if (dOpened) {
            dOpened.removeClass('active');
        }

        dOpened =  $(this);

        $(this).addClass('active');
    })
})
