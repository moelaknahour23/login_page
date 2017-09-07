<?php
session_start();

// variable declaration
$username = "";
$errors = array(); 
$_SESSION['success'] = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['createAccount'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if ($password_1 != $confirmPassword) {
		array_push($errors, "The two passwords do not match");
	}
	$sql_2 = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($db, $sql_2);
	
	// See if username already exists
	if (mysqli_num_rows($result) > 0) {
		array_push($errors, "Registration Failed. Username already exists");
	} 
	 else {
	// register user if there are no errors in the form
		if (count($errors) == 0)  {
		$password = md5($password_1);//encrypt the password before saving in the database
		$sql = "INSERT INTO users (username, password) 
				  VALUES('$username', '$password')";
		mysqli_query($db, $sql);
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: homepage.php');
		}
	}

}
//Logout
if (isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}
// LOGIN USER
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "USERNAME IS REQUIRED");
		}
		if (empty($password)) {
			array_push($errors, "PASSWORD IS REQUIRED");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);

			if (mysqli_num_rows($result) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
					header('location: homepage.php');
			}else {
				array_push($errors, "Wrong username or password");

			}
		}
	}
?>