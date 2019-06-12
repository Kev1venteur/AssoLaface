-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 juin 2019 à 02:12
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdherent` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdherent` varchar(60) NOT NULL,
  `prenomAdherent` varchar(60) NOT NULL,
  `photo_idPhoto` int(11) NOT NULL,
  PRIMARY KEY (`idAdherent`,`photo_idPhoto`),
  KEY `fk_adherent_photo_idx` (`photo_idPhoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

DROP TABLE IF EXISTS `coordonnees`;
CREATE TABLE IF NOT EXISTS `coordonnees` (
  `idCoordonnees` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(14) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `urlSiteRedirectionCarte` varchar(300) DEFAULT NULL,
  `entreprise_idEntreprise` int(11) DEFAULT NULL,
  `adherent_idAdherent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCoordonnees`),
  KEY `fk_coordonnees_entreprise1_idx` (`entreprise_idEntreprise`),
  KEY `fk_coordonnees_adherent1_idx` (`adherent_idAdherent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`idCoordonnees`, `email`, `tel`, `addresse`, `urlSiteRedirectionCarte`, `entreprise_idEntreprise`, `adherent_idAdherent`) VALUES
(1, NULL, '02 51 35 55 56', '52 rue de L’océan 85300 FROIDFOND', 'http://www.symbiose-froidfond.fr/', 1, NULL),
(2, NULL, '02 51 35 29 82', '57 rue de l\'Ocean, 85300 FROIDFOND', 'http://www.moncoiffeur.fr/coiffeur-froidfond/', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(100) NOT NULL,
  `domaineEntreprise` varchar(100) NOT NULL,
  `descriptionEntreprise` tinytext NOT NULL,
  `nomLogoEntreprise` varchar(200) NOT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `nomEntreprise`, `domaineEntreprise`, `descriptionEntreprise`, `nomLogoEntreprise`) VALUES
(1, 'Symbiose', 'Coiffure/Esthétique', 'Salon de coiffure et d’esthétique récemment installé sur Froidfond. Situé en plein centre, impossible de le manquer, de même pour votre coiffure. ', 'logo_symbiose.jpg'),
(2, 'Zig-Zag', 'Coiffure', 'Salon implanté depuis des années dans Froidfond. Il saura avec expérience satisfaire toute vos envies.', 'logo_zig-zag.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_gere_adherent`
--

DROP TABLE IF EXISTS `entreprise_gere_adherent`;
CREATE TABLE IF NOT EXISTS `entreprise_gere_adherent` (
  `entreprise_idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `adherent_idAdherent` int(11) NOT NULL,
  `adherent_photo_idPhoto` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_idEntreprise`,`adherent_idAdherent`,`adherent_photo_idPhoto`),
  KEY `fk_entreprise_has_adherent_adherent1_idx` (`adherent_idAdherent`,`adherent_photo_idPhoto`),
  KEY `fk_entreprise_has_adherent_entreprise1_idx` (`entreprise_idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `nomEvenement` varchar(100) NOT NULL,
  `dateEvenement` datetime NOT NULL,
  `lieuEvenement` varchar(100) NOT NULL,
  `prixEntreeEvenement` float NOT NULL,
  `descriptionEvenement` text NOT NULL,
  PRIMARY KEY (`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `nomPhoto` varchar(200) NOT NULL,
  `entreprise_idEntreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `fk_photo_entreprise1_idx` (`entreprise_idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `nomPhoto`, `entreprise_idEntreprise`) VALUES
(1, 'symbiose_1.jpg', 1),
(2, 'zig-zag_1.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `loginUtilisateur` varchar(45) NOT NULL,
  `passwordUtilisateur` char(60) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `loginUtilisateur`, `passwordUtilisateur`) VALUES
(1, 'assolaface', '$2y$10$PNaKuAQ5UbItUNszPLmLZ.O9jYMI4nJ0BQSsvbprlPZDSGTRXSxpm');

--
-- Contraintes pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
