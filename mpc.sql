-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 13 Décembre 2016 à 16:55
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mpc`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `prenom`) VALUES
(1, 'Jackson', 'Michael'),
(2, 'Zola', 'Emile'),
(3, 'Uderzo', 'Albert'),
(5, 'Asimov', 'Isaac'),
(6, 'Lovecraft', 'Howard Philip');

-- --------------------------------------------------------

--
-- Structure de la table `bd`
--

CREATE TABLE `bd` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bd`
--

INSERT INTO `bd` (`id`, `ouvrage_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cd`
--

CREATE TABLE `cd` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cd`
--

INSERT INTO `cd` (`id`, `ouvrage_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) NOT NULL,
  `date_retour` date NOT NULL,
  `date_emprunt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`) VALUES
(1, 'Aventure'),
(2, 'Pop'),
(5, 'rock'),
(6, 'drame'),
(7, 'roman'),
(8, 'Science-fiction'),
(9, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `titre`, `auteur_id`, `genre_id`, `annee`, `date`) VALUES
(1, 'Thriller', 1, 2, 1987, '2016-12-13'),
(2, 'Astérix chez Cléopatre', 3, 1, 1994, '2016-12-13'),
(3, 'Robots', 5, 8, 1987, '2016-12-13'),
(4, 'Le Cauchemar d\'Innsmouth', 6, 9, 1994, '2016-12-13');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ouvrage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `emprunt_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bd`
--
ALTER TABLE `bd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Index pour la table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_id` (`auteur_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `emprunt_id` (`emprunt_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `bd`
--
ALTER TABLE `bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bd`
--
ALTER TABLE `bd`
  ADD CONSTRAINT `bd_ibfk_1` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `cd_ibfk_1` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `ouvrage_id` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `auteur_id` FOREIGN KEY (`auteur_id`) REFERENCES `auteurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateurs_ibfk_2` FOREIGN KEY (`emprunt_id`) REFERENCES `emprunt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
