<?php

$conn = mysqli_connect("localhost", "root", "", "problem_db") or die("connection failed");
session_start();
session_regenerate_id(true);
////////..................login.....................///////////////////////////

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT user_id,name,email,password,role,status FROM user WHERE email='{$email}'";

    $result = mysqli_query($conn, $sql)  or die("query failed");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $passcheck = $row['password'];
        $password_check = password_verify($password, $passcheck);
        if ($password_check) {
            if ($row['role'] == 0  &&    $row['status'] ==  1) {
                $_SESSION["email"] = $row['email'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["name"] = $row['name'];
                $_SESSION["role"] = $row['role'];
                $_SESSION["status"] = $row['status'];
                header("Location: student.php");
            } else if ($row['role'] == 1  && $row['status'] == 1) {
                $_SESSION["email"] = $row['email'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["name"] = $row['name'];
               $_SESSION["status"] = $row['status'];
                $_SESSION["role"] = $row['role'];
                header("Location: admin.php");
            } else {

                $_SESSION['statusd'] = "YOUR Account Are Not Verify Yet!";
                header("Location:login.php");
            }
        } else {
            $_SESSION['statusd'] = "INCORRECT PASSWORD!";
            header("Location:login.php");
        }
    } else {
        $_SESSION['statusd'] = "Invalid Email ID!";
        header('Location:login.php');
    }
}

    



//////////////////////////.....................Edit coding............................/////////////////////////////////////////

if (isset($_POST['update'])) {
    $upid = $_POST['id'];
    $upname = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    $upcontact = htmlentities(mysqli_real_escape_string($conn, $_POST['contact']));
    $upemail = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $uprole = htmlentities(mysqli_real_escape_string($conn, $_POST['role']));
    $update_query = "UPDATE user SET name='$upname',contact='$upcontact',email='$upemail',role='$uprole' WHERE user_id='$upid' " or die("Query failed");

    if (preg_match("/^[0-1]*$/", $uprole)) {
       
            if (preg_match("/^[\p{L&} -]+$/u", $upname)) {
                if (mysqli_query($conn, $update_query)) {
                    $_SESSION['statusp'] = "ID &nbsp&nbsp" . $upid . "&nbsp&nbsp Profile Updated Successfully!";
                    header('Location:students.php');
                } else {
                    $_SESSION['statusd'] = "Fail to Update Profile!";
                    header('Location:students.php');
                }
            } else {
                $_SESSION['statusd'] = "Only alphabets and whitespace are allowed in name!";
                header('Location:students.php');
            }
       
    } else {
        $_SESSION['statusd'] = "Enter Only 0 or 1 For Role!";
        header('Location:students.php');
    }
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail1($e1,$m1,$message,$subject){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'syedhilalkhan64@gmail.com';                     //SMTP username
        $mail->Password   = 'wcbdqepssuxalidy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('syedhilalkhan64@gmail.com', 'NEDSCHOLARS');
        $mail->addAddress($e1,$m1);     //Add a recipient
        
    
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject =$subject;
        $email_template=$message;
        $mail->Body    = $email_template;
        
    
        $mail->send();
        return true;
       
    } catch (Exception $e) {
        echo " Email Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }


}

if (isset($_POST['statuson'])) {
    $m1 = $_POST['name'];
    $e1 = $_POST['email'];

    $statusid = $_POST['id'];
    $statuson_query = "UPDATE user SET status='1' WHERE user_id='$statusid' ";
    $message = "Your Account Verified By Admin. 
    Now You Can Use your Account
    For Log In Click the Below Link
    Click Here --><a href='http://bills.nedscholars.org/login.php'>Log In</a>
";
$sub = 'EMAIL Verification From NEDSCHOLARS';
    if (mysqli_query($conn, $statuson_query)) {
        sendemail1($e1, $m1, $message,$sub);
        $_SESSION['statusp'] = "USER ID:&nbsp&nbsp" . $statusid . "&nbsp&nbspAccount Status ON Successfully!";
        header('Location:students.php');
    }else{
        $_SESSION['statusd'] = "Fail to ON Status!";
        header('Location:students.php');

}
}
if (isset($_POST['statusoff'])) {

    $m = $_POST['name'];
    $e = $_POST['email'];
    $statusid1 = $_POST['id'];
    $statuson_query = "UPDATE user SET status='0' WHERE user_id=' $statusid1' ";
    $message1 = "Your Account Deactivate By Admin.Contact Admin ";
    $sub = 'EMAIL Verification From NEDSCHOLARS';
    if (mysqli_query($conn, $statuson_query)) {
        
        sendemail1($e, $m, $message1, $sub);
        $_SESSION['statusp'] = "USER ID:&nbsp&nbsp" . $statusid1 . "&nbsp&nbspAccount Status OFF Successfully!";
        header('Location:students.php');
    }
}
////////////////////.............ForGot Password...................///////////////////
if(isset($_POST['passemailcheck'])){
    $forgotemail = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $check_email = "SELECT * FROM user WHERE email='$forgotemail'";
    $run_sql = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE user SET code = $code WHERE email = '$forgotemail'";
        $run_query =  mysqli_query($conn, $insert_code);
        $forgot_row = mysqli_fetch_assoc($run_sql);
        $sub2 = "Password Reset Code";
        $forgotmessage = "Your password reset code is $code";
        $forgotname=$forgot_row['name'];
        if($run_query){
           
            if(sendemail1($forgotemail, $forgotname, $forgotmessage,$sub2)){
            
            $_SESSION['statusp'] = "We've sent a passwrod reset code to your email -$forgotemail";
            $_SESSION['forgotemail'] = $forgotemail;
            header('location:resetcode.php');
        }else{
echo "failed";
            }
                 
            }else{
                $_SESSION['statusd']  = "Failed while sending code!";
                header('location: forgot.php');
            }
        
    }else{
        $_SESSION['statusd']  = "This email address does not exist!";
        header('location: forgot.php');
    }
}
  
  //////////coderesetwork//////////////////
  if(isset($_POST['codecheck'])){
    
    $otp_code = mysqli_real_escape_string($conn, $_POST['code']);
    $check_code = "SELECT * FROM user WHERE code = '$otp_code'";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $forgotemail1 = $fetch_data['email'];
        $_SESSION['$forgotemail1'] = $forgotemail1;
        $info = "Please create a new password.";
        $_SESSION['statusp'] = $info;
        header('location: newpassword.php');
       
    }else{
        $_SESSION['statusd'] = "You've entered incorrect code!";
        header('location:resetcode.php');
    }
}

