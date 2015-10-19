<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
		//connect to db
		$con = mysqli_connect("localhost","root","","login_remember") or die(mysqli_error());
	?>
	<center>
	<a href="http://blog.hackerkernel.com/2015/10/18/login-form-with-remember-me-in-php/">Download/Tutorial</a> / 
	<a href="http://www.hackerkernel.com/contact.php">Want me to work on your dream project (Hire Me)</a> 
	</center>
	<br>
	<br>
	<p>username: husain</p>
	<p>password: husain</p>
	<form action="login.php" method="post">
		<p><input type="text" name="username" placeholder="Enter your username"></p>
		<p><input type="password" name="password" placeholder="Enter your password"></p>
		<p><input type="checkbox" name="re" id="re" value="on"> <label for="re">Remember Me</label></p>
		<input type="submit" name="login" value="login">
	</form>
	<?php
		if(isset($_POST['login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if(empty($username) OR empty($password)){
				echo "Fill in all the fields";
				exit();
			}

			//check remeber me button is set or not
			if(isset($_POST['re'])){
				$re = "on";
			}else{
				$re = "";
			}

			//check username and pass
			$query = mysqli_query($con,"SELECT * FROM `user` WHERE username='$username' AND password='$password'");

			if(mysqli_num_rows($query) == 1){

				//login the user in
				if($re == "on"){ //remember me checked
					setcookie("username",$username,time() + (86400  * 10));
				}else{ //remember me not checked
					session_start();
					$_SESSION['username'] = $username;
				}

				echo "user logedin";
				header("Location: index.php");
				exit();
			}

			echo "Invalid username and password";
			exit();

		}
	?>
</body>
</html>