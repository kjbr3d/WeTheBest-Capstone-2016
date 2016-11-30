<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!$_SESSION['logged_in']){
		//echo  $_SESSION['status'];
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head><!--Mark Vassell-->
		<title>Ajax Chat</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery libraries -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/JavaScript" src="functions/chat.js"></script>
		<script type = "text/JavaScript" src="functions/notifications.js"></script>
		<?php
				echo "<script type = \"text/JavaScript\">window.onload = get_notifications(".$_SESSION['current_user_id'].")</script>";

		?>
		<style type="text/css">
		.container{
			position: absolute;
			top: 17%;
			left: 10%;
			height: 100%;
			width: 82%;

			text-align: justify;
		}
		input#user{
			width: 100%;
		}
		input#chat_text{
			width: 100%;
		}



		#window{
			overflow: scroll;
		}
		#initial{
			text-align: center;
		}
		.list0{
			background-color: antiquewhite;
		}
		.list1{
			background-color: #88cbea;
		}

		</style>
	</head>
	<body onload="get_id(<?php echo $_SESSION['current_user_id'];?>,'id')">
		<?php include "nav.php"; ?>
		<div class="container">
	  		<div id = "primary">
				<div class = "row" id = "users"></div>
	  			<div class = "row">
					<div class = "col-md-1"></div>
		  			<div class="col-md-6" id = "window"></div>
			  	</div>
			  	<div class = "row" id = "form">
					<div class = "col-md-1"></div>
			    	<div class="col-md-4">
						<input type = "text" name = "chat_text" id = "chat_text" onkeypress = "if(event.keyCode == 13){chat_send();}">
					</div>
					<div class="col-md-2">
						<input type = "button" value = "send" id = "chat_send" onClick = "chat_send();" class="btn btn-info btn-md btn-block">
					</div>
					<div class="col-md-5"></div>
				</div>
	  		</div>
	  	</div>


	</body>
</html>
