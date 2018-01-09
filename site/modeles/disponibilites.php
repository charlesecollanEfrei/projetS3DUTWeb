<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class disponibilites {
		private $id;
    private $id_utilisateur;
    private $dj1;
    private $dj2;
    private $dj3;
    private $dj4;

		private $co;


		function __construct() {

      // On compte et on récupère les arguments
      $cpt = func_num_args();
 			$args = func_get_args();


      switch ($cpt) {
        case 1 :
          $this->co = $args[0];
          break;

        case 6 :
          $this->co = $args[0];
          $this->id_utilisateur = $args[1];
          $this->dj1 = $args[2];
          $this->dj2 = $args[3];
          $this->dj3 = $args[4];
          $this->dj4 = $args[5];
          mysqli_query($this->co,"INSERT INTO disponibilites VALUES('', $this->id_utilisateur, $this->dj1, $this->dj2, $this->dj3, $this->dj4 )") or die ("Connexion impossible : Insertion disponibilites");	// On insere dans la base de données
          break;
      }

	}


  function rechercheDispoOk($id_utilisateur) {
    $result = mysqli_query($this->co, "SELECT DISTINCT id_utilisateur FROM disponibilites WHERE id_utilisateur='$id_utilisateur'") or die("Connexion impossible : Recherche disponibilites");
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
