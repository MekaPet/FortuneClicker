-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Septembre 2015 à 13:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `fortuneclickerv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `effect_type`
--

CREATE TABLE IF NOT EXISTS `effect_type` (
  `id_effect_type` int(11) NOT NULL AUTO_INCREMENT,
  `effect` varchar(5) NOT NULL,
  PRIMARY KEY (`id_effect_type`),
  UNIQUE KEY `effect` (`effect`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `effect_type`
--

INSERT INTO `effect_type` (`id_effect_type`, `effect`) VALUES
(2, '*'),
(1, '+');

-- --------------------------------------------------------

--
-- Structure de la table `farmer`
--

CREATE TABLE IF NOT EXISTS `farmer` (
  `id_farmer` int(11) NOT NULL AUTO_INCREMENT,
  `id_media` int(11) DEFAULT NULL,
  `dateAdd` date NOT NULL,
  `DateUpdate` date NOT NULL,
  PRIMARY KEY (`id_farmer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `farmer`
--

INSERT INTO `farmer` (`id_farmer`, `id_media`, `dateAdd`, `DateUpdate`) VALUES
(1, NULL, '2015-09-10', '2015-09-10'),
(2, NULL, '2015-09-10', '2015-09-10'),
(3, NULL, '2015-09-10', '2015-09-10'),
(4, NULL, '2015-09-08', '2015-09-08');

-- --------------------------------------------------------

--
-- Structure de la table `farmer_lang`
--

CREATE TABLE IF NOT EXISTS `farmer_lang` (
  `Designation` text NOT NULL,
  `id_Farmer` int(11) NOT NULL,
  `id_Lang` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Farmer`,`id_Lang`),
  KEY `id_Lang` (`id_Lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `farmer_lang`
--

INSERT INTO `farmer_lang` (`Designation`, `id_Farmer`, `id_Lang`, `Name`) VALUES
('auto-click  ', 1, 1, 'click'),
('Permet de piocher', 2, 1, 'pioche'),
('Employer de mine    ', 3, 1, 'mineur'),
('Nouvelle méthode de minage', 4, 1, 'mine');

-- --------------------------------------------------------

--
-- Structure de la table `farmer_level`
--

CREATE TABLE IF NOT EXISTS `farmer_level` (
  `id_farmer_level` int(11) NOT NULL AUTO_INCREMENT,
  `id_farmer` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `goldPerTick` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_farmer_level`),
  KEY `FK_farmer_farmerLevel` (`id_farmer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `farmer_level`
--

INSERT INTO `farmer_level` (`id_farmer_level`, `id_farmer`, `cost`, `goldPerTick`, `level`) VALUES
(7, 1, 10, 1, 1),
(8, 1, 20, 2, 2),
(9, 2, 25, 3, 1),
(10, 3, 50, 8, 1),
(11, 4, 100, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id_lang` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `shortName` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id_lang`, `name`, `shortName`) VALUES
(1, 'francais', 'FR');

-- --------------------------------------------------------

--
-- Structure de la table `upgrade`
--

CREATE TABLE IF NOT EXISTS `upgrade` (
  `id_upgrade` int(11) NOT NULL AUTO_INCREMENT,
  `value_effect` float NOT NULL,
  `type_effect` int(11) NOT NULL,
  `id_farmer` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`id_upgrade`),
  KEY `type_effect` (`type_effect`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `upgrade_lang`
--

CREATE TABLE IF NOT EXISTS `upgrade_lang` (
  `id_lang` int(11) NOT NULL,
  `id_upgrade` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lang`,`id_upgrade`),
  KEY `id_upgrade` (`id_upgrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `save` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `mail`, `save`) VALUES
(8, 'kedorev', ',,9u/f0OQtwJY', 'kedorev@gmail.com', ''),
(13, 'moi', ',,9u/f0OQtwJY', 'zer@ryt3.de', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `farmer_lang`
--
ALTER TABLE `farmer_lang`
  ADD CONSTRAINT `farmer_lang_ibfk_2` FOREIGN KEY (`id_Farmer`) REFERENCES `farmer` (`id_farmer`),
  ADD CONSTRAINT `farmer_lang_ibfk_1` FOREIGN KEY (`id_Lang`) REFERENCES `lang` (`id_lang`);

--
-- Contraintes pour la table `farmer_level`
--
ALTER TABLE `farmer_level`
  ADD CONSTRAINT `FK_farmer_farmerLevel` FOREIGN KEY (`id_farmer`) REFERENCES `farmer` (`id_farmer`);

--
-- Contraintes pour la table `upgrade`
--
ALTER TABLE `upgrade`
  ADD CONSTRAINT `upgrade_ibfk_1` FOREIGN KEY (`type_effect`) REFERENCES `effect_type` (`id_effect_type`);

--
-- Contraintes pour la table `upgrade_lang`
--
ALTER TABLE `upgrade_lang`
  ADD CONSTRAINT `upgrade_lang_ibfk_2` FOREIGN KEY (`id_upgrade`) REFERENCES `upgrade` (`id_upgrade`),
  ADD CONSTRAINT `upgrade_lang_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `lang` (`id_lang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
