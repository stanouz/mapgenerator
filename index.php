<?php

session_start();

require('inc/constantes.php');
require('inc/includes.php');
require('inc/routes.php');

$controleur = $routes['accueil']['controleur'];
$vue = $routes['accueil']['vue'];
$model = $routes['accueil']['model'];

if(isset($_GET['page'])) {
	$nomPage = $_GET['page'];

	if(isset($routes[$nomPage])) {
		$controleur = $routes[$nomPage]['controleur'];
		$vue = $routes[$nomPage]['vue'];
		$model = $routes[$nomPage]['model'];	
	}
		
}

include('model/'. $model . '.php');
include('controleurs/' . $controleur . '.php');
include('vues/' . $vue . '.php');


?>