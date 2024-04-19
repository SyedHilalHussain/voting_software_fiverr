<?php

// include "validate.php";
include "header.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEDS MED ADMIN</title>
    <style>
           body{
            background: #f2f2f2; 
        }
        a.btn{
            margin:30px 10px;
            width:140px;
            padding:5px;
            border-radius: 30px;
            /* font-size: 15px; */
        }
        a.btn-first{
            background-color:rgba(4, 94, 233, 0.4)!important;
            color: #fff!important;
        }
        a.btn-second{
            background-color:rgba(4, 94, 233, 0.4)!important;
            border: 1px solid rgba(4, 94, 233, 0.9);
            color:#333;
        }
        a.btn:hover{
            background-color:rgba(4, 94, 233, 0.3)!important;
            border: none;
            color: #fff;
            box-shadow: 5px 5px 10px #999;
            transition: 0.3s;
        }
      .hed{
        margin-top: 120px!important;
      } 
      h1{
  color: rgba(4, 94, 233, 0.5);
  text-shadow: 1.3px 2px 2px  rgba(4, 94, 233, 0.9)!important;
  font-family: Poppins-Regular;
  font-size: 30px ;
  font-weight: bold;
} 
     
      
    </style>
</head>
<body>

      
<div class="container my-5 ">
    <div class="row ">
        <div class="hed col-sm-7 mx-0 text-center">

        
        <h1>WELCOME TO ADMIN PANEL FOR ACCOUNT BALANCES</h1>
        <a href="sheetshow.php" class="btn btn-first">BILL SHEET</a>
        <a href="students.php" class="btn btn-first">STUDENT DETAIL</a>
        <a href="logout.php" class="btn btn-second">LOG OUT</a>
        </div>
        <div class="col-sm-2" ></div>
        <div class="col-sm-3">
            <img src="acc.jpg" alt="" class="img-responsive mt-5" width="300" 
     height="200">
        </div>
    </div>
</div>    




<?php include "footer.php"?>
</body>
</html>