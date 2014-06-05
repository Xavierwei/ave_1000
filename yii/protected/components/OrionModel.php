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
        if(parent::beforeSave())
        {
            if ($this->isNewRecord) //判断是否为新记录
            {
                $arr=$this->attributes;
                //从性能方面考虑。结合isset和array_key_exists判断该键值是否存在
                if(isset($arr['createtime']) || array_key_exists('createtime', $arr))
                    $this->createtime = time();

                if(isset($arr['updatetime']) || array_key_exists('updatetime', $arr))
                    $this->updatetime = time();
            }
            else
            {
                $arr=$this->attributes;
                //从性能方面考虑。结合isset和array_key_exists判断该键值是否存在
                if(isset($arr['updatetime']) || array_key_exists('updatetime', $arr))
                    $this->updatetime = time();
            }
            return true;
        }
        else
        {
            return false;
        }
    }
}
