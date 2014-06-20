
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
));
?>

<?php echo $form->textFieldRow($model, 'cate_name', array('class'=>'span5')); ?>
<?php echo $form->dropDownListRow($model,'parent_id',$model::getCategoryById(),array('class'=>'span5'));?>
<?php echo $form->textAreaRow($model, 'cate_desc', array('class'=>'form-control','style'=>'width:300px','row'=>5,'col'=>3)); ?>
<?php echo $form->textFieldRow($model, 'sort', array('class'=>'form-control','style'=>"width:50px")); ?>
<?php echo $form->textFieldRow($model, 'url', array('class'=>'form-control','style'=>'width:400px')); ?>
<?php echo $form->checkboxRow($model, 'is_enable'); ?>

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
