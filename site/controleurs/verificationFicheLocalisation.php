<?php
	require_once('../modeles/bd.php');
	require_once('../modeles/utilisateurs.php');
  require_once('../modeles/ficheLocalisationStage.php');

	$identifiant = $_SESSION['identifiant'];

	$bd = new bd();
	$co = $bd->connexion();

	$creation_compte = new utilisateurs($co, $identifiant);
	$id_etudiant = $creation_compte->getId();

  $ficheLocalisationStage = new ficheLocalisationStage($co, $id_etudiant);
	$exist =  $ficheLocalisationStage->trouverFicheLocalisation($id_etudiant);

  if ($exist == true) {
    $fiche = true;
  }
  else {
    $fiche = false;
  }

	$bd->deconnexion();

?>
