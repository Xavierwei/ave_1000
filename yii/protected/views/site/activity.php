<div class="activity">
    <!--  -->
    <!--  -->
    <div class="sec_homefm">
        <div class="actinfor">
            <div class="actinfor_tit"></div>
            <div class="actinfor_com">
                雅漾携手中国医师协会皮肤科医师分会（CDA），联合20家权威医院，在全国范围内展开雅漾“1000Families·湿疹儿童优享乐生活”关爱行动，教授湿疹儿童家长专业科学的护理方法，并为一千名湿疹儿童免费送上总价值为2500元的湿疹特效护理套装——内含6支雅漾三重修护滋润霜200ML、6瓶雅漾舒护活泉喷雾150ML，以及湿疹教育视频与湿疹护理手册等，携爱助力儿童家庭。
            </div>
	        <div class="actinfor_product">

	        </div>
            <a href="<?=Yii::app()->createUrl('/information/update')?>" class="actinfor_btn1"></a>
            <a href="http://service.weibo.com/share/share.php?title=%231000Families%23%e4%bd%a0%e7%9f%a5%e9%81%93%e5%90%97%ef%bc%8c%e5%9c%a8%e4%b8%ad%e5%9b%bd%e6%ad%a3%e6%9c%89%e6%95%b0%e7%99%be%e4%b8%87%e5%84%bf%e7%ab%a5%e5%92%8c%e5%ae%b6%e5%ba%ad%e6%ad%a3%e5%9c%a8%e5%bf%8d%e5%8f%97%e6%b9%bf%e7%96%b9%e6%89%80%e5%b8%a6%e6%9d%a5%e7%9a%84%e7%97%9b%e8%8b%a6%e3%80%82%e9%9b%85%e6%bc%be%e5%8f%91%e8%b5%b7%e2%80%9c%e5%8d%83%e5%ae%b6%e4%b8%87%e6%8a%a4%e2%80%9d%e5%85%b3%e7%88%b1%e8%a1%8c%e5%8a%a8%ef%bc%8c%e4%b8%ba1000%e5%90%8d%e6%b9%bf%e7%96%b9%e5%84%bf%e7%ab%a5%e5%85%8d%e8%b4%b9%e9%80%81%e4%b8%8a%e4%bb%b7%e5%80%bc2500%e5%85%83%e7%9a%84%e6%b9%bf%e7%96%b9%e6%8a%a4%e7%90%86%e5%a5%97%e8%a3%85%e3%80%82%e6%ac%a2%e8%bf%8e%e7%82%b9%e5%87%bb%e9%93%be%e6%8e%a5%e5%85%b3%e6%b3%a8%e6%b4%bb%e5%8a%a8%ef%bc%8c%e4%ba%86%e8%a7%a3%e6%9b%b4%e5%a4%9a%e6%b4%bb%e5%8a%a8%e4%bf%a1%e6%81%af%ef%bc%8c%e7%bb%99%e4%ba%88%e6%b9%bf%e7%96%b9%e5%84%bf%e7%ab%a5%e4%b8%80%e4%bb%bd%e5%85%b3%e6%80%80%e4%b8%8e%e6%94%af%e6%8c%81%ef%bc%9ahttp%3a%2f%2ft.cn%2fRvwx3b6&amp;pic=http://www.eau-thermale-avene.cn/eczemakids/weibo-banner2.jpg&amp;appkey=4266983005" target="_blank" class="actinfor_btn2"></a>
        </div>
        <div class="home_case">
            <ul id="mycarousel" class="jcarousel-skin-tango">
                <?php if($record):?>
                    <?php foreach($record as $key => $value):?>
                        <li class="home_caseli">
                            <a href="<?=Yii::app()->createUrl('/record/otherinfo/',array('id'=>$value->uid))?>" title="查看更多">
                                <img class="avatar" src="<?=Yii::app()->baseUrl . ($value->sex == '男' ? '/images/defaultAvatar/boy_' . rand(1,2) . '.png' :  '/images/defaultAvatar/girl_' . rand(1,2) . '.png' );?>" />
	                            <div class="over_avatar"></div>
	                            <div class="info">
		                            <p><?=$value->nickname;?></p>
		                            <p><?=$value->sex;?></p>
		                            <p>来自: <?=$value->city;?></p>
	                            </div>
	                            <div class="msg"><?=$value->reason;?></div>
                            </a>
                        </li>
                    <?php endforeach;?>
                <?php endif;?>
            </ul>
            <div class="home_casestit"></div>
        </div>
    </div>
    <!--  -->
    <div class="act_intro">
        <a href="<?=Yii::app()->createUrl('/information/update')?>" class="act_btn1" title="即刻申请"></a>
        <a href="javascript:;" class="popshow_hos act_btn2" title="查看医院列表"></a>
	    <a href="<?=Yii::app()->baseUrl.'/'?>guide/" class="popshow_hos act_btn3 dis_mobile"></a>
    </div>
    <!--  -->
    <div class="act_btn">不是所有痒，都能创造笑声</div>
    <!--  -->
    <div class="baike_video">
        <img src="<?=Yii::app()->baseUrl.'/'?>images/video_demo2.jpg">
        <a class="video_play video_play2" data-video="1"></a>
    </div>
    <!--  -->
