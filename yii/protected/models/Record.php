<?php

/**
 * This is the model class for table "{{record}}".
 *
 * The followings are the available columns in table '{{record}}':
 * @property string $uid
 * @property string $avatar
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
 * @property string $case
 * @property integer $status
 * @property string $createtime
 * @property string $updatetime
 *
 * The followings are the available model relations:
 * @property User $u
 */
class Record extends OrionModel
{
    const ALLOW_STATUS = 1; //通过审核
    const DENY_STATUS =0;  //尚未通过审核

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('photo1, photo2, photo3','oCheckOne'),
			array('avatar, photo1, photo2, photo3, case', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, avatar, photo1, photo2, photo3, case, status,mark, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'uid'),
            'baby' => array(self::BELONGS_TO, 'Baby', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => '唯一id',
			'avatar' => '头像',
			'photo1' => '患处1',
			'photo2' => '患处2',
			'photo3' => '患处3',
			'case' => '病例',
			'status' => '审核状态',
			'mark' => '标记',
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
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('photo1',$this->photo1,true);
		$criteria->compare('photo2',$this->photo2,true);
		$criteria->compare('photo3',$this->photo3,true);
		$criteria->compare('case',$this->case,true);
		$criteria->compare('status',$this->status);
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
	 * @return Record the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function oCheckOne($attribute,$params)
    {
        if($this->photo1)
        {
            return true;
        }
        if($this->photo2)
        {
            return true;
        }
        if($this->photo3)
        {
            return true;
        }
        else
            $this->addError($attribute,'至少少上传一张患处照片');
    }
}
