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
		$this->redirect('/baby/update');
	}

    public function actionUpdate()
    {
        $baby=Baby::model()->findByPk(Yii::app()->user->id);
        if($baby)
        {
            $model=$baby;
        }
        else
        {
            $model=new Baby('update');
        }
        $record=Record::model()->findByPk(Yii::app()->user->id);
        if(isset($_POST['Baby']))
        {
            $model->attributes=$_POST['Baby'];
            $model->birthday=$_POST['Baby']['year'].'-'.$_POST['Baby']['mon'].'-'.$_POST['Baby']['day'];
            if($model->validate())
            {
                $baby=Baby::model()->findByPk(Yii::app()->user->id);
                if($baby)
                {
                    $baby->attributes=$model->attributes;
                    $baby->uid=Yii::app()->user->id;
                    if($baby->save(false))
                    {
                        $this->redirect('/record/myinfo');
                    }
                    else
                    {
                        header('Content-type: ' . 'text/html' .';charset=utf-8');
                        echo "<script>alert('修改失败');history.back(-1)</script>";
                    }
                }
                else
                {
                    $model->uid=Yii::app()->user->id;
                    if($model->save(false))
                    {
                        $this->redirect('/record/myinfo');
                    }
                    else
                    {
                        header('Content-type: ' . 'text/html' .';charset=utf-8');
                        echo "<script>alert('修改失败');history.back(-1)</script>";
                    }
                }
            }
            else
            {
                header('Content-type: ' . 'text/html' .';charset=utf-8');
                echo "<script>alert('请填写必填项');history.back(-1)</script>";
            }
        }
        $this->render('update',array('model'=>$model,'record'=>$record));
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