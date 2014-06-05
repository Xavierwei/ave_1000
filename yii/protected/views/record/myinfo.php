<div class="careword">
    <div class="careword_com">
        <div class="careword_pho">
            <img src="<?=Yii::app()->baseUrl . ($record ? $record->avatar : '/images/video_demo.jpg')?>" />
            <div class="careword_phobg"></div>
        </div>
        <h2>我的电子个人档案</h2>
        <div class="careword_comtxt">
            <p><?=$baby->nickname?></p>
            <p><?=Drtool::age($baby->birthday)?>岁，<?=$baby->sex?></p>
            <p>来自<?=$baby->city?></p>
            <p>建议到<?=$baby->point_hospital?></p>
        </div>
    </div>
    <div class="careword_mess">
        <div class="careword_messtxt1"><?=$baby->reason?></div>
        <div class="careword_messtxt2"><?=$baby->reason?></div>
    </div>
    <div class="careword_link">
        <a href="<?=Yii::app()->createUrl('record/update')?>" class="careword_link1">修改信息</a>
        <a href="javascript:void(0)" class="careword_link2 popshow">申请状态查询</a>
    </div>
    <div class="careword_btn cs-clear">
        <a href="#" class="careword_btn1" title="查看产品"></a>
        <a href="#" class="careword_btn2" title="分享到微博"></a>
    </div>
</div>
<div class="popshare"></div>
<div class="pop pop2">
    <div class="popclose"></div>
    <div class="care_popcom">
        <?php if($record->status!=0):?>
            <h2>请继续关注获得更多信息。</h2>
            <p>您的宝贝信息已通过审核！</p>
        <?php else:?>
            <h2>您的宝贝信息正在审核中...</h2>
            <p>感谢您的配合与支持！</p>
        <?php endif;?>
    </div>
</div>