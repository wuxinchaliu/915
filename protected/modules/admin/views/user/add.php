<?php
$this->breadcrumbs = array(
    '系统用户管理'=>array('list'),
    '添加系统用户'
);
?>
<h2>添加系统用户</h2>

<?php
$this->renderPartial('__form', array('model'=>$model));
?>