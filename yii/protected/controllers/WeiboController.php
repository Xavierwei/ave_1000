<?php
class WeiboController extends Controller
{
    public function init()
    {
        Yii::import('ext.sinaWeibo.SinaWeibo',true);
    }

	public function actionIndex()
    {
		$weiboService=new SinaWeibo(WB_AKEY, WB_SKEY);
		$code_url = $weiboService->getAuthorizeURL( WB_CALLBACK_URL );
        $this->redirect($code_url);
    }

	public function actionCallback()
    {
		$weiboService=new SinaWeibo(WB_AKEY, WB_SKEY);
		if (isset($_REQUEST['code']))
        {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try
            {
				$token = $weiboService->getAccessToken( 'code', $keys ) ;
			}
            catch (OAuthException $e)
            {

			}
		}
		if (isset($token))
        {
            $c = new SaeTClientV2( WB_AKEY , WB_SKEY ,  Yii::app()->session['token']['access_token'] );
            $user_message = $c->show_user_by_id( Yii::app()->session['token']['uid']);//根据ID获取用户等基本信息

            if(isset($user_message['name']))
            {
                Yii::app()->session['token']=$token;
                $this->redirect('/Site/WeiBoReg');  //跳转检查微博注册
            }
            else
            {
                header('Content-type: ' . 'text/html' .';charset=utf-8');
                echo "<script>alert('微博未授权');history.back(-1)</script>";
            }
		}
        else
        {
            echo "<script>alert('认证失败');history.back(-1)</script>";
		}
	}

	public function actionWeibolist()
    {
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY ,  Yii::app()->session['token']['access_token'] );
		$ms  = $c->home_timeline(); // done
		var_dump($ms);exit;
		$uid_get = $c->get_uid();
		$uid = $uid_get['uid'];
		$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
        print_r($user_message);
	}

	
	
	
	
	
	
	
}