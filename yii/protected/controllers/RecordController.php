<?php

class RecordController extends Controller
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
		$this->redirect('record/update');
	}

    public function actionUpdate()
    {
        $record=Record::model()->findByPk(Yii::app()->user->id);
        if($record)
        {
            $model=$record;
        }
        else
        {
            $model=new Record('update');
        }
        if(isset($_POST['Record']))
        {
            $model->attributes=$_POST['Record'];
            if($model->validate())
            {
                $uid=Yii::app()->user->id;
                $record=Record::model()->findByPk($uid);
                if($record)
                {
                    $record->attributes=$model->attributes;
                    $record->uid=$uid;
                    if($record->save(false))
                    {
                        $this->redirect('/baby/update');
                    }
                    else
                    {
                        header('Content-type: ' . 'text/html' .';charset=utf-8');
                        echo "<script>alert('修改失败');history.back(-1)</script>";
                    }
                }
                else
                {
                    $model->uid=$uid;
                    if($model->save(false))
                    {
                        $this->redirect('/baby/update');
                    }
                    else
                    {
                        header('Content-type: ' . 'text/html' .';charset=utf-8');
                        echo "<script>alert('修改失败');history.back(-1)</script>";
                    }
                }
            }
        }
        $this->render('update',array('model'=>$model));
    }

    public function actionMyInfo()
    {
        $uid=Yii::app()->user->id;
        $record=Record::model()->findByPk($uid);
//        $information=Information::model()->findByPk($uid);
        $baby=Baby::model()->findByPk($uid);
        $this->render('myinfo',array('record'=>$record,'baby'=>$baby));
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