-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 juin 2022 à 14:56
-- Version du serveur : 5.7.31
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `geosport`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `active` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_B8EE3872A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id`, `user_id`, `name`, `image`, `description`, `latitude`, `longitude`, `active`, `updated_at`, `created_at`) VALUES
(1, 4, 'FC Nantes', 'nantes.png', 'Le Football Club de Nantes est un club de football français, fondé en 1943 dans la ville de Nantes (France).\r\nAvec huit titres de Champion de France, trois Coupe de France, deux Trophées des Champions et 100 matches européens, le FC Nantes présente l\'un des plus beaux palmarès du football français.', 47.256, -1.525, 1, '2022-06-14 13:47:45', '2022-06-14 09:43:55'),
(2, 4, 'Olympique de Marseille', 'marseille.png', 'L\'Olympique de Marseille (OM) est un club de football français fondé en 1899 à Marseille par René Dufaure de Montmirail.', 43.27, 5.396, 1, '2022-06-14 13:47:58', '2022-06-14 10:02:40'),
(3, 4, 'Stade Rennais Football Club', 'rennes.png', 'Le Stade rennais Football Club est un club de football français, fondé le 10 mars 1901 et basé à Rennes.\r\n\r\nDans un premier temps club d’athlétisme évoluant avec les couleurs bleu ciel et bleu marine, il porte le nom de Stade rennais jusqu\'à sa fusion avec le Football Club rennais en 1904. De ce fait, il devient le Stade rennais Université Club et adopte les couleurs rouge et noir du FC rennais. Il dispute ses premières compétitions officielles à partir de 1902 au sein du Comité de Bretagne de l\'USFSA. En 1912, il emménage sur un terrain situé au bord de la Vilaine, sur lequel est érigé l\'actuel Roazhon Park.', 48.108, -1.713, 1, '2022-06-14 13:48:10', '2022-06-14 10:04:48'),
(4, 4, 'Real Madrid', 'real.png', 'Le Real Madrid Club de Fútbol, plus connu sous le nom de Real Madrid ou simplement Real, est un club professionnel espagnol de football, basé à Madrid. Vainqueur de très nombreux titres nationaux et internationaux, il a reçu de la Fédération internationale de football association (FIFA) le titre honorifique de plus grand club du xxe siècle.', 40.453, -3.688, 1, '2022-06-14 13:48:20', '2022-06-14 13:03:43');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `FK_B8EE3872A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
