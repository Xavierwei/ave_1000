<?php

class RecordController extends BackendController
{
	private $_model;

    public function actionInfo($id)
    {
        $this->layout='//layouts/main';
        $uid=(int)$id;
        $record=Record::model()->findByPk($uid);
//        $information=Information::model()->findByPk($uid);
        $baby=Baby::model()->findByPk($uid);
        if($baby && $record)
            $this->render('userinfo',array('record'=>$record,'baby'=>$baby));
    }

	public function actionIndex()
	{
		$this->actionList();
	}

	public function actionList()
	{
		$criteria = new CDbCriteria();
        $count = Record::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 20;      
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model()));
	}

    public function actionSelect()
    {
        echo "<pre>";
        print_r($_POST);
        var_dump(isset($_POST['Record']));

        $criteria = new CDbCriteria();
        $count = Record::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 20;
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model()));
    }

	public function actionAudit(){
		$model=$this->loadModel();
		$model->status=1-$model->status;
		if($model->update()){
			Yii::app()->user->setFlash('submit','审核提交成功！');
		}else{
			Yii::app()->user->setFlash('submit','审核提交失败！');
		}
		$this->redirect(array('list'));
	}

	public function actionAuditAll()
	{
		if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
			$id = implode("','",Yii::app()->request->getParam('id'));
			$count = Record::model()->updateAll(array("status"=>1)," `id` in ('".$id."')");
			if($count){
				Yii::app()->user->setFlash('submit','审核提交成功！');
			}else{
				Yii::app()->user->setFlash('submit','审核提交失败！');
			}
		}
		$this->redirect(array('list'));
	}

	public function actionUnAuditAll()
	{
		if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
			$id = implode("','",Yii::app()->request->getParam('id'));
			$count = Record::model()->updateAll(array("status"=>0)," `id` in ('".$id."')");
			if($count){
				Yii::app()->user->setFlash('submit','审核提交成功！');
			}else{
				Yii::app()->user->setFlash('submit','审核提交失败！');
			}
		}
		$this->redirect(array('list'));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(Yii::app()->request->getParam('id'))
			{
				$this->_model=Record::model()->findByPk(Yii::app()->request->getParam('id'));
			}
			if($this->_model===null){
				throw new CHttpException(404,'LoadModel无法加载模型');
			}
		}
		return $this->_model;
	}
}