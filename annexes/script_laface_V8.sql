-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 13 Juin 2019 à 18:14
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

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`idAdherent`, `nomAdherent`, `prenomAdherent`, `photo_idPhoto`) VALUES
(1, 'ROGER', 'Richard', 3),
(2, 'DURANTEAU', 'Audrey', 4),
(3, 'COCHIN', 'Caroline', 5),
(4, 'MERCERON', 'Dimitri', 6),
(5, 'MAUGENDRE', 'Eddie', 7),
(6, 'FRIOUX', 'Estelle', 8),
(7, 'BARREAU', 'Frédéric', 9),
(8, 'VERGNE', 'Jérôme', 10),
(9, 'DUPE', 'Kévin', 11),
(11, 'GAUTIER', 'Marylaure & Fabrice', 12),
(12, 'PADIOLEAU', 'Christian', 13),
(13, 'BIRON', 'Patrice', 14),
(14, 'aucun', 'Angélina & Priscilla', 1),
(15, 'MERCERON', 'Rachel', 15),
(16, 'NAULEAU', 'Sebastien', 16),
(17, 'RENAUDINEAU', 'Sonia', 2),
(18, 'GIRAUDET', 'Stéphane', 17);

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `idCoordonnees` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(14) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `urlSiteRedirectionCarte` varchar(300) DEFAULT NULL,
  `entreprise_idEntreprise` int(11) DEFAULT NULL,
  `adherent_idAdherent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `coordonnees`
--

INSERT INTO `coordonnees` (`idCoordonnees`, `email`, `tel`, `addresse`, `urlSiteRedirectionCarte`, `entreprise_idEntreprise`, `adherent_idAdherent`) VALUES
(1, 'symbiose.froidfond@gmail.com', '02 51 35 55 56', '52 rue de L’océan 85300 FROIDFOND', 'http://www.symbiose-froidfond.fr/', 1, NULL),
(2, 'zigzagcoiffure@gmail.com', '02 51 35 29 82', '57 rue de l\'Ocean, 85300 FROIDFOND', 'http://www.moncoiffeur.fr/coiffeur-froidfond/', 2, NULL),
(3, 'sarl-boutemine-roger@orange.fr', '02 51 35 61 82', 'Place des Anciens Combattants, 85300 FROIDFOND', 'https://annuaire.118712.fr/Vendee-85/Froidfond-85300/Votre-marche-0969807831_9E0090S00000F70500C10041G', 3, NULL),
(4, 'audrey.aloevera.85@gmail.com', '06 13 65 30 09', '29A chemin de la Bourière, 85300 FROIDFOND', 'https://fr-fr.facebook.com/pg/foreverAudrey85/posts/', 4, NULL),
(5, 'bienassis85@gmail.com', '06 51 52 24 93', 'La Petite Briscotière, 85300 FROIDFOND', 'https://www.bien-assis.com/contact', 5, NULL),
(6, 'dimitrimerceron@orange.fr', '06 15 19 21 66', '4 Les Charmes, 85300 FROIDFOND', 'https://fr-fr.facebook.com/dimitri.merceron.3', 6, NULL),
(7, 'laboiteacouleurseddie@gmail.com', '02 51 55 77 81', '1 impasse des Peupliers, 85300 FROIDFOND', 'https://www.ouest-france.fr/pays-de-la-loire/froidfond-85300/la-boite-couleurs-pignon-sur-rue-4124736', 7, NULL),
(8, 'cedricestelle@orange.fr', '06 88 41 37 74', '8 impasse du Bois Joli, 85300 FROIDFOND', 'https://www.tousvoisins.fr/froidfond/530857-frioux-estelle', 8, NULL),
(9, 'fredericbarreau85@sfr.fr', '02 51 49 12 35', 'ZA Les Terres Neuves, 85300 FROIDFOND', 'https://fr.mappy.com/poi/589b7b030351d167ec4d2ca0#/1/M2/TGeoentity/F589b7b030351d167ec4d2ca0/N151.12061,6.11309,-1.75134,46.90131/Z15/', 9, NULL),
(10, 'jejecoco85@orange.fr', '06 84 33 94 19', '2 les Charmes, 85300 FROIDFOND', 'https://www.pagesjaunes.fr/pros/56689363', 10, NULL),
(11, 'cmobois85@gmail.com', '06 27 24 26 86', 'L\' Enchaizière, 85300 FROIDFOND', NULL, 11, NULL),
(12, 'gautier-f@orange.fr', '02 51 35 53 51', '11 rue du Pont Prieur, 85300 FROIDFOND', 'https://cta2g-challans.controle-technique.com/', 12, NULL),
(13, 'garage.de.ocean@wanadoo.fr', '02 51 68 25 33', '69 bis rue de l\'Océan, 85300 FROIDFOND', 'https://www.allogarage.fr/garages/details-garage-GARAGE-DE-L-OCEAN-14245.html', 13, NULL),
(14, 'biron.maconnerie@gmail.com', '02 51 93 19 76', '1A La Lardière, 85300 FROIDFOND', 'https://www.pagesjaunes.fr/pros/04622736', 14, NULL),
(15, 'rachel.gregoire@orange.fr', '06 75 90 86 83', '2 rue du Pont Prieur, 85300 FROIDFOND', 'https://dlgworld.com/anny-rey/?noredirect=true&lang=fr', 15, NULL),
(16, 'nauleauseb.maconnerie@orange.fr', '02 51 35 35 65', '9 rue du Pont Prieur, 85300 FROIDFOND', 'https://www.pagesjaunes.fr/pros/56894043\r\n', 16, NULL),
(17, 'giraudet.platrerie@orange.fr', '02 51 35 12 17', '45 route de Saint Christophe, Le Rorthais', 'https://www.pagesjaunes.fr/pros/08623010', 17, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `nomEntreprise` varchar(100) DEFAULT NULL,
  `domaineEntreprise` varchar(100) DEFAULT NULL,
  `descriptionEntreprise` tinytext NOT NULL,
  `nomLogoEntreprise` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `nomEntreprise`, `domaineEntreprise`, `descriptionEntreprise`, `nomLogoEntreprise`) VALUES
(1, 'Symbiose', 'Coiffure/Esthétique', 'Salon de coiffure et d’esthétique récemment installé sur Froidfond. Situé en plein centre, impossible de le manquer, de même pour votre coiffure. ', 'logo_symbiose.jpg'),
(2, 'Zig-Zag', 'Coiffure', 'Salon implanté depuis des années dans Froidfond. Il saura avec expérience satisfaire toute vos envies.', 'logo_zig-zag.jpeg'),
(3, 'Votre Marché', 'Alimentation', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_boutemine.jpg'),
(4, 'Aloe Vera Forever', 'Beauté / Bien-être', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(5, 'Bien Assis', 'Tapissier d\'Ameublement', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_bien-assis.jpeg'),
(6, 'Dimitri Merceron', 'Electricité', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_merceron-elec.jpg'),
(7, 'Eddie Maugendre\r\n', 'Peinture', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_eddie-peinture.jpg'),
(8, 'Estelle Frioux', 'Coiffure à domicile', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(9, 'Frédéric Barreau', 'Peinture', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(10, 'Jérôme Vergne', 'Jardinage - Petits travaux de bricolage', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(11, 'Kévin Dupe', 'Menuiserie', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(12, 'Contrôle technique CTA2G', 'Automobile', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_cta2g.jpg'),
(13, 'Garage De l\'Océan', 'Automobile', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(14, 'Patrice Biron', 'Maçonnerie', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL),
(15, 'Anny Rey', 'Conseillère beauté', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_anny-rey.png'),
(16, 'SARL Nauleau', 'Maçonnerie', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'logo_naulleau.jpg'),
(17, 'Stéphane Giraudet', 'Plâtrerie', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', NULL);

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
  `dateEvenement` date NOT NULL,
  `lieuEvenement` varchar(100) NOT NULL,
  `prixEntreeEvenement` float NOT NULL,
  `descriptionEvenement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nomEvenement`, `dateEvenement`, `lieuEvenement`, `prixEntreeEvenement`, `descriptionEvenement`) VALUES
(1, 'site web fini', '2019-06-25', 'place du champ de foire froidfond pres mairies', 4545, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley oi'),
(2, 'ev 5', '2019-10-06', 'garnache', 454, 'lorem ipsum die'),
(3, 'evenement 3', '2019-06-26', 'falleron', 45, 'lorem ipsum');

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
(2, 'zig-zag_1.jpg', 2),
(3, 'boutmine_1.jpg', 3),
(4, 'aloe-vera-forever_1.jpg', 4),
(5, 'bien-assis_1.jpeg', 5),
(6, 'merceron-elec_1.jpg', 6),
(7, 'eddie-peinture_1.jpg', 7),
(8, 'estelle-frioux_1.jpg', 8),
(9, 'frederic-barreau-peinture_1.jpg', 9),
(10, 'jerome-jardinage_1.jpg', 10),
(11, 'kevin-dupe-menuiserie_1.jpg', 11),
(12, 'cta2g_1.jpg', 12),
(13, 'garage-ocean_1.png', 13),
(14, 'patrice-biron-maconnerie_1.jpg', 14),
(15, 'anny-rey_1.jpg', 15),
(16, 'sarl-naulleau_1.jpg', 16),
(17, 'giraudet_platre_1.jpg', 17);

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
  MODIFY `idAdherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `idCoordonnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `entreprise_gere_adherent`
--
ALTER TABLE `entreprise_gere_adherent`
  MODIFY `entreprise_idEntreprise` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
