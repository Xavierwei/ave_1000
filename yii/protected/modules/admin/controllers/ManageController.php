<?php

class ManageController extends BackendController
{
	private $_model;
	public $_identity;

	public function filters()
	{
		return array(
			'accessControl',
		);

	}

	public function accessRules()
	{
		return array(
			array('allow',
				'users'=>array('*'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionLogin()
	{
		if(!Yii::app()->user->isGuest){
			$this->redirect(Yii::app()->createUrl('admin/home'));
			die();
		}

		$model = Admin::model();
		if(Yii::app()->request->getParam('Admin')){
			if($this->_identity===null){
				$this->_identity = new AdminIdentity($_POST['Admin']['username'],$_POST['Admin']['password']);
				$this->_identity->authenticate();
			}
			if($this->_identity->errorCode===UserIdentity::ERROR_NONE){
				$duration = 30*24*3600; 
				Yii::app()->user->login($this->_identity,$duration);
				$this->redirect(Yii::app()->createUrl('admin/home'));
			}else{
				$this->refresh();
			}
		}

		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		if(!Yii::app()->user->isGuest){
			Yii::app()->user->logout(false);
		}
		$this->redirect($this->createUrl('login'));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			$this->_model=Admin::model()->findByPk(Yii::app()->user->id);
		}
		if($this->_model===null){
			throw new CHttpException(404,'LoadModel无法加载模型');
		}
		return $this->_model;
	}
}