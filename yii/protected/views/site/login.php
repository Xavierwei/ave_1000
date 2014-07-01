
<div class="activity_step"><img src="<?php echo Yii::app()->baseUrl?>/images/step1.png" /></div>
<div class="login">
    <!--  -->
    <div class="login_box">
        <p class="login_ed"></p>
        <div class="login_form">
            <?php $regform=$this->beginWidget('CActiveForm', array(
                'id'=>'user-reg-form',
                'action'=>Yii::app()->createUrl('/site/reg'),
                'enableAjaxValidation'=>false,
            )); ?>
            <div class="login_fi"><?php echo $regform->textField($regmodel,'username',array('class'=>'login_ipt')); ?></div>
            <div class="login_fi"><?php echo $regform->textField($regmodel,'email',array('class'=>'login_ipt')); ?></div>
            <div class="login_fi"><?php echo $regform->PasswordField($regmodel,'password',array('class'=>'login_ipt')); ?></div>
            <div class="login_fi"><?php echo $regform->PasswordField($regmodel,'password2',array('class'=>'login_ipt')); ?></div>
            <div class="login_fi"><input class="login_btn" type="submit" /></div>
            <?php $this->endWidget(); ?>
        </div>
        <a class="login_weibo_link" href="<?php echo Yii::app()->createUrl('/weibo')?>"><p class="login_weibo"></p></a>
    </div>
    <!--  -->
    <div class="login_box2" style="display:none;">
        <p class="login_ed2"></p>

        <a href="<?php echo Yii::app()->createUrl('/weibo')?>" class="login_weibo2"></a>
        <div class="login_form3">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>false,
            )); ?>
                <div class="login_fi"><?php echo $form->textField($model,'username',array('class'=>'login_ipt')); ?></div>
                <div class="login_fi"><?php echo $form->passwordField($model,'password',array('class'=>'login_ipt')); ?></div>
                <div class="login_fi login_fibtn"><?php echo CHtml::submitButton('Login',array('class'=>'login_btn')); ?></div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
