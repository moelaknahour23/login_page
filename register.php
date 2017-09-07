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
		<div id="main_Box">
	<center>
		<form method="post" action="register.php" >
			<?php include('errors.php'); ?>
			<h2> Register</h2>
			<div>
				<input type="text" name="username" placeholder="Create a User Name" </div>
			<div> 
				<input type="password" name="password_1" placeholder="Create a password">	
			</div>
			<div> 
				<input type="password" name="confirmPassword" placeholder="Confirm your password">	
			</div>
			<div>
				<button id="button1" type="submit" name="createAccount" value="Create Account" >Create Account </button> 
			</div>
			<div>
				<input  id="cancel"   type="button" name="cancel" value="Cancel" > 
			</div>
		</form>
		<script type="text/javascript">
		document.getElementById("cancel").onclick = function () {
			location.href = "lab3.php";
		};
		</script>
		
	</center>		
	</body>
</html>