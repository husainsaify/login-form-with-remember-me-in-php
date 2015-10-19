<?php
	session_start();
	//when user is logged in with session
	if (isset($_SESSION['username'])) {
		echo $_SESSION['username']  . " Session <a href='logout.php'>logout</a>";
	}else if(isset($_COOKIE['username'])){ //when user is logged with cookies
		echo $_COOKIE['username']  . " cookie <a href='logout.php'>logout</a>";
	}else{ //when user is not loggedin
		header("Location: login.php");
		exit();
	}
?>