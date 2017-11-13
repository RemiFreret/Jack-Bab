-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 13 Novembre 2017 à 18:53
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cardNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `crypto` int(11) NOT NULL,
  `dateExp` date NOT NULL,
  `dateRetrait` datetime NOT NULL,
  `listProduit` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `email`, `firstName`, `lastName`, `cardNumber`, `crypto`, `dateExp`, `dateRetrait`, `listProduit`, `state`) VALUES
(65, 'f.bezancon@gmail.com', 'Félix', 'Bezançon', '5132124585956852', 755, '2017-12-09', '2017-11-09 10:30:00', 'a:4:{i:4;a:5:{s:4:"name";s:5:"Kebab";s:11:"description";s:19:"Un délicieux kebab";s:5:"price";i:4;s:8:"quantity";i:1;s:5:"total";i:4;}s:5:"price";i:16;i:5;a:5:{s:4:"name";s:12:"Kebab frites";s:11:"description";s:35:"Un délicieux kebab avec ses frites";s:5:"price";i:6;s:8:"quantity";i:1;s:5:"total";i:6;}i:6;a:5:{s:4:"name";s:10:"Kebak pita";s:11:"description";s:38:"Un délicieux kebab avec son pain pita";s:5:"price";i:6;s:8:"quantity";i:1;s:5:"total";i:6;}}', 2),
(66, 'f.bezancon@gmail.com', 'Félix', 'Bezançon', '5132857896985855', 855, '2018-12-09', '2017-11-09 11:00:00', 'a:2:{i:4;a:5:{s:4:"name";s:5:"Kebab";s:11:"description";s:19:"Un délicieux kebab";s:5:"price";i:4;s:8:"quantity";i:1;s:5:"total";i:4;}s:5:"price";i:4;}', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `title`, `email`, `message`, `time`) VALUES
(41, 'Un vrai régale !', 'f.bezancon@gmail.com', 'C\'est vraiment le meilleur kebab que j\'ai mangé dans ma vie !', '2017-11-13 18:51:42'),
(42, 'Délicieux !', 'f.bezancon@gmail.com', 'Nous avons passé un fabuleux moment à manger notre kebab frite devant la télé.', '2017-11-13 18:52:20');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`) VALUES
(4, 'Kebab', 'Un délicieux kebab', 4),
(5, 'Kebab frites', 'Un délicieux kebab avec ses frites', 6),
(6, 'Kebak pita', 'Un délicieux kebab avec son pain pita', 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`, `salt`, `rights`) VALUES
(2, 'Félix', 'Bezançon', 'f.bezancon@gmail.com', 'afaead3f3edfdb22e3f3e0521ab43340161d3123', '9220033315a03b536ecbb05.56507171', 2),
(3, 'Matthieu', 'Jan', 'matthieujan@protonmail.com', '2e29c6b64bc784c90f926669f41c58cb3abab97e', '18320488615a03b92cafbe02.87302292', 1),
(4, 'Rémi', 'Freret', 'remi.freret@gmail.com', '286d93121266e668f6ffa167ddd22f7a90c1336b', '3151245685a03b9481988c2.53553328', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
