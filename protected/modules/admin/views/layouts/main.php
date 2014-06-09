<!DOCTYPE html>
<html lang="<?php echo yii::app()->language;?>">
<head>
    <meta charset="<?php echo Yii::app()->charset?>">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="it915">
    <meta name="author" content="wuxinchaliu">
    <?php Yii::app()->bootstrap->register();?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap/css/bootstrap.min.css" />
    <?php
        if (yii::app()->controller->id == 'user' && $this->getAction()->getId() == 'login'){
            echo '<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/static/css/signin.css" />';
        }
    ?>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

</head>

<body>
<div class="container-fluid">
    <?php
		if (isset($this->breadcrumbs))
		{
			$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>isset($this->homeLink) ? $this->homeLink : CHtml::link('首页',array('/site/welcome')),
			));
		}
		?><!-- breadcrumbs -->
    <?php echo $content;?>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
