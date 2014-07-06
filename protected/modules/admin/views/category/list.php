<?php
$this->breadcrumbs = array(
    '分类管理',
);
$this->breadcrumbs=array(
    '分类管理'=>array('list'),
);
?>

<h1>分类管理</h1>
<?php
// 搜索框
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
    'method'=>'get',
    'action'=>'/admin/category/list',
    'htmlOptions'=>array('class'=>'well'),
));
echo $form->textFieldRow($model, 'cate_name',array('class'=>'form-control','style'=>'width:150px;'))."\n\n";
echo $form->dropDownListRow($model, 'parent_id', $model::getCategoryById(),
        array('onchange'=>'getChildCategory(this.value,this)','empty'=>'所有分类','class'=>'span5','style'=>'width:150px','label'=>false))."\n\n";
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'搜索','htmlOptions'=>array('class'=>'btn-default')));
echo CHtml::link('添加分类', array('add'),array('class'=>'btn btn-small btn-primary pull-right'));
$this->endWidget();

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'ajaxUpdate'=>false,
    'filterPosition'=>false,
    'type'=>'striped bordered ',
    'pagerCssClass'=>'pagination pagination-centered',
    'pager'=> array('nextPageLabel'=>'»','prevPageLabel'=>'«'),
    'columns'=>array(
        array(
            'name'=>'cid',
            'htmlOptions'=>array('style'=>'width:50px;'),
        ),
        array(
            'name'=>'cate_name',
            'htmlOptions'=>array('style'=>'width:90px;'),
        ),
        array(
            'name'=>'url',
            'htmlOptions'=>array('style'=>'width:350px;'),
        ),
        array(
            'name'=>'sort',
            'htmlOptions'=>array('style'=>'width:50px;'),
        ),
        array('name'=>'is_enable',
            'value'=>'$data->is_enable==1 ?"有效":"无效"',
            'htmlOptions'=>array('style'=>'width:70px;'),
        ),
        array(
            'header'=>'操作',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width:70px;'),
            //'class'=>'CButtonColumn',
        ),
    ),
));
?>
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
                    var html='<select id="cateChild_'+parent_id+'" class="span5" style="width:150px;margin-left: 10px;" onchange=\'getChildCategory(this.value,this)\'>';
                    $.each(msg, function(index, val){
                        html+="<option value='"+index+"'>"+val+"</option>";
                    });
                    html+="</select>";
                    $(obj).after(html);
                }else{
                    $("select[id^='cateChild_']").remove();
                }
            })
    }
</script>
