<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SESSION['logged_in']){
        //echo  $_SESSION['status'];
        header("Location: index.php");
    }
    require  "/var/connection/connect.php";

    $sql = "SELECT blog, datetime from blogs where userid = ".$_SESSION['view_userId']." ORDER BY datetime DESC limit 5";

    if ($result = $db->query($sql)){
        if ($result->num_rows > 0){
            echo "<div class = \"row\">";
            echo "<div class=\"col-md-3\"><a href = \"blog/index.php?page=publicprofiles&userid=".$_SESSION['view_userId']."\"><b>view all blogs</b></a></div>";
            echo "<div class=\"col-md-3\"><a href = \"ajax_chat.php?id=".$_SESSION['view_userId']."\"><b>Message</b></a></div>";
            echo "<div class=\"col-md-6\"></div>";
            echo "</div>";
            echo "<div class = \"row\">";
            echo "<div class=\"col-md-6\"><h1>Blogs</h1></div>";
            echo "<div class=\"col-md-6\"><h1>Time</h1></div>";
            echo "</div>";
        }else{
            echo"<div class = \"row\">";
            echo "<div class=\"col-md-3\"><a href = \"blog/index.php?page=publicprofiles&userid=".$_SESSION['view_userId']."\"><b>view all blogs</b></a></div>";
            echo "<div class=\"col-md-3\"><a href = \"ajax_chat.php?id=".$_SESSION['view_userId']."\"><b>Message</b></a></div>";
            echo "<div class=\"col-md-6\"><h1>There are currently no blogs from this user</h1></div>";
            echo "</div>";
        }
        while ($obj = $result->fetch_object()){
            echo "<div class = \"row\">";
            echo "<div class=\"col-md-6\"><h4>".$obj->blog."</h4></div>";
            echo "<div class=\"col-md-6\"><h4>".$obj->datetime."</h4></div>";
            echo "</div>";

        }
    }




?>
