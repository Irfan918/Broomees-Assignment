<?php
    $email = $_POST['email'];
	$password = $_POST['password'];

    // Database connection
    if(isset($_POST['email'])){
	$con = new mysqli('localhost','root','','test');
    if($con->connect_error){
		echo "$con->connect_error";
		die("Connection Failed : ".$con->connect_error);
	} else {
        //email checking
        $stmt = $con->prepare("select * from registration where email= ?");
        $stmt ->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt ->get_result();
        if($stmt_result ->num_rows > 0){
            $data = $stmt_result ->fetch_assoc();
            //password validation
            if($data['password'] === $password){
                echo "<div class='alert'>Login Successfully</div>";                
            }else {
                echo "<div class='alert'>Password does not match</div>";
            }
        }
        else{
            echo "<div class='alert'>Invalid Email or Password</div>";
        }
    }
}
    ?>