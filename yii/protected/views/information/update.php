<?php
/* @var $this InformationController */
/* @var $model Information */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'information-update-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'one'); ?>
		<?php echo $form->textField($model,'one'); ?>
		<?php echo $form->error($model,'one'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'two'); ?>
		<?php echo $form->textField($model,'two'); ?>
		<?php echo $form->error($model,'two'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'three'); ?>
		<?php echo $form->textField($model,'three'); ?>
		<?php echo $form->error($model,'three'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'four'); ?>
		<?php echo $form->textField($model,'four'); ?>
		<?php echo $form->error($model,'four'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->