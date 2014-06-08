<?php

class DefaultController extends Controller
{
    public $layout='//admin/layouts/column2';
	public function actionIndex()
	{
        if(!yii::app()->user->id){
            $this->redirect('/admin/user/login');
        }
		$this->render('index');
	}
}