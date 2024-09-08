-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 sep. 2024 à 02:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `auto_ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'abdelwaheb', 'abdelwaheb', 'agent');

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id` int(11) NOT NULL,
  `prix_payee` double(8,3) NOT NULL DEFAULT 0.000,
  `cin` varchar(30) NOT NULL DEFAULT '',
  `nom` varchar(30) NOT NULL DEFAULT '',
  `prenom` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `prix_payee`, `cin`, `nom`, `prenom`) VALUES
(10, 215.000, '555555', 'abdelwaheb', 'yazidi'),
(13, 25.000, '09895641', 'abdelwaheb', 'yazidi'),
(15, 10.000, '66668888', 'abdelwaheb', 'yazidi');

-- --------------------------------------------------------

--
-- Structure de la table `etude_code`
--

CREATE TABLE `etude_code` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL DEFAULT 0,
  `candidat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etude_code`
--

INSERT INTO `etude_code` (`id`, `code`, `candidat`) VALUES
(25, 8, 10),
(27, 9, 15),
(28, 9, 13),
(29, 5, 15),
(30, 5, 13);

-- --------------------------------------------------------

--
-- Structure de la table `ingenieure`
--

CREATE TABLE `ingenieure` (
  `id` int(11) NOT NULL,
  `cin` varchar(30) NOT NULL DEFAULT '',
  `nom` varchar(30) NOT NULL DEFAULT '',
  `prenom` varchar(30) NOT NULL DEFAULT '',
  `specialite` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ingenieure`
--

INSERT INTO `ingenieure` (`id`, `cin`, `nom`, `prenom`, `specialite`) VALUES
(10, '09895641', 'abdelwaheb', 'yazidi', 'camion'),
(11, '09895641', 'abdelwaheb', 'yazidi', 'camion'),
(14, '09895641', 'abdelwaheb', 'yazidi', 'moto'),
(15, '09895641', 'abdelwaheb', 'yazidi', 'voiture'),
(16, '14684548', 'top restau', 'souisi', 'camian'),
(17, '09895641', 'pizza', 'saada', 'voiture'),
(18, '09895641', 'top restau', 'souisi', 'voiture');

-- --------------------------------------------------------

--
-- Structure de la table `seance_code`
--

CREATE TABLE `seance_code` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `heure` char(2) NOT NULL DEFAULT '',
  `ingenieure` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `seance_code`
--

INSERT INTO `seance_code` (`id`, `date`, `heure`, `ingenieure`) VALUES
(5, '2023-12-07', '8', 10),
(7, '2023-12-07', '8', 11),
(8, '2023-12-07', '13', 14),
(9, '2023-12-04', '9', 11),
(10, '2024-09-12', '9', 11),
(11, '2024-09-08', '10', 11);

-- --------------------------------------------------------

--
-- Structure de la table `seance_conduit`
--

CREATE TABLE `seance_conduit` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `heure` char(2) NOT NULL DEFAULT '',
  `ingenieure` int(11) NOT NULL DEFAULT 0,
  `vehicule` int(11) NOT NULL DEFAULT 0,
  `candidat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `seance_conduit`
--

INSERT INTO `seance_conduit` (`id`, `date`, `heure`, `ingenieure`, `vehicule`, `candidat`) VALUES
(3, '2023-12-09', '9', 14, 10, 10),
(5, '2023-12-09', '8', 15, 9, 10),
(7, '2023-12-01', '11', 15, 9, 13),
(8, '2023-12-07', '8', 15, 9, 10),
(10, '2023-12-09', '17', 14, 10, 10),
(11, '2023-12-10', '10', 14, 10, 10),
(12, '2023-12-07', '8', 14, 10, 13),
(17, '2024-09-06', '13', 14, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `num` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `num`, `type`) VALUES
(4, '5555', 'camian'),
(9, '888888', 'voiture'),
(10, '5555', 'moto'),
(11, '556844', 'voiture'),
(12, '665884', 'voiture'),
(13, '554887', 'moto'),
(14, '665884', 'voiture');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etude_code`
--
ALTER TABLE `etude_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `candidat` (`candidat`);

--
-- Index pour la table `ingenieure`
--
ALTER TABLE `ingenieure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `seance_code`
--
ALTER TABLE `seance_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingenieure` (`ingenieure`);

--
-- Index pour la table `seance_conduit`
--
ALTER TABLE `seance_conduit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingenieure` (`ingenieure`),
  ADD KEY `vehicule` (`vehicule`),
  ADD KEY `candidat` (`candidat`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `etude_code`
--
ALTER TABLE `etude_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `ingenieure`
--
ALTER TABLE `ingenieure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `seance_code`
--
ALTER TABLE `seance_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `seance_conduit`
--
ALTER TABLE `seance_conduit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etude_code`
--
ALTER TABLE `etude_code`
  ADD CONSTRAINT `etude_code_ibfk_1` FOREIGN KEY (`code`) REFERENCES `seance_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etude_code_ibfk_2` FOREIGN KEY (`candidat`) REFERENCES `candidat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance_code`
--
ALTER TABLE `seance_code`
  ADD CONSTRAINT `seance_code_ibfk_1` FOREIGN KEY (`ingenieure`) REFERENCES `ingenieure` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance_conduit`
--
ALTER TABLE `seance_conduit`
  ADD CONSTRAINT `seance_conduit_ibfk_1` FOREIGN KEY (`ingenieure`) REFERENCES `ingenieure` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_conduit_ibfk_2` FOREIGN KEY (`vehicule`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_conduit_ibfk_3` FOREIGN KEY (`candidat`) REFERENCES `candidat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
