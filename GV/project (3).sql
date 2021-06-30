-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 fév. 2019 à 13:18
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `prix` int(11) NOT NULL,
  `p_vente` int(11) NOT NULL,
  `date_expi` varchar(250) NOT NULL,
  `qte` int(11) NOT NULL,
  `qte_v` int(11) DEFAULT '0',
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `code`, `prix`, `p_vente`, `date_expi`, `qte`, `qte_v`, `e_id`) VALUES
(1, 'a10', 100, 200, '2019-02-11', 1022, 0, 1),
(2, 'a10', 255, 300, '2019-02-01', 222, 0, 1),
(3, 'a11', 5520, 11000, '2019-02-01', 545, 0, 1),
(4, 'b44', 5520, 30000, '2019-02-01', 45, 0, 2),
(5, 'b12', 5520, 5660, '2019-02-01', 45, 0, 2),
(6, 'c10', 4500, 11000, '2019-02-01', 65, 0, 3),
(7, 'c42', 4500, 5000, '2019-02-06', 45, 0, 4),
(8, 'c12', 4500, 6000, '2019-02-01', 65, 0, 5),
(9, 'c13', 4500, 11000, '2019-02-01', 45, 0, 5),
(10, 'c20', 4500, 5000, '2019-02-02', 58, 0, 6),
(11, 'c21', 5520, 11000, '2019-02-03', 40, 0, 6),
(12, 'c22', 5000, 50000, '2019-02-03', 50, 0, 6),
(13, 'c23', 4500, 5000, '2019-02-16', 60, 0, 6),
(14, 'c24', 5900, 6000, '2019-02-15', 90, 0, 6),
(15, 'c24', 4500, 11000, '2019-02-23', 45, 0, 6),
(16, 'c25', 4500, 5660, '2019-02-23', 6, 0, 6),
(17, 'c26', 4500, 5660, '2019-02-23', 56, 0, 6),
(18, 'c26', 4500, 6000, '2019-02-10', 89, 0, 6),
(19, 'c27', 677, 700, '2019-02-23', 45, 0, 6),
(20, 'c30', 4500, 6000, '2019-02-08', 45, 0, 7),
(21, 'c31', 6500, 7000, '2019-02-01', 65, 0, 7),
(22, 'c32', 50600, 70000, '2019-02-02', 45, 0, 7),
(23, 'c40', 4500, 11000, '2019-02-01', 84, 0, 7),
(24, 'c43', 4500, 6000, '2019-02-01', 98, 0, 7),
(25, 'd10', 4500, 6000, '2019-02-07', 45, 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `article_client`
--

CREATE TABLE `article_client` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `terminer` tinyint(1) NOT NULL DEFAULT '0',
  `date_chat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_client`
--

INSERT INTO `article_client` (`id`, `c_id`, `a_id`, `qte`, `terminer`, `date_chat`) VALUES
(1, 1, 1, 5, 1, '1550056351'),
(2, 5, 1, 5, 1, '1550138895'),
(3, 6, 1, 4, 1, '1550138938'),
(4, 7, 1, 4, 1, '1550138985'),
(5, 8, 1, 4, 1, '1550139021'),
(6, 9, 1, 2, 1, '1550139052'),
(7, 10, 1, 4, 1, '1550139287'),
(8, 11, 1, 5, 1, '1550139366');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `numero_tel` bigint(20) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `numero_tel`, `date`) VALUES
(1, 'محمد عبد الله', 45123698, '2019-02-16'),
(2, 'محمد عبد الله', 45254525, '2019-02-03'),
(3, 'Med ', 45254525, '2019-02-03'),
(4, 'Ahmed', 45254525, '2019-02-03'),
(5, 'mohamed lemin ', 22332211, '2019-02-03'),
(6, 'mohamed yahya ', 41212121, '2019-02-02'),
(7, 'med ahmed', 21326556, '2019-02-03'),
(8, 'med sidi', 32145688, '2019-02-02'),
(9, 'mamadou', 32154698, '2019-02-03'),
(10, 'sidi med', 32154678, '2019-02-02'),
(11, 'sidi vet7', 21548796, '2019-02-03');

-- --------------------------------------------------------

--
-- Structure de la table `etagere`
--

CREATE TABLE `etagere` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etagere`
--

INSERT INTO `etagere` (`id`, `numero`, `r_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 2),
(7, 2, 2),
(8, 3, 2),
(9, 4, 2),
(10, 5, 2),
(11, 1, 3),
(12, 2, 3),
(13, 3, 3),
(14, 1, 4),
(15, 2, 4),
(16, 3, 4),
(17, 4, 4),
(18, 1, 5),
(19, 2, 5),
(20, 3, 5),
(21, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `passe`
--

CREATE TABLE `passe` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `motpass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `passe`
--

INSERT INTO `passe` (`id`, `nom`, `motpass`) VALUES
(1, 'med lemin', 22381838);

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE `rayon` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rayon`
--

INSERT INTO `rayon` (`id`, `nom`) VALUES
(1, 'nom1'),
(2, 'nom2'),
(3, 'nom3'),
(4, 'nom4'),
(5, 'nom5');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(11) NOT NULL,
  `rectte` int(11) NOT NULL,
  `tm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `rectte`, `tm`) VALUES
(1, 500, 1550056361),
(2, 500, 1550138898),
(3, 400, 1550138940),
(4, 400, 1550138986),
(5, 400, 1550139023),
(6, 200, 1550139054),
(7, 400, 1550139289),
(8, 500, 1550139367);

-- --------------------------------------------------------

--
-- Structure de la table `super`
--

CREATE TABLE `super` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `finish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `super`
--

INSERT INTO `super` (`id`, `nom`, `finish`) VALUES
(1, 'Nejah', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_client`
--
ALTER TABLE `article_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etagere`
--
ALTER TABLE `etagere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `passe`
--
ALTER TABLE `passe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `article_client`
--
ALTER TABLE `article_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `etagere`
--
ALTER TABLE `etagere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `passe`
--
ALTER TABLE `passe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `super`
--
ALTER TABLE `super`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
