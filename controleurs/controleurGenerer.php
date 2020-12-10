<?php
$message ="";


if(isset($_POST['boutonGenerer'])){
	$nomCarte = $_POST['nomCarte'];
	$prenom   = $_POST['prenomContrib'];
	$nom      =  $_POST['nomContrib'];
	initCarte($nomCarte, "description");
	createContrib($nom, $prenom, $nomCarte);
}



?>