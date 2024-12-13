-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 déc. 2024 à 09:18
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quiz_td`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `id_question` bigint NOT NULL,
  `is_right` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_id_question_foreign` (`id_question`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `content`, `id_question`, `is_right`) VALUES
(1, 'Bordeciel', 1, 0),
(2, 'Blancherive', 1, 0),
(3, 'Tamriel', 1, 1),
(4, 'Morrownid', 1, 0),
(5, 'Peach', 2, 1),
(6, 'Toad', 2, 0),
(7, 'Yoshi', 2, 0),
(8, 'Luigi', 2, 0),
(9, 'un pipeau', 3, 0),
(10, 'Un arc', 3, 0),
(11, 'Une flûte de pan', 3, 0),
(12, 'Une ocarina', 3, 1),
(13, 'Spider-man', 4, 1),
(14, 'Batman', 4, 0),
(15, 'Venom', 4, 0),
(16, 'Bouclier-man', 4, 0),
(17, 'Professeur Charles Xavier', 5, 1),
(18, 'Dumbledore', 5, 0),
(19, 'Dr Stan Lee', 5, 0),
(20, 'Wolverine', 5, 0),
(21, 'Le Joker ', 6, 1),
(22, 'Le Pingouin', 6, 0),
(23, 'Oswald Chesterfield Cobblepot', 6, 0),
(24, 'Le clown', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `id_quiz` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id_quiz_foreign` (`id_quiz`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `content`, `id_quiz`) VALUES
(1, 'Comment s’appelle le “monde” dans lequel on joue à Skyrim ?', 1),
(2, 'Quel est le nom de la princesse dans Mario ?', 1),
(3, 'Dans \"The Legend of Zelda: Ocarina of Time\", quel instrument Link utilise-t-il pour manipuler le temps et résoudre des énigmes ?', 1),
(4, 'Quel est l’alias secret de Peter Parker ?', 2),
(5, 'Qui est le fondateur de l’école des mutants (X-men) ?', 2),
(6, 'Quel est le nom du joker, l\'ennemi de Batman, dans les comics ?', 2);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id`, `name`) VALUES
(1, 'jeux-videos'),
(2, 'comics');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_quiz` bigint NOT NULL,
  `id_player` bigint NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `score_id_player_foreign` (`id_player`),
  KEY `score_id_quiz_foreign` (`id_quiz`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
