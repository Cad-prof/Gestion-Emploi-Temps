-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 nov. 2024 à 13:39
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gedt`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `IDCOURS` int(11) NOT NULL,
  `MATRICULE` varchar(5) NOT NULL,
  `CODEMAT` int(11) NOT NULL,
  `NUMEDT` int(11) NOT NULL,
  `NUMSALLE` int(11) NOT NULL,
  `HEUREDEBUT` date DEFAULT NULL,
  `HEUREFIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `edt`
--

CREATE TABLE `edt` (
  `NUMEDT` int(11) NOT NULL,
  `IDGROUPE` int(11) NOT NULL,
  `DATEEDT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `MATRICULE` varchar(5) NOT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PRENOM` varchar(30) DEFAULT NULL,
  `SPECIALITE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`MATRICULE`, `NOM`, `PRENOM`, `SPECIALITE`) VALUES
('EN001', 'DIOP', 'Moustapha', 'Bases de données');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `CODEFIL` varchar(5) NOT NULL,
  `NOMFIL` varchar(50) DEFAULT NULL,
  `VHA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`CODEFIL`, `NOMFIL`, `VHA`) VALUES
('CSW', 'Création de Sites Web', 280),
('DWM', 'Développement Web Mobile', 2400);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `IDGROUPE` int(11) NOT NULL,
  `CODEFIL` varchar(5) NOT NULL,
  `NOMGROUPE` varchar(20) DEFAULT NULL,
  `EFFECTIF` int(11) DEFAULT NULL,
  `NIVEAU` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `CODEMAT` int(11) NOT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL,
  `VHG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `NUMSALLE` int(11) NOT NULL,
  `NOMSALLE` varchar(30) DEFAULT NULL,
  `CAPACITE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDUTILISATEUR` int(10) NOT NULL,
  `NOMUTILISATEUR` varchar(50) DEFAULT NULL,
  `MOTPASSE` varchar(15) DEFAULT NULL,
  `PROFIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`IDCOURS`),
  ADD KEY `FK_CONSISTER` (`CODEMAT`),
  ADD KEY `FK_DEROULER` (`NUMSALLE`),
  ADD KEY `FK_DISPENSER` (`MATRICULE`),
  ADD KEY `FK_LIER` (`NUMEDT`);

--
-- Index pour la table `edt`
--
ALTER TABLE `edt`
  ADD PRIMARY KEY (`NUMEDT`),
  ADD KEY `FK_CONCERNER` (`IDGROUPE`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`MATRICULE`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`CODEFIL`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`IDGROUPE`),
  ADD KEY `FK_APPARTENIR` (`CODEFIL`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`CODEMAT`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`NUMSALLE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDUTILISATEUR`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `IDCOURS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDUTILISATEUR` int(10) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_CONSISTER` FOREIGN KEY (`CODEMAT`) REFERENCES `matiere` (`CODEMAT`),
  ADD CONSTRAINT `FK_DEROULER` FOREIGN KEY (`NUMSALLE`) REFERENCES `salle` (`NUMSALLE`),
  ADD CONSTRAINT `FK_DISPENSER` FOREIGN KEY (`MATRICULE`) REFERENCES `enseignant` (`MATRICULE`),
  ADD CONSTRAINT `FK_LIER` FOREIGN KEY (`NUMEDT`) REFERENCES `edt` (`NUMEDT`);

--
-- Contraintes pour la table `edt`
--
ALTER TABLE `edt`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`IDGROUPE`) REFERENCES `groupe` (`IDGROUPE`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_APPARTENIR` FOREIGN KEY (`CODEFIL`) REFERENCES `filiere` (`CODEFIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
