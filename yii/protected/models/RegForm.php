<?php


class RegForm extends CFormModel
{
	public $username;
	public $password;
    public $password2;
    public $email;



    /**
     * @param string $attribute
     * @param string $error
     * 重写表单验证弹出错误方法
     */
    public function addError($attribute,$error)
    {
        parent::addError($error,$error);
        if($attribute == 'uniqueUser')      //用户名不唯一才弹出
        {
            header('Content-type: ' . 'text/html' .';charset=utf-8');
            echo "<script>alert('".$error."');</script>";
        }
    }

	public function rules()
	{
		return array(
			array('username', 'required'),
            array('password', 'required'),
            array('password2', 'required'),
            array('email', 'required'),
            array('email', 'email', 'message'=>'请填写正确的email'),
            array('username', 'required'),
            array("password2","compare","compareAttribute"=>"password","message"=>"两次密码不一致"),
            array('username','oCheckUser'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'用户名',
            'password'=>'密码',
            'password2'=>'确认密码',
            'email'=>'邮箱',
		);
	}

    /**
     * 检查用户名是否被注册
     */
    public function oCheckUser($attribute,$params)
    {
        if(!User::model()->uniqueUser($this->username))
            return true;
        else
            $this->addError('uniqueUser','该用户名已被注册');
    }

//	/**
//	 * Authenticates the password.
//	 * This is the 'authenticate' validator as declared in rules().
//	 */
//	public function authenticate($attribute,$params)
//	{
//		if(!$this->hasErrors())
//		{
//			$this->_identity=new UserIdentity($this->username,$this->password);
//			if(!$this->_identity->authenticate())
//				$this->addError('password','Incorrect username or password.');
//		}
//	}

}
