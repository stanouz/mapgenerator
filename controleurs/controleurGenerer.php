<?php
$connexion = getConnexionBD();

if(isset($_POST['boutonGenerer'])){
	// on recuperer la valeur saisie dans le formulaire
	
	$message =createCarte($_POST['nomCarte'], $_POST['nomContrib'], $_POST['prenomContrib'], $connexion);

	
}



?>