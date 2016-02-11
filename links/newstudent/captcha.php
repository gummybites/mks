<?php
session_start();

header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');

$chars = "012345678901234567abcdefghijklmnopqrstuvwxyz
ABCDEFGHIJKLMNOPQRSTUVWXYZ";

$captcha_text = '';
 
for ($i = 0; $i < 6; $i++) 
{
    $captcha_text .= $chars[rand(0, strlen($chars)-1)];
}	

$captcha_bg = @imagecreatefrompng("../../images/captcha.png"); 
	
imagettftext( $captcha_bg, 85, 0, 0, 300, imagecolorallocate ($captcha_bg, 0, 40, 10),
 'larabiefont rg.ttf', $captcha_text );

$_SESSION['code'] = $captcha_text;

imagepng($captcha_bg, NULL, 0);
imagedestroy($captcha_bg);

?>
