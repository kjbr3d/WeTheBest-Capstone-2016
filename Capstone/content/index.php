
<!DOCTYPE html>
<html>
	<head>
		<title>Capstone</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class = "row">
				<div class="col-md-offset-4 col-md-4">
					<h1>ConnectU | <small>Login</small></h1>
				</div>
				<div class = "col-md-4"></div>
			</div>
			<div class = "row"><p>  </p></div>
			<div class = "row">
	  			<div class="col-sm-offset-3 col-md-6">
					<form class="form-horizontal" method = "POST" action = "<?= $_SERVER['PHP_SELF'] ?>" >
					  	<div class="form-group">
					    	<label for="inputUsername" class="col-sm-2 control-label">Username</label>
						    <div class="col-sm-10">
						    	<input type="username" name = "name" class="form-control" id="inputUsername" placeholder="Username">
						    </div>
					  	</div>
						<div class="form-group">
						    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" name = "password" class="form-control" id="inputPassword" placeholder="Password">
						    </div>
						</div>
					  	<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" name = "sign_in" class="btn btn-info btn-lg btn-block">Sign in</button>
					    	</div>
					  	</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class = "row">
				<div class="col-md-offset-3 col-md-6">
					<?php


						if (isset($_POST['sign_in'])) {
							abstract class LoginCode{
								const Failure = 0;
								const Success = 1;

							}
							require "../functions/login/login.php";

							if( login() === LoginCode::Success ) {
				                session_start();
								$_SESSION['status'] = 'started';
				                $_SESSION['userName'] = $username = htmlspecialchars($_POST["name"]);;
								header("Location: home.php");
							}else {

							}
						}
					?>

				</div>

			</div>
		</div>
	</body>
</html>
