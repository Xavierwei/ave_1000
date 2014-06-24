<?php
/**
 * Created by PhpStorm.
 * User: drogjh
 * Date: 14-4-8
 * Time: 下午5:37
 *  缩略图暂时支持 gif，jpg，png
 */

class oUpload{
    private $saveName;// 保存名
    private $savePath;// 保存路径
    private $fileFormat = array('gif','jpg','png','application/octet-stream');// 文件格式&MIME限定
    private $overwrite = 0;// 覆盖模式
    private $maxSize = 0;// 文件最大字节 1024*1024=1m
    private $ext;// 文件扩展名
    private $thumb = 1;// 是否生成缩略图
    private $thumbWidth = 200;// 缩略图宽
    private $thumbHeight = 200;// 缩略图高
    private $thumbPrefix = "_thumb";// 缩略图前缀
    private $errno;// 错误代号
    private $returnArray= array();// 所有文件的返回信息
    private $returninfo= array();// 每个文件返回信息
    private $moreUp  = 0; //是否开启多文件上传
    private $quality=100;


// 构造函数
// @param $savePath 文件保存路径
// @param $fileFormat 文件格式限制数组
// @param $maxSize 文件最大尺寸
// @param $overwriet 是否覆盖 1 允许覆盖 0 禁止覆盖

