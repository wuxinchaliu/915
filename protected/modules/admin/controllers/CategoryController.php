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
        $dd = $model::getCategoryById(0);
        if(isset($_POST['Category'])){
            $model->attributes = $_POST['Category'];
            $model->parent_id = intval($_POST['Category']['parent_id']);
            $model->second_id = isset($_POST['Category']['second_id']) ? intval($_POST['Category']['second_id']) : 0;
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
            $model->parent_id = intval($_POST['Category']['parent_id']);
            $model->second_id = isset($_POST['Category']['second_id']) ? intval($_POST['Category']['second_id']) : 0;
            if($model->save()){
                $this->redirect('/admin/category/list');
            }
        }
        $this->render('update', array(
            'model'=>$model
        ));
    }

    /**
     * @param $action
     * @return bool
     */
    protected function beforeAction($action)
    {
        if (Yii::app()->user->getIsGuest()) {
            $this->redirect('/admin/site/login');
        } else {
            return true;
        }
    }

    public function actionGetChildCategory()
    {
        $cid = Yii::app()->request->getPost('cid');
        if(intval($cid)>0){
            $data = Category::getCategoryById($cid);
            if($data){
                echo json_encode($data);
            }else{
                $data = array('status'=>0);
                echo json_encode($data);exit;
            }
        } else{
            $data = array('status'=>0);
            echo json_encode($data);exit;
        }
    }
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadModel($id)->delete();
            if(!isset($_GET['ajax'])) {
                $this->redirect('/admin/category/list');
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }
} 