<?php
$con=mysqli_connect("localhost","root","","parking");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
// escape variables for security
$bays =  $_GET['bay'];
$reg = mysqli_real_escape_string($con, $_POST['reg']);
$bay = mysqli_real_escape_string($con, $_POST['bay']);
$time =  date('d/m/Y H:i');
$status =1;

$sql="UPDATE $bays SET lastreg ='$reg',time='$time' , status ='$status' where baynum='$bay' ";

			$sql4=mysqli_query($con, "UPDATE bays SET occupied =occupied+1, free = free-1 where location='$bays' ");

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$message="$reg Succesfully logged in at $time on Bay $bay";
$_SESSION['message']= $message;
header ("Location: user.php?x=2&bay=$bays");
mysqli_close($con);
?> 