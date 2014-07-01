<div class="login">
    <div class="login_tit"></div>
    <div class="login_box">
        <p class="login_ed"></p>
        <div class="login_form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'user-reg-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // See class documentation of CActiveForm for details on this,
                // you need to use the performAjaxValidation()-method described there.
                'enableAjaxValidation'=>false,
            )); ?>
                <div class="login_fi"><?php echo $form->textField($model,'username',array('class'=>'login_ipt')); ?></div>
                <div class="login_fi"><?php echo $form->textField($model,'email',array('class'=>'login_ipt')); ?></div>
                <div class="login_fi"><?php echo $form->PasswordField($model,'password',array('class'=>'login_ipt')); ?></div>
                <div class="login_fi"><?php echo $form->PasswordField($model,'password2',array('class'=>'login_ipt')); ?></div>
                <div class="login_fi"><input class="login_btn" type="submit" /></div>
            <?php $this->endWidget(); ?>
        </div>
        <a href="<?php echo Yii::app()->createUrl('/weibo')?>"><p class="login_weibo"></p></a>
    </div>
</div>