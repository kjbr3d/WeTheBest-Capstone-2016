<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="/../jQuery/jquery-latest.js"></script>
		<script type="text/javascript" src="/../jQuery/jquery.tablesorter.js"></script>

		<script>
			$(document).ready(function() //Sort tables
			{
				$("#table1").tablesorter();
			}
			);
		</script>


		<title>Scholarship</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery libraries -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>

	<body>
		<div class="container">
	    	<div class = "row">
            	<div class="col-md-offset-3 col-md-6">
            		<h1>ConnectU | <small>Scholarship</small></h1>
            		<p>List of scholarships which best fit your academy career: </p>
                    <p>Click on one to get more detials.</p>
            	</div>
        	<div class = "col-md-4"></div>
    	</div>


<div id="table1">
	<table id="table1" class="tablesorter">
		<thead>
			<tr>
				<th>Sponsor</th>
				<th>Major</th>
			</tr>
		</thead>
		<tbody>
			<?php //get data from database
				require "/var/connection/connect.php";
				//$query = mysqli_query($con, "SELECT * FROM Scholarship");
				$sql = "SELECT * FROM Scholarship";
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($result))
				{
					/*
					echo '<tr>';
					echo '<td>'.$row['sponsor'].'</td>';
					echo '<td>'.$row['major'].'</td>';
					echo '</tr>';
					*/
                    //echo $row['link'];
					echo '<a href="'.$row['link'].'" target="_blank" class="list-group-item list-group-item-action">';
	    		    echo '<h5 class="list-group-item-heading">Name of Scholarship: </h5><p>' .$row['name']. '</p>';
	    		    echo '<h5 class="list-group-item-heading">Description: </h5><p>'.$row['description']. '</p>';
	  			    echo '</a>';

				/*
				echo '<tr>';
				echo '<td>'.$row['sponsor'].'</td>';
				echo '<td>'.$row['major'].'</td>';
				echo '</tr>';
				*/
				}
			?>
		</tbody>
	</table>
</div>


	</body>

</html>
