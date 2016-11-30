<!--test-->
<?php


	if($_SERVER['SERVER_PORT'] != '443') {
		header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit();
	}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Capstone</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery libraries -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
	<body onload="myFunction()">
		<script>
			function myFunction(){

				window.location.hash = 'login';
			}
		</script>
		<div class="container">

			<div class = "row">
				<div class="col-md-offset-4 col-md-4">
					<h1>ConnectU | <small>Login</small></h1>
				</div>
				<div class = "col-md-offset-2 col-md-2"> <button onclick = "location.href = 'register.php';" type="button" name = "register" class="btn btn-info btn-lg btn-block">Register Here</button></div>
			</div>
			<div class = "row"><p>  </p></div>
			<div class = "row">
	  			<div class="col-sm-offset-3 col-md-6">
					<form class="form-horizontal" method = "POST" action = "<?= $_SERVER['PHP_SELF'] ?>" >
					  	<div class="form-group">
					    	<label for="inputemail" class="col-sm-2 control-label">Email</label>
						    <div class="col-sm-10">
						    	<input type="email" name = "email" class="form-control" id="inputemail" placeholder="Email" required>
						    </div>
					  	</div>
						<div class="form-group">
						    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" name = "password" class="form-control" id="inputPassword" placeholder="Password" required>
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


						        require "/var/connection/connect.php";
						        $sql = "SELECT hash FROM Login WHERE email = ?";
                					//echo $sql;
       							$stmt = $db->prepare($sql);
       				 			if($stmt === false) {
                					trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        						}
        						$email = htmlspecialchars($_POST["email"]);
        						//Binding the parameter
       							if(!$stmt->bind_param('s', $email)){
       							    echo "parameter binding failed";
       							}
        						if(!$stmt->execute()){
        						    echo "query execution failed";
        						}
       	 						//Bind results to variables
        						if(!$stmt->bind_result($password_hash)){
                					echo"result binding failed";
        						}
       	 						$stmt -> fetch();

        						$password_entered = htmlspecialchars($_POST['password']);
								if ($email == '' || $password_entered == ''){
									echo "<h1 class = 'bg-danger'> No field can be left blank </h1>";
								}
        						else if(crypt($password_entered, $password_hash) == $password_hash) {
        							session_start();
									$_SESSION['logged_in'] = TRUE;
				                	$_SESSION['email'] = $email;

									//echo "<script>window.location.href = \"profile.php\"</script>";
									header("Location: profile.php");
									exit;
        						}else {
                						echo "<h1 class = 'bg-danger'>The login failed.\nThe credentials don't match</h1>";

        						}
						}
					?>

				</div>

			</div>
		</div>
	</body>
</html>
