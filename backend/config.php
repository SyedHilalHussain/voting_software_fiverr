<?php

$conn = mysqli_connect("localhost", "root", "", "problem_db" ) or die("connection failed");
session_start();
session_regenerate_id(true);

// email function 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
include '../vendor/autoload.php';

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
////..................login.....................///////////////////////////

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT user_id,name,email,password,user_type,status FROM user WHERE email='{$email}'";

    $result = mysqli_query($conn, $sql)  or die("query failed");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $passcheck = $row['password'];
        $password_check = password_verify($password, $passcheck);
        if ($password_check) {
            if ($row['user_type'] == 0  &&    $row['status'] ==  1) {
                $_SESSION["email"] = $row['email'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["name"] = $row['name'];
                $_SESSION["user_type"] = $row['user_type'];
                $_SESSION["status"] = $row['status'];
                header("Location: ./user/user.php");
            } else if ($row['user_type'] == 1  && $row['status'] == 1) {
                $_SESSION["email"] = $row['email'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["name"] = $row['name'];
               $_SESSION["status"] = $row['status'];
                $_SESSION["user_type"] = $row['user_type'];
                header("Location: ./admin/admin.php");
            } else {

                $_SESSION['statusd'] = "YOUR Account Are Not Verify Yet!";
                header("Location:../login.php");
            }
        } else {
            $_SESSION['statusd'] = "INCORRECT PASSWORD!";
            header("Location:../login.php");
        }
    } else {
        $_SESSION['statusd'] = "Invalid Email ID!";
        header('Location:../login.php');
    }
}

////..................voting code .....................///////////////////////////

if(isset($_POST['voting'])){
    $user_id = $_POST['user_id'];
    $problem_id = mysqli_real_escape_string($conn, $_POST['problem_id']);
    $vote_id = mysqli_real_escape_string($conn,$_POST['vote_id']);
    $votequery="INSERT INTO vote(problem_id,user_id,votetype_id) VALUES('$problem_id','$user_id','$vote_id') ";
    if(mysqli_query($conn,$votequery)){
        $_SESSION['statusp'] = "VOTE ADDED SUCCESSFULLY!";
        $redirectUrl = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : './user/vote.php';
        header('location:'.$redirectUrl); 
    }else{
        $_SESSION['statusd'] = "Failed to add vote!";
        $redirectUrl = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : './user/vote.php';
            header('location:'.$redirectUrl); 
    }
    


}


//////////////////////////.....................user update  coding............................/////////////////////////////////////////
if (isset($_POST['user_update'])) {
    $upid = $_POST['id'];
    $upname = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    $upemail = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $update_query = "UPDATE user SET name='$upname',email='$upemail' WHERE user_id='$upid' " or die("Query failed");

       
            if (preg_match("/^[\p{L&} -]+$/u", $upname)) {
                if (mysqli_query($conn, $update_query)) {
                    $_SESSION['statusp'] = "ID &nbsp&nbsp" . $upid . "&nbsp&nbsp Profile Updated Successfully!";
                    header('Location:edit.php');
                } else {
                    $_SESSION['statusd'] = "Fail to Update Profile!";
                    header('Location:edit.php');
                }
            } else {
                $_SESSION['statusd'] = "Only alphabets and whitespace are allowed in name!";
                header('Location:edit.php');
            }
       
   
}
//////////////////////////.....................edit  coding............................/////////////////////////////////////////

