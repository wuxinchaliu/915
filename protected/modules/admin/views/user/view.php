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
        'id',
        'username',
        'realname',
        'email',
        array('name'=>'add_time',
            'value'=>$model->add_time!=0?date('Y-m-d H:i:s',$model->add_time):'未知',
        ),
        array('name'=>'last_time',
            'value'=>$model->last_time!=0?date("Y-m-d H:i",$model->last_time):"从未",
            'headerHtmlOptions'=>array('style'=>'width:80px'),
        ),
        array('name'=>'fail_login_count',
            'headerHtmlOptions'=>array('style'=>'width:80px'),
        ),
    ),
));
?>
