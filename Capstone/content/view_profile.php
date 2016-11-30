
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SESSION['logged_in']){
        //echo  $_SESSION['status'];
        header("Location: index.php");
    }
    require "/var/connection/connect.php";
    require "functions.php";
    $sql = "SELECT fullName,image, country,university,major,language, year,
    status,userId FROM registration WHERE userId = ?";
        //echo $sql;
    $stmt = $db->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->errno . ' '
        . $db->error, E_USER_ERROR);
    }
    $_SESSION['view_userId'] = $_GET["id"];
    //Binding the parameter
    if(!$stmt->bind_param('d', $_SESSION['view_userId'])){
        echo "parameter binding failed";
    }
    if(!$stmt->execute()){
        echo "query execution failed";
    }
    //Bind results to variables
    if(!$stmt->bind_result($_SESSION['view_userName'], $_SESSION['view_image'],
    $_SESSION['view_country'], $_SESSION['view_university'],
    $_SESSION['view_major'],$_SESSION['view_ethnicity'],$_SESSION['view_year'],
    $_SESSION['view_status'],$userId)){
        echo"result binding failed";
    }
    $stmt -> fetch();
    $stmt->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile Viewer</title>
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
        <script type = "text/JavaScript">
        function follow(){

            $.ajax({
                type: "POST",
                url: "follow.php",
                data: {stage: "follow"},
                success: function(data){

                        $("#follow").html("<p class=\"bg-warning\">"+data+"</p>");
                        $("#unfollow_btn").show();
                        $("#follow_btn").hide();




                }
            });

        }
        function unfollow(){
            $.ajax({
                type: "POST",
                url: "follow.php",
                data: {stage: "unfollow"},
                success: function(data){

                        $("#follow").html("<p class=\"bg-warning\">"+data+"</p>");
                        $("#follow_btn").show();
                        $("#unfollow_btn").hide();




                }
            });
        }
        </script>
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
		    		<div class="col-md-5">
						<img class="img-circle" height="300" width="300" src="data:image;base64,<?php echo $_SESSION['view_image'];?>">
					</div>
					<div class = "col-md-4">
						<h3>Name: <?php echo $_SESSION['view_userName'];?></h3>
						<h3>Country: <?php echo $_SESSION['view_country'];?></h3>
						<h3><?php echo $_SESSION['view_university'];?></h3>
						<h3>Major: <?php echo $_SESSION['view_major'];?></h3>
						<h3>Year: <?php echo $_SESSION['view_year'];?></h3>
					</div>
                    <div class="col-md-3">
                        <button type="button" id = "follow_btn" class="btn btn-primary" onclick = "follow()">Follow</button>
                        <button type="button" id = "unfollow_btn" class="btn btn-danger" onclick = "unfollow()">unfollow</button>
                        <h3 id = "follow"></h3>
                    </div>
		  		</div>

                    <?php include "get_blogs.php"; ?>

            </div>
        </div>
    </body>
</html>
