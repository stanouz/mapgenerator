<?php


$connexion = getConnexionBD();
$msg = "";

if(isset($_POST['boutonAfficherInstance'])){

	if($_POST['listeTables']!=""){
		$nb = nombreInstancesTable($_POST['listeTables'], $connexion);

		if($nb == 0){
			$msg = "Aucune instance dans la table ".$_POST['listeTables'].".";
		}			
		else if ($nb == 1){
			$msg = "Il y a ".$nb." instance dans la table ".$_POST['listeTables'].".";
		}			
		else{
			$msg = "Il y a ".$nb." instances dans la table ".$_POST['listeTables'].".";
		}		
	}
}

	

?>