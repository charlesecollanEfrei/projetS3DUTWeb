<?php

	require_once("../modeles/bd.php");
	require_once("../modeles/disponibilites.php");
	require_once("../modeles/entreprises.php");
	require_once("../modeles/ficheAppreciation.php");
	require_once("../modeles/ficheAvis.php");
	require_once("../modeles/ficheCompteRendu.php");
	require_once("../modeles/ficheLocalisationStage.php");
	require_once("../modeles/utilisateurs.php");

	function formulaires($valeur) {
		$valeur = htmlentities($valeur);
		return $valeur;
	}

	/* Les noms des roles */
	if($_SESSION['role'] == 1) { $nomRole = "Etudiant"; }
	if($_SESSION['role'] == 2) { $nomRole = "Tuteur Entreprise"; }
	if($_SESSION['role'] == 3) { $nomRole = "Tuteur Enseignant"; }
	if($_SESSION['role'] == 4) { $nomRole = "Enseignant"; }
	if($_SESSION['role'] == 5) { $nomRole = "Secretaire"; }

	$identifiant_connexion = $_SESSION['identifiant'];



	// Fonctions pour tuteur Entreprise
	// Recherche ses stagiaires
	function listeStagiaireTuteur() {
		$bd = new bd();
		$co = $bd->connexion();

		// On recupère l'id du tuteur d'entreprise
		$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
		$id_tuteurEntreprise = $utilisateurs->getId();

		// On recupere le tableau des id des stagiaires du tuteur d'entreprise
		$ficheLocalisationStage = new ficheLocalisationStage($co);
		$tableau_id_etudiant = $ficheLocalisationStage->rechercheStagiaireTuteur($id_tuteurEntreprise);

		// On retourne le resultat
		foreach ($tableau_id_etudiant as $value) {
			$nom_stagiaire = $utilisateurs->nomEtudiant($value);
			$prenom_stagiaire = $utilisateurs->prenomEtudiant($value);
			$nomPrenom = $nom_stagiaire;
			$nomPrenom .= ' ';
			$nomPrenom .= $prenom_stagiaire;

			echo'<option value="'.$value.'">'.$nomPrenom.'</option>';
		}
	}

	// Fonctions pour tuteur Entreprise
	// Recherche s'il a déjà rempli la fiche d'appreciation du stagiaire selectionné
	function verifStagiaireTuteur() {
		$bd = new bd();
		$co = $bd->connexion();

		// On recupère l'id du stagiaire selectionné
		$id_etudiant = $_SESSION['choixEtudiant'];

		// On verifie s'il existe une fiche d'appréciation pour le stagiaire selectionné
		$ficheAppreciation = new ficheAppreciation($co);
		$fiche = $ficheAppreciation->rechercheFicheAppreciationOk($id_etudiant);

		return($fiche);
		$bd->deconnexion();
	}




		// Fonctions pour tuteur Enseignant
		// Recherche ses stagiaires
		function listeStagiaireTuteurEnseignant() {
			$bd = new bd();
			$co = $bd->connexion();

			// On recupère l'id du tuteur Enseignant
			$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
			$id_tuteurEnseignant = $utilisateurs->getId();

			// On recupere le tableau des id des stagiaires du tuteur Enseignant
			$ficheLocalisationStage = new ficheLocalisationStage($co);
			$tableau_id_etudiant = $ficheLocalisationStage->rechercheStagiaireTuteurEnseignant($id_tuteurEnseignant);

			// On retourne le resultat
			foreach ($tableau_id_etudiant as $value) {
				$nom_stagiaire = $utilisateurs->nomEtudiant($value);
				$prenom_stagiaire = $utilisateurs->prenomEtudiant($value);
				$nomPrenom = $nom_stagiaire;
				$nomPrenom .= ' ';
				$nomPrenom .= $prenom_stagiaire;

				echo'<option value="'.$value.'">'.$nomPrenom.'</option>';
			}

		$bd->deconnexion();
	}




	// Fonctions pour tuteur Enseignant
	// Recherche s'il a déjà rempli la fiche d'appreciation du stagiaire selectionné
	function verifStagiaireTuteurEnseignant() {
		$bd = new bd();
		$co = $bd->connexion();

		// On recupère l'id du stagiaire selectionné
		$id_etudiant = $_SESSION['choixEtudiant'];

		// On verifie s'il existe une fiche d'appréciation pour le stagiaire selectionné
		$ficheCompteRendu = new ficheCompteRendu($co);
		$fiche = $ficheCompteRendu->rechercheFicheCompteRenduOk($id_etudiant);

		return($fiche);
		$bd->deconnexion();

	}




	// Fonctions pour Enseignant
	// Recherche ses stagiaires
	function listeStagiaireSansTuteurEnseignant() {
		$bd = new bd();
		$co = $bd->connexion();

		// On recupère l'id de l'Enseignant
		$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
		$id_tuteurEnseignant = $utilisateurs->getId();

		// On recupere le tableau des id des étudiants sans stage
		$ficheLocalisationStage = new ficheLocalisationStage($co);
		$tableau_id_etudiant = $ficheLocalisationStage->rechercheSEtudiantSansTuteurEnseignant();

		// On retourne le resultat
		foreach ($tableau_id_etudiant as $value) {
			$nom_stagiaire = $utilisateurs->nomEtudiant($value);
			$prenom_stagiaire = $utilisateurs->prenomEtudiant($value);
			$nomPrenom = $nom_stagiaire;
			$nomPrenom .= ' ';
			$nomPrenom .= $prenom_stagiaire;

			echo'<option value="'.$value.'">'.$nomPrenom.'</option>';
		}

	$bd->deconnexion();
	}



	// Fonctions liste Stages
	// On rempli le tableau des stages
	function tableauStages() {
		$bd = new bd();
		$co = $bd->connexion();

		// On recupere l'id, le nom, le prénom de l'étudiant
		$utilisateurs = new utilisateurs($co);
		$tableauEtudiant = $utilisateurs->infosTableauEtudiant();

		foreach($tableauEtudiant as $cle1 => $valeur1) {
			echo "<tr>";

				foreach ($valeur1 as $cle2=>$valeur2) {
					echo "<td>" . $valeur2 . "</td>";
				}
			echo "</tr>";
		}

	$bd->deconnexion();
}




	// Fonctions pour les étudiants
	// Verification si la fiche de localisation a été déjà rempli
	function verifFicheLocalisation() {
		$bd = new bd();
		$co = $bd->connexion();

		// On recupère l'id de l'étudiant
		$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
		$id_etudiant = $utilisateurs->getId();

		// On cherche si l'étudiant a déjà rempli sa fiche de localisation
		$ficheLocalisationStage = new ficheLocalisationStage($co);
		$fiche= $ficheLocalisationStage->rechercheFicheLocaEtudiantOk($id_etudiant);

		return($fiche);

	$bd->deconnexion();
}




// Fonctions pour les étudiants
// Verification si la fiche d'avis a été rempli
function verifFicheAvis() {
	$bd = new bd();
	$co = $bd->connexion();

	// On recupère l'id de l'étudiant
	$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
	$id_etudiant = $utilisateurs->getId();

	// On cherche si l'étudiant a déjà rempli sa fiche d'avis
	$ficheAvis = new ficheAvis($co);
	$fiche= $ficheAvis->rechercheFicheAvisOk($id_etudiant);

	return($fiche);

$bd->deconnexion();
}








// Verification si les disponibilites ont été rentré
function verifDispo() {
	$bd = new bd();
	$co = $bd->connexion();

	// On recupère l'id
	$utilisateurs = new utilisateurs($co, $_SESSION['identifiant']);
	$id_utilisateur = $utilisateurs->getId();

	// On cherche si l'utilisateur a déjà rentré ses disponibilites
	$dispo = new disponibilites($co);
	$disponibilites = $dispo->rechercheDispoOk($id_utilisateur);

	return($disponibilites);

$bd->deconnexion();
}


?>
