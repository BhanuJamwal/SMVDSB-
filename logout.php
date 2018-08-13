<?php

if(isset($_POST['logout'])){
	session_start();
	session_unset();
	header('Location:login.php');
	exit();
}



?>