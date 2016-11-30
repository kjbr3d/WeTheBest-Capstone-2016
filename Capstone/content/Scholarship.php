<!--test-->
<?php


	if($_SERVER['SERVER_PORT'] != '443') {
		header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit();
	}
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if($_SESSION['logged_in'] != TRUE){
		header("Location: index.php");
	}

?>
<!DOCTYPE HTML>
<html>
	<head>

		<title>Scholarship</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery libraries -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/JavaScript" src="functions/profile_functions.js"></script>
		<script type = "text/JavaScript" src="functions/notifications.js"></script>
	</head>

	<body onload = "get_notifications(<?php echo $_SESSION['current_user_id'];?>)">
		<?php require "nav.php"; ?>

	    	<div class = "row">
            	<div class="col-md-offset-3 col-md-6">
            		<h1>ConnectU | <small>Scholarship</small></h1>
            		<p>List of scholarships which best fit your academy career: </p>
                    <p>Click on one to get more details.</p>
            	</div>
        	<div class = "col-md-4"></div>
    	</div>


<div id="table1">
	<table id="table1" class="tablesorter">
		<thead>
			<tr>
			</tr>
		</thead>
		<tbody>
			<?php //get data from database
				require "/var/connection/connect.php";
				//$query = mysqli_query($con, "SELECT * FROM Scholarship");
				$sql = "SELECT * FROM Scholarship WHERE status ='".$_SESSION['year']."'or ethnicity ='".$_SESSION['ethnicity']."'";
				//echo $sql;
				$result = mysqli_query($db, $sql);
				if (mysqli_num_rows($result) == 0){
					echo("<h3>We currently don't have a Scholarship matching your background</h3>");
					return;
				}
				if(!$result){
					echo("<h3>We currently don't have a Scholarship matching your background</h3>");
				}else{
					while($row = mysqli_fetch_array($result)){
						echo '<a href="'.$row['link'].'" target="_blank" class="list-group-item list-group-item-action">';
			    		echo '<h5 class="list-group-item-heading">Name of Scholarship: </h5><p>' .$row['name']. '</p>';
			    		echo '<h5 class="list-group-item-heading">Description: </h5><p>'.$row['description']. '</p>';
			  		  	echo '</a>';

					}
				}
			?>
		</tbody>
	</table>
</div>


	</body>

</html>
