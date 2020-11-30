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
				<?php 
					$tables = listTables();
					while($table = mysqli_fetch_assoc($tables)){
						echo '<option value="'.$table["Tables_in_p1909886"].'" />';
					}
				?>



			</datalist>

			<br/>

			<label for="showInstance"> Afficher les instances des tables :</label>
			<input type="checkbox" id="showInstance" name="showInstance"/>

			<br/>

			<input type="submit" name="boutonAfficherInstance" value="Afficher"/>
			

		</form>
		<p> <?= $msg ?></p>
		
		
		<?php 
			
			if(isset($_POST['boutonAfficherInstance'])){
				
				if($_POST['listeTables']!=""){
					if(isset($_POST['showInstance']) && $nb!=0){
						if($_POST['showInstance']==TRUE){
							showTable($_POST['listeTables']);
						}
					}
				}

				 
			}

		
		?>
		

	</main>

	<?php include('static/footer.php'); ?>
</body>
</html>