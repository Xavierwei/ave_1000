<?php

/**
 * This is the model class for table "{{v_user}}".
 *
 * The followings are the available columns in table '{{v_user}}':
 * @property string $uid
 * @property string $username
 * @property string $email
 * @property integer $roletype
 * @property string $name
 * @property string $nickname
 * @property string $parent
 * @property string $sex
 * @property string $birthday
 * @property string $address
 * @property string $city
 * @property string $tel
 * @property string $reason
 * @property string $point_city
 * @property string $point_hospital
 * @property string $avatar
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
 * @property string $case
 * @property integer $status
 * @property string $createtime
 */
class VUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{v_user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('username, email, name, nickname, birthday, address, city, tel, reason, point_city, point_hospital, avatar, photo1, photo2, photo3, case, createtime', 'required'),
//			array('roletype, status', 'numerical', 'integerOnly'=>true),
//			array('uid, createtime', 'length', 'max'=>11),
//			array('username, tel, point_hospital', 'length', 'max'=>60),
//			array('email', 'length', 'max'=>100),
//			array('name', 'length', 'max'=>10),
//			array('nickname', 'length', 'max'=>30),
//			array('parent, address, avatar, photo1, photo2, photo3, case', 'length', 'max'=>255),
//			array('sex', 'length', 'max'=>3),
//			array('city, point_city', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, username, email, roletype, name, nickname, parent, sex, birthday, address, city, tel, reason, point_city, point_hospital, avatar, photo1, photo2, photo3, case, status, createtime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => '用户id',
			'username' => '用户名',
			'email' => '邮箱',
			'roletype' => '用户类型',
			'name' => '姓名',
			'nickname' => '昵称',
			'parent' => '父母',
			'sex' => '性别',
			'birthday' => '出生日期',
			'address' => '地址',
			'city' => '城市',
			'tel' => '电话',
			'reason' => '千家万护',
			'point_city' => '推荐医院城市',
			'point_hospital' => '推荐医院',
			'avatar' => '头像',
			'photo1' => '患处1',
			'photo2' => '患处2',
			'photo3' => '患处3',
			'case' => '病例',
			'status' => '审核状态',
			'createtime' => '创建时间',
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
		$criteria->compare('roletype',$this->roletype);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('point_city',$this->point_city,true);
		$criteria->compare('point_hospital',$this->point_hospital,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('photo1',$this->photo1,true);
		$criteria->compare('photo2',$this->photo2,true);
		$criteria->compare('photo3',$this->photo3,true);
		$criteria->compare('case',$this->case,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
