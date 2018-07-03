<!DOCTYPE HTML>
<html>
<head>
<?php
$con=mysqli_connect("localhost","root","","parking");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$time =  date('d/m/Y H:i');
$status =1;

$conn = mysql_connect("localhost","root","");
	                        $db= mysql_select_db("parking",$conn);
                            
                           
                                   

?> 


</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
<div id="chartContainer4" style="height: 370px; width: 100%;"></div>
<div id="chartContainer5" style="height: 370px; width: 100%;"></div>
<div id="chartContainer6" style="height: 370px; width: 100%;"></div>
<script src="canvasjs.min.js"></script>
</body>
</html>