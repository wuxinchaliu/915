<?php
$this->breadcrumbs = array(
    '系统用户管理'=>array('list'),
    '添加系统用户'
);
?>

<h2>个人信息</h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        'cid',
        'cate_name',
        'cate_desc',
        'sort',
        array('name'=>'is_enable',
            'value'=>$model->is_enable!=0?'可用':'不可用',
        ),
       'url'
    ),
));
echo CHtml::link('所有分类', array('list'),array('class'=>'btn btn-small btn-primary'));
?>
