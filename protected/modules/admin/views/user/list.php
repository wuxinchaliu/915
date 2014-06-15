<?php
$this->breadcrumbs = array(
    '系统用户管理',
);
$this->breadcrumbs=array(
    '公告管理'=>array('admin'),
);
?>

<h1>系统用户管理</h1>
<?php
// 搜索框
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
    'method'=>'get',
    'action'=>'/admin/user/list',
    'htmlOptions'=>array('class'=>'well'),
));
echo $form->textFieldRow($model, 'username',array('class'=>'form-control','style'=>'width:150px;margin-right:10px;'));

$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'搜索','htmlOptions'=>array('class'=>'btn-default')));
echo CHtml::link('添加用户', array('add'),array('class'=>'btn btn-small btn-primary pull-right'));
$this->endWidget();

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'ajaxUpdate'=>false,
    'filterPosition'=>false,
    'type'=>'striped bordered ',
    'template'=>"{items}",
    'pagerCssClass'=>'pagination pagination-centered',
    'pager'=> array('nextPageLabel'=>'»','prevPageLabel'=>'«'),
    'columns'=>array(
        array(
            'name'=>'id',
            'htmlOptions'=>array('style'=>'width:60px;'),
        ),
        'username',
        'realname',
        'email',
        array('name'=>'add_time',
            'value'=>'date("Y-m-d H:i:s",$data->add_time)'),
        array(
            'header'=>'操作',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'class'=>'CButtonColumn',
        ),
    ),
));


?>
