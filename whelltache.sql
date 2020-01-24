-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 18, 2020 at 10:56 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whelltache`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `libelle`, `img`) VALUES
(1, 'avatar1', 'avatar1.png'),
(2, 'avatar2', 'avatar2.png'),
(3, 'avatar3', 'avatar3.png'),
(4, 'avatar4', 'avatar4.png'),
(5, 'avatar5', 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id`, `libelle`, `img`) VALUES
(1, 'star', 'star.png'),
(2, 'heart', 'heart.png'),
(3, 'flower', 'flower.png');

-- --------------------------------------------------------

--
-- Table structure for table `civilite`
--

CREATE TABLE `civilite` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `civilite`
--

INSERT INTO `civilite` (`id`, `libelle`) VALUES
(1, 'fille'),
(2, 'garçon');

-- --------------------------------------------------------

--
-- Table structure for table `point_has_tache`
--

CREATE TABLE `point_has_tache` (
  `point_id` bigint(20) NOT NULL,
  `tache_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recompense`
--

CREATE TABLE `recompense` (
  `id` bigint(20) NOT NULL,
  `point` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recompense`
--

INSERT INTO `recompense` (`id`, `point`, `libelle`) VALUES
(1, 20, '10 euros'),
(2, 3, 'paquet bonbons'),
(3, 15, 'cinéma');

-- --------------------------------------------------------

--
-- Table structure for table `satisfaction`
--

CREATE TABLE `satisfaction` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satisfaction`
--

INSERT INTO `satisfaction` (`id`, `libelle`, `points`) VALUES
(1, 'satisfait', 4),
(2, 'moyennement satisfait', 2),
(3, 'pas satisfait', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

CREATE TABLE `tache` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`id`, `libelle`, `points`) VALUES
(1, 'mettre la table', 1),
(2, 'vider le lave-vaisselle', 2),
(3, 'ranger sa chambre', 2),
(4, 'nettoyer sa chambre', 1),
(5, 'plier les vetements', 2),
(6, 'ranger son armoire', 1),
(7, 'vider ce qu\'il y a sous le lit', 1),
(8, 'passer l\'aspirateur', 2),
(9, 'étendre le linge', 2),
(10, 'vider les courses', 1),
(11, 'nettoyer les vitres', 5),
(12, 'nettoyer la salle de bain', 5),
(13, 'sortir les poubelles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taches_executees`
--

CREATE TABLE `taches_executees` (
  `tache_id` bigint(20) NOT NULL,
  `utilisateur_id` bigint(20) NOT NULL,
  `satisfaction_id` bigint(20) DEFAULT NULL,
  `score` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taches_executees`
--

INSERT INTO `taches_executees` (`tache_id`, `utilisateur_id`, `satisfaction_id`, `score`, `date`, `id`) VALUES
(1, 1, NULL, 3, '2019-01-05 00:00:00', 1),
(1, 6, NULL, 1, NULL, 2),
(4, 6, NULL, 1, NULL, 3),
(6, 3, NULL, 1, NULL, 4),
(8, 3, NULL, 2, NULL, 5),
(1, 6, NULL, 1, NULL, 6),
(13, 6, NULL, 1, NULL, 7),
(6, 6, NULL, 1, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar_id` bigint(20) DEFAULT NULL,
  `civilite_id` bigint(20) NOT NULL,
  `tache_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `age`, `password`, `avatar_id`, `civilite_id`, `tache_id`) VALUES
(1, 'lola', 12, NULL, 1, 1, 4),
(3, 'gaelle', 41, '$2y$10$VvgI/2j.Zx0uKUW/7GnsRuU9rBspekg77Jt4seaFtIMBFGLc3Iib.', NULL, 1, 6),
(6, 'liam', 11, '$2y$10$0Sp32gTvXcdqcdpVfMVa8umxhZH4e14MhEQtwkP.1XbL07vwhfimu', NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_has_bonus`
--

CREATE TABLE `utilisateur_has_bonus` (
  `utilisateur_id` bigint(20) NOT NULL,
  `bonus_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_has_recompense`
--

CREATE TABLE `utilisateur_has_recompense` (
  `utilisateur_id` bigint(20) NOT NULL,
  `recompense_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur_has_recompense`
--

INSERT INTO `utilisateur_has_recompense` (`utilisateur_id`, `recompense_id`) VALUES
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civilite`
--
ALTER TABLE `civilite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_has_tache`
--
ALTER TABLE `point_has_tache`
  ADD PRIMARY KEY (`point_id`,`tache_id`),
  ADD KEY `fk_point_has_tache_tache1_idx` (`tache_id`);

--
-- Indexes for table `recompense`
--
ALTER TABLE `recompense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satisfaction`
--
ALTER TABLE `satisfaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taches_executees`
--
ALTER TABLE `taches_executees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tache_has_utilisateur_utilisateur1_idx` (`utilisateur_id`),
  ADD KEY `fk_tache_has_utilisateur_tache1_idx` (`tache_id`),
  ADD KEY `fk_taches_executees_satisfaction1_idx` (`satisfaction_id`),
  ADD KEY `tache_id_2` (`tache_id`,`utilisateur_id`) USING BTREE;

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utilisateur_avatar1_idx` (`avatar_id`),
  ADD KEY `fk_utilisateur_civilité1_idx` (`civilite_id`),
  ADD KEY `fk_utilisateur_tache1_idx` (`tache_id`);

--
-- Indexes for table `utilisateur_has_bonus`
--
ALTER TABLE `utilisateur_has_bonus`
  ADD PRIMARY KEY (`utilisateur_id`,`bonus_id`),
  ADD KEY `fk_utilisateur_has_bonus_bonus1_idx` (`bonus_id`),
  ADD KEY `fk_utilisateur_has_bonus_utilisateur1_idx` (`utilisateur_id`);

--
-- Indexes for table `utilisateur_has_recompense`
--
ALTER TABLE `utilisateur_has_recompense`
  ADD PRIMARY KEY (`utilisateur_id`,`recompense_id`),
  ADD KEY `fk_utilisateur_has_recompense_recompense1_idx` (`recompense_id`),
  ADD KEY `fk_utilisateur_has_recompense_utilisateur1_idx` (`utilisateur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `civilite`
--
ALTER TABLE `civilite`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recompense`
--
ALTER TABLE `recompense`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satisfaction`
--
ALTER TABLE `satisfaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `taches_executees`
--
ALTER TABLE `taches_executees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `point_has_tache`
--
ALTER TABLE `point_has_tache`
  ADD CONSTRAINT `fk_point_has_tache_tache1` FOREIGN KEY (`tache_id`) REFERENCES `tache` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `taches_executees`
--
ALTER TABLE `taches_executees`
  ADD CONSTRAINT `fk_tache_has_utilisateur_tache1` FOREIGN KEY (`tache_id`) REFERENCES `tache` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tache_has_utilisateur_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_taches_executees_satisfaction1` FOREIGN KEY (`satisfaction_id`) REFERENCES `satisfaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_avatar1` FOREIGN KEY (`avatar_id`) REFERENCES `avatar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_civilité1` FOREIGN KEY (`civilite_id`) REFERENCES `civilite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_tache1` FOREIGN KEY (`tache_id`) REFERENCES `tache` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utilisateur_has_bonus`
--
ALTER TABLE `utilisateur_has_bonus`
  ADD CONSTRAINT `fk_utilisateur_has_bonus_bonus1` FOREIGN KEY (`bonus_id`) REFERENCES `bonus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_has_bonus_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utilisateur_has_recompense`
--
ALTER TABLE `utilisateur_has_recompense`
  ADD CONSTRAINT `fk_utilisateur_has_recompense_recompense1` FOREIGN KEY (`recompense_id`) REFERENCES `recompense` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_has_recompense_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
