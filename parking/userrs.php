<?php
$con=mysqli_connect("localhost","root","","parking");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
// escape variables for security


$reg =  $_GET['reg'];
$bays =  $_GET['bays'];
$bay =  $_GET['bay'];
$name =  $_GET['name'];
$status =0;
$ti =  date('d/m/Y H:i');

$conn = mysql_connect("localhost","root","");
		$db= mysql_select_db("parking",$conn);
		
	  
		$sl= "SELECT * FROM $bays WHERE lastreg='$reg' and baynum='$bay'";						  
		$qyp = mysql_query($sl);
		
		$count = mysql_num_rows($qyp);		  
		
		$result = mysql_fetch_assoc($qyp);
		   
		$tim = $result['time'];	
		
		$x="4";	
		$sql12=mysqli_query($con,"UPDATE $bays SET status =0,time='' , lastreg ='' where baynum='$bay' ");
			
			 $conn = mysql_connect("localhost","root","");
			$db= mysql_select_db("parking",$conn);
			$sql="SELECT * FROM vehicles WHERE regnum ='$reg' ";
			$qury = mysql_query($sql);
			$resul= mysql_fetch_assoc($qury);
	
			$balance = $resul['balance'];	
			
			$string = strtotime(str_replace('/', '-', "$ti"));
			$string2 = strtotime(str_replace('/', '-', "$tim"));
			$diff = abs($string2-$string)/3600;
			$floor= floor($diff);
			$round = round($diff,3);
			if ($floor> 9) {
				
			list($minutes)= explode(",",$round);
			$time= "$minutes[3]$minutes[4]";
			$time = floor(($time/100)*60);
			$times = $floor * 60;
			$time = $times + $time;

			$charge =round((($time/60) * 1),2);
			$balance = $balance -$charge;
			

			}

			else {	
			list($minutes)= explode(",",$round);
			$time= "$minutes[2]$minutes[3]";
			$time = floor(($time/100)*60);
			$times = $floor * 60;
			$time = $times + $time;



			$charge =round((($time/60) * 1),2);
			$balance = $balance -$charge;
			$sql1=mysqli_query($con, "UPDATE vehicles SET balance ='$balance' where regnum='$reg' ");
			
			$sql2=mysqli_query($con, "INSERT INTO transaction (name, regnum, charge, balance, loggedin, loggedout) VALUES ('$name', '$reg','$charge', '$balance', '$tim', '$ti') ");
			$ids = $con->insert_id;}
			
			$sql4=mysqli_query($con, "UPDATE bays SET occupied = occupied-1, free = free+1 where location='$bays' ");
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$message = "$reg Logged in at $tim and Logged out at $ti Duration = $time minutes Charge = $charge New Balance = $balance";
$_SESSION['message']= $message;
header ("Location: user.php?x=3&bay=$bays");


mysqli_close($con);
?> 