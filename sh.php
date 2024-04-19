<?php
include "validate.php";
include "header.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>NED SCHOLARS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="intake.css">

  <!--===============================================================================================-->
</head>
<?php
$limit = 10;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$offset = ($page - 1) * $limit;
$sql = "SELECT billusers.*,billusersheetname.sheetname,billusersheetname.status FROM billusers,billusersheetname WHERE billusers.user_id=billusersheetname.user_id AND billusersheetname.status=1  ORDER BY user_id ASC LIMIT {$offset},{$limit}";

$result = mysqli_query($conn, $sql) or die("Query failed");
if (mysqli_num_rows($result) > 0) {



?>

  <body>

    <div class="text-center my-1" style=" color:rgba(4, 94, 233, 0.9);  text-shadow: 1.3px 1px 3px rgba(4, 94, 233, 0.8)!important; font-size:30px;  font-family: Poppins-Regular;">USER SHEETS</div>
    <div class="container col-lg-8">
      <div class="table table-responsive mb-1 ">
        <table class="table table-bordered">
          <thead class="thead thead-dark bg-dark text-light">
            <tr>

              <th class="text-center" scope="col">NAME</th>
              <th class="text-center" scope="col">SHEET</th>
              <th class="text-center px-0" style="font-size:small!important; " scope="col">PREVIEW</th>
            </tr>
          </thead>
          <?php while ($row = mysqli_fetch_assoc($result)) {
            $id1 = $row['user_id'];
            $sheetname = $row['sheetname'];
            $woutidsheetname = explode('.', $sheetname);
            $actualsheetname = end($woutidsheetname);

          ?>
            <tbody>
              <tr class=" text-uppercase">


                <td class="px-2 py-0 "><?php echo $row['name'] ?> </td>
                <td class="px-2 py-0 "><span><?php echo $actualsheetname ?></span><a href="sheetshow.php?id=<?php echo $id1 ?>&sname=<?php echo $sheetname ?>&name=<?php echo $row['name'] ?>"><span class="mx-2"></span></a> </td>
                <td class="px-2 py-0 text-center "><a href="sheetshow.php?id=<?php echo $id1 ?>&sname=<?php echo $sheetname ?>&name=<?php echo $row['name'] ?>"><span class="mx-2"><i class="h bi bi-eye-fill "></i></span></a> </td>
              </tr>


              </tr>

            </tbody>
        <?php
          }
        } else {
          echo '<div class="text-center my-5" style=" color: #04245c;  text-shadow: 1.3px 2px 2px  #1d00db!important; font-size:50px;  font-family: Poppins-Regular;">NO INTAKE</div>
  ';
        }

        ?>
        </table>

      </div>
      <?php
      $sql1 = "SELECT * FROM billusersheetname Where status=1";
      $result1 = mysqli_query($conn, $sql1) or die("query failed");
      if (mysqli_num_rows($result1) > 0) {
        $total_records = mysqli_num_rows($result1);
        $total_p = ceil($total_records / $limit);
        echo "<ul class='pagination admin-pagination justify-content-center'>";
        if ($page > 1) {
          echo '<li class="page-item" ><a class="page-link" href="sh.php?page=' . ($page - 1) . '">prev</a></li>';
        }
        for ($i = 1; $i <= $total_p; $i++) {
          if ($i == $page) {
            $act = "active";
          } else {
            $act = "";
          }
          echo '<li class="page-item ' . $act . '" ><a class="page-link" href="sh.php?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($page < $total_p) {
          echo '<li class="page-item"><a class="page-link" href="sh.php?page=' . ($page + 1) . '">next</a></li></ul>';
        }
      } ?>
    </div>


    <div id="dropDownSelect1"></div>


    <?php include "footer.php" ?>


    <!-- /Footer -->



  </body>

</html>