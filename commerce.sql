-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 nov. 2019 à 23:11
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `adresse`, `telephone`, `commande_id`) VALUES
(43, 'razafy', 'fianarantsoa', 2147483647, 0),
(44, 'zaza', 'Tsiroanomandidy', 2147483647, 0),
(45, 'Marie', 'Tamatave', 2147483647, 0),
(46, 'lanto', 'tana', 2147483647, 0),
(47, 'Njara', 'Betroka', 2147483647, 0),
(48, 'Hasina', 'Ihosy', 2147483647, 0),
(49, 'Malala', 'Toliara', 2147483647, 0),
(50, 'Mathilde', 'Ambositra', 2147483647, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `date_commande` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignevente`
--

CREATE TABLE `lignevente` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite_achat` int(11) NOT NULL,
  `date_achat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_vente`
--

CREATE TABLE `ligne_vente` (
  `id` int(11) NOT NULL,
  `quantite_achat` int(11) NOT NULL,
  `date_achat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_vente`
--

INSERT INTO `ligne_vente` (`id`, `quantite_achat`, `date_achat`) VALUES
(6, 122, '2014-01-01'),
(7, 12, '2014-01-01'),
(8, 12, '2014-01-01'),
(9, 4, '2014-01-01'),
(10, 4, '2014-01-01'),
(11, 4, '2014-01-01'),
(12, 4, '2014-01-01'),
(13, 1, '2014-01-01'),
(14, 12, '2019-06-01'),
(15, 3, '2019-01-01'),
(16, 3, '2019-01-01'),
(17, 3, '2019-01-01'),
(18, 12, '2018-01-01'),
(19, 12, '2018-01-01'),
(20, 12, '2018-01-01'),
(21, 12, '2018-01-01'),
(22, 4, '2015-01-01'),
(23, 1, '2014-01-01'),
(24, 1, '2018-04-08'),
(25, 1, '2014-01-01'),
(26, 1, '2016-01-01'),
(27, 2, '2015-03-05');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_vente_client`
--

CREATE TABLE `ligne_vente_client` (
  `ligne_vente_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_vente_client`
--

INSERT INTO `ligne_vente_client` (`ligne_vente_id`, `client_id`) VALUES
(6, 43),
(7, 44),
(8, 46),
(9, 47),
(10, 47),
(11, 47),
(12, 47),
(13, 45),
(14, 44),
(15, 46),
(16, 46),
(17, 46),
(18, 43),
(19, 43),
(20, 43),
(21, 43),
(22, 49),
(23, 44),
(24, 45),
(25, 48),
(26, 48),
(27, 43);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_vente_produite`
--

CREATE TABLE `ligne_vente_produite` (
  `ligne_vente_id` varchar(255) NOT NULL,
  `produite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_vente_produite`
--

INSERT INTO `ligne_vente_produite` (`ligne_vente_id`, `produite_id`) VALUES
('6', 7),
('7', 7),
('8', 8),
('9', 7),
('10', 7),
('11', 7),
('12', 7),
('13', 8),
('14', 7),
('15', 7),
('16', 7),
('17', 7),
('18', 7),
('19', 7),
('20', 7),
('21', 7),
('22', 7),
('23', 7),
('24', 7),
('25', 7),
('26', 9),
('27', 7);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191024053627', '2019-10-24 05:40:02'),
('20191027214327', '2019-10-27 21:45:37'),
('20191029064029', '2019-10-29 06:49:19'),
('20191031204710', '2019-10-31 20:49:29'),
('20191031205443', '2019-10-31 21:02:18');

-- --------------------------------------------------------

--
-- Structure de la table `produite`
--

CREATE TABLE `produite` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `pu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produite`
--

INSERT INTO `produite` (`id`, `numero`, `libelle`, `quantite`, `pu`) VALUES
(7, 14, 'clavier', 2, 12000),
(8, 4, 'ecran', 2, 100000),
(9, 78, 'écouteur', 12, 10000),
(10, 45, 'Ordinateur hp', 30, 1000000),
(11, 46, 'Ordinateur Asus', 30, 1400000),
(12, 47, 'Ordinateur Dell', 30, 800000),
(13, 48, 'Ordinateur Acer', 30, 2000000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DAB014612` (`clients_id`);

--
-- Index pour la table `lignevente`
--
ALTER TABLE `lignevente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_vente`
--
ALTER TABLE `ligne_vente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `produite`
--
ALTER TABLE `produite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignevente`
--
ALTER TABLE `lignevente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_vente`
--
ALTER TABLE `ligne_vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `produite`
--
ALTER TABLE `produite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DAB014612` FOREIGN KEY (`clients_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
