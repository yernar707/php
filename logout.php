<?php
  //check if there are cookies
	if (isset($_COOKIE['username']) || isset($_COOKIE['user_id']) || isset($_COOKIE['role'])) {
	    unset($_COOKIE['username']); //unset username cookie
	    unset($_COOKIE['user_id']); //unset id cookie
	    unset($_COOKIE['role']);  //unset role cookie
	    setcookie('username', null, -1, '/'); //delete username cookie
	    setcookie('user_id', null, -1, '/'); //delete id cookie
	    setcookie('role', null, -1, '/'); //delete role cookie
	    header("location:../"); //redirect to the main page
	}else{
		echo "<script>alert('Что-то пошло не так :(');window.history.back();</script>";
	}

?>
