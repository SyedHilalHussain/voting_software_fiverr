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
            VOTE PROBLEM
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
          if(isset($_SESSION['user_id'])){
          ?>

<input type="hidden" name="user_id"  id="user_id" value="<?php  echo $_SESSION['user_id'] ?>">

<?php  }else{
  header('location:../logout.php') ;
} ?>

          <div class="form-floating mb-3">
            <select class="form-select" id="communitySelect" aria-label="Floating label select example">
              <option selected value="">Select Community</option>
              <?php
              $community_query = mysqli_query($conn, "SELECT * FROM community");
              while ($row = mysqli_fetch_assoc($community_query)) {

              ?>
                <option value="<?php echo $row['community_id'] ?>"><?php echo $row['community'] ?></option>

              <?php } ?>
            </select>
            <label for="floatingSelect">Community</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="categorySelect" aria-label="Floating label select example">
            <option value="">Select Category</option>
            
            </select>
            <label for="floatingSelect">Category</label>
          </div>
          
          <div class="form-floating mb-3">
            <select class="form-select"  id="userSelect" aria-label="Floating label select example">
              <option selected value="">Select User</option>
             
            </select>
            <label for="floatingSelect">User</label>
          </div>




          <div class="form-floating mb-3">
            <select class="form-select" name="problem_id" id="problemSelect" aria-label="Floating label select example">
              <option selected value="">Select Problem</option>
         
            </select>
            <label for="floatingSelect">Problem</label>
          </div>
          <div class="form-floating">
            <select class="form-select" name="vote_id" id="floatingSelect" aria-label="Floating label select example">
              <option selected value="">Give Vote</option>
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
              <button class="login100-form-btn" name="voting">
                ADD
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

  <script>
        $(document).ready(function () {
             // Handle change events for Community dropdown
             $('#communitySelect').change(function () {
                var communityId = $(this).val();
                // Make an AJAX request to fetch User options
                $.ajax({
                    url: 'get_options.php?action=getCategory', // Replace with the actual server-side script
                    type: 'POST',
                    data: {type: 'category', communityId: communityId},
                    success: function (data) {
                        $('#categorySelect').html(data);
                        // Clear Problem options
                        
                    }
                });
            });
            // Handle change events for Category dropdown
            $('#categorySelect').change(function () {
                var categoryId = $(this).val();
                var communityId = $('#communitySelect').val();
                // Make an AJAX request to fetch Community options
                $.ajax({
                    url: 'get_options.php?action=getuser', // Replace with the actual server-side script
                    type: 'POST',
                    data: {type: 'user', categoryId: categoryId, communityId: communityId},
                    success: function (data) {
                        $('#userSelect').html(data);
                       
                    }
                });
            });

         

            // Handle change events for User dropdown
            $('#userSelect').change(function () {
                var userId = $(this).val();
                var communityId = $('#communitySelect').val();
                var categoryId = $('#categorySelect').val();
                var votinguserId = $('#user_id').val();
                // Make an AJAX request to fetch Problem options
                $.ajax({
                    url: 'get_options.php?action=getproblem', // Replace with the actual server-side script
                    type: 'POST',
                    data: {type: 'problem', userId: userId, votinguserId:votinguserId, categoryId:categoryId, communityId: communityId},
                    success: function (data) {
                        $('#problemSelect').html(data);
                        console.log(data);
                    }
                });
            });
        });
    </script>


</body>

</html>