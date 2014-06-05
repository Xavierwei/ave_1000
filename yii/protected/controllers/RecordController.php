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
		$this->redirect($this->createUrl('/record/update'));
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
                if($record)
                {
                    $record->attributes=$model->attributes;
                    $record->uid=Yii::app()->user->id;
                    if($record->save(false))
                    {
                        $this->redirect($this->createUrl('/baby/update'));
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
                        $this->redirect($this->createUrl('/baby/update'));
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
        if($baby && $record)
            $this->render('myinfo',array('record'=>$record,'baby'=>$baby));
        else
            $this->redirect($this->createUrl('/record/update'));
    }

    public function actionOtherInfo($id)
    {
        $uid=(int)$id;
        $baby=Baby::model()->with('record')->find(
            array(
                'condition' => 'record.uid = :uid AND status = :status',
                'params'   => array(':uid' => $uid ,':status' => Record::ALLOW_STATUS ),
            )
        );
        if($baby)
        {
            $avatar = $baby->sex == '男' ? '/images/defaultAvatar/boy_' . rand(1,2) . '.jpg' :  '/images/defaultAvatar/girl_' . rand(1,2) . '.jpg' ;
            $this->render('otherinfo',array('baby'=>$baby,'avatar'=>$avatar));
        }
        else
            $this->redirect(Yii::app()->baseUrl);
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