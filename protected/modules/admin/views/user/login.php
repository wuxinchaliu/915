<?php
    $this->pageTitle = yii::app()->name.'-后台登陆';
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class'=>'well form-signin'),
));
?>
<h2 class="form-signin-heading">登&nbsp;陆</h2>

<?php echo $form->textFieldRow($model, 'username',
                array(
                    'class'=>'form-control',
                    'placeholder'=>"用户名",
                    'required'=>'required',
                    'autofocus'=>'',
                ));
?>
<?php echo $form->passwordFieldRow($model, 'password',
                array(
                    'class'=>'form-control',
                    'placeholder'=>"密 码",
                    'required'=>'required',
                ));
?>
<?php echo $form->textFieldRow($model, 'verifyCode',
    array(
        'class'=>'verify-code',
        'placeholder'=>"验证码",
        'required'=>'required',
        'autofocus'=>'',
    ));
?>
<?php $this->widget('CCaptcha',
    array(
        'buttonLabel'=>'换一张',
        'buttonOptions'=>array('class'=>'refresh-code'),
        'imageOptions'=>array('class'=>'cpatcha-img')
    )); ?>
<?php echo $form->checkboxRow($model, 'rememberMe');?>

<?php  $this->widget('bootstrap.widgets.TbButton',
            array(
                'buttonType'=>'submit',
                'label'=>'登  陆',
                'htmlOptions'=>array('class'=>'btn btn-lg btn-primary btn-block'),
            ));?>
<?php $this->endWidget(); ?>
