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




// Générer une zone


function getAttribut($nomTable, $nomAttribut){
	$connexion = getConnexionBD();

	$nomTable = mysqli_real_escape_string($connexion, $nomTable);
	$nomAttribut = mysqli_real_escape_string($connexion, $nomAttribut);

	$query = "SELECT ".$nomAttribut." FROM ".$nomTable;

	$res = mysqli_query($connexion, $query);


	return mysqli_fetch_all($res);
}


function initZone($param){
	$connexion = getConnexionBD();

	$description = mysqli_real_escape_string($connexion, $param['description']);
	$environnement = mysqli_real_escape_string($connexion, $param['environnement']);


	$query = "INSERT INTO Zone(descriptionZone, longueurZone, largeurZone, nomEnvironnement) VALUES ('".$description."', ".$param['longueurZone'].", ".$param['largeurZone'].", '".$environnement."')";

	$res = mysqli_query($connexion, $query);

	return $res;
}


// retourne $n instances aléatoire de la table

function getRandomMobilier($n){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Mobilier, ElementFixe WHERE idMobilier = idElement ORDER BY rand() LIMIT ".$n;

	$res = mysqli_query($connexion, $query);

	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getRandomPiege($n){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Piege, ElementFixe WHERE idPiege = idElement ORDER BY rand() LIMIT ".$n;

	$res = mysqli_query($connexion, $query);

	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getRandomEquip($n){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Equipement, ElementFixe WHERE idEquipement = idElement ORDER BY rand() LIMIT ".$n;

	$res = mysqli_query($connexion, $query);

	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getRandomCreature($n){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Creature, EtreVivant WHERE idCreature = idEtreVivant ORDER BY rand() LIMIT ".$n;

	$res = mysqli_query($connexion, $query);

	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getRandomPNJ($n){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM PNJ, EtreVivant WHERE idPNJ = idEtreVivant ORDER BY rand() LIMIT ".$n;

	$res = mysqli_query($connexion, $query);

	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

// selectionne des instances aléatoire en fonction des parametres saisie

function getInstancesForZone($param){
	$connexion = getConnexionBD();

	$nb = rand($param['mobilier']['min'], $param['mobilier']['max']);
	$mobilier = getRandomMobilier($nb);

	$nb = rand($param['piege']['min'], $param['piege']['max']);
	$piege = getRandomPiege($nb);

	$nb = rand($param['equipement']['min'], $param['equipement']['max']);
	$equip = getRandomEquip($nb);

	$nb = rand($param['creature']['min'], $param['creature']['max']);
	$creature = getRandomCreature($nb);

	$nb = rand($param['pnj']['min'], $param['pnj']['max']);
	$pnj = getRandomPNJ($nb);

	$res = array(
		'Mobilier'   => $mobilier,
		'Piege'      => $piege,
		'Equipement' => $equip,
		'Creature'   => $creature,
		'PNJ'        => $pnj
 	);

	return $res;
}



function getZoneID(){
	$connexion = getConnexionBD();

	$query = "SELECT MAX(idZone) FROM Zone";

	$res = mysqli_query($connexion, $query);
	$res = mysqli_fetch_assoc($res);
	foreach ($res as $id) {
		
		$res = $id;
	}

	return $id;
}

// Initialise la table Contient avec les EtreVivants selectionnés aléatoirement
// init seulement car on ne renseigne pas encore les positions
function initContient_EV($instances){
	$connexion = getConnexionBD();

	$idZone = getZoneID();

	foreach($instances['Creature'] as $IC){
		$query = "INSERT INTO Contient(idZone, idEtreVivant) VALUES (".$idZone.", ".$IC['idCreature'].")";
		$res = mysqli_query($connexion, $query);
	}

	foreach($instances['PNJ'] as $IP){
		$query = "INSERT INTO Contient(idZone, idEtreVivant) VALUES (".$idZone.", ".$IP['idPNJ'].")";
		$res = mysqli_query($connexion, $query);
	}

	
	return $res;
}




// Initialise la table OnTrouve avec les ElementFixe selectionnés aléatoirement
// init seulement car on ne renseigne pas encore les positions
function initOnTrouve_EF($instances){
	$connexion = getConnexionBD();

	$idZone = getZoneID();

	foreach($instances['Mobilier'] as $IM){
		$query = "INSERT INTO OnTrouve(idZone, idElement) VALUES (".$idZone.", ".$IM['idMobilier'].")";
		$res = mysqli_query($connexion, $query);
	}

	foreach($instances['Piege'] as $IPi){
		$query = "INSERT INTO OnTrouve(idZone, idElement) VALUES (".$idZone.", ".$IPi['idPiege'].")";
		$res = mysqli_query($connexion, $query);
	}

	foreach($instances['Equipement'] as $IE){
		$query = "INSERT INTO OnTrouve(idZone, idElement) VALUES (".$idZone.", ".$IE['idEquipement'].")";
		$res = mysqli_query($connexion, $query);
	}

	
	return $res;
}








// Creation de carte 



function createCarte($nomCarte,$nomContrib, $prenomContrib){
	$connexion = getConnexionBD();
	
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
