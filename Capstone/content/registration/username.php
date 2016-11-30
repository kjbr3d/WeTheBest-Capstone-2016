<?php
	//require "/var/connection/connect.php";
?>
<!--Remeber to change password min back to 8
	Add Required tags
-->
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<title>connectU Account Registration</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery libraries -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 		 <script>
			$( function() {
    				$( "#accordion" ).accordion({
					header: "> form > h3"
				});
  			} );

  			$(function(){
 				$(".dropdown-menu li a").click(function(){
		   			$(this).closest('.dropdown').find(".btn:first-child").text($(this).text());
 		    		$(this).closest('.dropdown').find(".btn:first-child").val($(this).text());
				});
			});
		</script>

	</head>
	<body>
		<div class="container">
	        <div class = "row">
                <div class="col-md-offset-4 col-md-4">
                    <h1>ConnectU | <small>Registration</small></h1>
                </div>
                <div class = "col-md-4"></div>
            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div id="accordion">
						<form data-toggle="validator" action="" method="POST" role="form" enctype="multipart/form-data">
							<h3>Login</h3>
								<div id="accordion_1">
									<div class="form-group">
										<label for="username" class="control-label">Enter your email: </label>
										<input type="email" class="form-control" name="email"
											placeholder="Email" data-error="Invalid email, please try again" >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<label for="password" class="control-label">Enter a password: </label>
										<div class="form-inline row">
											<div class="form-group col-sm-6">
												<input type="password" name="password" data-minlength="8"
													class="form-control" id="password" placeholder="Password"  >
											</div>
											<div class="form-group col-sm-6">
												<input type="password" name="redoPass" data-minlength="8"
													class="form-control" id="redoPass" data-match="#password"
													data-match-error="Passwords don't match, please try again"
													placeholder="Confirm"  >
												<div class="help-block with-errors"></div>
											</div>

										</div>
										<div class="help-block">
											Minimum 8 characters; include at least one number and letter
										</div>
									</div>
								</div>
							<h3>User</h3>
								<div id="accordion_2">
									<div class="form-group">
										<label for="fullname" class="control-label">Enter your name: </label>
										<input type="text" class="form-control" id="name" name = "fullname"
											placeholder="Name" data-error="You must enter a name"  >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<label for="age" class="control-label">Enter your age: </label>
										<input type="number" class="form-control" id="age" name = "age"
											placeholder="Age" data-error="You must enter an age"  >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<label for="dob" class="control-label">Enter your date of birth: </label>
										<input type="date" class="form-control" id="dob" name = "dob"
											placeholder="Date of Birth" data-error="You must enter a date of birth"  >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_gender">Select Gender:</label>
												<select class="form-control" id="choose_gender" name="choose_gender">Please choose your gender
													<option>Male</option>
													<option>Female</option>
												</select>
										</div>
									</div>
								</div>
							<h3>Country</h3>
								<div id="accordian_3">
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_country">Select Country:</label>
											<select class="form-control" id="choose_country" name="choose_country">Please choose your country
											  <option>Afghanistan</option>
											  <option>Åland Islands</option>
											  <option>Albania</option>
											  <option>Algeria</option>
											  <option>American Samoa</option>
											  <option>Andorra</option>
											  <option>Angola</option>
											  <option>Anguilla</option>
											  <option>Antarctica</option>
											  <option>Antigua and Barbuda</option>
											  <option>Argentina</option>
											  <option>Armenia</option>
											  <option>Aruba</option>
											  <option>Australia</option>
											  <option>Austria</option>
											  <option>Azerbaijan</option>
											  <option>Bahamas</option>
											  <option>Bahrain</option>
											  <option>Bangladesh</option>
											  <option>Barbados</option>
											  <option>Belarus</option>
											  <option>Belgium</option>
											  <option>Belize</option>
											  <option>Benin</option>
											  <option>Bermuda</option>
											  <option>Bhutan</option>
											  <option>Bolivia, Plurinational State of</option>
											  <option>Bonaire, Sint Eustatius and Saba</option>
											  <option>Bosnia and Herzegovina</option>
											  <option>Botswana</option>
											  <option>Bouvet Island</option>
											  <option>Brazil</option>
											  <option>British Indian Ocean Territory</option>
											  <option>Brunei Darussalam</option>
											  <option>Bulgaria</option>
											  <option>Burkina Faso</option>
											  <option>Burundi</option>
											  <option>Cambodia</option>
											  <option>Cameroon</option>
											  <option>Canada</option>
											  <option>Cape Verde</option>
											  <option>Cayman Islands</option>
											  <option>Central African Republic</option>
											  <option>Chad</option>
											  <option>Chile</option>
											  <option>China</option>
											  <option>Christmas Island</option>
											  <option>Cocos (Keeling) Islands</option>
											  <option>Colombia</option>
											  <option>Comoros</option>
											  <option>Congo</option>
											  <option>Congo, the Democratic Republic of the</option>
											  <option>Cook Islands</option>
											  <option>Costa Rica</option>
											  <option>Côte d'Ivoire</option>
											  <option>Croatia</option>
											  <option>Cuba</option>
											  <option>Curaçao</option>
											  <option>Cyprus</option>
											  <option>Czech Republic</option>
											  <option>Denmark</option>
											  <option>Djibouti</option>
											  <option>Dominica</option>
											  <option>Dominican Republic</option>
											  <option>Ecuador</option>
											  <option>Egypt</option>
											  <option>El Salvador</option>
											  <option>Equatorial Guinea</option>
											  <option>Eritrea</option>
											  <option>Estonia</option>
											  <option>Ethiopia</option>
											  <option>Falkland Islands (Malvinas)</option>
											  <option>Faroe Islands</option>
											  <option>Fiji</option>
											  <option>Finland</option>
											  <option>France</option>
											  <option>French Guiana</option>
											  <option>French Polynesia</option>
											  <option>French Southern Territories</option>
											  <option>Gabon</option>
											  <option>Gambia</option>
											  <option>Georgia</option>
											  <option>Germany</option>
											  <option>Ghana</option>
											  <option>Gibraltar</option>
											  <option>Greece</option>
											  <option>Greenland</option>
											  <option>Grenada</option>
											  <option>Guadeloupe</option>
											  <option>Guam</option>
											  <option>Guatemala</option>
											  <option>Guernsey</option>
											  <option>Guinea</option>
											  <option>Guinea-Bissau</option>
											  <option>Guyana</option>
											  <option>Haiti</option>
											  <option>Heard Island and McDonald Islands</option>
											  <option>Holy See (Vatican City State)</option>
											  <option>Honduras</option>
											  <option>Hong Kong</option>
											  <option>Hungary</option>
											  <option>Iceland</option>
											  <option>India</option>
											  <option>Indonesia</option>
											  <option>Iran, Islamic Republic of</option>
											  <option>Iraq</option>
											  <option>Ireland</option>
											  <option>Isle of Man</option>
											  <option>Israel</option>
											  <option>Italy</option>
											  <option>Jamaica</option>
											  <option>Japan</option>
											  <option>Jersey</option>
											  <option>Jordan</option>
											  <option>Kazakhstan</option>
											  <option>Kenya</option>
											  <option>Kiribati</option>
											  <option>Korea, Democratic People's Republic of</option>
											  <option>Korea, Republic of</option>
											  <option>Kuwait</option>
											  <option>Kyrgyzstan</option>
											  <option>Lao People's Democratic Republic</option>
											  <option>Latvia</option>
											  <option>Lebanon</option>
											  <option>Lesotho</option>
											  <option>Liberia</option>
											  <option>Libya</option>
											  <option>Liechtenstein</option>
											  <option>Lithuania</option>
											  <option>Luxembourg</option>
											  <option>Macao</option>
											  <option>Macedonia, the former Yugoslav Republic of</option>
											  <option>Madagascar</option>
											  <option>Malawi</option>
											  <option>Malaysia</option>
											  <option>Maldives</option>
											  <option>Mali</option>
											  <option>Malta</option>
											  <option>Marshall Islands</option>
											  <option>Martinique</option>
											  <option>Mauritania</option>
											  <option>Mauritius</option>
											  <option>Mayotte</option>
											  <option>Mexico</option>
											  <option>Micronesia, Federated States of</option>
											  <option>Moldova, Republic of</option>
											  <option>Monaco</option>
											  <option>Mongolia</option>
											  <option>Montenegro</option>
											  <option>Montserrat</option>
											  <option>Morocco</option>
											  <option>Mozambique</option>
											  <option>Myanmar</option>
											  <option>Namibia</option>
											  <option>Nauru</option>
											  <option>Nepal</option>
											  <option>Netherlands</option>
											  <option>New Caledonia</option>
											  <option>New Zealand</option>
											  <optionNicaragua</option>
											  <option>Niger</option>
											  <option>Nigeria</option>
											  <option>Niue</option>
											  <option>Norfolk Island</option>
											  <option>Northern Mariana Islands</option>
											  <option>Norway</option>
											  <option>Oman</option>
											  <option>Pakistan</option>
											  <option>Palau</option>
											  <option>Palestinian Territory, Occupied</option>
											  <option>Panama</option>
											  <option>Papua New Guinea</option>
											  <option>Paraguay</option>
											  <option>Peru</option>
											  <option>Philippines</option>
											  <option>Pitcairn</option>
											  <option>Poland</option>
											  <option>Portugal</option>
											  <option>Puerto Rico</option>
											  <option>Qatar</option>
											  <option>Réunion</option>
											  <option>Romania</option>
											  <option>Russian Federation</option>
											  <option>Rwanda</option>
											  <option>Saint Barthélemy</option>
											  <option>Saint Helena, Ascension and Tristan da Cunha</option>
											  <option>Saint Kitts and Nevis</option>
											  <option>Saint Lucia</option>
											  <option>Saint Martin (French part)</option>
											  <option>Saint Pierre and Miquelon</option>
											  <option>Saint Vincent and the Grenadines</option>
											  <option>Samoa</option>
											  <option>San Marino</option>
											  <option>Sao Tome and Principe</option>
											  <option>Saudi Arabia</option>
											  <option>Senegal</option>
											  <option>Serbia</option>
											  <option>Seychelles</option>
											  <option>Sierra Leone</option>
											  <option>Singapore</option>
											  <option>Sint Maarten (Dutch part)</option>
											  <option>Slovakia</option>
											  <option>Slovenia</option>
											  <option>Solomon Islands</option>
											  <option>Somalia</option>
											  <option>South Africa</option>
											  <option>South Georgia and the South Sandwich Islands</option>
											  <option>South Sudan</option>
											  <option>Spain</option>
											  <option>Sri Lanka</option>
											  <option>Sudan</option>
											  <option>Suriname</option>
											  <option>Svalbard and Jan Mayen</option>
											  <option>Swaziland</option>
											  <option>Sweden</option>
											  <option>Switzerland</option>
											  <option>Syrian Arab Republic</option>
											  <option>Taiwan, Province of China</option>
											  <option>Tajikistan</option>
											  <option>Tanzania, United Republic of</option>
											  <option>Thailand</option>
											  <option>Timor-Leste</option>
											  <option>Togo</option>
											  <option>Tokelau</option>
											  <option>Tonga</option>
											  <option>Trinidad and Tobago</option>
											  <option>Tunisia</option>
											  <option>Turkey</option>
											  <option>Turkmenistan</option>
											  <option>Turks and Caicos Islands</option>
											  <option>Tuvalu</option>
											  <option>Uganda</option>
											  <option>Ukraine</option>
											  <option>United Arab Emirates</option>
											  <option>United Kingdom</option>
											  <option>United States</option>
											  <option>United States Minor Outlying Islands</option>
											  <option>Uruguay</option>
											  <option>Uzbekistan</option>
											  <option>Vanuatu</option>
											  <option>Venezuela, Bolivarian Republic of</option>
											  <option>Viet Nam</option>
											  <option>Virgin Islands, British</option>
											  <option>Virgin Islands, U.S.</option>
											  <option>Wallis and Futuna</option>
											  <option>Western Sahara</option>
											  <option>Yemen</option>
											  <option>Zambia</option>
											  <option>Zimbabwe</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="univ" class="control-label">Enter your ethnicity: </label>
										<input type="text" class="form-control" id="ethnicity" name="ethnicity"
											placeholder="Ethnicity" data-error="You must enter an ethnicity"  >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_lang">Select Lamguage:</label>
											<select class="form-control" id="choose_lang" name="choose_lang">Please choose your language
												<option>English</option>
												<option>Spanish</option>
												<option>German</option>
												<option>Russian</option>
												<option>Chinese</option>
												<option>Japanese</option>
												<option>Portuguese</option>
												<option>Italian</option>
											</select>
										</div>
									</div>
								</div>
							<h3>School</h3>
								<div id="accordian_4">
									<div class="form-group">
										<label for="univ" class="control-label">Enter the university that you are attending: </label>
										<input type="text" class="form-control" id="univ" name="univ"
											placeholder="University" data-error="You must enter a university"  >
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_status">Please choose your academic status</label>
											<select class="form-control" id="choose_status" name="choose_status">Please choose your academic status
												<option>Undergraduate</option>
												<option>Graduate</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="dropdown">
											<label for="choose_year">Please choose your year in school:</label>
											<select class="form-control" id="choose_year" name="choose_year">Please choose your year in school
												<option>Freshman</option>
												<option>Sophomore</option>
												<option>Junior</option>
												<option>Senior</option>
												<option>Masters</option>
												<option>PhD</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="major" class="control-label">Enter your major: </label>
										<input type="text" class="form-control" id="major" name="major"
											placeholder="Major" data-error="You must enter a major"  >
										<div class="help-block with-errors"></div>
									</div>
								</div>
							<h3>Profile Picture</h3>
								<div id="accordian_5">
									<div class="form-group">
										<input id="profilePic" type="file" class="form_control" name="image">
									</div>
								</div>
							<input type="submit" name="submit">
						</form>
					</div>

					<?php
						if(isset($_POST['submit'])) {
							require "/var/connection/connect.php";

								if(getimagesize($_FILES['image']['tmp_name']) == FALSE) {
									echo "Please select image";
								} else {
									$image = addslashes($_FILES['image']['tmp_name']);
									$image = file_get_contents($image);
									$image = base64_encode($image);
									//saveImage($image, $db);
									displayImage($db);
								}


								$email = htmlspecialchars($_POST['email']);
								$password = htmlspecialchars($_POST['password']);
								$redoPass = htmlspecialchars($_POST['redoPass']);
								$fullName = htmlspecialchars($_POST['fullname']);
								$email = htmlspecialchars($_POST['email']);
								$dob = htmlspecialchars($_POST['dob']);
								$ethnicity = htmlspecialchars($_POST['ethnicity']);
								$university = htmlspecialchars($_POST['univ']);
								$major = htmlspecialchars($_POST['major']);
								$year = htmlspecialchars($_POST['choose_year']);
								$gender = htmlspecialchars($_POST['choose_gender']);
								$country = htmlspecialchars($_POST['choose_country']);
								$language = htmlspecialchars($_POST['choose_lang']);
								$status = htmlspecialchars($_POST['choose_status']);



								if ($password === $redoPass){
									$sql = "INSERT INTO registration (fullName, email, dob, ethnicity, university, major, year, gender, country, language, status, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
									$stmt2 = $db->prepare($sql);
									if(!$stmt2->bind_param("ssssssssssss", $fullName, $email, $dob, $ethnicity, $university, $major, $year, $gender, $country, $language, $status, $image)){
										echo "<h3 class = 'error'> query execution failed. The fefde is already in use </h3>";
										exit(3);
									}
									if(!$stmt2->execute()){
										echo "<h3 class = 'error'> query execution failed. The fefde is already in use </h3>";
										exit(4);
									}

									mt_srand();
									$salt = mt_rand();
									$salt = sha1($salt);
									$f_salt = sha1($salt);
									$f_salt = trim($salt);
									$password_hash = crypt(htmlspecialchars($_POST["password"]), $f_salt);
									$stmt = $db->prepare("INSERT INTO Login(email, hash) VALUES (?,?)");

									if(!$stmt->bind_param("ss", $email, $password_hash)){
																	echo "<h3 class = 'bg-danger'> parameter binding failed </h3>";
										exit(1);
									}
									if(!$stmt->execute()){
										echo "<h3 class = 'error'> query execution failed. The username is already in use </h3>";
										exit(2);
									}
								}

							}

							/*
							function saveImage($image, $db) {
								$query = "insert into registration (image) values ('$image')";
								$result = mysqli_query($db, $query);
								if($result) {
									echo "Image is uploaded <br>";
								} else {
									echo "Image is not uploaded <br>";
								}
							}
							*/

							function displayImage($db) {
								$email = htmlspecialchars($_POST['email']);
								$query = "select image from registration where email = '".$email."' ";
								$result = mysqli_query($db, $query);
								//while ($row = mysqli_fetch_array($result)) {
									$row = mysqli_fetch_array($result);
									echo '<img height="100" width="100" class="img-circle" src="data:image;base64,'.$row[0].'">';
								//}
							}
					?>

				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>
