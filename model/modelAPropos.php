<?php




	
function nombreInstancesTable($nomTable, $connexion)
{
	$nomTable = mysqli_real_escape_string($connexion, $nomTable);
	$query = "SELECT COUNT(*) AS nb FROM ".$nomTable;

	$res = mysqli_query($connexion, $query);
	if($res == TRUE){
		$nb = mysqli_fetch_assoc($res);
	}
	return $nb['nb'];
}


function listColums($nomTable){
	$connexion = getConnexionBD();

	$query = "SHOW COLUMNS FROM ".$nomTable;

	$res = mysqli_query($connexion, $query);

	return $res;
}




function showTable($nomTable){
	$connexion = getConnexionBD();
	

	$column = listColums($nomTable);


	$query = "SELECT * FROM ".$nomTable;
	$res = mysqli_query($connexion, $query);

	if($res == FALSE){
		echo "<p> probleme</p>";
	}
	else{
		echo "<table>";

		echo "<tr>";
		while($row = mysqli_fetch_assoc($column)){
			echo "<td>".$row["Field"]."</td>";
		}
		echo "</tr>";

		while($ligne = mysqli_fetch_assoc($res)){
			echo "<tr>";

			$column = listColums($nomTable);
			while($row = mysqli_fetch_assoc($column)){
				$attribut = $row["Field"];
				echo "<td>".$ligne[$attribut]."</td>";
			}

			echo "</tr>";
		}
		echo "</table>";
	}
	
}

?>