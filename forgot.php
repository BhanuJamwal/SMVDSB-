<html>
<head><title>
	change password.
</title></head>
<link rel="stylesheet" href="stylecss2.css">
<style>

</style>
<body>


<div class="header">
  <img src="graphics/logo.png" >
  <img src="graphics/nh.png" style="float:right;margin:0 50px 0 0px;width:80px; height:80px;" >
  <center><h1>Shri Mata Vaishno Devi Shrine Board </h1></center>
</div>

<div class="image">
	<img src="graphics/a.jpg"/>
</div>

<div id="container">
<div id="login">
<h1>Enter the Email to Reset your Password</h1>
<form method="post">
<input type="text" name="uname" placeholder="Enter Username.." required><br>
<input type="text" name="email" placeholder="Enter Email.." required><br>
<b><input type="submit" style="float:right" name="forgot" value="Continue"></b>

</form>

</div>			

<?php
	session_start();
$conn =mysqli_connect("localhost","root","","employees") or die(mysqli_connect_error());


if(isset($_POST['forgot'])){


	$username = $_POST['uname'];
	$email = $_POST['email'];
	$random = rand(72891, 92729);
	$new_pass = $random;


	$sql = "select * from user where username = '".$username."'";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	if($count!=0){
	$email_pass = $new_pass;
	$new_pass = md5($new_pass);

	mysqli_query($conn,"update user set password='".$new_pass."' where username='".$username."'");
	
	$subject = "Login Information";
	$message = "Your password has been changed to $email_pass";
	$from = "From: SMVDSB Naryana";

	if(mail($email,$subject,$message,$from)){
	echo "Your new password has been Email to you";
}
	}else{
		echo "Username not found";
	}

	}
   ?>
   </body>

   <div class="footer">
   <p>Copyright © Shri Mata Vaishno Devi Shrine Board, Katra, J & K </p>
   </div>

   </html>