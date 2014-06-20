<!DOCTYPE html>
<html lang="<?php echo yii::app()->language;?>">
<head>
    <meta charset="<?php echo Yii::app()->charset?>">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="it915">
    <meta name="author" content="qilin">

    <!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap.css" /-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/font-awesome/css/font-awesome.css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/sb-admin.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
       <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php $this->renderPartial('/site/top'); ?>
            <?php $this->renderPartial('/site/menu'); ?>
       </nav>

        <div id="page-wrapper">
            <?php echo $content;?>
        </div>

    </div>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/sb-admin.js"></script>
</body>
</html>
