
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'baby-update-form',
    'enableAjaxValidation'=>false,
)); ?>
<div class="profile">
    <div class="profile_form">
        <div class="profile_formpho">
            <div class="make_pho">
                <img src="<?=Yii::app()->baseUrl . $record= $record ? str_replace('.jpg','_thumb.jpg',$record->avatar) : '/images/make_updemo.jpg'?>" />
                <div class="make_phobg make_phobg2"></div>
            </div>
        </div>
        <div class="profile_fromcom">
            <?php echo $form->textField($model,'name',array('class'=>'profile_ipt profile_name')); ?>
            <p class="profile_seltxt profile_selcity_txt1">选择</p>
            <select name="Baby[city]"  class="profile_sel profile_selcity1" id="city_sel">
                <option value="北京">北京市</option>
                <option value="浙江省">浙江省</option>
                <option value="天津市">天津市</option>
                <option value="安徽省">安徽省</option>
                <option value="上海市">上海市</option>
                <option value="福建省">福建省</option>
                <option value="重庆市">重庆市</option>
                <option value="江西省">江西省</option>
                <option value="山东省">山东省</option>
                <option value="河南省">河南省</option>
                <option value="湖北省">湖北省</option>
                <option value="湖南省">湖南省</option>
                <option value="广东省">广东省</option>
                <option value="海南省">海南省</option>
                <option value="山西省">山西省</option>
                <option value="青海省">青海省</option>
                <option value="江苏省">江苏省</option>
                <option value="辽宁省">辽宁省</option>
                <option value="吉林省">吉林省</option>
                <option value="台湾省">台湾省</option>
                <option value="河北省">河北省</option>
                <option value="贵州省">贵州省</option>
                <option value="四川省">四川省</option>
                <option value="云南省">云南省</option>
                <option value="陕西省">陕西省</option>
                <option value="甘肃省">甘肃省</option>
                <option value="黑龙江省">黑龙江省</option>
                <option value="香港特别行政区">香港特别行政区</option>
                <option value="澳门特别行政区">澳门特别行政区</option>
                <option value="广西壮族自治区">广西壮族自治区</option>
                <option value="宁夏回族自治区">宁夏回族自治区</option>
                <option value="新疆维吾尔自治区">新疆维吾尔自治区</option>
                <option value="内蒙古自治区">内蒙古自治区</option>
                <option value="西藏自治区">西藏自治区</option>
            </select>

            <?php echo $form->textField($model,'nickname',array('class'=>'profile_ipt profile_nick')); ?>
            <?php echo $form->textField($model,'address',array('class'=>'profile_ipt profile_add')); ?>
            <p class="profile_seltxt profile_selsex_txt">男</p>
            <select name="Baby[point_sex]"  class="profile_sel profile_selsex" id="sex_sel">
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
            <?php echo $form->textField($model,'tel',array('class'=>'profile_ipt profile_tel')); ?>
            <p class="profile_seltxt profile_selyear_txt"><?=$model->birthday == '0000-00-00 00:00:00' ? date('Y') : substr($model->birthday,0,4)?></p>
            <select name="Baby[year]"  class="profile_sel profile_selyear" id="year" onfocus="years('year',new Date().getFullYear()+1),change_date()" onchange="change_date()">
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
            <h1>家长留言</h1>
            <p>欢迎写下您的原因、描述孩子病情或私人感想，增进我们对患病孩子与您家庭的了解。</p>
        </div>
        <div class="profile_txtcom">
            <?php echo $form->textArea($model,'reason',array('class'=>'profile_txtcom', 'placeholder'=>'可备注关于湿疹的其他个人信息，如儿童患病时间、具体症状、特殊情况等。')); ?>
        </div>
    </div>
    <!--  -->
    <div class="profile_hosp">
        <p class="profile_seltxt profile_selcity_txt"><?=$model->point_city ? $model->point_city : '请选择所在城市'?></p>
        <select name="Baby[point_city]"  class="profile_sel profile_selcity" id="city_sel">
            <option>请选择所在城市</option>
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
        <p class="profile_seltxt profile_selhosp_txt">请选择推荐医院</p>
        <div class="city_selcom">
            <input hidden type="'text" name="Baby[point_hospital]" id="Baby_point_hospital" value="<?=$model->point_hospital ? $model->point_hospital : ''?>"/>
            <select  class="profile_sel profile_selhosp city" >
                <option>请选择推荐医院</option>
            </select>
            <select  class="profile_sel profile_selhosp city" style="display:none">
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
    <input class="profile_btn" type="submit" />
    <!--  -->
</div>
<?php $this->endWidget(); ?>
<script src="<?=Yii::app()->baseUrl.'/'?>js/days.js"></script>
