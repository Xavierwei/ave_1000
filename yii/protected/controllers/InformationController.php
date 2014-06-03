<?php

class InformationController extends Controller
{
    public function init()
    {
        if(Yii::app()->user->isGuest)          //未登陆跳转登录页
        {
            $this->redirect(Yii::app()->createUrl('/site/login'));
        }
    }

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionUpdate()
    {
        $model=new Information('update');

        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='information-update-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['Information']))
        {
            $model->attributes=$_POST['Information'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('update',array('model'=>$model));
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}