<!-- On vérifie que le membre est connecté car c'est une page reservée aux membres -->
<?php

    session_start();

    require_once("../controleurs/fonctions.php");
    require_once("../controleurs/recuperationInfosEtudiant.php");
    require_once("../controleurs/verificationFicheLocalisation.php");


    // Pour afficher les eventuelles erreurs (Utilisateurs MAC)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['identifiant']) && $_SESSION['role'] == 1 && verifFicheAvis() == false) {
      if($fiche == true) {
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
                <h1> Avis de l'étudiant</h1>
                <p>
                    <form method="post" action="../controleurs/controleurFicheAvis.php">
                        <h2> Rémunération </h2>
                        <p>
                            <label for="stageRemunere"> Votre stage a-t-il été remunéré ? : </label>
                            <input type="radio" name="stageRemunere" value="Oui" id="stageRemunere" /> <label for="oui">Oui</label>
                            <input type="radio" name="stageRemunere" value="Non" id="stageRemunere" /> <label for="non">Non</label>
                        </p>

                        <p>
                           <label for="remuneration"> Si oui, combien ? : </label>
                           <input type="text" name="remuneration" id="remuneration" value="0" />
                       </p>

                        <h2> Encadrement </h2>
                        <p>
                          <label for="encadreInfo"> Avez-vous été encadré directement par un informaticien : </label>
                          <input type="radio" name="encadreInfo" value="Oui" id="encadreInfo" /> <label for="oui">Oui</label>
                          <input type="radio" name="encadreInfo" value="Non" id="encadreInfo" /> <label for="non">Non</label>
                        </p>

                        <p>
                          <label for="appelInfo"> Si non, en cas de besoin pouviez-vous faire appel à un informaticien ? </label>
                          <input type="radio" name="appelInfo" value="Oui" id="appelInfo" /> <label for="oui">Oui</label>
                          <input type="radio" name="appelInfo" value="Non" id="appelInfo" /> <label for="non">Non</label>
                        </p>

                        <p>
                          <label for="travaillerSeul"> Dans le cadre de votre stage, avez-vous travaillé seul ? </label>
                          <input type="radio" name="travaillerSeul" value="Oui" id="travaillerSeul" /> <label for="oui">Oui</label>
                          <input type="radio" name="travaillerSeul" value="Non" id="travaillerSeul" /> <label for="non">Non</label>
                        </p>

                        <p>
                           <label for="tailleEquipe"> Si non, taille de l'équipe : </label>
                           <input type="text" name="tailleEquipe" id="tailleEquipe" value="0"/>
                       </p>

                       <h2> Environnement Général </h2>
                       <p>
                         <label for="typeMateriel"> Type de matériel : </label>
                         <input type="checkbox" name="typeMateriel" id="typeMateriel" value="PC" /> <label for="pc">PC</label>
                         <input type="checkbox" name="typeMateriel" id="typeMateriel" value="Téléphone" /> <label for="telephone">Téléphone</label>
                       </p>

                       <p>
                         <label for="systeme"> Système : </label>
                         <input type="checkbox" name="systeme" id="systeme" value="UNIX"/> <label for="unix">UNIX</label>
                         <input type="checkbox" name="systeme" id="systeme" value="LINIX" /> <label for="linux">LINUX</label>
                         <input type="checkbox" name="systeme" id="systeme" value="NT"/> <label for="nt">NT</label>
                         <input type="checkbox" name="systeme" id="systeme" value="WINDOWS" /> <label for="windows">WINDOWS</label>
                       </p>

                       <p>
                          <label for="langages">Langages (séparés par une virgule) : </label>
                          <textarea name="langages" id="langages"></textarea>
                       </p>

                      <h2> Objet principale du stage</h2>
                      <p> <i> 2 cases maximum à cocher </i> </p>
                      <p>
                        <input type="checkbox" name="objetStage" id="objetStage" values="Système" /> <label for="systeme">Système</label>
                        <input type="checkbox" name="objetStage" id="objetStage" values="Multimédia" /> <label for="multimedia">Multimédia</label>
                        <input type="checkbox" name="objetStage" id="objetStage" values="Réseaux" /> <label for="reseaux">Réseaux</label>
                        <input type="checkbox" name="objetStage" id="objetStage" values="Développement WEB" /> <label for="web">Développement WEB</label>
                        <input type="checkbox" name="objetStage" id="objetStage" values="Autre Développement" /> <label for="developpement">Autre Développement</label>
                        <input type="checkbox" name="objetStage" id="objetStage" values="Bases de données" /> <label for="bdd">Bases de données</label>
                      </p>

                      <h2> Avis de l'étudiant sur le stage </h2>
                      <p>
                        <label for="conditions"> Etes-vous totalement satisfait des conditions dans lesquelles ce sont déroulées votre stage ?</label>
                        <input type="radio" name="conditions" value="Oui" id="conditions" /> <label for="oui">Oui</label>
                        <input type="radio" name="conditions" value="Non" id="conditions" /> <label for="non">Non</label>
                      </p>

                      <p>
                         <label for="conditionsPourquoi"> Si non, expliquez en quelques mots pourquoi : </label>
                         <textarea name="conditionsPourquoi" id="conditionsPourquoi"></textarea>
                     </p>

                     <h2> Le stage obligatoire de fin d'études doit répondre à plusieurs objectifs : </h2>
                     <p>
                        D'abord, il vous introduit dans le monde du travail, dans une ambiance que le futur professionnel de
                        l'Informatique doit connaître avec ses contraintes de temps, de budget, de fonctionnement d'équipe, etc...
                    </p>
                    <p>
                        Il vous permet d'être confronté, non plus à des exercices scolaires dont l'intérêt est souvent purement
                        pédagogique, mais à des applications concrètes dans les domaines les plus variés.
                    </p>
                    <p>
                        Il vous permet, soit d'approfondir les connaissances acquises à l'IUT en étant confronté à des problèmes
                        en vraie grandeur, soit de découvrir des environnements de travail, des méthodes d'analyse, des langages
                        nouveaux.
                    </p>

                    <p>
                      <label for="objectif"> Ces objectifs ont-ils été atteints :</label>
                      <input type="radio" name="objectif" value="Oui" id="objectif" /> <label for="oui">Oui</label>
                      <input type="radio" name="objectif" value="Non" id="objectif" /> <label for="non">Non</label>
                    </p>

                    <p>
                       <label for="objectifPourquoi"> Si non, expliquez en quelques mots pourquoi : </label>
                       <textarea name="objectifPourquoi" id="objectifPourquoi"></textarea>
                   </p>

                   <h2>Avis de l'étudiant sur les enseignements dispensés à l'IUT</h2>
                   <p>
                     <label for="matiere"> Après cette expérience dans l’entreprise, estimez-vous que certaines matières enseignées n’ont pas été assez
développées ?</label>
                     <input type="radio" name="matiere" value="Oui" id="matiere" /> <label for="oui">Oui</label>
                     <input type="radio" name="matiere" value="Non" id="matiere" /> <label for="non">Non</label>
                   </p>

                   <p>
                      <label for="matiereListe"> Si oui, précisez lesquelles : </label>
                      <textarea name="matiereListe" id="matiereListe"></textarea>
                  </p>

                  <h2> Apport du stage dans votre projet personnel et professionnel </h2>
                  <p>
                     <label for="apportStage"> Précisez en quelques lignes comment le stage a enrichi ou modifié votre projet personnel et professionnel : </label>
                     <textarea name="apportStage" id="apportStage"></textarea>
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
else if ($fiche == false){
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
                    Vous devez remplir votre fiche de localisation avant de pouvoir acceder à la fiche d'avis.
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
  }

  else if (isset($_SESSION['identifiant']) && $_SESSION['role'] == 1 && verifFicheAvis() == true){
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
                    <h1> Avis de Stage</h1>
                    <p>
                      Vous avez déjà rempli votre fiche d'avis
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
