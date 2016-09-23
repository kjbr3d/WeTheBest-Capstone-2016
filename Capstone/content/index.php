
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
			<div class = "row"><p>  </p></row>
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
		</div>
	</body>
</html>


<?php
	require "connect.php";
	if (isset($_POST['sign_in'])) {
		echo ("<h1>You hit submit</h1>");
		$sql = "SELECT userName, password FROM Login WHERE username = ?";
		$stmt = $db->prepare($sql);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
		}
		$username = htmlspecialchars($_POST["name"]);
		//Binding the parameter
        if(!$stmt->bind_param('s', $username)){
          	echo "parameter binding failed";
        }
		if(!$stmt->execute()){
    		echo "query execution failed";
    	}
		//Bind results to variables
		if(!$stmt->bind_result($user, $userPassword)){
			echo"result binding failed";
		}
		$password = htmlspecialchars($_POST['password']);
		if( $password === $userPassword ) {
			echo "Your password is" .$password;
		}else {
			echo $userPassword;

		}
	}

?>
