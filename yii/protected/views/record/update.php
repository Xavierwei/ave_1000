<div class="make">
    <div class="make_tit"></div>
    <div class="make_txt">您的宝宝信息已被记录，继续制作电子档案，完善个人信息。</div>
    <div class="make_item">
        <div class="make_itemtit">STEP1 上传宝宝照片</div>
        <div class="make_com cs-clear">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . ($model->avatar ? $model->avatar : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input  hidden  id="avatar" name="avatar" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
<!--        <div class="make_btn"></div>-->
    </div>
    <div class="make_item">
        <div class="make_itemtit">STEP2 上传患处照片</div>
        <div class="make_com cs-clear">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . ($model->photo1 ? $model->photo1 : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input  hidden  id="photo1" name="photo1" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . ($model->photo2 ? $model->photo2 : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input  hidden  id="photo2" name="photo2" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . ($model->photo3 ? $model->photo3 : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input  hidden  id="photo3" name="photo3" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
<!--        <div class="make_btn"></div>-->
    </div>
    <div class="make_item">
        <div class="make_itemtit">STEP3 上传真实病例扫描页</div>
        <div class="make_com cs-clear">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . ($model->case ? $model->case : '/images/make_up2.jpg')?>" />
                <div class="make_phobg"><input  hidden  id="case" name="case" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
<!--        <div class="make_btn"></div>-->
    </div>
    <!--  -->
    <div class="make_ft">
        <div class="cs-clear"><p class="make_check">我已阅读“隐私申明”</p></div>
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
        <a class="nextForm btn" href="javascript:void(0)"></a>
    </div>
</div>
<link href="<?=Yii::app()->baseUrl.'/'?>js/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
