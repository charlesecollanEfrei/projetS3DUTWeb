<?php
	session_start();
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');
	require_once('../modeles/entreprises.php');
	require_once('../modeles/ficheLocalisationStage.php');
	require_once('../controleurs/fonctions.php');


	if(empty($_POST['debutStage']) ||
		empty($_POST['finStage']) ||
		empty($_POST['nom']) ||
		empty($_POST['prenom']) ||
		empty($_POST['adresse']) ||
		empty($_POST['ville']) ||
		empty($_POST['codePostal']) ||
		empty($_POST['email']) ||
		empty($_POST['telephone']) ||
		empty($_POST['nomEnt']) ||
		empty($_POST['adresseEnt']) ||
		empty($_POST['villeEnt']) ||
		empty($_POST['codePostal']) ||
		empty($_POST['nomResponsable']) ||
		empty($_POST['prenomResponsable']) ||
		empty($_POST['emailResponsable']) ||
		empty($_POST['jourResponsable']) ||
		empty($_POST['emailAutre']) ||
		empty($_POST['sujetStage'])) {

		header('Location: ../vues/ficheLocalisation.php');
	}

	else{

		$message = "";
		$bd = new bd();
		$co = $bd->connexion();

		// ETUDIANT
		// On récupère l'id de l'étudiant
		$etudiant = new utilisateurs($co, $_SESSION['identifiant']);
		$id_etudiant = $etudiant->getId();





		// ENTREPRISE
		// On vérifie si l'entreprise n'est pas déjà dans la base de données
		$entreprise_exist = new entreprises($co, $_POST['nomEnt']);
		$ent_exist = $entreprise_exist->trouverNomEntreprise();

		// Creation de l'entreprise si l'entreprise n'est pas déjà dans la base de données
		if($ent_exist == false){
			$creation_entreprise = new entreprises($co, $_POST['nomEnt'], $_POST['adresseEnt'], $_POST['villeEnt'], $_POST['codePostal']);
		}
		// On récupère l'id de l'entreprise
		$entreprise = new entreprises($co, $_POST['nomEnt']);
		$id_entreprise = $entreprise->getId();




		// TUTEUR ENTREPRISE
		// Identifiant du tuteur d'entreprise
		$identifiant_te = strtolower($_POST['prenomResponsable']);
		$identifiant_te .= '.';
		$identifiant_te .= strtolower($_POST['nomResponsable']);

		// On vérifie si le tuteur d'entreprise n'est pas déjà dans la base de données
		$tuteurEntreprise_exist = new utilisateurs($co, $identifiant_te);
		$tuteurEnt_exist = $tuteurEntreprise_exist->trouverIdentifiantTuteur();

		// Création du tuteur d'entreprise
		if($tuteurEnt_exist == false){
			$creation_compte_tuteurEntreprise = new utilisateurs($co, $identifiant_te, "azerty", $_POST['nomResponsable'], $_POST['prenomResponsable'], NULL, $_POST['emailResponsable'], 2);
		}

		// On récupère l'id du tuteur d'entreprise
		$tuteurEntreprise = new utilisateurs($co, $identifiant_te);
		$id_tuteurEntreprise = $tuteurEntreprise->getId();




		// Fichier(s)
		$dossier = '../fichiers/';

		// Fichier 1
		if(isset($_FILES['fichier1'])) {
			$fichier1 = basename($_FILES['fichier1']['name']);
			move_uploaded_file($_FILES['fichier1']['tmp_name'], $dossier . $fichier1);
		}
		else{
			$fichier1 = NULL;
		}

		// Fichier 2
		if(isset($_FILES['fichier2'])) {
			$fichier2 = basename($_FILES['fichier2']['name']);
			move_uploaded_file($_FILES['fichier2']['tmp_name'], $dossier . $fichier2);
		}
		else{
			$fichier2 = NULL;
		}

		// Fichier 3
		if(isset($_FILES['fichier1'])) {
			$fichier3 = basename($_FILES['fichier3']['name']);
			move_uploaded_file($_FILES['fichier3']['tmp_name'], $dossier . $fichier3);
		}
		else{
			$fichier3 = NULL;
		}

		// Fichier 4
		if(isset($_FILES['fichier4'])) {
			$fichier4 = basename($_FILES['fichier4']['name']);
			move_uploaded_file($_FILES['fichier4']['tmp_name'], $dossier . $fichier4);
		}
		else{
			$fichier4 = NULL;
		}

		// Fichier 5
		if(isset($_FILES['fichier5'])) {
			$fichier5 = basename($_FILES['fichier5']['name']);
			move_uploaded_file($_FILES['fichier5']['tmp_name'], $dossier . $fichier5);
		}
		else{
			$fichier5 = NULL;
		}




		// FICHE LOCALISATION STAGE
		// Insertion dans la base de données de la fiche de localisation de stage
		$creation_ficheLocalisation = new ficheLocalisationStage($co, $id_etudiant, $id_entreprise, $id_tuteurEntreprise, 0, $_POST['debutStage'], $_POST['finStage'], $_POST['adresse'], $_POST['ville'], $_POST['codePostal'], $_POST['emailAutre'], $_POST['jourResponsable'], $_POST['sujetStage'], $fichier1, $fichier2, $fichier3, $fichier4, $fichier5);


		header('Location: ../vues/accueil.php');


		$bd->deconnexion();
	}


?>
