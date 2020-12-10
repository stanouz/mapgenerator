<?php
$message ="";
$environnements = getAttribut("Environnement", "nomEnvironnement");


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




if(isset($_POST['boutonGenerer'])){

	$param = getParametreCarte();

	$message = initCarte($param['nomCarte'], $param['description']);
	createContrib($param['nom'], $param['prenom'], $param['nomCarte']);
	
	

	initLesZonesCarte($param);
	
	$maxX = getMaxPos($param, 'x');
	$maxY = getMaxPos($param, 'y');

	

}



?>