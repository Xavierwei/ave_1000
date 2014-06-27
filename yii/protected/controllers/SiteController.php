<?php

class SiteController extends Controller
{
//	/**
//	 * Declares class-based actions.
//	 */
//	public function actions()
//	{
//		return array(
//			// captcha action renders the CAPTCHA image displayed on the contact page
//			'captcha'=>array(
//				'class'=>'CCaptchaAction',
//				'backColor'=>0xFFFFFF,
//			),
//			// page action renders "static" pages stored under 'protected/views/site/pages'
//			// They can be accessed via: index.php?r=site/page&view=FileName
//			'page'=>array(
//				'class'=>'CViewAction',
//			),
//		);
//	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        if(!Drtool::getMyCookie('visitIndex'))
        {
            Drtool::setMyCookie('visitIndex',Drtool::randomNew(),0.5);
            $model=new Visit;
            $model->ip=Yii::app()->request->userHostAddress;
            $model->save(false);
        }
        $recordCount=Record::model()->count();
        $recordCount = $recordCount ? $recordCount : 0;
        $visitCount=Visit::model()->count();
        $visitCount = $visitCount ? $visitCount : 0;

        $record=Baby::model()->with('record')->findAll(
            array(
                'condition' => 'status = :status',
                'params'   => array(':status' => Record::ALLOW_STATUS ),
                'limit' => 15,
                'order'=>'t.createtime DESC',
            )
        );
		$this->render('index',array('recordCount'=>$recordCount,'visitCount'=>$visitCount,'record'=>$record));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionBaike()
    {
        $this->render('baike');
    }

    public function actionCarefor()
    {
        $this->render('carefor');
    }

    public function actionActivity()
    {
        $record=Baby::model()->with('record')->findAll(
            array(
                'condition' => 'status = :status',
                'params'   => array(':status' => Record::ALLOW_STATUS ),
                'limit' => 15,
                'order'=>'t.createtime DESC',
            )
        );
        $this->render('activity',array('record'=>$record));
    }



//	/**
//	 * Displays the contact page
//	 */
//	public function actionContact()
//	{
//		$model=new ContactForm;
//		if(isset($_POST['ContactForm']))
//		{
//			$model->attributes=$_POST['ContactForm'];
//			if($model->validate())
//			{
//				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
//				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
//				$headers="From: $name <{$model->email}>\r\n".
//					"Reply-To: {$model->email}\r\n".
//					"MIME-Version: 1.0\r\n".
//					"Content-Type: text/plain; charset=UTF-8";
//
//				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
//				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
//				$this->refresh();
//			}
//		}
//		$this->render('contact',array('model'=>$model));
//	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        if(!Yii::app()->user->isGuest)          //已经登陆跳转首页
        {
            $this->redirect(Yii::app()->homeUrl);
        }

		$model=new LoginForm('general');
        $regmodel=new RegForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->createUrl('/information/update'));
		}
		// display the login form
		$this->render('login',array('model'=>$model,'regmodel'=>$regmodel));
	}

    /**
     * 普通注册
     */
    public function actionReg()
    {
        if(!Yii::app()->user->isGuest)          //已经登陆跳转首页
        {
            $this->redirect(Yii::app()->homeUrl);
        }

        $model=new RegForm;
		if(isset($_POST['RegForm']))
        {
            $model->attributes=$_POST['RegForm'];
            if($model->validate())
            {
                $user=new User();
                $user->attributes=$model->attributes;
                $user->roletype=$user::GENERAL_TYPE;    //普通用户
                if($user->save(false))
                {
                    $login=new LoginForm('general');
                    $login->attributes=$user->attributes;
                    $login->password=$model->password;
                    if($login->login())
                    {
                        $this->redirect(Yii::app()->createUrl('/information/update'));
				        //$this->redirect(Yii::app()->user->returnUrl);
                    }
                }
                else
                {
                    header('Content-type: ' . 'text/html' .';charset=utf-8');
                    echo "<script>alert('注册失败');history.back(-1)</script>";
                }
            }
            //$this->redirect(Yii::app()->user->returnUrl);
        }

//		$this->render('reg',array('model'=>$model));
        $this->redirect($this->createUrl('/site/login'));
    }

    /**
     * 微博注册
     */
    public function actionWeiBoReg()
    {
        if(!Yii::app()->user->isGuest)          //已经登陆跳转首页
        {
            $this->redirect(Yii::app()->homeUrl);
        }
        if(isset(Yii::app()->session['token']))
        {
            $model=new User('weibo');
            if($model->uniqueUser(Yii::app()->session['token']['uid']))       //查询该微博号是否已经注册过
            {
                $model=new LoginForm;
                $model->username=Yii::app()->session['token']['uid'];
                if($model->validate() && $model->login())
                    $this->redirect(Yii::app()->homeUrl);
                else
                {
                    header('Content-type: ' . 'text/html' .';charset=utf-8');
                    echo "<script>alert('登陆失败');history.back(-1)</script>";
                }
            }
            else        //未注册
            {
                $model->username=Yii::app()->session['token']['uid'];
                $model->roletype=$model::WEIBO_TYPE;
                if($model->save(false))
                {
//                    echo "<script>alert('注册成功');</script>";
                    $model=new LoginForm;
                    $model->username=Yii::app()->session['token']['uid'];
                    $model->login();
//                    $this->redirect(Yii::app()->createUrl('/site/activity'));
                    header('Content-type: ' . 'text/html' .';charset=utf-8');
                    echo "<script>alert('注册成功');location.replace('".Yii::app()->createUrl('/site/activity')."')</script>";
                }
                else
                {
                    header('Content-type: ' . 'text/html' .';charset=utf-8');
                    echo "<script>alert('注册失败');history.back(-1)</script>";
                }
            }
        }
        else
        {
            echo '错误访问';
        }
    }

    /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}