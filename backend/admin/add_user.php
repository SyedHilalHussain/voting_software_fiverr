<?php
// include "validatelogout.php";
include "../adminheader.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NED SCHOLARS</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/intake.css">
<!--===============================================================================================-->


	
	
	
<!--===============================================================================================-->
</head>
<body>


		
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../config.php" method="POST" oninput='conpass.setCustomValidity(conpass.value != pass.value ? "Passwords do not match." : "")'>
					<span class="login100-form-title mb-4" style="font-family:poppins-extralight;   font-weight:bolder; color:rgba(4, 94, 233, 0.8)!important;">
						NED SCHOLARS
					</span>
<?php
					
if(isset($_SESSION['statusp'])){

echo "<div class='alert alert-primary my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
.$_SESSION['statusp']."</div>";
unset($_SESSION['statusp']);
}
if(isset($_SESSION["statusd"])){

echo "<div class='alert alert-danger my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
.$_SESSION['statusd']."</div>";
unset($_SESSION['statusd']);
								}
?>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="name" required>
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="email" required>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="conpass" required>
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="add_user">
								ADD
							</button>
						</div>
					</div>
				
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	


<!--===============================================================================================-->
	
<?php include "../../footer.php";?>
	<!-- /Footer -->

	
	
</body>
</html>