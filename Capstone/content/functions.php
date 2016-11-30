<?php
    function displayImage($db, $email) {
        $sql = "SELECT image FROM registration WHERE email = ?";
            //echo $sql;
        $stmt = $db->prepare($sql);
        if($stmt === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->errno . ' ' . $db->error, E_USER_ERROR);
        }
        //Binding the parameter
        if(!$stmt->bind_param('s', $email)){
            echo "parameter binding failed";
        }
        if(!$stmt->execute()){
            echo "query execution failed";
        }
        //Bind results to variables
        if(!$stmt->bind_result($image)){
            echo"result binding failed";
        }
        $stmt -> fetch();

        echo '<img height="100" width="100" src="data:image;base64,'.$image.'">';
        echo "<h3 class=\"text-success\">Registration Successful.<br><a href =\"index.php\">click here to login</a></h3>";

        $stmt->close();
    }

    function match($db, $email, $university, $major, $year, $status, $ethnicity){
        $sql = "SELECT userId FROM(";
        $sql .= "SELECT userId,
        IF(university = '".$university."', 2, 0)
        + IF(ethnicity = '".$ethnicity."' , 3, 0)
        + IF(major = '".$major."' , 4, 0)
        + IF(year = '".$year."',1,0)
        + IF(status = '".$status."' ,2,0)
        AS score FROM registration WHERE email <>'".$email."'
        ORDER BY score  DESC limit 6";
        $sql .= ") AS rank WHERE score > 4";

        //echo $sql;

        if ($result = $db->query($sql)) {
            $matches ="";
            $count = 0;
            while(($obj = $result->fetch_object())){
                //echo $obj->score;
                if ($count == 0){
                    $matches .= $obj->userId;
                    $count++;
                }else{
                    $matches .= ",".$obj->userId;
                }
            }
            $result->free();
            //echo $matches;

            $matching_sql = "SELECT userId FROM  `registration` WHERE email = '".$email."'";
            $result = $db->query($matching_sql);
            $obj = $result->fetch_object();
            $sql2 = "INSERT INTO matching (userId1, userId2) VALUES (".$obj->userId.",'".$matches."')";
            if(!$db->query($sql2)){
                echo "Insert in the matching table failed";
            }


        }

    }

?>
