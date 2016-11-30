<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!$_SESSION['logged_in']){
		//echo  $_SESSION['status'];
		header("Location: index.php");
    }

	include "get_user_info.php";




?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery libraries -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/JavaScript" src="functions/profile_functions.js"></script>
		<script type = "text/JavaScript" src="functions/notifications.js"></script>
		<style>
			#info{
				position: absolute;
				top: 17%;
				left: 10%;
				height: auto;
				width: 82%;
			}
		</style>


    </head>
    <body onload = "get_notifications(<?php echo $_SESSION['current_user_id'];?>)">
		<?php include "nav.php"; ?>

		<div id = "info">
			<div class="container">
		  		<div class="row">
		    		<div class="col-md-6">
						<img class="img-circle" height="300" width="300" src="data:image;base64,<?php echo $_SESSION['image'];?>">
					</div>
					<div class = "col-md-6">
						<h3>Name: <?php echo $_SESSION['userName'];?></h3>
						<h3>Country: <?php echo $_SESSION['country'];?></h3>
						<h3><?php echo $_SESSION['university'];?></h3>
						<h3>Major: <?php echo $_SESSION['major'];?></h3>
						<h3>Year: <?php echo $_SESSION['year'];?></h3>
                        <input type="button" onclick="location.href='https://www.connectu.space/editaccount.php';" value="Edit Account" />
					</div>
		  		</div>
		  		<div class="row">
		    		<div class="col-md-12">

						<h5>
							<?php
								if(isset($_SESSION['match_info'])){
									echo "<h3>Here are students that have similarites to you:<br></h3>";
									while ($obj = $_SESSION['match_info']->fetch_object()){

							?>
							<img class="rounded" height="50" width="50" src="data:image;base64,<?php echo $obj->image;?>">

							<?php
										echo $obj->fullName."<a href = \"view_profile.php?id=".$obj->userId."\"> View Profile</a> | <a href = \"ajax_chat.php?id=".$obj->userId."\"> Instant Message </a> |  <a href = \"blog/index.php?page=publicprofiles&userid=".$obj->userId."\"> View Blog </a>";
										echo "<br>";
									}
								}else{
									echo "<h3> You don't have any matches</h3>";
								}
							?>
					</h5>
					</div>
					</div>
		    		<div class="col-md-12"></div>
		    		<div class="col-md-12"></div>
		  		</div>
		  		<div class="row">

		  		</div>
			</div>
		</div>




    </body>
</html>
