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
//            $('.CDAbox').live({
//                'mouseenter':function(){
//                    $(this).children('.CDApop').show()
//                },
//                'mouseleave':function(){
//                    $(this).children('.CDApop').hide()
//                }
//            })
//            //home_infor
//            $('.home_infor').live({
//                'mouseenter':function(){
//                    $(this).children('.home_infopop').show()
//                },
//                'mouseleave':function(){
//                    $(this).children('.home_infopop').hide()
//                }
//            })
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
            $('.popshow_list').live('click',function(){
                $('.popshare,#pop_list').fadeIn(300)
            });
            $('.popshow_rule').live('click',function(){
                $('.popshare,#pop_rule').fadeIn(300)
            });
            $('.popshow_hos').live('click',function(){
                $('.popshare,#pop_hos').fadeIn(300)
            });
            $('.popshow_apply').live('click',function(){
                $('.popshare,#pop_apply').fadeIn(300)
            });
            $('.popshow_legal').live('click',function(){
                $('.popshare,#pop_legal').fadeIn(300)
            });
            //弹窗 隐藏
            $('.popclose,.popshare').live('click',function(){
                $('.popshare,.pop').fadeOut(300)
            })
            // select
            $('.profile_sel').live('change',function(){
                $(this).prev('.profile_seltxt').html( $(this).val() )
            })
            $('.city_selcom .profile_sel').live('change',function(){
                $('.city_selcom').prev('.profile_seltxt').html( $(this).val() )
                $('#Baby_point_hospital').val($(this).val());
            })
            //select city
            $('#city_sel').live('change',function(){
                $('.city_selcom').children('.profile_selhosp').hide()
                $('.city_selcom').children('.profile_selhosp').eq( $(this).get(0).selectedIndex ).show()
                $('.city_selcom').prev('.profile_seltxt').html($('.city_selcom').children('.profile_selhosp').eq( $(this).get(0).selectedIndex).val() )
                $('#Baby_point_hospital').val($('.city_selcom').children('.profile_selhosp').eq( $(this).get(0).selectedIndex).val() );
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
        }
    };
    Index.init(); 
     

})(jQuery);




