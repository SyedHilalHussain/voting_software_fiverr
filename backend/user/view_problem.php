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
		.bi-arrow-up-circle-fill {
			font-size: 20px;
			margin: 0;
			cursor: pointer;
		}

		.colored {
			color: #6CBB3C;
			pointer-events: none;
		}

		td {
			padding: 2px !important;
		}

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

	<div class="text-center my-1" style=" color:rgba(4, 94, 233, 0.9);  text-shadow: 1.3px 2px 2px rgba(4, 94, 233, 0.7)!important; font-size:30px;  font-family: Poppins-Regular;">View Problems</div>
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
		<div class="table table-responsive my-2 ">
			<table class="table table-bordered text-center">
				<?php
				if (isset($_GET['id'])) {
					$id2 = $_GET['id'];
				?>
					<thead class="table-dark">
						<th>S.NO</th>
						<th>Categories</th>
						<th>User</th>
						<th>Edit</th>
						<th>Delete</th>

					</thead>
					<?php



					$sql1 = "SELECT * FROM problem s join user u on s.user_id = u.user_id and s.user_id=$id2";
					$result = mysqli_query($conn, $sql1) or die("Query failed");
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) { ?>

							<tbody>
								<form action="../config.php" method="post">




									<tr>

										<td>
											<?php echo $row['problem_id']; ?></td>





										<td><?php echo $row['problem']; ?></td>
										<td><?php echo $row['name']; ?></td>

										<td><i class="h bi bi-pencil-square edit-problem" data-bs-toggle="modal" data-problem-id="<?php echo $row['problem_id']; ?>" data-bs-target="#staticBackdrop4"></i></td>
										<td><a href="delete.php?problem_id=<?php echo base64_encode($row['problem_id']) ?>"><i class="h bi bi-trash"></i></a></td>



							</tbody>

							</form>
					<?php

						}
					}
					?>

				<?php
				} else if (isset($_SESSION['user_id'])) {
					$user_id = $_SESSION['user_id'];
				?>
					<thead class="table-dark">
						<th>S.NO</th>
						<th>Problem</th>
						<th>User</th>
						<th>Vote Here</th>
			


					</thead>
					<?php

$sql1 = "SELECT p.problem_id, p.problem, u.name, AVG(v.votetype_id) as average_rating, COUNT(v.vote_id) as total_votes
         FROM problem p 
         JOIN user u ON p.user_id = u.user_id
         LEFT JOIN vote v ON p.problem_id = v.problem_id
         GROUP BY p.problem_id, p.problem, u.name";


					// $sql1 = "SELECT * FROM problem s join user u on s.user_id = u.user_id";
					$result = mysqli_query($conn, $sql1) or die("Query failed");
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$problemId = $row['problem_id'];

							// Check if the user has already voted for this problem
							$voteQuery = "SELECT * FROM vote WHERE user_id = $user_id AND problem_id = $problemId";
							$voteResult = mysqli_query($conn, $voteQuery) or die("Vote query failed");
							$voted = mysqli_num_rows($voteResult) > 0;

					?>

							<tbody>
								<form action="../config.php" method="post">




									<tr>

										<td>
											<?php echo $row['problem_id']; ?></td>



											
               

										<td><?php echo $row['problem']; ?></td>
										<td><?php echo $row['name']; ?></td>

										<td>
											<i class="bi <?php echo $voted ? 'bi-arrow-up-circle-fill colored' : 'bi-arrow-up-circle-fill'; ?>" data-bs-toggle="modal" data-bs-target="#staticBackdropvote" onclick="openVoteModal(<?php echo $row['problem_id']; ?>)"></i>
											<span class="mx-2 mb-4 pb-2"><?php echo '<b style="font-size:20px;" >'.round($row['average_rating'], 1) . '</b><span style="font-size:20px;">(' . $row['total_votes'] . ')</span>'; ?></span>
										</td>
										<!-- <td><i class="h bi bi-pencil-square edit-problem" data-bs-toggle="modal" data-problem-id="<?php echo $row['problem_id']; ?>" data-bs-target="#staticBackdrop4"></i></td>
									<td><a href="delete.php?problem_id=<?php echo base64_encode($row['problem_id']) ?>"><i class="h bi bi-trash"></i></a></td> -->



							</tbody>

							</form>
				<?php
						}
					}
				} else {
					echo "<script type='text/javascript'>window.location='../login.php';</script>";
				}
				?>
			</table>

		</div>
	</div>
	<div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">UPDATE problem</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form class="login100-form validate-form" action="../config.php" method="POST">


					<input type="hidden" name="problem_id" id="modalproblemId" value="" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">


					<div class="form-floating m-3">
						<input type="text" name="problem" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Update problem</label>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn w-50 my-2">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="update_problem">
								UPDATE
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<div class="modal fade" id="staticBackdropvote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Vote Problem</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form class="login100-form validate-form" action="../config.php" method="POST">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']  ?>">
					<input type="hidden" name="problem_id" value="">
					<input type="hidden" name="redirect_url" id="redirect_url" value="">



					<div class="form-check m-3">
						<input class="form-check-input" name="vote_id" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="5">
						<label class="form-check-label" for="flexRadioDefault1">
							Very Good
						</label>
					</div>

					<div class="form-check m-3">
						<input class="form-check-input" name="vote_id" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="4">
						<label class="form-check-label" for="flexRadioDefault1">
							Good
						</label>
					</div>

					<div class="form-check m-3">
						<input class="form-check-input" name="vote_id" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="3">
						<label class="form-check-label" for="flexRadioDefault1">
							Neutral
						</label>
					</div>

					<div class="form-check m-3">
						<input class="form-check-input" name="vote_id" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="2">
						<label class="form-check-label" for="flexRadioDefault1">
							Poor
						</label>
					</div>

					<div class="form-check m-3">
						<input class="form-check-input" name="vote_id" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
						<label class="form-check-label" for="flexRadioDefault1">
							Very Poor
						</label>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn w-50 my-2">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="voting" onclick="setRedirectUrl()">
								Vote
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>

	<?php include "../../footer.php" ?>


	<!-- /Footer -->

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.edit-problem').click(function() {
				var problemId = $(this).data('problem-id');
				$('#modalproblemId').val(problemId);
			});
		});

		function openVoteModal(problemId) {
        // Update the value of the hidden input field in the modal
        document.querySelector('#staticBackdropvote input[name="problem_id"]').value = problemId;

       
    }
	function setRedirectUrl() {
        document.getElementById('redirect_url').value = window.location.href;
    }
	</script>
</body>

</html>