 
 <?php 

$conn = mysqli_connect("localhost", "root", "", "billingdb") or die("connection failed");

  $uid=$_POST['userid'];
  $sheetname=$_POST['sheetname22'];
  $woutidsheetname = explode('.', $sheetname);
  $actualsheetname =end($woutidsheetname);
  
  $selectedvalue=$_POST['selection']; 

  
                if($selectedvalue==1){    
                    $query = $conn->query("SELECT * FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname' and sign(balance)=1 order by billid desc");
                    $query2 =$conn->query("SELECT SUM(balance)  FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname' AND sign(balance)=1  order by billid desc");
                    $row1 = $query2->fetch_array();
                    $sumup=$row1[0];
                   }elseif($selectedvalue==-1){
                    $query = $conn->query("SELECT * FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname' and sign(balance)=-1 order by billid desc");
                    $query2 =$conn->query("SELECT ABS(SUM(balance))  FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname' AND balance<0  order by billid desc");
                    $row1 = $query2->fetch_array();
                    $sumup=$row1[0];
                 
                   }else{
$query = $conn->query("SELECT * FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname'  order by billid desc");
$query2 =$conn->query("SELECT SUM(balance)  FROM  billusersheets WHERE user_id='$uid' and sheetname='$sheetname'   order by billid desc");
$row1 = $query2->fetch_array();
$sumup=$row1[0];
}

?>
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


<?php
                    
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
    $notespec= $arr[1];?>
    <td class="p-0" name="note"><a href="uploads/<?php echo $row['note'] ?>" target="blank"><?php echo $notespec ?></a></td> 
    <td  class="but p-1" style="display:inline-flex;">
                            <button class="bt btn btn-primary btn-sm rounded-0 py-0 edit_data noneditable" type="button">Edit</button>
                            <button class="bt btn btn-danger btn-sm rounded-0 py-0 delete_data noneditable" type="button">Delete</button> 
                            <button class="bt btn btn-sm btn-primary btn-flat rounded-0  py-0 editable" >Save</button>
                            <button class="bt btn btn-sm btn-dark btn-flat rounded-0  py-0 editable" onclick="cancel_button($(this))" type="button">Cancel</button></td>
                        </td>
		</tr>
			
     

    
     
      
     
    <?php endwhile; ?>
  