<?php

    session_start();
    require  "/var/connection/connect.php";


        function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 'sec')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
    }

    function displayBlogs($type) {

        global $db;

        if ($type == 'public') {

            $whereClause = "";

        } else if ($type == 'isFollowing') {

            $query = "SELECT * FROM isFollowing WHERE follower = ". mysqli_real_escape_string($db, $_SESSION['current_user_id']);
            $result = mysqli_query($db, $query);

            $whereClause = "";

            while ($row = mysqli_fetch_assoc($result)) {

                if ($whereClause == "") $whereClause = "WHERE";
                else $whereClause.= " OR";
                $whereClause.= " userid = ".$row['isFollowing'];


            }

        } else if ($type == 'yourblogs') {

           $whereClause = "WHERE userId = ". mysqli_real_escape_string($db, $_SESSION['current_user_id']);

        } else if ($type == 'search') {

            echo '<p>Showing search results for "'.mysqli_real_escape_string($db, $_GET['q']).'":</p>';

           $whereClause = "WHERE blog LIKE '%". mysqli_real_escape_string($db, $_GET['q'])."%'";

        } else if (is_numeric($type)) {

            $userQuery = "SELECT * FROM registration WHERE userId = ".mysqli_real_escape_string($db, $type)." LIMIT 1";
                $userQueryResult = mysqli_query($db, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);

            echo "<h2>".mysqli_real_escape_string($db, $user['fullName'])."'s Blogs</h2>";

            $whereClause = "WHERE userid = ". mysqli_real_escape_string($db, $type);


        }


        $query = "SELECT * FROM blogs ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";

        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 0) {

            echo "There are no blogs to display.";

        } else {

            while ($row = mysqli_fetch_assoc($result)) {

                $userQuery = "SELECT * FROM registration WHERE userId = ".mysqli_real_escape_string($db, $row['userid'])." LIMIT 1";
                $userQueryResult = mysqli_query($db, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);

                echo "<div class='tweet'><p><a href='?page=publicprofiles&userid=".$user['userId']."'>".$user['fullName']."</a> <span class='time'>".time_since(time() - strtotime($row['datetime']))." ago</span>:</p>";

                echo "<p>".$row['blog']."</p>";

                echo "<p><a class='toggleFollow' data-userId='".$row['userid']."'>";


                $isFollowingQuery = "SELECT * FROM isFollowing WHERE follower = ". mysqli_real_escape_string($db, $_SESSION['current_user_id'])." AND isFollowing = ". mysqli_real_escape_string($db, $row['userid'])." LIMIT 1";
                $isFollowingQueryResult = mysqli_query($db, $isFollowingQuery);

                if ($_SESSION['current_user_id'] != $row['userid']) {
                  if (mysqli_num_rows($isFollowingQueryResult) > 0) {
                      echo "Unfollow";
                  }
                  else {
                      echo "Follow";
                  }
                }
                echo "</a></p></div>";

            }

        }


    }

    function displaySearch() {

        echo '<form class="form-inline">
                <div class="form-group">
                  <input type="hidden" name="page" value="search">
                  <input type="text" name="q" class="form-control" id="search" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">Search Blogs</button>
              </form>';

    }

    function displayBlogBox() {

        if ($_SESSION['current_user_id'] > 0) {

            echo '<div class="form">
                    <div class="form-group">
                      <form method="post" action="/blog/index.php?page=home">
                        <textarea class="form-control" id="tweetContent"></textarea>
                        <button id="postBlogButton" class="btn btn-primary">Post Blog</button>
                      </form>
                    </div>

                  </div>';

        }

    }

    function displayUsers() {

        global $db;
        $query = "SELECT * FROM registration";
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            //echo "<p><a href='?page=publicprofiles&userid=".$row['userId']."'>".$row['fullName']."</a></p>";
            echo "<p><a href='../view_profile.php?id=".$row['userId']."'>".$row['fullName']."</a></p>";
        }

    }

?>
