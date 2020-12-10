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
function initContient_EV($instances, $idZone){
	$connexion = getConnexionBD();

	

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
function initOnTrouve_EF($instances, $idZone){
	$connexion = getConnexionBD();



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

function isEmptyAndEnoughtPlace($tab, $x, $y, $largeurElmt, $longueurElmt, $largeurZone, $longueurZone){

	// Verif si assez de place en largeur
	if($y+$largeurElmt > $largeurZone){
		return false;
	}
	// Verif si assez de place en longueur
	if($x+$longueurElmt > $longueurZone){
		return false;
	}

	// Verif si il n'y a pas deja un element
	for($i=$x; $i<$longueurElmt + $x; $i++){
		for($j=$y; $j<$largeurElmt + $y; $j++){
			if($tab[$i][$j]['nom']!=  " "){
				return false;
			}
		}
	}

	return true;
}


function setPosOnTrouve($x, $y, $idElement, $id){
	$connexion = getConnexionBD();

	$query = "UPDATE OnTrouve SET posX = ".$x." WHERE idElement = ".$idElement." AND idZone = ".$id;
	mysqli_query($connexion, $query);

	$query = "UPDATE OnTrouve SET posY = ".$y." WHERE idElement = ".$idElement." AND idZone = ".$id;
	mysqli_query($connexion, $query);
}


function setPosContient($x, $y, $idEtreVivant, $id){
	$connexion = getConnexionBD();

	$query = "UPDATE Contient SET posX = ".$x." WHERE idEtreVivant = ".$idEtreVivant." AND idZone = ".$id;
	mysqli_query($connexion, $query);

	$query = "UPDATE Contient SET posY = ".$y." WHERE idEtreVivant = ".$idEtreVivant." AND idZone = ".$id;
	mysqli_query($connexion, $query);
}





function placeElements($largeur, $longueur, $instances, $idZone){
	// Declaration d'un tableau de taille longueur x largeur
	$zone = array();

	for($i=0; $i<$longueur; $i++){
		$zone[$i] =  array();
		for($j=0; $j<$largeur; $j++){
			$zone[$i][$j] = array('type' => " ", 'nom' => " ");
		}
	}

	// Remplissage du tableau => coordonnée 0, 0 en haut à gauche
	foreach ($instances['Piege'] as $instance) {
		$long = $instance['zoneEffetLongueur'];
		$larg = $instance['zoneEffetLargeur'];
		$place = false;

		for($i=0; $i<$longueur; $i++){
			
			for($j=0; $j<$largeur; $j++){

				if(isEmptyAndEnoughtPlace($zone, $i, $j, $larg, $long, $largeur, $longueur) && !$place){
					$name = $instance['nomElement'];
					$id   = $instance['idElement'];

					setPosOnTrouve($i, $j, $id, $idZone);

					for($k=$i; $k<$long+$i; $k++){
						for($l=$j; $l<$larg+$j; $l++){
							$zone[$k][$l]['nom'] = $name;
							$zone[$k][$l]['type'] = 'Piege';
						}
					}
					$place = true;
				}
			}
		}	
	}


	foreach ($instances['Mobilier'] as $instance) {
		$long = $instance['longueur'];
		$larg = $instance['largeur'];
		$place = false;

		for($i=0; $i<$longueur; $i++){
			
			for($j=0; $j<$largeur; $j++){

				if(isEmptyAndEnoughtPlace($zone, $i, $j, $larg, $long, $largeur, $longueur) && !$place){
					$name = $instance['nomElement'];
					$id   = $instance['idElement'];

					setPosOnTrouve($i, $j, $id, $idZone);

					for($k=$i; $k<$long+$i; $k++){
						for($l=$j; $l<$larg+$j; $l++){
							$zone[$k][$l]['nom'] = $name;
							$zone[$k][$l]['type'] = 'Mobilier';
		
						}
					}
					$place = true;
				}
			}
		}	
	}


	foreach ($instances['Equipement'] as $instance) {
		$long = 1;
		$larg = 1;
		$place = false;

		for($i=0; $i<$longueur; $i++){
			
			for($j=0; $j<$largeur; $j++){

				if(isEmptyAndEnoughtPlace($zone, $i, $j, $larg, $long, $largeur, $longueur) && !$place){
					$name = $instance['nomElement'];
					$id   = $instance['idElement'];

					setPosOnTrouve($i, $j, $id, $idZone);

					for($k=$i; $k<$long+$i; $k++){
						for($l=$j; $l<$larg+$j; $l++){
							$zone[$k][$l]['nom'] = $name;
							$zone[$k][$l]['type'] = 'Equipement';
						
						}
					}
					$place = true;
				}
			}
		}	
	}


	foreach ($instances['Creature'] as $instance) {
		$long = 1;
		$larg = 1;
		$place = false;

		for($i=0; $i<$longueur; $i++){
			
			for($j=0; $j<$largeur; $j++){

				if(isEmptyAndEnoughtPlace($zone, $i, $j, $larg, $long, $largeur, $longueur) && !$place){
					$name = $instance['nomEtreVivant'];
					$id   = $instance['idEtreVivant'];

					setPosContient($i, $j, $id, $idZone);

					for($k=$i; $k<$long+$i; $k++){
						for($l=$j; $l<$larg+$j; $l++){
							$zone[$k][$l]['nom'] = $name;
							$zone[$k][$l]['type'] = 'Creature';
							
						}
					}
					$place = true;
				}
			}
		}	
	}

	foreach ($instances['PNJ'] as $instance) {
		$long = 1;
		$larg = 1;
		$place = false;

		for($i=0; $i<$longueur; $i++){
			
			for($j=0; $j<$largeur; $j++){

				if(isEmptyAndEnoughtPlace($zone, $i, $j, $larg, $long, $largeur, $longueur) && !$place){
					$name = $instance['nomEtreVivant'];
					$id   = $instance['idEtreVivant'];

					setPosContient($i, $j, $id, $idZone);

					for($k=$i; $k<$long+$i; $k++){
						for($l=$j; $l<$larg+$j; $l++){
							$zone[$k][$l]['nom'] = $name;
							$zone[$k][$l]['type'] = 'PNJ';
							
						}
					}
					$place = true;
				}
			}
		}	
	}

	return $zone;
}





function getCreatureZonePos($idZone, $x, $y){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Creature INNER JOIN Contient c ON idCreature = c.idEtreVivant INNER JOIN EtreVivant e ON idCreature = e.idEtreVivant WHERE idZone =".$idZone." AND posX = ".$x." AND posY =".$y;

	$res = mysqli_query($connexion, $query);

	if(mysqli_num_rows($res)!=0){
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	return NULL;
}

function getPNJZonePos($idZone, $x, $y){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM PNJ INNER JOIN Contient c ON idPNJ = c.idEtreVivant INNER JOIN EtreVivant e ON idPNJ = e.idEtreVivant WHERE idZone =".$idZone." AND posX = ".$x." AND posY =".$y;

	$res = mysqli_query($connexion, $query);

	if(mysqli_num_rows($res)!=0){
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	return NULL;
}


function getPiegeZonePos($idZone, $x, $y){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Piege INNER JOIN OnTrouve o ON idPiege = o.idElement INNER JOIN ElementFixe e ON idPiege = e.idElement WHERE idZone =".$idZone."   AND posX = ".$x." AND posY =".$y;

	$res = mysqli_query($connexion, $query);

	if(mysqli_num_rows($res)!=0){
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	return NULL;
}

function getMobilierZonePos($idZone, $x, $y){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Mobilier INNER JOIN OnTrouve o ON idMobilier = o.idElement INNER JOIN ElementFixe e ON idMobilier = e.idElement WHERE idZone =".$idZone."   AND posX = ".$x." AND posY =".$y;

	$res = mysqli_query($connexion, $query);

	if(mysqli_num_rows($res)!=0){
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	return NULL;
}

function getEquipementZonePos($idZone, $x, $y){
	$connexion = getConnexionBD();

	$query = "SELECT * FROM Equipement INNER JOIN OnTrouve o ON idEquipement = o.idElement INNER JOIN ElementFixe e ON idEquipement = e.idElement WHERE idZone =".$idZone."   AND posX = ".$x." AND posY =".$y;

	$res = mysqli_query($connexion, $query);

	if(mysqli_num_rows($res)!=0){
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	return NULL;
}


function createZoneInfoArray($idZone, $largeur, $longueur){

	// Initialisation du tableau vide
	for($i=0; $i < $longueur; $i++){
		for($j=0; $j < $largeur; $j++){
			$tab[$i][$j]['type']   = " ";
			$tab[$i][$j]['info'][] = " ";
		}
	}


	for($i=0; $i < $longueur; $i++){
		for($j=0; $j < $largeur; $j++){
			$res =getCreatureZonePos($idZone, $i, $j);
			if($res !=NULL){
				$res = $res[0];
				$tab[$i][$j]['type'] = "Creature";
				$tab[$i][$j]['info'] = $res;
			}

			$res =getPNJZonePos($idZone, $i, $j);
			if($res !=NULL){
				$res = $res[0];
				$tab[$i][$j]['type'] = "PNJ";
				$tab[$i][$j]['info'] = $res;
			}

			$res =getPiegeZonePos($idZone, $i, $j);
			if($res !=NULL){
				$res = $res[0];
				$tab[$i][$j]['type'] = "Piege";
				$tab[$i][$j]['info'] = $res;
				$long = $res['zoneEffetLongueur'];
				$larg = $res['zoneEffetLargeur'];

				for($k=$i; $k < $long + $i; $k++){
					for($l=$j; $l < $larg + $j; $l++){
						$tab[$k][$l]['type'] = "Piege";
						$tab[$k][$l]['info'] = $res;
					}
				}

			}

			$res =getMobilierZonePos($idZone, $i, $j);
			if($res !=NULL){
				$res = $res[0];
				$tab[$i][$j]['type'] = "Mobilier";
				$tab[$i][$j]['info'] = $res;
				$long = $res['longueur'];
				$larg = $res['largeur'];

				for($k=$i; $k < $long + $i; $k++){
					for($l=$j; $l < $larg + $j; $l++){
						$tab[$k][$l]['type'] = "Mobilier";
						$tab[$k][$l]['info'] = $res;
					}
				}
			}

			$res =getEquipementZonePos($idZone, $i, $j);
			if($res !=NULL){
				$res = $res[0];
				$tab[$i][$j]['type'] = "Equipement";
				$tab[$i][$j]['info'] = $res;
			}

			
		}
	}

	return $tab;

}









// Creation de carte 


function initCarte($nomCarte, $description){
	$message = "";

	$connexion = getConnexionBD();
	
	$nomCarte = mysqli_real_escape_string($connexion, $nomCarte);

	$query = "SELECT nomCarte FROM Carte WHERE nomCarte='".$nomCarte."'";

	$verif = mysqli_query($connexion, $query);

	if($verif == FALSE || mysqli_num_rows($verif)==0){
		$query = "INSERT INTO Carte(nomCarte, descriptionCarte) VALUES ('".$nomCarte."', '".$description."')";
		$insertion = mysqli_query($connexion, $query);
	}
	else{
		$message = "Une carte existe deja avec ce nom ! \n";
	}

	return $message;
}



function createContrib($nom, $prenom, $nomCarte){

	$connexion = getConnexionBD();

	$nom = mysqli_real_escape_string($connexion, $nom);
	$prenom = mysqli_real_escape_string($connexion, $prenom);
	$nomCarte = mysqli_real_escape_string($connexion, $nomCarte);

	$requete = "SELECT idContributrice FROM Contributrice WHERE nomContributrice = '".$nom."' AND prenomContributrice = '".$prenom."'";
	$verif = mysqli_query($connexion, $requete);

	if(mysqli_num_rows($verif)==0){
		$query = "INSERT INTO Contributrice(nomContributrice, prenomContributrice) VALUES ('".$nom."', '".$prenom."')";
		$insertion = mysqli_query($connexion, $query);
	}

	$requete = "SELECT idContributrice FROM Contributrice WHERE nomContributrice = '".$nom."' AND prenomContributrice = '".$prenom."'";
	$nb = mysqli_query($connexion, $requete);

	$id = mysqli_fetch_all($nb, MYSQLI_ASSOC);


	$query = "UPDATE Carte SET idCreateur = '".$id[0]['idContributrice']."' WHERE nomCarte = '".$nomCarte."'";

	mysqli_query($connexion, $query);
}


function initZoneCarte($largeur, $longueur, $environnement, $description, $x, $y, $nomCarte){
	$connexion = getConnexionBD();

	$description = mysqli_real_escape_string($connexion, $description);
	$environnement = mysqli_real_escape_string($connexion, $environnement);
	$nomCarte = mysqli_real_escape_string($connexion, $nomCarte);


	$query = "INSERT INTO Zone(descriptionZone, longueurZone, largeurZone, nomCarte, posZone_x, posZone_y, nomEnvironnement) VALUES ('".$description."', ".$longueur.", ".$largeur.", '".$nomCarte."', ".$x.", ".$y.", '".$environnement."')";

	$res = mysqli_query($connexion, $query);

	return $res;
}


function initLesZonesCarte($param){
	$connexion = getConnexionBD();

	$nbZone = rand($param['zone']['min'], $param['zone']['max']);
	
	$mod = round(sqrt($nbZone));
	$cmpt= 0;

	for($i=0; $i<$nbZone; $i++){
		if(fmod($i, $mod)==0 && $i!=0){
			$cmpt++;
		}
		$description = "zone_".$i;
		$sizeZone = rand($param['dimZone']['min'], $param['dimZone']['max']);
		initZoneCarte($sizeZone, $sizeZone, "Desert", $description, fmod($i, $mod), $cmpt, $param['nomCarte']);

		$idZone = getZoneID();
		$randInst = getInstancesForZone($param);

		initContient_EV($randInst, $idZone);
		initOnTrouve_EF($randInst, $idZone);

		placeElements($sizeZone, $sizeZone, $randInst, $idZone);

		
	}
}


function getZonePlacement($param, $x, $y){
	$connexion = getConnexionBD();

	$nomCarte = mysqli_real_escape_string($connexion, $param['nomCarte']);


	$query = "SELECT idZone FROM Zone WHERE nomCarte='".$nomCarte."' AND posZone_x =".$x." AND posZone_y = ".$y;

	$res = mysqli_query($connexion, $query);
	$id = mysqli_fetch_all($res, MYSQLI_ASSOC);

	if(mysqli_num_rows($res)!=0){
		return  $id[0]['idZone'];
	}
	return "";
}

function getMaxPos($param, $axe){
	$connexion = getConnexionBD();

	$nomCarte = mysqli_real_escape_string($connexion, $param['nomCarte']);

	if($axe != 'x' && $axe != 'y'){
		return;
	}


	$query = "SELECT MAX(posZone_".$axe.") FROM Zone WHERE nomCarte='".$nomCarte."'";

	$res = mysqli_query($connexion, $query);
	$id = mysqli_fetch_all($res);

	if(mysqli_num_rows($res)!=0){
		return  $id[0][0];
	}
	return $res;

}


function getDimZone($idZone){
	$connexion = getConnexionBD();

	$query = "SELECT largeurZone, longueurZone FROM Zone WHERE idZone = ".$idZone;

	$res = mysqli_query($connexion, $query);
	$size = mysqli_fetch_all($res, MYSQLI_ASSOC);

	return $size[0];
}






?>
