<?php
// include "validate.php";
 include "../config.php";
if(isset($_GET['user_id'])){
 $id2=$_GET['user_id'];
 

 $sql= "DELETE FROM user WHERE user_id={$id2} ";

 if(mysqli_query($conn,$sql)){
    $_SESSION['statusp']='USER ID:&nbsp'.$id2.'&nbsp ACCOUNT DELETED SUCCESSFULLY';
    header('Location:./users.php');
 }else{
    $_SESSION['statusp']='ACCOUNT CANNOT DELETED';
    header('Location:./users.php');
 }
 
 mysqli_close($conn);
}else if(isset($_GET['category_id'])){
   $id2=$_GET['category_id'];
 

   $sql= "DELETE FROM category WHERE category_id={$id2} ";
  
   if(mysqli_query($conn,$sql)){
      $_SESSION['statusp']='CATEGORY DELETED SUCCESSFULLY';
      header('Location:./view_categories.php');
   }else{
      $_SESSION['statusp']='CANNOT DELETED';
      header('Location:./view_categories.php');
   }
   
   mysqli_close($conn);
}else if(isset($_GET['community_id'])){
   $id2=$_GET['community_id'];
 

   $sql= "DELETE FROM community WHERE community_id={$id2} ";
  
   if(mysqli_query($conn,$sql)){
      $_SESSION['statusp']='COMMUNITY DELETED SUCCESSFULLY';
      header('Location:./view_communities.php');
   }else{
      $_SESSION['statusp']='CANNOT DELETED';
      header('Location:./view_communities.php');
   }
   
   mysqli_close($conn);
}else if(isset($_GET['problem_id'])){
   $id2=$_GET['problem_id'];
 

   $sql= "DELETE FROM problem WHERE problem_id={$id2} ";
  
   if(mysqli_query($conn,$sql)){
      $_SESSION['statusp']='PROBLEM DELETED SUCCESSFULLY';
      header('Location:./view_problem.php');
   }else{
      $_SESSION['statusp']='CANNOT DELETED';
      header('Location:./view_problem.php');
   }
   
   mysqli_close($conn);
}else {
   echo "<script type='text/javascript'>window.history.back();</script>";
}



?>