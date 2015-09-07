-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 12 Août 2015 à 09:58
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
CREATE DATABASE IF NOT EXISTS `fortuneclickerv2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fortuneclickerv2`;

-- --------------------------------------------------------

--
-- Structure de la table `effect_type`
--

DROP TABLE IF EXISTS `effect_type`;
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

DROP TABLE IF EXISTS `farmer`;
CREATE TABLE IF NOT EXISTS `farmer` (
  `id_farmer` int(11) NOT NULL AUTO_INCREMENT,
  `id_media` int(11) DEFAULT NULL,
  `dateAdd` date NOT NULL,
  `DateUpdate` date NOT NULL,
  PRIMARY KEY (`id_farmer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `farmer`
--

INSERT INTO `farmer` (`id_farmer`, `id_media`, `dateAdd`, `DateUpdate`) VALUES
(1, NULL, '0000-00-00', '0000-00-00'),
(2, NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `farmer_lang`
--

DROP TABLE IF EXISTS `farmer_lang`;
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
('test', 1, 1, 'name'),
('pioche', 2, 1, 'pioche');

-- --------------------------------------------------------

--
-- Structure de la table `farmer_level`
--

DROP TABLE IF EXISTS `farmer_level`;
CREATE TABLE IF NOT EXISTS `farmer_level` (
  `id_farmer_level` int(11) NOT NULL AUTO_INCREMENT,
  `id_farmer` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `goldPerTick` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_farmer_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `farmer_level`
--

INSERT INTO `farmer_level` (`id_farmer_level`, `id_farmer`, `cost`, `goldPerTick`, `level`) VALUES
(1, 1, 10, 1, 1),
(2, 1, 20, 2, 2),
(3, 1, 40, 4, 3),
(4, 2, 50, 5, 2),
(5, 2, 200, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

DROP TABLE IF EXISTS `lang`;
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
-- Structure de la table `ps_access`
--

DROP TABLE IF EXISTS `ps_access`;
CREATE TABLE IF NOT EXISTS `ps_access` (
  `id_profile` int(10) unsigned NOT NULL,
  `id_tab` int(10) unsigned NOT NULL,
  `view` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  PRIMARY KEY (`id_profile`,`id_tab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `upgrade`
--

DROP TABLE IF EXISTS `upgrade`;
CREATE TABLE IF NOT EXISTS `upgrade` (
  `id_upgrade` int(11) NOT NULL AUTO_INCREMENT,
  `value_effect` float NOT NULL,
  `type_effect` int(11) NOT NULL,
  `id_farmer` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`id_upgrade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `upgrade`
--

INSERT INTO `upgrade` (`id_upgrade`, `value_effect`, `type_effect`, `id_farmer`, `cost`) VALUES
(1, 1.05, 2, 1, 50),
(2, 4, 1, 1, 50);

-- --------------------------------------------------------

--
-- Structure de la table `upgrade_lang`
--

DROP TABLE IF EXISTS `upgrade_lang`;
CREATE TABLE IF NOT EXISTS `upgrade_lang` (
  `id_lang` int(11) NOT NULL,
  `id_upgrade` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lang`,`id_upgrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `upgrade_lang`
--

INSERT INTO `upgrade_lang` (`id_lang`, `id_upgrade`, `description`, `name`) VALUES
(1, 1, 'decription test amelioration', 'amélioration test'),
(1, 2, 'test +', 'somme');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `mail`) VALUES
(8, 'kedorev', ',,9u/f0OQtwJY', 'kedorev@gmail.com');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `farmer_lang`
--
ALTER TABLE `farmer_lang`
  ADD CONSTRAINT `farmer_lang_ibfk_1` FOREIGN KEY (`id_Lang`) REFERENCES `lang` (`id_lang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