</div>

<div class="popshare"></div>
<div class="pop home_pop" id="pop_hos">
    <div class="popclose"></div>
    <div class="home_popcom">
        <h2>医院列表</h2>
        <div class="homepopfm_list hos_list cs-clear">
            <div class="col">
                <h4>北京</h4>
                <p>北京儿童医院</p>
                <p>首都儿研所</p>
                <p>北大医院</p>
                <p>中国医大盛京医院</p>
                <h4>大连</h4>
                <p>大连儿童医院</p>
                <h4>哈尔滨</h4>
                <p>哈尔滨儿童医院</p>
                <h4>长春</h4>
                <p>长春儿童医院</p>
                <h4>天津</h4>
                <p>天津儿童医院</p>
                <h4>郑州</h4>
                <p>郑州儿童医院</p>
                <h4>西安</h4>
                <p>西安市儿童医院</p>
                <h4>重庆</h4>
                <p>重庆儿童医院</p>
                <h4>上海</h4>
                <p>华山医院</p>
                <p>复旦大学附属儿科医院</p>
                <h4>杭州</h4>
                <p>浙江省中医院</p>
                <h4>南京</h4>
                <p>中国医学科学院皮肤病医院</p>
                <h4>深圳</h4>
                <p>深圳儿童医院</p>
                <h4>广州</h4>
                <p>广州儿童医院</p>
                <h4>武汉</h4>
                <p>武汉第一人民医院</p>
                <h4>长沙</h4>
                <p>湖南省儿童医院</p>
                <h4>青海</h4>
                <p>青海省儿童医院</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<div class="pop home_pop" id="pop_apply">
    <div class="popclose"></div>
    <div class="home_popcom">
        <h2>线下申请</h2>
        <div>

        </div>
    </div>
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
					<param name="flashVars" value="source={{video_id}}.mp4&autoplay=true&skinMode=show&onPlay=play()&onPlayComplete=playComplete()&fengmian=video/1.jpg"/>
					<param name="quality" value="high"/>
					<param name="allowFullScreen" value="true"/>
					<embed name="player" src="<?=Yii::app()->baseUrl.'/'?>video/player.swf" allowFullScreen="true" flashVars="source={{video_id}}.mp4&autoplay=true&skinMode=show&onPlay=play()&onPlayComplete=playComplete()&fengmian=video/1.jpg" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="800" height="450" allowScriptAccess="always"></embed>
				</object>
				{{else}}
				<video autoplay="autoplay" width="640" height="360" controls><source src="<?=Yii::app()->baseUrl.'/'?>video/{{video_id}}.mp4" type="video/mp4" /></video>
				{{/if}}
			</div>
		</div>
	</div>
</script>