<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=640, minimum-scale=0.5, maximum-scale=1, target-densityDpi=290,user-scalable = no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />

    <?php
        if(Yii::app()->request->pathInfo == 'index'):
    ?>
        <title>雅漾1000Families 湿疹儿童 优享乐生活_雅漾AVENE官方网站</title>
        <meta name="keywords" content="雅漾1000Families,雅漾关怀湿疹儿童,雅漾湿疹,雅漾湿疹儿童,雅漾千家万户行动" />
        <meta name="description" content="雅漾携手CDA启动千家万护行动帮助更多用户了解儿童湿疹相关知识,包含湿疹介绍、湿疹相关常见问题及湿疹百科等。" />
    <?php elseif(Yii::app()->request->pathInfo == 'site/activity'):?>
        <title>雅漾“千家万护”行动_雅漾1000Families__雅漾AVENE官方网站</title>
        <meta name="keywords" content="雅漾1000Families,雅漾“千家万护”行动,雅漾三重滋润霜,雅漾湿疹,漾舒护活泉喷雾" />
        <meta name="description" content='雅漾携手CDA正式启动雅漾1000Families"千家万户"行动，为一千名湿疹儿童免费送上湿疹护理套装（含雅漾三重滋润霜等），携爱助力儿童家庭。' />
    <?php elseif(Yii::app()->request->pathInfo == 'site/login'):?>
        <title>雅漾“千家万护”行动官网登陆_雅漾1000Families__雅漾AVENE官方网站</title>
        <meta name="keywords" content="雅漾“千家万护”行动,雅漾1000Families" />
        <meta name="description" content='登陆雅漾“千家万护”行动官网获得更多关爱湿疹儿童活动信息。' />
    <?php elseif(Yii::app()->request->pathInfo == 'care'):?>
        <title>雅漾关怀_雅漾1000Families__雅漾AVENE官方网站</title>
        <meta name="keywords" content="雅漾关怀,雅漾关怀简介,雅漾湿疹活动" />
        <meta name="description" content="特应性皮炎作为一种儿童最常见的慢性皮肤疾病,严重干扰了儿童的成长和家长的正常生活。良好的患者教育能使患者和家长更科学、更深入的了解疾病的发病、表现及治疗和日常护理,更好地对抗战胜疾病。" />
    <?php elseif(Yii::app()->request->pathInfo == 'about'):?>
        <title>关于湿疹_雅漾1000Families__雅漾AVENE官方网站</title>
        <meta name="keywords" content="关于湿疹,湿疹介绍,湿疹简介" />
        <meta name="description" content="湿疹是一种常见皮肤病，由多种内外因素引起的表皮及真皮浅层炎症性皮肤病。主要特点是剧烈瘙痒，皮损具有多形性、对称性、渗出性，易反复发作。" />
    <?php elseif(Yii::app()->request->pathInfo == 'guide'):?>
        <title>雅漾三重滋润霜_雅漾1000Families__雅漾AVENE官方网站</title>
        <meta name="keywords" content="雅漾1000Families,雅漾“千家万护”行动,雅漾三重滋润霜,雅漾湿疹,漾舒护活泉喷雾" />
        <meta name="description" content="雅漾三重滋润霜特别针对特应性皮炎、慢性湿疹、皮肤瘙痒、干性和特干性皮肤的特效护理产品。" />
    <?php elseif(Yii::app()->request->pathInfo == 'wiki'):?>
        <title>雅漾湿疹专家Q&A_湿疹百科_雅漾1000Families_雅漾AVENE官方网站</title>
        <meta name="keywords" content="饮食引发湿疹,饮食引发湿疹的注意事项" />
        <meta name="description" content="湿疹专家Q&A问答形式，更好的帮助湿疹的病患对症下药，并及时解决相关湿疹问题。" />
    <?php else:?>
        <title>雅漾1000Families 湿疹儿童 优享乐生活_雅漾AVENE官方网站</title>
        <meta name="keywords" content="雅漾1000Families,雅漾关怀湿疹儿童,雅漾湿疹,雅漾湿疹儿童,雅漾千家万户行动" />
        <meta name="description" content="雅漾携手CDA启动千家万护行动帮助更多用户了解儿童湿疹相关知识,包含湿疹介绍、湿疹相关常见问题及湿疹百科等。" />
    <?php endif;?>
	<link href="<?php echo Yii::app()->baseUrl.'/'?>css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->baseUrl.'/'?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-20215586-15']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>

<div class="loading-wrap">
	<div class="logo"></div>
	<div class="loading-loader">
		<div class="loading-bar"></div>
	</div>
	<div class="loading-percentage"></div>
</div>
<!--  -->
<div class="header" data-style="margin-top:-90px;" data-animate="margin-top:0px;" data-delay="0" data-time="500" data-easing="easeOutQuart">
	<div class="logo">
        <a href="<?php echo Yii::app()->homeUrl?>" class="logolink"></a>
    </div>
    <div class="famliyicon"></div>
    <div class="nav cs-clear">
        <a class="navitem nav1" href="<?php echo Yii::app()->homeUrl?>"><span class="<?php echo Yii::app()->request->pathInfo == 'index' ? 'on' : ''?>">首页</span></a>
        <a class="navitem nav1" href="<?php echo Yii::app()->baseUrl.'/'?>site/activity/"><span class="<?php echo Yii::app()->request->pathInfo == 'site/activity' ? 'on' : ''?>">千家万护</span></a>
        <a class="navitem nav1" href="<?php echo Yii::app()->baseUrl.'/'?>about/"><span class="<?php echo Yii::app()->request->pathInfo == 'about' ? 'on' : ''?>">关于湿疹</span></a>
        <a class="navitem nav1" href="<?php echo Yii::app()->baseUrl.'/'?>guide/"><span class="<?php echo Yii::app()->request->pathInfo == 'guide' ? 'on' : ''?>">湿疹护理</span></a>
        <a class="navitem nav1" href="<?php echo Yii::app()->baseUrl.'/'?>care/"><span class="<?php echo Yii::app()->request->pathInfo == 'care' ? 'on' : ''?>">雅漾关怀</span></a>
        <?php if(Yii::app()->user->isGuest):?>
            <a class="navitem nav1 dis_mobile" href="<?php echo Yii::app()->createUrl('/site/login')?>"><span>登录 / 注册</span></a>
        <?php else:?>
            <a class="navitem nav1 dis_mobile" href="<?php echo Yii::app()->createUrl('/record/myinfo')?>"><span><?php echo Yii::app()->user->name?></span></a>
            <a class="navitem nav1 dis_mobile" href="<?php echo Yii::app()->createUrl('/site/logout')?>"><span>退出</span></a>
        <?php endif?>
    </div>
    <p class="navbtn dis_mobile"></p>
    <?php if(Yii::app()->user->isGuest):?>
        <a class="nav_login" href="<?php echo Yii::app()->createUrl('/site/login')?>"><span class="">登录 / 注册</span></a>
    <?php else:?>
        <p class="nav_login">
            <a  href="<?php echo Yii::app()->createUrl('/record/myinfo')?>"><span class=""><?php echo Yii::app()->user->name?> </span></a>
             /
            <a href="<?php echo Yii::app()->createUrl('/site/logout')?>"><span class=""> 退出</span></a>
        </p>
    <?php endif?>
</div>
<!--  -->