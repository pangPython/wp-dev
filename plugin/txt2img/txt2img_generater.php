<?php

$font = "droid.ttf";
$pid = $_POST['txt2img_pid'];
$content = $_POST['txt2img_content'];
$title = $_POST['title'];
$post_date = $_POST['txt2img_pdate'];

$input = str_replace("\r", "", stripcslashes($content)) ;

//$title .= '\n'.$my_date;

//if(strlen($title) > 20){
    //$title =  mb_substr($title,0,20,'utf-8').'<br>'.mb_substr($title,21,strlen($title),'utf-8');
//}

if(mb_strlen($content) > 300){
    $content = mb_substr($content,0,300,'utf-8').'...';
}

//$input .= "\n" . str_repeat('-', 65) . "\n" . "区块链创新研究院 http://bcinstitute.applinzi.com" . "\n \n \n";

$ary = imagettfbbox (12, 0, $font, $input);
$width = abs($ary[2] - $ary[0]) + 40;
$height = abs($ary[1] - $ary[7]) + 40;
//$img = @imagecreate($width, $height);
$img = imagecreatefromjpeg('template.jpg');
$bgcolor = imagecolorallocate($img, '248', '248', '248');
$bdcolor = imagecolorallocate($img, '230', '230', '230');
$color = imagecolorallocate($img, '0', '0', '0');
$content_color = imagecolorallocate($img, '79', '79', '79');
$date_color = imagecolorallocate($img, '153', '153', '153');

$date_font_size = 20;
$date_angle = 0;
$date_start_x = 120;
$date_start_y = 500;

$title_font_size = 30;
$title_angle = 0;
$title_start_x = 120;
$title_start_y = 550;

$title = autowrap($title_font_size,$title_angle,$font,$title,860);

$content_font_size = 26;
$content_angle = 0;
$content_start_x = 120;
$content_start_y = 700;

//替换 两个换行
$content = str_replace('\r','\n',$content);
$content = str_replace('\n\n','\n',$content);

$content = autowrap($content_font_size,$content_angle,$font,$content,860);
//$content = autowrap($content_font_size,$content_angle,$font,$content,860);
imagettftext($img, $date_font_size, $date_angle, $date_start_x, $date_start_y, $date_color, $font, $post_date);
imagettftext($img, $title_font_size, $title_angle, $title_start_x, $title_start_y, $color, $font, $title);
imagettftext($img, $content_font_size, $content_angle, $content_start_x, $content_start_y, $content_color, $font, $content);
//imagettftext($img, $font_size, $angle, 40, 410, $color, $font, $title[0]);
imagerectangle($img, 0, 0, imagesx($img) - 1, imagesy($img) - 1, $bdcolor);
/**
if(defined('SAE_TMP_PATH')) {
  //SAE is not able to write local file.
  $file = "p-" . $pid . ".png";
  $s = new SaeStorage();
  ob_start();
  imagepng($img);
  $imgstr = ob_get_contents();
  $s->write('upload',$file,$imgstr);
  ob_end_clean(); 
  imagedestroy($img);
  echo $s->getUrl( 'upload' , $file );
} else {**/
  $file = "img/p-" . $pid . ".png";
  imagepng($img, $file);
  imagedestroy($img);
	//add_remark($file,'http://bcinstitute.applinzi.com/wp-content/uploads/2018/05/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20180527110040.jpg');
  echo 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $file;
//}

function autowrap($fontsize, $angle, $fontface, $string, $width) {
// 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
 $content = "";

 // 将字符串拆分成一个个单字 保存到数组 letter 中
 for ($i=0;$i<mb_strlen($string);$i++) {
  $letter[] = mb_substr($string, $i, 1);
 }

 foreach ($letter as $l) {
  $teststr = $content." ".$l;
  $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
  // 判断拼接后的字符串是否超过预设的宽度
  if (($testbox[2] > $width) && ($content !== "")) {
   $content .= "\n";
  }
  $content .= $l;
 }
 return $content;
}