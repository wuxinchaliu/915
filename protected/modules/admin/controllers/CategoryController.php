<?php
/**
 * class name CategoryController
 * author: qilin
 * time: 14-6-17 21:44
 */

class CategoryController extends Controller
{
    public $defaultAction = 'list';
 //   public  $layout = 'application.modules.admin.views.layouts.column1';

    /**
     * list system user
     */
    public function actionList()
    {
        $model = new Category('search');
        $cate = $model->getTopCategory();
        //print_r($cate);exit;
        $model->unsetAttributes();
        if(isset($_GET['Category'])){
            $model->attributes = $_GET['Category'];
        }
        $this->render('list',array('model'=>$model));
    }

    /**
     * add system user
     */
    public function actionAdd()
    {
        $model = new Category('insert');
        if(isset($_POST['Category'])){
            $model->attributes = $_POST['Category'];

            if($model->save()){
                $this->redirect(array('view', 'id' => $model->cid));
            }
        }
        $this->render('add',array('model'=>$model));
    }
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view',array(
            'model'=>$model,
        ));

    }
    public function loadModel($id)
    {
        $model = Category::model()->findByPk($id);
        if($model == null )
            throw new CHttpException('404', 'this page is not exists');
        return $model;
    }
    /**
     * edit category
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if(isset($_POST['Category'])){
            $model->attributes = $_POST['Category'];
            if($model->save()){
                $this->redirect('/admin/category/list');
            }
        }
        $this->render('update', array(
            'model'=>$model
        ));
    }
    protected function beforeAction($action)
    {
        if (Yii::app()->user->getIsGuest()) {
            $this->redirect('/admin/site/login');
        } else {
            return true;
        }
    }
} 