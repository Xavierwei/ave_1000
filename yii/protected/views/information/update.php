<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'information-update-form',
    'enableAjaxValidation'=>false,
)); ?>
<div class="diagnose">
	<div class="activity_step"><img src="<?php echo Yii::app()->baseUrl?>/images/step2.png" /></div>
    <div class="diagnose_com">
        <div class="dia_item">
            <div class="dia_q"><span>Q1：</span>您孩子的皮肤干燥吗?</div>
            <div class="dia_a cs-clear">
                <p class="dia_yes <?php echo $model->one==1 ? 'dia_yes_on' : ''?>"></p>
                <?php echo $form->textField($model,'one',array('hidden'=>'hidden')); ?>
                <p class="dia_no <?php echo $model->one==0 ? 'dia_no_on' : ''?>"></p>
            </div>
        </div>
        <div class="dia_item">
            <div class="dia_q"><span>Q2：</span>孩子的直系家长们是否也得过湿疹、过敏性鼻炎、哮喘的疾病史?</div>
            <div class="dia_a cs-clear">
                <p class="dia_yes <?php echo $model->two==1 ? 'dia_yes_on' : ''?>"></p>
                <?php echo $form->textField($model,'two',array('hidden'=>'hidden')); ?>
                <p class="dia_no <?php echo $model->two==0 ? 'dia_no_on' : ''?>"></p>
            </div>
        </div>
        <div class="dia_item">
            <div class="dia_q"><span>Q3：</span>您孩子的皮肤的湿疹是否最长常发生在腘窝、肘窝、脚踝、颈部等部位?</div>
            <div class="dia_a cs-clear">
                <p class="dia_yes <?php echo $model->three==1 ? 'dia_yes_on' : ''?>"></p>
                <?php echo $form->textField($model,'three',array('hidden'=>'hidden')); ?>
                <p class="dia_no <?php echo $model->three==0 ? 'dia_no_on' : ''?>"></p>
            </div>
        </div>
        <div class="dia_item">
            <div class="dia_q"><span>Q4：</span>您的孩子是两岁前发病的吗?</div>
            <div class="dia_a cs-clear">
                <p class="dia_yes <?php echo $model->four==1 ? 'dia_yes_on' : ''?> "></p>
                <?php echo $form->textField($model,'four',array('hidden'=>'hidden')); ?>
                <p class="dia_no <?php echo $model->four==0 ? 'dia_no_on' : ''?>"></p>
            </div>
        </div>
    </div>
    <a href="javascript:void(0)" class="diagnose_btn btn"></a>
    <!--  -->
</div>
<?php $this->endWidget(); ?>
<div class="popshare"></div>
<div class="pop pop2">
    <div class="popclose"></div>
    <div class="care_popcom notsick">
            <h2>您的孩子尚不属于湿疹/特应性皮肤</h2>
            <p>幼儿的全身肌肤都较为敏感脆弱，日常仍需注意使用滋润安全的清洁护肤产品，并定期检查，以保持肌肤健康。</p>
            <a class="backhome btn" href="<?php echo Yii::app()->baseUrl?>">返回首页</a>
    </div>
</div>