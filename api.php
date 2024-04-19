<?php
require_once('database.php');
Class API extends DBConnection{
    public function __construct(){
        parent::__construct();
    }
    public function __destruct(){
		parent::__destruct();
	}
 function addmember()
    {
    extract($_POST);
        
        if (isset($_POST['userid1']) && isset($_POST['sheetname1']) && isset($_POST['date']) && isset($_POST['describe']) && isset($_POST['amount']) && isset($_POST['acknowledge'])) {
            $userid=$_POST['userid1'];
            $sheetname1=$_POST['sheetname1'];
            $describe= $_POST['describe'];
            $amount=$_POST['amount'];
            $acknowledge= $_POST['acknowledge'];
           
            $date=$_POST['date'];
            $filename = $_FILES['file']['name'];
            $filetmpname = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            if (!empty($_POST['date']) && !empty($_POST['describe']) && !empty($_POST['amount']) && !empty($_POST['acknowledge']) && !empty($_FILES['file']['name'])) {
                if (preg_match("/^([1-9]|0[1-9]|[12][0-9]|3[0-1])\/([1-9]|0[1-9]|1[0-2])\/\d{4}$/", $_POST['date'])) {
                    $fileext = explode('.', $filename);
                    $filenewname = rand(99999, 1000000) . "-" . $filename;
                    $filedestination = 'uploads/' . $filenewname;
                    $fileactualext = strtolower(end($fileext));
                    $allow = array('jpg', 'jpeg', 'pdf', 'png', 'gif', 'docx');
                    if (in_array($fileactualext, $allow)) {
                        if ($filesize < 1000000) {
                       if(move_uploaded_file($filetmpname, $filedestination)){
 $dynamicquery1 = "INSERT INTO `billusersheets`( `user_id`, `sheetname`, `description`, `balance`, `acknowledge`,`note`, `date`)VALUES('$userid','$sheetname1','$describe','$amount','$acknowledge','$filenewname','$date')" or die("failed"); 
    
                                $add = $this->conn->query($dynamicquery1);
                                if ($add && !$this->conn->error) {
                                    $resp['status'] = 'success';
                                    $resp['msg'] = 'New Record added';
                                } else {
                                    $resp['status'] = 'failed';
                                    $resp['msg'] = 'There\'s an error occured while Adding the Record';
                                    $resp['error'] = $this->conn->error;
                                }
                              } else {
                                $resp['status'] = 'failed';
                                $resp['msg'] = 'There\'s an error occured while Uploading  the file';
                                $resp['error'] = $this->conn->error;
                            }
                           
                        } else {
                            $resp['status'] = 'failed';
                            $resp['msg'] = 'Your file is too big!';
                            $resp['error'] = $this->conn->error;
                        }
                    } else {
                        $resp['status'] = 'failed';
                        $resp['msg'] = 'This type of file is not allowed!';
                        $resp['error'] = $this->conn->error;
                    }
                } else {
                    $resp['status'] = 'failed';
                    $resp['msg'] = 'Please Enter Valid Date!';
                    $resp['error'] = $this->conn->error;
                }
            }
elseif (!empty($_POST['date']) && !empty($_POST['describe']) && !empty($_POST['amount']) && !empty($_POST['acknowledge'])) {
                if (preg_match("/^([1-9]|0[1-9]|[12][0-9]|3[0-1])\/([1-9]|0[1-9]|1[0-2])\/\d{4}$/", $_POST['date'])) {
                    $dynamicquery = "INSERT INTO `billusersheets`( `user_id`, `sheetname`, `description`, `balance`, `acknowledge`, `date`) VALUES ('$userid','$sheetname1','$describe','$amount','$acknowledge','$date')" or die("failed");
                                $add = $this->conn->query($dynamicquery);
                                if ($add && !$this->conn->error) {
                                    $resp['status'] = 'success';
                                    $resp['msg'] = 'New Record added';
                                } else {
                                    $resp['status'] = 'failed';
                                    $resp['msg'] = 'There\'s an error occured while Adding the Record';
                                    $resp['error'] = $this->conn->error;
                                }
                    } else {
                    $resp['status'] = 'failed';
                    $resp['msg'] = 'Please Enter Valid Date!';
                    $resp['error'] = $this->conn->error;
                }
            }
 else {
                $resp['status'] = 'failed';
                $resp['msg'] = 'All Field are Required!';
                $resp['error'] = $this->conn->error;
            }
            return json_encode($resp);
        }
    }





    function save_member(){
        $data = "";
        $id = $_POST['billid'];
        
        foreach($_POST as $k => $v){
            // excluding id 
            if(!in_array($k,array('billid'))){
                // add comma if data variable is not empty
                if(!empty($data)) $data .= ", ";
                $data .= " `{$k}` = '{$v}' ";
            }
        }
        if(empty($id)){
            // Insert New Member
            $sql = "INSERT INTO `billusersheets` set {$data}";
        
        }else{
            // Update Member's Details
            $sql = "UPDATE `billusersheets` set {$data} where billid = '{$id}'";
        }
        $save = $this->conn->query($sql);
        if($save && !$this->conn->error){
            $resp['status'] = 'success';
            if(empty($id))
                $resp['msg'] = 'New Record added';
            else
            $resp['msg'] = 'Record successfully updated';

        }else{
            $resp['status'] = 'failed';
            $resp['msg'] = 'There\'s an error occured while saving the Record';
            $resp['error'] = $this->conn->error;
        }
        return json_encode($resp);
    }
    function delete_member(){
        $id = $_POST['billid'];
        $delete = $this->conn->query("DELETE FROM `billusersheets` where billid = '{$id}'");
        if($delete){
            $resp['status'] = 'success';
        }else{
            $resp['status'] = 'failed';
            $resp['msg'] = 'There\'s an error occured while deleting the Record';
            $resp['error'] = $this->conn->error;
        }
        return json_encode($resp);
    }

}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$api = new API();
switch ($action){
    case('save'):
        echo $api->save_member();
        break;
    case('delete'):
        echo $api->delete_member();
        break;
    case ('add'):
        echo $api->addmember();
        break;
    default:
        echo json_encode(array('status'=>'failed','error'=>'unknown action'));
        break;
    
}
?>