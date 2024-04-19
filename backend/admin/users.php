<?php
// include "validate.php";
include "../adminheader.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>NED SCHOLARS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="stylesheet" href="intake.css">
  <!--===============================================================================================-->
  <style>
       body{
            background: #f2f2f2; 
            display:flex; 
            min-height: 100vh;

             flex-direction: column;
        }
    .btn {

      width: 40px;
      padding: 1px 1px !important;
      border-radius: 30px !important;
      font-size: 15px;
    }

    .table>:not(caption)>*>* {
      padding: 0rem 0rem;
    }

    .btn-first {
      background-color: rgba(4, 94, 233, 0.7);
      color: #fff !important;
    }

    .btn:hover {
      background: rgba(4, 94, 233, 0.9);
      border: none;
      color: #fff;
      box-shadow: 5px 5px 10px #999;
      transition: 0.3s;
    }

    .btpop {
      width: 70px;
      padding: 0 !important;
      border-radius: 25px !important;
      font-size: 15px;
      margin: 0 !important;
      background-color: rgba(4, 94, 233, 0.8) !important;
      color: #fff !important;
      text-transform: uppercase;

    }

    td {
      padding: 0 !important;
      margin: 0 !important;

    }

    .btpop:hover {
      text-decoration: none;
      background: #6a7dfe;
      background: -webkit-linear-gradient(right, #105d8e, rgba(4, 94, 233, 0.9), #105d8e, rgba(4, 94, 233, 0.7));
      background: -o-linear-gradient(right, #105d8e, rgba(4, 94, 233, 0.5), #105d8e, rgba(4, 94, 233, 0.7));
      background: -moz-linear-gradient(right, #105d8e, rgba(4, 94, 233, 0.5), #105d8e, rgba(22, 115, 255, 0.96));
      background: linear-gradient(right, #105d8e, rgba(4, 94, 233, 0.9), #105d8e, rgba(4, 96, 233, 0.976));
    }

    @media (min-width: 500px) {
      .a {
        margin-left: 37%;
      }

      .b {
        font-size: 45px;
      }
    }

    @media (max-width: 500px) {
      .a {
        margin-left: 5%;
      }

      .b {
        font-size: 35px;
      }
    }

    @media (max-width: 350px) {
      .a {
        margin-left: 0%;
      }

      .b {
        font-size: 35px;
      }
    }
  </style>




</head>

<body>

  <div class="b text-center mt-1" style=" color:rgba(4, 94, 233, 0.9);  text-shadow: 1.3px 2px 2px rgba(4, 94, 233, 0.7);  font-size:30px; font-family: Poppins-Regular;">USERS DETAIL</div>

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

  <?php

  $limit = 10;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
  $result = mysqli_query($conn, $sql) or die("Query failed");
  if (mysqli_num_rows($result) > 0) {
  ?>

    <div class="container">
      <div class="table table-responsive ">
        <a href="add_user.php"><button class="btn-outline-dark p-1 m-1" >ADD USER</button></a>
        <table class="table table-bordered text-center p-0" cellpadding="0">
          <thead class="thead thead-dark bg-dark text-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NAME</th>
             
              <th scope="col">EMAIL</th>
              <th scope="col">TYPE</th>
              <th scope="col"> STATUS</th>
              <th scope="col"> EDIT</th>
              <th scope="col">CHANGE PASSWORD</th>
              <th scope="col"> DELETE</th>
              

            </tr>
          </thead>
          <?php while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['user_id'];
            $name = $row['name'];
            
            $email = $row['email'];
            $role = $row['user_type'];
            $status = $row['status'];

          ?>

            <tbody class="p-0 m-0" style="vertical-align: baseline;">
              <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
               
                <td><?php echo $email ?></td>
                <?php if ($role == 0) {
                  echo "<th >USER</th>";
                } else {
                  echo "<th >ADMIN</th>";
                }
                if ($status == 0) {

                  echo " <form action='../config.php' method='post'>
         <input type='hidden' name='id' value=" . $row['user_id'] . ">
        <input type='hidden' name='name' value=" . $row['name'] . ">
         <input type='hidden' name='email' value=" . $row['email'] . ">
        <td class='text-danger'>OFF click->&nbsp&nbsp<button type='submit' class='btn btn-first p-0 m-0' name='statuson'>ON</button></td>
        </form>";
                } else {
                  echo " <form action='../config.php' method='post'>
        <input type='hidden' name='id' value=" . $row['user_id'] . ">
        <input type='hidden' name='email' value=" . $row['email'] . ">
        <input type='hidden' name='name' value=" . $row['name'] . ">
        <td >ON<button type='submit' class='btn btn-first p-0 m-0' name='statusoff'>OFF</button></td>
        </form>";
                } ?>
                <td><a href="./edit.php?id=<?php echo $id ?>"><i class="h bi bi-pencil-square"></i></a></td>
                <td><a href="passchange.php?id=<?php echo $id ?>"><i class="h bi bi-pencil-square"></i></a></td>
                <td><a href="delete.php?id=<?php echo $id ?>"><i class="h bi bi-trash"></i></a></td>
               
              <?php } ?>






              </tr>
              <?php ?>
            </tbody>
        </table>
      </div>
    <?php }

  ?>
    </div>


    <div id="dropDownSelect1"></div>

    <div class="my-1"></div>



    <!-- /Footer -->

    <?php include "../../footer.php" ?>


</body>

</html>