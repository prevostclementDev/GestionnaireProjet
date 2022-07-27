-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 juil. 2022 à 19:08
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionnaireprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire_addons`
--

DROP TABLE IF EXISTS `gestionnaire_addons`;
CREATE TABLE IF NOT EXISTS `gestionnaire_addons` (
  `addons_id` int(11) NOT NULL AUTO_INCREMENT,
  `addons_name` varchar(255) NOT NULL,
  `addons_option` text NOT NULL,
  PRIMARY KEY (`addons_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gestionnaire_addons`
--

INSERT INTO `gestionnaire_addons` (`addons_id`, `addons_name`, `addons_option`) VALUES
(1, 'recentlyView', '');

-- --------------------------------------------------------

--
-- Structure de la table `listtask_top`
--

DROP TABLE IF EXISTS `listtask_top`;
CREATE TABLE IF NOT EXISTS `listtask_top` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` varchar(255) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_desc` text,
  PRIMARY KEY (`list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet_list`
--

DROP TABLE IF EXISTS `projet_list`;
CREATE TABLE IF NOT EXISTS `projet_list` (
  `project_slug` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_StartDate` varchar(255) NOT NULL,
  `project_EnDate` varchar(255) DEFAULT NULL,
  `project_categorie` text,
  `project_description` text,
  `project_owner` varchar(255) NOT NULL,
  `project_state` int(11) NOT NULL,
  PRIMARY KEY (`project_slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `task_list`
--

DROP TABLE IF EXISTS `task_list`;
CREATE TABLE IF NOT EXISTS `task_list` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_list` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_desc` text,
  `task_state` int(11) NOT NULL,
  `task_user` text NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
