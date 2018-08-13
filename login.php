<?php
session_start();

$conn =mysqli_connect("localhost","root","","employees") or die(mysqli_connect_error());

if(isset($_POST['login'])){


  $username = $_POST['uname'];
  $password = $_POST['pword'];
  $secretkey = "6Le5aGcUAAAAAMrTmccX-cObUyelocngjLT6i5H5";
  $response = $_POST['g-recaptcha-response'];
  $userip = $_SERVER['REMOTE_ADDR'];

  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$userip";
    
    $response = file_get_contents($url);
    $response =json_decode($response);
    if($response->success){
   		
   		$result = $conn->query("SELECT * FROM `user` WHERE username='$username' AND password='$password'");
    
    	if($row = mysqli_fetch_array($result)){

        $_SESSION['username'] = $row['username'];
        header("Location:result2.php");   

    }else{
      $text = "Username or Password invalid";
    }

    }else{
    	$text =  "Please Enter Captcha";
    }

}

    

   
   ?>
<html>
<head>
	<title>
	login page
    </title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
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
<center><h1>Login</h1></center>
<form method="post">

<span style='color:red;'><?php $text; ?></span>

<input type="text" name="uname" placeholder="Enter Username.." required><br>
<input type="password"  name="pword" placeholder="Enter Password.." required><br>
<div class="g-recaptcha" data-sitekey="6Le5aGcUAAAAALNGS8ThoaiqwT3U4fSqiEJ5Av86"></div>
<b><input type="submit" style="float:right" name="login" value="Log in"></b>
</form>
<center>
<a href="forgot.php" style="font-style:none;color:white;">Forgot Password?</a></center>
</div>
</div>			
	<br><br><br><br><br><br>


   </body>

   <div class="footer">
   <p>Copyright © Shri Mata Vaishno Devi Shrine Board, Katra, J & K </p>
   </div>

   </html>