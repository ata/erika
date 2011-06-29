<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/extjs/resources/css/ext-all.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/extjs.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/extjs/ext-debug.js"></script>
	<?php /*
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>
	*/?>
	<script type="text/javascript">
		var BASE_URL = '<?php echo Yii::app()->request->baseUrl;?>';
		var PO_LIST_URL = '<?php echo Yii::app()->createUrl('/po/list')?>'
		var PO_CREATE_URL = '<?php echo Yii::app()->createUrl('/po/create')?>'
		var PO_READ_URL = '<?php echo Yii::app()->createUrl('/po/view')?>'
		var PO_UPDATE_URL = '<?php echo Yii::app()->createUrl('/po/update')?>'
		var PO_DESTROY_URL = '<?php echo Yii::app()->createUrl('/po/destroy')?>'
	</script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<?php echo $content; ?>
</body>
</html>
