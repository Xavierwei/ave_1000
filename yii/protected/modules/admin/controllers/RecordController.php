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
        $post=array('status'=>'','start'=>'','stop'=>'','pageNum'=>'1');
        $post['pageNum'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$criteria = new CDbCriteria();
        $criteria->order='createtime DESC';
        $count = Record::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 15;
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model(),'post'=>$post));
	}

    public function actionSelect()
    {
        $post=$_REQUEST['Record'];
        $post['pageNum'] = isset($_GET['page']) ? $_GET['page'] : 1;

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
        $pager->pageSize = 15;
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model(),'post'=>$post));
    }

    public function actionExport()
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

        $criteria->select='uid,username,email,roletype,name,nickname,parent,sex,birthday,address,city,tel,reason,status,createtime';
        $data = VUser::model()->findAll($criteria);
        $temp=array();
        foreach($data as $key=>$value)
        {
            $value->birthday=substr($value->birthday,0,11);
            $value->roletype = $value->roletype == User::GENERAL_TYPE ? '标准用户' : '微博用户';
            $value->status = $value->status == Record::ALLOW_STATUS ? '已审核' : '未审核';
            $value->createtime=date('Y-m-H',$value->createtime);
            $temp[]=$value;
        }

        if($temp)
        {
            $title='患病儿童 :'.$post['start'].'-'.$post['stop'];
            $this->toExcel($temp,array(),$title);
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
        $this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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
        $this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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
        $this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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