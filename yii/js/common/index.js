function compile(tplId , context, callback) {
    var template = Handlebars.compile( $('#' + tplId).html());

    $('body').append(template(context));

    var dOverlay = $('.overlay'),
        dPopup = $('.popup'),
        dClose = $('.popup .popup-close'),
        closePopup = function () {
            dOverlay.fadeOut();

            dPopup.fadeOut(function(){
                dOverlay.remove();
                dPopup.remove();
            })
        };

    dOverlay.fadeIn();

    dPopup.css({top:'-50%'}).fadeIn().dequeue().animate({top:'50%'}, 800, 'easeOutQuart')

    dOverlay.bind('click', closePopup);
    dClose.bind('click', closePopup);

    if(callback) {
        callback()
    }
}

function play() {
    $('.video-player').delay(400).animate({opacity:1});
}

$(document).ready(function() {
    // weixin popup
    $('.ft_weixin').live({
        'mouseenter':function(){
            $(this).children('.weixin_pop').fadeIn();
        },
        'mouseleave':function(){
            $(this).children('.weixin_pop').fadeOut();
        }
    })

	$(".diagnose_btn").click(function(){
//        if($('.dia_no_on').length>0){
//
//            $('.popshare,.pop').fadeIn(300);
//            return;
//        }
		$("#information-update-form").submit();
	});

    $('#Baby_reason').focus(function(){
        if($(this).val().length == 0) {
            $(this).val('希望通过这次活动能让我的孩子早日康复');
        }
    });

	$('.ft_weixin').live({
		'mouseenter':function(){
			$(this).children('.weixin_pop').show()
		},
		'mouseleave':function(){
			$(this).children('.weixin_pop').hide()
		}
	})
	// 弹窗 显示
	$('.popshow').live('click',function(){
		$('.popshare,.pop').fadeIn(300)
	})
	//弹窗 隐藏
	$('.popclose').live('click',function(){
		$('.popshare,.pop').fadeOut(300)
	})
	// select
	$('.profile_sel').live('change',function(){
		$(this).prev('.profile_seltxt').html( $(this).val() )
	})
	$('.city_selcom .profile_sel').live('change',function(){
		$('.city_selcom').prev('.profile_seltxt').html( $(this).val() )
	})
	//select city
	$('#city_sel').live('change',function(){
		$('.city_selcom').children('.profile_selhosp').hide()
		$('.city_selcom').children('.profile_selhosp').eq( $(this).get(0).selectedIndex ).show()
		$('.city_selcom').prev('.profile_seltxt').html($('.city_selcom').children('.profile_selhosp').eq( $(this).get(0).selectedIndex).val() )
        $('#Baby_point_city').val($('.profile_selcity_txt').html());
        $('#Baby_point_hospital').val($('.city_selcom').children('.profile_selhosp').eq( $(this).get(0).selectedIndex).val() );
        if($('.profile_selcity_txt').html() == '请选择所在城市')
        {
            $('#Baby_point_city').val('');
            $('#Baby_point_hospital').val('');
        }
	})
	//login
	$('.login_ed').live('click',function(){
		$('.login_box2').show()
		$('.login_box').hide()
	})
	$('.login_ed2').live('click',function(){
		$('.login_box').show()
		$('.login_box2').hide()
	})
	// diagnose
	$('.dia_yes').live('click',function(){
		$(this).next('input').next('.dia_no').removeClass('dia_no_on')
		$(this).addClass('dia_yes_on')
		$(this).next('input').val('1');
	})
	$('.dia_no').live('click',function(){
		$(this).prev('input').prev('.dia_yes').removeClass('dia_yes_on')
		$(this).addClass('dia_no_on')
		$(this).prev('input').val('0');
	})

	//阅读隐私申明
	$('.make_check').live('click',function(){
		$(this).removeClass('make_checked').addClass('make_checked');
	})
	$('.make_checked').live('click',function(){
		$(this).removeClass('make_checked');
	})

    $('.profile_hosp .make_check').live('click',function(){
        if($(this).hasClass('make_checked')) {
            $(this).next().hide();
        }
        else {
            $(this).next().show();
        }

    })

	$('.fancybox-img').fancybox({
		scrolling : false,
		fitToView: false
	});


	$('.about_2_1_i .gm-img').hover(function(){
		$(this).find('.p2').fadeIn();
	},function(){
		$(this).find('.p2').fadeOut();
	});


	$('.profile_hosp .make_check').click(function(){
		$('.make_check').fadeIn();
	});

	// header nav list
    var dNav = $('.header .nav');

    $('.header .navbtn').bind('touchstart', function () {
        dNav.toggle();
    })

    // news letter
    var dEmail = $('.ft_mail'),
        dError = dEmail.find('.error'),
        dInput = dEmail.find('.ft_mailipt'),
        dSubmit = dEmail.find('.ft_mailsub'),
        submit = function(){
            var email = dInput.val(),
                exp = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.(.*?)$/;

            dError.fadeOut();

            if (!exp.test(email)) {
                dError.fadeIn();
            } else {
                $.ajax({
                    url : './newsletter.php',
                    method :'post',
                    data : {email:email},
                    dataType : 'json',
                    complete: function(res) {
                        var status = '';

                        if(res.status == '200') {
                            status = 'success';
                        } else {
                            status = 'failed';
                        }

                        compile( 'newsletter-pop-template', {status:status})
                    }
                })
            }
        };

    dSubmit.bind('click', submit);
});
