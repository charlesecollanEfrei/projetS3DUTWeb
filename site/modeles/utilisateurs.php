<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class utilisateurs {
		private $id;
		private $identifiant;
		private $mdp;
		private $nom;
		private $prenom;
		private $telephone;
		private $email;
		private $role; // Etudiant = 1, Tuteur Entreprise = 2, Tuteur enseignant = 3, Enseignant = 4

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
					$this->identifiant = $args[1];
					$result = mysqli_query($this->co, "SELECT * FROM utilisateurs WHERE identifiant='$this->identifiant'") or die("Connexion impossible : Connexion Utilisateur");
 					$row = mysqli_fetch_assoc($result);
 					$this->id = $row["id"];
 					$this->mdp = $row["mdp"];
 					$this->nom = $row["nom"];
 					$this->prenom = $row["prenom"];
 					$this->telephone = $row["telephone"];
 					$this->email = $row["email"];
 					$this->role = $row["role"];
 					break;

 				case 8 :
 					$co = $args[0];
					$identifiant = $args[1];
					$mdp = $args[2];
					$nom = $args[3];
					$prenom = $args[4];
					$telephone = $args[5];
					$email = $args[6];
					$role = $args[7];
					mysqli_query($co,"INSERT INTO utilisateurs VALUES('', '$identifiant', '$mdp', '$nom', '$prenom', '$telephone', '$email', '$role')") or die ("Connexion impossible : Inscription Utlisateur");	// On insere dans la base de données
 					break;
 			}

		}


		function verif_mdp($mdp){
			if($this->mdp == $mdp) {
				return true;
			}
			else {
				return false;
			}
		}


		function connexion(){
			session_start();
			$_SESSION['identifiant'] = $this->identifiant;
			$_SESSION['mdp'] = $this->mdp;
			$_SESSION['role'] = $this->role;
		}


		function deconnexion() {
			session_start();
			session_unset();
			session_destroy();

			mysqli_close($this->co);
		}

    // Trouver si un tuteur d'entreprise est dans la base de données
    function trouverIdentifiantTuteur(){
      $result = mysqli_query($this->co, "SELECT * FROM utilisateurs WHERE identifiant='$this->identifiant'") or die("Connexion impossible : Connexion Utilisateur");
      $row = mysqli_fetch_assoc($result);

      if($row == 0) {
        return (false);
      }
      else {
        return (true);
      }

    }


    // Trouver le nom par l'id
    function nomEtudiant($id_utilisateurs){
      $result = mysqli_query($this->co, "SELECT nom FROM utilisateurs WHERE id='$id_utilisateurs'") or die("Connexion impossible : Recherche Stagiaire par Tuteur Entreprise");
      $row = mysqli_fetch_assoc($result);

      return($row['nom']);
    }


    // Trouver le prenom par l'id
    function prenomEtudiant($id_utilisateurs){
      $result = mysqli_query($this->co, "SELECT prenom FROM utilisateurs WHERE id='$id_utilisateurs'") or die("Connexion impossible : Recherche Stagiaire par Tuteur Entreprise");
      $row = mysqli_fetch_assoc($result);

      return($row['prenom']);
    }


    // Pour le tableau des Stages
    // On regarde dans les autres tables
    function infosTableauEtudiant(){
      $result = mysqli_query($this->co,
        "SELECT  u.id, u.nom, u.prenom , e.ville, fiche.id_tuteurEnseignant
        FROM utilisateurs AS u, entreprises AS e, ficheLocalisationStage AS fiche, utilisateurs AS uE
        WHERE u.id = fiche.id_etudiant
        AND fiche.id_entreprise = e.id
        AND u.role = 1
        GROUP BY u.id")
        or die("Connexion impossible : Connexion Utilisateurs Recherche Stage");

      $etudiant = Array();
      $personne = Array();

      while ($ligne = mysqli_fetch_array($result)) {
      	$personne = array(
        "id"=>$ligne['id'],
      	"nom"=>$ligne['nom'],
      	"prenom"=>$ligne['prenom'],
        "villeStage"=>$ligne['ville'],
        "id_tuteurEnseignant"=>$ligne['id_tuteurEnseignant']);

        array_push($etudiant, $personne);
      }

      return($etudiant);
    }

		// Tous les getters
		function getId(){
			return($this->id);
		}


		function getNom(){
			return($this->nom);
		}


		function getPrenom(){
			return($this->prenom);
		}


		function getTelephone(){
			return($this->telephone);
		}


		function getEmail(){
			return($this->email);
		}


		function getRole(){
			return($this->role);
		}



		// Tous les setters
		function setNom($nom){
			$this->nom = $nom;
			mysqli_query($this->co,"UPDATE utilisateurs SET nom='$nom' WHERE id='$this->id'" ) or die ("Connexion impossible : Update Nom");	// On modifie dans la base de données
		}


		function setPrenom($prenom){
			$this->prenom = $prenom;
			mysqli_query($this->co,"UPDATE utilisateurs SET prenom='$prenom' WHERE id='$this->id'" ) or die ("Connexion impossible : Update Prenom");	// On modifie dans la base de données
		}


		function setTelephone($telephone){
			$this->telephone = $telephone;
			mysqli_query($this->co,"UPDATE utilisateurs SET telephone='$telephone' WHERE id='$this->id'" ) or die ("Connexion impossible : Update Telephone");	// On modifie dans la base de données
		}


		function setEmail($email){
			$this->email = $email;
			mysqli_query($this->co,"UPDATE utilisateurs SET email='$email' WHERE id='$this->id'" ) or die ("Connexion impossible : Update Mail");	// On modifie dans la base de données
		}


		function setRole($role){
			$this->role = $role;
			$res = mysqli_query($this->co,"UPDATE utilisateurs SET role='$role' WHERE id='$this->id'" ) or die ("Connexion impossible : Update Role");	// On modifie dans la base de données
      if($res) {
        $_SESSION['role'] = 3;
      }
    }



	}

?>