if (isset($_POST['edit_user'])) {
    $upid = $_POST['id'];
    $upname = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    
    $upemail = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $upuser_type = htmlentities(mysqli_real_escape_string($conn, $_POST['user_type']));
    $update_query = "UPDATE user SET name='$upname',email='$upemail',user_type='$upuser_type' WHERE user_id='$upid' " or die("Query failed");

    if (preg_match("/^[0-1]*$/", $upuser_type)) {
       
            if (preg_match("/^[\p{L&} -]+$/u", $upname)) {
                if (mysqli_query($conn, $update_query)) {
                    $_SESSION['statusp'] = "ID &nbsp&nbsp" . $upid . "&nbsp&nbsp Profile Updated Successfully!";
                    header('Location:./admin/edit.php');
                } else {
                    $_SESSION['statusd'] = "Fail to Update Profile!";
                    header('Location:./admin/edit.php');
                }
            } else {
                $_SESSION['statusd'] = "Only alphabets and whitespace are allowed in name!";
                header('Location:./admin/edit.php');
            }
       
    } else {
        $_SESSION['statusd'] = "Enter Only 0 or 1 For user_type!";
        header('Location:./admin/edit.php');
    }
}
//////////////////////////.....................Account status on/off............................/////////////////////////////////////////

if (isset($_POST['statuson'])) {
    $m1 = $_POST['name'];
    $e1 = $_POST['email'];

    $statusid = $_POST['id'];
    $statuson_query = "UPDATE user SET status='1' WHERE user_id='$statusid' ";
    $message = "Your Account Verified By Admin. 
    Now You Can Use your Account
    For Log In Click the Below Link
    Click Here --><a href=''>Log In</a>
";
$sub = 'EMAIL Verification';
    if (mysqli_query($conn, $statuson_query)) {
        mail($e1,$sub, $message);
        $_SESSION['statusp'] = "USER ID:&nbsp&nbsp" . $statusid . "&nbsp&nbspAccount Status ON Successfully!";
        header('Location:./admin/users.php');
    }else{
        $_SESSION['statusd'] = "Fail to ON Status!";
        header('Location:./admin/users.php');

}
}
if (isset($_POST['statusoff'])) {

    $m = $_POST['name'];
    $e = $_POST['email'];
    $statusid1 = $_POST['id'];
    $statuson_query = "UPDATE user SET status='0' WHERE user_id=' $statusid1' ";
    $message1 = "Your Account Deactivate By Admin.Contact Admin ";
    $sub = 'EMAIL Verification';
    if (mysqli_query($conn, $statuson_query)) {
        
        mail($e,$sub, $message);
        $_SESSION['statusp'] = "USER ID:&nbsp&nbsp" . $statusid1 . "&nbsp&nbspAccount Status OFF Successfully!";
        header('Location:./admin/users.php');
    }
}
// ////////////////////.............ForGot Password...................///////////////////
// if(isset($_POST['passemailcheck'])){
//     $forgotemail = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
//     $check_email = "SELECT * FROM billusers WHERE email='$forgotemail'";
//     $run_sql = mysqli_query($conn, $check_email);
//     if(mysqli_num_rows($run_sql) > 0){
//         $code = rand(999999, 111111);
//         $insert_code = "UPDATE billusers SET code = $code WHERE email = '$forgotemail'";
//         $run_query =  mysqli_query($conn, $insert_code);
//         $forgot_row = mysqli_fetch_assoc($run_sql);
//         $sub2 = "Password Reset Code";
//         $forgotmessage = "Your password reset code is $code";
//         $forgotname=$forgot_row['name'];
//         if($run_query){
           
//             if(sendemail1($forgotemail, $forgotname, $forgotmessage,$sub2)){
            
//             $_SESSION['statusp'] = "We've sent a passwrod reset code to your email -$forgotemail";
//             $_SESSION['forgotemail'] = $forgotemail;
//             header('location:resetcode.php');}else{
//    echo "failed";
//             }
                 
//             }else{
//                 $_SESSION['statusd']  = "Failed while sending code!";
//                 header('location: forgot.php');
//             }
        
//     }else{
//         $_SESSION['statusd']  = "This email address does not exist!";
//         header('location: forgot.php');
//     }
// }
  
//   //////////coderesetwork//////////////////
//   if(isset($_POST['codecheck'])){
    
