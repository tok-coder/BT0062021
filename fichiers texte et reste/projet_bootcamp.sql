-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 jan. 2022 à 23:04
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_bootcamp`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `prenom`, `nom`, `description`, `mail`) VALUES
(5, 'Tokossel', 'Mbodj', '         Toko a ecrit un message   ', 'toko@gmail.com'),
(6, 'Maty', 'Mbodj', '         message   ', 'maty@gmail.com'),
(7, 'Amadou', 'Mbodj', '            amadou', 'amadou@gmail.com'),
(8, 'Ibo', 'Ndiongue', '            ibo', 'ibo@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'utilisateur',
  `date` date NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `telephone`, `email`, `motdepasse`, `role`, `date`, `avatar`) VALUES
(1, 'tokossel', 'mbodj', 77123, 'toko@gmail.com', '67e6ea6352359c16b3964bced760498ebc00ce10', 'admin', '2022-01-09', 'IMG-20210107-WA0005.jpg'),
(3, 'aliou', 'thior', 3456, 'aliou@gmail.com', 'c0087edfc04b340db515fe480f2939dc584b6a56', 'admin', '2022-01-09', 'image1.jpg'),
(4, 'astou', 'mbacke', 5679, 'astou@gmail.com', '6bdc541b60b81511c34ad4981147d804c34cfb3b', 'utilisateur', '2022-01-09', 'image22.jpg'),
(5, 'mamadou', 'bangaly', 1234, 'mamadou@gmail.com', '5c9d4ed5ffae4fa144986bc9908677d9ffb34aa2', 'utilisateur', '2022-01-09', 'image5.jpg'),
(8, 'aminata', 'wade', 66788, 'wade@gmail.com', '65ec43c06f1acc6d6d02aeb67846f0cc92e272d7', 'utilisateur', '2022-01-10', 'imageb.jpeg'),
(10, 'Astou', 'Sarr', 12334, 'sarr@gmail.com', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 'utilisateur', '2022-01-16', 'client.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
