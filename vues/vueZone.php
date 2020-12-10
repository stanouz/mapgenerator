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

			<label for="descriptionZone">Description de la zone : </label>
			<input type="text" name="descriptionZone" id="descriptionZone" placeholder="Saisir une description" required />

			<br/>
			<br/>

			<label for="largeur">Largeur de la zone :</label>
			<input id="largeur" type="number" name="largeur" value="20" min="10" max="50" required>

			<br/>
			<br/>

			<label for="longueur">Longueur de la zone :</label>
			<input id="longueur" type="number" name="longueur" value="20" min="10" max="50" required>

			<br/>
			<br/>

			<label for="listEnvironnement">Environnement :</label>
			<select id="listEnvironnement" name="listEnvironnement" required>
				<option value="">--Selectionner un environnement--</option>
				<?php 
					foreach ($environnements as $env) {
						echo '<option value="'.$env[0].'">'.$env[0].'</option>';
					}
				?>

			</select>

			<br/>
			<br/>

			<label for="nbMobilierMin">Nombre de mobiliers entre </label>
			<input id="nbElement" type="number" name="nbMobilierMin" value="10" min="1" max="20" required>
			<label for="nbMobilierMax"> et  </label>
			<input id="nbElement" type="number" name="nbMobilierMax" value="20" min="1" max="20" required>

			<br/>
			<br/>

			<label for="nbPiegeMin">Nombre de pièges entre </label>
			<input id="nbElement" type="number" name="nbPiegeMin" value="10" min="1" max="20" required>
			<label for="nbPiegeMax"> et  </label>
			<input id="nbElement" type="number" name="nbPiegeMax" value="20" min="1" max="20" required>

			<br/>
			<br/>

			<label for="nbEquipementMin">Nombre d'équipements entre </label>
			<input id="nbElement" type="number" name="nbEquipementMin" value="10" min="1" max="20" required>
			<label for="nbEquipementMax"> et  </label>
			<input id="nbElement" type="number" name="nbEquipementMax" value="20" min="1" max="20" required>


			<br/>
			<br/>

			<label for="nbCreatureMin">Nombre de créature entre </label>
			<input id="nbElement" type="number" name="nbCreatureMin" value="10" min="1" max="20" required>
			<label for="nbCreatureMax"> et  </label>
			<input id="nbElement" type="number" name="nbCreatureMax" value="20" min="1" max="20" required>

			<br/>
			<br/>

			<label for="nbPnjMin">Nombre de PNJ entre </label>
			<input id="nbElement" type="number" name="nbPnjMin" value="10" min="1" max="20" required>
			<label for="nbPnjMax"> et  </label>
			<input id="nbElement" type="number" name="nbPnjMax" value="20" min="1" max="20" required>


			<br/>
			<br/>
			<br/>
			<input type="submit" name="boutonGenererZone" value="Generer"/>
			<br/>
			<br/>

		</form>

		<div class="tables">
			<?php 

			





			if(isset($_POST['boutonGenererZone'])){
				

				echo "<table class='zone'>";
				foreach($zone as $ligne){
					echo "<tr>";
					foreach($ligne as $case){
						echo "<td class='zone' style='background-color: ".$colors[$case['type']]." ' >".$case['nom']."</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}	






			?>
		</div>
	</main>
	

    

	<?php include('static/footer.php'); ?>
</body>
</html>























