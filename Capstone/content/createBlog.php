<?php

#### TODO LIST ####
# php to post blog page to db
# php to pull previous blog posts
# find and implement Rich Text Editor 
#



?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
		<meta charset="UTF-8">
		<title>Create a blog</title>	

	</head>
	<body>
		<div class="container">
			<div class="row">
                	                <div class="col-md-offset-4 col-md-4">
                        	                <h1>ConnectU | <small>Login</small></h1>
                                	</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<h4>View Previous Blogs</h4>
					<div class="container">
<?php
	
?>
					</div>
				</div>
				<div class="col-md-8">
					<form>
						<div class="row">
							<div class="form-group col-xs-6">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="10" id="blog" placeholder="Enter your thoughts" required></textarea>
						</div>
						<input type="submit" name="submit" id="submit">
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
			
		</div>
	</body>
</html>
