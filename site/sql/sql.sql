-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 18 Janvier 2016
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `gestionStages`
--

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE `disponibilites` (
  `id` int(5) NOT NULL,
  `id_utilisateur` int(5) NOT NULL,
  `dj1` int(1) NOT NULL COMMENT '0 non, 1 oui',
  `dj2` int(1) NOT NULL COMMENT '0 non, 1 oui',
  `dj3` int(1) NOT NULL COMMENT '0 non, 1 oui',
  `dj4` int(1) NOT NULL COMMENT '0 non, 1 oui'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `disponibilites`
--

INSERT INTO `disponibilites` (`id`, `id_utilisateur`, `dj1`, `dj2`, `dj3`, `dj4`) VALUES
(1, 1, 0, 1, 1, 0),
(2, 21, 0, 1, 1, 0),
(3, 2, 1, 1, 1, 1),
(4, 3, 1, 0, 0, 0),
(5, 4, 1, 1, 0, 1),
(6, 5, 1, 1, 1, 1),
(7, 6, 0, 1, 1, 0),
(8, 7, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `adresse`, `ville`, `codePostal`) VALUES
(1, 'Accenture', '118 avenue de France', 'Paris', 92160),
(2, 'Blizzard', '125 avenue de la Republique', 'Paris', 75014),
(3, 'HP', '24 rue la beige', 'Orsay', 92160),
(4, 'Canon', '12 rue de la maquette', 'Paris', 75013),
(5, 'Apple', '10 rue de la defense', 'Paris', 91100),
(6, 'Nissan', '98 rue du panthÃ©on', 'Paris', 94250);

-- --------------------------------------------------------

--
-- Structure de la table `ficheAppreciation`
--

CREATE TABLE `ficheAppreciation` (
  `id` int(5) NOT NULL,
  `id_etudiant` int(5) NOT NULL,
  `id_entreprise` int(5) NOT NULL,
  `id_tuteurEntreprise` int(5) NOT NULL,
  `niveauDeConnaissance` varchar(50) NOT NULL,
  `organisation` varchar(50) NOT NULL,
  `initiative` varchar(50) NOT NULL,
  `perseverance` varchar(50) NOT NULL,
  `efficacite` varchar(50) NOT NULL,
  `interetPorteAuTravail` varchar(50) NOT NULL,
  `presentation` varchar(50) NOT NULL,
  `ponctualite` varchar(50) NOT NULL,
  `assiduite` varchar(50) NOT NULL,
  `expression` varchar(50) NOT NULL,
  `sociabilite` varchar(50) NOT NULL,
  `communication` varchar(50) NOT NULL,
  `nomRH` varchar(50) NOT NULL,
  `mailRH` varchar(100) NOT NULL,
  `telRH` int(20) NOT NULL,
  `nomTaxeApprenti` varchar(50) NOT NULL,
  `mailTaxeApprenti` varchar(100) NOT NULL,
  `telTaxeApprenti` int(20) NOT NULL,
  `nomRelationsEcoles` varchar(50) NOT NULL,
  `mailRelationsEcoles` varchar(100) NOT NULL,
  `telRelationsEcoles` int(20) NOT NULL,
  `embauche` varchar(50) NOT NULL,
  `embouchePourquoi` varchar(1000) NOT NULL,
  `presentSoutenance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ficheAvis`
--

CREATE TABLE `ficheAvis` (
  `id` int(5) NOT NULL,
  `id_etudiant` int(5) NOT NULL,
  `id_entreprise` int(5) NOT NULL,
  `id_tuteurEntreprise` int(5) NOT NULL,
  `remuneration` int(10) NOT NULL,
  `encadreParInformaticien` varchar(50) COLLATE utf8_bin NOT NULL,
  `appelAInformaticien` varchar(50) COLLATE utf8_bin NOT NULL,
  `equipe` int(50) NOT NULL,
  `typeMateriel` varchar(255) COLLATE utf8_bin NOT NULL,
  `systeme` varchar(255) COLLATE utf8_bin NOT NULL,
  `langages` varchar(1000) COLLATE utf8_bin NOT NULL,
  `objetStage` varchar(255) COLLATE utf8_bin NOT NULL,
  `conditions` varchar(50) COLLATE utf8_bin NOT NULL,
  `conditionsPourquoi` varchar(1000) COLLATE utf8_bin NOT NULL,
  `objectif` varchar(50) COLLATE utf8_bin NOT NULL,
  `objectifPourquoi` varchar(1000) COLLATE utf8_bin NOT NULL,
  `matiere` varchar(50) COLLATE utf8_bin NOT NULL,
  `matierePasAssez` varchar(1000) COLLATE utf8_bin NOT NULL,
  `projetPersoProf` varchar(5000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `ficheAvis`
--

INSERT INTO `ficheAvis` (`id`, `id_etudiant`, `id_entreprise`, `id_tuteurEntreprise`, `remuneration`, `encadreParInformaticien`, `appelAInformaticien`, `equipe`, `typeMateriel`, `systeme`, `langages`, `objetStage`, `conditions`, `conditionsPourquoi`, `objectif`, `objectifPourquoi`, `matiere`, `matierePasAssez`, `projetPersoProf`) VALUES
(0, 1, 1, 26, 1000, 'Oui', 'Non', 10, 'TÃ©lÃ©phone', 'WINDOWS', 'PHP, SQL, HTML', 'on', 'Oui', '', 'Oui', '', 'Non', '', 'Cela m a permis de savoir que je voulais vraiment faire du dÃ©veloppement web.');

-- --------------------------------------------------------

--
-- Structure de la table `ficheCompteRendu`
--

CREATE TABLE `ficheCompteRendu` (
  `id` int(5) NOT NULL,
  `id_etudiant` int(5) NOT NULL,
  `id_tuteurEnseignant` int(5) NOT NULL,
  `id_entreprise` int(5) NOT NULL,
  `id_tuteurEntreprise` int(5) NOT NULL,
  `lieuStage` varchar(50) NOT NULL,
  `nomRH` varchar(255) NOT NULL,
  `mailRH` varchar(255) NOT NULL,
  `telRH` int(20) NOT NULL,
  `nomTaxeApprenti` varchar(255) NOT NULL,
  `mailTaxeApprenti` varchar(255) NOT NULL,
  `telTaxeApprenti` int(20) NOT NULL,
  `encadreInfo` varchar(50) NOT NULL,
  `appelInfo` varchar(50) DEFAULT NULL,
  `tailleEquipe` int(20) NOT NULL COMMENT '0 si travail seul',
  `objetStage` varchar(50) NOT NULL,
  `travail` varchar(50) NOT NULL,
  `commentaires` varchar(1000) NOT NULL,
  `matiere` varchar(50) NOT NULL,
  `matiereListe` varchar(1000) DEFAULT NULL,
  `avisGeneral` varchar(1000) NOT NULL,
  `accueillir` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ficheCompteRendu`
--

INSERT INTO `ficheCompteRendu` (`id`, `id_etudiant`, `id_tuteurEnseignant`, `id_entreprise`, `id_tuteurEntreprise`, `lieuStage`, `nomRH`, `mailRH`, `telRH`, `nomTaxeApprenti`, `mailTaxeApprenti`, `telTaxeApprenti`, `encadreInfo`, `appelInfo`, `tailleEquipe`, `objetStage`, `travail`, `commentaires`, `matiere`, `matiereListe`, `avisGeneral`, `accueillir`) VALUES
(1, 1, 21, 1, 26, 'Oui', 'Remond', 'marine.remond@accenture.com', 155567687, 'Efra', 'julien.efra@accenture.com', 155568723, 'Oui', 'Non', 10, 'Developpement Web,', 'TrÃ¨s satisfait', 'Rien a redire, tout se passe bien.', 'Non', '', 'L Ã©tudiant est bien intÃ©grÃ© et a une charge de travail raisonnable.', 'Oui');

-- --------------------------------------------------------

--
-- Structure de la table `ficheLocalisationStage`
--

CREATE TABLE `ficheLocalisationStage` (
  `id` int(5) NOT NULL,
  `id_etudiant` int(5) NOT NULL,
  `id_entreprise` int(5) NOT NULL,
  `id_tuteurEntreprise` int(5) NOT NULL,
  `id_tuteurEnseignant` int(5) NOT NULL,
  `dateDebutStage` varchar(20) NOT NULL,
  `dateFinStage` varchar(20) NOT NULL,
  `adresseEtudiant` varchar(100) NOT NULL,
  `villeEtudiant` varchar(50) NOT NULL,
  `codePostalEtudiant` int(10) NOT NULL,
  `emailAutre` varchar(50) NOT NULL,
  `jourSemaineRencontre` varchar(50) NOT NULL,
  `sujetStage` varchar(255) NOT NULL,
  `fichier1` varchar(255) DEFAULT NULL,
  `fichier2` varchar(255) DEFAULT NULL,
  `fichier3` varchar(255) DEFAULT NULL,
  `fichier4` varchar(255) DEFAULT NULL,
  `fichier5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ficheLocalisationStage`
--

INSERT INTO `ficheLocalisationStage` (`id`, `id_etudiant`, `id_entreprise`, `id_tuteurEntreprise`, `id_tuteurEnseignant`, `dateDebutStage`, `dateFinStage`, `adresseEtudiant`, `villeEtudiant`, `codePostalEtudiant`, `emailAutre`, `jourSemaineRencontre`, `sujetStage`, `fichier1`, `fichier2`, `fichier3`, `fichier4`, `fichier5`) VALUES
(1, 1, 1, 26, 21, '11/04/2016', '01/07/2016', '48 rue des Rabats', 'Antony', 92160, 'charles.ecollan@outlook.com', 'Jeudi', 'CrÃ©ation d un nouveau site internet CFTC Accenture', 'imageAccenture.jpg', '', '', '', ''),
(2, 2, 2, 27, 21, '11/04/2016', '01/07/2016', '67 avenue le buisson', 'Paris', 75014, 'quentin.bresson@hotmail.fr', 'Lundi', 'Remise Ã  jour des patch HearthStone', '', '', '', '', ''),
(3, 3, 3, 28, 0, '11/04/2016', '01/07/2016', '24 rue de la forteresse', 'Antony', 92160, 'hubert.mouginot@gmail.com', 'Vendredi', 'Creation d un processeur', '', '', '', '', ''),
(4, 4, 4, 29, 0, '11/04/2016', '01/07/2016', '67 rue du coq', 'Paris', 75013, 'david.ha@apple.com', 'Mercredi', 'Mise Ã  niveau des objectifs', '', '', '', '', ''),
(5, 5, 5, 30, 0, '11/04/2016', '01/07/2016', '87 rue des Ulis', 'Ulis', 91100, 'anita.radja@hotmai.fr', 'Mardi', 'Reparation ordinateurs', '', '', '', '', ''),
(6, 6, 6, 31, 0, '11/04/2016', '01/07/2016', '76 rue de la plaque', 'Accueil', 94250, 'nathalie.rivo@gmail.com', 'Vendredi', 'Nouveau systÃ¨me mÃ©canique informatique', '', '', '', '', ''),
(7, 7, 1, 32, 0, '01/04/2016', '01/07/2016', '76 rue d Orsay', 'Orsay', 91240, 'antoine.cherpentier@hotmail.com', 'Jeudi', 'Mise en place intranet', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(5) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `identifiant`, `mdp`, `nom`, `prenom`, `telephone`, `email`, `role`) VALUES
(1, 'charles.ecollan', 'azerty', 'Ecollan', 'Charles', '0614360621', 'charles.ecollan@u-psud.fr', 1),
(2, 'quentin.bresson', 'azerty', 'Bresson', 'Quentin', '0662749283', 'quentin.bresson@u-psud.fr', 1),
(3, 'hubert.mouginot', 'azerty', 'Mouginot', 'Hubert', '0645876122', 'hubert.mouginot@u-psud.fr', 1),
(4, 'david.ha', 'azerty', 'Ha', 'David', '0765672233', 'david.ha@u-psud.fr', 1),
(5, 'anita.radja', 'azerty', 'Radja', 'Anita', '0687876545', 'anita.radja@u-psud.fr', 1),
(6, 'nathalie.rivo', 'azerty', 'Rivo', 'Nathalie', '0687876545', 'nathalie.rivo@u-psud.fr', 1),
(7, 'antoine.cherpentier', 'azerty', 'Cherpentier', 'Antoine', '0687876545', 'antoine.cherpentier@u-psud.fr', 1),
(8, 'angelique.etienne', 'azerty', 'Etienne', 'Angelique', '0687876545', 'angelique.etienne@u-psud.fr', 1),
(9, 'charles.blot', 'azerty', 'Blot', 'Charles', '0687876545', 'charles.blot@u-psud.fr', 1),
(10, 'patryk.warchol', 'azerty', 'Warchol', 'Patryk', '0876457234', 'patryk.warchol@u-psud.fr', 1),
(11, 'tiphaine.valin', 'azerty', 'Valin', 'Tiphaine', '0687876545', 'tiphaine.valin@u-psud.fr', 1),
(12, 'melanie.palfray', 'azerty', 'Palfray', 'Melanie', '0978656727', 'melanie.palfray@u-psud.fr', 1),
(13, 'roger.bertrand', 'azerty', 'Bertrand', 'Roger', '0978656727', 'roger.bertrand@u-psud.fr', 1),
(14, 'bernard.henry', 'azerty', 'Henry', 'Bernard', '0978656727', 'bernard.henry@u-psud.fr', 1),
(15, 'eric.martelot', 'azerty', 'Martelot', 'Eric', '0787656765', 'eric.martelot@-psud.fr', 1),
(16, 'virginie.pruvost', 'azerty', 'Pruvost', 'Virginie', '0656764234', 'virginie.pruvost@u-psud.fr', 4),
(17, 'bernard.beaumont', 'azerty', 'Beaumont', 'Bernard', '0656764234', 'bernard.beaumont@u-psud.fr', 4),
(18, 'emmanuel.motchane', 'azerty', 'Motchane', 'Emmanuel', '0656764234', 'emmanuel.motchane@u-psud.fr', 4),
(19, 'elodie.leducq', 'azerty', 'Leducq', 'Elodie', '0656764234', 'elodie.leducq@u-psud.fr', 4),
(20, 'helene.lebreton', 'azerty', 'Le Breton', 'Helene', '0656764234', 'helene.lebreton@u-psud.fr', 4),
(21, 'julien.ciaffi', 'azerty', 'Ciaffi', 'Julien', '0656764234', 'julien.ciaffi@u-psud.fr', 3),
(22, 'jean.marquet', 'azerty', 'Marquet', 'Jean', '0656764234', 'jean.marquet@u-psud.fr', 4),
(23, 'eric.blaudez', 'azerty', 'Blaudez', 'Eric', '0656764234', 'eric.blaudez@u-psud.fr', 4),
(24, 'stella.louisin', 'azerty', 'Louisin', 'Stella', '0656764234', 'stella.louisin@u-psud.fr', 4),
(25, 'xavier.lacour', 'azerty', 'Lacour', 'Xavier', '0656764234', 'xavier.lacour@u-psud.fr', 4),
(26, 'christophe.ecollan', 'azerty', 'Ecollan', 'Christophe', '', 'christophe.ecollan@accenture.com', 2),
(27, 'roquette.blizzard', 'azerty', 'Blizzard', 'Roquette', '', 'roquette.blizzard@blizzard.com', 2),
(28, 'quentin.brique', 'azerty', 'Brique', 'Quentin', '', 'quentin.brique@hp.com', 2),
(29, 'alexis.bourdin', 'azerty', 'Bourdin', 'Alexis', '', 'alexis.bourdin@canon.com', 2),
(30, 'frederic.chopin', 'azerty', 'Chopin', 'Frederic', '', 'frederic.chopin@apple.com', 2),
(31, 'arthur.plop', 'azerty', 'Plop', 'Arthur', '', 'arthur.plop@nissan.com', 2),
(32, 'marine.blard', 'azerty', 'Blard', 'Marine', '', 'marine.blard@accenture.com', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ficheAppreciation`
--
ALTER TABLE `ficheAppreciation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ficheCompteRendu`
--
ALTER TABLE `ficheCompteRendu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ficheLocalisationStage`
--
ALTER TABLE `ficheLocalisationStage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ficheAppreciation`
--
ALTER TABLE `ficheAppreciation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ficheCompteRendu`
--
ALTER TABLE `ficheCompteRendu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ficheLocalisationStage`
--
ALTER TABLE `ficheLocalisationStage`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
