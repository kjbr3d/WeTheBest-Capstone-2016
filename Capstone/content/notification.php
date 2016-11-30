<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SESSION['logged_in']){
            //echo  $_SESSION['status'];
            header("Location: index.php");
    }
    require  "/var/connection/connect.php";
    $stage = $_POST['stage'];
    if ($stage == 'get'){
        if (isset($_POST['id'])){

            $userId = $_POST['id'];
            $sql = "SELECT id1 FROM instant_messages where id2 = ".$userId;
            if($result = $db->query($sql)){
                //echo $result->num_rows;
                $sql2 = "SELECT notification from notifications where userId = ".$userId;
                $result2 = $db->query($sql2);
                $obj = $result2->fetch_object();
                $count  = $result->num_rows - $obj->notification;

                echo $count;
                $_SESSION['all'] = $result->num_rows;
                $_SESSION['total'] = $count;
            }

        }else{
            echo "ID NOT SET";
        }
    }
    if ($stage == 'display' ){
        $userId = $_POST['id'];
        $sql = "SELECT id1, time FROM instant_messages where id2 = ".$userId." GROUP BY id1 ORDER BY time DESC limit ".$_SESSION['total'];
        if($result = $db->query($sql)){
            if($result->num_rows > 0){
                while ($obj = $result->fetch_object()) {
                    $sql2 = "SELECT fullName FROM registration where userId = ".$obj->id1;

                    $result2 = $db->query($sql2);
                    $obj2 = $result2->fetch_object();
                    echo "<li><a href = \"ajax_chat.php?id=".$obj->id1."\" onclick = \"return update(".$_SESSION["current_user_id"].")\">New message from:".$obj2->fullName."</a></li>";
                }
            }
        }

    }

    if ($stage == 'update' ){
        $userId = $_POST['id'];
        $sql2 = "UPDATE notifications SET notification = ".$_SESSION['all']." where userId = ".$userId;
        echo $sql2;
        $result = $db->query($sql2);


    }

?>
