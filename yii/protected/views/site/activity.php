<div class="activity">
    <!--  -->
    <!--  -->
    <div class="sec_homefm">
        <div class="actinfor">
            <div class="actinfor_tit"></div>
            <div class="actinfor_com">
                雅漾携手中国医师协会皮肤科医师分会（CDA），联合20家权威医院，在全国范围内展开雅漾“1000Families·湿疹儿童优享乐生活”关爱行动，教授湿疹儿童家长专业科学的护理方法，并为一千名湿疹儿童免费送上湿疹特效护理产品——总价值为1368元的雅漾三重修护滋润霜（6支），携爱助力儿童家庭。
            </div>
            <a href="<?=Yii::app()->createUrl('/information/update')?>" class="actinfor_btn1"></a>
            <a href="#" class="actinfor_btn2"></a>
        </div>
        <div class="home_case">
            <ul id="mycarousel" class="jcarousel-skin-tango">
                <?php if($record):?>
                    <?php foreach($record as $key => $value):?>
                        <li class="home_caseli"><a href="<?=Yii::app()->createUrl('/record/otherinfo/',array('id'=>$value->uid))?>" title="查看更多"><img src="<?=Yii::app()->baseUrl . ($value->sex == '男' ? '/images/defaultAvatar/boy_' . rand(1,2) . '.jpg' :  '/images/defaultAvatar/girl_' . rand(1,2) . '.jpg' );?>" width="211" height="252" /></a></li>
                    <?php endforeach;?>
                <?php else:?>
                    <li class="home_caseli"><a href="#" title="查看更多"><img src="<?=Yii::app()->baseUrl.'/'?>images/homecase_demo.jpg" width="211" height="252" /></a></li>
                    <li class="home_caseli"><a href="#" title="查看更多"><img src="<?=Yii::app()->baseUrl.'/'?>images/video_demo.jpg" width="211" height="252" /></a></li>
                    <li class="home_caseli"><a href="#" title="查看更多"><img src="<?=Yii::app()->baseUrl.'/'?>images/about_img2.jpg" width="211" height="252" /></a></li>
                <?php endif;?>
            </ul>
            <div class="home_casestit"></div>
        </div>
    </div>
    <!--  -->
    <div class="act_intro">
        <a href="#" class="act_link1" title="活动须知">活动须知</a>
        <a href="<?=Yii::app()->baseUrl.'/'?>guide/" class="act_link2" title="更多湿疹知识">更多湿疹知识</a>
        <a href="<?=Yii::app()->createUrl('/information/update')?>" class="act_btn1" title="即刻申请"></a>
        <a href="#" class="act_btn2" title="查看医院列表"></a>
    </div>
    <!--  -->
    <a href="#" class="act_btn">不是所有痒，都能创造笑声</a>
    <!--  -->
    <div class="baike_video">
        <img src="<?=Yii::app()->baseUrl.'/'?>images/video_demo2.jpg">
        <a class="video_play"></a>
    </div>
    <!--  -->
</div>

<script type="text/tpl" id="flash-player-template">
    <div class="overlay btn"></div>
    <div class="popup video-popup">
        <div class="popup-close btn"></div>
        <div class="popup-body">
            <div class="video-player">
                {{#if flash}}
                <object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="800" height="450">
                    <param name="allowScriptAccess" value="always"/>
                    <param name="movie" value="<?=Yii::app()->baseUrl.'/'?>video/player.swf"/>
                    <param name="flashVars" value="source=1.mp4&autoplay=true&skinMode=show&onPlay=play()&onPlayComplete=playComplete()&fengmian=<?=Yii::app()->baseUrl.'/'?>video/1.jpg"/>
                    <param name="quality" value="high"/>
                    <param name="allowFullScreen" value="true"/>
                    <embed name="player" src="<?=Yii::app()->baseUrl.'/'?>video/player.swf" allowFullScreen="true" flashVars="source=1.mp4&autoplay=true&skinMode=show&onPlay=play()&onPlayComplete=playComplete()&fengmian=<?=Yii::app()->baseUrl.'/'?>video/1.jpg" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="800" height="450" allowScriptAccess="always"></embed>
                </object>
                {{else}}
                <video autoplay="autoplay" width="640" height="360" controls><source src="<?=Yii::app()->baseUrl.'/'?>video/1.mp4" type="video/mp4" /></video>
                {{/if}}
            </div>
        </div>
    </div>
</script>