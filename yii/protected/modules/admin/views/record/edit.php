<div class="content">
	<?php $form=$this->beginWidget('CActiveForm',array(
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		'focus'=>array($model,'title'),
	));?>
	<table class="contentTab" width="100%">
		<tr>
			<td class="titleTd" colspan="6">产品管理</td>
		</tr>
		<tr>
			<td class="leftTd" width="100">&nbsp;</td>
			<td colspan="5">
				<?php
				if(Yii::app()->user->hasFlash('submit')){
					echo '<p class="submitInfo">'.Yii::app()->user->getFlash('submit').'</p>';
				}else{
					echo'<p class="note">带<span class="required">*</span>为必填项</p>';
				}
				?>
				<?php echo CHtml::errorSummary($model); ?>
			</td>
		</tr>
		<tr>
			<td class="leftTd" width="100"><?php echo $form->labelEx($model,'title'); ?></td>
            <td colspan="5">
				<?php echo $form->textField($model,'title',array('value'=>$model->title,'class'=>'commonText'));?>
				<?php echo $form->error($model,'title'); ?>
			</td>
		</tr>
		<tr>
			<td class="leftTd"><?php echo $form->labelEx($model,'category_id'); ?></td>
            <td colspan="5">
				<?php echo $form->dropDownList($model,'category_id',Category::model()->getCategoryList('0','请选择'),array('class'=>'select')); ?>
				<?php echo $form->error($model,'category_id'); ?>
			</td>
		</tr>
        <tr>
            <td class="leftTd"><?php echo $form->labelEx($model,'description'); ?></td>
            <td colspan="5">
                <?php echo CHtml::activeTextArea($model,'description',array('value'=>$model->description,'class'=>'textArea'));?>
                <?php echo $form->error($model,'description'); ?>
            </td>
        </tr>
		<tr>
			<td class="leftTd"><?php echo '图片' ?></td>
			<td>
                    <?php echo CHtml::Button('上传图片1',array('id'=>'uploadButton1','class'=>'uploadButton'));?>
                    <?php echo CHtml::activeHiddenField($model,'photo1',array('value'=>$model->photo1,'id'=>'photo1'));?>
                    <?php echo $form->error($model,'photo1'); ?>

                    <?php
                    $this->widget('ext.kindeditor.KindUploadWidget',array(
                        'id'=>'uploadButton1',
                        'dir'=>'image/product',
                        'preview'=>'photoPreview1',
                        'delete'=>'photoDelete1',
                        'callback_url'=>Yii::app()->createUrl('/admin/product/photoSave'),
                        'thumbWidth'=>270,
                        'thumbHeight'=>150,
                        'parameters'=>array(
                            'id'=>$model->id,
                            'name'=>'photo1',
                        )
                    ));
                    ?>
			</td>
            <td>
                <?php echo CHtml::Button('上传图片2',array('id'=>'uploadButton2','class'=>'uploadButton','dir'=>'image','catalogue'=>'product'));?>
                <?php echo CHtml::activeHiddenField($model,'photo2',array('value'=>$model->photo2,'id'=>'photo2'));?>
                <?php echo $form->error($model,'photo2'); ?>

                <?php
                $this->widget('ext.kindeditor.KindUploadWidget',array(
                    'id'=>'uploadButton2',
                    'dir'=>'image/product',
                    'preview'=>'photoPreview2',
                    'delete'=>'photoDelete2',
                    'callback_url'=>Yii::app()->createUrl('/admin/product/photoSave'),
                    'thumbWidth'=>270,
                    'thumbHeight'=>150,
                    'parameters'=>array(
                        'id'=>$model->id,
                        'name'=>'photo2',
                    )
                ));
                ?>
            </td>
            <td>
                <?php echo CHtml::Button('上传图片3',array('id'=>'uploadButton3','class'=>'uploadButton','dir'=>'image','catalogue'=>'product'));?>
                <?php echo CHtml::activeHiddenField($model,'photo3',array('value'=>$model->photo3,'id'=>'photo3'));?>
                <?php echo $form->error($model,'photo3'); ?>

                <?php
                $this->widget('ext.kindeditor.KindUploadWidget',array(
                    'id'=>'uploadButton3',
                    'dir'=>'image/product',
                    'preview'=>'photoPreview3',
                    'delete'=>'photoDelete3',
                    'callback_url'=>Yii::app()->createUrl('/admin/product/photoSave'),
                    'thumbWidth'=>270,
                    'thumbHeight'=>150,
                    'parameters'=>array(
                        'id'=>$model->id,
                        'name'=>'photo3',
                    )
                ));
                ?>
            </td>
            <td>
                <?php echo CHtml::Button('上传图片4',array('id'=>'uploadButton4','class'=>'uploadButton','dir'=>'image','catalogue'=>'product'));?>
                <?php echo CHtml::activeHiddenField($model,'photo4',array('value'=>$model->photo4,'id'=>'photo4'));?>
                <?php echo $form->error($model,'photo4'); ?>

                <?php
                $this->widget('ext.kindeditor.KindUploadWidget',array(
                    'id'=>'uploadButton4',
                    'dir'=>'image/product',
                    'preview'=>'photoPreview4',
                    'delete'=>'photoDelete4',
                    'callback_url'=>Yii::app()->createUrl('/admin/product/photoSave'),
                    'thumbWidth'=>270,
                    'thumbHeight'=>150,
                    'parameters'=>array(
                        'id'=>$model->id,
                        'name'=>'photo4',
                    )
                ));
                ?>
            </td>
            <td>
                <?php echo CHtml::Button('上传图片5',array('id'=>'uploadButton5','class'=>'uploadButton','dir'=>'image','catalogue'=>'product'));?>
                <?php echo CHtml::activeHiddenField($model,'photo5',array('value'=>$model->photo5,'id'=>'photo5'));?>
                <?php echo $form->error($model,'photo5'); ?>

                <?php
                $this->widget('ext.kindeditor.KindUploadWidget',array(
                    'id'=>'uploadButton5',
                    'dir'=>'image/product',
                    'preview'=>'photoPreview5',
                    'delete'=>'photoDelete5',
                    'callback_url'=>Yii::app()->createUrl('/admin/product/photoSave'),
                    'thumbWidth'=>270,
                    'thumbHeight'=>150,
                    'parameters'=>array(
                        'id'=>$model->id,
                        'name'=>'photo5',
                    )
                ));
                ?>
            </td>
		</tr>
		<tr>
			<td class="leftTd">预览</td>
			<td>
				<?php echo CHtml::image($model->photo1!=''?$model->photo1:yii::app()->baseUrl.'/style/admin/images/noPhoto.png',$model->title,array('id'=>'photoPreview1','class'=>'photoPreview','height'=>'50px'));?>
				<?php echo CHtml::ajaxLink(
			        '删除', 
			        array('/admin/product/photoDelete'),
			        array(
			            'data'=>array('id'=>$model->id,'name'=>'photo1','photo_url'=>'js:$("#photo1").val()','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
			            'type'=>"post",
			            'success' => 'js:function(data){
			                $("#photoDelete1").hide();
			                $("#photoPreview1").attr("src","'.yii::app()->baseUrl.'/style/admin/images/noPhoto.png");
			                $("#photo1").val("");
			            }'
			        ),
			        array('id'=>'photoDelete1','class'=>'photoDelete','style'=>$model->photo1!=''?'':'display:none')
			    );?>
			</td>
            <td>
                <?php echo CHtml::image($model->photo2!=''?$model->photo2:yii::app()->baseUrl.'/style/admin/images/noPhoto.png',$model->title,array('id'=>'photoPreview2','class'=>'photoPreview','height'=>'50px'));?>
                <?php echo CHtml::ajaxLink(
                    '删除',
                    array('/admin/product/photoDelete'),
                    array(
                        'data'=>array('id'=>$model->id,'name'=>'photo2','photo_url'=>'js:$("#photo2").val()','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                        'type'=>"post",
                        'success' => 'js:function(data){
			                $("#photoDelete2").hide();
			                $("#photoPreview2").attr("src","'.yii::app()->baseUrl.'/style/admin/images/noPhoto.png");
			                $("#photo2").val("");
			            }'
                    ),
                    array('id'=>'photoDelete2','class'=>'photoDelete','style'=>$model->photo2!=''?'':'display:none')
                );?>
            </td>
            <td>
                <?php echo CHtml::image($model->photo3!=''?$model->photo3:yii::app()->baseUrl.'/style/admin/images/noPhoto.png',$model->title,array('id'=>'photoPreview3','class'=>'photoPreview','height'=>'50px'));?>
                <?php echo CHtml::ajaxLink(
                    '删除',
                    array('/admin/product/photoDelete'),
                    array(
                        'data'=>array('id'=>$model->id,'name'=>'photo3','photo_url'=>'js:$("#photo3").val()','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                        'type'=>"post",
                        'success' => 'js:function(data){
			                $("#photoDelete3").hide();
			                $("#photoPreview3").attr("src","'.yii::app()->baseUrl.'/style/admin/images/noPhoto.png");
			                $("#photo3").val("");
			            }'
                    ),
                    array('id'=>'photoDelete3','class'=>'photoDelete','style'=>$model->photo3!=''?'':'display:none')
                );?>
            </td>
            <td>
                <?php echo CHtml::image($model->photo4!=''?$model->photo4:yii::app()->baseUrl.'/style/admin/images/noPhoto.png',$model->title,array('id'=>'photoPreview4','class'=>'photoPreview','height'=>'50px'));?>
                <?php echo CHtml::ajaxLink(
                    '删除',
                    array('/admin/product/photoDelete'),
                    array(
                        'data'=>array('id'=>$model->id,'name'=>'photo4','photo_url'=>'js:$("#photo4").val()','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                        'type'=>"post",
                        'success' => 'js:function(data){
			                $("#photoDelete4").hide();
			                $("#photoPreview4").attr("src","'.yii::app()->baseUrl.'/style/admin/images/noPhoto.png");
			                $("#photo4").val("");
			            }'
                    ),
                    array('id'=>'photoDelete4','class'=>'photoDelete','style'=>$model->photo4!=''?'':'display:none')
                );?>
            </td>
            <td>
                <?php echo CHtml::image($model->photo5!=''?$model->photo5:yii::app()->baseUrl.'/style/admin/images/noPhoto.png',$model->title,array('id'=>'photoPreview5','class'=>'photoPreview','height'=>'50px'));?>
                <?php echo CHtml::ajaxLink(
                    '删除',
                    array('/admin/product/photoDelete'),
                    array(
                        'data'=>array('id'=>$model->id,'name'=>'photo5','photo_url'=>'js:$("#photo5").val()','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                        'type'=>"post",
                        'success' => 'js:function(data){
			                $("#photoDelete5").hide();
			                $("#photoPreview5").attr("src","'.yii::app()->baseUrl.'/style/admin/images/noPhoto.png");
			                $("#photo5").val("");
			            }'
                    ),
                    array('id'=>'photoDelete5','class'=>'photoDelete','style'=>$model->photo5!=''?'':'display:none')
                );?>
            </td>
		</tr>
		<tr>
			<td class="leftTd" width="100"><?php echo $form->labelEx($model,'content'); ?></td>
            <td colspan="5">
				<?php echo CHtml::activeTextArea($model,'content',array('value'=>$model->content));?>
				<?php echo $form->error($model,'content'); ?>
				<?php 
				$this->widget('ext.kindeditor.KindEditorWidget',array(
					'id'=>'Product_content',
					'items' => array(
						'uploadJson'=>Yii::app()->assetManager->publish(Yii::getPathOfAlias('ext.kindeditor.assets')).'/php/upload_json.php?root='.yii::app()->baseUrl.'&catalogue=product_content',
						'width'=>'670px',
						'height'=>'200px',
						'allowFileManager'=>false,
					),
				)); 
				?>
			</td>
		</tr>
