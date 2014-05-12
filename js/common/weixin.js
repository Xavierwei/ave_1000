$(document).ready(function() {
    $('.ft_weixin').live({
        'mouseenter':function(){
            $(this).children('.weixin_pop').show()
        },
        'mouseleave':function(){
            $(this).children('.weixin_pop').hide()
        }
    })
});
