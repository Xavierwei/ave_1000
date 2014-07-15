<div class="content">
	<?php $form=$this->beginWidget('CActiveForm',array(
		'id'=>'listForm',
        'method'=>'get',
	    'action'=>Yii::app()->createUrl('/admin/record/auditAll/',array('page'=>$post['pageNum'],'Record[city]'=>$post['city'],'Record[province]'=>$post['province'],'Record[point_hospital]'=>$post['point_hospital'],'Record[point_city]'=>$post['point_city'],'Record[age_start]'=>$post['age_start'],'Record[age_stop]'=>$post['age_stop'],'Record[sex]'=>$post['sex'],'Record[status]'=>$post['status'],'Record[start]'=>$post['start'],'Record[stop]'=>$post['stop'])),
	));?>
	<table class="contentTab listTab" width="100%">
		<tr>
			<td class="titleTd tal" colspan="20">患病儿童</td>
		</tr>
        <tr class="heightLight tal">
            <td class="tal"  colspan="20">
                <label for="Record_status"> 审核：</label>
                <select class="select" name="Record[status]" id="Record_status">
                    <option value=""    <?php echo $post['status']==''?'selected="selected"' : ''?>>全部</option>
                    <option value="1"   <?php echo $post['status']=='1'?'selected="selected"' : ''?>>已审核</option>
                    <option value="0"   <?$post['status']=='0'?'selected="selected"' : ''?>>未审核</option>
                </select>

                <label for="Record_sex"> 宝贝性别：</label>
                <select class="select" name="Record[sex]" id="Record_sex">
                    <option value=""    <?php echo $post['sex'] == '' ? 'selected="selected"' : '' ?>>全部</option>
                    <option value="男"   <?php echo $post['sex'] == '男' ? 'selected="selected"' : '' ?>>男</option>
                    <option value="女"   <? $post['sex'] == '女' ? 'selected="selected"' : '' ?>>女</option>
                </select>

                <label for="Record_city"> 来自城市：</label>
                <select class="select profile_sel2 profile_selcity0" id="city_sell0">
                    <option><?php echo $post['province']?></option>
                </select>
                <select class="select profile_sel2 profile_selcity1" id="city_sell">
                    <option><?php echo $post['city']?></option>
                </select>
                <input type="hidden" name="Record[province]" id="province_val" value="<?php echo $post['province']?>" />
                <input type="hidden" name="Record[city]" id="city_val" value="<?php echo $post['city']?>" />

                <label for="Record_point_city"> 医院城市：</label>
                <input hidden type="'text" name="Record[point_city]" id="Record_point_city" value="<?php echo $post['point_city']?>"/>
                <select class="select profile_sel profile_selcity" id="city_sel">
                    <option <?php echo $post['point_city'] == '请选择所在城市' ? 'selected="selected"' : '' ?>>请选择所在城市</option>
                    <option <?php echo $post['point_city'] == '北京' ? 'selected="selected"' : '' ?>>北京</option>
                    <option <?php echo $post['point_city'] == '沈阳' ? 'selected="selected"' : '' ?>>沈阳</option>
                    <option <?php echo $post['point_city'] == '大连' ? 'selected="selected"' : '' ?>>大连</option>
                    <option <?php echo $post['point_city'] == '哈尔滨' ? 'selected="selected"' : '' ?>>哈尔滨</option>
                    <option <?php echo $post['point_city'] == '长春' ? 'selected="selected"' : '' ?>>长春</option>
                    <option <?php echo $post['point_city'] == '天津' ? 'selected="selected"' : '' ?>>天津</option>
                    <option <?php echo $post['point_city'] == '郑州' ? 'selected="selected"' : '' ?>>郑州</option>
                    <option <?php echo $post['point_city'] == '西安' ? 'selected="selected"' : '' ?>>西安</option>
                    <option <?php echo $post['point_city'] == '重庆' ? 'selected="selected"' : '' ?>>重庆</option>
                    <option <?php echo $post['point_city'] == '上海' ? 'selected="selected"' : '' ?>>上海</option>
                    <option <?php echo $post['point_city'] == '杭州' ? 'selected="selected"' : '' ?>>杭州</option>
                    <option <?php echo $post['point_city'] == '南京' ? 'selected="selected"' : '' ?>>南京</option>
                    <option <?php echo $post['point_city'] == '深圳' ? 'selected="selected"' : '' ?>>深圳</option>
                    <option <?php echo $post['point_city'] == '广州' ? 'selected="selected"' : '' ?>>广州</option>
                    <option <?php echo $post['point_city'] == '武汉' ? 'selected="selected"' : '' ?>>武汉</option>
                    <option <?php echo $post['point_city'] == '长沙' ? 'selected="selected"' : '' ?>>长沙</option>
                    <option <?php echo $post['point_city'] == '青海' ? 'selected="selected"' : '' ?>>青海</option>
                </select>
                <label for="Record_point_hospital"> 推荐医院：</label>
                <input hidden type="'text" name="Record[point_hospital]" id="Record_point_hospital" value="<?php echo $post['point_hospital']?>"/>
                <select class="select profile_sel profile_selhosp city">
                    <option><?php echo $post['point_hospital']?></option>
                    <option>请选择推荐医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>首都儿童医院附属北京儿童医院</option>
                    <option>首都儿科研究所</option>
                    <option>北京大学附属第一医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>中国医科大学附属盛京医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>大连市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>哈尔滨市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>长春市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>天津市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>郑州市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>西安市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>重庆医科大学附属儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>复旦大学附属华山医院</option>
                    <option>复旦大学附属儿科医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>浙江省中医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>中国医学科学院皮肤病医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>深圳市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>广州市儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>武汉市第一医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>湖南省儿童医院</option>
                </select>
                <select class="select profile_sel profile_selhosp city" style="display:none">
                    <option>请选择推荐医院</option>
                    <option>青海省妇女儿童医院</option>
                </select>
            </td>
        </tr>
        <tr class="heightLight">
            <td class="tal"    colspan="20">
                <label for="Record_age_start"> 宝贝年龄：</label>
                <input value="<?php echo isset($post['age_start'])?$post['age_start'] : ''?>" name="Record[age_start]" id="Record_age_start" type="text" class="small-button"> -
                <input value="<?php echo isset($post['age_stop'])?$post['age_stop'] : ''?>" name="Record[age_stop]" id="Record_age_stop" type="text" class="small-button">

                <label for="Record_start"> 起始时间：</label><input value="<?php echo $post['start']?$post['start'] : ''?>" name="Record[start]" id="Record_start" type="text" class="button" onClick="WdatePicker()" >
                <label for="Record_stop"> 结束时间：</label><input value="<?php echo $post['stop']?$post['stop'] : ''?>" name="Record[stop]" id="Record_stop" type="text" class="button" onClick="WdatePicker()">
                <input class="button" onclick="formSubmit('<?php echo Yii::app()->createUrl('/admin/record/select')?>')" name="yt0" type="button" value="筛选">
                <input class="button" onclick="formSubmit('<?php echo Yii::app()->createUrl('/admin/record/export')?>')" name="yt0" type="button" value="导出">
            </td>
        </tr>
		<?php
			if(Yii::app()->user->hasFlash('submit')){
				echo '<tr><td class="leftTd" colspan="14"><p class="submitInfo">'.Yii::app()->user->getFlash('submit').'</p></td></tr>';
			}
		?>
		<tr>
			<th class="leftTd" width="20"><?php echo CHtml::checkBox('',false,array('class'=>'checkAll'))?></th>
			<th>id</th>
            <th>宝贝姓名</th>
            <th>宝贝年龄</th>
            <th>宝贝性别</th>
            <th>电话</th>
            <th>来自城市</th>
            <th>推荐医院</th>
            <th>头像</th>
			<th colspan="3">患处</th>
            <th>病例</th>
			<th><?php echo $form->labelEx($model,'createtime'); ?></th>
			<th><?php echo $form->labelEx($model,'status'); ?></th>
			<th>操作</th>
		</tr>
		<?php foreach($data as $key=>$item){ ?>
			<tr>
				<td class="leftTd"><?php echo CHtml::checkBox('id[]',false,array('value'=>$item->uid))?></td>
				<td width="30"><?php echo $item->uid;?></td>
                <td width="50"><?php echo isset($item->baby->name) ? $item->baby->name : '' ?></td>
                <td width="50"><?php echo isset($item->baby->birthday) ? Drtool::age($item->baby->birthday) : '' ?></td>
                <td width="50"><?php echo isset($item->baby->sex) ? $item->baby->sex : '' ?></td>
                <td width="110"><?php echo isset($item->baby->tel) ? $item->baby->tel : '' ?></td>
                <td width="50"><?php echo isset($item->baby->city) ? $item->baby->city : '' ?></td>
                <td><?php echo (isset($item->baby->point_city) ? $item->baby->point_city.'：' : '') . (isset($item->baby->point_hospital) ? $item->baby->point_hospital : '') ?></td>
                <td width="60" id="<?php echo 'gallery_'.$key?>"><?php echo $item->avatar!=''?('<a href="'.Yii::app()->baseUrl.str_replace('_thumb','',$item->avatar).'">'.CHtml::image(Yii::app()->baseUrl.$item->avatar,$item->uid,array('height'=>'40px')).'</a>'):'';?></td>
                <td width="60" id="<?php echo 'gallery_'.$key?>"><?php echo $item->photo1!=''?('<a href="'.Yii::app()->baseUrl.str_replace('_thumb','',$item->photo1).'">'.CHtml::image(Yii::app()->baseUrl.$item->photo1,$item->uid,array('height'=>'40px')).'</a>'):'';?></td>
				<td width="60" id="<?php echo 'gallery_'.$key?>"><?php echo $item->photo2!=''?('<a href="'.Yii::app()->baseUrl.str_replace('_thumb','',$item->photo2).'">'.CHtml::image(Yii::app()->baseUrl.$item->photo2,$item->uid,array('height'=>'40px')).'</a>'):'';?></td>
                <td width="60" id="<?php echo 'gallery_'.$key?>"><?php echo $item->photo3!=''?('<a href="'.Yii::app()->baseUrl.str_replace('_thumb','',$item->photo3).'">'.CHtml::image(Yii::app()->baseUrl.$item->photo3,$item->uid,array('height'=>'40px')).'</a>'):'';?></td>
                <td width="60" id="<?php echo 'gallery_'.$key?>"><?php echo $item->case!=''?('<a href="'.Yii::app()->baseUrl.str_replace('_thumb','',$item->case).'">'.CHtml::image(Yii::app()->baseUrl.$item->case,$item->uid,array('height'=>'40px')).'</a>'):'';?></td>
<!--				<td>--><?php //echo CHtml::link($item->uid,array('/admin/record/edit/','id'=>$item->uid)); ?><!--</td>-->
<!--				<td>--><?php //echo $item->comment_number;?><!--</td>-->
				<td width="110"><?php echo date("Y-m-d H:i",$item->createtime);?></td>
				<?php $audit = $item->status==1?'<img src="'.yii::app()->baseUrl.'/style/admin/images/audit.gif">':'<img src="'.yii::app()->baseUrl.'/style/admin/images/unaudit.gif">';?>
				<td width="60"><?php echo CHtml::link($audit,array('/admin/record/audit/','id'=>$item->uid,'Record[sex]'=>$post['sex'],'Record[city]'=>$post['city'],'Record[province]'=>$post['province'],'Record[point_hospital]'=>$post['point_hospital'],'Record[point_city]'=>$post['point_city'],'Record[status]'=>$post['status'],'Record[age_start]'=>$post['age_start'],'Record[age_stop]'=>$post['age_stop'],'Record[start]'=>$post['start'],'Record[stop]'=>$post['stop'],'page'=>$post['pageNum'])); ?></td>
				<td width="40">
                    <?php echo CHtml::link('查看',array('/admin/record/info/','id'=>$item->uid),array('target'=>"_blank")); ?>
<!--                    --><?php //echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/edit.gif">',array('/admin/record/edit/','id'=>$item->uid)); ?>
<!--                    --><?php //echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/del.gif">',array('/admin/record/delete/','id'=>$item->uid),array('class'=>'delete','id'=>$item->uid)); ?>
                </td>
			</tr>
		<?php }?>
		<tr>
			<td class="pageTd" colspan="16">
				<div class="action">
					<?php echo CHtml::submitButton('批量审核',array('class'=>'button'));?>
					<?php echo CHtml::Button('批量未审核',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/record/unAuditAll/',array('page'=>$post['pageNum'],'Record[city]'=>$post['city'],'Record[province]'=>$post['province'],'Record[point_hospital]'=>$post['point_hospital'],'Record[point_city]'=>$post['point_city'],'Record[sex]'=>$post['sex'],'Record[status]'=>$post['status'],'Record[age_start]'=>$post['age_start'],'Record[age_stop]'=>$post['age_stop'],'Record[start]'=>$post['start'],'Record[stop]'=>$post['stop'])).'","")'));?>
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
<script>
    $(document).ready(function() {
        var count=<?php echo count($data);?>;
        for(i=0;i<count;i++)
        {
            $('#gallery_'+ i +' img').fsgallery();
        }
    })
</script>