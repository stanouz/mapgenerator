<?php
$tables = listTables();

$connexion = getConnexionBD();
$nbInstance = "";


if(isset($_POST['boutonAfficherInstance'])){

	if($_POST['listeTables']!=""){
		$nb = nombreInstancesTable($_POST['listeTables']);

		if($nb == 0){
			$nbInstance = "Aucune instance dans la table ".$_POST['listeTables'].".";
		}			
		else if ($nb == 1){
			$nbInstance = "Il y a ".$nb." instance dans la table ".$_POST['listeTables'].".";
		}			
		else{
			$nbInstance = "Il y a ".$nb." instances dans la table ".$_POST['listeTables'].".";
		}		
	}
}
?>