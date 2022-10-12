<?php
// Create the image handle, set the background to white
$im = imagecreatetruecolor(100, 100);
imagefilledrectangle($im, 0, 0, 100, 100, imagecolorallocate($im, 255, 255, 255));

// Draw an ellipse to fill with a black border
imageellipse($im, 50, 50, 50, 50, imagecolorallocate($im, 0, 0, 0));

// Set the border and fill colors
$border = imagecolorallocate($im, 0, 0, 0);
$fill = imagecolorallocate($im, 255, 0, 0);

// Fill the selection
imagefilltoborder($im, 50, 50, $border, $fill);

// Output and free memory
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>
