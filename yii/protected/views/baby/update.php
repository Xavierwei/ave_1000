<div class="profile">
    <div class="profile_form">
        <div class="profile_formpho">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $record= $record ? $record->avatar : '/images/make_updemo.jpg'?>" />
                <div class="make_phobg make_phobg2"></div>
            </div>
        </div>
        <div class="profile_fromcom">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'baby-update-form',
                'enableAjaxValidation'=>false,
            )); ?>
            <?php echo $form->textField($model,'name',array('class'=>'profile_ipt profile_name')); ?>
            <?php echo $form->textField($model,'city',array('class'=>'profile_ipt profile_city')); ?>
            <?php echo $form->textField($model,'nickname',array('class'=>'profile_ipt profile_nick')); ?>
            <?php echo $form->textField($model,'address',array('class'=>'profile_ipt profile_add')); ?>
            <?php echo $form->textField($model,'sex',array('class'=>'profile_ipt profile_sex')); ?>
            <?php echo $form->textField($model,'tel',array('class'=>'profile_ipt profile_tel')); ?>
            <p class="profile_seltxt profile_selyear_txt"><?=$model->birthday == '0000-00-00 00:00:00' ? date('Y') : substr($model->birthday,0,4)?></p>
            <select name="Baby[year]"  class="profile_sel profile_selyear" id="year" onfocus="years('year',new Date().getFullYear()),change_date()" onchange="change_date()">
                <option><?=$model->birthday == '0000-00-00 00:00:00' ? date('Y') : substr($model->birthday,0,4)?></option>
            </select>

            <p class="profile_seltxt profile_selmon_txt"><?=$model->birthday == '0000-00-00 00:00:00' ? date('mm') : substr($model->birthday,5,2)?></p>
            <select name="Baby[mon]" class="profile_sel profile_selmon" id="month" onfocus="months(),change_date()" onchange="change_date()">
                <option><?=$model->birthday == '0000-00-00 00:00:00' ? date('mm') : substr($model->birthday,5,2)?></option>
            </select>

            <p class="profile_seltxt profile_selday_txt"><?=$model->birthday == '0000-00-00 00:00:00' ? date('dd') : substr($model->birthday,8,2)?></p>
            <select name="Baby[day]" class="profile_sel profile_selday" id="date">
                <option><?=$model->birthday == '0000-00-00 00:00:00' ? date('dd') : substr($model->birthday,8,2)?></option>
            </select>
        </div>
    </div>
    <!--  -->
    <div class="profile_txt">
        <div class="profile_txttit">
            <h1>您为何希望加入“千家万护”行动？</h1>
            <p>欢迎写下您的原因、描述宝宝病情或私人感想，增进我们对患病宝宝与您家庭的了解。</p>
        </div>
        <div class="profile_txtcom">
            <?php echo $form->textArea($model,'reason',array('class'=>'profile_txtcom')); ?>
        </div>
    </div>
    <!--  -->
    <div class="profile_hosp">
        <p class="profile_seltxt profile_selcity_txt"><?=$model->point_city ? $model->point_city : '北京'?></p>
        <select name="Baby[point_city]"  class="profile_sel profile_selcity" id="city_sel">
            <option>北京</option>
            <option>沈阳</option>
            <option>大连</option>
            <option>哈尔滨</option>
            <option>长春</option>
            <option>天津</option>
            <option>郑州</option>
            <option>西安</option>
            <option>重庆</option>
            <option>上海</option>
            <option>杭州</option>
            <option>南京</option>
            <option>深圳</option>
            <option>广州</option>
            <option>武汉</option>
            <option>长沙</option>
            <option>青海</option>
        </select>
        <p class="profile_seltxt profile_selhosp_txt"><?=$model->point_hospital ? $model->point_hospital : '北京儿童医院'?></p>
        <div class="city_selcom">
            <input hidden type="'text" name="Baby[point_hospital]" id="Baby_point_hospital" value="<?=$model->point_hospital ? $model->point_hospital : '北京儿童医院'?>"/>
            <select  class="profile_sel profile_selhosp city" >
                <option>北京儿童医院</option>
                <option>首都儿研所</option>
                <option>北大医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>中国医大盛京医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>大连儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>哈尔滨儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>长春儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>天津儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>郑州儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>西安市儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>重庆儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>华山医院</option>
                <option>复旦大学附属儿科医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>浙江省中医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>中国医学科学院皮肤病医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>深圳儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>广州儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>武汉第一人民医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>湖南省儿童医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
                <option>青海省儿童医院</option>
            </select>
        </div>
    </div>
    <a href="javascript:void(0)" class="profile_btn"></a>
    <?php $this->endWidget(); ?>
    <!--  -->
</div>
<script src="<?=Yii::app()->baseUrl.'/'?>js/days.js"></script>
<script>
    $(document).ready(function(){
        $(".profile_btn").click(function(){
                $("#baby-update-form").submit();
            });
        });
</script>