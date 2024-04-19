<?php
session_start();
include "./backend/config.php";
$version = 41;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Voting Software</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image" href="logo.png">
  <link rel="stylesheet" href="assets/css/intake.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
    .brand img {
      width: 37px;
      border-radius: 370px;
    }

    .brand {
      font-size: 23px;


    }

    .navbar {
      width: 100%;
      background-color: rgba(4, 94, 233, 0.5) !important;
      color: blue !important;
      padding: 0;


    }

    a:hover {
      text-decoration: none;
      color: #105d8e !important;
      color: -webkit-linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;
      color: -o-linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;
      color: -moz-linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;
      color: linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;

    }

    .nav-link {
      font-size: 17px;
      margin: 0;

    }

    .h {
      font-size: 20px;
      color: rgba(4, 94, 233, 0.9);
      ;
    }

    .h:hover {
      color: blue;

    }

    .name {
      font-size: 20px;
      margin: 0;
      color: black !important;
      /* margin-left: 350px; */
    }

    .n {
      background-color: rgba(4, 94, 233, 0.2) !important;
    }

    .btpop1 {
      width: 130px;
      padding: 0 !important;
      border-radius: 25px !important;
      font-size: 17px;
      margin: 0 !important;
      background-color: rgba(4, 94, 233, 0.3) !important;
      color: #fff !important;
      text-transform: uppercase;

    }

    .btpop1:hover {
      text-decoration: none;
      color: #105d8e !important;
      color: -webkit-linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;
      color: -o-linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;
      color: -moz-linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;
      color: linear-gradient(right, #105d8e, #04245c, #105d8e, #04245c) !important;

    }

    .bt {

      width: 50px;
      padding: 3px !important;
      border-radius: 25px !important;
      font-size: 12px;
    }
  </style>
</head>

<body style="display:flex;  flex-direction: column ;">


  <nav class="navbar navbar-expand-lg navbar-dark  text-center">
    <div class="container-fluid">
      <a class=" brand navbar-brand " href="https://www.nedscholars.org/" target="blank"><img src="logo.png" alt="nedscholars">&nbsp NED SCHOLARS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php


        if (isset($_SESSION["email"]) && $_SESSION['user_type'] == 1) {
        ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.php">HOME</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link active" href="students.php">STUDENT INFO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="sh.php">USER SHEETS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="hidesheet.php">HIDE SHEETS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php">LOGOUT</a>
            </li>
            <li class="nav-item">
              <span class="nav-link active mx-5" style="text-transform:uppercase ;  border-left: 2px solid white;
                border-right: 2px solid white;"><?php
                                                if (isset($_SESSION["name"])) {
                                                  echo $_SESSION["name"];
                                                }
                                                ?></span>
            </li>
          </ul>
        <?php
        } else if (isset($_SESSION["email"]) && $_SESSION['user_type'] == 0) {
        ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="student.php">HOME</a>
            </li>
            <?php
            $userid = $_SESSION['user_id'];
            $sqlheader1 = "SELECT sheetname FROM billusersheetname WHERE user_id='$userid' AND status='1' ";
            $resultheader1 = mysqli_query($conn, $sqlheader1) or die("Query failed");
            if (mysqli_num_rows($resultheader1) == 0) {

            ?>
              <li class="nav-item" style="align-items: center;">
                <a class="nav-link active"><button class="btpop1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create Sheet
                  </button></a>
              </li>


            <?php } elseif (mysqli_num_rows($resultheader1) == 1) {

            ?>
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle mx-2 " href="#" id="navbarDropdown" user_type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  YOUR SHEETS
                </a>
                <ul class=" dropdown-menu  p-0 mx-2 mt-1 bg-light text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background:transparent!important; background-color:rgba(4, 94, 233, 0.5)!important;">
                  <?php $rowheader1 = mysqli_fetch_assoc($resultheader1);
                  $sheetname = $rowheader1['sheetname'];
                  $woutidsheetname = explode('.', $sheetname);
                  $actualsheetname = end($woutidsheetname);
                  echo  '<li><a class="n nav-link active dropdown-item " href="intake.php?sheetname=' . $sheetname . '"> ' . $actualsheetname . '.sheet </a></li>
         <li><a class="n nav-link active dropdown-item " ><button class="btpop1" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
         + ADD
        </button> </a></li>';

                  ?>

                </ul>
              </li>
            <?php


            } else { ?>
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle mx-2 " href="#" id="navbarDropdown" user_type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  YOUR SHEETS
                </a>
                <ul class=" dropdown-menu  p-0 bg-dark mx-2 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background-color:rgba(4, 94, 233, 0.5)!important;">
                  <?php

                  while ($rowheader2 = mysqli_fetch_assoc($resultheader1)) {
                    $sheetname1 = $rowheader2['sheetname'];
                    $woutidsheetname1 = explode('.', $sheetname1);
                    $actualsheetname1 = end($woutidsheetname1);
                    echo  '<li><a class="n nav-link active dropdown-item text-capitalize " href="intake.php?sheetname=' . $sheetname1 . '"> ' .  $actualsheetname1 . '.sheet </a></li>';
                  }

                  ?>
              </li>
          </ul>
        <?php    }

        ?>

        <li class="nav-item">
          <a class="nav-link active" href="logout.php">LOGOUT</a>
        </li>
        <li class="nav-item">
          <span class="nav-link active mx-5" style="text-transform:uppercase ;  border-left: 2px solid white;
                border-right: 2px solid white;"><?php
                                                if (isset($_SESSION["name"])) {
                                                  echo $_SESSION["name"];
                                                }
                                                ?></span>
        </li>
        </ul>
      <?php
        } else {
      ?>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="default.html">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="https://www.nedscholars.org/about-us/">ABOUTUS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="login.php">LOGIN</a>
          </li>
        </ul>




      <?php
        }
      ?>
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">SHEET NAME</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="config.php" method="post">
              <div class="modal-body text-center">
                <div class="wrap-input100 ">
                  <input class="input100 pb-0 mb-0" type="text" name="spreadsheet" required>
                  <span class="focus-input100" data-placeholder="Enter sheet Name"></span>
                </div>
              </div>
              <div class="modal-footer">
              
                <button type="submit" class="bt btn btn-primary" name="createsheet">ADD</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./assets/js/script.js?v=<?php echo $version ?>"></script>
  <script type="text/javascript" src="./assets/js/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>