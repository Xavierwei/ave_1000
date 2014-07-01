<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));

        $this->defaultController="home";      //设置默认控制器

        Yii::app()->setComponents(
            array(
                'user'=>array(
                    'class'=>'AdminWebUser',
                    'stateKeyPrefix'=>'admin',
                    'loginUrl'=>Yii::app()->createUrl('admin/manage/login'),
                    'allowAutoLogin'=>true,
                    'autoRenewCookie'=>true,
                )
            )
        );

        Yii::app()->setParams(
            array(
                'menu'=>array(
                    array(
                        array('name'=>'用户查看','com'=>'user','root'=>1,'list'=>1,'creat'=>0,'edit'=>0,'audit'=>0,'visible'=>1),
                    ),
                    array(
                        array('name'=>'患病儿童','com'=>'Record','root'=>1,'list'=>0,'creat'=>0,'edit'=>0,'audit'=>1,'visible'=>1),
                    ),
//                    array(
//                        array('name'=>'马利宝 壁纸','com'=>'news/index/id/12','root'=>1,'list'=>0,'creat'=>0,'edit'=>0,'audit'=>1,'visible'=>1),
//                    ),
//                    array(
//                        array('name'=>'添加新闻','com'=>'product/creat','root'=>1,'list'=>0,'creat'=>0,'edit'=>0,'audit'=>1,'visible'=>1),
//                    ),
//                    array(
//                        array('name'=>'添加壁纸','com'=>'news/creat','root'=>1,'list'=>0,'creat'=>0,'edit'=>0,'audit'=>1,'visible'=>1),
//                    ),
//                    array(
//                        array('name'=>'视频大赛','com'=>'activities/index','root'=>1,'list'=>0,'creat'=>0,'edit'=>0,'audit'=>1,'visible'=>1),
//                    ),
//                    array(
//                        array('name'=>'添加视频','com'=>'activities/creat','root'=>1,'list'=>0,'creat'=>0,'edit'=>0,'audit'=>1,'visible'=>1),
//                    ),
                )
            )
        );
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
