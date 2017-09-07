<!DOCTYPE html>
<?php
	include('config.php');
if (empty($_SESSION['username'])) {
	header('location:lab3.php');
}
if ($_SESSION['username'] == "admin"){
	header('location:usrlist.php');
}
?>

<?php
	//Session Start
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: lab3.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: lab3.php");
	}
?>

<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="lab3.css">
	</head>
	<body>
		<div id="main_Box">
		<center>	
			<div>	
				<form action="homepage.php" method="post">
					<div>
						<p id="a_position"> <a id="logout"  href="homepage.php?logout='1'" style="color: red;">logout</a> </p>
					</div>
					<h1 id="home"> Home</h1>
					<p id="welcome">Welcome <b><em><?php echo $_SESSION['username']; ?></em><b></p>
				</form>
			</div>	
		</center>
	</body>
</html>