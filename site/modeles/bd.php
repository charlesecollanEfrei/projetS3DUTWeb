<?php
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	class bd {
		private $host;
		private $user;
		private $bdd;
		private $passwd;

		private $co;


		function __construct() {
			$this->host = "localhost";
			$this->user = "root";
			$this->bdd = "gestionStages";
			$this->passwd = "root";
			$this->co = mysqli_connect($this->host, $this->user, $this->passwd, $this->bdd)  or die("Connexion impossible : BDD");
		} 

		function connexion() {
			return ($this->co);
		}

		function deconnexion() {
			mysqli_close($this->co);
		}
	}

?>