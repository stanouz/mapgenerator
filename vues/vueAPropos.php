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
		<form method="post" action="#" class="Apropos">

			<label for="listeTables"> Choisir une table : </label>
			<br/>
			<select id="listeTables" name="listeTables" class="listTables">
				<option value="">--Selectionner une table--</option>
				<?php 
					foreach ($tables as $table) {
						echo '<option value="'.$table[0].'">'.$table[0].'</option>';
					}
				?>


			</select>

			<br/>

			<label for="showInstance"> Ne pas afficher les instances de la table :</label>
			<input type="checkbox" id="showInstance" name="showInstance"/>

			<br/>

			<input type="submit" name="boutonAfficherInstance" value="Afficher" class="buttonShowTable"/>
			

		</form>
		<div class="tables">
			<p> <?= $nbInstance ?></p>
			
			
			
			
			<?php
				$table = getTable('Environnement');
				$attribut = listColums('Environnement');
					

					echo "<table>";
				
					echo "<tr>";
					foreach ($attribut as $att) {
						echo '<td class="nomColonne">'.$att[0].'</td>';
					}
					echo "</tr>";


					foreach ($table as $ligne) {
						echo "<tr>";
						foreach ($ligne as $case) {
							echo "<td>".$case."</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				
					
			?>
		
	
		</div>
		

	</main>

	<?php include('static/footer.php'); ?>
</body>
</html>