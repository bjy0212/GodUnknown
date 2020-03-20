<?php
    header('Content-Type: text/html; charset=utf-8');
    function uuid(){
        return sprintf('%08x',mt_rand(0,0xffffffff));
    }

    $img=$_POST['img'];
    if($img==null) return;
    $room=urldecode($_POST['room']);
    if($room==null) return;
    $random = uuid();
    $uppath='./img/'.$room.'/'.$random.'.jpg';
    if(!is_dir('./img/')){mkdir('./img/');} //폴더가 없다면 폴더 생성
    if(!is_dir('./img/'.$room.'/')){mkdir('./img/'.$room.'/');} //폴더가 없다면 폴더 생성
    $myfile = fopen($uppath, 'wb') or die("ERROR");
    fwrite($myfile, base64_decode($img));
    fclose($myfile);
    echo $random;
?>