<?php
    $update = @$_GET['update'];
?>
<div class="careword">
    <div class="careword_com <?=$update==1?'careword_com_update':''?>">
        <div class="careword_pho">
            <img src="<?=Yii::app()->baseUrl . ($record ? str_replace('.jpg','_thumb.jpg',$record->avatar) : '/images/video_demo.jpg')?>" />
            <div class="careword_phobg"></div>
        </div>
        <h2>我的电子个人档案</h2>
        <div class="careword_comtxt">
            <p><?=$baby->nickname?></p>
            <p><?=Drtool::age($baby->birthday)?>岁，<?=$baby->sex?></p>
            <p>来自<?=$baby->city?></p>
            <?php if($baby->point_hospital):?>
            <p>由<?=$baby->point_hospital?>推荐</p>
            <?php endif;?>
        </div>
    </div>
    <div class="careword_mess">
            <div class="careword_messtxt1"><?=mb_substr( $baby->reason, 0, 164, 'utf-8' ) ?></div>
        <?php if(mb_strlen( $baby->reason,'utf-8' ) > 164 ):?>
            <div class="careword_messtxt2"><?=mb_substr( $baby->reason, 164, 164, 'utf-8' ) . (mb_strlen( $baby->reason,'utf-8' ) > 164*2 ? '...' : '' )?></div>
        <?php endif;?>

        <div class="myinfo_title"></div>
        <div class="myinfo_product"></div>
	    <a href="<?=Yii::app()->createUrl('guide')?>" class="myinfo_btn1"><img src="<?=Yii::app()->baseUrl?>/images/myinfo_btn.png" /></a>
	    <a target="_blank" href="http://service.weibo.com/share/share.php?title=%231000Families%23%e4%bd%a0%e7%9f%a5%e9%81%93%e5%90%97%ef%bc%8c%e5%9c%a8%e4%b8%ad%e5%9b%bd%e6%ad%a3%e6%9c%89%e6%95%b0%e7%99%be%e4%b8%87%e5%84%bf%e7%ab%a5%e5%92%8c%e5%ae%b6%e5%ba%ad%e6%ad%a3%e5%9c%a8%e5%bf%8d%e5%8f%97%e6%b9%bf%e7%96%b9%e6%89%80%e5%b8%a6%e6%9d%a5%e7%9a%84%e7%97%9b%e8%8b%a6%e3%80%82%e9%9b%85%e6%bc%be%e5%8f%91%e8%b5%b7%e2%80%9c%e5%8d%83%e5%ae%b6%e4%b8%87%e6%8a%a4%e2%80%9d%e5%85%b3%e7%88%b1%e8%a1%8c%e5%8a%a8%ef%bc%8c%e4%b8%ba1000%e5%90%8d%e6%b9%bf%e7%96%b9%e5%84%bf%e7%ab%a5%e5%85%8d%e8%b4%b9%e9%80%81%e4%b8%8a%e4%bb%b7%e5%80%bc2500%e5%85%83%e7%9a%84%e6%b9%bf%e7%96%b9%e6%8a%a4%e7%90%86%e5%a5%97%e8%a3%85%e3%80%82%e6%ac%a2%e8%bf%8e%e7%82%b9%e5%87%bb%e9%93%be%e6%8e%a5%e5%85%b3%e6%b3%a8%e6%b4%bb%e5%8a%a8%ef%bc%8c%e4%ba%86%e8%a7%a3%e6%9b%b4%e5%a4%9a%e6%b4%bb%e5%8a%a8%e4%bf%a1%e6%81%af%ef%bc%8c%e7%bb%99%e4%ba%88%e6%b9%bf%e7%96%b9%e5%84%bf%e7%ab%a5%e4%b8%80%e4%bb%bd%e5%85%b3%e6%80%80%e4%b8%8e%e6%94%af%e6%8c%81%ef%bc%9ahttp%3a%2f%2ft.cn%2fRvwx3b6&amp;pic=http://www.eau-thermale-avene.cn/eczemakids/weibo-banner2.jpg&amp;appkey=4266983005" class="myinfo_btn2"><img src="<?=Yii::app()->baseUrl?>/images/myinfo_btn2.png" /></a>
    </div>
    <?php if(!$update):?>
    <div class="careword_link">
        <a href="<?=Yii::app()->createUrl('record/update')?>" class="careword_link1">修改信息</a>
        <a href="javascript:void(0)" class="careword_link2 popshow">申请状态查询</a>
    </div>
    <?php endif;?>

</div>
<div class="popshare"></div>
<div class="pop pop2">
    <div class="popclose"></div>
    <div class="care_popcom">
        <?php if($record->status!=0):?>
            <h2>请继续关注获得更多信息。</h2>
            <p>您已入选“千家万护”活动家庭，雅漾工作人员将及时与您取得联系</p>
        <?php else:?>
            <h2>您的宝贝信息正在审核中...</h2>
            <p>您已成功申请，入选名单将在本网站公布，敬请关注。</p>
        <?php endif;?>
    </div>
</div>