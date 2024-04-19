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
				<form class="login100-form validate-form" action="./backend/config.php" method="POST">
					<span class="login100-form-title mb-3" style="font-family:poppins-extralight;   font-weight:bolder; color: rgba(5, 99, 243, 0.9)!important;">
						VOTE PROBLEM
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
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Select Category</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <label for="floatingSelect">Category</label>
</div>
<div class="form-floating">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Select Community</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <label for="floatingSelect">Community</label>
</div>
<div class="form-floating mb-3">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Select User</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <label for="floatingSelect">User</label>
</div>




<div class="form-floating mb-3">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Problem</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <label for="floatingSelect">Problem</label>
</div>
<div class="form-floating">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Give Vote</option>
    <option value="1">Very Poor</option>
    <option value="2">Poor</option>
    <option value="3">Neutral</option>
    <option value="4">Good</option>
    <option value="5">Very Good</option>
  </select>
  <label for="floatingSelect">Vote</label>
</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
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