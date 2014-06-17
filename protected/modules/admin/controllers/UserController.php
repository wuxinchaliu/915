<?php
/**
 * class name UserController
 * author: qilin
 * time: 14-6-7 21:44
 */

class UserController extends Controller
{
    public $defaultAction = 'list';
 //   public  $layout = 'application.modules.admin.views.layouts.column1';

    /**
     * list system user
     */
    public function actionList()
    {
        $model = new User('search');
        $model->unsetAttributes();
        if(isset($_GET['User'])){
            $model->attributes = $_GET['User'];
        }
        $this->render('list',array('model'=>$model));
    }

    /**
     * add system user
     */
    public function actionAdd()
    {
        $model = new User('insert');
        if(isset($_POST['User'])){
            $model->attributes = $_POST['User'];

            if($model->save()){
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('add',array('model'=>$model));
    }
    public function actionView($id)
    {
        $model = User::model()->findByPk($id);
        $this->render('view',array(
            'model'=>$model,
        ));

    }
    /**
     * edit user
     */
    public function actionUpdate()
    {
        $model = new LoginForm();
        $this->render('edit', array('model'=>$model));
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