<!-- On vérifie que le membre est connecté car c'est une page reservée aux membres -->
<?php

    session_start();

    require_once("../controleurs/fonctions.php");

    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['identifiant']) && $_SESSION['role'] <= 5 && verifDispo() == false) {
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
                <h1> Disponibilités</h1>
                <p>
                    <form method="post" action="../controleurs/disponibilites.php">
                        <p>
                            <label for="dj1"> Etes-vous disponible le Jeudi 23 juin matin ? : </label>
                            <input type="radio" name="dj1" value="1" id="dj1" checked="checked" /> <label for="oui">Oui</label>
                            <input type="radio" name="dj1" value="0" id="dj1" /> <label for="non">Non</label>
                        </p>

                        <p>
                            <label for="dj2"> Etes-vous disponible le Jeudi 23 juin après-midi ? : </label>
                            <input type="radio" name="dj2" value="1" id="dj2" checked="checked" /> <label for="oui">Oui</label>
                            <input type="radio" name="dj2" value="0" id="dj2" /> <label for="non">Non</label>
                        </p>

                        <p>
                            <label for="dj3"> Etes-vous disponible le Vendredi 24 juin matin ? : </label>
                            <input type="radio" name="dj3" value="1" id="dj3" checked="checked" /> <label for="oui">Oui</label>
                            <input type="radio" name="dj3" value="0" id="dj3" /> <label for="non">Non</label>
                        </p>

                        <p>
                            <label for="dj4"> Etes-vous disponible le Vendredi 24 juin après-midi ? : </label>
                            <input type="radio" name="dj4" value="1" id="dj4" checked="checked" /> <label for="oui">Oui</label>
                            <input type="radio" name="dj4" value="0" id="dj4" /> <label for="non">Non</label>
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
  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] <= 5 && verifDispo() ==  true) {
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
                  <h1> Disponibilites</h1>
                  <p>
                      Vous avez déjà rempli vos disponibilites
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
  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] > 5) {
  ?>
<meta http-equiv="refresh" content="0; URL='../vues/accueil.php'">

    <?php

        }else{
          ?>
      <meta http-equiv="refresh" content="0; URL='../vues/index.html'">
<?php
        }

?>
