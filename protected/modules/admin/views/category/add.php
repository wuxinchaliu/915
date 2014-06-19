<?php
$this->breadcrumbs = array(
    '分类管理'=>array('list'),
    '添加分类'
);
$this->pageTitle = '添加分类';
?>
<h2>添加分类</h2>

<?php
$this->renderPartial('__form', array('model'=>$model));
?>