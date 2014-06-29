<?php

/**
 * This is the model class for table "{{baby}}".
 *
 * The followings are the available columns in table '{{baby}}':
 * @property string $uid
 * @property string $name
 * @property string $nickname
 * @property string $sex
 * @property string $birthday
 * @property string $address
 * @property string $city
 * @property string $tel
 * @property string $reason
 * @property string $point_city
 * @property string $point_hospital
 * @property string $createtime
 * @property string $updatetime
 *
 * The followings are the available model relations:
 * @property User $u
 */
class Baby extends OrionModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{baby}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, nickname, birthday, address, city, tel, reason', 'required'),
			array('name', 'length', 'max'=>10),
			array('nickname', 'length', 'max'=>30),
			array('sex', 'length', 'max'=>3),
			array('address', 'length', 'max'=>255),
			array('city, point_city', 'length', 'max'=>15),
			array('tel, point_hospital', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, name, nickname, sex, birthday, address, city, tel, reason, point_city, point_hospital, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'u' => array(self::BELONGS_TO, 'User', 'uid'),
            'record' => array(self::BELONGS_TO, 'Record', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => '唯一id',
			'name' => '姓名',
			'nickname' => '昵称',
			'sex' => '性别',
			'birthday' => '出生日期',
			'address' => '地址',
			'city' => '城市',
			'tel' => '电话',
			'reason' => '千家万护',
			'point_city' => '推荐医院城市',
			'point_hospital' => '推荐医院',
			'createtime' => '创建时间',
			'updatetime' => '修改时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('point_city',$this->point_city,true);
		$criteria->compare('point_hospital',$this->point_hospital,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Baby the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
