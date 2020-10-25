<?php
//Folder containing all images
$dir = '/my/image/folder/';
//max age for an image (in seconds)
//    2592000sec = 30days
//can make photos delete starting March 13th, 2020 (which is where I set mine) - Montana Mendy
$delafter = 2592000;
$imgs = scandir( $dir );
foreach( $imgs as $img ){
 if( $img != '.' && $img != '..' ){
    $age = filemtime( $dir.'/'.$img );
    if( ( $age + $delafter ) < time() ){
        if( unlink( $dir.'/'.$img ) ){
            $log[] = 'Deleted: '.$img;
        }
        else{
            $log[] = 'Error deleting:'.$img;
        }
    }
    else{
        $log[] = 'Left: '.$img;
    }
  }
}
header( 'Content-type:text/plain; charset=utf-8' );
echo implode( "\r\n", $log );
?>
