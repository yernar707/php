<?php
//this code gets data from the login form
//checks if there is data coming from the login form
	if (isset($_POST["nickname"]) && isset($_POST["pass"])) {
		$nick = $_POST["nickname"]; //nickname given by the user to log in
		$pass = $_POST["pass"]; //nickname given by the user to log in
		$rtfl = $_SERVER['DOCUMENT_ROOT'];  //the root directory of the website
		require_once $rtfl.'/amir/php/config.php';  //use the config file to get access to the database
		//check if we can connect to the database
    if(!$connect){
			die("Connection failed: " . mysqli_connect_error()); 
			echo "<script>history.go(-1);</script>";
		}
		$query = "SELECT * FROM users WHERE name = '".$nick."' AND pass = '".$pass."' AND active = '1'";  //our SQL query to check the validity of nick and pass
		$res = mysqli_query($connect, $query);  //result of the query
		//check if we have only one result
    if(mysqli_num_rows($res) == 1){
      //we work with each row of the result
			while($row = mysqli_fetch_assoc($res)){
				setcookie("username", $row['fio'], time() + 3600, "/"); //we set cookie to save the username
				setcookie("user_id", $row['id'], time() + 3600, "/"); //we set cookie to save id of the user
				setcookie("role", $row['role'], time() + 3600, "/");  //we set cookie to save the role of the user
				//we check the role of the user and redirect him according to his role
        if($row['role'] == 1){
					header("location: ../offic/");
				}else if($row['role'] == 2){
					header("location: ../admin/");
				}
			}
		}
		else{
			echo "<script> alert('Неправильный никнейм или пароль')</script>";
			echo "<script>history.go(-1)</script>";
		}
	}

	mysqli_close($connect); //close connection to the database

?>
