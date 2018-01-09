<!-- On vérifie que le membre est connecté car c'est une page reservée aux membres -->
<?php

    session_start();

    require_once("../controleurs/fonctions.php");

    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 2 && verifStagiaireTuteur() == false) {
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
                <h1> Appreciation du stagiaire</h1>
                <p>
                    <form method="post" action="../controleurs/controleurFicheAppreciation.php">
                        <h2> Etudiant </h2>
                              <label for="idEtudiant"> Id étudiant: </label>
                              <input type="text" name="idEtudiant" id="idEtudiant" value="<?php echo''.$_SESSION['choixEtudiant'].'' ?> " readonly />
                          </p>

                        </p>

                        <h2> Appreciation sur le stagiaire </h2>
                        <h3> Methode de travail et aptitudes </h3>
                        <p>
                            <label for="niveauDeConnaissance"> Niveau de connaissance : </label>
                            <input type="radio" name="niveauDeConnaissance" value="Excellent" id="niveauDeConnaissance" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="niveauDeConnaissance" value="Bon" id="niveauDeConnaissance" /> <label for="bon">Bon</label>
                            <input type="radio" name="niveauDeConnaissance" value="Moyen" id="niveauDeConnaissance" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="niveauDeConnaissance" value="Insuffisant" id="niveauDeConnaissance" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="organisation"> Organisation : </label>
                            <input type="radio" name="organisation" value="Excellent" id="organisation" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="organisation" value="Bon" id="organisation" /> <label for="bon">Bon</label>
                            <input type="radio" name="organisation" value="Moyen" id="organisation" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="organisation" value="Insuffisant" id="organisation" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="initiative"> Initiative : </label>
                            <input type="radio" name="initiative" value="Excellent" id="initiative" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="initiative" value="Bon" id="initiative" /> <label for="bon">Bon</label>
                            <input type="radio" name="initiative" value="Moyen" id="initiative" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="initiative" value="Insuffisant" id="initiative" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="perseverance"> Persévérance : </label>
                            <input type="radio" name="perseverance" value="Excellent" id="perseverance" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="perseverance" value="Bon" id="perseverance" /> <label for="bon">Bon</label>
                            <input type="radio" name="perseverance" value="Moyen" id="perseverance" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="perseverance" value="Insuffisant" id="perseverance" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="efficacite"> Efficacité : </label>
                            <input type="radio" name="efficacite" value="Excellent" id="efficacite" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="efficacite" value="Bon" id="efficacite" /> <label for="bon">Bon</label>
                            <input type="radio" name="efficacite" value="Moyen" id="efficacite" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="efficacite" value="Insuffisant" id="efficacite" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="interetPorteAuTravail"> Intérêt porté au travail : </label>
                            <input type="radio" name="interetPorteAuTravail" value="Excellent" id="interetPorteAuTravail" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="interetPorteAuTravail" value="Bon" id="interetPorteAuTravail" /> <label for="bon">Bon</label>
                            <input type="radio" name="interetPorteAuTravail" value="Moyen" id="interetPorteAuTravail" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="interetPorteAuTravail" value="Insuffisant" id="interetPorteAuTravail" /> <label for="insuffisant">Insuffisant</label>
                        </p>


                        <h3> Comportement général </h3>
                        <p>
                            <label for="presentation"> Présentation : </label>
                            <input type="radio" name="presentation" value="Excellent" id="presentation" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="presentation" value="Bon" id="presentation" /> <label for="bon">Bon</label>
                            <input type="radio" name="presentation" value="Moyen" id="presentation" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="presentation" value="Insuffisant" id="presentation" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="ponctualite"> Ponctualite : </label>
                            <input type="radio" name="ponctualite" value="Excellent" id="ponctualite" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="ponctualite" value="Bon" id="ponctualite" /> <label for="bon">Bon</label>
                            <input type="radio" name="ponctualite" value="Moyen" id="ponctualite" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="ponctualite" value="Insuffisant" id="ponctualite" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="assiduite"> Assiduité : </label>
                            <input type="radio" name="assiduite" value="Excellent" id="assiduite" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="assiduite" value="Bon" id="assiduite" /> <label for="bon">Bon</label>
                            <input type="radio" name="assiduite" value="Moyen" id="assiduite" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="assiduite" value="Insuffisant" id="assiduite" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="expression"> Expression : </label>
                            <input type="radio" name="expression" value="Excellent" id="expression" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="expression" value="Bon" id="expression" /> <label for="bon">Bon</label>
                            <input type="radio" name="expression" value="Moyen" id="expression" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="expression" value="Insuffisant" id="expression" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="sociabilite"> Sociabilité : </label>
                            <input type="radio" name="sociabilite" value="Excellent" id="sociabilite" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="sociabilite" value="Bon" id="sociabilite" /> <label for="bon">Bon</label>
                            <input type="radio" name="sociabilite" value="Moyen" id="sociabilite" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="sociabilite" value="Insuffisant" id="sociabilite" /> <label for="insuffisant">Insuffisant</label>
                        </p>

                        <p>
                            <label for="communication"> Communication : </label>
                            <input type="radio" name="communication" value="Excellent" id="communication" /> <label for="excellent">Excellent</label>
                            <input type="radio" name="communication" value="Bon" id="communication" /> <label for="bon">Bon</label>
                            <input type="radio" name="communication" value="Moyen" id="communication" /> <label for="moyen">Moyen</label>
                            <input type="radio" name="communication" value="Insuffisant" id="communication" /> <label for="insuffisant">Insuffisant</label>
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


                      <h3> Contact Relations Ecoles </h3>
                      <p>
                         <label for="nomRelationsEcoles"> Nom : </label>
                         <input type="text" name="nomRelationsEcoles" id="nomRelationsEcoles"  />
                     </p>

                     <p>
                        <label for="mailRelationsEcoles"> Mail : </label>
                        <input type="text" name="mailRelationsEcoles" id="mailRelationsEcoles" />
                      </p>

                      <p>
                       <label for="telRelationsEcoles"> Télépone : </label>
                       <input type="text" name="telRelationsEcoles" id="telRelationsEcoles" />
                     </p>

                     <h2> Embauche </h2>
                     <p>
                         <label for="embauche"> Embaucheriez-vous le stagiaire si vous en aviez la possibilité ? <i>(Ceci n'a pour but que
d'apprécier les services que pourrait rendre le candidat dans une entreprise)</i> </label>
                         <input type="radio" name="embauche" value="Oui" id="embauche" /> <label for="oui">Oui</label>
                         <input type="radio" name="embauche" value="Peut-etre" id="embauche" /> <label for="peut-etre">Peut-être</label>
                         <input type="radio" name="embauche" value="Non" id="embauche" /> <label for="non">Non</label>
                     </p>

                     <p>
                        <label for="embauchePourquoi"> Pour quelles raisons ?</label>
                        <textarea name="embauchePourquoi" id="embauchePourquoi" ></textarea>
                    </p>

                    <h2> Soutenance </h2>
                    <p>
                        <label for="presentSoutenance"> Seriez-vous présent lors de la soutenance de votre stagiaire ou un autre représentant de l'entreprise ?</label>
                        <input type="radio" name="presentSoutenance" value="Oui" id="presentSoutenance" /> <label for="oui">Oui</label>
                        <input type="radio" name="presentSoutenance" value="Non" id="presentSoutenance" /> <label for="non">Non</label>
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
  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 2 && verifStagiaireTuteur() == true) {
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
                  <h1> Appréciation du stagiaire </h1>
                  <p>
                      Vous avez déjà rempli votre fiche d'appreciation pour ce stagiaire
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

  else if(isset($_SESSION['identifiant']) && $_SESSION['role'] <> 2) {
  ?>
<meta http-equiv="refresh" content="0; URL='../vues/accueil.php'">

    <?php

        }else{
          ?>
      <meta http-equiv="refresh" content="0; URL='../vues/index.html'">
<?php
        }

?>
