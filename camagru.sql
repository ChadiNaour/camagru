-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 22 déc. 2020 à 05:20
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `camagru`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `creat_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creat_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `creat_time`) VALUES
(1, 'wld l7aj', 'tikchbila@lmer7om.com', '123456', '2020-12-22 02:23:53'),
(2, 'chadi', 'chadi.mustang17@gmail.com', '$2y$10$GMCD8KLCr4ZRHWrTnV7Nnez37LjSjazjFDYkxBpqFsFoUWJqgu1yO', '2020-12-22 04:49:34'),
(3, 'ddfdf', 'naourchadi@gmail.com', '$2y$10$TTeOySN/fVpSiS072hsm1eKZJw982HfSV9q5j92YH8LEWuoJ6Ub4y', '2020-12-22 05:00:34'),
(4, 'ddfdf', 'naourchacxccxcdi@gmail.com', '$2y$10$li9MHEuQRLPVGNcLxgAo.OLjQq2GQDgzYOzquWFkK3c6Yk7IQX2bi', '2020-12-22 05:01:51'),
(5, 'ddfdf', 'naourcvvcvchacxccxcdi@gmail.com', '$2y$10$AmMzXZUMD87eH7NFn1hrTeCOov.hwFt9xQdAFOJQzq5da0Bc5eEVq', '2020-12-22 05:03:41'),
(6, 'ddfdf', 'naocdi@gmail.com', '$2y$10$jF6SqPtRxBik1e6Cll6AN.3HFjmgLoFgrsAkLkLHJV5sb9JMvhdLq', '2020-12-22 05:04:26'),
(7, 'ddfdf', 'naoccccdi@gmail.com', '$2y$10$K/CE2aRMr79njsTDt7rYnedDioaao9W381CRZhZD0wjbfI.OIs9v6', '2020-12-22 05:05:23'),
(8, 'ddfdf', 'naosdsdccccdi@gmail.com', '$2y$10$vXKdGLTk5cXho4QelDrcIuovRg.hfmnvkp.dJVB5LM91aNRHs4ghO', '2020-12-22 05:06:31'),
(9, 'ddfdf', 'ncccdi@gmail.com', '$2y$10$GJtIgeXnJTWNlT/qhKBoceayejuVlhGCm16sN1BafcCYRP.R6p.3.', '2020-12-22 05:08:44'),
(10, 'ddfdf', 'cccdi@gmail.com', '$2y$10$kdKCHbMjCm4cPxIcrXZINugZsXjYoxE.uEfsHsQW28Tis.YyU./Hu', '2020-12-22 05:09:20'),
(11, 'ddfdf', 'cdfdfccdi@gmail.com', '$2y$10$EDbYFkd6iDT1aqSHqj7OFutjr3bwnTtuJNkG.fC6I1Qr/./LH4F1C', '2020-12-22 05:11:02'),
(12, 'khriwa', 'khriwa@briwa.com', '$2y$10$ocf0okl.hen7ABQewExDa.JMZOaXkzJwEFYHIbQrV83GhIROn4nDK', '2020-12-22 05:15:53'),
(13, 'briwakho khriwa', 'briwa@khriwa.com', '$2y$10$NbkwjgJj7KtAXuICFknB1.hcvww1lIVznU0mH6fUVzw59XVXt4G6e', '2020-12-22 05:16:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
