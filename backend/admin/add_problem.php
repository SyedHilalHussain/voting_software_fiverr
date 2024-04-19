<?php
// include "validatelogout.php";
include "../adminheader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NED SCHOLARS MED LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="../../assets/css/intake.css">
   
<!--===============================================================================================-->
</head>
<body >

	
	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../config.php" method="POST">
					<?php  if (isset($_SESSION['user_id'])){
						$user_id = $_SESSION['user_id'];

					}else{
						header('Location:../logout.php');
					}
					?>
					
                   <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
					<span class="login100-form-title mb-3" style="font-family:poppins-extralight;   font-weight:bolder; color: rgba(5, 99, 243, 0.9)!important;">
						ADD PROBLEM
					</span>
					
<?php
					
		
if(isset($_SESSION["statusd"])){

echo "<div class='alert alert-danger my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
.$_SESSION['statusd']."</div>";
unset($_SESSION['statusd']);
}
if(isset($_SESSION["statusp"])){

echo "<div class='alert alert-primary my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
.$_SESSION['statusp']."</div>";
unset($_SESSION['statusp']);
}
?>
					<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" name="problem"  required placeholder="name@example.com">
  <label for="floatingInput">Problem</label>
</div>

<div class="form-floating mb-3">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category">
    <option value="">Select Category</option>
    <?php   
$category_query =mysqli_query($conn,"SELECT * FROM category");
while ($row = mysqli_fetch_assoc($category_query)){

?>
    <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category'] ?></option>
    
    <?php } ?>
  </select>
  <label for="floatingSelect">Category</label>
</div>
<div class="form-floating">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="community">
    <option selected>Select Community</option>
    <?php   
$category_query =mysqli_query($conn,"SELECT * FROM community");
while ($row = mysqli_fetch_assoc($category_query)){

?>
    <option value="<?php echo $row['community_id'] ?>"><?php echo $row['community'] ?></option>
    
    <?php } ?>
  </select>
  <label for="floatingSelect">Community</label>
</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="admin_add_problem">
								ADD
							</button>
						</div>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	


<?php include "../../footer.php"?>
	<!-- /Footer -->


		
	
</body>
</html>