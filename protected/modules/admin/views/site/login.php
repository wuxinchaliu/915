<!DOCTYPE html>
<html lang="<?php echo yii::app()->language;?>">
<head>
    <meta charset="<?php echo Yii::app()->charset?>">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="it915">
    <meta name="author" content="qilin">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/font-awesome/css/font-awesome.css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/sb-admin.css" rel="stylesheet">
</head>

<body>
<?php
    $this->pageTitle = yii::app()->name.'-后台登陆';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id' => 'verticalForm',
                        'htmlOptions' => array('role'=>'form'),
                    ));
                    ?>
                        <fieldset>
                            <div class="form-group">
                                <?php echo $form->textFieldRow($model, 'username',
                                    array(
                                        'class'=>'form-control',
                                        'placeholder'=>"用户名",
                                        'required'=>'required',
                                        'autofocus'=>'',
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->passwordFieldRow($model, 'password',
                                    array(
                                        'class'=>'form-control',
                                        'placeholder'=>"密 码",
                                        'required'=>'required',
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->textFieldRow($model, 'verifyCode',
                                    array(
                                        'class'=>'form-control span3',
                                        'style'=>'width:80px;float:left;',
                                        'placeholder'=>"验证码",
                                        'required'=>'required',
                                        'autofocus'=>'',
                                    ));
                                ?>
                                <?php $this->widget('CCaptcha',
                                    array(
                                        'buttonLabel'=>'换一张',
                                        'buttonOptions'=>array('class'=>'refresh-code'),
                                        'imageOptions'=>array('class'=>'cpatcha-img'),
                                    )); ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <?php echo $form->checkboxRow($model, 'rememberMe');?>
                                </label>
                            </div>

                            <?php  $this->widget('bootstrap.widgets.TbButton',
                                array(
                                    'buttonType'=>'submit',
                                    'label'=>'登  陆',
                                    'htmlOptions'=>array('class'=>'btn btn-lg btn-primary btn-block'),
                                ));?>
                        </fieldset>
                        <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    label{display: none;}
    .cpatcha-img{width:80px;height:40px;margin-left:5px;}
    .checkbox{}
</style>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/sb-admin.js"></script>
</body>
</html>
