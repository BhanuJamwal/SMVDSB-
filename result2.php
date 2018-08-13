<?php session_start(); ?>

<html>
<head>
	<title>welcome </title>
	<link rel="stylesheet" href="stylecss2.css">
	<style>
		.header{
	background: linear-gradient(white, #467EE7   );
	margin-left:-10px;
    background-color:#DADAD8  ;
    width: 100.6%;
    height:130px;
    padding:10px 0 10px 10px;
    text-align: center;
    }

    .image{
	float:left;
	margin-left:-10px;
	}

	.image img{
	width:900px;
	height:470px;
	}

</style>
<body>
<div class="header">
  <img src="graphics/logo.png" >
  <img src="graphics/nh.png" style="float:right;margin:0 50px 0 0px;width:80px; height:80px;">
  <center><h1>Shri Mata Vaishno Devi Shrine Board </h1> </center>

  	<?php
		echo '<form action="logout.php" method="POST">
		<button style = "cursor:pointer; border:none; background :blue; color:white; border-radius:10px; width: 100px; height:40px; float:right; margin:10px -90px;" type="submit" name="logout">Logout</button>
		</form>';

		  		echo '<h3 style="color:#932323;float:right;margin-right:20px;font-size:20px;">' ;
		echo 'Welcome ' .$_SESSION['username'];
		echo '</h3>';
	?>
	
</div>



<div class="image">
	<img src="graphics/a.jpg"/>
</div>


<div id="container">
<div id="login">
	<h1>Enter Employee Details.<h1/><br>
<form method="POST"  action="display.php">
<input type="text" name="empl" placeholder="Enter EmpID" size="30" required><br>
<input type="text" name="adhaar" placeholder="Enter Adhaar" required><br>
<input type="submit" name="search" value="Filter" />
</form>

</div>
</div>
<br><br>



</body>
<div class="footer">
   <p>Copyright © Shri Mata Vaishno Devi Shrine Board, Katra, J & K </p>
</div>
</html>