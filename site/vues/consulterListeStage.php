<!-- On vérifie que le membre est connecté car c'est une page reservée aux membres -->
<?php

    session_start();

    require_once("../controleurs/fonctions.php");

    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 4 || $_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <head>
        <?php include("../vues/includes/head.html") ?>

        <!-- Script permettant le tableau en jQuery -->
        <script type="text/javascript" src="../bibliotheques/jquery/tableau/jquery-latest.js"></script>
        <script type="text/javascript" src="../bibliotheques/jquery/tableau/jquery.tablesorter.js"></script>

        <!--  CSS permettant le tableau en jQuery -->
        <link rel="stylesheet" href="../bibliotheques/jquery/tableau/blue/style.css" type="text/css" id="" media="print, projection, screen" />

        <!--  Script permettant le tableau en jQuery lors du chargement de la page -->
        <script type="text/javascript">
          $(document).ready(function() {
            $("#myTable").tablesorter();
          });
        </script>
    </head>

    <body> <!-- C'est la structure initale du site -->

        <div class="bloc_page"> <!-- C'est la structure du site -->

            <div class="entete"> <!-- C'est l'entete du site -->
                <img src="images/logoAucunFond.png" alt="Logo eStage" width="150" height="150" />
            </div>

            <div class="menu"> <!-- C'est le menu du site -->
                <?php include("../vues/includes/menu.php") ?>
            </div>

            <div class="clear"></div> <!-- C'est ce qui permet de sortir du flottant  -->

            <div class="boite">
                <?php include("../vues/includes/boites_gauche.php") ?>
            </div>

            <div class="contenu"> <!-- C'est le contenu du site -->
                <?php
                  if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 4 || $_SESSION['role'] == 3 ) {
                ?>

                <h1> Choix étudiant sans stage a encadrer </h1>
                <form method="post" action="../controleurs/ajoutTuteurEnseignant.php">
                  <p>
                    <label for="choixEtudiant"> Choix Etudiant : </label>
                    <select name="choixEtudiant">
                      <?php
                          listeStagiaireSansTuteurEnseignant();
                      ?>
                      </select>

                    <input type="submit" name="envoyer" value="Encadrer"/>
                  </p>
                </form>

                <?php } ?>

                <h1> Liste Stages</h1>
                <p>
                  <table id="myTable" class="tablesorter">
                    <thead>
                      <tr>
                          <th>ID étudiant</th>
                          <th>Nom étudiant</th>
                          <th>Prénom étudiant</th>
                          <th>Ville stage</th>
                          <th>Identifiant Tuteur</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php tableauStages(); ?>
                    </tbody>
                  </table>
                </p>
            </div>

            <div class="clear"></div> <!-- C'est ce qui permet de sortir du flottant  -->

            <div class="footer"> <!-- C'est le footer du site, c'est-à-dire le bas de page qui permet les d'énoncer les informations relatives au site  -->
                <?php include("../vues/includes/pied_de_page.html") ?>

            </div>

        </div>

    </body>

</html>

<?php

  }

  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 1) {
  ?>
<meta http-equiv="refresh" content="0; URL='../vues/accueil.php'">

    <?php

        }else{
          ?>
      <meta http-equiv="refresh" content="0; URL='../vues/index.html'">
<?php
        }

?>