////////// New Password //////////////
if(isset($_POST['change'])){
    
    $forgotpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $forgotcpassword = mysqli_real_escape_string($conn, $_POST['newcpassword']);
    if($forgotpassword !== $forgotcpassword){
        $_SESSION['statusd'] = "Confirm password not matched!";
        header('location:newpassword.php'); 
    }else{
        $code = 0;
        $email = $_SESSION['$forgotemail1'] ; 
        $encpass = password_hash($forgotpassword, PASSWORD_BCRYPT);
        $update_pass = "UPDATE user SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['statusp'] = $info;
            header('Location:login.php');
        }else{
            $_SESSION['statusd'] = "Failed to change your password!";
            header('location:newpassword.php');
        }
    }
}

////////// admin passchange/////////////////////////////////
if(isset($_POST['passchange'])){
    $passchangeid = mysqli_real_escape_string($conn, $_POST['passid']);
    $forgotpassword1 = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $forgotcpassword1 = mysqli_real_escape_string($conn, $_POST['newcpassword']);
    if($forgotpassword1 !== $forgotcpassword1){
        $_SESSION['statusd'] = "Confirm password not matched!";
        header('location:passchange.php'); 
    }else{
        
        $encpass1 = password_hash($forgotpassword1, PASSWORD_BCRYPT);
        $update_pass1 = "UPDATE user SET  password = '$encpass1' WHERE user_id = '$passchangeid'";
        $run_query1 = mysqli_query($conn, $update_pass1);
        if($run_query1){
            $info1 = "Password of user_id:&nbsp&nbsp" .$passchangeid . "&nbsp&nbsp change Successfully.";
            $_SESSION['statusp'] = $info1;
            header('Location:students.php');
        }else{
            $_SESSION['statusd'] = "Failed to change  password!";
            header('location:passchange.php'); 
        }
    }
}

//..............create spreadsheet.............///////
if(isset($_POST['createsheet'])){
    $sheetname = mysqli_real_escape_string($conn, $_POST['spreadsheet']);
    $sheetid=$_SESSION['user_id'];
    $uniquesheetname=uniqid().".".$sheetname;
    $sheetcheckquery="INSERT INTO userheetname(user_id,sheetname) VALUES('$sheetid','$uniquesheetname') ";
    if(mysqli_query($conn,$sheetcheckquery)){
        $_SESSION['statusp'] = "NEW SHEET CREATE SUCCESSFULLY!";
        header('location:student.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to create sheet!";
            header('location:student.php'); 
    }
    


}


// ...............admin create sheet .....................////
if(isset($_POST['createadminsheet'])){
    $sheetid1 = mysqli_real_escape_string($conn, $_POST['userid1']);
    $sheetname = mysqli_real_escape_string($conn, $_POST['spreadsheet']);
    $uniquesheetname=uniqid().".".$sheetname;
    $sheetcheckquery="INSERT INTO userheetname(user_id,sheetname) VALUES('$sheetid1','$uniquesheetname') ";
    if(mysqli_query($conn,$sheetcheckquery)){
        $_SESSION['statusp'] = "NEW SHEET OF USER: ".$sheetid1. " HAS CREATED !";
        header('location:students.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to create sheet!";
            header('location:students.php'); 
    }
    


}