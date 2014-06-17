<?php

class SiteController extends Controller
{
    //public $layout = false;

    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
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
            $this->redirect('/admin/site/login');
        }
        $this->render('index');
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
            $this->redirect('/admin/site/index');
        }
        $model = new LoginForm();
        $model->scenario = 'login';

        if(isset($_POST['LoginForm'])){
            $model->attributes = $_POST['LoginForm'];
            if($model->validate() && $model->login()){
                $this->redirect('/admin/site/index');
            }
        }
        $this->layout = false;
        $this->render('login', array('model' => $model));
    }

    /**
     *
     */
    public function actionLogout()
    {
        yii::app()->user->logout();
        $this->redirect('login');
    }

}