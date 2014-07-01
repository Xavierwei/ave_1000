<div class="careword">
    <div class="careword_com">
        <div class="careword_pho">
            <img src="<?php echo Yii::app()->baseUrl . $avatar?>" />
            <div class="careword_phobg"></div>
        </div>
        <h2>我的电子个人档案</h2>
        <div class="careword_comtxt">
            <p><?php echo $baby->nickname?></p>
            <p><?php echo Drtool::age($baby->birthday)?>岁，<?php echo $baby->sex?></p>
            <p>来自<?php echo $baby->city?></p>
            <p>建议到<?php echo $baby->point_hospital?></p>
        </div>
    </div>
    <div class="careword_mess">
        <div class="careword_messtxt1"><?php echo mb_substr( $baby->reason, 0, 164, 'utf-8' ) ?></div>
        <?php if(mb_strlen( $baby->reason,'utf-8' ) > 164 ):?>
            <div class="careword_messtxt2"><?php echo mb_substr( $baby->reason, 164, 164, 'utf-8' ) . (mb_strlen( $baby->reason,'utf-8' ) > 164*2 ? '...' : '' )?></div>
        <?php endif;?>
    </div>
    <div class="careword_btn cs-clear">
        <a href="#" class="careword_btn1" title="查看产品"></a>
        <a href="#" class="careword_btn2" title="分享到微博"></a>
    </div>
</div>