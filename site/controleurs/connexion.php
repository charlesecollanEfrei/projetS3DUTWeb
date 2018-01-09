<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');


	if(empty($_POST['identifiant']) || empty($_POST['mdp'])) {
		header('Location: ../vues/index.html');
	}
	else {
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];

		$bd = new bd();
		$co = $bd->connexion();

		$creation_compte = new utilisateurs($co, $identifiant);

		if ($creation_compte->verif_mdp($mdp)) {
			$creation_compte->connexion();
			header('Location: ../vues/accueil.php');
		}
		else {
			header('Location: ../vues/index.html');
		}

		$bd->deconnexion();
	}


?>
