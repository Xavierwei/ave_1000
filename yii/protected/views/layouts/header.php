<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title>Avene 1000 Family</title>
    <link href="<?=Yii::app()->baseUrl.'/'?>css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--  -->
<div class="header">
    <div class="logo">
        <a href="index.html" class="logolink"></a>
    </div>
    <div class="famliyicon"></div>
    <div class="nav cs-clear">
        <a class="navitem nav1" href="<?=Yii::app()->homeUrl?>"><span class="on">首页</span></a>
        <a class="navitem nav1" href="#"><span class="">千家万户</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->createUrl('/site/about')?>"><span class="">关于湿疹</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->createUrl('/site/baike')?>"><span class="">湿疹百科</span></a>
        <a class="navitem nav1" href="<?=Yii::app()->createUrl('/site/carefor')?>"><span class="">雅漾关怀</span></a>
    </div>
    <?php if(Yii::app()->user->isGuest):?>
        <a class="nav_login" href="<?=Yii::app()->createUrl('/site/reg')?>"><span class="">登录</span></a>
    <?php else:?>
        <a class="nav_login" href="<?=Yii::app()->createUrl('/site/logout')?>"><?=Yii::app()->user->name?><span class=""> 退出</span></a>
    <?php endif?>
</div>
<!--  -->