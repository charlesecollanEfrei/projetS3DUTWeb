<!-- On vérifie que le membre est connecté car c'est une page reservée aux membres -->
<?php

    session_start();

    require_once("../controleurs/fonctions.php");

    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 3 && verifStagiaireTuteurEnseignant() == false) {
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
                <h1> Compte-Rendu de visite de stage </h1>
                <p>
                    <form method="post" action="../controleurs/controleurFicheCompteRendu.php">
                      <h2> Etudiant </h2>
                            <label for="idEtudiant"> Id étudiant: </label>
                            <input type="text" name="idEtudiant" id="idEtudiant" value="<?php echo''.$_SESSION['choixEtudiant'].'' ?> " readonly />
                        </p>

                      </p>
                        <p>
                            <label for="lieuStage"> Vous êtes vous rendu sur le lieu du stage pour rencontrer le stagiaire et son responsable de stage ? </label>
                            <input type="radio" name="lieuStage" value="Oui" id="lieuStage" /> <label for="oui">Oui</label>
                            <input type="radio" name="lieuStage" value="Non" id="lieuStage" /> <label for="non">Non</label>
                        </p>

                        <h2> Contacts dans l'entreprise </h2>
                        <h3> Contact RH </h3>
                        <p>
                           <label for="nomRH"> Nom RH : </label>
                           <input type="text" name="nomRH" id="nomRH" />
                       </p>

                       <p>
                          <label for="mailRH"> Mail RH : </label>
                          <input type="text" name="mailRH" id="mailRH" />
                        </p>

                        <p>
                         <label for="telRH"> Télépone RH : </label>
                         <input type="text" name="telRH" id="telRH" />
                       </p>


                       <h3> Contact Taxe d'Apprentissage </h3>
                       <p>
                          <label for="nomTaxeApprenti"> Nom : </label>
                          <input type="text" name="nomTaxeApprenti" id="nomTaxeApprenti" />
                      </p>

                      <p>
                         <label for="mailTaxeApprenti"> Mail : </label>
                         <input type="text" name="mailTaxeApprenti" id="mailTaxeApprenti" />
                       </p>

                       <p>
                        <label for="telTaxeApprenti"> Télépone : </label>
                        <input type="text" name="telTaxeApprenti" id="telTaxeApprenti"  />
                      </p>


                     <h2> Encadrement de l'étudiant </h2>
                     <p>
                         <label for="encadreInfo"> L’étudiant a-t-il été encadré directement par un informaticien ?</label>
                         <input type="radio" name="encadreInfo" value="Oui" id="encadreInfo" /> <label for="oui">Oui</label>
                         <input type="radio" name="encadreInfo" value="Non" id="encadreInfo" /> <label for="non">Non</label>
                     </p>

                     <p>
                         <label for="appelInfo"> Si non, en cas de besoin pouvait-il faire appel à un informaticien ? </label>
                         <input type="radio" name="appelInfo" value="Oui" id="appelInfo" /> <label for="oui">Oui</label>
                         <input type="radio" name="appelInfo" value="Non" id="appelInfo" /> <label for="non">Non</label>
                     </p>

                     <p>
                         <label for="travaillerSeul"> Dans le cadre de son stage, l’étudiant a-t-il travaillé seul ? </label>
                         <input type="radio" name="travaillerSeul" value="Oui" id="travaillerSeul" /> <label for="oui">Oui</label>
                         <input type="radio" name="travaillerSeul" value="Non" id="travaillerSeul" /> <label for="non">Non</label>
                     </p>

                     <p>
                        <label for="tailleEquipe"> Si non, taille de l'équipe : </label>
                        <input type="text" name="tailleEquipe" id="tailleEquipe" value="0"/>
                    </p>


                     <h2> Objet principale du stage</h2>
                     <p>
                       <label for="objetStage"> <i> 2 cases maximum à cocher </i> </label>
                     </p>
                     <p>
                       <input type="checkbox" name="objetStageSysteme" id="objetStage" values="Système" /> <label for="systeme">Système</label>
                       <input type="checkbox" name="objetStageMultimedia" id="objetStage" values="Multimédia" /> <label for="multimedia">Multimédia</label>
                       <input type="checkbox" name="objetStageReseaux" id="objetStage" values="Réseaux" /> <label for="reseaux">Réseaux</label>
                       <input type="checkbox" name="objetStageDevWeb" id="objetStage" values="Développement WEB" /> <label for="web">Développement WEB</label>
                       <input type="checkbox" name="objetStageAutreDev" id="objetStage" values="Autre Développement" /> <label for="developpement">Autre Développement</label>
                       <input type="checkbox" name="objetStageBdd" id="objetStage" values="Bases de données" /> <label for="bdd">Bases de données</label>
                     </p>


                     <h2> Avis de l'entreprise sur le travail et le comportement de l'étudiant </h2>
                     <p>
                       <label for="travail"> Globalement, concernant le travail de l'étudiant, êtes-vous : </label>
                       <input type="radio" name="travail" value="Très satisfait" id="travail" /> <label for="tresSatisfait">Très satisfait</label>
                       <input type="radio" name="travail" value="Satisfait" id="travail" /> <label for="satisfait">Satisfait</label>
                       <input type="radio" name="travail" value="Peu satisfait" id="travail" /> <label for="peuSatisfait">Peu satisfait</label>
                       <input type="radio" name="travail" value="Pas satisfait" id="travail" /> <label for="pasSatisfait">Pas satisfait</label>
                     </p>

                     <p>
                        <label for="commentaires"> Commentaires : </label>
                        <textarea name="commentaires" id="commentaires"></textarea>
                    </p>


                    <h2> Avis de l'entreprise sur la formation recue à l'IUT </h2>
                    <p>
                      <label for="matiere"> Dans la formation telle que vous l’avez perçue lors de la présence du stagiaire dans votre entreprise, avez-vous constaté des manques handicapants pour un futur informaticien ?</label>
                      <input type="radio" name="matiere" value="Oui" id="matiere" /> <label for="oui">Oui</label>
                      <input type="radio" name="matiere" value="Non" id="matiere" /> <label for="non">Non</label>
                    </p>

                    <p>
                       <label for="matiereListe"> Si oui, précisez lesquels : </label>
                       <textarea name="matiereListe" id="matiereListe"></textarea>
                   </p>


                     <h2> Avis général de l'enseignant sur le stage </h2>
                     <p>
                        <label for="avisGeneral"> Avis général : </label>
                        <textarea name="avisGeneral" id="avisGeneral"></textarea>
                    </p>


                    <p>
                      <label for="accueillir"> En conclusion, cette entreprise peut-elle les prochaines années accueillir dans des conditions correctes des étudiants ? </label>
                      <input type="radio" name="accueillir" value="Oui" id="accueillir" /> <label for="oui">Oui</label>
                      <input type="radio" name="accueillir" value="Non" id="accueillir" /> <label for="non">Non</label>
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
  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 3 && verifStagiaireTuteurEnseignant() == true) {
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
                  <h1> Compte-Rendu de visite de stage </h1>
                  <p>
                      Vous avez déjà rempli votre fiche de compte-rendu pour ce stagiaire
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

  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] <> 3) {
  ?>
<meta http-equiv="refresh" content="0; URL='../vues/accueil.php'">

    <?php

        }else{
          ?>
      <meta http-equiv="refresh" content="0; URL='../vues/index.html'">
<?php
        }

?>
