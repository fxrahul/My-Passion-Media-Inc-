<?php
    header("Content-type: image/jpeg");
    $imgWidth = 800;
    $imgHeight = 600;
    $image = imagecreatetruecolor($imgWidth,$imgHeight);
    $white = imagecolorallocate($image, 255, 255, 255);
    $red   = imagecolorallocate($image, 255, 0, 0);
    $orange = imagecolorallocate($image, 255, 200, 0);

    imagefill($image, 0, 0, $white);
    imageline($image, 400, 400 , 400, 500 , $red); //line...
    imageline($image, 400, 400 , 700, 400 , $red); 
    imageline($image, 700, 400 , 700, 500 , $red); 
    imageline($image, 700, 500 , 400, 500 , $red);
    imagerectangle($image, 300, 400 , 400, 500 , $red); //square....
    imageline($image, 300, 400 , 350, 300 , $red);
    imageline($image, 350, 300 , 400, 400 , $red);
    imageline($image, 350, 300 , 650, 300 , $red);
    imageline($image, 650, 300 , 700, 400 , $red);
    imageline($image, 320, 420 , 380, 420 , $red);
    imageline($image, 320, 420 , 320, 500 , $red);
    imageline($image, 380, 420 , 380, 500 , $red);
    imagerectangle($image, 500, 430 , 600, 470 , $red);
    imageline($image, 550, 430 , 550, 470 , $red);
    imageline($image, 500, 450 , 600, 450 , $red);
    imageellipse($image, 200, 200, 100, 100, $orange); //circle...
    imagerectangle($image, 600, 250 , 620, 300 , $red);
    imagejpeg($image);
?>