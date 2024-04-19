<?php
// session_start();
// include "validate.php";
include "header.php";
require_once('database.php');
$db = new DBConnection();
$conn = $db->conn;
extract($_POST);
 $selectedValue = $_POST['selection'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>NED SCHOLARS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    .editable{
     
        display:none;
    }
</style>


	<link rel="stylesheet" href="intake.css">
<!--===============================================================================================-->
<style>
 .form-select:focus {
  border-color: #5DD4D4;
  box-shadow: inset 0 1px 1px rgba(93, 212, 212, 0.5), 0 0 8px rgba(93, 212, 212, 0.5);
  background-color: #EFFEFE;
}
.dataTables_filter input{
justify-content:center;
margin-left:32%;
margin-bottom:3px; 
}
.dataTables_filter label{
margin-left:48%;
}
.dataTables_filter input:focus {
  border-color: #5DD4D4;
  box-shadow: inset 0 1px 1px rgba(93, 212, 212, 0.5), 0 0 8px rgba(93, 212, 212, 0.5);
  background-color: #EFFEFE;
}

     .bt{
            
            width:50px;
           margin:1px ;
            border-radius: 25px!important;
            font-size: 12px;
            height: 20px;
            padding-top: 0!important;
            padding-bottom: 1px!important;
        }
        .btn-first{
            background-color: #04245c!important;
            color: #fff!important;
        }
        .btn:hover{
            background: #04245c;
            border: none;
            color: #fff;
            box-shadow: 5px 5px 10px #999;
            transition: 0.3s;
        }
		td{
			
      height:10px!important;
      padding-top:3px!important;
      padding-bottom: 0!important; 
		}
.scrollable {
    width: 535px;
   height:30px; 
    margin: 0!important;
    
    overflow-x: auto;
    overflow-y: auto;
   scrollbar-width:2px!important;
   
    
}

thead th{
  
  top: 0; 
  z-index: 10; 
  padding:0!important; 
  height:20px!important; 
  
}
.table-sticky th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}

th:after,
th:before {
  content: '';
  position: absolute;
  left: 0;
  width: 100%;
}

th:before {
  top: -1px;
  border: 1px solid #04245c;
}

th:after {
  bottom: -1px;
  border-bottom: 2px solid grey;
  
  
}

:root {
        --code-color: darkred;
        --code-bg-color: #aaaaaa;
        --code-font-size: 12px;
        --code-line-height: 1.4;
        --scroll-bar-color: #c5c5c5;
        --scroll-bar-bg-color: #f6f6f6;
    }
    ::-webkit-scrollbar-corner { background: var(--scroll-bar-bg-color); }

* {
    scrollbar-width:thin;
    scrollbar-color: var(--scroll-bar-color) var(--scroll-bar-bg-color);
}

