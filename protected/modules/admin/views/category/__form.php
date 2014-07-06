
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
));
?>

<?php echo $form->textFieldRow($model, 'cate_name', array('class'=>'span5')); ?>
<?php echo $form->dropDownListRow($model,'parent_id',$model::getCategoryById(),
    array('onchange'=>'getChildCategory(this.value,this)',
        'empty'=>'顶级分类','class'=>'span5',
        'style'=>'width:150px;','multiple'=>false));?>

<?php
if($model->isNewRecord){

}else{
    echo $form->dropDownListRow($model,'second_id',array_diff($model::getCategoryById($model->parent_id), array($model->cid=>$model->cate_name)),
        array( 'empty'=>'二级分类','class'=>'span5','style'=>'width:150px;','multiple'=>false));
}
?>
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

<script>
    $(function(){
        $("#cateTop").change(function(){
            var topValue = $(this).val();

            $(this).after('<h1>d</h1>');
        });


    })

    function getChildCategory(parent_id,obj)
    {
        $.ajax({
            'url': '/admin/category/getChildCategory',
            'type':'post',
            'data':'cid='+parent_id,
            'dataType':'json'
        })
        .done(function(msg){

            if( msg.status != 0){
                var html='<select id="cateChild_'+parent_id+'" name="Category[second_id]" class="span5" style="width:150px;margin-left: 10px;" onchange=\'getChildCategory(this.value,this)\'>';
                html+="<option value=''>二级分类</option>";
                $.each(msg, function(index, val){
                    html+="<option value='"+index+"'>"+val+"</option>";
                });
                html+="</select>";
                $(obj).after(html);
            }else{
                $("select[id^='cateChild_']").remove();
                //$("label[for^='Category_second_id']").parent().remove();
                alert($("label[for^='Category_second_id']").val())
            }
        })
    }
</script>
