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
echo $form->textFieldRow($model, 'cate_name',array('class'=>'form-control','style'=>'width:150px;margin-right:10px;'));

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
