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
 *
 * The followings are the available model relations:
 * @property User $u
 */
class OrionModel extends CActiveRecord
{


    /**
     * @return bool
     * 数据库记录保存前执行
     */
    protected function beforeSave ()
    {
        parent::beforeSave();

        if ($this->isNewRecord) //判断是否为新记录
        {
            $this->createtime=$this->updatetime=time();
        }

        $this->updatetime=time();
        return true;
    }
}
