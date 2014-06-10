<?php
/**
 * class name UserController
 * author: qilin
 * time: 14-6-7 21:44
 */

class UserController extends Controller
{
    //public $layout = 'application.modules.admin.views.layouts.main';
    public $defaultController = 'login';
 //   public  $layout = 'application.modules.admin.views.layouts.column1';
    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xF5F5F5,
                'maxLength' => 4,
                'minLength' => 4,
                'height' => rand(48, 50),
                'width' => 100,
                'foreColor' => 0x4098e6,
            ),
            'page' => array(
                'class' => 'CViewAction'
            )
        );
    }

    /**
     * accessRules
     * 对匿名说no
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array('login','captcha'),
                'users' => array('?')
            ),
            array(
                'deny',
                'users' => array('?')
            )
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        if (yii::app()->user->isGuest){
            $this->redirect('admin/user/login');
        }
        $this->renderPartial('frame');
    }

    /**
     * error handle
     * this is action to user to deals with handle exceptions
     */
    public function actionErrors()
    {
        if($error = yii::app()->errorHandle->error){
            if(yii::app()->request->isAjax){
                echo $error['message'];
            } else {
                echo $this->render('error', $error);
            }
        }
    }

    /**
     * this is render login page
     */
    public function actionLogin()
    {
        if(!yii::app()->user->isGuest){
            $this->redirect(yii::app()->homeUrl);
        }
        $model = new LoginForm();
        $model->scenario = 'login';

        if(isset($_POST['LoginForm'])){
            $model->attributes = $_POST['LoginForm'];
            if($model->validate() && $model->login()){
                $this->redirect(yii::app()->homeUrl);
            }
        }
        $this->render('login', array('model' => $model));
    }

    /**
     * edit user
     */
    public function actionEdit()
    {
        $model = new LoginForm();

        $this->render('edit', array('model'=>$model));
    }
} 