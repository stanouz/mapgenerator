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

	<main class="formGenerer">
		<form method="post" action="#">
			<label for="nomContrib">Nom : </label>
			<input type="text" name="nomContrib" id="nomContrib" placeholder="Saisir votre nom" required />
			<br/>

			<label for="prenomContrib">Prénom : </label>
			<input type="text" name="prenomContrib" id="prenomContrib" placeholder="Saisir votre prénom" required />
			<br/>

			<label for="nomCarte">Nom de la carte : </label>
			<input type="text" name="nomCarte" id="nomCarte" placeholder="Saisir le nom de la carte" required />
			<br/>
			<label for="descriptionCarte">Description de la carte : </label>
			<input type="text" name="descriptionCarte" id="descriptionCarte" placeholder="Description de la carte :" required />
			<br/>
			<label for="minZone">nombre minimal de zones à generer : </label>
			<input type="number" name="minZone" id="minZone" value="10" min="1" max="20" required />
			<br/>
			<label for="maxZone">nombre maximal de zones à generer : </label>
			<input type="number" name="maxZone" id="maxZone" value="10" min="1" max="20" required />
			<br/>
			<label for="dimMinZone">Dimensions minimale des zones : </label>
			<input type="number" name="dimMinZone" id="dimMinZone" value="5" min="1" max="20" required />
			<br/>

			<label for="dimMaxZone">Dimensions maximale des zones : </label>
			<input type="number" name="dimMaxZone" id="dimMaxZone" value="5" min="1" max="20" required />

			<br/>
			<label for="choixEnvironnementCarte">Choississiez les types d'environnement que vous souhaitez voir dans votre carte : </label>
			<br>
			<?php
<<<<<<< HEAD
			

			foreach ($environnements as $env) {

    			echo "<input type='checkbox' name='".$env[0]."'>".$env[0]."</input><br>";
=======
			$environnements = getAttribut("Environnement", "nomEnvironnement");

			foreach ($environnements as $env) {

    	echo "<input type='checkbox' name='".$env[0]."'>".$env[0]."</input><br>";
>>>>>>> d9b28af578544080dffe0c285df11510f397a639

			}

			?>
			<label for="nbMobilierMin">Nombre de mobiliers entre </label>
			<input id="nbElement" type="number" name="nbMobilierMin" value="1" min="1" max="20" required>
			<label for="nbMobilierMax"> et  </label>
			<input id="nbElement" type="number" name="nbMobilierMax" value="20" min="1" max="20" required>

			<br/>
			<br/>

			<label for="nbPiegeMin">Nombre de pièges entre </label>
			<input id="nbElement" type="number" name="nbPiegeMin" value="1" min="1" max="20" required>
			<label for="nbPiegeMax"> et  </label>
			<input id="nbElement" type="number" name="nbPiegeMax" value="20" min="1" max="20" required>

			<br/>
			<br/>

			<label for="nbEquipementMin">Nombre d'équipements entre </label>
			<input id="nbElement" type="number" name="nbEquipementMin" value="1" min="1" max="20" required>
			<label for="nbEquipementMax"> et  </label>
			<input id="nbElement" type="number" name="nbEquipementMax" value="20" min="1" max="20" required>


			<br/>
			<br/>

			<label for="nbCreatureMin">Nombre de créature entre </label>
			<input id="nbElement" type="number" name="nbCreatureMin" value="1" min="1" max="20" required>
			<label for="nbCreatureMax"> et  </label>
			<input id="nbElement" type="number" name="nbCreatureMax" value="20" min="1" max="20" required>

			<br/>
			<br/>

			<label for="nbPnjMin">Nombre de PNJ entre </label>
			<input id="nbElement" type="number" name="nbPnjMin" value="1" min="1" max="20" required>
			<label for="nbPnjMax"> et  </label>
			<input id="nbElement" type="number" name="nbPnjMax" value="20" min="1" max="20" required>
			<br>
			<br>
			<label for="listObjectif" name="listObjectif"> Type d'ojectif pour la carte : </label>
			<select id="listObjectif" name="listObjectif" required>
				<option value="equipement">Equipement</option>
				<option value="zone">Zone</option>
			</select>
			<br>

			<label for="nbMoyenZone">nombre moyen de zones reliées à une zones données : </label>
			<input type="number" name="nbMoyenzone" id="nbMoyenZone" value="4" min="1" max="4" required />
			<br>

			<label for="nbPassageSecret">Nombre de passage secret dans la carte : </label>
			<input type="number" name="nbPassageSecret" id="nbPassageSecret" value="1" min="0" max="10" required />


			<br/><br/>
			<input type="submit" name="boutonGenerer" value="Generer"/>
		</form>
<<<<<<< HEAD
		<p><?= $message ?></p>
=======
		<p><?= $message?></p>
>>>>>>> d9b28af578544080dffe0c285df11510f397a639
	</main>


	<?php include('static/footer.php'); ?>
</body>
</html>
