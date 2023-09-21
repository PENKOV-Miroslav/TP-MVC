-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 17 sep. 2023 à 13:23
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp0`
--

-- --------------------------------------------------------

--
-- Structure de la table `EQUIPE`
--

CREATE TABLE `EQUIPE` (
  `ID_equipe` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `President` varchar(50) DEFAULT NULL,
  `ID_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `EQUIPE`
--

INSERT INTO `EQUIPE` (`ID_equipe`, `Nom`, `President`, `ID_ligue`) VALUES
(1, 'PSG', 'Mbappé', 1),
(2, 'OL', 'John', 1),
(3, 'Marseille', 'test', 2);

-- --------------------------------------------------------

--
-- Structure de la table `JOUEUR`
--

CREATE TABLE `JOUEUR` (
  `ID_joueur` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `DateNaissance` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `JOUEUR`
--

INSERT INTO `JOUEUR` (`ID_joueur`, `Nom`, `Prenom`, `DateNaissance`) VALUES
(1, 'Mbappé', 'Kiliane', '1990'),
(2, 'PENKOV', 'Miroslav', '2001');

-- --------------------------------------------------------

--
-- Structure de la table `LIGUE`
--

CREATE TABLE `LIGUE` (
  `ID_ligue` int(11) NOT NULL,
  `Region` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LIGUE`
--

INSERT INTO `LIGUE` (`ID_ligue`, `Region`) VALUES
(1, 'Ligue1'),
(2, 'Ligue 2'),
(3, 'Ligue 3');

-- --------------------------------------------------------

--
-- Structure de la table `MEMBRE`
--

CREATE TABLE `MEMBRE` (
  `ID_joueur` int(11) NOT NULL,
  `ID_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MEMBRE`
--

INSERT INTO `MEMBRE` (`ID_joueur`, `ID_equipe`) VALUES
(1, 1),
(2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  ADD PRIMARY KEY (`ID_equipe`),
  ADD KEY `ID_ligue` (`ID_ligue`);

--
-- Index pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD PRIMARY KEY (`ID_joueur`);

--
-- Index pour la table `LIGUE`
--
ALTER TABLE `LIGUE`
  ADD PRIMARY KEY (`ID_ligue`);

--
-- Index pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  ADD PRIMARY KEY (`ID_joueur`,`ID_equipe`),
  ADD KEY `ID_equipe` (`ID_equipe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  MODIFY `ID_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  MODIFY `ID_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `LIGUE`
--
ALTER TABLE `LIGUE`
  MODIFY `ID_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `EQUIPE`
--
ALTER TABLE `EQUIPE`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`ID_ligue`) REFERENCES `LIGUE` (`ID_ligue`);

--
-- Contraintes pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`ID_joueur`) REFERENCES `JOUEUR` (`ID_joueur`),
  ADD CONSTRAINT `membre_ibfk_2` FOREIGN KEY (`ID_equipe`) REFERENCES `EQUIPE` (`ID_equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
