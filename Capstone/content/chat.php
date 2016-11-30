<?php
    //success???
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!$_SESSION['logged_in']){
			//echo  $_SESSION['status'];
			header("Location: index.php");
	}
	date_default_timezone_set('America/Chicago');
	require  "/var/connection/connect.php";
	$stage = $_POST['stage'];

	/*if($stage == 'initial'){
		$user = $_POST['user'];

		$sql = "SELECT * FROM chat where name = '".$user."'";
		//echo $sql;
		if($result = $db->query($sql)){
			if($result->num_rows == 0){

				$_SESSION['user'] = $user;
				$sql = "INSERT INTO chat VALUES ('".$user."','".time()."')";
				//echo $sql;
				if($result2 = $db->query($sql)){
					echo "good";
				}
			}else{
				echo "taken";
			}
		}
	}else*/
	if ($stage == "send"){
		// Grab the text
		$IM = $_POST['IM'];


		$sql = "INSERT INTO instant_messages VALUES ('".$_SESSION['current_user_id']."','".$_SESSION['receiver']."','".$IM."','".time()."')";
		//echo $_SESSION['receiver'];
		if($result = $db->query($sql)){
			echo "good";
		}else{
			echo "fail";
		}
	} else if ($stage == 'load') {
		$sql = "SELECT * FROM instant_messages where id1 = ".$_SESSION['current_user_id']." and id2 = ".$_SESSION['receiver']." or id1 = ".$_SESSION['receiver']." and id2 = ".$_SESSION['current_user_id']." ORDER BY time DESC";

		if($result = $db->query($sql)){
			if($result->num_rows > 0){
				while ($obj = $result->fetch_object()) {
					if($obj->id1 == $_SESSION['current_user_id']){
						echo "<div class = \"list0\"><b>".$_SESSION['userName']. "</b> at ". date("n/d/y h:i:s a", $obj->time)." - ".htmlentities($obj->message)."</div>";
					}else{
						echo "<div class = \"list1\"><b>".$_SESSION['rec_name']. "</b> at ". date("n/d/y h:i:s a", $obj->time)." - ".htmlentities($obj->message)."</div>";
					}

				}
			}
		}
	}else if($stage == "get_names"){
		$sql = "select fullName FROM registration where userId = ".$_POST['sender'];
		if($result = $db->query($sql)){
			$obj = $result->fetch_object();
			$sender = $obj->fullName;
		}else{
			echo "Failed sender ".$sql ;
		}
		$sql = "select fullName FROM registration where userId = ".$_POST['receiver'];
		if($result = $db->query($sql)){
			$obj = $result->fetch_object();
			$receiver = $obj->fullName;
		}else{
			echo "Failed receiver ".$sql;
		}
		$result->close();
		echo "<h1>Sender: ".$sender." <-> Receiver: ".$receiver."<h1>";
		$_SESSION['rec_name'] = $receiver;
		$_SESSION['receiver'] = $_POST['receiver'];

	}


?>