//     $otp_code = mysqli_real_escape_string($conn, $_POST['code']);
//     $check_code = "SELECT * FROM billusers WHERE code = '$otp_code'";
//     $code_res = mysqli_query($conn, $check_code);
//     if(mysqli_num_rows($code_res) > 0){
//         $fetch_data = mysqli_fetch_assoc($code_res);
//         $forgotemail1 = $fetch_data['email'];
//         $_SESSION['$forgotemail1'] = $forgotemail1;
//         $info = "Please create a new password.";
//         $_SESSION['statusp'] = $info;
//         header('location: newpassword.php');
       
//     }else{
//         $_SESSION['statusd'] = "You've entered incorrect code!";
//         header('location:resetcode.php');
//     }
// }

// ////////// New Password //////////////
// if(isset($_POST['change'])){
    
//     $forgotpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
//     $forgotcpassword = mysqli_real_escape_string($conn, $_POST['newcpassword']);
//     if($forgotpassword !== $forgotcpassword){
//         $_SESSION['statusd'] = "Confirm password not matched!";
//         header('location:newpassword.php'); 
//     }else{
//         $code = 0;
//         $email = $_SESSION['$forgotemail1'] ; 
//         $encpass = password_hash($forgotpassword, PASSWORD_BCRYPT);
//         $update_pass = "UPDATE billusers SET code = $code, password = '$encpass' WHERE email = '$email'";
//         $run_query = mysqli_query($conn, $update_pass);
//         if($run_query){
//             $info = "Your password changed. Now you can login with your new password.";
//             $_SESSION['statusp'] = $info;
//             header('Location:login.php');
//         }else{
//             $_SESSION['statusd'] = "Failed to change your password!";
//             header('location:newpassword.php');
//         }
//     }
// }

// ////////// admin passchange/////////////////////////////////
if(isset($_POST['passchange'])){
    $passchangeid = mysqli_real_escape_string($conn, $_POST['passid']);
    $forgotpassword1 = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $forgotcpassword1 = mysqli_real_escape_string($conn, $_POST['newcpassword']);
    if($forgotpassword1 !== $forgotcpassword1){
        $_SESSION['statusd'] = "Confirm password not matched!";
        header('location:./admin/passchange.php'); 
    }else{
        
        $encpass1 = password_hash($forgotpassword1, PASSWORD_BCRYPT);
        $update_pass1 = "UPDATE user SET  password = '$encpass1' WHERE user_id = '$passchangeid'";
        $run_query1 = mysqli_query($conn, $update_pass1);
        if($run_query1){
            $info1 = "Password of user_id:&nbsp&nbsp" .$passchangeid . "&nbsp&nbsp change Successfully.";
            $_SESSION['statusp'] = $info1;
            header('Location:./admin/users.php');
        }else{
            $_SESSION['statusd'] = "Failed to change  password!";
            header('location:./admin/passchange.php'); 
        }
    }
}

