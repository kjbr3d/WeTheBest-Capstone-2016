<?php

    session_start();

    $link = mysqli_connect("localhost", "root", "Czar911_", "capstone");

    if (mysqli_connect_errno()) {
        print_r(mysqli_connect_error());
        exit();
    }




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

    function displayTweets($type) {

        global $link;

        if ($type == 'public') {

            $whereClause = "";

        } else if ($type == 'isFollowing') {

            $query = "SELECT * FROM isFollowing WHERE follower = ". mysqli_real_escape_string($link, $_SESSION['current_user_id']);
            $result = mysqli_query($link, $query);

            $whereClause = "";

            while ($row = mysqli_fetch_assoc($result)) {

                if ($whereClause == "") $whereClause = "WHERE";
                else $whereClause.= " OR";
                $whereClause.= " userid = ".$row['isFollowing'];


            }

        } else if ($type == 'yourblogs') {

           $whereClause = "WHERE userId = ". mysqli_real_escape_string($link, $_SESSION['current_user_id']);

        } else if ($type == 'search') {

            echo '<p>Showing search results for "'.mysqli_real_escape_string($link, $_GET['q']).'":</p>';

           $whereClause = "WHERE tweet LIKE '%". mysqli_real_escape_string($link, $_GET['q'])."%'";

        } else if (is_numeric($type)) {

            $userQuery = "SELECT * FROM registration WHERE userId = ".mysqli_real_escape_string($link, $type)." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);

            echo "<h2>".mysqli_real_escape_string($link, $user['fullName'])."'s Tweets</h2>";

            $whereClause = "WHERE userid = ". mysqli_real_escape_string($link, $type);


        }


        $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";

        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 0) {

            echo "There are no tweets to display.";

        } else {

            while ($row = mysqli_fetch_assoc($result)) {

                $userQuery = "SELECT * FROM registration WHERE userId = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);

                date_default_timezone_set("America/Chicago");
                echo "<div class='tweet'><p><a href='?page=publicprofiles&userid=".$user['userId']."'>".$user['fullName']."</a> <span class='time'>".time_since(time() - strtotime($row['datetime']))." ago</span>:</p>";

                echo "<p>".$row['tweet']."</p>";

                echo "<p><a class='toggleFollow' data-userId='".$row['userid']."'>";


                $isFollowingQuery = "SELECT * FROM isFollowing WHERE follower = ". mysqli_real_escape_string($link, $_SESSION['current_user_id'])." AND isFollowing = ". mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
                $isFollowingQueryResult = mysqli_query($link, $isFollowingQuery);

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
                <button type="submit" class="btn btn-primary">Search Tweets</button>
              </form>';

    }

    function displayTweetBox() {

        if ($_SESSION['current_user_id'] > 0) {

            echo '<div id="tweetSuccess" class="alert alert-success">Your tweet was posted successfully.</div>
                  <div id="tweetFail" class="alert alert-danger"></div>
                  <div class="form">
                    <div class="form-group">
                      <textarea class="form-control" id="tweetContent"></textarea>
                    </div>
                    <button id="postTweetButton" class="btn btn-primary">Post Tweet</button>
                  </div>';

        }

    }

    function displayUsers() {

        global $link;
        $query = "SELECT * FROM registration LIMIT 10";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><a href='?page=publicprofiles&userid=".$row['userId']."'>".$row['fullName']."</a></p>";
        }

    }

?>
