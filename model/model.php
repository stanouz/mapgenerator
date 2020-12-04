<?php


// Affichage des données 

	
function nombreInstancesTable($nomTable)
{

	$connexion = getConnexionBD();

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

	return mysqli_fetch_all($res);
}

function listTables(){
	$connexion = getConnexionBD();
	
	$query = "SHOW TABLES";
	$res = mysqli_query($connexion, $query);
	return mysqli_fetch_all($res);
}



function getTable($nomTable){
	$connexion = getConnexionBD();
	
	$nomTable = mysqli_real_escape_string($connexion, $nomTable);
	
	$query = "SELECT * FROM ".$nomTable;
	$res = mysqli_query($connexion, $query);

	
	return mysqli_fetch_all($res);
}




// Creation de carte 



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
