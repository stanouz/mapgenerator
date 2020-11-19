<?php

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

include('controleurs/' . $controleur . '.php');
include('vues/' . $vue . '.php');

?>