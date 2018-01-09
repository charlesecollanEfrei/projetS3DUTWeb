<?php
	session_start();
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);



	if(empty($_POST['choixEtudiant'])){
		header('Location: ../vues/choixEtudiantFicheAppriciation.php');
	}

	else{

		$_SESSION['choixEtudiant'] = $_POST['choixEtudiant'];

		header('Location: ../vues/ficheCompteRendu.php');
	}


?>
