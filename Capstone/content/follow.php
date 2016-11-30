
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SESSION['logged_in']){
        //echo  $_SESSION['status'];
        header("Location: index.php");
    }
    require "/var/connection/connect.php";
    $stage = $_POST["stage"];
    if($stage == "follow"){
        $result1 = $db->query("SELECT * FROM isFollowing WHERE follower = '". mysqli_real_escape_string($db, $_SESSION['current_user_id'])."' and isFollowing = '". mysqli_real_escape_string($db, $_SESSION['view_userId'])."'");

        if ($result1){
            if ($result1->num_rows == 0){
                if($result = $db->query("INSERT INTO isFollowing (follower, isFollowing) VALUES (". mysqli_real_escape_string($db, $_SESSION['current_user_id']).", ". mysqli_real_escape_string($db, $_SESSION['view_userId']).")")){
                    echo "<p class=\"bg-success\">Following</p>";
                }else{
                    echo "<p class=\"bg-danger\">Not Following</p>";
                }
            }else{
                echo "<p class=\"bg-danger\">Already Following</p>";
            }
        }else{
            echo "SELECT * FROM isFollowing WHERE follower = '". mysqli_real_escape_string($db, $_SESSION['current_user_id'])."' and isFollowing = '". mysqli_real_escape_string($db, $_SESSION['view_userId'])."'";
        }
    }
    if ($stage == "unfollow"){
        $result1 = $db->query("SELECT * FROM isFollowing WHERE follower = '". mysqli_real_escape_string($db, $_SESSION['current_user_id'])."' and isFollowing = '". mysqli_real_escape_string($db, $_SESSION['view_userId'])."'");
        if ($result1){
            if ($result1->num_rows == 0){
                echo "Not currently following";
            }else{
                if($result2 = $db->query("DELETE FROM isFollowing WHERE follower = '". mysqli_real_escape_string($db, $_SESSION['current_user_id'])."' and isFollowing = '". mysqli_real_escape_string($db, $_SESSION['view_userId'])."'")){
                    echo "Unfollowed";
                }

            }

        }
    }




    $db->close();

 ?>
