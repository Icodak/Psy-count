-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 avr. 2021 à 00:43
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `serveur_psy_fi`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_Administrateur` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_Administrateur`, `ID_Utilisateur`) VALUES
(2, 8),
(3, 9),
(4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `blacklist`
--

CREATE TABLE `blacklist` (
  `ID_Utilisateur` int(11) NOT NULL,
  `adressIp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `ID_faq` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`ID_faq`, `reponse`, `question`) VALUES
(21, 'le G10D', 'quel est le meilleur groupe ?'),
(36, 'les deux', 'lapin ou mouton'),
(44, 'Le G10D  ', 'Quel est le meilleur groupe APP ?');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `ID_Medecin` int(11) NOT NULL,
  `codePostalCabinet` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `telephonePortable` int(255) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`ID_Medecin`, `codePostalCabinet`, `specialite`, `telephonePortable`, `ID_Utilisateur`) VALUES
(2, '95600', 'maitre medecin', 785963241, 0),
(3, '98500', 'seigneur medecin', 786423158, 7),
(5, '93500', 'generaliste', 0, 14);

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `ID_Mesure` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `catégorie` varchar(255) NOT NULL,
  `valeurs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`valeurs`)),
  `capteur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `ID_Patient` int(11) NOT NULL,
  `dateDeNaissance` varchar(255) NOT NULL,
  `ID_psy_data` int(255) NOT NULL,
  `ID_Utilisateur` int(255) NOT NULL,
  `ID_Medecin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`ID_Patient`, `dateDeNaissance`, `ID_psy_data`, `ID_Utilisateur`, `ID_Medecin`) VALUES
(1, '2021-03-10', 0, 0, 0),
(2, '2021-03-18', 0, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_Utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `permission_lvl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur`, `nom`, `prenom`, `Email`, `motDePasse`, `images`, `permission_lvl`) VALUES
(2, 'henri', 'jean', 'jeanhenri@gmail.com', '$2y$10$IpJVPq.znapEUy6oBUFdoOWTKHuS3sgcGlG1a/lJQlegEVQmNnruq', '', 'patient'),
(3, 'benoit', 'david', 'davidbenoit@gmail.com', '$2y$10$bLfbtLBSXw06vyiLb9fCa.t.SlaVVsJ6.uJg.IKvKQd.Ls99tzlBa', '', 'Medecin'),
(4, 'Louis', 'jean', 'jeanLouis@gmail.com', '$2y$10$E5MFIQW9qGfj53nYuGIxO.goYFlinuXO6cwJ.gduxK82dDtS7wqji', '', 'Medecin'),
(5, 'test', 'test', 'tsttets@gmail.com', '$2y$10$vsC8AEyGtxlCZ1Ot2mhgSuj84tNLd2m5/vR.jLnxzuQXdbCH7wLVq', '', 'patient'),
(7, 'jean', 'david', 'jeandavid@gmail.com', '$2y$10$5dcwGgc6ZYEYI1V8AKoppOBqzidtsWYTu3BtSieeW.JUhNS/oJaom', '', 'Medecin'),
(8, 'lpidf', 'Nicolas', 'randomemail@gmail.com', '$2y$10$wSteXx/ztoyW.4an/.ZUs.Puw8j2EibXb1jyh4ep3pAn8wWUNgCM.', '', 'Admin'),
(9, 'test', 'admin', 'trestadmin@gmail.com', '$2y$10$SpzrXrfevnY/URGAv8dC3.zpwNNfik3cpD4Ggnsfo7lTkSPn1CCfi', '', 'Admin'),
(10, 'random', 'test', 'randomtest@gmail.com', '$2y$10$IjKDnyCZ2g9mi1r10IMOceE3NYWdPWTcL.yFiXbqkxUV3CMHGlhWG', '', 'Admin'),
(14, 'test', 'medecin', 'medecin@gmail.com', '$2y$10$RZppjf5WQju2yIHktXIDLufz/GsMkBoadhllG6GYlWb28T8YZeD.q', '', 'Medecin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_Administrateur`);

--
-- Index pour la table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`ID_Utilisateur`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`ID_faq`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`ID_Medecin`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`ID_Mesure`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID_Patient`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_Utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID_Administrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `ID_Utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `ID_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `ID_Medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `ID_Mesure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID_Patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
