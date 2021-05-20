<?php
session_start();
if($_SESSION['username']==""){
  header('location:index.php');
}else{
  if($_SESSION['role']=="admin"){
    include_once'inc/header_all.php';
  }else{
      include_once'inc/header_all_operator.php';
  }
}

?>
