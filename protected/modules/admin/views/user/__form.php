<?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
    ));
?>

    <?php echo $form->textFieldRow($model, 'username', array('class'=>'span5')); ?>
    <?php echo $form->textFieldRow($model, 'realname', array('class'=>'span5')); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span5')); ?>
    <?php echo $form->passwordFieldRow($model, 'confirmPassword', array('class'=>'span5')); ?>
    <?php echo $form->textFieldRow($model, 'email', array('class'=>'span5')); ?>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? '创建' : '保存',
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
