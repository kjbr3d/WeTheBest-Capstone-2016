<?php
    require "/var/connection/connect.php";
    require "functions.php";
    $sql = "SELECT fullName,image, country,university,major,language, year, status,userId FROM registration WHERE email = ?";
        //echo $sql;
    $stmt = $db->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->errno . ' ' . $db->error, E_USER_ERROR);
    }
    $email = $_SESSION["email"];
    //Binding the parameter
    if(!$stmt->bind_param('s', $email)){
        echo "parameter binding failed";
    }
    if(!$stmt->execute()){
        echo "query execution failed";
    }
    //Bind results to variables
    if(!$stmt->bind_result($_SESSION['userName'], $_SESSION['image'], $_SESSION['country'], $_SESSION['university'], $_SESSION['major'],$_SESSION['ethnicity'],$_SESSION['year'], $_SESSION['status'],$userId)){
        echo"result binding failed";
    }
    $stmt -> fetch();
    $stmt->close();
    $sql = "DELETE FROM matching WHERE userId1 =".$userId;
    $_SESSION['current_user_id'] = $userId;
    if(!$db->query($sql)){
        echo "Error deleting record: " . $db->error;
    }
    match($db,$email, $_SESSION['university'], $_SESSION['major'], $_SESSION['year'], $_SESSION['status'], $_SESSION['ethnicity']);
    //echo $userName;

    $sql = "SELECT userId2 FROM matching where userId1 =".$userId;
    $result = $db->query($sql);
    if (!$result){
        echo "Error error gettiing IDs: " . $db->error;
    }
    $obj = $result->fetch_object();


    $_SESSION['matches'] = explode(",",$obj->userId2);
    $size = sizeof($_SESSION['matches']);
    $sql = "SELECT userId, fullName, image from  registration where ";
    for($i = 0; $i < $size; $i++){
        if ($i == $size-1){
            $sql.="userId = ".$_SESSION['matches'][$i];
        }else{
            $sql.="userId = ".$_SESSION['matches'][$i]." or ";
        }
    }
    //echo $sql;

    $result = $db->query($sql);
    if (!$result){
        echo "Error error gettiing match info: No Matches";
    }else{
        $_SESSION["match_info"] = $result;
    }




?>
