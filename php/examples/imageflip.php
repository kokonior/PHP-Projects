<?php
// Input filename here
$filename = 'image.png';

// Load the image
$im = imagecreatefrompng($filename);

// Flip the image (Change to IMG_FLIP_HORIZONTAL for horozontal flip)
imageflip($im, IMG_FLIP_VERTICAL);

// Output the image.
header('Content-type: image/png');
imagejpeg($im);
imagedestroy($im);
?>
