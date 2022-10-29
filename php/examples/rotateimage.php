<?php
$file = 'test.jpg';
$degrees = 180;

// load the image file
$source = imagecreatefromjpeg($file);

// Rotate the image by $degrees
$rotated = imagerotate($source, $degrees, 0);

// output image
header('Content-type: image/jpeg');
imagejpeg($rotated);

imagedestroy($source);
imagedestroy($rotate);
?>
