<!DOCTYPE html>
<html>
<head>
	<title><?= $nomSite ?></title>
	<meta charset="utf-8" />
	<link href="css/style.css" rel="stylesheet" media="all" type="text/css">
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
</head>
<body>
	<?php include('static/header.php'); ?>

	<div id="divCentral">
		<!-- <?php include('static/menu.php'); ?> -->
		<main>
			<ul>
				<li>Dans ce site web, vous pouvez génerer des carte de jeu de rôle !</li>
			</ul>
			<a href="index.php?page=generer" class="centered">
				<img src="img/exemple.jpg" >
			</a>
		</main>
	</div>

    

	<?php include('static/footer.php'); ?>
</body>
</html>