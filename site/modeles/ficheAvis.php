<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class ficheAvis{
		private $id;
		private $id_etudiant;
		private $id_entreprise;
		private $id_tuteurEntreprise;
		private $remuneration;
    private $encadreParInformaticien;
    private $appelAInformaticien;
    private $equipe;
    private $typeMateriel;
    private $systeme;
    private $langages;
    private $objetStage;
    private $conditions;
    private $conditionsPourquoi;
    private $objectif;
    private $objectifPourquoi;
    private $matiere;
    private $matierePasAssez;
    private $projetPersoProf;

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
					$result = mysqli_query($this->co, "SELECT * FROM ficheAvis WHERE id_etudiant='$this->id_etudiant'") or die("Connexion impossible : Connexion Localisation");
 					$row = mysqli_fetch_assoc($result);
 					$this->id = $row["id"];
 					$this->id_etudiant = $row["id_etudiant"];
					$this->id_entreprise = $row["id_entreprise"];
          $this->id_tuteurEntreprise = $row["id_tuteurEntreprise"];
          $this->remuneration = $row["remuneration"];
          $this->encadreParInformaticien = $row["encadreParInformaticien"];
          $this->appelAInformaticien = $row["appelAInformaticien"];
          $this->equipe = $row["equipe"];
          $this->typeMateriel = $row["typeMateriel"];
          $this->systeme = $row["system"];
          $this->langages = $row["langages"];
          $this->objetStage = $row["objetStage"];
          $this->conditions = $row["conditions"];
          $this->conditionsPourquoi = $row["conditionsPourquoi"];
          $this->objectif = $row["objectif"];
          $this->objectifPourquoi = $row["objectifPourquoi"];
          $this->matiere = $row["matiere"];
          $this->matierePasAssez = $row["matierePasAssez"];
          $this->projetPersoProf = $row["projetPersoProf"];
 					break;


 				// On insere dans la table
 				case 19 :
 					$co = $args[0];
					$id_etudiant = $args[1];
					$id_entreprise = $args[2];
					$id_tuteurEntreprise = $args[3];
          $remuneration = $args[4];
					$encadreParInformaticien = $args[5];
					$appelAInformaticien = $args[6];
					$equipe = $args[7];
					$typeMateriel = $args[8];
					$systeme = $args[9];
					$langages = $args[10];
					$objetStage = $args[11];
					$conditions = $args[12];
          $conditionsPourquoi = $args[13];
          $objectif = $args[14];
          $objectifPourquoi = $args[15];
          $matiere = $args[16];
          $matierePasAssez = $args[17];
          $projetPersoProf = $args[18];

					mysqli_query($co, "INSERT INTO ficheAvis VALUES('', '$id_etudiant', '$id_entreprise', '$id_tuteurEntreprise', '$remuneration', '$encadreParInformaticien', '$appelAInformaticien', '$equipe', '$typeMateriel', '$systeme', '$langages', '$objetStage', '$conditions', '$conditionsPourquoi', '$objectif', '$objectifPourquoi', '$matiere', '$matierePasAssez',
            '$projetPersoProf' )") or die ("Connexion impossible : Inscription Localisation");	// On insere dans la base de données
 					break;
 			}
		}


    function getId(){
				return($this->id);
		}


    function rechercheFicheAvisOk($id_etudiant) {
      $result = mysqli_query($this->co, "SELECT DISTINCT id_etudiant FROM ficheAvis WHERE id_etudiant='$id_etudiant'") or die("Connexion impossible : Recherche Fiche Avis");
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
