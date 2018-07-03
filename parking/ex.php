<!doctype html>
<html lang="en">
<head>
<script type="text/JavaScript">
<!--
function AutoRefresh( t ) {
setTimeout("location.reload(true);", t);
}
// -->
</script>
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
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php 
				 $sql= "SELECT * FROM bays where location ='samora'";
									 $qy = mysql_query($sql);
		                               while($result = mysql_fetch_assoc($qy)) {
										$location = $result['location'];	
										$occupied = $result['occupied'];	
										$free = $result['free'];														
											}echo $occupied?>, label: "Occupied Bays"},
			{y: <? echo $free;
			?>, label: "Free Bays"},
			
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php 
				 $sql= "SELECT * FROM bays where location ='nelson'";
									 $qy = mysql_query($sql);
		                               while($result = mysql_fetch_assoc($qy)) {
										$location = $result['location'];	
										$occupied = $result['occupied'];	
										$free = $result['free'];														
											}echo $occupied?>, label: "Occupied Bays"},
			{y: <? echo $free;
			?>, label: "Free Bays"},
			
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php 
				 $sql= "SELECT * FROM bays where location ='kwame'";
									 $qy = mysql_query($sql);
		                               while($result = mysql_fetch_assoc($qy)) {
										$location = $result['location'];	
										$occupied = $result['occupied'];	
										$free = $result['free'];														
											}echo $occupied?>, label: "Occupied Bays"},
			{y: <? echo $free;
			?>, label: "Free Bays"},
			
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php 
				 $sql= "SELECT * FROM bays where location ='jason'";
									 $qy = mysql_query($sql);
		                               while($result = mysql_fetch_assoc($qy)) {
										$location = $result['location'];	
										$occupied = $result['occupied'];	
										$free = $result['free'];														
											}echo $occupied?>, label: "Occupied Bays"},
			{y: <? echo $free;
			?>, label: "Free Bays"},
			
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php 
				 $sql= "SELECT * FROM bays where location ='central'";
									 $qy = mysql_query($sql);
		                               while($result = mysql_fetch_assoc($qy)) {
										$location = $result['location'];	
										$occupied = $result['occupied'];	
										$free = $result['free'];														
											}echo $occupied?>, label: "Occupied Bays"},
			{y: <? echo $free;
			?>, label: "Free Bays"},
			
		]
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: <?php 
				 $sql= "SELECT * FROM bays where location ='robert'";
									 $qy = mysql_query($sql);
		                               while($result = mysql_fetch_assoc($qy)) {
										$location = $result['location'];	
										$occupied = $result['occupied'];	
										$free = $result['free'];														
											}echo $occupied?>, label: "Occupied Bays"},
			{y: <? echo $free;
			?>, label: "Free Bays"},
			
		]
	}]
});
chart.render();

}
</script>
	<title>Parking Dashboard</title>

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
<body>

<script type="text/javascript" src="loader.js"></script>


<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    Parking System
                </a>
            </div>

            <ul class="nav">
                <li class="active">
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
                    <a href="bays.php">
                        <i class="pe-7s-date"></i>
                        <p>Bays</p>
                    </a>
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
                    <a class="navbar-brand" href="#">Dashboard</a>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Samora Machel</h4>
                                <p class="category">Parking Bay Occupation</p>
                            </div>
                            <div class="content">
                                 <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                                <div class="footer">
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> <a href="table.php?bay=samora"><input class="btn btn-primary " name="searchBtn" id="searchBtn" value="View Details>>" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nelson Mandela</h4>
                                <p class="category">Parking Bay Occupation</p>
                            </div>
                            <div class="content">
                                 <div id="chartContainer2" style="height: 370px; width: 100%;"></div>

                                <div class="footer">
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> <a href="table.php?bay=nelson"><input class="btn btn-primary " name="searchBtn" id="searchBtn" value="View Details>>" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nkwame Nkrumah </h4>
                                <p class="category">Parking Bay Occupation</p>
                            </div>
                            <div class="content">
                                 <div id="chartContainer3" style="height: 370px; width: 100%;"></div>

                                <div class="footer">
                                  
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> <a href="table.php?bay=kwame"><input class="btn btn-primary " name="searchBtn" id="searchBtn" value="View Details>>" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
						<br/>
						 

							
							
<script src="canvasjs.min.js"></script>

                    		
                </div>



               

                                
                            </div>
                        </div>
                    </div>
					<div class="content">
            <div class="container-fluid">
                  
                          
							<div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Jason Moyo</h4>
                                <p class="category">Parking Bay Occupation</p>
                            </div>
                            <div class="content">
                                 <div id="chartContainer4" style="height: 370px; width: 100%;"></div>

                                <div class="footer">
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> <a href="table.php?bay=jason"><input class="btn btn-primary " name="searchBtn" id="searchBtn" value="View Details>>" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Central Avenue</h4>
                                <p class="category">Parking Bay Occupation</p>
                            </div>
                            <div class="content">
                                 <div id="chartContainer5" style="height: 370px; width: 100%;"></div>

                                <div class="footer">
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> <a href="table.php?bay=central"><input class="btn btn-primary " name="searchBtn" id="searchBtn" value="View Details>>" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Robert Mugabe</h4>
                                <p class="category">Parking Bay Occupation</p>
                            </div>
                            <div class="content">
                                 <div id="chartContainer6" style="height: 370px; width: 100%;"></div>

                                <div class="footer">
                                  
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> <a href="table.php?bay=robert"><input class="btn btn-primary " name="searchBtn" id="searchBtn" value="View Details>>" /></a>
          
                                    </div>
                                </div>
                            </div>
                        </div>
						<br/>
						 

							
							
<script src="canvasjs.min.js"></script>

                    		
                </div>



               

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="dashboard.php">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

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

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
