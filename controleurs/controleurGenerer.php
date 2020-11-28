<?php
$connexion = getConnexionBD();

if(isset($_POST['boutonGenerer'])){
	// on recuperer la valeur saisie dans le formulaire
	
	createCarte($_POST['nomCarte'], $connexion);
	$message = createContrib($_POST['nomContrib'], $_POST['prenomContrib'], $connexion);
}



?>