// //..............Add Community.............///////
if(isset($_POST['add_community'])){
    $community = mysqli_real_escape_string($conn, $_POST['community']);
    $communityquery="INSERT INTO community(community) VALUES('$community') ";
    if(mysqli_query($conn,$communityquery)){
        $_SESSION['statusp'] = "ADD COMMUNITY  SUCCESSFULLY!";
        header('location:./admin/view_communities.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to Add communit!";
            header('location:./admin/view_communities.php'); 
    }
    


}
// //..............update community.............///////
if(isset($_POST['update_community'])){
    $upid = $_POST['community_id'];
    $community = mysqli_real_escape_string($conn, $_POST['community']);
    $communityquery="UPDATE community set community='$community' where community_id ='$upid'";
    if(mysqli_query($conn,$communityquery)){
        $_SESSION['statusp'] = "UPDATE community SUCCESSFULLY!";
        header('location:./admin/view_communities.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to update community!";
            header('location:./admin/view_communities.php'); 
    }
    


}

// //..............Add Category.............///////
if(isset($_POST['add_category'])){
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $categoryquery="INSERT INTO category(category) VALUES('$category') ";
    if(mysqli_query($conn,$categoryquery)){
        $_SESSION['statusp'] = "ADD CATEGORY SUCCESSFULLY!";
        header('location:./admin/view_categories.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to add category!";
            header('location:./admin/view_categories.php'); 
    }
    


}

// //..............update Category.............///////
if(isset($_POST['update_category'])){
    $upid = $_POST['category_id'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $categoryquery="UPDATE category set category='$category' where category_id ='$upid'";
    if(mysqli_query($conn,$categoryquery)){
        $_SESSION['statusp'] = "UPDATE CATEGORY SUCCESSFULLY!";
        header('location:./admin/view_categories.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to update category!";
            header('location:./admin/view_categories.php'); 
    }
    


}

// //..............User Add problem.............///////
if(isset($_POST['add_problem'])){
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category']);
    $community_id = mysqli_real_escape_string($conn, $_POST['community']);
    $problemquery="INSERT INTO problem(problem,community_id,category_id,user_id) VALUES('$problem','$community_id','$category_id','$user_id') ";
    if(mysqli_query($conn,$problemquery)){
        $_SESSION['statusp'] = "PROBLEM ADDED  SUCCESSFULLY!";
        header('location:./user/add_problem.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to add problem!";
            header('location:./user/add_problem.php'); 
    }
    


}


// //..............Admin Add problem.............///////
if(isset($_POST['admin_add_problem'])){
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category']);
    $community_id = mysqli_real_escape_string($conn, $_POST['community']);
    $problemquery="INSERT INTO problem(problem,community_id,category_id,user_id) VALUES('$problem','$community_id','$category_id','$user_id') ";
    if(mysqli_query($conn,$problemquery)){
        $_SESSION['statusp'] = "PROBLEM ADDED  SUCCESSFULLY!";
        header('location:./admin/view_problem.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to add problem!";
            header('location:./admin/view_problem.php'); 
    }
    


}

// //..............update problem.............///////
if(isset($_POST['update_problem'])){
    $upid = $_POST['problem_id'];
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);
    $problemquery="UPDATE problem set problem='$problem' where problem_id ='$upid'";
    if(mysqli_query($conn,$problemquery)){
        $_SESSION['statusp'] = "UPDATE PROBLEM SUCCESSFULLY!";
        header('location:./user/view_problem.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to update problem!";
            header('location:./user/view_problem.php'); 
    }
    


}


// // ...............admin add user .....................////
if (isset($_POST['add_user'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, password_hash($_POST['pass'], PASSWORD_BCRYPT));

    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    $sql = "SELECT email FROM user WHERE email='{$email}'";
  $subject="User Added by Admin ";
    if (!preg_match($pattern, $email)) {
        $_SESSION['statusd'] = "Invalid Email!";
        header('Location:./admin/add_user.php');
    } else if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

        $_SESSION['statusd'] = "Email is already Registered!";
        header('Location:./admin/add_user.php');
    } else {
        $sql1 = "INSERT INTO user(name,email,password)
            VALUES('{$name}','{$email}','{$pass}')" or die("query fail ed");

        if (mysqli_query($conn, $sql1)) {
            
            sendemail1($e1,$m1,$message,$subject);
            $_SESSION['statusp'] = "Add User Successfully";
            header('Location:./admin/add_user.php');
        } else {
            $_SESSION['statusd'] = "REGISTRATION FAILED!";
            header('Location:./admin/add_user.php');
        }
    }
}


// admin edit_problem page code 

if(isset($_POST['edit_problem'])){
    $problem_id = $_POST['problem_id'];
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $community_id = $_POST['community_id'];
    $user_id = $_POST['user_id'];
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);
    $problem_update_query="UPDATE problem set category_id='$category_id',community_id='$community_id',user_id='$user_id',problem='$problem' where problem_id='$problem_id'";
    if(mysqli_query($conn,$problem_update_query)){
        $_SESSION['statusp'] = "PROBLEM UPDATED SUCCESSFULLY!";
        header('location:./admin/view_problem.php'); 
    }else{
        $_SESSION['statusd'] = "Failed to update problem!";
            header('location:./admin/view_problem.php'); 
    }
    


}

