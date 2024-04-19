<?php
include "config.php";
session_start();
session_unset();
session_destroy();
header("Location:../login.php");
echo '<script type="text/javascript>location.reload();</script>';
?>