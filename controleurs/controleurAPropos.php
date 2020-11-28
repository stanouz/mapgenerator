<?php
	$connexion = getConnexionBD();
	

	$requette = "SELECT COUNT(idCreature) AS nbC FROM creature";
	$requette2=	 "SELECT COUNT(nomEnvironnement) AS nbE FROM Environnement";
	$res = mysqli_query($connexion, $requette);
	$res2 = mysqli_query($connexion, $requette2);
	if($res == FALSE){
		$msg = "Probleme lors de la lecture des données !";
	}
	else {
		$msg = "Notre base de données contient :";
		$nb = mysqli_fetch_assoc($res);
		$nb2 = mysqli_fetch_assoc($res2);
		$nbC = $nb['nbC']." créatures";
		$nbE = $nb2['nbE']." environnements";

	}

?>