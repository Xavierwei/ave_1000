<div class="content">
	<?php $form=$this->beginWidget('CActiveForm',array(
		'id'=>'listForm',
	    'action'=>array('/admin/user/auditAll/'),
	));?>
	<table class="contentTab listTab" width="100%">
		<tr>
			<td class="titleTd" colspan="10">会员管理</td>
		</tr>
		<?php
			if(Yii::app()->user->hasFlash('submit')){
				echo '<tr><td class="leftTd" colspan="11"><p class="submitInfo">'.Yii::app()->user->getFlash('submit').'</p></td></tr>';
			}
		?>
		<tr>
			<th class="leftTd" width="20"><?php echo CHtml::checkBox('',false,array('class'=>'checkAll'))?></th>
			<th><?php echo $form->labelEx($model,'uid'); ?></th>
			<th><?php echo $form->labelEx($model,'username'); ?></th>
            <th><?php echo $form->labelEx($model,'roletype'); ?></th>
			<th><?php echo $form->labelEx($model,'email'); ?></th>
<!--			<th>操作</th>-->
		</tr>
		<?php foreach($data as $key=>$item){ ?>
			<tr>
				<td class="leftTd"><?php echo CHtml::checkBox('id[]',false,array('value'=>$item->uid))?></td>
				<td><?php echo $item->uid;?></td>
				<td><?php echo CHtml::link($item->username,array('/admin/user/edit/','id'=>$item->uid)); ?></td>
				<td><?php echo $item->roletype==User::GENERAL_TYPE?'标准用户':'微博用户';?></td>
				<td><?php echo $item->email;?></td>
<!--				<td>--><?php //echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/edit.gif">',array('/admin/user/edit/','id'=>$item->uid)); ?>
<!--                        --><?php //echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/del.gif">',array('/admin/user/delete/','id'=>$item->uid),array('class'=>'delete','id'=>$item->uid)); ?>
<!--                </td>-->
			</tr>
		<?php }?>
		<tr>
			<td class="pageTd" colspan="11">
				<div class="action">
<!--					--><?php //echo CHtml::submitButton('审核',array('class'=>'button'));?>
<!--					--><?php //echo CHtml::Button('未审核',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/user/unAuditAll/').'","")'));?>
<!--					--><?php //echo CHtml::Button('删除',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/user/deleteAll/').'","确定要删除吗？")'));?>
				</div>
				<?php    
				$this->widget('CLinkPager',array(    
					'header'=>'',    
					'firstPageLabel' => '首页',
					'lastPageLabel' => '末页',
					'prevPageLabel' => '上一页',
					'nextPageLabel' => '下一页',
					'pages' => $page,
					'maxButtonCount'=>13
					)    
				);?>
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>