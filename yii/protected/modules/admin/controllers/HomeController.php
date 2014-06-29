<?php

class HomeController extends BackendController
{
	public $_model;


	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionHeader()
	{
		$this->render('header');
	}

	public function actionSidebar()
	{
        echo "actionSidebar";
//		$this->render('sidebar');
	}

	public function actionContent()
	{
		$this->redirect(array('user/index'));
	}
}