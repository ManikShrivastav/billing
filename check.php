<!DOCTYPE html>
<html>

<body>

<?php 
	
	$servername = "localhost";
	$database_username = "root";
	$database_password = "";
	$database_name = "billing";

	$username = $_POST['username'];

	//Connection Creation

	$conn = new mysqli($servername, $database_username, $database_password,$database_name);

		if ($conn->connect_error) {
			
			die("Connection Failed:". $conn->connect_error);
		}

		$sql = "SELECT password FROM `admin` where `admin`.`username` = \"". $username . "\";";

		$row = mysqli_fetch_array($conn->query($sql));
		$verified_password = $row[0];



		$entered_password = $_POST['password'];

		$hash = password_hash($entered_password, PASSWORD_DEFAULT);

			if (password_verify($verified_password, $hash)) {
				header('Location: dashboard.php');
			}

			else{
				header('Location: index.php');
			}
			

 ?>
</body>
</html>