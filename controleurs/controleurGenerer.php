<?php
$message ="";
$environnements = getAttribut("Environnement", "nomEnvironnement");

// Definition des couleurs pour chaque type d'élements
$colors = array(
				"Creature"   => "#EC7063",
				"PNJ"        => "#5499C7",
				"Mobilier"   => "#F0B27A",
				"Piege"      => "#99A3A4",
				"Equipement" => "#A9DFBF",
				" "          => "#F2F4F4"
);

// Creer un tableau avec les parametre du formulaire
function getParametreCarte(){
	$param = array(
		'nomCarte'        => $_POST['nomCarte'],
		'nom'	          => $_POST['nomContrib'],
		'prenom'          => $_POST['prenomContrib'],
		'description'     => $_POST['descriptionCarte'],
		'nbMoyenZone'     => $_POST['nbMoyenzone'],
		'nbPassageSecret' => $_POST['nbPassageSecret'], 
		'objectif'        => $_POST['listObjectif'],

  
		'zone'            => array('min' => $_POST['minZone'], 'max' => $_POST['maxZone']),

		'dimZone'         => array('min' => $_POST['dimMinZone'], 'max' => $_POST['dimMaxZone']),

		'mobilier'        => array('min' => $_POST['nbMobilierMin'], 'max' => $_POST['nbMobilierMax']),

		'mobilier'        => array('min' => $_POST['nbMobilierMin'], 'max' => $_POST['nbMobilierMax']),

		'piege'           => array('min' => $_POST['nbPiegeMin'], 'max' => $_POST['nbPiegeMax']),

		'equipement'      => array('min' => $_POST['nbEquipementMin'], 'max' => $_POST['nbEquipementMax']),

		'creature'        => array('min' => $_POST['nbCreatureMin'], 'max' => $_POST['nbCreatureMax']),

		'pnj'             => array('min' => $_POST['nbPnjMin'], 'max' => $_POST['nbPnjMax'])



	);

	return $param;
}

// Réordonne les intervalles si min > max
function checkMinMax(){
	$param = getParametreCarte();

	if( $param['zone']['min'] > $param['zone']['max']){
		$tmp = $param['zone']['min'];
		$param['zone']['min'] = $param['zone']['max'];
		$param['zone']['max'] = $tmp;
	}

	if( $param['dimZone']['min'] > $param['dimZone']['max']){
		$tmp = $param['dimZone']['min'];
		$param['dimZone']['min'] = $param['dimZone']['max'];
		$param['dimZone']['max'] = $tmp;
	}

	if( $param['mobilier']['min'] > $param['mobilier']['max']){
		$tmp = $param['mobilier']['min'];
		$param['mobilier']['min'] = $param['mobilier']['max'];
		$param['mobilier']['max'] = $tmp;
	}

	if( $param['piege']['min'] > $param['piege']['max']){
		$tmp = $param['piege']['min'];
		$param['piege']['min'] = $param['piege']['max'];
		$param['piege']['max'] = $tmp;
	}

	if( $param['equipement']['min'] > $param['equipement']['max']){
		$tmp = $param['equipement']['min'];
		$param['equipement']['min'] = $param['equipement']['max'];
		$param['equipement']['max'] = $tmp;
	}

	if( $param['creature']['min'] > $param['creature']['max']){
		$tmp = $param['creature']['min'];
		$param['creature']['min'] = $param['creature']['max'];
		$param['creature']['max'] = $tmp;
	}

	if( $param['pnj']['min'] > $param['pnj']['max']){
		$tmp = $param['pnj']['min'];
		$param['pnj']['min'] = $param['pnj']['max'];
		$param['pnj']['max'] = $tmp;
	}

	return $param;
}




if(isset($_POST['boutonGenerer'])){

	$param = checkMinMax();

	$message = initCarte($param['nomCarte'], $param['description']);
	createContrib($param['nom'], $param['prenom'], $param['nomCarte']);
	
	

	initLesZonesCarte($param);
	
	$maxX = getMaxPos($param, 'x');
	$maxY = getMaxPos($param, 'y');

}



?>