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
		<main>	

			<h1>10 catégories de Creature les plus utilisé dans les zones</h1>
			<table class = "Afficher">
				<tr class = "Afficher">
					<td class = "nomColonne">Nombre d'apparition</td>
					<td class = "nomColonne">Nom de la catégorie</td>
				</tr>
				<?php
				foreach($mostUseCategorie as $ligne){
					echo "<tr class = 'Afficher'>";
					foreach($ligne as $case){
						echo "<td class = 'Afficher'>".$case."</td>";
					}
					echo "</tr>";
				}

				?>
			</table>

			<h1>5 id des zones avec le plus de piège</h1>
			<table class = "Afficher">
				<tr class = "Afficher">
					<td class = "nomColonne">Nombre de piège</td>
					<td class = "nomColonne">Id de la zone</td>
				</tr>
				<?php
				foreach($piege as $ligne){
					echo "<tr class = 'Afficher'>";
					foreach($ligne as $case){
						echo "<td class = 'Afficher'>".$case."</td>";
					}
					echo "</tr>";
				}

				?>
			</table>

			<h1>10 moyennes les plus hautes de point de vie par catégorie d'EtreVivant</h1>
			<table class = "Afficher">
				<tr class = "Afficher">
					<td class = "nomColonne">Moyenne des points de vie</td>
					<td class = "nomColonne">Nom de la catégorie</td>
				</tr>
				<?php
				foreach($avgVie as $ligne){
					echo "<tr class = 'Afficher'>";
					foreach($ligne as $case){
						echo "<td class = 'Afficher'>".$case."</td>";
					}
					echo "</tr>";
				}

				?>
			</table>

			<h1>5 cartes avec la plus grande superficie</h1>
			<table class = "Afficher">
				<tr class = "Afficher">
					<td class = "nomColonne">Nom de la carte</td>
					<td class = "nomColonne">Superficie</td>
				</tr>
				<?php
				foreach($size as $ligne){
					echo "<tr class = 'Afficher'>";
					foreach($ligne as $case){
						echo "<td class = 'Afficher'>".$case."</td>";
					}
					echo "</tr>";
				}

				?>
			</table>

			<h1>5 Contributrice ayant créé le plus de Carte</h1>
			<table class = "Afficher">
				<tr class = "Afficher">
					<td class = "nomColonne">Nombre de Carte créé</td>
					<td class = "nomColonne">Nom contributrice</td>
					<td class = "nomColonne">Prenom contributrice</td>
				</tr>
				<?php
				foreach($contrib as $ligne){
					echo "<tr class = 'Afficher'>";
					foreach($ligne as $case){
						echo "<td class = 'Afficher'>".$case."</td>";
					}
					echo "</tr>";
				}

				?>
			</table>
			 




			
		</main>
	</div>

    

	<?php include('static/footer.php'); ?>
</body>
</html>