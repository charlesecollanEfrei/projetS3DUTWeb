<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class ficheCompteRendu{
		private $id;
		private $id_etudiant;
    private $id_tuteurEnseignant;
    private $id_entreprise;
    private $id_tuteurEntreprise;
    private $lieuStage;
    private $nomRH;
    private $mailRH;
    private $telRH;
    private $nomTaxeApprenti;
    private $mailTaxeApprenti;
    private $telTaxeApprenti;
    private $encadreInfo;
    private $appelInfo;
    private $tailleEquipe;
    private $objetStage;
    private $travail;
    private $commentaires;
    private $matiere;
    private $matiereListe;
    private $avisGeneral;
    private $accueillir;

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
					$this->id_tuteurEnseignant = $args[1];
					$result = mysqli_query($this->co, "SELECT * FROM ficheCompteRendu WHERE id_tuteurEnseignant='$this->id_tuteurEnseignant'") or die("Connexion impossible : Connexion Localisation");
 					$row = mysqli_fetch_assoc($result);
 					$this->id = $row["id"];
      	  $this->id_etudiant= $row["id_etudiant"];
          $this->id_entreprise = $row["id_entreprise"];
          $this->id_tuteurEntreprise = $row["id_tuteurEntreprise"];
          $this->lieuStage = $row["lieuStage"];
          $this->nomRH = $row["nomRH"];
          $this->mailRH = $row["mailRH"];
          $this->telRH = $row["telRH"];
          $this->nomTaxeApprenti = $row["nomTaxeApprenti"];
          $this->mailTaxeApprenti = $row["mailTaxeApprenti"];
          $this->telTaxeApprenti = $row["telTaxeApprenti"];
          $this->encadreInfo = $row["encadreInfo"];
          $this->appelInfo = $row["appelInfo"];
          $this->tailleEquipe = $row["tailleEquipe"];
          $this->objetStage = $row["objetStage"];
          $this->travail = $row["travail"];
          $this->commentaires = $row["commentaires"];
          $this->matiere = $row["matiere"];
          $this->matiereListe = $row["matiereListe"];
          $this->avisGeneral = $row["avisGeneral"];
          $this->accueillir = $row["accueillir"];
 					break;


 				// On insere dans la table
 				case 22 :
 					$co = $args[0];
          $id_etudiant = $args[1];
          $id_tuteurEnseignant = $args[2];
          $id_entreprise = $args[3];
          $id_tuteurEntreprise = $args[4];
          $lieuStage = $args[5];
          $nomRH = $args[6];
          $mailRH = $args[7];
          $telRH = $args[8];
          $nomTaxeApprenti = $args[9];
          $mailTaxeApprenti = $args[10];
          $telTaxeApprenti = $args[11];
          $encadreInfo = $args[12];
          $appelInfo = $args[13];
          $tailleEquipe = $args[14];
          $objetStage = $args[15];
          $travail = $args[16];
          $commentaires = $args[17];
          $matiere = $args[18];
          $matiereListe = $args[19];
          $avisGeneral = $args[20];
          $accueillir = $args[21];

					mysqli_query($co, "INSERT INTO ficheCompteRendu VALUES('',
            '$id_etudiant',
            '$id_tuteurEnseignant',
            '$id_entreprise',
            '$id_tuteurEntreprise',
            '$lieuStage',
            '$nomRH',
            '$mailRH',
            '$telRH',
            '$nomTaxeApprenti',
            '$mailTaxeApprenti',
            '$telTaxeApprenti',
            '$encadreInfo',
            '$appelInfo',
            '$tailleEquipe',
            '$objetStage',
            '$travail',
            '$commentaires',
            '$matiere',
            '$matiereListe',
            '$avisGeneral',
            '$accueillir'
           )") or die ("Connexion impossible : Inscription Localisation");	// On insere dans la base de données
 					break;
 			}
		}


    function getId(){
				return($this->id);
		}


    function rechercheFicheCompteRenduOk($id_etudiant) {
      $result = mysqli_query($this->co, "SELECT DISTINCT id_etudiant FROM ficheCompteRendu WHERE id_etudiant='$id_etudiant' ") or die("Connexion impossible : Recherche Fiche Appréciation");
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
