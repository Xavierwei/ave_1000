<?php
/* @var $this RecordController */
/* @var $model Record */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'record-update-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
        <?php echo CHtml::activeFileField($model,'avatar'); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'photo1'); ?>
        <?php echo CHtml::activeFileField($model,'photo1'); ?>
		<?php echo $form->error($model,'photo1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo2'); ?>
        <?php echo CHtml::activeFileField($model,'photo2'); ?>
		<?php echo $form->error($model,'photo2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo3'); ?>
        <?php echo CHtml::activeFileField($model,'photo3'); ?>
		<?php echo $form->error($model,'photo3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'case'); ?>
        <?php echo CHtml::activeFileField($model,'case'); ?>
		<?php echo $form->error($model,'case'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->