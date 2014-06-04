<?php
/**
 * Created by PhpStorm.
 * User: drogjh
 * Date: 14-3-27
 * Time: 上午1:17
 * 工具类
 */
class Drtool
{

    /**
     * 创建文件夹
     */
    public static function mkPath($dir)
    {
//        $dir = "./upload";
//        if (!is_dir($dir)) {
//            mkdir($dir, 0777, TRUE);
//        }

//        if(is_null($path))
//            $path= '/'.date("Y/n/j");
//
//        $dir .=$path;

        if (!is_dir($dir)) {
            mkdir($dir, 0777, TRUE);
        }
    }

    /**
     * @return string
     * 随机函数
     */
    public static function randomNew()
    {
        return hash("sha1",time().md5(uniqid(rand(), TRUE)));
    }

    /**
     * @param $name
     * @param $val
     * @param int $time
     * 设置cooki
     */
    public static function setMyCookie($name,$val,$time=NULL)
    {
        if(empty($val))
            $val=Drtool::randomNew();

        //新建cookie
        $cookie = new CHttpCookie($name, $val);
        if(!is_null($time))
        {
            //定义cookie的有效期
            $cookie->expire =time()+60*60*24*$time; //有限期$time天
        }
        //把cookie写入cookies使其生效
        Yii::app()->request->cookies[$name]=$cookie;
    }

    /**
     * @param $name
     * @return null
     * 读取cookie
     */
    public static function getMyCookie($name)
    {
        $cookie =Yii::app()->request->getCookies();
        if(is_null($cookie[$name])) //先判断对象是否存在。
            return NULL;
        else
            return $cookie[$name]->value; //对象存在返回cookie数值
    }

    /**
     * @param $name
     * 销毁cookie
     */
    public static function cleanMyCookie($name)
    {
        $cookie =Yii::app()->request->getCookies();
        unset($cookie[$name]);
    }

    public static function age($birth)
    {
        $age = array();
        $now = date('Ymd');
        $birth = substr($birth, 0,10);
        $birth = str_replace('-', '', $birth);
        $birth = str_replace('-', '', $birth);
        // $now = "20110228";
        //分解当前日期为年月日
        $nowyear = (int) ($now / 10000);
        $nowmonth = (int) (($now % 10000) / 100);
        $nowday = $now % 100;
        
        //分解出生日期为年月日
        $birthyear = (int) ($birth / 10000);
        $birthmonth = (int) (($birth % 10000) / 100);
        $birthday = $birth % 100;
        
        $year  = $nowyear - $birthyear;
        if ($birthmonth>$nowmonth)
        {
            $year--;
        }
        else if($birthmonth==$nowmonth)
        {
            if($birthday==29&&$birthmonth=2)
            {
                if ($nowyear%400==0||(($nowyear%4==0)&&($nowyear%100!=0)))
                {
                    if($birthday>$nowday)
                    {
                        $year--;
                    }
                }
            }
        }
        return $year; 
    }

}