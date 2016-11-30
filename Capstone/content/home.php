<?php
	session_start();

    if($_SESSION['status'] != 'logged_in'){
        echo " You aren't logged in";
		header("Location: home.php");
    }



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
        <script src="../js/bootstrap.min.js"></script>
		<script type="text/JavaScript" src="../functions/profile_functions.js"></script>
    </head>
    <body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<p class="navbar-brand">Connect U</p>
				</div>

				<ul class="nav nav-tabs">
					<li role="presentation"><a href="profile.php"><span class="glyphicon glyphicon-leaf"></span> Profile</a></li>
					<li role="presentation"><a href="#School" onclick = 'school()'><span class="glyphicon glyphicon-pencil"></span> School</a></li>
					<li role="presentation"><a href="#Work" onclick = 'work()'><span class="glyphicon glyphicon-briefcase"></span> Work</a></li>
					<li role="presentation"><a href="#Experience" onclick = 'experience()'><span class="glyphicon glyphicon-time"></span> Experience</a></li>
					<li role="presentation"><a href="#Contact" onclick = 'contact()'><span class="glyphicon glyphicon-earphone"> Contact</a></li>
					<li role="presentation"><a href="#Accomplishments" onclick = 'accomplish()'><span class="glyphicon glyphicon-star-empty"></span> Accomplishments</a></li>
					<li class = "presentation"><a href="home.php?logout=true"> <span class="glyphicon glyphicon-off"></span>Logout</a></li>
				</ul>

			</div>


		</nav>
		<div class = "page_data">
			<?php include("profile.php"); ?>
		</div>
		<!--<div class="container">
			<div class = "row"></div>
			<div class = "row">
				<div class = "col-md-offset-9 col-md-3">
					<a href="home.php?logout=true"><button type="submit" name = "logout" class="btn btn-info btn-lg btn-block">Logout</button></a>
				</div>
			</div>
			<div class = 'row'>
				<div class="col-md-offset-1 col-md-3">
					<img src="..." alt="Profile Image" class="img-rounded">
				</div>
				<div class="col-md-offset-2 col-md-6">
					<h1><?//php echo $_SESSION['userName'];?> </h1>
				</div>

			</div>
		</div>-->



        <?php
        	if (isset($_GET['logout'])) {
			require  "/var/connection/connect.php";

                	// Unset all of the session variables.
                	$_SESSION = array();
                	//kill the session and delete all the session cookies.
                	if (ini_get("session.use_cookies")) {
                    		$params = session_get_cookie_params();
                    		setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
                	}
            		//destroy the session
                	session_destroy();
                	header("Location: index.php");
		}
	?>
    </body>
</html>
