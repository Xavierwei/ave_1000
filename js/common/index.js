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
