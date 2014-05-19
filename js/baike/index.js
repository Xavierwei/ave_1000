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
		$('.quesM_popcom').hide();
        if ($(this).hasClass('active')) {
            dOpened = null;

            $(this).removeClass('active');
			$(this).find('.quesM_popcom').fadeOut();

            return;
        }

        // touched others
        if (dOpened) {
            dOpened.removeClass('active');
        }

        dOpened =  $(this);

        $(this).addClass('active');
		$(this).find('.quesM_popcom').fadeIn();
    })
})
