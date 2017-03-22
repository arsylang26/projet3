-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Mars 2017 à 19:39
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `id_episode` int(11) NOT NULL,
  `rang_commentaire` int(11) NOT NULL,
  `parent_commentaire` int(11) NOT NULL,
  `abusif` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `date_commentaire`, `auteur`, `contenu`, `id_episode`, `rang_commentaire`, `parent_commentaire`, `abusif`) VALUES
(1, '2017-02-09 12:12:34', 'Fabien', 'ceci est un commentaire élogieux', 1, 0, 0, 0),
(2, '2017-03-02 00:00:00', 'inconnu', 'bof', 1, 0, 0, 0),
(3, '2017-03-04 13:00:00', 'anne onyme', 'peut mieux faire', 2, 0, 0, 0),
(4, '2017-03-09 20:11:20', 'dff', '<p>sdd</p>', 1, 0, 0, 0),
(5, '2017-03-09 20:15:31', 'dff', '<p>sdd</p>', 1, 0, 0, 0),
(6, '2017-03-09 20:15:46', 'jaja', '<p>ffff</p>', 1, 0, 0, 0),
(7, '2017-03-09 20:16:31', 'jaja', '<p>ffff</p>', 1, 0, 0, 0),
(8, '2017-03-09 20:16:47', 'fifo', '<p>tttrt</p>', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `date_episode` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `episodes`
--

INSERT INTO `episodes` (`id`, `date_episode`, `titre`, `contenu`) VALUES
(1, '2017-03-01 13:42:00', 'premier épisode', 'blabla................................................................................................................................................................................................................blabla'),
(2, '2017-03-07 05:00:00', 'second épisode', 'sqssssssxxxwxx<x<x.......................................................................................................................................................');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
