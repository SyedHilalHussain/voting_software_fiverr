<?php
session_start();
if(!isset($_SESSION['email'])){
header('location: login.php ');
}else if(isset($_SESSION['email']) && $_SESSION['role']==0 ){
header('location: student.php');
}
?>