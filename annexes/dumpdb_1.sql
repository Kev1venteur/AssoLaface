-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 08 Juin 2019 à 22:13
-- Version du serveur :  5.7.26-0ubuntu0.19.04.1
-- Version de PHP :  7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `assolaface`
--
CREATE DATABASE IF NOT EXISTS `assolaface` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assolaface`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `idAdherent` int(11) NOT NULL,
  `nomAdherent` varchar(60) NOT NULL,
  `prenomAdherent` varchar(60) NOT NULL,
  `photo_idPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `idCoordonnees` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(14) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `profilFacebook` varchar(200) DEFAULT NULL,
  `profilInstagram` varchar(200) DEFAULT NULL,
  `profilTwitter` varchar(200) DEFAULT NULL,
  `urlSite` varchar(300) DEFAULT NULL,
  `entreprise_idEntreprise` int(11) DEFAULT NULL,
  `adherent_idAdherent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `coordonnees`
--

INSERT INTO `coordonnees` (`idCoordonnees`, `email`, `tel`, `addresse`, `profilFacebook`, `profilInstagram`, `profilTwitter`, `urlSite`, `entreprise_idEntreprise`, `adherent_idAdherent`) VALUES
(1, NULL, '0251355556', '52 rue de L’océan 85300 FROIDFOND', 'https://www.facebook.com/Symbiose-595962163860119/?ref=page_internal', NULL, NULL, 'http://www.symbiose-froidfond.fr/', 1, NULL),
(2, NULL, '02 51 35 29 82', '57 rue de l\'Ocean, 85300 FROIDFOND', 'https://www.facebook.com/ZIGZAGCOIFFURE85/', NULL, NULL, 'http://www.moncoiffeur.fr/coiffeur-froidfond/', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `nomEntreprise` varchar(100) NOT NULL,
  `domaineEntreprise` varchar(100) NOT NULL,
  `descriptionEntreprise` tinytext NOT NULL,
  `nomLogoEntreprise` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `nomEntreprise`, `domaineEntreprise`, `descriptionEntreprise`, `nomLogoEntreprise`) VALUES
(1, 'Symbiose', 'Coiffure/Esthétique', 'Salon de coiffure et d’esthétique récemment installé sur Froidfond. Situé en plein centre, impossible de le manquer, de même pour votre coiffure. ', 'logo_symbiose.jpg'),
(2, 'Zig-Zag', 'Coiffure', 'Salon implanté depuis des années dans Froidfond. Il saura avec expérience satisfaire toute vos envies.', 'logo_zig-zag.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_gere_adherent`
--

CREATE TABLE `entreprise_gere_adherent` (
  `entreprise_idEntreprise` int(11) NOT NULL,
  `adherent_idAdherent` int(11) NOT NULL,
  `adherent_photo_idPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL,
  `nomEvenement` varchar(100) NOT NULL,
  `dateEvenement` datetime NOT NULL,
  `lieuEvenement` varchar(100) NOT NULL,
  `prixEntreeEvenement` float NOT NULL,
  `descriptionEvenement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `nomPhoto` varchar(200) NOT NULL,
  `entreprise_idEntreprise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `nomPhoto`, `entreprise_idEntreprise`) VALUES
(1, 'symbiose_1.jpg', 1),
(2, 'zig-zag_1.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `loginUtilisateur` varchar(45) NOT NULL,
  `passwordUtilisateur` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `loginUtilisateur`, `passwordUtilisateur`) VALUES
(1, 'assolaface', '$2y$10$PNaKuAQ5UbItUNszPLmLZ.O9jYMI4nJ0BQSsvbprlPZDSGTRXSxpm');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`idAdherent`,`photo_idPhoto`),
  ADD KEY `fk_adherent_photo_idx` (`photo_idPhoto`);

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`idCoordonnees`),
  ADD KEY `fk_coordonnees_entreprise1_idx` (`entreprise_idEntreprise`),
  ADD KEY `fk_coordonnees_adherent1_idx` (`adherent_idAdherent`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `entreprise_gere_adherent`
--
ALTER TABLE `entreprise_gere_adherent`
  ADD PRIMARY KEY (`entreprise_idEntreprise`,`adherent_idAdherent`,`adherent_photo_idPhoto`),
  ADD KEY `fk_entreprise_has_adherent_adherent1_idx` (`adherent_idAdherent`,`adherent_photo_idPhoto`),
  ADD KEY `fk_entreprise_has_adherent_entreprise1_idx` (`entreprise_idEntreprise`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvenement`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `fk_photo_entreprise1_idx` (`entreprise_idEntreprise`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `idAdherent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `idCoordonnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `entreprise_gere_adherent`
--
ALTER TABLE `entreprise_gere_adherent`
  MODIFY `entreprise_idEntreprise` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvenement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `fk_adherent_photo` FOREIGN KEY (`photo_idPhoto`) REFERENCES `photo` (`idPhoto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD CONSTRAINT `fk_coordonnees_adherent1` FOREIGN KEY (`adherent_idAdherent`) REFERENCES `adherent` (`idAdherent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coordonnees_entreprise1` FOREIGN KEY (`entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entreprise_gere_adherent`
--
ALTER TABLE `entreprise_gere_adherent`
  ADD CONSTRAINT `fk_entreprise_has_adherent_adherent1` FOREIGN KEY (`adherent_idAdherent`,`adherent_photo_idPhoto`) REFERENCES `adherent` (`idAdherent`, `photo_idPhoto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entreprise_has_adherent_entreprise1` FOREIGN KEY (`entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_photo_entreprise1` FOREIGN KEY (`entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour la table adherent
--

--
-- Métadonnées pour la table coordonnees
--

--
-- Métadonnées pour la table entreprise
--

--
-- Métadonnées pour la table entreprise_gere_adherent
--

--
-- Métadonnées pour la table evenement
--

--
-- Métadonnées pour la table photo
--

--
-- Métadonnées pour la table utilisateur
--

--
-- Métadonnées pour la base de données assolaface
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
