<?php
$conn = mysqli_connect("localhost", "root", "", "problem_db") or die("connection failed");
session_start();







if (isset($_POST['signup'])) {



    $e1 = 'msohailahmed@yahoo.com';
    $m1 = 'Account Verification';
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, password_hash($_POST['pass'], PASSWORD_BCRYPT));
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

    $namelength = strlen($name);
    $sql = "SELECT email FROM user WHERE email='{$email}'";
    $message = "The Following Student Want Registeration
     Name=$name
     Email=$email
     Please Log In To Verify His Account
     Click Here --><a href='http://bills.nedscholars.org/login.php'>Log In</a>
 ";
    if (!preg_match("/^[\p{L&} -]+$/u", $name)) {
        $_SESSION['statusd'] = "Only alphabets and whitespace are allowed in name!.";
        header('Location:registeration.php');
    } else if ($namelength > 20) {
        $_SESSION['statusd'] = "Name must be less than 20 characters!";
        header('Location:registeration.php');
    } else if (!preg_match($pattern, $email)) {
        $_SESSION['statusd'] = "Invalid Email!";
        header('Location:registeration.php');
    } else if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

        $_SESSION['statusd'] = "Email is already Registered!";
        header('Location:registeration.php');
    } else {
        $sql1 = "INSERT INTO user(name,email,password)
            VALUES('{$name}','{$email}','{$pass}')" or die("query fail ed");

        if (mysqli_query($conn, $sql1)) {
            mail($e1, $m1, $message);
            $_SESSION['statusp'] = "ACOUNT REGISTERED SUCCESSFULLY WAIT 48 HOURS FOR VERIFICATION!";
            header('Location:registeration.php');
        } else {
            $_SESSION['statusd'] = "REGISTRATION FAILED!";
            header('Location:registeration.php');
        }
    }
}
