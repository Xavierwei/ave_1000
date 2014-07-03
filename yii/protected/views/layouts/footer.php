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
                <img src="<?php echo Yii::app()->baseUrl.'/'?>images/weixin_img.gif" />
                <p><span>雅漾微信</span>扫描二维码，立即关注雅漾官方微信</p>
            </div>
        </div>
        <div class="ft_mail">
            <input class="ft_mailipt" type="text" />
            <input class="ft_mailsub" type="submit" />
            <div class="error">请填写正确的邮箱</div>
        </div>
    </div>
    <div class="legal_info">
        <div class="red_text">免责声明:</div> 本网站信息仅供参考，不能代替医生等专业人士意见。任何关于治疗或症状管理的决定应于咨询医生等专业人士后，根据自身情况做出。
    </div>
</div>
<!--  -->
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/handlebars.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/jquery.queryloader2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/scrollfix.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>lib/flash_detect_min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/common/skrollr.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/city.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/common/loading.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/common/index.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/baike/index.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/index/index.js"></script>

<script src="<?php echo Yii::app()->baseUrl.'/'?>js/index.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/'?>js/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#mycarousel').jcarousel({
			wrap: 'circular',
			scroll:1
		});
	});
	<?php if($this->action->controller->id == 'record'):?>
	function uploadImg(inputid,backimg,form)
	{
		$('#'+inputid).uploadify({
			'width' : '206px',
			'height' : '194px',
			'auto'     : true,//开启自动上传
			'removeTimeout' : 0,//文件队列上传完成1秒后删除
			'swf'      : '<?php echo Yii::app()->baseUrl.'/'?>js/uploadify/uploadify.swf',
			'uploader' :'<?php echo Yii::app()->createUrl('/uploadify/uploadone')?>',
			'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
			'buttonText' : '',//设置按钮文本
			'buttonImage' :backimg,
			'multi'    : false,//允许同时上传多张图片
			//queueSizeLimit:1,//一次最多只允许上传1张图片
			'uploadLimit' : 0,//可以上传无限次
			'fileTypeDesc' : 'Image Files',//只允许上传图像
			'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
			'fileSizeLimit' : '1000KB',//限制上传的图片不得超过1000KB
			'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
                var json = $.parseJSON(data);
				if (json.state == 'success')
				{
					$('#'+inputid).parent('.make_phobg').prev('img').attr('src','<?php echo Yii::app()->baseUrl?>'+json.file).addClass('pho_uploaded');
					$('#'+form).val(json.file);
					$('#'+inputid).parent('.make_phobg').next('.make_phoclose').click(function(e)
					{
							$('#'+inputid).uploadify('cancel', file.id);
							$('#'+inputid).parent('.make_phobg').prev('img').attr('src',backimg).removeClass('pho_uploaded');
							$('#'+form).val('');
					});
				}
				else
				{
					alert(json.message);
				}
			}
		});
	}

	$(".make_phoclose").click(function(e){
        if(confirm('确认删除?'))
        {
            form = $(this).prev('.make_phobg').children().attr('id');
            backimg = form == 'case' ? '<?php echo Yii::app()->baseUrl.'/'?>images/make_up2.jpg' : '<?php echo Yii::app()->baseUrl.'/'?>images/make_up.jpg';
            $(this).prev('.make_phobg').prev('img').attr('src',backimg);
            $('#Record_'+form).val('');
        }
	});


	$(document).ready(function(){
        var width = $(window).width();
        if(navigator.platform.indexOf("Win")==0) {
            uploadImg('avatar','<?php echo Yii::app()->baseUrl.'/'?>images/make_up.jpg','Record_avatar');
            uploadImg('photo1','<?php echo Yii::app()->baseUrl.'/'?>images/make_up.jpg','Record_photo1');
            uploadImg('photo2','<?php echo Yii::app()->baseUrl.'/'?>images/make_up.jpg','Record_photo2');
            uploadImg('photo3','<?php echo Yii::app()->baseUrl.'/'?>images/make_up.jpg','Record_photo3');
            uploadImg('case','<?php echo Yii::app()->baseUrl.'/'?>images/make_up2.jpg','Record_case');
        }
        else {
	        $('#avatar,#photo1,#photo2,#photo3,#case').fileupload({
		        url: '<?php echo Yii::app()->createUrl('/uploadify/uploadone')?>',
		        dataType: 'json',
		        done: function (e, data) {
			        $(this).parents('.make_pho').find('img').attr('src',"<?php echo Yii::app()->baseUrl?>" + data.result.file).addClass('pho_uploaded');
			        $('#Record_'+$(this).attr('name')).val(data.result.file);
		        },
		        progressall: function (e, data) {

		        }
	        });
        }



	});

	$(".nextForm").click(function(){
        $('.record_error').html('');
		if($('.huanchu_pho .pho_uploaded').length == 0)
		{
            $('.record_error').html("请上传至少一张患处照片");
		}
		else if($('.make_checked').attr('class'))
		{
			$("#record-update-form").submit();
		}
		else
		{
			$('.record_error').html("您尚未阅读“隐私声明”");
		}
	});
	<?php endif;?>

</script>


<!--IE6透明判断-->
<!--[if IE 6]>
<script src="<?php echo Yii::app()->baseUrl.'/'?>/lib/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('*');
	document.execCommand("BackgroundImageCache", false, true);
</script>
<![endif]-->
<!--  -->

<!-- Google 再营销代码 -->
<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1036621629;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
	<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1036621629/?value=0&amp;guid=ON&amp;script=0"/>
	</div>
</noscript>
<!--Darwin Track System Ver2.0 Begin-->
<script type="text/javascript">
    if (/sv/.test(document.cookie+window.location)) {
        var _rsClientId="23";
        var _rsStepId=0;
        var _rsIsSVL=false;
        var _rsDWLP=location.protocol.indexOf("https")>-1?"https:":"http:";
        var _rsDWDN="//sv.dmclick.cn/";
        var _rsDWURL = _rsDWLP+_rsDWDN+"23.js";
        document.write(unescape("%3Cscript src='" + _rsDWURL + "' type='text/javascript'%3E%3C/script%3E"));
    }
</script>
<!--Darwin Track System Ver2.0 End-->
</body>
</html>