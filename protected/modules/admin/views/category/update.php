<?php
$this->breadcrumbs = array(
    '分类管理'=>array('list'),
    '编辑分类'
);
$this->pageTitle = '编辑分类';
?>
<h2>编辑分类</h2>
<?php
$this->renderPartial('__form', array('model'=>$model));
?>
