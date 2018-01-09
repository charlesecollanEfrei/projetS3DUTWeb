<?php
	session_start();
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');
	require_once('../controleurs/fonctions.php');
	require_once('../modeles/ficheLocalisationStage.php');

	if(empty($_POST['choixEtudiant'])){
		header('Location: ../vues/consulterListeStage.php');
	}

	else{

		$_SESSION['choixEtudiant'] = $_POST['choixEtudiant'];

		header('Location: ../vues/ficheCompteRendu.php');
	}


		$bd = new bd();
		$co = $bd->connexion();


		// ENSEIGNANT
		// On récupère l'id de l'enseignant
		$tuteurEnseignant = new utilisateurs($co, $_SESSION['identifiant']);
		$id_tuteurEnseignant = $tuteurEnseignant->getId();




		// ETUDIANT
		// On récupère l'id de l'étudiant
		$id_etudiant = $_POST['choixEtudiant'];




    // Ajout Tuteur Enseignant dans Fiche Localisation
    $ajoutTuteurEnseignant = new ficheLocalisationStage($co);
    $ajoutTuteurEnseignant->ajoutTuteurEnseignant($id_etudiant, $id_tuteurEnseignant);




    // Changement de rôle de l'enseignant
    $tuteurEnseignant->setRole(3);


		header('Location: ../vues/accueil.php');

		$bd->deconnexion();



?>
