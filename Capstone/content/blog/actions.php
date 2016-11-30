<?php

    include("functions.php");



    if ($_GET['action'] == 'toggleFollow') {

        $query = "SELECT * FROM isFollowing WHERE follower = ". mysqli_real_escape_string($db, $_SESSION['current_user_id'])." AND isFollowing = ". mysqli_real_escape_string($db, $_POST['userId'])." LIMIT 1";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);

                mysqli_query($db, "DELETE FROM isFollowing WHERE id = ". mysqli_real_escape_string($db, $row['id'])." LIMIT 1");

                echo "1";

            } else {

                mysqli_query($db, "INSERT INTO isFollowing (follower, isFollowing) VALUES (". mysqli_real_escape_string($db, $_SESSION['current_user_id']).", ". mysqli_real_escape_string($db, $_POST['userId']).")");

                echo "2";


            }

    }

    if ($_GET['action'] == 'postBlog') {

        if (!$_POST['tweetContent']) {

            echo "Your blog is empty!";

        } else if (strlen($_POST['tweetContent']) > 5000) {

            echo "Your blog is too long!";

        } else {

            mysqli_query($db, "INSERT INTO blogs (`blog`, `userid`, `datetime`) VALUES ('". mysqli_real_escape_string($db, $_POST['tweetContent'])."', ". mysqli_real_escape_string($db, $_SESSION['current_user_id']).", NOW())");

            echo "1";

        }

    }

?>
