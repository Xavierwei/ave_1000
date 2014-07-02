<div class="content">
	<?php $form=$this->beginWidget('CActiveForm',array(
		'id'=>'listForm',
	    'action'=>array('/admin/record/auditAll/'),
	));?>
	<table class="contentTab listTab" width="100%">
		<tr>
			<td class="titleTd" colspan="14">患病儿童</td>
		</tr>
        <tr class="heightLight">
            <td colspan="14">
                <select class="select" name="News[menu_id]" id="News_menu_id">
                    <option value="2" selected="selected">全部</option>
                    <option value="1">已审核</option>
                    <option value="0">未审核</option>
                </select>
                <label for="News_title"> 起始时间：</label><input value="" name="News[title]" id="News_title" type="text" class="button" onClick="WdatePicker()" >
                <label for="News_title"> 结束时间：</label><input value="" name="News[title]" id="News_title" type="text" class="button" >
                <input class="button" onclick="formSubmit(&quot;/malibu/admin/news/List.html&quot;,&quot;&quot;)" name="yt0" type="button" value="筛选">
                <input class="button" onclick="formSubmit(&quot;/malibu/admin/news/List.html&quot;,&quot;&quot;)" name="yt0" type="button" value="导出">
            </td>
        </tr>
		<?php
			if(Yii::app()->user->hasFlash('submit')){
				echo '<tr><td class="leftTd" colspan="14"><p class="submitInfo">'.Yii::app()->user->getFlash('submit').'</p></td></tr>';
			}
		?>
		<tr>
			<th class="leftTd" width="20"><?php echo CHtml::checkBox('',false,array('class'=>'checkAll'))?></th>
			<th><?php echo $form->labelEx($model,'uid'); ?></th>
            <th>头像</th>
			<th colspan="3">患处</th>
            <th>病例</th>
			<th><?php echo $form->labelEx($model,'updatetime'); ?></th>
			<th><?php echo $form->labelEx($model,'status'); ?></th>
			<th>操作</th>
		</tr>
		<?php foreach($data as $key=>$item){ ?>
			<tr>
				<td class="leftTd"><?php echo CHtml::checkBox('id[]',false,array('value'=>$item->uid))?></td>
				<td><?php echo $item->uid;?></td>
                <td width="60"><?php echo $item->avatar!=''?CHtml::image(Yii::app()->baseUrl.$item->avatar,$item->uid,array('height'=>'40px')):'';?></td>
				<td width="60"><?php echo $item->photo1!=''?CHtml::image(Yii::app()->baseUrl.$item->photo1,$item->uid,array('height'=>'40px')):'';?></td>
				<td width="60"><?php echo $item->photo2!=''?CHtml::image(Yii::app()->baseUrl.$item->photo2,$item->uid,array('height'=>'40px')):'';?></td>
                <td width="60"><?php echo $item->photo3!=''?CHtml::image(Yii::app()->baseUrl.$item->photo3,$item->uid,array('height'=>'40px')):'';?></td>
                <td width="60"><?php echo $item->case!=''?CHtml::image(Yii::app()->baseUrl.$item->case,$item->uid,array('height'=>'40px')):'';?></td>
<!--				<td>--><?php //echo CHtml::link($item->uid,array('/admin/record/edit/','id'=>$item->uid)); ?><!--</td>-->
<!--				<td>--><?php //echo $item->comment_number;?><!--</td>-->
				<td><?php echo date("Y-m-d H:i",$item->updatetime);?></td>
				<?php $audit = $item->status==1?'<img src="'.yii::app()->baseUrl.'/style/admin/images/audit.gif">':'<img src="'.yii::app()->baseUrl.'/style/admin/images/unaudit.gif">';?>
				<td><?php echo CHtml::link($audit,array('/admin/record/audit/','id'=>$item->uid)); ?></td>
				<td>
                    <?php echo CHtml::link('查看',array('/admin/record/info/','id'=>$item->uid),array('target'=>"_blank")); ?>
<!--                    --><?php //echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/edit.gif">',array('/admin/record/edit/','id'=>$item->uid)); ?>
<!--                    --><?php //echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/del.gif">',array('/admin/record/delete/','id'=>$item->uid),array('class'=>'delete','id'=>$item->uid)); ?>
                </td>
			</tr>
		<?php }?>
		<tr>
			<td class="pageTd" colspan="16">
				<div class="action">
					<?php echo CHtml::submitButton('审核',array('class'=>'button'));?>
					<?php echo CHtml::Button('未审核',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/record/unAuditAll/').'","")'));?>
<!--					--><?php //echo CHtml::Button('删除',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/record/deleteAll/').'","确定要删除吗？")'));?>
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