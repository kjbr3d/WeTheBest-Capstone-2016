<?php
    session_start();

    if($_SESSION['status'] != 'started'){
            echo " You aren't logged in";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Welcome <?echo $_SESSION['userName']?> </h1>
    </body>
</html>
