<?php
include "validate.php";
include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NED SCHOLARS MED LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="intake.css">
<!--===============================================================================================-->
</head>
<body >

	
	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="config.php" method="POST">
					<span class="login100-form-title mb-4" style="font-family:poppins-extralight;   font-weight:bolder; color:#04245c;">
						NED SCHOLARS
					</span>
					
<?php
					
		
if(isset($_SESSION["statusd"])){

echo "<div class='alert alert-danger my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
.$_SESSION['statusd']."</div>";
unset($_SESSION['statusd']);
}

?>
					<div class="wrap-input100 " >
                    <input class="input100" type="hidden" name="userid1" value="<?php echo $_GET['id'] ?>" required>
						<input class="input100" type="text" name="spreadsheet" required>
						<span class="focus-input100" data-placeholder="Enter Sheet Name"></span>
					</div>

					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="createadminsheet">
								CREATE
							</button>
						</div>
					</div>

					

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	


<?php include "footer.php"?>
	<!-- /Footer -->


		
	
</body>
</html>