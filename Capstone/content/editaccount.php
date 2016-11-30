<?php
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
    if(!$_SESSION['logged_in']){
        header("Location: index.php");
    }

    include "get_user_info.php";
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<title>Edit Account</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!-- jQuery libraries -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../functions/editaccount.js"></script>
	</head>
	<body>
        <div class="container">
	        <div class = "row">
                <div class="col-md-offset-4 col-md-4">
                    <h1>ConnectU | <small>Edit Account</small></h1>
                </div>
                <div class = "col-md-4"></div>
            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div id="accordion">
						<form id="formid" action="" data-toggle="validator" method="POST" role="form" enctype="multipart/form-data">
							<h3>School</h3>
								<div id="accordian_1">
									<div class="form-group">
										<label for="univ" class="control-label">Enter the university that you are attending: </label>
										<input type="text" class="form-control" id="univ" name="univ" required
											placeholder="University" data-error="You must enter a university"
											value="<?php echo $_SESSION['university']; ?>" >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_status">Please choose your academic status</label>
											<select class="form-control" id="choose_status" name="choose_status" required>
												<option value="">Please choose your academic status</option>
												<option value="Undergraduate" <?php if($_SESSION['status']=="Undergraduate"){ echo 'selected="selected"'; }?> >Undergraduate</option>
												<option value="Graduate" <?php if($_SESSION['status']=="Graduate"){ echo 'selected="selected"'; }?> >Graduate</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_year">Please choose your year in school:</label>
											<select class="form-control" id="choose_year" name="choose_year" required>
												<option value="">Please choose your year in school</option>
												<option <?php if($_SESSION['year']=="Freshman"){ echo 'selected="selected"'; }?> >Freshman</option>
												<option <?php if($_SESSION['year']=="Sophomore"){ echo 'selected="selected"'; }?>>Sophomore</option>
												<option <?php if($_SESSION['year']=="Junior"){ echo 'selected="selected"'; }?>>Junior</option>
												<option <?php if($_SESSION['year']=="Senior"){ echo 'selected="selected"'; }?>>Senior</option>
												<option <?php if($_SESSION['year']=="Masters"){ echo 'selected="selected"'; }?>>Masters</option>
												<option <?php if($_SESSION['year']=="PhD"){ echo 'selected="selected"'; }?>>PhD</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="major" class="control-label">Enter your major: </label>
										<input type="text" class="form-control" id="major" name="major" required
											placeholder="Major" data-error="You must enter a major"
											value="<?php echo $_SESSION['major']; ?>">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							<h3>Profile Picture</h3>
								<div id="accordian_2">
									<div class="form-group">
										<input id="profilePic" type="file" class="form_control" name="image">
									</div>
								</div>
							<input type="submit" name="submit" style="margin: 5px;">
                            <input type="button" onclick="location.href='https://www.connectu.space/profile.php';" value="Cancel">
						</form>
					</div>
        
        <?php
            if(isset($_POST['submit'])) {
                
            $university = $_POST['univ'];
            $major = $_POST['major'];
            $year=$_POST['choose_year'];
            $status=$_POST['choose_status'];
            
                if(isset($_POST['image']) == 0) {
                    $sql = "UPDATE registration SET university=?, major=?, year=?, status=? WHERE userId='".$_SESSION['current_user_id']."'";
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param("ssss", $university, $major, $year, $status);
                }
                else {
				    $image = addslashes($_FILES['image']['tmp_name']);
                    $image = file_get_contents($image);
                    $image = base64_encode($image);
                    
                    $sql = "UPDATE registration SET university=?, major=?, year=?, status=?, image=? WHERE userId='".$_SESSION['current_user_id']."'";
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param("sssss", $university, $major, $year, $status, $image);
                }
            
            $stmt->execute();
            $stmt->close();

            header("Location: profile.php");   
            }
        ?>
                    </div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>
