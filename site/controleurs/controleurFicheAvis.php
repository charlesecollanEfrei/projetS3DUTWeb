<?php
	session_start();
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');
	require_once('../modeles/entreprises.php');
	require_once('../modeles/ficheAvis.php');
	require_once('../controleurs/fonctions.php');
	require_once('../modeles/ficheLocalisationStage.php');


	if(empty($_POST['stageRemunere']) ||
		empty($_POST['encadreInfo']) ||
		empty($_POST['appelInfo']) ||
		empty($_POST['travaillerSeul']) ||
		empty($_POST['typeMateriel']) ||
		empty($_POST['systeme']) ||
		empty($_POST['langages']) ||
		empty($_POST['objetStage']) ||
		empty($_POST['conditions']) ||
		empty($_POST['objectif']) ||
		empty($_POST['matiere']) ||
		empty($_POST['apportStage'])) {

		header('Location: ../vues/ficheAvis.php');
	}

	else{

		$bd = new bd();
		$co = $bd->connexion();

		// NE PAS OUBLIE DE FAIRE LES CHEKBOXS

		// ETUDIANT
		// On récupère l'id de l'étudiant
		$etudiant = new utilisateurs($co, $_SESSION['identifiant']);
		$id_etudiant = $etudiant->getId();





		// On récupère l'id de l'entreprise et du tuteur correspondant au stage de l'étudiant
		$ficheLocalisationStage = new ficheLocalisationStage($co, $id_etudiant);
		$id_entreprise =  $ficheLocalisationStage->getIdEntreprise();
		$id_tuteurEntreprise =  $ficheLocalisationStage->getIdTuteurEntreprise();




		// FICHE AVIS DE STAGE
		// Insertion dans la base de données de la fiche de l'avis de stage
		$creation_ficheAvis = new ficheAvis($co, $id_etudiant, $id_entreprise, $id_tuteurEntreprise, $_POST['remuneration'], $_POST['encadreInfo'], $_POST['appelInfo'], $_POST['tailleEquipe'], $_POST['typeMateriel'], $_POST['systeme'], $_POST['langages'], $_POST['objetStage'], $_POST['conditions'], $_POST['conditionsPourquoi'],
		$_POST['objectif'], $_POST['objectifPourquoi'], $_POST['matiere'], $_POST['matiereListe'], $_POST['apportStage']);
		header('Location: ../vues/accueil.php');

		$bd->deconnexion();
	}


?>
