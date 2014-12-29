<?php
include '../Model/db_functions.php';

session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if((isset($_COOKIE['login'])) || (isset($_SESSION['user'])) || (!trim($_SESSION['user']) == '')){
	
	if(isset($_COOKIE['login'])){
		
		$loginKey=$_COOKIE['login'];
	}
	else{
		
		$loginKey=$_SESSION['user'];
	}
}
else{
	header("Location:../../FrontPage/View/index.php");
}
function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
    switch($mime){
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;
 
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 7;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 80;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
     
    $image($dst_img, $dst_dir, $quality);
 
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}

$userData=fetchUserData($loginKey);
$username=$userData[1];

$image=getImage($username);
file_put_contents('b.jpg', $image);
//header("content-type: image/jpeg");


resize_crop_image(300, 300, "b.jpg", "a.jpg");

$img1 = imagecreateFromjpeg("./a.jpg");

$x=imagesx($img1)-$width ;
$y=imagesy($img1)-$height;


$img2 = imagecreatetruecolor($x, $y);
$bg = imagecolorallocate($img2, 0, 255, 255);
imagefill($img2, 0, 0, $bg);

$e = imagecolorallocate($img2, 0, 0, 0);

$r = $x <= $y ? $x : $y;
imagefilledellipse($img2, ($x/2), ($y/2), $r, $r, $e); 

imagecolortransparent($img2, $e);

imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);

imagecolortransparent($img1, $bg);

header("Content-type: image/png");
imagepng($img1);

imagedestroy($img2);
imagedestroy($img1);

$tmpfile = "a.jpg"; unlink($tmpfile);
$tmpfile = "b.jpg"; unlink($tmpfile);
?>