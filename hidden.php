<?php
 include "config.php";


if(isset($_GET['hidename'])){
$hidename=$_GET['hidename'];
$query="UPDATE billusersheetname SET status='0' WHERE sheetname='$hidename'";
if(mysqli_query($conn,$query)){
 
  $_SESSION['statusp'] = "SHEET HIDE SUCCESSFULLY";
  header('Location:hidesheet.php');
}else{
  $_SESSION['statusd'] = "Failed to hide sheet!";
  header('location:hidesheet.php'); 
}


}

if(isset($_GET['showname'])){
$showname=$_GET['showname'];
$query="UPDATE billusersheetname SET status='1' WHERE sheetname='$showname'";
if(mysqli_query($conn,$query)){
 
  $_SESSION['statusp'] = "SHEET SHOW SUCCESSFULLY";
  header('Location:hidesheet.php');
}else{
  $_SESSION['statusd'] = "Failed to show sheet!";
  header('location:hidesheet.php'); 
}


}


?>