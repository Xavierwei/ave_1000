<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Avene</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php Yii::app()->getClientScript()->registerScriptFile(yii::app()->baseUrl."/style/admin/script/jquery.min.js");?>
<?php Yii::app()->getClientScript()->registerScriptFile(yii::app()->baseUrl."/style/admin/script/admin.js");?>
<?php Yii::app()->getClientScript()->registerCssFile(yii::app()->baseUrl."/style/admin/admin.css");?>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/style/admin/script/My97DatePicker/WdatePicker.js"></script>
<link href="<?php echo Yii::app()->baseUrl?>/style/admin/script/fsgallery/css/fsgallery.css" rel="stylesheet" />
<script src="<?php echo Yii::app()->baseUrl?>/style/admin/script/fsgallery/js/fs_forse.js"></script>
</head>
	<body>
		<?php echo $content; ?>
	</body>
</html>