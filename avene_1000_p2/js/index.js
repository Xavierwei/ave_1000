/**
 *
 * Avene 1000 Family
 * zx 2014 05 10
 *
 */
(function ($) {
    var Index={
        /**
         * 初始化方法,用于功能函数的入口
         * @param {string}
         * @example
         **/
        init:function(){
            //事件绑定
            this.bindEvent();
        },
        /**
         * 事件绑定
         * @param {string}
         * @example
         **/
        bindEvent:function(){
            $('.CDAbox').live({
                'mouseenter':function(){
                    $(this).children('.CDApop').show()
                },
                'mouseleave':function(){
                    $(this).children('.CDApop').hide()
                }
            })
            //home_infor
            $('.home_infor').live({
                'mouseenter':function(){
                    $(this).children('.home_infopop').show()
                },
                'mouseleave':function(){
                    $(this).children('.home_infopop').hide()
                }
            })
            //
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
            //login
            $('.login_ed').live('click',function(){
                $('.login_box2').show()
                $('.login_box').hide()
            })
            $('.login_ed2').live('click',function(){
                $('.login_box').show()
                $('.login_box2').hide()
            })
        }
    };
    Index.init();  
})(jQuery);




