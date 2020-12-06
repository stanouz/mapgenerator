<?php

$environnements = getAttribut("Environnement", "nomEnvironnement");


function getParametres(){

	$liste = array(
		'mobilier' => array('min' => $_POST['nbMobilierMin'], 'max' => $_POST['nbMobilierMax']),

		'piege' => array('min' => $_POST['nbPiegeMin'], 'max' => $_POST['nbPiegeMax']),

		'equipement' => array('min' => $_POST['nbEquipementMin'], 'max' => $_POST['nbEquipementMax']),

		'creature' => array('min' => $_POST['nbCreatureMin'], 'max' => $_POST['nbCreatureMax']),

		'pnj' => array('min' => $_POST['nbPnjMin'], 'max' => $_POST['nbPnjMax']),

		'longueurZone'  => $_POST['longueur'],
		'largeurZone'   => $_POST['largeur'],
		'description'   => $_POST['descriptionZone'],
		'environnement' => $_POST['listEnvironnement']
	);



	return $liste;
}


function checkMinMax(){
	$param = getParametres();

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


if(isset($_POST['boutonGenererZone'])){
	$param = checkMinMax();
	initZone($param);
}







?>