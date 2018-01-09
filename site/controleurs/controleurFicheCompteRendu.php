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


	if(empty($_POST['lieuStage']) ||
		empty($_POST['nomRH']) ||
		empty($_POST['mailRH']) ||
		empty($_POST['telRH']) ||
		empty($_POST['nomTaxeApprenti']) ||
		empty($_POST['mailTaxeApprenti']) ||
		empty($_POST['telTaxeApprenti']) ||
		empty($_POST['encadreInfo']) ||
		empty($_POST['travail']) ||
		empty($_POST['commentaires']) ||
		empty($_POST['matiere']) ||
		empty($_POST['avisGeneral']) ||
		empty($_POST['accueillir'])) {

		header('Location: ../vues/ficheCompteRendu.php');
	}

	else{

		$bd = new bd();
		$co = $bd->connexion();


		// TUTEUR ENSEIGNANT
		// On récupère l'id du tuteur d'enseignant
		$tuteurEnseignant = new utilisateurs($co, $_SESSION['identifiant']);
		$id_tuteurEnseignant = $tuteurEnseignant->getId();




		// ETUDIANT
		// On récupère l'id de l'étudiant
		$id_etudiant = $_SESSION['choixEtudiant'];




		// ENTREPRISE
		// On récupère l'id de l'entreprise et du tuteur d'entreprise
		$ficheLocalisationStage = new ficheLocalisationStage($co, $id_etudiant);
		$id_entreprise =  $ficheLocalisationStage->getIdEntreprise();
		$id_tuteurEntreprise =  $ficheLocalisationStage->getIdTuteurEntreprise();



		$objetStage="";
		// On s'occupe des checkbox
		if(isset($_POST['objetStageSysteme']))
		{
			$objetStage .= "Systeme";
			$objetStage .= ",";
		}
		if(isset($_POST['objetStageMultimedia']))
		{
			$objetStage .= "Multimédia";
			$objetStage .= ",";
		}
		if(isset($_POST['objetStageReseaux']))
		{
			$objetStage .= "Réseaux";
			$objetStage .= ",";
		}
		if(isset($_POST['objetStageDevWeb']))
		{
			$objetStage .= "Developpement Web";
			$objetStage .= ",";
		}
		if(isset($_POST['objetStageAutreDev']))
		{
			$objetStage .= "Autre Developpement";
			$objetStage .= ",";
		}
		if(isset($_POST['objetStageBdd']))
		{
			$objetStage .= "Base de données";
			$objetStage .= ",";
		}




				// FICHE COMPTE RENDU
				// Insertion dans la base de données de la fiche de compte rendu
				$creation_compteRendu = new ficheCompteRendu($co,
				$id_etudiant,
				$id_tuteurEnseignant,
				$id_entreprise,
				$id_tuteurEntreprise,
				$_POST['lieuStage'],
				$_POST['nomRH'],
				$_POST['mailRH'],
				$_POST['telRH'],
				$_POST['nomTaxeApprenti'],
				$_POST['mailTaxeApprenti'],
				$_POST['telTaxeApprenti'],
				$_POST['encadreInfo'],
				$_POST['appelInfo'],
				$_POST['tailleEquipe'],
				$objetStage,
				$_POST['travail'],
				$_POST['commentaires'],
				$_POST['matiere'],
				$_POST['matiereListe'],
				$_POST['avisGeneral'],
				$_POST['accueillir']
			);

		header('Location: ../vues/accueil.php');

		$bd->deconnexion();
	}


?>
