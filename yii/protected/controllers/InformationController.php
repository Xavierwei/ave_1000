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
		$this->redirect($this->createUrl('/information/update'));
	}

    public function actionUpdate()
    {
        $info=Information::model()->findByPk(Yii::app()->user->id);
        if($info)
        {
            $model=$info;
        }
        else
        {
            $model=new Information('update');
        }
        if(isset($_POST['Information']))
        {
            $model->attributes=$_POST['Information'];
            if($model->validate())
            {
                if($info)
                {
                    $info->attributes=$model->attributes;
                    $info->uid=Yii::app()->user->id;
                    if($info->save(false))
                    {
                        $this->redirect($this->createUrl('/record/update'));
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
                        $this->redirect($this->createUrl('/record/update'));
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

}