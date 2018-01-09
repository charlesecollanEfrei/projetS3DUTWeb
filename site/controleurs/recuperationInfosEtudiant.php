<?php		
	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');

	$identifiant = $_SESSION['identifiant'];

	$bd = new bd();
	$co = $bd->connexion();

	$creation_compte = new utilisateurs($co, $identifiant);

	$nom = $creation_compte->getNom();
	$prenom = $creation_compte->getPrenom();
	$telephone = $creation_compte->getTelephone();
	$email = $creation_compte->getEmail();

	$bd->deconnexion();
			
?>
