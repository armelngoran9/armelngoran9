-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 jan. 2022 à 21:10
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `dateInscription` date NOT NULL,
  `idParrain` int(11) DEFAULT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `nom`, `prenoms`, `contact`, `dateInscription`, `idParrain`, `idGroupe`) VALUES
(3, 'Ali', 'Baba', 54122618, '2020-07-29', 3, 25),
(4, 'Pokemon', 'Sacha', 54122615, '2020-07-29', 3, 25),
(5, 'Adja', 'Marie', 4546564, '0000-00-00', 3, 32),
(6, 'Akaby', 'Dattebayo', 65256533, '0000-00-00', 5, 31),
(7, 'Abissi', 'Fabio', 444444, '0000-00-00', 5, 31),
(61, 'koré', 'cyr', 4546564, '0000-00-00', 3, 27),
(62, 'a', 'a', 1, '2020-07-31', 3, 32),
(64, 'Yolou', 'Péganime', 87659185, '2020-07-31', NULL, 32),
(65, 'z', 'ze', 1, '2020-08-01', 3, 32),
(79, 'zea', 'zae', 1, '2020-08-01', NULL, 31),
(80, 'Ali Bamba', 'yaaaye', 65184312, '2020-08-01', NULL, 29),
(82, 'zazaz', 'sqxqs', 9, '2020-08-02', NULL, 31),
(85, 'Ben', 'Ali', 874515451, '2020-08-03', 3, 25),
(86, 'Oli', 'Oil', 87651245, '2020-08-03', 85, 25),
(87, 'Bamba', 'popo', 8547126, '2020-08-03', NULL, 28),
(88, 'Franck', 'Aimé', 78542121, '2020-08-03', 87, 28),
(89, 'Koffi', 'Paul', 41746523, '2020-08-03', 88, 28),
(90, 'Wilfried', 'Curtis', 65123245, '2020-08-03', 88, 28);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `numCompte` int(11) NOT NULL,
  `solde` double NOT NULL,
  `idProprietaire` int(11) NOT NULL,
  `idRubrique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`numCompte`, `solde`, `idProprietaire`, `idRubrique`) VALUES
(2, 48958, 3, 3),
(3, 5000, 4, 3),
(4, 200, 5, 4),
(5, 0, 62, 4),
(7, 0, 64, 4),
(8, 0, 65, 4),
(9, 0, 5, 5),
(10, 0, 62, 5),
(12, 0, 64, 5),
(13, 0, 65, 5),
(14, 0, 5, 6),
(15, 0, 62, 6),
(17, 0, 64, 6),
(18, 0, 65, 6),
(19, 0, 5, 7),
(20, 0, 62, 7),
(22, 0, 64, 7),
(23, 0, 65, 7),
(24, 0, 6, 8),
(25, 60000, 7, 8),
(26, 400000, 79, 8),
(27, 5000, 6, 9),
(28, 0, 7, 9),
(29, 10010000, 79, 9),
(32, 0, 82, 8),
(33, 0, 82, 9),
(43, 0, 3, 12),
(44, 0, 4, 12),
(49, 0, 6, 14),
(50, 1300000, 7, 14),
(51, 0, 79, 14),
(52, 0, 82, 14),
(53, 0, 6, 15),
(54, 0, 7, 15),
(55, 0, 79, 15),
(56, 728000, 82, 15),
(57, 0, 85, 3),
(58, 0, 85, 12),
(60, 0, 86, 3),
(61, 0, 86, 12),
(63, 10000, 87, 16),
(64, 40000, 87, 17),
(65, 1000, 87, 18),
(66, 0, 87, 19),
(67, 0, 88, 16),
(68, 65000, 88, 17),
(69, 0, 88, 18),
(70, 0, 88, 19),
(71, 0, 89, 16),
(72, 0, 89, 17),
(73, 0, 89, 18),
(74, 20000, 89, 19),
(75, 0, 90, 16),
(76, 0, 90, 17),
(77, 0, 90, 18),
(78, 12000, 90, 19);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(255) NOT NULL,
  `dateGroupe` date NOT NULL,
  `nomZone` varchar(255) NOT NULL,
  `nomRespo` varchar(255) NOT NULL,
  `nomTresorier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `nomGroupe`, `dateGroupe`, `nomZone`, `nomRespo`, `nomTresorier`) VALUES
(25, 'temporaire', '2020-07-28', 'Villejean', 'Kouakou Yao Gervais', 'Ouattara Maimouna'),
(26, 'temporaire', '2020-07-29', 'Charles de Gaules', 'La Pulga', 'Orsot'),
(27, 'temporaire', '0000-00-00', 'Kennedy', 'Assalé Jean jacques', 'olélé'),
(28, 'temporaire', '0000-00-00', 'Beaulieu', 'Kacou', 'le vendeur\r\n'),
(29, 'st jp2', '0000-00-00', 'Beaulieu', 'eric norbert', 'abekan'),
(30, 'ali baba', '0000-00-00', 'Beaulieu', 'dadju', 'dinho'),
(31, 'kpokpokpouho', '0000-00-00', 'Villejean', 'soualélé', 'soualélé'),
(32, 'kpokpokpoou', '0000-00-00', 'Charles de Gaules', 'Kpooowaaa', 'Kaaris'),
(33, 'yaye', '2020-08-02', 'Kennedy', 'Touré', 'Lakota'),
(36, 'demo', '2020-08-02', 'Villejean', 'mai', 'dsdf');

-- --------------------------------------------------------

