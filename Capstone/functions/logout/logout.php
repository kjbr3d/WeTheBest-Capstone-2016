<?php
function logout(){
	if(session_start()){

		require  "../connection/connect.php";



		// Unset all of the session variables.
		$_SESSION = array();
		//kill the session and delete all the session cookies.
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}

	    //destroy the session
		session_destroy();

		header("Location: index.php");
	}

}

?>
