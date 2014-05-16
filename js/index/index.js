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
        };

    coundown();

    // play video
    var isVideo = $('html').hasClass('touch');

    $('.video_play').bind('click', function(){
        var flash = true;

        if(isVideo) {
            flash = false;
        }

        compile( 'flash-player-template', {flash: flash}, function () {
            if (flash) {
                $('.video-player').css({opacity:0});
            }
        })
    })

	setInterval(function(){
		var index = $('.knowtxt').data('index');
		index++;
		if(index > 10) {
			index = 1;
		}
		$('.knowtxt_body').fadeOut(400);
		$('.knowtxt'+index).fadeIn(400);
		$('.knowtxt').data('index', index);
	},4000);


})



function play(){
	console.log(111);
	$('.video-player').delay(400).animate({opacity:1});
}


function playComplete(){
	LP.triggerAction('close_pop');
	$('.video-player').fadeOut();
	$('.page3-video').animate({height:139});
	$('.page3-video .video-img').fadeIn();
}