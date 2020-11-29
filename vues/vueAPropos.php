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
	
	<main>
		<form method="post" action="#">

			<label for="listeTables"> Choisir une table : </label>
			<input list="liste" id="listeTables" name="listeTables" />
			<datalist id="liste">
				<option value="Carte"/>
				<option value="Contient"/>
				<option value="Contributrice"/>
				<option value="Creature"/>
				<option value="ElementFixe"/>
				<option value="Environnement"/>
				<option value="EnvironnementSecondaire"/>
				<option value="Equipement"/>
				<option value="EtreVivant"/>
				<option value="GenererAPartir"/>
				<option value="Mobilier"/>
				<option value="Modifier"/>
				<option value="Objectif"/>
				<option value="ObjEquipement"/>
				<option value="ObjZone"/>
				<option value="OnTrouve"/>
				<option value="Parametre"/>
				<option value="PassageSecret"/>
				<option value="Piege"/>
				<option value="PNJ"/>
				<option value="RelierZones"/>
				<option value="Sauvegarde"/>
				<option value="Zone"/>
			</datalist>

			<br/>

			<label for="showInstance"> Afficher les instances des tables :</label>
			<input type="checkbox" id="showInstance" name="showInstance"/>

			<br/>

			<input type="submit" name="boutonAfficherInstance" value="Afficher"/>
		

		</form>
		<p><?= $msg ?></p>
		
		<?php 
			if(isset($_POST['boutonAfficherInstance'])){

				if($_POST['listeTables']!=""){
					if($_POST['showInstance']==TRUE){
						showTable($_POST['listeTables']);
					}
				}

				 
			}

		
		?>
		

	</main>

	<?php include('static/footer.php'); ?>
</body>
</html>