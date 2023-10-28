<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];	
	$email = $_POST['email'];
    $userName = $_POST['userName'];
	$password = $_POST['password'];
	$cPassword = $_POST['cPassword'];

	// Database connection
	if(isset($_POST['email'])){
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, userName, password, cPassword ) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $firstName, $lastName, $email, $userName, $password, $cPassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
}
?>