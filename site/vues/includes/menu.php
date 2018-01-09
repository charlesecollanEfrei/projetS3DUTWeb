<?php

	switch ($_SESSION['role']) {
		case '1':
			echo '
				<a href="../vues/accueil.php">Accueil</a>
				<a href="../vues/ficheLocalisation.php">Fiche Localisation</a>
				<a href="../vues/ficheAvis.php">Avis Stage</a>
				<a href="../vues/disponibilites.php">Disponibilités</a>
				<a href="../controleurs/deconnexion.php">Deconnexion</a>
			';
			break;

		case '2':
			echo '
				<a href="../vues/accueil.php">Accueil</a>
				<a href="../vues/choixEtudiantFicheAppriciation.php">Avis Stage</a>
				<a href="../vues/disponibilites.php">Disponibilité</a>
				<a href="../controleurs/deconnexion.php">Deconnexion</a>
			';
			break;

		case '3':
			echo '
				<a href="../vues/accueil.php">Accueil</a>
				<a href="../vues/choixEtudiantCompteRenduVisite.php">Compte-Rendu Visite</a>
				<a href="../vues/consulterListeStage.php">Stages</a>
				<a href="../vues/disponibilites.php">Disponibilité</a>
				<a href="../controleurs/deconnexion.php">Deconnexion</a>
			';
			break;

		case '4':
			echo '
				<a href="../vues/accueil.php">Accueil</a>
				<a href="../vues/consulterListeStage.php">Stages</a>
				<a href="../vues/disponibilites.php">Disponibilité</a>
				<a href="../controleurs/deconnexion.php">Deconnexion</a>
			';
			break;

		default:
			echo '
				<a href="../vues/accueil.php">Accueil</a>
				<a href="../controleurs/deconnexion.php">Deconnexion</a>
			';
			break;
	}
?>
