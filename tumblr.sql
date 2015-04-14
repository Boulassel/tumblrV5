-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 14 Avril 2015 à 14:29
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tumblr`
--
CREATE DATABASE IF NOT EXISTS `tumblr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tumblr`;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(31) NOT NULL,
  `nom_image` varchar(255) NOT NULL,
  `caption_image` varchar(255) DEFAULT NULL,
  `idUser` int(31) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `nom_image`, `caption_image`, `idUser`) VALUES
(1, 'hulk.jpg', 'un commentaire', 1),
(2, 'wolf.jpg', 'hello', 7),
(3, 'joke.jpg', 'hello', 13),
(4, 'sup.jpg', 'supperman', 13);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(31) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `mdp`, `date_creation`) VALUES
(1, 'boulassel', 'paul', 'paul@yahoo.fr', 'aaaa', '2015-03-10 12:14:24'),
(7, 'boulassel', 'paul', 'pau@yahoo.fr', 'aaaa', '2015-03-10 12:27:33'),
(11, 'boulassel', 'paul', 'pau@yoo.fr', 'aaaa', '2015-03-10 14:18:42'),
(13, 'boulassel', 'samir', 'boulasam63@yahoo.fr', 'a', '2015-03-10 14:38:45'),
(17, 'boulassel', 'samir', 'boulasselsamir@gmail.com', 'a', '2015-03-10 15:06:53'),
(20, 'boulassel', 'samir', 'admin@so-mba.com', 'a', '2015-03-10 15:08:47'),
(26, 'boulassel', 'samir', 'd', 'd', '2015-03-10 15:19:36'),
(28, 'boulassel', 'samir', 'ds', 's', '2015-03-10 15:21:43');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
MODIFY `id` int(31) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(31) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
