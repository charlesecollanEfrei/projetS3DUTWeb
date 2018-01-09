<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class ficheLocalisationStage{
		private $id;
		private $id_etudiant;
		private $id_entreprise;
		private $id_tuteurEntreprise;
		private $id_tuteurEnseignant;
		private $dateDebutStage;
		private $dateFinStage;
		private $adresseEtudiant;
		private $villeEtudiant;
		private $codePostalEtudiant;
		private $emailAutre;
		private $jourSemaineRencontre;
		private $sujetStage;
    private $fichier1;
    private $fichier2;
    private $fichier3;
    private $fichier4;
    private $fichier5;

		private $co;

		function __construct() {
			// On compte et on récupère les arguments
      $cpt = func_num_args();
 			$args = func_get_args();

 			switch ($cpt) {
        case 1 :
          $this->co = $args[0];
          break;

 				case 2 :
 					$this->co = $args[0];
					$this->id_etudiant = $args[1];
					$result = mysqli_query($this->co, "SELECT * FROM ficheLocalisationStage WHERE id_etudiant='$this->id_etudiant'") or die("Connexion impossible : Connexion Localisation");
 					$row = mysqli_fetch_assoc($result);
 					$this->id = $row["id"];
 					$this->id_etudiant = $row["id_etudiant"];
					$this->id_entreprise = $row["id_entreprise"];
					$this->id_tuteurEntreprise = $row["id_tuteurEntreprise"];
					$this->id_tuteurEnseignant = $row["id_tuteurEnseignant"];
					$this->dateDebutStage = $row["dateDebutStage"];
					$this->dateFinStage = $row["dateFinStage"];
					$this->adresseEtudiant = $row["adresseEtudiant"];
					$this->villeEtudiant = $row["villeEtudiant"];
					$this->codePostalEtudiant = $row["codePostalEtudiant"];
					$this->emailAutre = $row["emailAutre"];
					$this->jourSemaineRencontre = $row["jourSemaineRencontre"];
					$this->sujetStage = $row["sujetStage"];
          $this->fichier1 = $row["fichier1"];
          $this->fichier2 = $row["fichier2"];
          $this->fichier3 = $row["fichier3"];
          $this->fichier4 = $row["fichier4"];
          $this->fichier5 = $row["fichier5"];
 					break;


 				// On insere dans la table
 				case 18 :
 					$co = $args[0];
					$id_etudiant = $args[1];
					$id_entreprise = $args[2];
					$id_tuteurEntreprise = $args[3];
          $id_tuteurEnseignant = $args[4];
					$dateDebutStage = $args[5];
					$dateFinStage = $args[6];
					$adresseEtudiant = $args[7];
					$villeEtudiant = $args[8];
					$codePostalEtudiant = $args[9];
					$emailAutre = $args[10];
					$jourSemaineRencontre = $args[11];
					$sujetStage = $args[12];
          $fichier1 = $args[13];
          $fichier2 = $args[14];
          $fichier3 = $args[15];
          $fichier4 = $args[16];
          $fichier5 = $args[17];

					mysqli_query($co, "INSERT INTO ficheLocalisationStage VALUES('',
            '$id_etudiant',
            '$id_entreprise',
            '$id_tuteurEntreprise',
            '$id_tuteurEnseignant',
            '$dateDebutStage',
            '$dateFinStage',
            '$adresseEtudiant',
            '$villeEtudiant',
            '$codePostalEtudiant',
            '$emailAutre',
            '$jourSemaineRencontre',
            '$sujetStage',
            '$fichier1',
            '$fichier2',
            '$fichier3',
            '$fichier4',
            '$fichier5' )")
          or die ("Connexion impossible : Inscription Localisation");	// On insere dans la base de données
 					break;
 			}
		}


    function getId(){
				return($this->id);
		}


    function getIdEntreprise(){
        return($this->id_entreprise);
    }


    function getIdTuteurEntreprise(){
        return($this->id_tuteurEntreprise);
    }


    function trouverFicheLocalisation($etudiant){
      if($etudiant == $this->id_etudiant) {
        return (true);
      }
      else {
        return (false);
      }
    }


    function rechercheStagiaireTuteur($id_tuteurEntreprise) {
      $result = mysqli_query($this->co, "SELECT DISTINCT id_etudiant FROM ficheLocalisationStage WHERE id_tuteurEntreprise='$id_tuteurEntreprise'") or die("Connexion impossible : Recherche Stagiaire par Tuteur Entreprise");
      $etudiantTuteur = Array();

      while ($ligne=mysqli_fetch_row($result)) {
        $etudiantTuteur[] = $ligne[0];
      }

      return($etudiantTuteur);
  	}


    function rechercheStagiaireTuteurEnseignant($id_tuteurEnseignant) {
      $result = mysqli_query($this->co, "SELECT DISTINCT id_etudiant FROM ficheLocalisationStage WHERE id_tuteurEnseignant='$id_tuteurEnseignant'") or die("Connexion impossible : Recherche Stagiaire par Tuteur Enseignant");
      $etudiantTuteur = Array();

      while ($ligne=mysqli_fetch_row($result)) {
        $etudiantTuteur[] = $ligne[0];
      }

      return($etudiantTuteur);
  	}


    function rechercheSEtudiantSansTuteurEnseignant() {
      $result = mysqli_query($this->co, "SELECT DISTINCT fiche.id_etudiant
        FROM ficheLocalisationStage fiche, utilisateurs u
        WHERE fiche.id_tuteurEnseignant=0
        AND fiche.id_etudiant = u.id
        AND u.role = 1 ") or die("Connexion impossible : Recherche Stagiaire par Tuteur Enseignant");

      $etudiantTuteur = Array();

      while ($ligne=mysqli_fetch_row($result)) {
        $etudiantTuteur[] = $ligne[0];
      }

      return($etudiantTuteur);
  	}


    function ajoutTuteurEnseignant($id_etudiant, $id_tuteurEnseignant) {
      $this->id_tuteurEnseignant = $id_tuteurEnseignant;
			mysqli_query($this->co,"UPDATE ficheLocalisationStage SET id_tuteurEnseignant='$id_tuteurEnseignant' WHERE id_etudiant='$id_etudiant'" ) or die ("Connexion impossible : Update Tuteur Enseignant");	// On modifie dans la base de données

  	}



    function rechercheFicheLocaEtudiantOk($id_etudiant) {
      $result = mysqli_query($this->co, "SELECT DISTINCT id_etudiant FROM ficheLocalisationStage WHERE id_etudiant='$id_etudiant'") or die("Connexion impossible : Recherche Stagiaire par Tuteur Entreprise");
      $row = mysqli_fetch_assoc($result);

      if($row == 0) {
        return (false);
      }
      else {
        return (true);
      }

    }

	}
?>