    function __construct($savePath, $fileFormat='',$maxSize = 0, $overwrite = 0) {
        $this->setSavepath($savePath);
        $this->setFileformat($fileFormat);
        $this->setMaxsize($maxSize);
        $this->setOverwrite($overwrite);
        $this->setThumb($this->thumb, $this->thumbWidth,$this->thumbHeight);
        $this->errno = 0;
    }

// 上传
// @param $fileInput 网页Form(表单)中input的名称
// @param $changeName 是否更改文件名
    public function run($fileInput,$changeName = 1){
        if(isset($_FILES[$fileInput])){
            $fileArr = $_FILES[$fileInput];
            if($this->moreUp && is_array($fileArr['name'])){//上传同文件域名称多个文件
                for($i = 0; $i < count($fileArr['name']); $i++){
                    $ar['tmp_name'] = $fileArr['tmp_name'][$i];
                    $ar['name'] = $fileArr['name'][$i];
                    $ar['type'] = $fileArr['type'][$i];
                    $ar['size'] = $fileArr['size'][$i];
                    $ar['error'] = $fileArr['error'][$i];
                    $this->getExt($ar['name']);//取得扩展名，赋给$this->ext，下次循环会更新
                    $this->setSavename($changeName == 1 ? $this->saveName : $ar['name']);//设置保存文件名
                    if($this->copyfile($ar)){
                        $this->returnArray[] =  $this->returninfo;
                    }else{
                        $this->returninfo['error'] = $this->errmsg();
                        $this->returnArray[] =  $this->returninfo;
                    }
                }
                return $this->errno ?  false :  true;
            }else{//上传单个文件
                $this->getExt($fileArr['name']);//取得扩展名
                $this->setSavename($changeName == 1 ? $this->saveName : $fileArr['name']);//设置保存文件名
                if($this->copyfile($fileArr)){
                    $this->returnArray[] =  $this->returninfo;
                }else{
                    $this->returninfo['error'] = $this->errmsg();
                    $this->returnArray[] =  $this->returninfo;
                }
                return $this->errno ?  false :  true;
            }
            return false;
        }else{
            $this->errno = 10;
            return false;
        }
    }

// 单个文件上传
// @param $fileArray 文件信息数组
    public function copyfile($fileArray){
        $this->returninfo = array();
        // 返回信息  8827ea251def74db6eeda448a16a560c
        $this->returninfo['name'] = $fileArray['name'];
        $this->returninfo['md5'] = @md5_file($fileArray['tmp_name']);
        $this->returninfo['saveName'] = $this->saveName;
        $this->returninfo['savePath']=$this->savePath;
        $this->returninfo['size'] = $fileArray['size'];    //以byte为单位
        $this->returninfo['type'] = $fileArray['type'];
        // 检查文件格式
        if (!$this->validateFormat()){
            $this->errno = 11;
            return false;
        }
        // 检查目录是否可写
        if(!@is_writable($this->savePath)){
            $this->errno = 12;
            return false;
        }
        // 如果不允许覆盖，检查文件是否已经存在
        //if($this->overwrite == 0 && @file_exists($this->savePath.$fileArray['name'])){
        //	$this->errno = 13;
        //	return false;
        //}
        // 如果有大小限制，检查文件是否超过限制
        if ($this->maxSize != 0 ){
            if ($fileArray["size"] > $this->maxSize){
                $this->errno = 14;
                return false;
            }
        }
        // 文件上传
        if( $this->thumb ){// 创建缩略图
            $CreateFunction = "imagecreatefrom".($this->ext == 'jpg' ? 'jpeg' : $this->ext);
            //$SaveFunction = "image".($this->ext == 'jpg' ? 'jpeg' : $this->ext);  //保存为原始图片类型
            $SaveFunction = "imagejpeg";  //全部转成jpg
            if (strtolower($CreateFunction) == "imagecreatefromgif"
                && !function_exists("imagecreatefromgif")) {
                $this->errno = 16;
                return false;
            } elseif (strtolower($CreateFunction) == "imagecreatefromjpeg"
                && !function_exists("imagecreatefromjpeg")) {
                $this->errno = 17;
                return false;
            } elseif (!function_exists($CreateFunction)) {
                $this->errno = 18;
                return false;
            }

            $Original = @$CreateFunction($fileArray["tmp_name"]);
            if (!$Original) {$this->errno = 19; return false;}
            $originalHeight = ImageSY($Original);
            $originalWidth = ImageSX($Original);
            $this->returninfo['originalHeight'] = $originalHeight;
            $this->returninfo['originalWidth'] = $originalWidth;
            /*
            if (($originalHeight < $this->thumbHeight
                && $originalWidth < $this->thumbWidth)) {
                // 如果比期望的缩略图小，那只Copy
                move_uploaded_file($this->savePath.$this->saveName.'.'.this->ext,
                    $this->savePath.$this->thumbPrefix.$this->saveName.'.'.$this->ext);
            } else {
                if( $originalWidth > $this->thumbWidth ){// 宽 > 设定宽度
                    $thumbWidth = $this->thumbWidth ;
                    $thumbHeight = $this->thumbWidth * ( $originalHeight / $originalWidth );
                    if($thumbHeight > $this->thumbHeight){// 高 > 设定高度
                        $thumbWidth = $this->thumbHeight * ( $thumbWidth / $thumbHeight );
                        $thumbHeight = $this->thumbHeight ;
                    }
                }elseif( $originalHeight > $this->thumbHeight ){// 高 > 设定高度
                    $thumbHeight = $this->thumbHeight ;
                    $thumbWidth = $this->thumbHeight * ( $originalWidth / $originalHeight );
                    if($thumbWidth > $this->thumbWidth){// 宽 > 设定宽度
                        $thumbHeight = $this->thumbWidth * ( $thumbHeight / $thumbWidth );
                        $thumbWidth = $this->thumbWidth ;
                    }
                }
                */
            //$radio=max(($originalWidth/$this->thumbWidth),($originalHeight/$this->thumbHeight));
            //$radio=min($originalWidth/$this->thumbWidth,$originalHeight/$this->thumbHeight) ;
            $radio=$originalWidth>$originalHeight?$originalWidth/$this->thumbWidth : $originalHeight/$this->thumbHeight;
            $thumbWidth=(int)$originalWidth/$radio;
            $thumbHeight=(int)$originalHeight/$radio;
            //$this->quality = $this->ext == 'png' ? intval($this->quality / 10.01) : $this->quality; //png质量必须为 0-9

            if ($thumbWidth == 0) $thumbWidth = 1;
            if ($thumbHeight == 0) $thumbHeight = 1;
            $createdThumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
            if ( !$createdThumb ) {$this->errno = 20; return false;}
            if ( !imagecopyresampled($createdThumb, $Original, 0, 0, 0, 0,
                $thumbWidth, $thumbHeight, $originalWidth, $originalHeight) )
            {$this->errno = 21; return false;}
            if ( $SaveFunction($createdThumb,$this->savePath.$this->saveName.$this->thumbPrefix.'.jpg',$this->quality) ) {
                $this->returninfo['thumbSaveName'] = $this->saveName.$this->thumbPrefix.'.jpg';
            }
            else
                {$this->errno = 22; return false;}
        }
        //创建源文件,是否为图片需要转换jpg
        if($this->thumb)
        {
            $CreateFunction = "imagecreatefrom".($this->ext == 'jpg' ? 'jpeg' : $this->ext);
            //$SaveFunction = "image".($this->ext == 'jpg' ? 'jpeg' : $this->ext);  //保存为原始图片类型
            $SaveFunction = "imagejpeg";  //全部转成jpg
            if (strtolower($CreateFunction) == "imagecreatefromgif"
                && !function_exists("imagecreatefromgif")) {
                $this->errno = 16;
                return false;
            } elseif (strtolower($CreateFunction) == "imagecreatefromjpeg"
                && !function_exists("imagecreatefromjpeg")) {
                $this->errno = 17;
                return false;
            } elseif (!function_exists($CreateFunction)) {
                $this->errno = 18;
                return false;
            }

            $Original = @$CreateFunction($fileArray["tmp_name"]);
            if (!$Original) {$this->errno = 19; return false;}

            if ( $SaveFunction($Original,$this->savePath.$this->saveName.'.jpg',$this->quality) ) {
                $this->returninfo['saveName'] = $this->saveName.'.jpg';
            }
            else
            {$this->errno = 22; return false;}

            // if(!@move_uploaded_file($fileArray["tmp_name"], $this->savePath.'old_'.$this->saveName . '_'  . md5(time().rand(0,9999)) .  '.' .$this->ext)){
            //     $this->errno = $fileArray["error"];
            //     return false;
            // }

        }
        else if(@move_uploaded_file($fileArray["tmp_name"], $this->savePath.$this->saveName.'.'.$this->ext)){
            $this->returninfo['saveName'] = $this->saveName.'.'.$this->ext;
        }
        else{
            $this->errno = $fileArray["error"];
            return false;
        }

        // 删除临时文件
        /*
        if(!@$this->del($fileArray["tmp_name"])){
            return false;
        }
        */
        return true;
    }

// 文件格式检查,MIME检测
    public function validateFormat(){
        if(!is_array($this->fileFormat)
            || in_array(strtolower($this->ext), $this->fileFormat)
            || in_array(strtolower($this->returninfo['type']), $this->fileFormat) )
            return true;
        else
            return false;
    }
// 获取文件扩展名
// @param $fileName 上传文件的原文件名
    public function getExt($fileName){
        $ext = explode(".", $fileName);
        $ext = $ext[count($ext) - 1];
        $this->ext = strtolower($ext);
        return $this->ext;
    }

// 设置上传文件的最大字节限制
// @param $maxSize 文件大小(bytes) 0:表示无限制
    public function setMaxsize($maxSize){
        $this->maxSize = $maxSize;
    }
// 设置文件格式限定
// @param $fileFormat 文件格式数组
    public function setFileformat($fileFormat){
        if(is_array($fileFormat)){$this->fileFormat = $fileFormat ;}
    }

// 设置缩略图质量
    public function setQuality($quality)
    {
        $this->quality=$quality;
    }

// 设置覆盖模式
// @param overwrite 覆盖模式 1:允许覆盖 0:禁止覆盖
    public function setOverwrite($overwrite){
        $this->overwrite = $overwrite;
    }


// 设置保存路径
// @param $savePath 文件保存路径：以 "/" 结尾，若没有 "/"，则补上
    public function setSavepath($savePath){
        $this->savePath = substr( str_replace("\\","/", $savePath) , -1) == "/"
            ? $savePath : $savePath."/";
    }

// 设置缩略图
// @param $thumb = 1 产生缩略图 $thumbWidth,$thumbHeight 是缩略图的宽和高
    public function setThumb($thumb, $thumbWidth = 0,$thumbHeight = 0){
        $this->thumb = $thumb;
        if($thumbWidth) $this->thumbWidth = $thumbWidth;
        if($thumbHeight) $this->thumbHeight = $thumbHeight;
    }

//设置是否启用多文件上传
    public function setMoreUp($moreUp)
    {
        $this->moreUp=$moreUp;
    }

// 设置文件保存名
// @param $saveName 保存名，如果为空，则系统自动生成一个随机的文件名
    public function setSavename($saveName){
        if ($saveName == ''){  // 如果未设置文件名，则生成一个随机文件名
            $name = date('YmdHis')."_".rand(100,999).'.';
            //判断文件是否存在,不允许重复文件
            if(file_exists($this->savePath . $name)){
                $name = setSavename($saveName);
            }
        } else {
            $name = $saveName;
        }
        $this->saveName = $name;
    }

// 删除文件
// @param $fileName 所要删除的文件名
    public function del($fileName){
        if(!@unlink($fileName)){
            $this->errno = 15;
            return false;
        }
        return true;
    }

// 返回上传文件的信息
    public function getInfo(){
        return $this->returnArray;
    }

// 得到错误信息
    public function errmsg(){
        $uploadClassError = array(
            0	=>'There is no error, the file uploaded with success. ',
            1	=>'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            2	=>'The uploaded file exceeds the MAX_FILE_SIZE that was specified in the HTML form.',
            3	=>'The uploaded file was only partially uploaded. ',
            4	=>'No file was uploaded. ',
            6	=>'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3. ',
            7	=>'Failed to write file to disk. Introduced in PHP 5.1.0. ',
            10	=>'Input name is not unavailable!',
            11	=>'The uploaded file is Unallowable!',
            12	=>'Directory unwritable!',
            13	=>'File exist already!',
            14	=>'File is too big!',
            15	=>'Delete file unsuccessfully!',
            16	=>'Your version of PHP does not appear to have GIF thumbnailing support.',
            17	=>'Your version of PHP does not appear to have JPEG thumbnailing support.',
            18	=>'Your version of PHP does not appear to have pictures thumbnailing support.',
            19	=>'An error occurred while attempting to copy the source image .
					Your version of php ('.phpversion().') may not have this image type support.',
            20	=>'An error occurred while attempting to create a new image.',
            21	=>'An error occurred while copying the source image to the thumbnail image.',
            22	=>'An error occurred while saving the thumbnail image to the filesystem.
					Are you sure that PHP has been configured with both read and write access on this folder?',
        );
        if ($this->errno == 0)
            return false;
        else
            return $uploadClassError[$this->errno];
    }
}
