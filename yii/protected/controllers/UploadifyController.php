<?php

class UploadifyController extends Controller
{

    /**
     * 上传
     */
    public function actionBasicExecute()
    {
        if ( XUtils::method() == 'POST' ) {

            $file = XUpload::upload( $_FILES['upfile'] ,array( 'thumb'=>false, 'thumbSize'=>array ( 400 , 250 ) ) );
            if ( is_array( $file ) ) {
                $model = new Upload();
                $model->user_id = $_SESSION['_userUserId'];
                $model->file_name = $file['pathname'];
                $model->thumb_name = $file['paththumbname'];
                $model->real_name = $file['name'];
                $model->file_ext = $file['extension'];
                $model->file_mime = $file['type'];
                $model->file_size = $file['size'];
                $model->save_path = $file['savepath'];
                $model->hash = $file['hash'];
                $model->save_name = $file['savename'];
                $model->create_time = time();
                
                if ( $model->save() ) {
                    exit( CJSON::encode( array ( 'state' => 'success' , 'fileId'=>$model->id, 'realFile'=>$model->real_name, 'message' => '上传成功' , 'file' =>  $file['pathname'] ) ) );
                } else {
                    @unlink( $file['pathname'] );
                    exit( CJSON::encode( array ( 'state' => 'error' , 'message' => '数据写入失败，上传错误' ) ) );
                }
            } else {
                exit( CJSON::encode( array ( 'error' => 1 , 'message' => '上传错误' ) ) );
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
