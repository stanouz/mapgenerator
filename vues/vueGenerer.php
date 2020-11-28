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
	
	<div class="formGenerer">
		<form method="post" action="#">
			<label for="nomContrib">Nom : </label>
			<input type="text" name="nomContrib" id="nomContrib" placeholder="Saisir votre nom" required />
			<br/>
			<label for="prénomContrib">Prénom : </label>
			<input type="text" name="prénomContrib" id="prénomContrib" placeholder="Saisir votre prénom" required />
			<br/>
			<label for="nomCarte">Nom de la carte : </label>
			<input type="text" name="nomCarte" id="nomCarte" placeholder="Saisir le nom de la carte" required />
			
			<br/><br/>
			<input type="submit" name="boutonGenerer" value="Generer"/>
		</form>
		<p><?= $message?></p>
	</div>
    

	<?php include('static/footer.php'); ?>
</body>
</html>