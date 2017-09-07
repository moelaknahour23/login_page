<!DOCTYPE html>
<?php
	include('config.php');
?>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="lab3.css">
</head>
<body>
	<center>
	<form action="lab3.php" method="post">
		<?php include('errors.php'); ?>
		<h2> Login</h2>
		<div>
			<input type="text" name="username" placeholder="User Name">
		</div>

		<div> 
			<input type="password" name="password" placeholder="password">	
		</div>

		<div>
			<a href="register.php"><input id="button1" type="submit" name="login" value="Login" ></a>
		</div>

		<div>
			 <input  id="register"   type="button" name="register"  value="Register">
		</div>
	</form>
	</center>
	<?php 
		if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "USERNAME IS REQUIRED");
		}
		if (empty($password)) {
			array_push($errors, "USERNAME IS REQUIRED");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	?>
	<script type="text/javascript">

    document.getElementById("register").onclick = function () {
        location.href = "register.php";
    };
	</script>
</body>
</html>