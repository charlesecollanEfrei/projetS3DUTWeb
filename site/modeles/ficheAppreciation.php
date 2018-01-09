<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class ficheAppreciation{
		private $id;
		private $id_etudiant;
		private $id_entreprise;
		private $id_tuteurEntreprise;
		private $niveauDeConnaissance;
    private $organisation;
    private $intiative;
    private $perseverance;
    private $efficacite;
    private $interetPorteAuTravail;
    private $presentation;
    private $ponctualite;
    private $assiduite;
    private $expression;
    private $sociabilite;
    private $communication;
    private $nomRH;
    private $mailRH;
    private $telRH;
    private $nomTaxeApprenti;
    private $mailTaxeApprenti;
    private $telTaxeApprenti;
    private $nomRelationsEcoles;
    private $mailRelationsEcoles;
    private $telRelationsEcoles;
    private $embauche;
    private $embauchePourquoi;
    private $presentSoutenance;

		private $co;

		function __construct() {
			// On compte et on récupère les arguments
      $cpt = func_num_args();
 			$args = func_get_args();

 			switch ($cpt) {
 				// On recherche la fiche avis de stage par étudiant
        case 1 :
        $this->co = $args[0];
        break;

 				case 2 :
 					$this->co = $args[0];
				  $id_tuteurEntreprise = $args[1];
					$result = mysqli_query($this->co, "SELECT * FROM ficheAppreciation WHERE id_tuteurEntreprise='$id_tuteurEntreprise'") or die("Connexion impossible : Connexion Fiche Appreciation");
 					$row = mysqli_fetch_assoc($result);
 					$this->id = $row["id"];
 					$this->id_etudiant = $row["id_etudiant"];
					$this->id_entreprise = $row["id_entreprise"];
          $this->id_tuteurEntreprise = $row["id_tuteurEntreprise"];
      		$this->niveauDeConnaissance = $row["niveauDeConnaissance"];
          $this->organisation = $row["organisation"];
          $this->intiative = $row["intiative"];
          $this->perseverance = $row["perseverance"];
          $this->efficacite = $row["efficacite"];
          $this->interetPorteAuTravail = $row["interetPorteAuTravail"];
          $this->presentation = $row["presentation"];
          $this->ponctualite = $row["ponctualite"];
          $this->assiduite = $row["assiduite"];
          $this->expression = $row["expression"];
          $this->sociabilite = $row["sociabilite"];
          $this->communication = $row["communication"];
          $this->nomRH = $row["nomRH"];
          $this->mailRH = $row["mailRH"];
          $this->telRH = $row["telRH "];
          $this->nomTaxeApprenti = $row["nomTaxeApprenti"];
          $this->mailTaxeApprenti = $row["mailTaxeApprenti"];
          $this->telTaxeApprenti = $row["telTaxeApprenti"];
          $this->nomRelationsEcoles = $row["nomRelationsEcoles"];
          $this->mailRelationsEcoles = $row["mailRelationsEcoles"];
          $this->telRelationsEcoles = $row["telRelationsEcoles"];
          $this->embauche = $row["embauche"];
          $this->embauchePourquoi = $row["embauchePourquoi"];
          $this->presentSoutenance = $row["presentSoutenance"];
 					break;


 				// On insere dans la table
 				case 28 :
 					$co = $args[0];
          $id_etudiant = $args[1];
      		$id_entreprise = $args[2];
      		$id_tuteurEntreprise = $args[3];
      		$niveauDeConnaissance = $args[4];
          $organisation = $args[5];
          $intiative = $args[6];
          $perseverance = $args[7];
          $efficacite = $args[8];
          $interetPorteAuTravail = $args[9];
          $presentation = $args[10];
          $ponctualite = $args[11];
          $assiduite = $args[12];
          $expression = $args[13];
          $sociabilite = $args[14];
          $communication = $args[15];
          $nomRH = $args[16];
          $mailRH = $args[17];
          $telRH = $args[18];
          $nomTaxeApprenti = $args[19];
          $mailTaxeApprenti = $args[20];
          $telTaxeApprenti = $args[21];
          $nomRelationsEcoles = $args[22];
          $mailRelationsEcoles = $args[23];
          $telRelationsEcoles = $args[24];
          $embauche = $args[25];
          $embauchePourquoi = $args[26];
          $presentSoutenance = $args[27];

					mysqli_query($co, "INSERT INTO ficheAppreciation VALUES('', '$id_etudiant',
      		'$id_entreprise',
      		'$id_tuteurEntreprise',
      		'$niveauDeConnaissance',
          '$organisation',
          '$intiative',
          '$perseverance',
          '$efficacite',
          '$interetPorteAuTravail',
          '$presentation',
          '$ponctualite',
          '$assiduite',
          '$expression',
          '$sociabilite',
          '$communication',
          '$nomRH',
          '$mailRH',
          '$telRH',
          '$nomTaxeApprenti',
          '$mailTaxeApprenti',
          '$telTaxeApprenti',
          '$nomRelationsEcoles',
          '$mailRelationsEcoles',
          '$telRelationsEcoles',
          '$embauche',
          '$embauchePourquoi',
          '$presentSoutenance')") or die ("Connexion impossible : Insertion Fiche Appreciation");	// On insere dans la base de données
 					break;
 			}
		}


    function getId(){
				return($this->id);
		}


    function rechercheFicheAppreciationOk($id_etudiant) {
      $result = mysqli_query($this->co, "SELECT DISTINCT id_etudiant FROM ficheAppreciation WHERE id_etudiant='$id_etudiant' ") or die("Connexion impossible : Recherche Fiche Appréciation");
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
