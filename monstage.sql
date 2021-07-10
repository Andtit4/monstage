-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 juin 2021 à 21:16
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monstage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(3) NOT NULL,
  `nom_admin` varchar(8) NOT NULL,
  `mdp_admin` varchar(8) NOT NULL,
  `mail_admin` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom_admin`, `mdp_admin`, `mail_admin`) VALUES
(1, 'admin', 'admin', 'andtit4@gmail.com'),
(24, 'root', 'root', 'lirsitogo2021@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(7) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `premon` varchar(35) NOT NULL,
  `mail` varchar(36) NOT NULL,
  `mdp` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `premon`, `mail`, `mdp`) VALUES
(1, 'tito', 'and', 'tut@gmail.com', 'mdp'),
(2, 'sudo', 'su', 'andtit@gmail.com', 'mdp'),
(3, 'andele', 'tito', 'lirsitogo2021@gmail.com', 'mdp');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `id_pub` int(8) NOT NULL,
  `titre_pub` varchar(35) NOT NULL,
  `contenu_pub` text NOT NULL,
  `date_pub` datetime DEFAULT NULL,
  `id_admn` int(8) NOT NULL,
  `mail` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id_pub`, `titre_pub`, `contenu_pub`, `date_pub`, `id_admn`, `mail`) VALUES
(1, 'titre', 'contenu', '2021-05-08 10:45:29', 1, NULL),
(2, 'stage', 'contenu', '2021-05-08 10:47:19', 1, NULL),
(3, 'stage', 'contenu', '2021-05-08 10:50:45', 1, 'andtit4@gmail.com'),
(4, 'telecom', 'contenu', '2021-05-08 10:58:11', 1, 'andtit4@gmail.com'),
(5, 'telecom2', 'contenu', '2021-05-08 10:59:35', 1, 'andtit4@gmail.com'),
(6, 'telecom3', 'contenu', '2021-05-08 11:00:09', 1, 'andtit4@gmail.com'),
(7, 'telecom3', 'contenu', '2021-05-08 11:05:39', 1, 'andtit4@gmail.com'),
(19, 'exo', 'conte', '2021-06-03 11:44:16', 24, 'lirsitogo2021@gmail.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `id_admn` (`id_admn`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id_pub` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`id_admn`) REFERENCES `administrateur` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
