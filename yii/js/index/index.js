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
    $('.CDAboxHover').live({
        'mouseenter':function(){
            $(this).next('.CDApop').fadeIn();
        },
        'mouseleave':function(){
            $(this).next('.CDApop').fadeOut();
        }
    })

    // countdown
//    var isCounted = false,
//        coundown = function () {
//            if (isCounted) return;
//
//            $.ajax({
//                url : './countdown.php',
//                method:'get',
//                success: function(nSeconds) {
//                    var nDay = Math.floor(nSeconds/86400);
//
//                    $('.CDAbox .CDAmun').html(nDay);
//
//                    isCounted = true;
//                },
//                error: function () {
//                    setTimeout(function () {
//                        coundown();
//                    }, 2000)
//                }
//            })
//        };
//
//    coundown();

    // play video
    var isVideo = $('html').hasClass('touch');

    $('.video_play2').bind('click', function(){
        var flash = true;

        if(isVideo) {
            flash = false;
        }

        compile( 'flash-player-template', {flash: flash, video_id: $(this).data('video')}, function () {
            if (flash) {
                $('.video-player').css({opacity:1});
            }
        });
		ga('send', 'event', '1000family', 'video_viewership', 'video_viewership');
		//_gaq.push(['_trackEvent', '1000family', 'video_viewership', 'video_viewership']);
    })

    $('#user-reg-form').validate({
        rules: {
            'RegForm[username]': "required",
            'RegForm[email]': {
                required: true,
                email: true
            },
            'RegForm[password]': "required",
            'RegForm[password2]': {
                required: true,
                equalTo: "#RegForm_password"
            }
        },
        messages: {
            'RegForm[username]': "请填写用户名",
            'RegForm[email]': "请填写正确的邮箱地址",
            'RegForm[password]': "请填写密码",
            'RegForm[password2]': {
                required: "请填写确认密码",
                equalTo: "两次密码不同"
            }
        }
    });

    $('#login-form').validate({
        rules: {
            'LoginForm[username]': "required",
            'LoginForm[password]': "required"
        },
        messages: {
            'LoginForm[username]': "请填写用户名",
            'LoginForm[password]': "请填写密码"
        }
    });

    $('#baby-update-form').validate({
        rules: {
            'Baby[name]': "required",
            'Baby[city]': "required",
            'Baby[nickname]': "required",
            'Baby[address]': "required",
            'Baby[tel]': "required",
            'Baby[day]': "required",
            'Baby[reason]': "required"
        },
        messages: {
            'Baby[name]': "请填写宝贝姓名",
            'Baby[city]': "请填写城市",
            'Baby[nickname]': "请填写昵称",
            'Baby[address]': "请填写地址",
            'Baby[tel]': "请填写手机号码",
            'Baby[day]': "请填写出生年月",
            'Baby[reason]': "请填写留言"
        }
    });

//	setInterval(function(){
//		var index = $('.knowtxt').data('index');
//		index++;
//		if(index > 10) {
//			index = 1;
//		}
//		$('.knowtxt_body').fadeOut(400);
//		$('.knowtxt'+index).fadeIn(400);
//		$('.knowtxt').data('index', index);
//	},4000);

	var autoplay = getQueryString('autoplay');
	if(autoplay) {
		$('.video_play').trigger('click');
	}

})

var getQueryString = function(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]); return null;
}

function play(){
	$('.video-player').delay(400).animate({opacity:1});
}


function playComplete(){
	LP.triggerAction('close_pop');
	$('.video-player').fadeOut();
	$('.page3-video').animate({height:139});
	$('.page3-video .video-img').fadeIn();
}