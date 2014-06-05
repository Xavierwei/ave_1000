<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $uid
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $roletype
 * @property string $createtime
 * @property string $updatetime
 * @property string $lastip
 *
 * The followings are the available model relations:
 * @property Baby $baby
 * @property Information $information
 * @property Record $record
 */
class User extends OrionModel
{
    const WEIBO_TYPE = 2;   //微博用户
    const GENERAL_TYPE =1; //普通用户

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password, lastip', 'required'),
			array('roletype', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>60),
			array('email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>254),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, username, email, password, roletype, createtime, updatetime, lastip', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'baby' => array(self::HAS_ONE, 'Baby', 'uid'),
			'information' => array(self::HAS_ONE, 'Information', 'uid'),
			'record' => array(self::HAS_ONE, 'Record', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => '用户唯一id',
			'username' => '用户名',
			'email' => '邮箱',
			'password' => '密码',
			'roletype' => '用户类型1普通，2微博',
			'createtime' => '创建时间',
			'updatetime' => '修改时间',
			'lastip' => '最后登录ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('roletype',$this->roletype);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('lastip',$this->lastip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @param $password
     * @return string
     * 密码加密方式
     */
    public function hashPassword($password)
    {
        return md5($password);
    }

    /**
     * 用户名唯一性校验
     */
    public function uniqueUser($name,$email=NULL)
    {
        $condition = 'username = :username ' . ($email == NULL ? '' : ' OR email=:email');
        $params   = array(':username'=>$name);
        if($email !== NULL)
        {
            $params=array_merge($params,array(':email'=>$email));
        }
        $model=$this->find(
            array(
                'condition'=>$condition,
                'params'=>$params,
            )
        );
        return $model;
    }

    /**
     * @return bool
     * 数据库记录保存前执行
     */
    protected function beforeSave ()
    {
        parent::beforeSave();

        if ($this->isNewRecord) //判断是否为新记录
        {
            if(!isset(Yii::app()->session['token']))     //微博账号不需要密码
            {
                $this->password=$this->hashPassword($this->password);   //新纪录加密密码
            }
        }

        $this->email=strtolower($this->email);  //转换小写
        $this->username=strtolower($this->username); //转换小写
        $this->lastip = Yii::app()->request->userHostAddress;

        return true;
    }
}
