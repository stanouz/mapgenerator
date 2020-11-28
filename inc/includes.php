<?php 
$nomSite = "Jeu de rôle";
$baseline = "Générer une carte !";

// connexion à la BD, retourne un lien de connexion
function getConnexionBD() {
	$connexion = mysqli_connect(SERVEUR, UTILISATRICE, MOTDEPASSE, BDD);
	if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion) {
	mysqli_close($connexion);
}

/*
// execute une requette depuis un fichier sql
function exeRequetteFile($fichier){
	$requette = file_get_contents($fichier);
	$array = explode(";\n", $requette);
	$b = true;

	for($i=0; $i< count($array); $i++){
		$str = $array[$i];
		if($str != ' '){
			$str .= ';';
		}
	}
}


function executeSqlFile($file){
    $req = file_get_contents($file);
    $array = explode(PHP_EOL, $req);
    foreach ($array as $sql) {
        if ($sql != '') {
            Sql($sql);
        }
    }
 }
*/
?>