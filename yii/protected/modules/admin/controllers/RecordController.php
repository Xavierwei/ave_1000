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
        $post=array('status'=>'','mark'=>'','start'=>'','stop'=>'','pageNum'=>'1','sex'=>'',
                             'age_start'=>'','age_stop'=>'','point_hospital'=>'请选择推荐医院','point_city'=>'请选择所在城市',
                             'province'=>'请选择','city'=>'请选择');
        $post['pageNum'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$criteria = new CDbCriteria();
        $criteria->with='baby';
        $criteria->order='t.uid DESC';
        $criteria->addCondition("name != ''");
        $count = Record::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 15;
        $pager->applyLimit($criteria);
        $data = Record::model()->findAll($criteria);
//        echo "<pre>";
//        print_r($data);
//        die;
        $this->render('list',array('data'=>$data,'page'=>$pager,'model'=>Record::model(),'post'=>$post));
	}

    public function actionSelect()
    {
        $post=$_REQUEST['Record'];
        $post['pageNum'] = isset($_GET['page']) ? $_GET['page'] : 1;

        $criteria = new CDbCriteria();
        $criteria->with='baby';
        $criteria->order='t.uid DESC';
        $criteria->addCondition("name != ''");

        if($post['status'] != '')
        {
            $criteria->addCondition('status = '.((int)$post['status']));
        }

	    if($post['mark'] != '')
	    {
		    $criteria->addCondition('mark = '.((int)$post['mark']));
	    }

        if($post['sex'] != '')
        {
            $criteria->addCondition("baby.sex = '".$post['sex'] . "'");
        }

        if($post['start'] != '')
        {
            $criteria->addCondition('t.createtime > '.strtotime($post['start']) . ' OR t.createtime = '.strtotime($post['start']));
        }

        if($post['stop'] != '')
        {
            $criteria->addCondition('t.createtime < '.strtotime($post['stop']) . ' OR t.createtime = '.strtotime($post['stop']));
        }

        if($post['age_stop'] != '')
        {
            $criteria->addCondition("birthday > '".date("Y-m-d H:i:s",mktime(0,0,0,1,1,date('Y',time())-1-$post['age_stop'])) . "'" . " OR birthday = '" .date("Y-m-d H:i:s",mktime(0,0,0,1,1,date('Y',time())-1-$post['age_stop'])) . "'");
        }

        if($post['age_start'] != '')
        {
            $criteria->addCondition("birthday < '".date("Y-m-d H:i:s",mktime(24,60,60,12,31,date('Y',time())-$post['age_start'])) . "'" . " OR birthday = '".date("Y-m-d H:i:s",mktime(24,60,60,12,31,date('Y',time())-$post['age_start']))  . "'");
        }

        if($post['point_city'] != '' && $post['point_city']!="请选择所在城市")
        {
            $criteria->addCondition("point_city = '". $post['point_city']. "'");
        }

        if($post['point_hospital'] != '' && $post['point_hospital']!="请选择推荐医院")
        {
            $criteria->addCondition("point_hospital = '". $post['point_hospital']. "'");
        }

        if($post['city'] != '' && $post['city']!="请选择")
        {
            $criteria->addCondition("city = '". $post['city']. "'");
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
        $criteria->order='uid DESC';
        $criteria->addCondition("name != ''");

        if($post['status'] != '')
        {
            $criteria->addCondition('status = '.((int)$post['status']));
        }

	    if($post['mark'] != '')
	    {
		    $criteria->addCondition('mark = '.((int)$post['mark']));
	    }

        if($post['sex'] != '')
        {
            $criteria->addCondition("sex = '".$post['sex'] . "'");
        }

        if($post['start'] != '')
        {
            $criteria->addCondition('createtime > '.strtotime($post['start']) . ' OR createtime = '.strtotime($post['start']));
        }

        if($post['stop'] != '')
        {
            $criteria->addCondition('createtime < '.strtotime($post['stop']) . ' OR createtime = '.strtotime($post['stop']));
        }

        if($post['age_stop'] != '')
        {
            $criteria->addCondition("birthday > '".date("Y-m-d H:i:s",mktime(0,0,0,1,1,date('Y',time())-1-$post['age_stop'])) . "'" . " OR birthday = '" .date("Y-m-d H:i:s",mktime(0,0,0,1,1,date('Y',time())-1-$post['age_stop'])) . "'");
        }

        if($post['age_start'] != '')
        {
            $criteria->addCondition("birthday < '".date("Y-m-d H:i:s",mktime(24,60,60,12,31,date('Y',time())-$post['age_start'])) . "'" . " OR birthday = '".date("Y-m-d H:i:s",mktime(24,60,60,12,31,date('Y',time())-$post['age_start']))  . "'");
        }

        if($post['point_city'] != '' && $post['point_city']!="请选择所在城市")
        {
            $criteria->addCondition("point_city = '". $post['point_city']. "'");
        }

        if($post['point_hospital'] != '' && $post['point_hospital']!="请选择推荐医院")
        {
            $criteria->addCondition("point_hospital = '". $post['point_hospital']. "'");
        }

        if($post['city'] != '' && $post['city']!="请选择")
        {
            $criteria->addCondition("city = '". $post['city']. "'");
        }

        $criteria->select='uid,username,email,roletype,name,nickname,parent,sex,birthday,address,city,tel,reason,status,createtime,avatar,photo1,photo2,photo3,`case`';
        $data = VUser::model()->findAll($criteria);
        $temp=array();
        foreach($data as $key=>$value)
        {
            $value->birthday=substr($value->birthday,0,11);
            $value->roletype = $value->roletype == User::GENERAL_TYPE ? '标准用户' : '微博用户';
            $value->status = $value->status == Record::ALLOW_STATUS ? '已审核' : '未审核';
            $value->createtime=date('Y-m-H',$value->createtime);
            $value->avatar= $value->avatar == '' ? '' : Yii::app()->request->hostInfo . Yii::app()->baseUrl . str_replace('_thumb','',$value->avatar);
            $value->photo1=$value->photo1 == '' ? '' : Yii::app()->request->hostInfo . Yii::app()->baseUrl . str_replace('_thumb','',$value->photo1);
            $value->photo2=$value->photo2 == '' ? '' : Yii::app()->request->hostInfo . Yii::app()->baseUrl . str_replace('_thumb','',$value->photo2);
            $value->photo3=$value->photo3 == '' ? '' : Yii::app()->request->hostInfo . Yii::app()->baseUrl . str_replace('_thumb','',$value->photo3);
            $value->case    =$value->case == '' ? '' : Yii::app()->request->hostInfo . Yii::app()->baseUrl . str_replace('_thumb','',$value->case);

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
        $this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[province]'=>$_REQUEST['Record']['province'],'Record[city]'=>$_REQUEST['Record']['city'],'Record[point_hospital]'=>$_REQUEST['Record']['point_hospital'],'Record[point_city]'=>$_REQUEST['Record']['point_city'],'Record[age_start]'=>$_REQUEST['Record']['age_start'],'Record[age_stop]'=>$_REQUEST['Record']['age_stop'],'Record[sex]'=>$_REQUEST['Record']['sex'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[mark]'=>$_REQUEST['Record']['mark'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
	}

	public function actionMark(){
		$model=$this->loadModel();
		$model->mark=1-$model->mark;
		if($model->update()){
			Yii::app()->user->setFlash('submit','标记成功！');
		}else{
			Yii::app()->user->setFlash('submit','标记失败！');
		}
		$this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[province]'=>$_REQUEST['Record']['province'],'Record[city]'=>$_REQUEST['Record']['city'],'Record[point_hospital]'=>$_REQUEST['Record']['point_hospital'],'Record[point_city]'=>$_REQUEST['Record']['point_city'],'Record[age_start]'=>$_REQUEST['Record']['age_start'],'Record[age_stop]'=>$_REQUEST['Record']['age_stop'],'Record[sex]'=>$_REQUEST['Record']['sex'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[mark]'=>$_REQUEST['Record']['mark'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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
        $this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[province]'=>$_REQUEST['Record']['province'],'Record[city]'=>$_REQUEST['Record']['city'],'Record[point_hospital]'=>$_REQUEST['Record']['point_hospital'],'Record[point_city]'=>$_REQUEST['Record']['point_city'],'Record[age_start]'=>$_REQUEST['Record']['age_start'],'Record[age_stop]'=>$_REQUEST['Record']['age_stop'],'Record[sex]'=>$_REQUEST['Record']['sex'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[mark]'=>$_REQUEST['Record']['mark'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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
        $this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[province]'=>$_REQUEST['Record']['province'],'Record[city]'=>$_REQUEST['Record']['city'],'Record[point_hospital]'=>$_REQUEST['Record']['point_hospital'],'Record[point_city]'=>$_REQUEST['Record']['point_city'],'Record[age_start]'=>$_REQUEST['Record']['age_start'],'Record[age_stop]'=>$_REQUEST['Record']['age_stop'],'Record[sex]'=>$_REQUEST['Record']['sex'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[mark]'=>$_REQUEST['Record']['mark'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
	}

	public function actionMarkAll()
	{
		if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
			$id = implode("','",Yii::app()->request->getParam('id'));
			$count = Record::model()->updateAll(array("mark"=>1)," `uid` in ('".$id."')");
			if($count){
				Yii::app()->user->setFlash('submit','标记成功！');
			}else{
				Yii::app()->user->setFlash('submit','标记失败！');
			}
		}
		$this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[province]'=>$_REQUEST['Record']['province'],'Record[city]'=>$_REQUEST['Record']['city'],'Record[point_hospital]'=>$_REQUEST['Record']['point_hospital'],'Record[point_city]'=>$_REQUEST['Record']['point_city'],'Record[age_start]'=>$_REQUEST['Record']['age_start'],'Record[age_stop]'=>$_REQUEST['Record']['age_stop'],'Record[sex]'=>$_REQUEST['Record']['sex'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[mark]'=>$_REQUEST['Record']['mark'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
	}

	public function actionUnMarkAll()
	{
		if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
			$id = implode("','",Yii::app()->request->getParam('id'));
			$count = Record::model()->updateAll(array("mark"=>0)," `uid` in ('".$id."')");
			if($count){
				Yii::app()->user->setFlash('submit','标记成功！');
			}else{
				Yii::app()->user->setFlash('submit','标记失败！');
			}
		}
		$this->redirect($this->createUrl('select',array('page'=>$_GET['page'],'Record[province]'=>$_REQUEST['Record']['province'],'Record[city]'=>$_REQUEST['Record']['city'],'Record[point_hospital]'=>$_REQUEST['Record']['point_hospital'],'Record[point_city]'=>$_REQUEST['Record']['point_city'],'Record[age_start]'=>$_REQUEST['Record']['age_start'],'Record[age_stop]'=>$_REQUEST['Record']['age_stop'],'Record[sex]'=>$_REQUEST['Record']['sex'],'Record[status]'=>$_REQUEST['Record']['status'],'Record[mark]'=>$_REQUEST['Record']['mark'],'Record[start]'=>$_REQUEST['Record']['start'],'Record[stop]'=>$_REQUEST['Record']['stop'])));
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