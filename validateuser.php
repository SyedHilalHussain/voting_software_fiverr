<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location:login.php");
}else if(isset($_SESSION['email']) && $_SESSION['role']==1 ){
    header("Location:admin.php");
}

?>