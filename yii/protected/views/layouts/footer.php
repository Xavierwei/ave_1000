<!-- footer -->
<div class="footer cs-clear">
    <div class="column">
        <div class="ft_home"><a href="http://www.eau-thermale-avene.cn/" class=""></a></div>
        <div class="ft_link">
            <a href="http://e.weibo.com/eauthermaleavene"></a>
            <a href="http://e.weibo.com/2166726834/app_2960845660"></a>
        </div>
        <div class="ft_weixin">
            <div class="weixin_pop">
                <img src="<?=Yii::app()->baseUrl.'/'?>images/weixin_img.gif" />
                <p><span>雅漾微信</span>扫描二维码，立即关注雅漾官方微信</p>
            </div>
        </div>
        <div class="ft_mail">
            <input class="ft_mailipt" type="text" />
            <input class="ft_mailsub" type="submit" />
        </div>
    </div>
</div>
<!--  -->
<script src="<?=Yii::app()->baseUrl.'/'?>js/index.js"></script>
<script type="text/javascript" src="<?=Yii::app()->baseUrl.'/'?>js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#mycarousel').jcarousel({
            wrap: 'circular',
            scroll:1
        });
    });
</script>
<!--  -->
<!--IE6透明判断-->
<!--[if IE 6]>
<script src="js/DD_belatedPNG.js"></script>
<script>
    DD_belatedPNG.fix('*');
    document.execCommand("BackgroundImageCache", false, true);
</script>
<![endif]-->
</body>
</html>