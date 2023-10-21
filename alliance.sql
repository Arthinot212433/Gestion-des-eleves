-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 sep. 2023 à 13:46
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
-- Base de données : `alliance`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_Adh` varchar(20) NOT NULL,
  `nom_Adh` varchar(50) NOT NULL,
  `prenom_Adh` varchar(100) NOT NULL,
  `adresse_Adh` varchar(100) NOT NULL,
  `genre_Adh` varchar(10) NOT NULL,
  `tel_Adh` varchar(20) NOT NULL,
  `nationalite_Adh` varchar(50) NOT NULL,
  `quartier_Adh` varchar(100) NOT NULL,
  `photo_Adh` varchar(100) NOT NULL,
  `naissance_Adh` varchar(20) NOT NULL,
  `lieuNaiss_Adh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_Cours` int(10) NOT NULL,
  `nom_Cours` varchar(50) NOT NULL,
  `tarif_Cours` int(50) NOT NULL,
  `duree_Cours` int(10) NOT NULL,
  `type_Cours` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriadherent`
--

CREATE TABLE `inscriadherent` (
  `id_InscriAdh` int(10) NOT NULL,
  `date_InscriAdh` varchar(20) NOT NULL,
  `fin_InscriAdh` varchar(20) NOT NULL,
  `id_Adh` varchar(20) NOT NULL,
  `id_TypeAdh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscrieleve`
--

CREATE TABLE `inscrieleve` (
  `id_InscriEleve` int(10) NOT NULL,
  `date_InscriEleve` varchar(20) NOT NULL,
  `id_Adh` varchar(20) NOT NULL,
  `id_Cours` int(10) NOT NULL,
  `lib_Niveau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `lib_Niveau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeadherent`
--

CREATE TABLE `typeadherent` (
  `id_TypeAdh` int(10) NOT NULL,
  `nom_TypeAdh` varchar(100) NOT NULL,
  `prix_TypeAdh` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_Adh`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_Cours`);

--
-- Index pour la table `inscriadherent`
--
ALTER TABLE `inscriadherent`
  ADD PRIMARY KEY (`id_InscriAdh`),
  ADD KEY `id_Adh` (`id_Adh`),
  ADD KEY `id_TypeAdh` (`id_TypeAdh`);

--
-- Index pour la table `inscrieleve`
--
ALTER TABLE `inscrieleve`
  ADD PRIMARY KEY (`id_InscriEleve`),
  ADD KEY `id_Adh` (`id_Adh`),
  ADD KEY `id_Cours` (`id_Cours`),
  ADD KEY `lib_Niveau` (`lib_Niveau`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`lib_Niveau`);

--
-- Index pour la table `typeadherent`
--
ALTER TABLE `typeadherent`
  ADD PRIMARY KEY (`id_TypeAdh`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_Cours` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriadherent`
--
ALTER TABLE `inscriadherent`
  MODIFY `id_InscriAdh` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscrieleve`
--
ALTER TABLE `inscrieleve`
  MODIFY `id_InscriEleve` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typeadherent`
--
ALTER TABLE `typeadherent`
  MODIFY `id_TypeAdh` int(10) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscriadherent`
--
ALTER TABLE `inscriadherent`
  ADD CONSTRAINT `inscriadherent_ibfk_1` FOREIGN KEY (`id_Adh`) REFERENCES `adherent` (`id_Adh`),
  ADD CONSTRAINT `inscriadherent_ibfk_2` FOREIGN KEY (`id_TypeAdh`) REFERENCES `typeadherent` (`id_TypeAdh`);

--
-- Contraintes pour la table `inscrieleve`
--
ALTER TABLE `inscrieleve`
  ADD CONSTRAINT `inscrieleve_ibfk_1` FOREIGN KEY (`id_Adh`) REFERENCES `adherent` (`id_Adh`),
  ADD CONSTRAINT `inscrieleve_ibfk_2` FOREIGN KEY (`id_Cours`) REFERENCES `cours` (`id_Cours`),
  ADD CONSTRAINT `inscrieleve_ibfk_3` FOREIGN KEY (`lib_Niveau`) REFERENCES `niveau` (`lib_Niveau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
