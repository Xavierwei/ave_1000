
<div class="activity_step"><img src="<?php echo Yii::app()->baseUrl?>/images/step4.png" /></div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'baby-update-form',
    'enableAjaxValidation'=>false,
)); ?>
<div class="profile">
    <div class="profile_form">
        <div class="profile_formpho">
            <div class="make_pho">
                <img src="<?php echo Yii::app()->baseUrl . $record= $record ? $record->avatar : '/images/make_updemo.jpg'?>" />
                <div class="make_phobg make_phobg2"></div>
            </div>
        </div>
        <div class="profile_fromcom">
            <?php echo $form->textField($model,'name',array('class'=>'profile_ipt profile_name')); ?>
            <p class="profile_seltxt profile_selcity_txt0">选择</p>
            <select class="profile_sel2 profile_selcity0" id="city_sel0">
            </select>
            <p class="profile_seltxt profile_selcity_txt1">选择</p>
            <select class="profile_sel2 profile_selcity1" id="city_sel">
            </select>
            <input type="hidden" name="Baby[city]" id="city_val" value="<?php echo $model->city;?>" />

            <?php echo $form->textField($model,'nickname',array('class'=>'profile_ipt profile_nick')); ?>
            <?php echo $form->textField($model,'address',array('class'=>'profile_ipt profile_add')); ?>
            <p class="profile_seltxt profile_selsex_txt">男</p>
            <select name="Baby[sex]"  class="profile_sel profile_selsex" id="sex_sel">
                <option selected="selected" value="男">男</option>
                <option value="女">女</option>
            </select>
            <?php echo $form->textField($model,'tel',array('class'=>'profile_ipt profile_tel')); ?>

            <?php echo $form->textField($model,'parent',array('class'=>'profile_ipt profile_parent')); ?>
            <p class="profile_seltxt profile_selyear_txt"><?php echo $model->birthday == '0000-00-00 00:00:00' ? date('Y') : substr($model->birthday,0,4)?></p>
            <select name="Baby[year]"  class="profile_sel profile_selyear" id="year">
                <option selected="selected" value="<?php echo $model->birthday == '0000-00-00 00:00:00' ? date('mm') : substr($model->birthday,5,2)?>"><?php echo $model->birthday == '0000-00-00 00:00:00' ? date('Y') : substr($model->birthday,0,4)?></option>
                <option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option>
            </select>

            <p class="profile_seltxt profile_selmon_txt"><?php echo $model->birthday == '0000-00-00 00:00:00' ? date('mm') : substr($model->birthday,5,2)?></p>
            <select name="Baby[mon]" class="profile_sel profile_selmon" id="month">
                <option selected="selected" value="<?php echo $model->birthday == '0000-00-00 00:00:00' ? date('mm') : substr($model->birthday,5,2)?>"><?php echo $model->birthday == '0000-00-00 00:00:00' ? date('mm') : substr($model->birthday,5,2)?></option>
                <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
            </select>

            <p class="profile_seltxt profile_selday_txt"><?php echo $model->birthday == '0000-00-00 00:00:00' ? date('dd') : substr($model->birthday,8,2)?></p>
            <select name="Baby[day]" class="profile_sel profile_selday" id="date">
                <option selected="selected" value="<?php echo $model->birthday == '0000-00-00 00:00:00' ? date('dd') : substr($model->birthday,8,2)?>"><?php echo $model->birthday == '0000-00-00 00:00:00' ? date('dd') : substr($model->birthday,8,2)?></option>
                <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
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
            <?php echo $form->textArea($model,'reason',array('class'=>'profile_txtcom', 'value'=>'希望通过这次活动能让我的孩子早日康复')); ?>
        </div>
    </div>
    <!--  -->
    <div class="profile_hosp">
	    <div class="make_check"></div>
        <div class="profile_hosp_mask"></div>
        <input hidden type="'text" name="Baby[point_city]" id="Baby_point_city" value="<?php echo $model->point_city ? $model->point_city : ''?>"/>
        <p class="profile_seltxt profile_selcity_txt"><?php echo $model->point_city ? $model->point_city : '请选择所在城市'?></p>
        <select  class="profile_sel profile_selcity" id="city_sel">
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
        <p class="profile_seltxt profile_selhosp_txt"><?php echo $model->point_hospital ? $model->point_hospital : '请选择推荐医院'?></p>
        <div class="city_selcom">
            <input hidden type="'text" name="Baby[point_hospital]" id="Baby_point_hospital" value="<?php echo $model->point_hospital ? $model->point_hospital : ''?>"/>
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
<script src="<?php echo Yii::app()->baseUrl.'/'?>js/days.js"></script>
