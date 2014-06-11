<div class="home" data-style="opacity:0;" data-animate="opacity:1;" data-delay="500" data-time="500">
    <!-- home_new -->
    <div class="sec_homebar sec_homebar2">
        <div class="sec_homebar_con">雅漾携手中国医师协会皮肤科医师分会（CDA），展开雅漾“1000Families·湿疹儿童优享乐生活”关爱行动，为一千名湿疹儿童免费送上湿疹护理套装，携爱助力儿童家庭。</div>
        <a href="<?=Yii::app()->createUrl('/about/')?>"></a>
    </div>

    <!--  -->
    <div class="sec_homefm" data-style="opacity:0;" data-animate="opacity:1;" data-delay="800" data-time="500">
        <div class="hometip">
            <div class="homefm_mun2"><?=$visitCount?></div>
            <div class="homefm_mun"><?=$recordCount?></div>
            <a href="<?=Yii::app()->createUrl('/information/update')?>" class="homefm_btn1"  title="立即申请"></a>
            <a href="#" class="homefm_btn2"  title="分享到微博"></a>
            <p class="homefm_listbtn popshow"></p>
        </div>
        <div class="home_case">

            <ul id="mycarousel" class="jcarousel-skin-tango">
                <?php if($record):?>
                    <?php foreach($record as $key => $value):?>
                        <li class="home_caseli"><a href="<?=Yii::app()->createUrl('/record/otherinfo/',array('id'=>$value->uid))?>" title="查看更多"><img src="<?=Yii::app()->baseUrl . ($value->sex == '男' ? '/images/defaultAvatar/boy_' . rand(1,2) . '.jpg' :  '/images/defaultAvatar/girl_' . rand(1,2) . '.jpg' );?>" width="211" height="252" /></a></li>
                    <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
            </ul>
            <div class="home_casestit"></div>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <div class="section sec_home2 cs-clear">
        <div class="home_carefor home_infor" data-style="opacity:0;" data-animate="opacity:1;" data-delay="1100" data-time="500">
            <h2><a href="<?=Yii::app()->createUrl('/care/')?>">雅漾关怀</a></h2>
            <a href="<?=Yii::app()->createUrl('/care/')?>" class="home_more"></a>
            <div class="home_infopop">
                <div class="home_carefor_share"></div>
                <div class="home_carefor_txt">为了每个孩子的清澈笑容，雅漾一直致力于特应性皮炎儿童的护理，并携手中国医师协会皮肤科医师分会，设立首家面向中国特应性患儿及家长的免费教育课堂“雅漾特应性皮炎之家”及国内首个特应性皮炎基金会“特应性皮炎基金会”。</div>
            </div>
        </div>
        <div class="home_about home_infor" data-style="opacity:0;" data-animate="opacity:1;" data-delay="1300" data-time="500">
            <h2><a href="<?=Yii::app()->createUrl('/about/')?>">关于湿疹</a></h2>
            <a href="<?=Yii::app()->createUrl('/about/')?>" class="home_more"></a>
            <div class="home_infopop">
                <div class="home_about_share"></div>
                <div class="home_about_txt">什么是湿疹？湿疹与特应性皮炎如何区分？如何诊断是否已患有湿疹？点击了解更多信息。</div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="section sec_home3 home_baike home_infor" data-style="opacity:0;" data-animate="opacity:1;" data-delay="1400" data-time="500">
        <h2><a href="<?=Yii::app()->createUrl('/guide/')?>">湿疹百科</a></h2>
        <a href="<?=Yii::app()->createUrl('/guide/')?>" class="home_more"></a>
        <div class="home_baike_title">护理<span>湿疹</span>不容忽视的<span>14</span>个问题，<br />简单易行的科学<span>护理方法</span>及权威<span>专家问答</span>。</div>
        <div class="home_infopop">
            <div class="home_baike_share"></div>
            <div class="home_baike_txt">围绕十四个重要关键词，为父母提供常见问题回答与简单易行建议。</div>
        </div>
    </div>
</div>
<div class="popshare"></div>
<div class="pop home_pop">
    <div class="popclose"></div>
    <div class="home_popcom">
        <h2>所有参与家庭</h2>

        <div class="homepopfm_list cs-clear">
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
        </div>
    </div>
</div>