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

<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../config.php" method="POST">
					<span class="login100-form-title mb-3" style="font-family:poppins-extralight;   font-weight:bolder; color: rgba(5, 99, 243, 0.9)!important;">
						EDIT PROBLEM
					</span>

					<?php


					if (isset($_SESSION["statusd"])) {

						echo "<div class='alert alert-danger my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
							. $_SESSION['statusd'] . "</div>";
						unset($_SESSION['statusd']);
					}
					if (isset($_SESSION["statusp"])) {

						echo "<div class='alert alert-primary my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
							. $_SESSION['statusp'] . "</div>";
						unset($_SESSION['statusp']);
					}
					?>
					<?php
					if (isset($_GET['id'])) {
						$id2 = $_GET['id'];
					} else {
						echo "<script type='text/javascript'>window.location='./view_problem.php';</script>";
					}


					$sql1 = "SELECT * FROM problem WHERE problem_id = '{$id2}' ";
					$result = mysqli_query($conn, $sql1) or die("Query failed");
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) { ?>
							<input type="hidden" name="problem_id" value="<?php echo $row['problem_id']  ?>">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="floatingInput" name="problem" placeholder="problem" value="<?php echo $row['problem'];  ?>">
								<label for="floatingInput">Problem</label>
							</div>

							<div class="form-floating mb-3">
								<?php
								if (($row['category_id'] != NULL) && !empty($row['category_id'])) {
									$category_id = $row['category_id'];
									$cate_query = mysqli_query($conn, "Select * from category  where category_id = $category_id");
									if (mysqli_num_rows($cate_query) > 0) {
										$category_result = mysqli_fetch_assoc($cate_query);
										$cat_fetching = mysqli_query($conn, "Select * from category ");
								?>

										<select class="form-select" id="floatingSelect" name="category_id" aria-label="Floating label select example">

											<option value="<?php echo  $category_result['category_id'] ?>"><?php echo  $category_result['category']   ?></option>
											<?php
											while ($category_fetch_result = mysqli_fetch_assoc($cat_fetching)) {
											?>

												<option value="<?php echo  $category_fetch_result['category_id'] ?>"><?php echo  $category_fetch_result['category']   ?></option>
											<?php } ?>
										</select>
									<?php  }
								} else {
									// fetching categories for selection 
									$cat_fetching = mysqli_query($conn, "Select * from category ");



									?>

									<select class="form-select" id="floatingSelect" name="category_id" aria-label="Floating label select example">
										<option selected>Select Category</option>
										<?php
										while ($category_fetch_result = mysqli_fetch_assoc($cat_fetching)) {
										?>

											<option value="<?php echo  $category_fetch_result['category_id'] ?>"><?php echo  $category_fetch_result['category']   ?></option>
										<?php } ?>
									</select>

								<?php  } ?>
								<label for="floatingSelect">Category</label>
							</div>
							<!-- community select coding  -->
							<div class="form-floating mb-3">
								<?php
								if (($row['community_id'] != NULL) && !empty($row['community_id'])) {
									$community_id = $row['community_id'];
									$comm_query = mysqli_query($conn, "Select * from community  where community_id = $community_id");
									if (mysqli_num_rows($comm_query) > 0) {
										$community_result = mysqli_fetch_assoc($comm_query);
										$comm_fetching = mysqli_query($conn, "Select * from community ");
								?>
										<select class="form-select" id="floatingSelect" name="community_id" aria-label="Floating label select example">
											<option value="<?php echo  $community_result['community_id'] ?>"><?php echo  $community_result['community']   ?></option>
											<?php
											while ($comm_fetch_result = mysqli_fetch_assoc($comm_fetching)) {
											?>

												<option value="<?php echo  $comm_fetch_result['community_id'] ?>"><?php echo  $comm_fetch_result['community']   ?></option>
											<?php } ?>
										</select>
									<?php  }
								} else {
									// fetching categories for selection 
									$comm_fetching = mysqli_query($conn, "Select * from community ");



									?>

									<select class="form-select" id="floatingSelect" name="community_id" aria-label="Floating label select example">
										<option selected>Select Community</option>
										<?php
										while ($comm_fetch_result = mysqli_fetch_assoc($comm_fetching)) {
										?>

											<option value="<?php echo  $comm_fetch_result['community_id'] ?>"><?php echo  $comm_fetch_result['community']   ?></option>
										<?php } ?>
									</select>

								<?php  } ?>
								<label for="floatingSelect">Community</label>
							</div>
							<!-- user selecting coding  -->
							<div class="form-floating mb-3">
								<?php
								if (($row['user_id'] != NULL) && !empty($row['user_id'])) {
									$user_id = $row['user_id'];
									$user_query = mysqli_query($conn, "Select * from user  where user_id = $user_id");
									if (mysqli_num_rows($user_query) > 0) {
										$user_result = mysqli_fetch_assoc($user_query);
										$user_fetching = mysqli_query($conn, "Select * from user ");
								?>
										<select class="form-select" id="floatingSelect" name="user_id" aria-label="Floating label select example">
											<option value="<?php echo  $user_result['user_id'] ?>"><?php echo  $user_result['name']   ?></option>
											<?php
											while ($user_fetch_result = mysqli_fetch_assoc($user_fetching)) {
											?>

												<option value="<?php echo  $user_fetch_result['user_id'] ?>"><?php echo  $user_fetch_result['name']   ?></option>
											<?php } ?>
										</select>
									<?php  }
								} else {
									// fetching categories for selection 
									$user_fetching = mysqli_query($conn, "Select * from user ");



									?>

									<select class="form-select" id="floatingSelect" name="user_id" aria-label="Floating label select example">
										<option selected>Select User</option>
										<?php
										while ($user_fetch_result = mysqli_fetch_assoc($user_fetching)) {
										?>

											<option value="<?php echo  $user_fetch_result['user_id'] ?>"><?php echo  $user_fetch_result['name']   ?></option>
										<?php } ?>
									</select>

								<?php  } ?>
								<label for="floatingSelect">Users</label>
							</div>

					<?php }
					} ?>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="edit_problem">
								SUBMIT
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>



	<?php include "../../footer.php" ?>
	<!-- /Footer -->




</body>

</html>