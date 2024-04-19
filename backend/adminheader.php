<?php
include "config.php";
$version = 41;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>NED SCHOLARS BILLING PORTAL</title>
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
      <a class=" brand navbar-brand " href="https://www.nedscholars.org/" target="blank"><img src="../logo.png" alt="nedscholars">&nbsp NED SCHOLARS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">



        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          if (isset($_SESSION['user_type']) && isset($_SESSION['user_id']) && $_SESSION['user_type'] == 0) {
          ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="default.html">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../user/edit_user.php">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="../user/vote.php">Vote</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle mx-2 " href="#" id="navbarDropdown" user_type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Problem
              </a>
              <ul class=" dropdown-menu  p-0 bg-dark mx-2 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background-color:rgba(4, 94, 233, 0.5)!important;">



                <li><a class="n nav-link active mt-0 p-0 text-small dropdown-item text-capitalize " href="../user/view_problem.php">All</a></li>
                <li><a class="n nav-link active mt-0  p-0 text-small dropdown-item text-capitalize " href="../user/view_problem.php?id=<?php echo $_SESSION['user_id'] ?>">Your</a></li>
               
                <li><a class="n nav-link active mt-0 p-0 text-small dropdown-item text-capitalize " href="../user/add_problem.php">Add</a></li>


            </li>
        </ul>
      <?php
          } else {

      ?>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="default.html">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../user/edit_user.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../admin/users.php">User Info</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="../user/vote.php">Vote</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle mx-2 " href="#" id="navbarDropdown" user_type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Problem
          </a>
          <ul class=" dropdown-menu  p-0 bg-dark mx-2 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background-color:rgba(4, 94, 233, 0.5)!important;">



            <li><a class="n nav-link active dropdown-item text-capitalize " href="../admin/view_problem.php">View</a></li>
            <li><a class="n nav-link active dropdown-item text-capitalize " href="../admin/add_problem.php">Add</a></li>
          </ul>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle mx-2 " href="#" id="navbarDropdown" user_type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class=" dropdown-menu  p-0 bg-dark mx-2 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background-color:rgba(4, 94, 233, 0.5)!important;">
            <li><a class="n nav-link active dropdown-item text-capitalize " href="../admin/view_categories.php">View</a></li>
            <li><a class="n nav-link active dropdown-item "><button class="btpop1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  ADD
                </button> </a></li>
          </ul>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle mx-2 " href="#" id="navbarDropdown" user_type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Community
          </a>
          <ul class=" dropdown-menu  p-0 bg-dark mx-2 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background-color:rgba(4, 94, 233, 0.5)!important;">
            <li><a class="n nav-link active dropdown-item text-capitalize " href="../admin/view_communities.php">View</a></li>
            <li><a class="n nav-link active dropdown-item "><button class="btpop1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                  ADD
                </button> </a></li>
          </ul>

        </li>

      <?php } ?>
      <li class="nav-item">
        <a class="nav-link active" href="../logout.php">LOGOUT</a>
      </li>
      </ul>




      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"> ADD CATEGORY</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="login100-form validate-form" action="../config.php" method="POST">




              <div class="form-floating m-3">
                <input type="text" name="category" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Category</label>
              </div>


              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn w-50 my-2">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn" name="add_category">
                    ADD
                  </button>
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add Community</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="login100-form validate-form" action="../config.php" method="POST">




              <div class="form-floating m-3">
                <input type="text" name="community" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Community</label>
              </div>


              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn w-50 my-2">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn" name="add_community">
                    ADD
                  </button>
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script type="text/javascript" src="./assets/js/script.js?v=<?php echo $version ?>"></script> -->

  <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script> -->
</body>

</html>