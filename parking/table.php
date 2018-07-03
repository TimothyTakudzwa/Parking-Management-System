<!doctype html>
<html lang="en">
<head>
<?php
	$conn = mysql_connect("localhost","root","");
	$db= mysql_select_db("parking",$conn);
	$bay=$_GET['bay'];
	$sql= "SELECT * FROM $bay ";
	$qury=mysql_query($sql);
?>
<script type="text/JavaScript">
<!--
function AutoRefresh( t ) {
setTimeout("location.reload(true);", t);
}
// -->
</script>
<?php session_start();?>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bays</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body onload="JavaScript:AutoRefresh(10000);">

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                   Parking System
                </a>
            </div>

            <ul class="nav">
               <li class="">
                    <a href="dashboard.php">
                        <i class="pe-7s-culture"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
				
                    <a href="parking.php?x=1">
                        <i class="pe-7s-keypad"></i>
                        <p>Parking</p>
                    </a>
                </li>
                <li>
				<li class="active">
                    <a href="bays.php">
                        <i class="pe-7s-date"></i>
                        <p>Bays</p>
                    </a>
					</li>
                </li>
				<li>
                    <a href="vehicles.php?x=2">
                        <i class="pe-7s-config"></i>
                        <p>Vehicles</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Parking Bays</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                       
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Parking Bay :<?echo $bay?></h4>
                                <p class="category">Occupied Bays</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                       <th><i class="icon_profile"></i> Bay Number </th>                                  
                                  <th><i class="icon_mobile"></i> Occupying Vehicle</th>
                                  <th><i class="icon_mobile"></i> Time Logged in</th>
                                  <th><i class="icon_mobile"></i> Duration</th>
                                  <th><i class="icon_mobile"></i> Balance</th>
                                    </thead>
									  <?php while ($result = mysql_fetch_assoc($qury)):?>
                                    <tbody>
                                        <tr>
                                        	<td> <?php echo $result['baynum']; ?></td>
											<td> <?php if ($result['status']==0){ echo"<i>Free Bay</i>";} else{ 
											$reg =$result['lastreg'];
											echo $reg;
											};  ?> </td>
										   <td> <?php if ($result['status']==0){ echo"<i>N/A</i>";} else{ echo $result['time'];};  ?> </td>
										   <td> <?php if ($result['status']==0){ echo"<i>Free Bay</i>";} else{ 
										    
											$ti =  date('d/m/Y H:i');
										    $tim = $result['time'];	
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
										   echo "$time minutes";}
											
											else {	
												list($minutes)= explode(",",$round);
												$time= "$minutes[2]$minutes[3]";
												$time = floor(($time/100)*60);
												$times = $floor * 60;
												$time = $times + $time;
										   echo "$time minutes";}};  ?> </td>
										 <td> <?php if ($result['status']==0){ echo"<i>N/A</i>";} else{ 
										    
											$reg = $result['lastreg'];
											
											
											$charge =round((($time/60) * 1),2);
											$con=mysqli_connect("localhost","root","","parking");
											$cxn=  mysqli_query($con, "select * from vehicles WHERE regnum='$reg'");
											if(mysqli_num_rows($cxn) > 0){
													 while($row=  mysqli_fetch_array($cxn))

												 {
													 $balance =$row['balance'];
													 
											}}
											$balance =$balance - $charge;
											if ($balance > 0){
											echo "$ $balance";	
											}
											else {
											echo "<strong style = 'background-color:red'>$ $balance</strong>";	
											}
											
											
											
											};  ?> </td>
										 
                                      
                                     
								  </div>
                                        </tr>
                                         <?php endwhile; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                   


                </div>
            </div>
        </div>

        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>