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
	

	<form method="post" action="#">

		<label for="descriptionZone">Description de la zone : </label>
		<br/>
		<input type="text" name="descriptionZone" id="descriptionZone" placeholder="Saisir une description" required />


		<label for="largeur">Largeur :</label>
		<input id="largeur" type="number" name="largeur" value="0" min="0" max="10">

	</form>





	<div id="divCentral">
		<main>
			<h1> ZONE </h1>
			
		</main>
	</div>

    

	<?php include('static/footer.php'); ?>
</body>
</html>