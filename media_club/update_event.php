<?php
	include  "connection.php";
	session_start();
	if(!isset($_SESSION['login_user'])){
			header('Location: index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE EVENT</title>
	<!--<link rel="stylesheet" type="text/css" href="stylesheet1.css">-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<style type="text/css">
		body {
		  font-family: Courier, "Lucida Console", monospace;
		  background-image: url("image/f5.jpg");
			-webkit-background-size:cover;
			-moz-background-size:cover;
			-o-background-size:cover;
			background-size: cover;
			margin: 0;
		}

		.box2
		{
		    height: 490px;
		    width: 450px;
		    margin: auto;
		    background-color: black;
		    opacity: .7;
		    color: white;
		    padding: 30px;

		}

		form .update_event
		{
		    margin-left: 120px;

		}
		input
		{
		    height: 25px;
		    width: 200px;

		}

		.sidenav {
		  height: 100%;

		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #111;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}
		.sidenav a.topic:hover{
			color:white;
			width: 300px;
			height:50px;
			background-color: #575252;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
	
	</style>

</head>
<body>
	<!-- SIDENAV -->
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a class = "topic" href="event.php">Back</a>
	</div>

		<div class="update_event_sec"><br>
			<span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
			
				<div class="box2">
					<h1 style="text-align: center;font-size: 25px;font-family: Lucida Console;">Update Existing Event</h1><br>
					
					<form name="add_event" action="" method="post">
						<div class="update_event">
							<input class="form-control" type="text" name="ename" placeholder="Event name" required=""><br><br>
							<input class="form-control" type="text" name="place" placeholder="Venue " ><br><br>
							Start Time <br><br>
							<input class="form-control"  type="Time"  name="Stime" placeholder="Start Time " ><br><br>
							End Time <br><br>
							<input class="form-control"  type="Time"   name="Etime" placeholder="End Time " ><br><br>
							<input class="form-control"  type="number" min="2000" max="2200" name="Year" placeholder="Year " >
							<br><br>
							<select class="form-control" name="Month" >
								<option value=""disabled selected>Month</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select><br><br>
							<input class="form-control" type="number" min="1" max="31" name="day" placeholder="Day"><br><br>
							<input class="btn btn-default" type="Reset" name="Reset" value="Reset" style="color: red; font-weight: bold; width: 98px;height: 30px;">
							<input class="btn btn-default" type="Submit"name="Update" value="Update" style="color: green; font-weight: bold;width: 98px;height :30px;">
							
						</div>
						
					</form>
					
				</div>


				
			
				
		</div>
		
	<?php
	   if (isset($_POST['Update'])) 
	   {    
	   	    $count=0;
            $res=mysqli_query($db,"SELECT *  FROM `event` WHERE `Event Name` = '$_POST[ename]';");
            $count=mysqli_num_rows($res);
            if($count==1){
	            mysqli_query($db,"UPDATE `event` SET `Place` = '$_POST[place]', `Start Time`='$_POST[Stime]',`EndTime`='$_POST[Etime]',`Year` = '$_POST[Year]' 
	            	,`Month`='$_POST[Month]',`Day`='$_POST[day]'WHERE `event`.`Event Name` ='$_POST[ename]' ;");
	            	
                ?>
                <script type="text/javascript">
                	alert("Event Updated Succesfully..");
                </script>
	             
	            <?php
	        }
	        elseif ($count> 1) {
	        	?>
	        	<script type="text/javascript">
	        		alert("More than one event with entered event name..");
	        		
	        	</script>
	        	<?php
	        	# code...
	        }
	         else {
	        
	        
	        	?>
	        	<script type="text/javascript">
	        		alert("The Event does not exist..");
	        		
	        	</script>
	        	<?php
	        }

	   }    
    ?>
     <script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "#0d518c";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "#5cabf0";
	}
	</script>


</body>
</html>