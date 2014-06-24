<div class="home" data-style="opacity:0;" data-animate="opacity:1;" data-delay="500" data-time="500">
    <!-- home_new -->
    <div class="sec_homebar sec_homebar2">
        <div class="sec_homebar_con">雅漾携手中国医师协会皮肤科医师分会（CDA），正式启动雅漾“1000Families·湿疹儿童优享乐生活”关爱行动，为一千名湿疹儿童免费送上湿疹护理套装，携爱助力儿童家庭。</div>
        <a href="<?=Yii::app()->createUrl('/site/activity/')?>"></a>
    </div>

    <!--  -->
    <div class="sec_homefm" data-style="opacity:0;" data-animate="opacity:1;" data-delay="800" data-time="500">
        <div class="hometip">
            <div class="homefm_mun2"><?=$visitCount?></div>
            <div class="homefm_mun"><?=$recordCount?></div>
            <a href="<?=Yii::app()->createUrl('/information/update')?>" class="homefm_btn1"  title="立即申请"></a>
            <a href="http://service.weibo.com/share/share.php?title=%e4%bd%a0%e7%9f%a5%e9%81%93%e5%90%97%ef%bc%8c%e4%b8%8d%e6%98%af%e6%89%80%e6%9c%89%e7%9a%84%e7%97%92%e9%83%bd%e8%83%bd%e5%88%9b%e9%80%a0%e7%ac%91%e5%a3%b0http%3a%2f%2ft.cn%2fRvLmPUd+%e7%9c%8b%e4%ba%86%e8%a7%86%e9%a2%91%e6%89%8d%e7%9f%a5%e9%81%93%ef%bc%8c%e4%b8%ad%e5%9b%bd%e6%ad%a3%e6%9c%89%e6%95%b0%e7%99%be%e4%b8%87%e5%84%bf%e7%ab%a5%e6%ad%a3%e5%9c%a8%e5%bf%8d%e5%8f%97%e6%b9%bf%e7%96%b9%e6%89%80%e5%b8%a6%e6%9d%a5%e7%9a%84%e7%98%99%e7%97%92%e5%92%8c%e7%97%9b%e8%8b%a6%ef%bc%8c%e4%bb%96%e4%bb%ac%e9%9c%80%e8%a6%81%e4%bd%a0%e7%9a%84%e5%85%b3%e6%80%80%e4%b8%8e%e6%94%af%e6%8c%81%ef%bc%81%e9%9b%85%e6%bc%be%e6%90%ba%e6%89%8bCDA%ef%bc%8c%e5%8d%b3%e5%b0%86%e5%90%af%e5%8a%a8%231000Families%23%e8%a1%8c%e5%8a%a8%ef%bc%8c%e8%ae%a9%e6%b9%bf%e7%96%b9%e5%84%bf%e7%ab%a5%e4%bc%98%e4%ba%ab%e4%b9%90%e7%94%9f%e6%b4%bb%e3%80%82%e7%ab%8b%e5%8d%b3%e7%99%bb%e5%bd%95%e7%bd%91%e7%ab%99%ef%bc%9ahttp%3a%2f%2ft.cn%2fRvwx3b6&amp;pic=http://www.eau-thermale-avene.cn/eczemakids/weibo-banner.jpg&amp;appkey=4266983005" target="_blank" class="homefm_btn2"  title="分享到微博"></a>
            <div class="homefm_listbtn">
                <div class="popshow_list"></div>
                <div class="popshow_rule"></div>
            </div>
        </div>
        <div class="home_case">

            <ul id="mycarousel" class="jcarousel-skin-tango">
                <?php if($record):?>
                    <?php foreach($record as $key => $value):?>
                        <li class="home_caseli">
                            <a href="<?=Yii::app()->createUrl('/record/otherinfo/',array('id'=>$value->uid))?>" title="查看更多">
                                <img class="avatar" src="<?=Yii::app()->baseUrl . ($value->sex == '男' ? '/images/defaultAvatar/boy_' . rand(1,2) . '.png' :  '/images/defaultAvatar/girl_' . rand(1,2) . '.png' );?>"  />
                                <div class="over_avatar"></div>
                                <div class="info">
                                    <p><?=$value->nickname;?></p>
                                    <p><?=$value->sex;?></p>
                                    <p>来自: <?=$value->city;?></p>
                                </div>
                            </a>
                        </li>
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
        <h2><a href="<?=Yii::app()->createUrl('/guide/')?>">湿疹护理</a></h2>
        <a href="<?=Yii::app()->createUrl('/guide/')?>" class="home_more"></a>
        <div class="home_baike_title">护理<span>湿疹</span>不容忽视的<span>14</span>个问题，<br />简单易行的科学<span>护理方法</span>及权威<span>专家问答</span>。</div>
        <div class="home_infopop">
            <div class="home_baike_share"></div>
            <div class="home_baike_txt">围绕十四个重要关键词，为父母提供常见问题回答与简单易行建议。</div>
        </div>
    </div>
</div>
<div class="popshare"></div>
<div class="pop home_pop" id="pop_list">
    <div class="popclose"></div>
    <div class="home_popcom">
        <h2>所有参与家庭</h2>
        <div class="homepopfm_list cs-clear">
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
            <p class="cs-clear"><span>某某某</span><span>2岁</span><span>上海</span></p>
        </div>
    </div>
</div>
<div class="pop home_pop" id="pop_rule">
    <div class="popclose"></div>
    <div class="home_popcom">
        <h2>活动规则</h2>
        <div>

        </div>
    </div>
</div>