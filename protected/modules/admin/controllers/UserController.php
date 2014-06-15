<?php
/**
 * class name UserController
 * author: qilin
 * time: 14-6-7 21:44
 */

class UserController extends Controller
{
    public $defaultController = 'login';
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
        $model = new User();
        if(isset($_POST['User'])){

        }
        $this->render('add',array('model'=>$model));
    }
    /**
     * edit user
     */
    public function actionEdit()
    {
        $model = new LoginForm();
        echo Utils::pbkdf2('sha256', 'admin', '9izq', 10000);exit;
        $this->render('edit', array('model'=>$model));
    }
} 