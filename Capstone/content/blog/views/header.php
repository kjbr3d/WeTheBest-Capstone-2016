<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    		<!-- jQuery libraries -->
    		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    		<!-- Latest compiled JavaScript -->
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Bootstrap CSS
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
--><link rel="stylesheet" href="styles.css">
<script type = "text/JavaScript" src="../functions/notifications.js"></script>
    <script type = "text/JavaScript">
    function display_notifications(userId){
        $.ajax({
            type: "POST",
            url: "../notification.php",
            data: {
            stage: "display",
            id:userId},
            success: function(data){

                    $("#notification_list").html(data);

            }
        });

    }
    function get_notifications(userId){

        $.ajax({
            type: "POST",
            url: "../notification.php",
            data: {
            stage: "get",
            id:userId},
            success: function(data){

                    display_notifications(userId);
                    $("#my_notify").html(data);
                    setTimeout(get_notifications, 30000, userId);

            }
        });

    }
    function update(userId){
        $.ajax({
            type: "POST",
            url: "../notification.php",
            data: {
            stage: "update",
            id:userId},
            success: function(data){
                get_notifications(userId);

            }
        });
        return true;
    }
    </script>
  </head>
  <body onload = "get_notifications(<?php echo $_SESSION['current_user_id'];?>)">

      <nav class="navbar navbar-inverse">
        <a class="navbar-brand" href="?page=home">ConnectU Blog</a>
        <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Scholarship.php"><span class="glyphicon glyphicon-globe"></span> Scholarship</a>
            </li>

          <li class="nav-item">
            <a class="nav-link" href="?page=timeline">Your timeline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=yourblogs">Your Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
          </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span id = "my_notify"class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span><span class="caret"></span>
              </a>
              <ul class="dropdown-menu" id = "notification_list"></ul>
          </li>
          <li class = "presentation"><a href="../logout.php"> <span class="glyphicon glyphicon-off"></span>Logout</a></li>
      </ul>
    </nav>
