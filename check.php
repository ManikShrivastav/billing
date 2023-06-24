<!DOCTYPE html>
<html>

<body>

<?php 
	
	$servername = "localhost";
	$database_username = "root";
	$database_password = "";
	$database_name = "billing";

	//Connection Creation

	$conn = new mysqli($servername, $database_username, $database_password,database_name);

		if ($conn->connect_error) {
			
			die("Connection Failed:". $conn->connect_error);
		}

		$sql = "SELECT password FROM `admin` where `admin`.`username` = ""+$username+"";"

		$verified_password = $conn->query($sql);

		$entered_password = $_POST['password'];

		$hash = password_hash($entered_password, PASSWORD_DEFAULT);


			if (password_verify($verified_password, $hash)) {
				echo '<script type="text/javascript"> alert("You have successfully logged in! ");
						</script>';
			}

			else {
				echo'<script type="text/javascript"> alert("You have entered wrong passsword or username ! ");
					</script>
					';
			}

 ?>
</body>
</html>