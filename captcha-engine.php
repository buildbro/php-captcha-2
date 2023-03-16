<?php
include "config.php";

function generateRandomCode($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++){
        $randomString .=$characters[rand(0, strlen($characters)-1)];
    }
    return $randomString;
}

if (empty(session_id())) {
    session_start();
}
$userId = session_id();
$code = generateRandomCode(6);

$row = $mysqli->query("SELECT * FROM captcha_memo WHERE user_id = '".$userId."'");
if ($row->num_rows > 0){
    $mysqli->query("UPDATE captcha_memo SET code = '".$code."' WHERE user_id = '".$userId."'");
}
else {
    $mysqli->query("INSERT INTO captcha_memo(user_id, code) VALUES('".$userId."', '".$code."')");
}


$backgroundImage = imagecreatefrompng(__DIR__ . "/cap-bg.png");
$font = dirname(__FILE__) ."/arialbd.ttf";
$fontSize = "15";
$black = imagecolorallocate($backgroundImage, 0, 0, 0);
imagettftext($backgroundImage, $fontSize, 15, 40, 40, $black, $font, $code);
header("Content-type: image/png");
imagepng($backgroundImage);
imagedestroy($backgroundImage);