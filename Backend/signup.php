<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];	
	$email = $_POST['email'];
    $userName = $_POST['userName'];
	$password = $_POST['password'];
	$cPassword = $_POST['cPassword'];

	//encript the password
	//$passwordHash = password_hash($password, PASSWORD_DEFAULT);

			//checking error before inserting data in database
           $errors = array();
           
           if (empty($firstName) OR empty($lastName) OR empty($email) OR empty($userName) OR empty($password) OR empty($cPassword)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$cPassword) {
            array_push($errors,"Password does not match");
		   }


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	//connection error
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		//email validation from database
	if(isset($_POST['email'])){
		$sql = "SELECT * FROM registration WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           } 
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }           
		}
	
	else {
		//inserting data in registration table
		$stmt = $conn->prepare("insert into registration
		(firstName, lastName, email, userName, password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $firstName, $lastName, $email, $userName, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
}
}
?>