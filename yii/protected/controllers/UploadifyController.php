<?php

class UploadifyController extends Controller
{

    public function init()
    {
        if(Yii::app()->user->isGuest)          //未登陆跳转登录页
        {
            $this->redirect(Yii::app()->createUrl('/site/login'));
        }
    }

    public function actionUploadOne()
    {
        if (!empty($_FILES))
        {
            $uid=Yii::app()->user->id;                          //获取当前用户id
            Yii::import('application.vendor.oUpload'); //导入文件上传处理类
            $basePath = Yii::app()->basePath . '/..';
            $savePath='/upload/'. $uid .'/'.date('Y/n/');                                        //设置头像保存路径
            Drtool::mkPath($basePath.$savePath);                                                          //创建目录
            $fileFormat = explode(',',Yii::app()->params['ImgAllowMime']);                             //允许的文件类型
            $upNew = new oUpload($basePath.$savePath, $fileFormat);           //初始化上传类
            $saveName=$uid. '_' . md5(time().rand(0,9999));             //设置保存名称
            $upNew->setSavename($saveName);                                         //赋值保存文件名

            //上传错误返回信息
            foreach($_FILES as $key => $file) {
                if (!$upNew->run($key,1))
                {
                    //通过$upNew->errmsg()只能得到最后一个出错的信息，
                    //详细的信息在$upNew->getInfo()中可以得到。
                    echo CJSON::encode( array ( 'state' => 'error' , 'message' => '上传错误,请重试' )  );
                }
                else
                {
                    $fileInfo = $upNew->getInfo();
                    echo CJSON::encode( array ( 'state' => 'success' ,  'message' => '上传成功' , 'file' =>  $savePath . $fileInfo[0]['thumbSaveName'] ) );
                }
            }

        }
    }

    /**
     * 删除附件
     * @return [type] [description]
     */
    public function actionRemove()
    {
        $fileupId = intval( $this->_gets->getParam( 'fileupId' ) );
        try {
            $imageModel = Upload::model()->findByPk( $fileupId );
            if($imageModel->issubmit==0 & (($_SESSION['_userUserId']==$imageModel->user_id) | ($imageModel->user_id==0 & $_SESSION['_userUserId']==NULL)) )
            {
                if ( $imageModel ==false )
                    throw new Exception( "附件已经被删除" );
                @unlink( $imageModel->file_name );
                @unlink( $imageModel->thumb_name );
                if ( !$imageModel->delete() )
                    throw new Exception( "数据删除失败" );
                $var['state'] = 'success';
                $var['message'] = '删除完成';
            }
            else throw new Exception( "数据删除失败" );
        } catch ( Exception $e ) {
            $var['state'] = 'errro';
            $var['message'] = '失败：'.$e->getMessage();
        }
        exit( CJSON::encode( $var ) );
    }



}
