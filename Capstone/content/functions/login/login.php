<?
function login() {
	require "../../../../../connection/connect.php";
	$sql = "SELECT password FROM Login WHERE username = ?";
		//echo $sql;	
	$stmt = $db->prepare($sql);
	if($stmt === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
	}
	$username = htmlspecialchars($_POST["name"]);
	//Binding the parameter
	if(!$stmt->bind_param('s', $username)){
		echo "parameter binding failed";
	}
	if(!$stmt->execute()){
		echo "query execution failed";
	}
	//Bind results to variables
	if(!$stmt->bind_result($userPassword)){
		echo"result binding failed";
	}

	$stmt -> fetch();

	$password = htmlspecialchars($_POST['password']);

	if( $password === $userPassword ) {
		return True;
	}else {
		return False;

	}
}

?>
