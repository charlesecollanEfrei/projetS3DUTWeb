<?php
	session_start();
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');
	require_once('../modeles/disponibilites.php');
	require_once('../controleurs/fonctions.php');

		$bd = new bd();
		$co = $bd->connexion();

		// ETUDIANT
		// On récupère l'id de l'étudiant
		$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
		$id_utilisateur = $utilisateurs->getId();




	  // DISPONIBILITES
		// Insertion dans la base de données des disponibilites
		$creation_disponibilites = new disponibilites($co, $id_utilisateur, $_POST['dj1'], $_POST['dj2'], $_POST['dj3'], $_POST['dj4']);

    header('Location: ../vues/accueil.php');

		$bd->deconnexion();


?>