--
-- Structure de la table `respozone`
--

CREATE TABLE `respozone` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `respozone`
--

INSERT INTO `respozone` (`id`, `nom`, `prenoms`, `contact`) VALUES
(24, 'Kouassi', 'Ablé Marcellin', 87681008),
(25, 'Yao', 'Kouassi Gervais', 78162808),
(33, 'Ali', 'Baba', 68260008),
(34, 'Ali', 'Baba', 68260008),
(37, 'Ali', 'Baba', 68260008),
(38, 'Ali', 'Baba', 68260008),
(39, 'Ali', 'Baba', 68260008),
(41, 'Ali', 'Baba', 68260008),
(42, 'Ali', 'Baba', 68260008),
(43, 'Ali', 'Baba', 68260008),
(44, 'Ali', 'Baba', 68260008),
(45, 'Ali', 'Baba', 68260008);

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE `rubrique` (
  `idRubrique` int(11) NOT NULL,
  `nomRubrique` varchar(255) NOT NULL,
  `dateRubrique` date NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rubrique`
--

INSERT INTO `rubrique` (`idRubrique`, `nomRubrique`, `dateRubrique`, `idGroupe`) VALUES
(3, 'Photocopies', '2021-07-29', 25),
(4, 'repassage', '2021-01-05', 32),
(5, 'a', '2021-01-06', 32),
(6, 'v', '2021-01-01', 32),
(7, 'repassages', '2021-01-01', 32),
(8, 'photo', '2021-01-01', 31),
(9, 'propreté', '2021-01-01', 31),
(12, 'ddd', '2021-01-02', 25),
(14, 'ADUTI', '2021-01-03', 31),
(15, 'JDE', '2021-01-03', 31),
(16, 'Voyage', '2021-01-03', 28),
(17, 'Jde', '2021-01-03', 28),
(18, 'Proprete', '2021-01-03', 28),
(19, 'Gala', '2021-01-03', 28);

-- --------------------------------------------------------

--
-- Structure de la table `tresorier`
--

CREATE TABLE `tresorier` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorier`
--

INSERT INTO `tresorier` (`id`, `nom`, `prenoms`, `contact`, `pseudo`, `mdp`) VALUES
(5, 'medo', 'madi', 1452, 'connect', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Structure de la table `versement`
--

CREATE TABLE `versement` (
  `idVersement` int(11) NOT NULL,
  `dateVersement` date NOT NULL,
  `montant` double NOT NULL,
  `numCompte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `versement`
--

INSERT INTO `versement` (`idVersement`, `dateVersement`, `montant`, `numCompte`) VALUES
(2, '2020-07-29', 2000, 2),
(3, '2020-08-01', 4, 2),
(4, '2020-08-01', 5000, 3),
(5, '2020-08-01', 1500, 2),
(6, '2020-08-01', 400000, 26),
(7, '2020-08-01', 10000000, 29),
(10, '2020-08-02', 45454, 2),
(11, '2020-08-03', 60000, 25),
(12, '2020-08-03', 10000, 29),
(13, '2020-08-03', 5000, 27),
(14, '2020-08-03', 1300000, 50),
(15, '2020-08-03', 728000, 56),
(16, '2020-08-03', 10000, 63),
(17, '2020-08-03', 40000, 64),
(18, '2020-08-03', 1000, 65),
(19, '2020-08-03', 20000, 74),
(20, '2020-08-03', 12000, 78),
(21, '2020-08-03', 65000, 68),
(22, '2022-01-10', 200, 4);

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `nomZone` varchar(255) NOT NULL,
  `nomRespo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`nomZone`, `nomRespo`) VALUES
('Beaulieu', 'Tatami Wattari'),
('Kennedy', 'Ali Apollinaire'),
('Villejean', 'Loris Dubois'),
('Charles de Gaules', 'Aka Aka Franck');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGroupe` (`idGroupe`),
  ADD KEY `idParrain` (`idParrain`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`numCompte`),
  ADD KEY `idRubrique` (`idRubrique`),
  ADD KEY `compte_ibfk_1` (`idProprietaire`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`),
  ADD UNIQUE KEY `nomGroupe` (`nomGroupe`,`nomZone`),
  ADD KEY `nomZone` (`nomZone`);

--
-- Index pour la table `respozone`
--
ALTER TABLE `respozone`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`idRubrique`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Index pour la table `tresorier`
--
ALTER TABLE `tresorier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `versement`
--
ALTER TABLE `versement`
  ADD PRIMARY KEY (`idVersement`),
  ADD KEY `numCompte` (`numCompte`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`nomZone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `numCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `respozone`
--
ALTER TABLE `respozone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `rubrique`
--
ALTER TABLE `rubrique`
  MODIFY `idRubrique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `tresorier`
--
ALTER TABLE `tresorier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `versement`
--
ALTER TABLE `versement`
  MODIFY `idVersement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`) ON UPDATE CASCADE,
  ADD CONSTRAINT `adherent_ibfk_2` FOREIGN KEY (`idParrain`) REFERENCES `adherent` (`id`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idProprietaire`) REFERENCES `adherent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`idRubrique`) REFERENCES `rubrique` (`idRubrique`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_4` FOREIGN KEY (`nomZone`) REFERENCES `zone` (`nomZone`);

--
-- Contraintes pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD CONSTRAINT `rubrique_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `versement`
--
ALTER TABLE `versement`
  ADD CONSTRAINT `versement_ibfk_1` FOREIGN KEY (`numCompte`) REFERENCES `compte` (`numCompte`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
