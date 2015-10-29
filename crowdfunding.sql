-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 29 Mars 2014 à 00:22
-- Version du serveur: 5.5.34-0ubuntu0.13.04.1
-- Version de PHP: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `crowdfunding`
--

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(20) NOT NULL,
  `proprietaire_projet` varchar(20) NOT NULL,
  `somme_recolte` double NOT NULL,
  `montant_total` double NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `patch` varchar(30) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `proprietaire_projet`, `somme_recolte`, `montant_total`, `description`, `date_debut`, `date_fin`, `patch`) VALUES
(1, 'risiculture', 'papis', 600000, 1000000, 'texte texte texte texte', '2014-02-11', '2014-03-31', 'C:\\Program Files (x86)\\EasyPHP');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(30) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudonyme`, `mot_de_passe`, `mail`, `prenom`, `nom`, `date_de_naissance`, `sexe`, `telephone`, `adresse`) VALUES
(7, 'MastaFlex', 'a', 'diamasta@gmail.com', 'DIA', '', '1997-03-05', 'Masculin', '(+221) 771799011', ''),
(12, 'Niklaus', 'nik', 'nik@free.fr', 'Niklaus', 'Michealson', '1997-03-05', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
