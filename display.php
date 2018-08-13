<?php session_start(); ?>
<html>
<link rel="stylesheet" href="stylecss2.css">
<head>
	<title>employees details</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<style>
body{
	background:white;
}
		.header{
	background: linear-gradient(white, #467EE7   );
	margin-left:-10px;
    background-color:#DADAD8  ;
    width: 100.6%;
    height:130px;
    padding:10px 0 10px 10px;
    text-align: center;
    }
   #back{
   	width:100px;
   }
</style>


<div class="header">
  <img src="graphics/logo.png" >
  <img src="graphics/nh.png" style="float:right;margin:0 50px 0 0px;width:80px; height:80px;">
  <center><h1>Shri Mata Vaishno Devi Shrine Board </h1> </center>

  	<?php
		echo '<form action="logout.php" method="POST">
		<button style = "cursor:pointer; border:none; background :blue; color:white; border-radius:10px; width: 100px; height:40px; float:right; margin:10px -90px;" type="submit" name="logout">Logout</button>
		</form>';

		  		echo '<h3 style="color:#932323;float:right;margin-right:20px;">' ;
		echo 'Welcome ' .$_SESSION['username'];
		echo '</h3>';
	?>
	
</div>
<br>


<?php


if(isset($_POST["search"])){


$empid=$_POST['empl'];
$adhaar=$_POST['adhaar'];
// Create connection
$conn =mysqli_connect("localhost","root","","employees") or die(mysqli_connect_error());


$query = "select * from emplo where EmpID = $empid and AADHAR = $adhaar;";



$emp=mysqli_query($conn,$query);


while($employee=mysqli_fetch_array($emp)){
		
	echo "<table width='500' border='1' cellpadding='1' cellspacing='0' align='center'>";
	
	echo"<tr>";
    echo "<td colspan='2' align='center' style='background-color:grey; height:50;'><b>Personal Details</td>";
	echo "</tr>";


	echo "<tr>"; 
    echo "<td align='center' style=' height:30;background-color:#D6EAF8;'>NAME</td>";
	echo "<td align='center' style=' height:30;background-color:#ECF0F1;'>".$employee['NAME']."</td>";
	echo "</tr>";
	
	echo"<tr>";
    echo "<td align='center' style='background-color:#AED6F1 ; height:30; width:250px;'>EmpID</td>";
	echo "<td align='center' style='background-color:#ECF0F1; height:30;'>".$employee['EmpID']."</td>";
	echo "</tr>";
	
	echo "<tr>";
    echo"<td align='center' style='background-color:#5DADE2  ; height:30;'>AADHAR</td>";
	echo "<td align='center' style='background-color:#ECF0F1; height:30;'>".$employee['AADHAR']."</td>";
	echo "</tr>";
	
	echo "<tr>"; 
    echo "<td align='center' style=' height:30;background-color:#2874A6  ;'>D.O.B</td>";
	echo "<td align='center' style=' height:30;background-color:#ECF0F1;'>".$employee['D.O.B']."</td>";
	echo "</tr>";

	echo "</table>";
}
echo "<br>";

$query1 = "select * from tabtab where tabtab.EmpID =$empid;";


$emp1=mysqli_query($conn,$query1);
?>
	<table width='500' border='1' cellpadding='1' cellspacing='0' align='center'>

	<tr>
    <td colspan='4' align='center' style='background-color:grey; height:50;'><b>Dependent Details</td>
	</tr>

	<tr>
    <th align='center' style='background-color:#D6EAF8; height:30;'>NAME</th>
    <th align='center' style=' height:30;background-color:#AED6F1;'>D.O.B</th>
    <th align='center' style=' height:30;background-color:#5DADE2 ;'>Relation</th>
	<th align='center' style=' height:30;background-color:#2874A6;'>AADHAR</th>
	</tr>

<?php
while($employee1=mysqli_fetch_array($emp1)){
	?>

	
	<tr>
	<td align='center' style='background-color:#ECF0F1; height:30;'><?php echo $employee1['NAME']; ?></td>
	<td align='center' style=' height:30;background-color:#ECF0F1;'><?php echo $employee1['D.O.B']; ?></td>
	<td align='center' style=' height:30;background-color:#ECF0F1;'><?php echo $employee1['RELATION']; ?></td>
	<td align='center' style=' height:30;background-color:#ECF0F1;'><?php echo $employee1['AADHAR']; ?></td>
    </tr>
	
<?php
}
?>

</table>
<?php

}
?>

<br>
<center>
<form action="result2.php" id="back">
    <input type="submit" value="BACK" />
</form></center>

<br><br><br><br>
   <div class="footer">
   <p>Copyright © Shri Mata Vaishno Devi Shrine Board, Katra, J & K </p>
   </div>