<!--		<tr>-->
<!--			<td class="leftTd" width="100">--><?php //echo $form->labelEx($model,'hot'); ?><!--</td>-->
<!--            <td colspan="5">-->
<!--				--><?php //echo $form->radioButtonList($model,'hot',array(0=>'未置热',1=>'已置热'),array('separator'=>'&nbsp;&nbsp;'));?>
<!--				--><?php //echo $form->error($model,'hot'); ?>
<!--			</td>-->
<!--		</tr>-->
<!--		<tr>-->
<!--			<td class="leftTd" width="100">--><?php //echo $form->labelEx($model,'recommend'); ?><!--</td>-->
<!--            <td colspan="5">-->
<!--				--><?php //echo $form->radioButtonList($model,'recommend',array(0=>'未推荐',1=>'已推荐'),array('separator'=>'&nbsp;&nbsp;'));?>
<!--				--><?php //echo $form->error($model,'recommend'); ?>
<!--			</td>-->
<!--		</tr>-->
		<tr>
			<td class="leftTd" width="100"><?php echo $form->labelEx($model,'audit'); ?></td>
            <td colspan="5">
				<?php echo $form->radioButtonList($model,'audit',array(0=>'未审核',1=>'已审核'),array('separator'=>'&nbsp;&nbsp;'));?>
				<?php echo $form->error($model,'audit'); ?>
			</td>
		</tr>
<!--		<tr>-->
<!--			<td class="leftTd" width="100">--><?php //echo $form->labelEx($model,'hit'); ?><!--</td>-->
<!--            <td colspan="5">-->
<!--				--><?php //echo $form->textField($model,'hit',array('value'=>$model->hit,'class'=>'commonText'));?>
<!--				--><?php //echo $form->error($model,'hit'); ?>
<!--			</td>-->
<!--		</tr>-->
		<tr>
			<td class="leftTd"><?php echo $form->labelEx($model,'keyword'); ?></td>
            <td colspan="5">
				<?php echo CHtml::activeTextArea($model,'keyword',array('value'=>$model->keyword,'class'=>'textArea'));?>
				<?php echo $form->error($model,'keyword'); ?>
			</td>
		</tr>
		<tr>
			<td class="pageTd" colspan="6"><?php echo CHtml::submitButton($model->isNewRecord ? '添加':'保存',array('class'=>'button'));?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>