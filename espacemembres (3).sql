-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 nov. 2023 à 10:30
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
-- Base de données : `espacemembres`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeusouhait`
--

CREATE TABLE `jeusouhait` (
  `id` int(11) NOT NULL,
  `FILE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `NOMJ` varchar(255) NOT NULL,
  `FILE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `NOMJ`, `FILE`) VALUES
(20, 'MONOPOLY', 'monopoly.png'),
(21, 'uno', 'uno.png'),
(22, 'scrable', 'scrable.png'),
(23, 'carte', 'Carte.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(9, 'talla', 'mor', 'mor@gmail.com', '$2y$12$eLPwXqcbfUiRX/xC1bayG.5B739GFS9Z8W/9PaEWzQjnG9/Xt6OE2', 2),
(10, 'degla', 'loic', 'loic@gmail.com', '$2y$12$UpncW5.EMdC3FsT9aLo6wOCV2Ho9XW2Cz7eqkpzbWCpBarzHge8vW', 1),
(17, 'dione', 'awa', 'awajhon0702@gmail.com', '$2y$12$anKiJRZNAyaHA6QDwqSRhuMsPZh6aWOtHupHlLU0w4zuOVBwpax46', 2),
(20, 'amar', 'amar', 'ama@gmail.com', '$2y$12$V34rDTG8.1k9nceRkrZ4TO6EiD.Z2CUmKucxxyaoHu/cOypk0Xmza', 2),
(22, 'oo', 'oo', 'oo@gmail.com', '$2y$12$d9Xg1KpeutSEomnxPguRq.Yo2jKamb.IE5EEC6lFj6XfsyoI8BQYu', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeusouhait`
--
ALTER TABLE `jeusouhait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeusouhait`
--
ALTER TABLE `jeusouhait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
