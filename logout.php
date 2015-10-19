<?php
 session_start();

 session_destroy();

 setcookie("username","", time() - (86400  * 10));

 header("Location: login.php");
 exit();
?>