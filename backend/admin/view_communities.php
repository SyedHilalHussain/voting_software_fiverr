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
		thead {
			font-size: large;
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-weight: 100;
			letter-spacing: 1px;

		}

		input {
			width: 250px;
		}

		.btn {

			width: 80px;
			padding: 3px !important;
			border-radius: 30px !important;
			font-size: 15px;
		}

		.btn-first {
			background-color: rgba(4, 94, 233, 0.7) !important;
			color: #fff !important;
			border: rgba(4, 94, 233, 0.9);
			;
		}

		.btn:hover {
			background: rgba(4, 94, 233, 0.9);
			border: none;
			color: #fff;
			box-shadow: 5px 5px 10px #999;
			transition: 0.3s;
		}
	</style>
	<!--===============================================================================================-->
</head>

<body>

	<div class="text-center my-1" style=" color:rgba(4, 94, 233, 0.9);  text-shadow: 1.3px 2px 2px rgba(4, 94, 233, 0.7)!important; font-size:30px;  font-family: Poppins-Regular;">View Communities</div>
	<div class="d-flex justify-content-center">
		<?php

		if (isset($_SESSION['statusp'])) {

			echo "<div class='a alert alert-primary  text-center' role='alert' style='width:350px;  padding: 3px; border-radius:10px;'>"
				. $_SESSION['statusp'] . "</div>";
			unset($_SESSION['statusp']);
		}
		if (isset($_SESSION["statusd"])) {

			echo "<div class='a alert alert-danger text-center' role='alert' style='width:350px;  padding: 3px; border-radius:10px;'>"
				. $_SESSION['statusd'] . "</div>";
			unset($_SESSION['statusd']);
		}
		?>
	</div>

	<div class="container col-lg-8">
		<div class="table table-responsive my-3 ">
			<table class="table table-bordered text-center">
				<thead class="table-dark">
					<th>ID</th>
					<th>Communities</th>
					<th>Edit</th>
					<th>Delete</th>

				</thead>
				<?php
				if (isset($_SESSION['user_id'])) {
					$id2 = $_SESSION['user_id'];
				} elseif (isset($_GET['id'])) {
					$id2 = $_GET['id'];
				} else {
					echo "<script type='text/javascript'>window.location='../login.php';</script>";
				}


				$sql1 = "SELECT * FROM community ";
				$result = mysqli_query($conn, $sql1) or die("Query failed");
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) { ?>

						<tbody>
							<form action="../config.php" method="post">




								<tr>

									<td>
										<?php echo $row['community_id']; ?></td>





									<td><?php echo $row['community']; ?></td>
									<td><i class="h bi bi-pencil-square edit-community" data-bs-toggle="modal" data-community-id="<?php echo $row['community_id']; ?>" data-bs-target="#staticBackdrop4"></i></td>
									<td><a href="delete.php?community_id=<?php echo $row['community_id'] ?>"><i class="h bi bi-trash"></i></a></td>



						</tbody>
						</form>
				<?php
					}
				}
				?>
			</table>

		</div>
	</div>
	<div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">UPDATE COMMUNITY</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form class="login100-form validate-form" action="../config.php" method="POST">


					<input type="hidden" name="community_id" id="modalcommunityId"  value="" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">


					<div class="form-floating m-3">
						<input type="text" name="community" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Update Community</label>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn w-50 my-2">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="update_community">
								UPDATE
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

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
    $(document).ready(function () {
        $('.edit-community').click(function () {
            var communityId = $(this).data('community-id');
            $('#modalcommunityId').val(communityId);
        });
    });
</script>
</body>

</html>