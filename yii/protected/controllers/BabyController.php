<?php

class BabyController extends Controller
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
        $model=new Baby('update');

        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='baby-update-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['Baby']))
        {
            $model->attributes=$_POST['Baby'];
            if($model->validate())
            {
                $baby=Baby::model()->findByPk(Yii::app()->user->id);
                if($baby)
                {
                    $baby->attributes=$model->attributes;
                    $baby->uid=Yii::app()->user->id;
                    if($baby->save(false))
                    {
                        echo "修改成功";
                    }
                    else
                    {
                        echo "修改失败";
                    }
                }
                else
                {
                    $model->uid=Yii::app()->user->id;
                    if($model->save(false))
                    {
                        echo "修改成功";
                    }
                    else
                    {
                        echo "修改失败";
                    }
                }
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