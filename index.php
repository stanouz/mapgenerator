<?php

// BAGNOL Stanislas p1909886
// OURRED Lyes      p1809902 


session_start();

require('inc/constantes.php');
require('inc/includes.php');
require('inc/routes.php');

$controleur = $routes['accueil']['controleur'];
$vue = $routes['accueil']['vue'];


if(isset($_GET['page'])) {
	$nomPage = $_GET['page'];

	if(isset($routes[$nomPage])) {
		$controleur = $routes[$nomPage]['controleur'];
		$vue = $routes[$nomPage]['vue'];

	}
		
}

include('model/model.php');
include('controleurs/' . $controleur . '.php');
include('vues/' . $vue . '.php');


?>