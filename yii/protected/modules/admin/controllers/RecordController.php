<?php

class RecordController extends BackendController
{
	private $_model;

    public function behaviors()
    {
        return array(
            'eexcelview'=>array(
                'class'=>'ext.eexcelview.EExcelBehavior',
            ),
        );
    }

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
        $post=array('status'=>'','start'=>'','stop'=>'');
		$criteria = new CDbCriteria();
        $criteria->order='createtime DESC';
        $count = Record::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 20;      
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model(),'post'=>$post));
	}

    public function actionSelect()
    {
        $post=$_REQUEST['Record'];

        $criteria = new CDbCriteria();
        $criteria->order='createtime DESC';

        if($post['status'] != '')
        {
            $criteria->addCondition('status = '.((int)$post['status']));
        }

        if($post['start'] != '')
        {
            $criteria->addCondition('createtime > '.strtotime($post['start']) . ' OR createtime = '.strtotime($post['start']));
        }

        if($post['stop'] != '')
        {
            $criteria->addCondition('createtime < '.strtotime($post['stop']) . ' OR createtime = '.strtotime($post['stop']));
        }

        $count = Record::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 20;
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model(),'post'=>$post));
    }

    public function actionExport()
    {
        $model = $game->findAll($criteria);
//        var_dump($model);

        if($model)
        {
            foreach($model as $key => $value)
            {
                $model[$key]->datetime=date('Y/m/d H:i:s',$value->datetime);
            }
            $title='Export :'.date('Y/m/d H:i:s');
            $this->toExcel($model,array(),$title);
        }
    }

	public function actionAudit(){
		$model=$this->loadModel();
		$model->status=1-$model->status;
		if($model->update()){
			Yii::app()->user->setFlash('submit','审核提交成功！');
		}else{
			Yii::app()->user->setFlash('submit','审核提交失败！');
		}
        $this->redirect($this->createUrl('select',array('Record[status]'=>$_REQUEST['Record']['status'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
	}

	public function actionAuditAll()
	{
		if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
			$id = implode("','",Yii::app()->request->getParam('id'));
			$count = Record::model()->updateAll(array("status"=>1)," `uid` in ('".$id."')");
			if($count){
				Yii::app()->user->setFlash('submit','审核提交成功！');
			}else{
				Yii::app()->user->setFlash('submit','审核提交失败！');
			}
		}
        $this->redirect($this->createUrl('select',array('Record[status]'=>$_REQUEST['Record']['status'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
	}

	public function actionUnAuditAll()
	{
		if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
			$id = implode("','",Yii::app()->request->getParam('id'));
			$count = Record::model()->updateAll(array("status"=>0)," `uid` in ('".$id."')");
			if($count){
				Yii::app()->user->setFlash('submit','审核提交成功！');
			}else{
				Yii::app()->user->setFlash('submit','审核提交失败！');
			}
		}
        $this->redirect($this->createUrl('select',array('Record[status]'=>$_REQUEST['Record']['status'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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