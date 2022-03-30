<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
// Create image instances
$src = imagecreatefrompng('page004.png');
$dest = imagecreatefrompng('bag.png');

// imagealphablending($dest, false);
// imagesavealpha($dest, true);

imagecopymerge($dest, $src, 10, 9, -50, -80, 1000, 1500, 100); //have to play with these numbers for it to work for you, etc.
$color = imagecolorallocate($dest, 0, 0, 50);
// imagestring($dest, 5, 0, 0, "40", $color);
imagettftext($dest, 10, 10, 0, 0, $color, 'arial.ttf', "hello");
// imagettftext($dest, 25, 0, 75, 300, $color, "Rabar_004.ttf", "hello");
// header('Content-Type: image/png');
imagepng($dest, "0.0.4.png");
// file_put_contents("aaa.png",imagepng($dest));

imagedestroy($dest);
imagedestroy($src);
?>