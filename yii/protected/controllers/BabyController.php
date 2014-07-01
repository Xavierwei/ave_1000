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
		$this->redirect($this->createUrl('/baby/update'));
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
            //$model->attributes=$_POST['Baby'];

            $model->name = $_POST['Baby']['name'];
            $model->city = $_POST['Baby']['city'];
            $model->nickname = $_POST['Baby']['nickname'];
            $model->address = $_POST['Baby']['address'];
            $model->sex = $_POST['Baby']['sex'];
            $model->tel = $_POST['Baby']['tel'];
            $model->parent = $_POST['Baby']['parent'];
            $model->tel = $_POST['Baby']['tel'];
            $model->reason = $_POST['Baby']['reason'];

            $model->birthday=$_POST['Baby']['year'].'-'.$_POST['Baby']['mon'].'-'.$_POST['Baby']['day'];
            if($model->validate())
            {
                if($baby)
                {
                    $baby->attributes=$model->attributes;
                    $baby->uid=Yii::app()->user->id;
                    if($baby->save(false))
                    {
                        $this->redirect($this->createUrl('/record/myinfo?update=1'));
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
                        $this->redirect($this->createUrl('/record/myinfo?update=1'));
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


}