
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<?php echo $form->textFieldRow($model, 'cate_name', array('class'=>'span5')); ?>
<?php echo $form->dropDownListRow($model,'parent_id',$model::getTopCategory(),array('class'=>'span5'));?>
<?php echo $form->textAreaRow($model, 'cate_desc', array('class'=>'form-control','style'=>'width:300px','row'=>5,'col'=>3)); ?>
<?php echo $form->textFieldRow($model, 'sort', array('class'=>'form-control','style'=>"width:50px")); ?>
<?php echo $form->textFieldRow($model, 'url', array('class'=>'form-control','style'=>'width:400px')); ?>
<?php echo $form->checkboxRow($model, 'is_enable'); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'添加','htmlOptions'=>array('class'=>'btn-primary'))); ?>

<?php $this->endWidget(); ?>
