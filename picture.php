<?php
$image = imagecreatefromjpeg('./test.jpg');
$x_dimension = imagesx($image);
$y_dimension = imagesy($image);
$new_image = imagecreatetruecolor($x_dimension, $y_dimension);

$strs = [];
$buffer = 0;


function validPix($r, $g, $b){
    if($r <= 100 and $g < 50 and $b < 40)
        return true;

    return false;
}

for ($y = 0; $y < $y_dimension; $y++) {
    for ($x = 0; $x < $x_dimension; $x++) {
        $rgb = imagecolorat($image, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        if(validPix($r, $g, $b))
            file_put_contents('./picture2', '@', 8);
        else
            file_put_contents('./picture2', '=', 8);
        //file_put_contents('./log', "R: {$r}, G: {$g}, B: {$b}\n", FILE_APPEND);
    }
    file_put_contents('./picture2', "\n", 8);
    //file_put_contents('./log', "R: {$r}, G: {$g}, B: {$b}\n", 8);
}
