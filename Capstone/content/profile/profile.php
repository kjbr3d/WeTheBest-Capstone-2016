<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
		<script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="header.css">
    </head>
    <body>
        <div class="header">
            <a href="../profile/profile.php"><div class="Logo"></div></a>
            <div class="HeaderContentRight">
                <?php
                    require "/var/connection/connect.php";
                    session_start();
                    if(isset($_SESSION['email'])) {
                ?>
                <div class="Welcome"><span style="margin-right:10px;">Hello <?php echo $_SESSION['email'] ?></span></div>
                <a href="../logout.php"><div class="LogIn">Logout<img class="loginImage" src="LoginIcon.png"/></div></a>
                <?php
                }
                else {
                ?>
                <a href="login.php"><div class=Login>Login<img class="loginImage" src="LoginIcon.png"/></div></a>
                <?php
                }
                ?>


            </div>
        </div>
<!-- HEADER ENDS HERE. START BODY -->
        <?php
            if ($_SESSION['status'] != 'started') {
                header("Location: ../index.php");
            }
            else {
                /*ADD IMAGE TO THIS; CHECK NOTES ON PHONE*/
                $sql = "SELECT email, fullName, country, language, university, major, year FROM capstone.registration WHERE email=?";
                $result = $db->prepare($sql);
                $email = $_SESSION['email'];
                $result->bind_param('s', $email);
                $result->execute();
                $result->bind_result($email, $fullName, $country, $language, $university, $major, $year);
                $result->fetch();

                /*$result = mysqli_query($db, $sql);
                $row = $result->fetch_array($result);*/
        ?>
        <!-- <div id="picContainer">LOOK AT TEXT FILE IN CAP FOLDER. NEED A FILE UPLOAD FORM</div> -->
        <form action='profile.php' method='POST' enctype='multipart/form-data' ></br>
            File        : <input type='file' name= 'image'>
        </form>
        <div id="userInfo">
            <div><?php printf("%s\n", $email); ?></div>
            <div><?php printf("%s\n", $fullName); ?></div>
            <div><?php printf("%s\n", $country); ?></div>
            <div><?php printf("%s\n", $language); ?></div>
            <div><?php printf("%s\n", $university); ?></div>
            <div><?php printf("%s\n", $major); ?></div>
            <div><?php printf("%s\n", $year); ?></div>

        </div>

        <div id="footer">
            <div class="footerContent">
                <div class="CreatedBy">Created By:</div>
                <div class="CreatedByNames">
                    <div class="name">Mark Vassell</div>
                    <div class="name">Aziz Almeqrin</div>
                    <div class="name">Kyle Busch</div>
                    <div class="name">Burhan Ali</div>
                    <div class="name">Austin Guffey</div>
                </div>
            </div>
            <div class="bottomLogo"></div>
        </div>
        <?php
            }
        ?>

    </body>
</html>
