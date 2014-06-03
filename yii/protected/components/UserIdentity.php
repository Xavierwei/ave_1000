<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $_user;
    private $_username;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        die;
		$user=User::model()->find('LOWER(username)=:username',array(':username'=>strtolower($this->username)));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($user->roletype == User::WEIBO_TYPE  && isset(Yii::app()->session['token']) && Yii::app()->session['token']['uid'] == $this->username) //微博用户免密码
        {
            Yii::import('ext.sinaWeibo.SinaWeibo',true);
            $c = new SaeTClientV2( WB_AKEY , WB_SKEY ,  Yii::app()->session['token']['access_token'] );
            $user_message = $c->show_user_by_id( $this->username);//根据ID获取用户等基本信息

                $this->_id=$user->uid;
                $this->_username=$user_message['name'];
                $this->_user['uid']=$user->uid;
                $this->_user['username']=$user_message['name'];
                $this->_user['roletype']=$user->roletype;
                $this->setState("_user", $this->_user);

                User::model()->findByPk($this->_id)->save(false);      //记录最后登录ip，最后登陆时间
                $this->errorCode=self::ERROR_NONE;
        }
        else if($user->hashPassword($this->password) !== $user->password) //校验密码
        {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id=$user->uid;
            $this->_user['uid']=$user->uid;
            $this->_username=$user->username;
            $this->_user['username']=$user->username;
            $this->_user['roletype']=$user->roletype;
            $this->setState("_user", $this->_user);

            User::model()->findByPk($this->_id)->save(false);
            $this->errorCode=self::ERROR_NONE;
        }

        return $this->errorCode==self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getName()
    {
        return $this->_username;
    }
}