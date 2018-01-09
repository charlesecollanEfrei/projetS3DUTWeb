<?php
            
    //require_once('../modeles/bd.php');
    //require_once('../modeles/utilisateurs.php');
  
    session_start();
    session_unset();
    session_destroy();

    header('Location: ../vues/index.html');

    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);            
?>