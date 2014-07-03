<?php

class TestController extends Controller
{


    public function actionTest() {
        echo 1;
    }

    public function  actionExif()
    {
        $img = 'L:\Camera\test\20140701_191359.jpg';
        print_r( stripos(getimagesize($img)['mime'],'jp'));die;
        $Original = imagecreatefromjpeg($img);
        $info = exif_read_data($img, NULL, true, false);
        if(isset($info['IFD0']['Orientation']))
        {
            echo $info['IFD0']['Orientation'];
            switch ($info['IFD0']['Orientation'])
            {
//                case 2:
//                    img.RotateFlip(RotateFlipType.RotateNoneFlipX);//horizontal flip
//                    break;
                case 3:
                    $Original = imagerotate($Original, -180, 0);//right-top Rotate180FlipNone
                    ImageJpeg($Original,'L:\Camera\test.jpg',100);
                    break;
//                case 4:
//                    img.RotateFlip(RotateFlipType.RotateNoneFlipY);//vertical flip
//                    break;
//                case 5:
//                    img.RotateFlip(RotateFlipType.Rotate90FlipX);
//                    break;
                case 6:
                    $Original = imagerotate($Original, -90, 0);//right-top Rotate90FlipNone
                    ImageJpeg($Original,'L:\Camera\test.jpg',100);
                    break;
//                case 7:
//                    img.RotateFlip(RotateFlipType.Rotate270FlipX);
//                    break;
                case 8:
                    $Original = imagerotate($Original, -270, 0);//left-bottom Rotate270FlipNone
                    ImageJpeg($Original,'L:\Camera\test.jpg',100);
//                    width = height;
//                    height = ow;
                    break;
                default:
                    break;
            }
        }
    }


}
