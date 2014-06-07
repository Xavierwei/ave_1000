<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title><?=$this->action->id;?>Avene 1000 Family</title>
    <link href="<?=Yii::app()->baseUrl.'/'?>css/style.css" rel="stylesheet" type="text/css" />
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
        <a href="<?=Yii::app()->homeUrl?>" class="logolink"></a>
    </div>
    <div class="famliyicon"></div>
    <div class="nav cs-clear">
        <a class="navitem nav1" href="<?=Yii::app()->homeUrl?>"><span class="<?=$this->action->id == 'index' ? 'on' : ''?>">首页</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->baseUrl.'/'?>site/activity/"><span class="<?=$this->action->id == 'activity' ? 'on' : ''?>">千家万户</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->baseUrl.'/'?>about/"><span class="<?=$this->action->id == 'about' ? 'on' : ''?>">关于湿疹</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->baseUrl.'/'?>guide/"><span class="<?=$this->action->id == 'guide' ? 'on' : ''?>">湿疹百科</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->baseUrl.'/'?>care/"><span class="<?=$this->action->id == 'care' ? 'on' : ''?>">雅漾关怀</span></a>
    </div>
    <?php if(Yii::app()->user->isGuest):?>
        <a class="nav_login" href="<?=Yii::app()->createUrl('/site/login')?>"><span class="">登录 / 注册</span></a>
    <?php else:?>
        <p class="nav_login">
            <a  href="<?=Yii::app()->createUrl('/record/myinfo')?>"><span class=""><?=Yii::app()->user->name?> </span></a>
             /
            <a href="<?=Yii::app()->createUrl('/site/logout')?>"<span class=""> 退出</span></a>
        </p>
    <?php endif?>
</div>
<!--  -->