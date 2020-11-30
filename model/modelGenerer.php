<?php

function createCarte($nomCarte,$nomContrib, $prenomContrib, $connexion){
	
	$nomCarte = mysqli_real_escape_string($connexion, $nomCarte);
	$nomContrib = mysqli_real_escape_string($connexion, $nomContrib);
	$prenomContrib = mysqli_real_escape_string($connexion, $prenomContrib);
	// Verif si aucune carte existante avec ce nom
	$requete = "SELECT nomCarte FROM Carte WHERE nomCarte='".$nomCarte."'";
	$verif = mysqli_query($connexion, $requete);
	$message="";
	if($verif == FALSE || mysqli_num_rows($verif) == 0){
		$requete = "INSERT INTO Carte(nomCarte) VALUES ('".$nomCarte."')";
		$insertion = mysqli_query($connexion, $requete);
		if($insertion == FALSE) {
			$message = "Erreur lors de l'insertion de la carte $nomCarte.\n";
		}
	}
	else {
		$message = "Une carte existe déjà avec ce nom : $nomCarte.\n";
	}
	
	// Verif si contrib avec ce nom prenom existe, si non on en créé un
	// Contrib a faire génération de la carte
	$requete = "SELECT idContributrice FROM Contributrice WHERE nomContributrice='".$nomContrib."'AND prenomContributrice='".$prenomContrib."'";
	
	$idContrib = mysqli_query($connexion, $requete);
	if($idContrib == FALSE){
		$message = "Erreur pour le test des contributrices";
	}

	
	return $message;
}

function createContrib($nom, $prenom, $connexion){
	$nom = mysqli_real_escape_string($connexion, $nom);
	$prenom = mysqli_real_escape_string($connexion, $prenom);

	$requete = "SELECT COUNT(*) FROM contributeur_ice";
	$nb = mysqli_query($connexion, $requette);

	return $nb;

}








?>