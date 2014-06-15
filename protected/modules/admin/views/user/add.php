<?php
$this->breadcrumbs = array(
    '系统用户管理'=>array('list'),
    '添加系统用户'
);
?>
<h2>添加系统用户</h2>
<div class="col-lg-6">
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

    <?php echo $form->textFieldRow($model, 'username', array('class'=>'form-control')); ?>
<?php echo $form->textFieldRow($model, 'realname', array('class'=>'form-control')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'form-control')); ?>
<?php echo $form->passwordFieldRow($model, 'confirmPassword', array('class'=>'form-control')); ?>
<?php echo $form->textFieldRow($model, 'email', array('class'=>'form-control')); ?>
<br/>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'添加','htmlOptions'=>array('class'=>'btn-primary'))); ?>

<?php $this->endWidget(); ?>
</div>