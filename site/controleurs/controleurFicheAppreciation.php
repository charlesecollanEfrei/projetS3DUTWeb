<?php
	session_start();
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');
	require_once('../modeles/entreprises.php');
	require_once('../controleurs/fonctions.php');
	require_once('../modeles/ficheAppreciation.php');


	if(
		empty($_POST['niveauDeConnaissance']) ||
		empty($_POST['organisation']) ||
		empty($_POST['initiative']) ||
		empty($_POST['perseverance']) ||
		empty($_POST['efficacite']) ||
		empty($_POST['interetPorteAuTravail']) ||
		empty($_POST['presentation']) ||
		empty($_POST['ponctualite']) ||
		empty($_POST['assiduite']) ||
		empty($_POST['expression']) ||
		empty($_POST['sociabilite']) ||
		empty($_POST['communication']) ||
		empty($_POST['nomRH']) ||
		empty($_POST['mailRH']) ||
		empty($_POST['telRH']) ||
		empty($_POST['nomTaxeApprenti']) ||
		empty($_POST['mailTaxeApprenti']) ||
		empty($_POST['telTaxeApprenti']) ||
		empty($_POST['nomRelationsEcoles']) ||
		empty($_POST['mailRelationsEcoles']) ||
		empty($_POST['telRelationsEcoles']) ||
		empty($_POST['embauche']) ||
		empty($_POST['embauchePourquoi']) ||
		empty($_POST['presentSoutenance'])
		) {

		header('Location: ../vues/ficheAppreciation.php');
	}

	else{

		$bd = new bd();
		$co = $bd->connexion();


		// TUTEUR ENTREPRISE
		// On récupère l'id du tuteur d'entreprise
		$tuteurEntreprise = new utilisateurs($co, $_SESSION['identifiant']);
		$id_tuteurEntreprise = $tuteurEntreprise->getId();




		// ETUDIANT
		// On récupère l'id de l'étudiant
		$id_etudiant = $_POST['idEtudiant'];




		// ENTREPRISE
		$ficheLocalisationStage = new ficheLocalisationStage($co, $id_etudiant);
		$id_entreprise =  $ficheLocalisationStage->getIdEntreprise();




		// FICHE APPRECIATION
		// Insertion dans la base de données de la fiche de l'avis de stage
		$creation_ficheAppreciation = new ficheAppreciation($co,
		$id_etudiant,
		$id_entreprise,
		$id_tuteurEntreprise,
		$_POST['niveauDeConnaissance'],
		$_POST['organisation'],
		$_POST['initiative'],
		$_POST['perseverance'],
		$_POST['efficacite'],
		$_POST['interetPorteAuTravail'],
		$_POST['presentation'],
		$_POST['ponctualite'],
		$_POST['assiduite'],
		$_POST['expression'],
		$_POST['sociabilite'],
		$_POST['communication'],
		$_POST['nomRH'],
		$_POST['mailRH'],
		$_POST['telRH'],
		$_POST['nomTaxeApprenti'],
		$_POST['mailTaxeApprenti'],
		$_POST['telTaxeApprenti'],
		$_POST['nomRelationsEcoles'],
		$_POST['mailRelationsEcoles'],
		$_POST['telRelationsEcoles'],
		$_POST['embauche'],
		$_POST['embauchePourquoi'],
		$_POST['presentSoutenance']
		);

		header('Location: ../vues/accueil.php');

		$bd->deconnexion();
	}


?>