/* Works on Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 12px;
    height: 12px;
}

*::-webkit-scrollbar-track {
    background: var(--scroll-bar-bg-color);
}

*::-webkit-scrollbar-thumb {
    background-color: var(--scroll-bar-color);
    border-radius: 20px;
    border:2px solid var(--scroll-bar-bg-color);
}
@media (max-width: 500px) {
  .bt{
      font-size: 10px;
      width: 35px !important;
     
      margin: 1px !important;
    }
  .bt1{
    text-align:left!important;
    width: 40%!important;
  }
  .scrollable {
    width: 300px;
    
    padding-bottom: 5px;
    margin-bottom: 0px;
   
    
} 
.warning{
font-size:5px!important;    
  }
}
</style>




</head>
<body >


<?php
				
if(isset($_SESSION['statusp'])){

echo "<div class='alert alert-primary  text-center' role='alert' style='width:400px; margin-left:35%; padding: 10px; border-radius:10px;'>"
.$_SESSION['statusp']."</div>";
unset($_SESSION['statusp']);
}
if(isset($_SESSION["statusd"])){

echo "<div class='alert alert-danger text-center' role='alert' style='width:400px; margin-left:35%; padding: 10px; border-radius:10px;'>"
.$_SESSION['statusd']."</div>";
unset($_SESSION['statusd']);
}
if(isset($_SESSION['user_id'])){
  $uid=$_GET['id'];
  $sheetname=$_GET['sname'];
  $woutidsheetname = explode('.', $sheetname);
  $actualsheetname =end($woutidsheetname);

?>
<div class="text-center mt-2 text-uppercase" style=" color:rgba(4, 94, 233, 0.9); letter-spacing:0.1rem; text-shadow: 1.3px 2px 2px rgba(4, 94, 233, 0.7); font-size:25px;  font-family: Poppins-Regular;">SHEET NAME: <?php echo $actualsheetname ; ?> </div>
<?php 
 $query2 =$conn->query("SELECT SUM(balance)  FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname' order by billid desc");
 $row1 = $query2->fetch_array();
 
  $sumup=$row1[0];
?>

<div class="containerfluid" style="margin:10px ;">




<div  class="table-wrapper-scroll-y table-responsive mb-2 text-center" style="height:380px ; border:#04245c;">

<form action="" id="form-data">

<input type="hidden" id="userid" name="user_id" value="<?php echo $uid?>">
<input type="hidden" id="sheetname" name="sheetname" value="<?php echo $sheetname?>">
</form>
<form action="" id="insertrecord" autocomplete="off" enctype="multipart/form-data">
<input type="hidden" name="billid" value="">
<div class="d-flex justify-content-end py-1 " >
 <select class="form-select form-select-sm d-flex justify-content-end" id="select" aria-label="Default select example" 
  style="width:200px; ">
  <option value="0" selected >All</option>
  <option value="-1">Debit</option>
  <option value="1">Credit</option>
</select></div>

<table class="table table-bordered text-center table-sticky " id="form-tbl">
<colgroup>
                        <col width="7%">
                        <col width="35%">
                      
                        <col width="8%">
                        <col width="14%">
                        <col width="25%">
                        <col width="10%">
                        
                    </colgroup>
  <thead class="thead thead-dark bg-dark text-light p-0 " style=" position: sticky; top: 0; z-index: 10; padding:0!important; height:20px!important;" >
  <tr class="fr bg-light text-dark" >
<th style="display:none!important;"></th>
      <th style="display:none!important;"></th>
      <th style="display:none!important;"></th>
      <th style="display:none!important;"></th>
        <th style=" font-size: 12px; padding:5px;">Valid:<span style="color: red; font-size:10px;">dd/mm/yyyy</span></th>
        <th class="text-end" style=" background-color:rgba(4, 94, 233, 0.7);">CURRENT BALANCE Rs.=</th>
        
        <th style=" background-color:rgba(4, 94, 233, 0.7);"><?php echo $sumup ?></th>
        
<th colspan="3" class="warning" style=" font-size:10px!important;">Amount should have no decimal numbers or commas. All CREDITS (expenses) should start with - </th>
        
      </tr>
    <tr class="p-0 m-0"   >
       <th style="display:none!important;"></th>
      <th style="display:none!important;"></th>
    <th    scope="col">DATE</th>
      <th  scope="col">DESCRIPTION</th>
      
      <th  scope="col">AMOUNT(RS)</th>
      <th  scope="col"> ACKNOWLEDGE</th>
      <th  scope="col">FILE</th>
	  <th  scope="col"><button class="bt btn btn-flat bg-dark btn-primary my-1 add_member " id="add_member" type="button" style=" padding:1px!important;">Add</button></th>
    </tr>
     
     
     
    
  </thead>
  
  
    <tbody >
      
    <?php 
       
                    
                    $query = $conn->query("SELECT * FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname'  order by billid desc");
                   
                     
                    
                    
                    while($row = $query->fetch_assoc()):
                      
                     
                      
                      
                    ?>
    <tr data-id='<?php echo $row['billid'] ?>'>
		<td name="user_id" style="display:none!important;"><?php echo $row['user_id'] ?></td>
    <td name="sheetname" style="display:none!important;"><?php echo $row['sheetname'] ?></td>
    <td name="date"><?php echo $row['date'] ?></td>
    <td class="p-0 " name="description"><div class="scrollable"><?php echo $row['description'] ?></div></td>
    <?php if($row['balance']<0){?>
    <td name="balance" style="color:red;"><?php echo $row['balance'] ?></td>
  <?php }else{
    ?>
    <td name="balance"><?php echo $row['balance'] ?></td>
    <?php } ?>
    <td name="acknowledge"><?php echo $row['acknowledge'] ?></td>
<?php $arr = explode('-',trim($row['note']));
    $notespec= $arr[1];
    ?>
    <td class="p-0" name="note"><a href="uploads/<?php echo $row['note'] ?>" target="blank"><?php echo $notespec ?></a></td> 
    <td  class=" p-1" style="display:inline-flex;">
                            <button class="bt btn btn-primary btn-sm rounded-0 py-0 edit_data noneditable" type="button">Edit</button>
                            <button class="bt btn btn-danger btn-sm rounded-0 py-0 delete_data noneditable" type="button">Delete</button>
                            <button class="bt btn btn-sm btn-primary btn-flat rounded-0  py-0 editable" >Save</button>
                            <button class="bt btn btn-sm btn-dark btn-flat rounded-0  py-0 editable" onclick="cancel_button($(this))" type="button">Cancel</button></td>
                        </td>
		</tr>
			
     

    
     
      
     
    <?php endwhile; ?> 
    
  </tbody>
</table>
</form>
<!-- <div class="w-100 d-flex  justify-content-center">  -->
            
        <!-- </div> -->
        <?php }else{
          echo '<div class="text-center mt-3" style=" color: #04245c;  text-shadow: 1.3px 2px 2px  #1d00db!important; font-size:20px;  font-family: Poppins-Regular;">Please Login First!</div>';
          

        } ?>
</div>

</div>


	<div id="dropDownSelect1"></div>
	
<div class="my-1"></div>

 
	
	<!-- /Footer -->

<?php include "footer.php"?>
		
	
</body>
</html>