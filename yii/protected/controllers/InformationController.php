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
		$this->redirect('/information/update');
	}

    public function actionUpdate()
    {
        $model=new Information('update');
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

}