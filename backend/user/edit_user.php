<?php
// session_start();
// include "validate.php";

include "../adminheader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NED SCHOLARS MED EDIT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="../../assets/css/intake.css">
    <style>
      input{
        width:250px;
      }
    .btn{
            
            width:80px;
            padding:3px!important;
            border-radius: 30px!important;
            font-size: 15px;
        }
        .btn-first{
            background-color:rgba(4, 94, 233, 0.7)!important;
            color: #fff!important;
            border:rgba(4, 94, 233, 0.9);;
        }
        .btn:hover{
            background:rgba(4, 94, 233, 0.9);
            border: none;
            color: #fff;
            box-shadow: 5px 5px 10px #999;
            transition: 0.3s;
        }
</style>
<!--===============================================================================================-->
</head>
<body  >

<div class="text-center my-1" style=" color:rgba(4, 94, 233, 0.9);  text-shadow: 1.3px 2px 2px rgba(4, 94, 233, 0.7)!important; font-size:30px;  font-family: Poppins-Regular;">EDIT PROFILE</div>
<div class="d-flex justify-content-center">
<?php
				
if(isset($_SESSION['statusp'])){

echo "<div class='a alert alert-primary  text-center' role='alert' style='width:350px;  padding: 3px; border-radius:10px;'>"
.$_SESSION['statusp']."</div>";
unset($_SESSION['statusp']);
}
if(isset($_SESSION["statusd"])){

echo "<div class='a alert alert-danger text-center' role='alert' style='width:350px;  padding: 3px; border-radius:10px;'>"
.$_SESSION['statusd']."</div>";
unset($_SESSION['statusd']);
}
?>
</div>

<div class="container col-lg-8">	
<div  class="table table-responsive my-3 ">
<table class="table table-bordered text-center">
  <thead class="thead thead-dark bg-dark text-light" >
    <tr>
      <th scope="col" colspan="2" class="py-1" style="font-size:23px ;">EDIT PROFILE</th>
     
    </tr>
  </thead>
<?php 
  if(isset($_SESSION['user_id'])){
    $id2 = $_SESSION['user_id'];
  }elseif(isset($_GET['id'])){
   $id2=$_GET['id'];
  }else{
    echo "<script type='text/javascript'>window.location='../login.php';</script>";
  }
   

    $sql1="SELECT * FROM user WHERE user_id = '{$id2}' ";
    $result= mysqli_query($conn,$sql1) or die("Query failed");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){ ?>
  <tbody>
  <form action="../config.php" method="post">
    
     
      
      <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">

<tr>
      <td>NAME</td>
      <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
      </tr>
      
     
      <tr>
      <td>Email</td>
      <td><input type="text"  name="email" value="<?php echo $row['email']; ?>"></td>
      </tr>
     
      <tr>
      <th scope="col" colspan="2" class="py-1" style="font-size:23px ;"><button type='submit' name='user_update' class='btn btn-first'>UPDATE</button></th>
     
    </tr>
  
  </tbody>
        </form>
  <?php
                }
            }
            ?>
</table>

</div>
</div>
	

	<div id="dropDownSelect1"></div>
	

<?php include "../../footer.php"?>

	
	<!-- /Footer -->


	
</body>
</html>