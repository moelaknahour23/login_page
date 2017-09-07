<!DOCTYPE html>
<?php
	include('config.php');
if (!($_SESSION['username'] == "admin")){
	header('location:lab3.php');
}
?>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, username, password FROM users ORDER BY username ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	//---------------------------------
	echo "<table border='1' class='usr_tbl' cellspacing='1'>
            <tr>
              </tr>
            <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            </tr>";
	//-----------------------------------------
    while($row = $result->fetch_assoc()) {
		//Alternative way to print data
		//Must remove table info above. If this is preferred.
        //echo "ID: ". $row["id"]. " - USERNAME: ". $row["username"]. " - PASSWORD: ". $row["password"] . "<br><br>";
		
		//Prints data as a table
		echo "<tr>";
		echo "<td>" . $row["id"] . "</td>";
		echo "<td>" . $row["username"] . "</td>";
		echo "<td>" . $row["password"] . "</td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?> 
</body>
</html>