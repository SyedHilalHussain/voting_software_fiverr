<?php
// include "validateuser.php";
include "../adminheader.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: #f2f2f2; 
            display:flex; 
            min-height: 100vh;

             flex-direction: column;
        }
        a.btn,.li{
            margin:30px 10px;
            width:130px;
            padding:5px;
            border-radius: 30px;
        }
        .li1{
            width:120px!important ;
            background:transparent!important;
            color: #333!important;
            /* margin: 0; */
            padding: 0;
        }
        .li:hover{
            box-shadow: 5px 5px 10px #999;
            transition: 0.3s;
            color:#04245c!important ;
            background-color: rgba(4, 94, 233, 0.3);
        }
        .li{
            border:1px solid rgba(4, 94, 233, 0.9)!important ;
        }
        .li1:hover{
            
            border:1px solid rgba(4, 94, 233, 0.9)!important ;
            color: #fff;
            box-shadow: 5px 5px 10px #999;
            transition: 0.3s;
            border-radius:25px ;

            
        }
        a.btn-first{
            background-color:rgba(4, 94, 233, 0.3)!important;
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
        margin-left: 0;
      } 
      h1,.std{
  color: rgba(5, 99, 243, 0.6)!important;
  text-shadow: 1.3px 2px 2px  rgba(5, 104, 283, 1)!important;
  font-family: Poppins-Regular;
  font-size: 50px!important;
  font-weight: bold;
} 

     
      
    </style>
</head>
<body >
    
        
<div class="container" style="flex: 1;">
<!-- <div class=" d-flex  justify-content-center">
       
    <?php 
    if(isset($_SESSION["statusd"])){

        echo "<div class='alert alert-danger my-2 text-center' role='alert' style=' width:400px; padding: 3px; border-radius:15px;'>"
        .$_SESSION['statusd']."</div>";
        unset($_SESSION['statusd']);
        }
        if(isset($_SESSION["statusp"])){
        
        echo "<div class='alert alert-primary my-2 text-center' role='alert' style=' width:400px; padding: 3px; border-radius:15px;'>"
        .$_SESSION['statusp']."</div>";
        unset($_SESSION['statusp']);
        }
    
    
    
    
    ?>
</div> -->
    <div class="row ">
        <div class="hed col-sm-7 text-center">

       
        <h1>WELCOME TO USER PANEL</h1>
        <!-- <?php

        //   $userid=$_SESSION['user_id']; 
        //  $sqlheader1="SELECT sheetname FROM billusersheetname WHERE user_id='$userid' AND status='1' ";
        //  $resultheader1= mysqli_query($conn,$sqlheader1) or die("Query failed");
        //  if(mysqli_num_rows($resultheader1)==0){
          
         ?>
           
            <a class=" active btn btn-first" style="background-color:rgba(4, 94, 233, 0.5)!important;" ><button class="text-light" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
           Create Sheet
          </button></a>
          
        <?php 
        // }elseif(mysqli_num_rows($resultheader1)==1){
           
           ?>
             <li class=" dropdown">
         <a class="li active dropdown-toggle mx-2 text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:1px solid #04245c ;">
           YOUR SHEETS
         </a>
            <ul class=" dropdown-menu  p-0  mx-0 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:130px!important; background:transparent!important; border-radius:12px;">
         <?php
    //       $rowheader1=mysqli_fetch_assoc($resultheader1);
    //            $sheetname=$rowheader1['sheetname'];
    //            $woutidsheetname = explode('.', $sheetname);
    //            $actualsheetname =end($woutidsheetname);
    //     echo  '<li><a class="li1 active dropdown-item " href="intake.php?sheetname='.$sheetname.'"> '. $actualsheetname .'.sheet </a></li>
    //     <li><a class="li1  active dropdown-item bg-light" ><button  type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    //     + ADD
    //    </button> </a></li>';
         
         ?>

            
             </li>
             </ul>
         <?php

           
        //  }
        //  else{ 
            ?>
            <li class=" dropdown">
         <a class="li active dropdown-toggle mx-2 text-dark " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:1px solid #04245c ;">
         YOUR SHEETS
         </a>
         <ul class=" dropdown-menu  p-0  mx-0 mt-1 text-center" aria-labelledby="navbarDropdown" style="min-width:110px!important; background:transparent!important; border-radius:12px;">
         <?php
           
        //     while($rowheader2=mysqli_fetch_assoc($resultheader1)){
        //      $sheetname1=$rowheader2['sheetname'];
        //      $woutidsheetname1 = explode('.', $sheetname1);
        //      $actualsheetname1 =end($woutidsheetname1);
        //   echo  '<li><a class="li1  active dropdown-item text-capitalize " href="intake.php?sheetname='.$sheetname1.'"> '.  $actualsheetname1 .'.sheet </a></li>';
           

        //  }

?>
</li> 
</ul>
   <?php 
    //   }
         
         ?> -->
          <a class="li   mx-2 text-dark" href="sheetshow.php"  role="button"  style="border:1px solid #04245c ; text-decoration:none;">
           View Sheet
         </a>
        <a href="logout.php" class="btn btn-second">LOG OUT</a>
        </div>
     <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <img src="../../ma.jpg" alt="" class="img-responsive mt-5" width="200" 
     height="200">
        </div>
    </div>
</div>    


<?php include "../../footer.php"?>
</body>
</html>