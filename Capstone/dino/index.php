<?php
	$dinoID = empty($_GET['dinoID']) ? 'index' : strtolower($_GET['dinoID']);
	$appData = json_decode(file_get_contents('appData.json'), true);

	$dino = empty($appData['dinosaurs'][$dinoID]) ? null : $appData['dinosaurs'][$dinoID];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dinosaur App</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<style>
            body {
                text-align: center;
            }
            p, .list-group {
                width: 450px;
                margin: 0 auto;
            }
            img {
                margin-top: 15px;
                margin-bottom: 100px;
                width: 450px;
            }
		</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php if ($dinoID == 'index') { ?>
		<h1><?php print $appData['appTitle']; ?></h1>
		<ul class="list-group">
			<?php foreach ($appData['dinosaurs'] as $k => $v) { ?>
			<li class="list-group-item">
				<a href="<?php print $k; ?>"><?php print $v['name']; ?></a>
			</li>
			<?php } ?>
		</ul>
		<?php } else { ?>
		<h1><?php print $dino['name']; ?></h1>
		<p><?php print $dino['desc']; ?></p>
		<img src="<?php print $appData['imageBasePath'] . $dino['img']; ?>">
		<?php } ?>
	</body>
</html>
