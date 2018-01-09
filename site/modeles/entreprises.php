<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class entreprises {
		private $id;
		private $nom;
		private $adresse;
		private $ville;
		private $codePostal;

		private $co;

		function __construct() {
			// On compte et on récupère les arguments
      $cpt = func_num_args();
 			$args = func_get_args();

 			switch ($cpt) {
 				// On recherche par nom d'entreprise
 				case 2 :
 					$this->co = $args[0];
					$this->nom= $args[1];
					$result = mysqli_query($this->co, "SELECT * FROM entreprises WHERE nom='$this->nom'") or die("Connexion impossible : Connexion Entreprise");
 					$row = mysqli_fetch_assoc($result);
 					$this->id = $row["id"];
 					$this->nom= $row["nom"];
 					$this->prenom = $row["adresse"];
 					$this->ville = $row["ville"];
 					$this->codePostal = $row["codePostal"];
 					break;


 				// On insére dans la table
 				case 5 :
 					$co = $args[0];

					$nom = $args[1];
					$adresse = $args[2];
					$ville = $args[3];;
					$codePostal = $args[4];

					mysqli_query($co,"INSERT INTO entreprises VALUES('', '$nom', '$adresse', '$ville', '$codePostal' )") or die ("Connexion impossible : Inscription Entreprise");	// On insere dans la base de données

 					break;
 			}

		}


    // Trouver si un tuteur d'entreprise est dans la base de données
    function trouverNomEntreprise(){
      $result = mysqli_query($this->co, "SELECT * FROM entreprises WHERE nom='$this->nom'") or die("Connexion impossible : Connexion Utilisateur");
      $row = mysqli_fetch_assoc($result);

      if($row == 0) {
        return (false);
      }
      else {
        return (true);
      }

    }


		function getId(){
				return($this->id);
		}


	}

?>
