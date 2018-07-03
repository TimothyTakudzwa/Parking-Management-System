<?php
	$conn = mysql_connect("localhost","root","");
	$db= mysql_select_db("parking",$conn);
 

	$reg = $_POST['reg'];
	$name = $_POST['name'];
	$balance = $_POST['balance'];
	
	

	
	$sl = "INSERT INTO vehicles (regnum, name, balance) VALUES ('$reg','$name', '$balance')";
	$qury = mysql_query($sl);
	 
if (!$qury){
		 echo "Failed".mysql_error();
       
	 
     }     else{
         
		 header("Location:vehicles.php?x=3");}
?>