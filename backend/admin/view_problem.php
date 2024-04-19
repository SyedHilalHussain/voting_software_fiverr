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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
   
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

  <div class="container col-lg-10 px-5">
    <div class="table table-responsive my-3 px-5">
      <table class="table table1 table-bordered text-center">
        <thead class="table-dark">
          <tr>
          <th>ID</th>
          <th>Problems</th>
          <th>Edit</th>
          <th>Delete</th>
          </tr>

        </thead>
        <?php
        if (isset($_SESSION['user_id'])) {
          $id2 = $_SESSION['user_id'];
        } elseif (isset($_GET['id'])) {
          $id2 = $_GET['id'];
        } else {
          echo "<script type='text/javascript'>window.location='../login.php';</script>";
        }
        // $limit = 10;
        // if (isset($_GET['page'])) {
        //   $page = $_GET['page'];
        // } else {
        //   $page = 1;
        // }
        // $offset = ($page - 1) * $limit;
        // ASC LIMIT {$offset},{$limit}
        ?>

            <tbody>
              


<?php 
            $sql1 = "SELECT * FROM problem  ";
            $result = mysqli_query($conn, $sql1) or die("Query failed");
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>

                  <td>
                    <?php echo $row['problem_id']; ?>
                  </td>
               




                <td><?php echo $row['problem']; ?></td>
                <td><a href="./edit_problem.php?id=<?php echo $row['problem_id'] ?>"><i class="h bi bi-pencil-square"></i></a></td>
                <td><a href="delete.php?problem_id=<?php echo $row['problem_id'] ?>"><i class="h bi bi-trash"></i></a></td>

                
                 
                </tr>
                <?php
          }
        }
        ?>
            </tbody>
           
       
      </table>

    </div>
   
  </div>


  <div id="dropDownSelect1"></div>


  <?php include "../../footer.php" ?>


  <!-- /Footer -->

  <script src="../../assets/js/jquery-3.6.0.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>



  <script type="text/javascript">
$(document).ready(function () {
  $(".table1").dataTable({
    debug: true,
    numbering: true,
    lengthChange: true,
    paging: true,
    info: false,
    ordering: true,
    // scrollY: 300,
    // dom: "lrtip",
    columnDefs: [
      { orderable: true, className: "reorder", targets: [0, 1, 2] },
      { orderable: false, targets: "_all" },
    ],
  });
  // $("#search").keyup(function () {
  //   dataTable.search(this.value).draw();
  // }); 

})

  </script>
</body>


</html>