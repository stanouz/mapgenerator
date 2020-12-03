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
					$tables = listTables();
					while($table = mysqli_fetch_assoc($tables)){
						echo '<option value="'.$table["Tables_in_p1909886"].'">'.$table["Tables_in_p1909886"].'</option>';
					}
				?>


			</select>

			<br/>

			<label for="showInstance"> Afficher les instances de la table :</label>
			<input type="checkbox" id="showInstance" name="showInstance"/>

			<br/>

			<input type="submit" name="boutonAfficherInstance" value="Afficher" class="buttonShowTable"/>
			

		</form>
		<div class="tables">
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
		</div>
		

	</main>

	<?php include('static/footer.php'); ?>
</body>
</html>