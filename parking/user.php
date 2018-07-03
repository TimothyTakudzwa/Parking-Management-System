<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php 
	 session_start();
	$id= $_SESSION['message'];
	$x=$_GET['x'];
	$bay=$_GET['bay'];
	
	?> 
<style>
.round-button {
    display:block;
    width:80px;
    height:80px;
    line-height:50px;
    border: 2px solid #f5f5f5;
    border-radius: 50%;
    color:#f5f5f5;
    text-align:center;
    text-decoration:none;
    background: #464646;
    box-shadow: 0 0 3px gray;
    font-size:20px;
    font-weight:bold;
}
.round-button:hover {
    background: #262626;
}
</style>
	<title>Parking</title>
	<script type="text/javascript">
		var x=<?php echo $x;?>;
		if (x==1) {
		
		}
		
		else {
		alert ("<?php echo $id;?>")	
		
		}	
	</script>
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

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
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
				<li class="active">
                    <a href="parking.php">
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
                    <a class="navbar-brand" href="#">Parking</a>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Parking Details</h4>
                            </div>
                            <div class="content">
                                 <form name="searchform" id="searchform" method="POST" action="user.php?<?php echo "id=4&x=1&bay=$bay";?>">
                                
                                <input type="text" class="form-control" id="searchBar1" placeholder="Enter Car Registration Number" name="searchBar" maxlength="90" onMouseDown="active();" onBlur="inactive();" autocomplete="off"/><br/>
								<input type="submit" class="btn btn-primary" name="searchBtn" id="searchBtn" value="Search" />
                          </form>
                        </div>
						      <div class="searchResults" id="searchResults" ">
                          <?php      
                              if (isset($_POST['searchBar'])) {
                            $conn = mysql_connect("localhost","root","");
	                        $db= mysql_select_db("parking",$conn);
                            
                          
                                    $sql= "SELECT * FROM vehicles WHERE regnum  LIKE '%{$_POST['searchBar']}%'";
  
                              
                            $qy = mysql_query($sql);
                            $kount = mysql_num_rows($qy);
                                  
                            if ($kount <1) {
                                echo "<h3><strong>Vehicle Not Registered</strong></h3>  " ;
								 $test = 0;
								 $nm = "Not Registered";
                                $rn = "Not Registered";
                                $bn = "Not Registered";

                            }
                                  else {
                                $test = 1;
                            while($result = mysql_fetch_assoc($qy)) {
                               
                                $nm = $result['name'];
                                $rn = $result['regnum'];
                                $bn = $result['balance'];
                               
								
                            
                           
                             echo "<h3><strong>Vehicle Registered</strong></h3>  " ;
							echo "<br />";
							}//close while
                               }//close else
                            
						  //close if isset
						  ?>
						 


                            
								<form  name="searchform" id="searchform" method="POST" action="<?php echo "usersubmit.php?bay=$bay"?>">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Owner Name</label>
                                                <input type="text" class="form-control" disabled  value="<?php  echo "$nm";?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Registration Number</label>
                                                <input type="text" name="regs" class="form-control" disabled value="<?php  echo "$rn";?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Balance</label>
                                                <input type="email" class="form-control"  disabled value="<?php  echo "$bn";?>">
                                            </div>
                                        </div></div>
										 <input type="hidden" name="reg" class="form-control"  value="<?php  echo "$rn";?>">
										<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Available Bays </label>
                                              <select id="searchBar" placeholder="" name="bay" autocomplete="off">
											   <?php 
													$conn = mysql_connect("localhost","root","");
													$db= mysql_select_db("parking",$conn);
													
												  
															$sl= "SELECT * FROM $bay WHERE status=0";						  
													$qyp = mysql_query($sl);
													
														
													while($result = mysql_fetch_assoc($qyp)) {
													   
														$nmw = $result['baynum'];
													
											   ?>
													<option value='<?php echo $nmw;?>'><?php echo $nmw;};?></option><br/><br/>
													
																									
													</select>
                                            </div>
                                        </div> <br/>
										<?php 
													$conn = mysql_connect("localhost","root","");
													$db= mysql_select_db("parking",$conn);
													
												  
															$sl= "SELECT * FROM $bay WHERE lastreg='$rn'";						  
													$qyp = mysql_query($sl);
													
													$count = mysql_num_rows($qyp);		  
														if ($count <1) {
															$message="Not Logged in"	;
															if ($test == 0){
															$stat="disabled";
															$stat2="disabled";}
															else {
															$stat="";
															$stat2="disabled";}
														} 
														
															  else {
															
														
													while($result = mysql_fetch_assoc($qyp)) {
													   
													$nm1 = $result['baynum'];	
															  $nm12 = $result['time'];
													$message="Bay $nm1 at $nm12"	;
													$stat="disabled";												
													$stat2="";													}	}
											   ?>
											 <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Current Logged Bay</label>
                                                <input type="text" disabled class="form-control" value="<?php echo  "$message";?>">
                                            </div>
                                        </div>  
											   
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Current Time</label>
                                                <input type="text" disabled class="form-control" value="<?php echo  date('d/m/Y H:i');?>">
                                            </div>
                                        </div>
                                    </div>
	       <input type="submit" class="btn btn-info btn-fill" name="searchBtn" <?php echo $stat ?> id="searchBtn" value="Log In" />
	<a href="userrs.php?reg=<?php echo"$rn &bay=$nm1&name=$nm&bays=$bay" ;?>"><input class="btn btn-danger btn-fill" <?php echo $stat2 ?> name="searchBtn" id="searchBtn" value="log Out" /></a>
                                    </div>
<?php   }?>
                                   

                                   
                                </form>
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