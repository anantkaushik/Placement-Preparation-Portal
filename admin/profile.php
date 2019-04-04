<?php
    session_start();
    require("connection.php");
    $AdminId=$_SESSION['AdminId'];     /////////////////// Additional
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Profile</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<?php 
    //check for valid sign in
    if(!isset($_SESSION['AdminId'])){
        echo "<div class='text-center'><p class='display-3'>Please Login!</p><br>";
        echo "<u><a href='index.php'>Go Home</a></u>";
        exit;
    }
    ?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="dashboard.php"><span>Placement Preparation Portal</span> | Admin</a>
                <ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
                        <ul class="dropdown-menu dropdown-alerts">                        
							<li><a href="profile.php">
								<div><em class="fa fa-user"></em> Profile</div></a></li>
							<li class="divider"></li>
							<li><a href="logout.php">
								<div><em class="fa fa-power-off"></em> Logout </div></a></li>
						</ul>
				</ul>
            </div>
		</div>
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<?php
						echo $_SESSION['AdminId'];
					?>
				</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Subjects <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
				<?php
					// extracting list of Subjects
					$sqlquery = "select * from subjects";
					$result = $conn->query($sqlquery);
					while($row = $result->fetch_assoc()) {
						echo "<li><a href='subjects.php?sub=".$row['sub_id']."'>";
						echo "<span class='fa fa-arrow-right'>&nbsp;</span>".$row["sub_name"]."</a></li>";	
					} 
				?>
				<li><a href='subjects.php?add_sub=true'><span class='fa fa-plus'>&nbsp;</span> Add New Subject</a></li>
				</ul>
			</li> 
			<li><a href="results.php"><em class="fa fa-bar-chart">&nbsp;</em> Results</a></li>
			
			<li><a href="#panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			<li><a href="superuser.php"><em class="fa fa-toggle-off">&nbsp;</em> Super User</a></li>
			
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Profile</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Profile</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">



		<table ><!--border="1" cellspacing="100" cellpadding="100"-->
				<?php
					// extracting details of Admin
					$sqlquery = "select * from admin_login where AdminId='$AdminId'";
					$result = $conn->query($sqlquery) or die($conn->error);
					$row = $result->fetch_assoc();
						echo "<tr><td><b>AdminName:</b></td><td>".$row['AdminId']."</td></tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td><b>First Name:</b></td><td>".$row['Fname']."</td></tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td><b>Last Name:</b></td><td>".$row['Lname']."</td></tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td><b>Email Id:</b></td><td>".$row['Emailid']."</td></tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td><b>Password:</b></td><td>".$row['Password']."</td><td><button><em class="."'glyphicon glyphicon-edit'"."></em></button></td></tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td><b>Contact:</b></td><td>".$row['Contact']."</td></tr>";
						echo "<tr><td>&nbsp;</td></tr>";
						echo "<tr><td><b>Super User:</b></td><td>".$row['Super']."</td></tr>";
				?>

		</table>





		</div>
		
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>