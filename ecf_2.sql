-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 jan. 2025 à 15:34
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
-- Base de données : `ecf_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `creation_date` date NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `creation_date`, `content`, `id_user`) VALUES
(29, '2025-01-18', 'Félicitations, Polochon et Couette ! Vous avez enfin trouvé quelqu’un qui supporte vos chaussettes dépareillées et vos talents culinaires... ou devrais-je dire, vos \"expériences\" en cuisine ! Que votre amour soit aussi doux qu’un coussin moelleux !', 4),
(30, '2025-01-06', 'Bravo à vous deux ! Qui aurait cru que le secret d’un mariage heureux serait de se battre pour la télécommande ? Que votre vie soit pleine de rires, de câlins et de snacks à volonté !', 4),
(31, '2025-01-26', 'Polochon et Couette, vous êtes la preuve vivante que même les paires les plus improbables peuvent faire de grandes choses ! Que votre amour soit aussi solide qu’un canapé en cuir et aussi confortable qu’un plaid en polaire !', 4),
(32, '2025-01-22', 'Félicitations aux rois et reines du canapé ! Que votre vie commune soit remplie de séries à binge-watcher et de repas de livraison ! N’oubliez pas de laisser un peu de place pour les chips !', 4),
(33, '2025-01-12', 'Félicitations, Polochon et Couette ! Que votre amour soit aussi solide qu\'un bon vieux canapé et aussi confortable qu\'une couette en plumes. N\'oubliez pas : en mariage, il faut toujours laisser du chocolat au fond du frigo pour éviter les disputes.', 5),
(34, '2025-01-27', 'Félicitations, Polochon et Couette ! Que votre amour soit aussi doux qu’un plaid tout neuf et aussi joyeux qu’un enfant qui découvre un trampoline. Rappelez-vous : dans le mariage, le mot \'non\' est banni !', 6),
(35, '2025-01-19', 'À Polochon et Couette, les nouveaux aventuriers du canapé ! Que votre vie ensemble soit pleine de bonheur, de fous rires et d’une bonne dose de chocolat. Et si jamais ça chauffe, n\'oubliez pas le ventilateur !', 7),
(36, '2025-01-26', 'Bravo aux deux tourtereaux ! Vous êtes la preuve vivante que l’amour, c’est comme une bonne vieille couette : ça doit être chaud, confortable et parfois un peu trop étouffant !', 8),
(37, '2025-01-20', 'Félicitations ! Que votre mariage soit aussi joyeux qu\'une bataille d\'oreillers et aussi solide qu\'un bon vieux canapé ! Que les années passent sans que les ressorts ne grincent !', 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `name`, `mail`, `registration_date`, `password`) VALUES
(1, 'Dra', 'Housse', 'drahousse@test.fr', '2025-01-22', '1234'),
(2, 'Carpette', 'Deli', 'carpettedeli@test.fr', '2025-01-22', '1234'),
(3, 'toto', 'dodo', 'toto@toto.fr', '0000-00-00', '$2y$10$wXZg4WYF4hTd2bRHrtRgyeZQMK0YAFtou4VyIFBz7df6lMq92lOLG'),
(4, 'Pat', 'Commode', 'pat.pat@test.fr', '0000-00-00', '$2y$10$jrJkWBwyFcaSNrN8si0VtOgZKKz3cRyEXwpP5oJKqwWz6UwZxXLpq'),
(5, 'Lino', 'Carpette', 'lino@test.fr', '0000-00-00', '$2y$10$SEFdRk5iDU3/olWavaHmau9C6jL0lSVyQ40jZ56yP3Q/iysD5i6jq'),
(6, 'Descente', 'Deli', 'Descente@test.fr', '0000-00-00', '$2y$10$5/VuOZXZTJoYkFHHUItzXOtaYSe2v0U2mh6ackgsOitVIMJPHU2Da'),
(7, 'Mousse', 'Canapé', 'mousse@test.fr', '0000-00-00', '$2y$10$qDXsOAYAeDLeoJI9H0RrQ.1T7e9Zq1IioJAGKyFL67LFY.B32TFr.'),
(8, 'Dra', 'Housse', 'dra@test.fr', '0000-00-00', '$2y$10$uLzNR5lnDv5/Vc5QOBWKQOog8IRH.SQ5crccWf/AA1tpTeW6/xFp.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
