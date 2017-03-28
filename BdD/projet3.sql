-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 28 Mars 2017 à 20:01
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
  `auteur` varchar(100) CHARACTER SET latin1 NOT NULL,
  `contenu` text CHARACTER SET latin1 NOT NULL,
  `id_episode` int(11) NOT NULL,
  `rang_commentaire` int(11) NOT NULL,
  `parent_commentaire` int(11) DEFAULT NULL,
  `abusif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `date_commentaire`, `auteur`, `contenu`, `id_episode`, `rang_commentaire`, `parent_commentaire`, `abusif`) VALUES
(1, '2017-02-09 12:12:34', 'Fabien', 'ceci est un commentaire élogieux', 1, 0, NULL, 0),
(2, '2017-03-02 00:00:00', 'inconnu', 'bof', 1, 0, NULL, 0),
(3, '2017-03-04 13:00:00', 'anne onyme', 'peut mieux faire', 2, 0, NULL, 0),
(4, '2017-03-09 20:11:20', 'dff', 'pas mal', 1, 0, NULL, 0),
(5, '2017-03-09 20:15:31', 'dff', 'c\'est pas trop mal', 1, 0, NULL, 0),
(6, '2017-03-09 20:15:46', 'jaja', 'pfff !!!', 1, 0, NULL, 0),
(7, '2017-03-09 20:16:31', 'jaja', 'Grrrrrr !', 1, 0, NULL, 0),
(8, '2017-03-09 20:16:47', 'fifo', 'au secours !', 1, 1, 7, 0),
(9, '2017-03-23 07:00:00', 'sébastien', 'on peut le dire...', 1, 2, 8, 0),
(10, '2017-03-28 22:00:00', 'inconnu', 'troisième commentaire', 1, 3, 9, 0);

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `date_episode` datetime NOT NULL,
  `titre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contenu` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `episodes`
--

INSERT INTO `episodes` (`id`, `date_episode`, `titre`, `contenu`) VALUES
(1, '2017-03-01 13:42:00', 'premier épisode', ' Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.'),
(2, '2017-03-07 05:00:00', 'second épisode', '\r\nD\'où vient-il?\r\n\r\nContrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du "De Finibus Bonorum et Malorum" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, "Lorem ipsum dolor sit amet...", proviennent de la section 1.10.32.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_episode` (`id_episode`),
  ADD KEY `parent_commentaire` (`parent_commentaire`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `id_episode` FOREIGN KEY (`id_episode`) REFERENCES `episodes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_commentaire` FOREIGN KEY (`parent_commentaire`) REFERENCES `commentaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
