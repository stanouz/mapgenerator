<?php

function createCarte($nomCarte, $connexion){
		
	$nomCarte = mysqli_real_escape_string($connexion, $nomCarte);

	$requete = "SELECT nomCarte FROM carte WHERE nomCarte='".$nomCarte."'";

	// On verifie qu'aucune carte n'a ce nom car clé primaire
	$verif = mysqli_query($connexion, $requete);

	if($verif == FALSE || mysqli_num_rows($verif) == 0){
		$requete = "INSERT INTO carte(nomCarte, dateCreationCarte) VALUES ('".$nomCarte."', CURDATE())";
		// on insert le nom dans la table
		$insertion = mysqli_query($connexion, $requete);
		if($insertion == FALSE) {
			$message = "Erreur lors de l'insertion de la carte $nomCarte.";
		}
	}
	else {
		$message = "Une carte existe déjà avec ce nom ($nomCarte).";
	}
	
	return $message;
}
/*
function createContrib($nom, $prenom, $connexion){
	$nom = mysqli_real_escape_string($connexion, $nom);
	$prenom = mysqli_real_escape_string($connexion, $prenom);

	$requete = "SELECT COUNT(*) FROM contributeur_ice";
	$nb = mysqli_query($connexion, $requette);

	return $nb;
*/
}








?>