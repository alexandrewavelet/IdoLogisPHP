-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 21 Avril 2013 à 23:57
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `idologis`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE IF NOT EXISTS `bien` (
  `IdBien` int(11) NOT NULL AUTO_INCREMENT,
  `IntituleBien` varchar(255) NOT NULL,
  `NbChambresBien` int(11) NOT NULL,
  `GarageBien` varchar(255) NOT NULL,
  `JardinBien` varchar(255) NOT NULL,
  `PrixBien` int(11) NOT NULL,
  `EnergieBien` varchar(255) NOT NULL,
  `photoBien` varchar(100) NOT NULL DEFAULT 'defaut.jpg',
  `CommuneBien` int(11) NOT NULL,
  PRIMARY KEY (`IdBien`),
  KEY `CommuneBien` (`CommuneBien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `bien`
--

INSERT INTO `bien` (`IdBien`, `IntituleBien`, `NbChambresBien`, `GarageBien`, `JardinBien`, `PrixBien`, `EnergieBien`, `photoBien`, `CommuneBien`) VALUES
(1, 'fhcccccccccccccccc', 58, 'gjtttttttttttt', 'itttttttttttt', 64482, 'D', 'defaut.jpg', 2),
(3, 'tut', 5, 'g', 'gj', 644, 'E', 'b531ee6b99143a586e8adf525c753271.jpg', 4),
(4, 'Maison', 2, '2 voitures', '250mÂ² avec balanÃ§oire et piscine', 100000, 'C', '934c30549e66e2aab49fd8642f01d955.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commercial`
--

CREATE TABLE IF NOT EXISTS `commercial` (
  `IdCommercial` int(11) NOT NULL AUTO_INCREMENT,
  `NomCommercial` varchar(50) NOT NULL,
  `PrenomCommercial` varchar(50) NOT NULL,
  `TelCommercial` varchar(50) NOT NULL,
  `MailCommercial` varchar(50) NOT NULL,
  `SecteurCommercial` int(11) NOT NULL,
  PRIMARY KEY (`IdCommercial`),
  KEY `SecteurCommercial` (`SecteurCommercial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commercial`
--

INSERT INTO `commercial` (`IdCommercial`, `NomCommercial`, `PrenomCommercial`, `TelCommercial`, `MailCommercial`, `SecteurCommercial`) VALUES
(1, 'Helal', 'Nour', '0649000000', 'helal.nour@hotmail.fr', 1),
(2, 'Wavelet', 'Alexandre', '0700000000', 'wavelet.alexandre@gmail.com', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `IdCommune` int(11) NOT NULL AUTO_INCREMENT,
  `CodePostalCommune` varchar(5) NOT NULL,
  `NomCommune` varchar(50) NOT NULL,
  `SecteurCommune` int(11) NOT NULL,
  PRIMARY KEY (`IdCommune`),
  KEY `SecteurCommune` (`SecteurCommune`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`IdCommune`, `CodePostalCommune`, `NomCommune`, `SecteurCommune`) VALUES
(1, '59140', 'Dunkerque', 1),
(2, '59640', 'Petite-Synthe', 1),
(3, '62000', 'Arras', 2),
(4, '59123', 'Zuydcoote', 1);

-- --------------------------------------------------------

--
-- Structure de la table `coupdecoeur`
--

CREATE TABLE IF NOT EXISTS `coupdecoeur` (
  `IdBienCoupDeCoeur` int(11) NOT NULL,
  PRIMARY KEY (`IdBienCoupDeCoeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `coupdecoeur`
--

INSERT INTO `coupdecoeur` (`IdBienCoupDeCoeur`) VALUES
(4);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `IdSecteur` int(11) NOT NULL AUTO_INCREMENT,
  `NomSecteur` varchar(50) NOT NULL,
  PRIMARY KEY (`IdSecteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `secteur`
--

INSERT INTO `secteur` (`IdSecteur`, `NomSecteur`) VALUES
(1, 'Nord'),
(2, 'Pas de Calais');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `bien_ibfk_1` FOREIGN KEY (`CommuneBien`) REFERENCES `commune` (`IdCommune`);

--
-- Contraintes pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD CONSTRAINT `commercial_ibfk_1` FOREIGN KEY (`SecteurCommercial`) REFERENCES `secteur` (`IdSecteur`),
  ADD CONSTRAINT `commercial_ibfk_2` FOREIGN KEY (`SecteurCommercial`) REFERENCES `secteur` (`IdSecteur`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`SecteurCommune`) REFERENCES `secteur` (`IdSecteur`);

--
-- Contraintes pour la table `coupdecoeur`
--
ALTER TABLE `coupdecoeur`
  ADD CONSTRAINT `coupdecoeur_ibfk_2` FOREIGN KEY (`IdBienCoupDeCoeur`) REFERENCES `bien` (`IdBien`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
