<div class="make">
    <div class="make_tit"></div>
    <div class="make_txt">您的宝宝信息已被记录，继续制作电子档案，完善个人信息。</div>
    <div class="make_item">
        <div class="make_itemtit">STEP1 上传宝宝照片</div>
        <div class="make_com cs-clear">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $model->avatar ? $model->avatar : '/images/make_up.jpg'?>" />
                <div class="make_phobg"><input  hidden  id="avatar" name="avatar" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
        <div class="make_btn"></div>
    </div>
    <div class="make_item">
        <div class="make_itemtit">STEP1 上传患处照片</div>
        <div class="make_com cs-clear">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $model->photo1 ? $model->photo1 : '/images/make_updemo.jpg'?>" />
                <div class="make_phobg"><input  hidden  id="photo1" name="photo1" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $model->photo2 ? $model->photo2 : '/images/make_updemo.jpg'?>" />
                <div class="make_phobg"><input  hidden  id="photo2" name="photo2" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $model->photo3 ? $model->photo3 : '/images/make_updemo.jpg'?>" />
                <div class="make_phobg"><input  hidden  id="photo3" name="photo3" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
        <div class="make_btn"></div>
    </div>
    <div class="make_item">
        <div class="make_itemtit">STEP1 上传真实病例扫描页</div>
        <div class="make_com cs-clear">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $model->case ? $model->case : '/images/make_up2.jpg'?>" />
                <div class="make_phobg"><input  hidden  id="case" name="case" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
        <div class="make_btn"></div>
    </div>
    <!--  -->
    <div class="make_ft">
        <div class="cs-clear"><p class="make_check make_checked">我已阅读“隐私申明”</p></div>
        <p>我同意雅漾使用宝贝的个人档案，宝宝患处信息不会对外公开。</p>
    </div>
    <div class="make_next cs-clear">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'record-update-form',
            'enableAjaxValidation'=>false,
        )); ?>
        <?php echo $form->textField($model,'avatar',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'photo1',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'photo2',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'photo3',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'case',array('hidden'=>'hidden')); ?>
        <?php $this->endWidget(); ?>
        <a class="nextForm" href="javascript:void(0)"></a>
    </div>
</div>
<script type="text/javascript" src="<?=Yii::app()->baseUrl.'/'?>js/uploadify/jquery.uploadify.min.js"></script>
<link href="<?=Yii::app()->baseUrl.'/'?>js/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script>
    function uploadImg(inputid,backimg,form)
    {
        $('#'+inputid).uploadify({
            'width' : '206px',
            'height' : '194px',
            'auto'     : true,//开启自动上传
            'removeTimeout' : 0,//文件队列上传完成1秒后删除
            'swf'      : '<?=Yii::app()->baseUrl.'/'?>js/uploadify/uploadify.swf',
            'uploader' :'<?=Yii::app()->createUrl('/uploadify/uploadone')?>',
            'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
            'buttonText' : '',//设置按钮文本
            'buttonImage' :backimg,
            'multi'    : false,//允许同时上传多张图片
            queueSizeLimit:1,//一次最多只允许上传1张图片
            'uploadLimit' : 0,//可以上传无限次
            'fileTypeDesc' : 'Image Files',//只允许上传图像
            'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
            'fileSizeLimit' : '1000KB',//限制上传的图片不得超过1000KB
            'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
                var json = $.parseJSON(data);
                if (json.state == 'success')
                {
                    $('#'+inputid).parent('.make_phobg').prev('img').attr('src',json.file);
                    $('#'+form).val(json.file);
                    $('#'+inputid).parent('.make_phobg').next('.make_phoclose').click(function(e)
                    {
                        if(confirm('确认删除?'))
                        {
                            $('#'+inputid).uploadify('cancel', file.id);
                            $('#'+inputid).parent('.make_phobg').prev('img').attr('src',backimg);
                            $('#'+form).val('');
                        }
                        e = e || window.event;
                        if(e.stopPropagation) { //W3C阻止冒泡方法
                            e.stopPropagation();
                        } else {
                            e.cancelBubble = true; //IE阻止冒泡方法
                        }
                    });
                }
                else
                {
                    alert(json.message);
                }
            }
        });
    }


    $(document).ready(function(){
        uploadImg('avatar','<?=Yii::app()->baseUrl.'/'?>images/make_up.jpg','Record_avatar');
        uploadImg('photo1','<?=Yii::app()->baseUrl.'/'?>images/make_updemo.jpg','Record_photo1');
        uploadImg('photo2','<?=Yii::app()->baseUrl.'/'?>images/make_updemo.jpg','Record_photo2');
        uploadImg('photo3','<?=Yii::app()->baseUrl.'/'?>images/make_updemo.jpg','Record_photo3');
        uploadImg('case','<?=Yii::app()->baseUrl.'/'?>images/make_up2.jpg','Record_case');
    });

    $(".nextForm").click(function(){
        $("#record-update-form").submit();
    });
</script>
