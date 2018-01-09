<!-- On vérifie que le membre est connecté car c'est une page reservée aux membres -->
<?php

    session_start();

    require_once("../controleurs/fonctions.php");
    require_once("../controleurs/recuperationInfosEtudiant.php");


    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 1 && verifFicheLocalisation() == false) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <head>
        <?php include("../vues/includes/head.html") ?>

        <script type="text/javascript" src="../bibliotheques/calendrier/calendrier.js"></script>
        <script type="text/javascript" src="../scripts/js/formulaires.js"></script>

        <link href="../bibliotheques/calendrier/calendrier.css" rel="stylesheet" type="text/css"/>

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
                <h1> Localisation de stage</h1>
                <p>
                    <form method="post" action="../controleurs/controleurFicheLocalisation.php" enctype="multipart/form-data" onsubmit="return verifForm(this)">

                        <p>
                            <label for="debutStage"> Date Début Stage : </label>
                            <input type="text" name="debutStage" class="calendrier"/>
                        </p>

                         <p>
                            <label for="finStage"> Date Fin Stage : </label>
                            <input type="text" name="finStage" class="calendrier"/>
                        </p>

                        <p>
                            <label for="nom"> Nom : </label>
                            <input type="text" name="nom" id="nom" value="<?php echo''.$nom.'' ?> " readonly />
                        </p>

                        <p>
                            <label for="prenom"> Prenom : </label>
                            <input type="text" name="prenom" id="prenom" value="<?php echo''.$prenom.'' ?> " readonly />
                        </p>

                        <p>
                            <label for="adresse"> Adresse : </label>
                            <input type="text" name="adresse" id="adresse" onblur="verifAdresse(this)" />
                        </p>

                        <p>
                            <label for="ville"> Ville : </label>
                            <input type="text" name="ville" id="ville" onblur="verifVille(this)" />
                        </p>

                        <p>
                            <label for="codePostal"> Code Postal : </label>
                            <input type="text" name="codePostal" id="codePostal" onblur="verifCP(this)"/>
                        </p>

                        <p>
                            <label for="email"> Email IUT : </label>
                            <input type="text" name="email" id="email" value="<?php echo''.$email.'' ?> " readonly />
                        </p>

                        <p>
                            <label for="telephone"> Telephone : </label>
                            <input type="text" name="telephone" id="telephone" value="<?php echo''.$telephone.'' ?> " readonly />
                        </p>

                        <h2> Entreprise </h2>
                        <p>
                            <label for="nomEnt"> Nom : </label>
                            <input type="text" name="nomEnt" id="nomEnt" onblur="verifNom(this)" />
                        </p>

                        <p>
                            <label for="adresseEnt"> Adresse : </label>
                            <input type="text" name="adresseEnt" id="adresseEnt" onblur="verifAdresse(this)"/>
                        </p>

                        <p>
                            <label for="villeEnt"> Ville : </label>
                            <input type="text" name="villeEnt" id="villeEnt" onblur="verifVille(this)" />
                        </p>

                        <p>
                            <label for="codePostalEnt"> Code Postal : </label>
                            <input type="text" name="codePostalEnt" id="codePostalEnt" onblur="verifCP(this)"/>
                        </p>

                        <p>
                            <label for="nomResponsable"> Nom du responsable de stage : </label>
                            <input type="text" name="nomResponsable" id="nomResponsable" onblur="verifNom(this)" />
                        </p>

                        <p>
                            <label for="prenomResponsable"> Prenom du responsable de stage : </label>
                            <input type="text" name="prenomResponsable" id="prenomResponsable" onblur="verifNom(this)"/>
                        </p>

                        <p>
                            <label for="emailResponsable"> Email du responsable de stage : </label>
                            <input type="text" name="emailResponsable" id="emailResponsable" onblur="verifMail(this)"/>
                        </p>

                        <p>
                            <label for="jourResponsable"> Jour de la semaine où il est possible de le rencontrer : </label>
                            <select name="jourResponsable" size="1">
                                <option> Lundi </option>
                                <option> Mardi </option>
                                <option> Mercredi </option>
                                <option> Jeudi </option>
                                <option> Vendredi </option>
                                <option> Samedi </option>
                            </select>
                        </p>


                        <h2> Etudiant </h2>
                        <p>
                            <label for="emailAutre"> E-mail personnel : </label>
                            <input type="text" name="emailAutre" id="emailAutre" onblur="verifMail(this)"/>
                        </p>

                        <p>
                            <label for="sujetStage"> Sujet du stage : </label>
                            <input type="text" name="sujetStage" id="sujetStage" onblur="verifSujet(this)"/>
                        </p>



                        <h2> Envoyer des fichiers </h2>
                        <p>
                          <label for="fichier2">Fichier 1 (Tous formats | max. 1 Go) :</label><br />
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                          <input type="file" name="fichier1" id="fichier1" /><br />
                        </p>
                        <p>
                          <label for="fichier2">Fichier 2 (Tous formats | max. 1 Go) :</label><br />
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                          <input type="file" name="fichier2" id="fichier2" /><br />
                        </p>

                        <p>
                          <label for="fichier3">Fichier 3 (Tous formats | max. 1 Go) :</label><br />
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                          <input type="file" name="fichier3" id="fichier3" /><br />
                        </p>

                        <p>
                          <label for="fichier4">Fichier 4 (Tous formats | max. 1 Go) :</label><br />
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                          <input type="file" name="fichier4" id="fichier4" /><br />
                        </p>

                        <p>
                          <label for="fichier5">Fichier 5 (Tous formats | max. 1 Go) :</label><br />
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                          <input type="file" name="fichier5" id="fichier5" /><br />
                        </p>

                        <p>
                            <input type="submit" name="envoyer" value="Envoyer" />
                        </p>
                    </form>
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
  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 1 && verifFicheLocalisation() == true) {
  ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

      <head>
          <?php include("../vues/includes/head.html") ?>
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
                  <h1> Localisation de stage</h1>
                  <p>
                      Vous avez déjà rempli votre fiche de localisation
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
  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] <> 1) {
  ?>
<meta http-equiv="refresh" content="0; URL='../vues/accueil.php'">

    <?php

        }else{
          ?>
      <meta http-equiv="refresh" content="0; URL='../vues/index.html'">
<?php
        }

?>
