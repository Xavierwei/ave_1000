<div class="headContent">
	<div class="headInner">
		<div class="headLogo"><img src="<?php echo yii::app()->baseUrl;?>/style/admin/images/headLogo.png" alt="avene"></div>
		<ul class="nav">
			<?php foreach(Yii::app()->params['menu'] as $key=>$item){
                $current = $key==0? 'class="current"':''; 
				echo '<li '.$current.' com="'.$item[0]['com'].'" rel="'.Yii::app()->createUrl('admin/'.$item[0]['com']).'">'.$item[0]['name'].'</li>';
			}?>
		</ul>
		<div class="sessionInfo"><?php echo CHtml::link('退出','',array('class'=>'logout','href'=>Yii::app()->createUrl('admin/manage/logout'))); ?></div>
	</div>
</div>