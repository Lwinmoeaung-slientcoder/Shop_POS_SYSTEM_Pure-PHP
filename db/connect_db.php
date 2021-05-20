<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=my_homeshop_system','root','');
    $pdo -> exec("set names utf8");
    //echo 'Connection Successfull';
}catch(PDOException $error){
    echo $error->getmessage();
}


?>
