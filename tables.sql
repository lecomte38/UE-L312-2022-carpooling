-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 23 nov. 2022 à 15:48
-- Version du serveur : 8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carpooling`
--

-- --------------------------------------------------------

--
-- Structure de la table `carpool_ads`
--

CREATE TABLE `carpool_ads` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `idCar` int NOT NULL,
  `idAdvertiser` int NOT NULL,
  `departurePlace` varchar(255) NOT NULL,
  `arrivalPlace` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `carpool_ads`
--

INSERT INTO `carpool_ads` (`id`, `name`, `idCar`, `idAdvertiser`, `departurePlace`, `arrivalPlace`) VALUES
(1, 'Trajet Lille/Paris', 3, 3, 'Lille', 'Paris'),
(2, 'Voyage France/Allemagne', 4, 5, 'France', 'Allemagne'),
(3, 'Covoiturage Cambrai/Valenciennes', 1, 1, 'Cambrai', 'Valenciennes');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `nbSeat` int NOT NULL,
  `idOwner` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `nbSeat`, `idOwner`) VALUES
(1, 'PEUGEOT', '3008', 5, 3),
(2, 'FIAT', '500', 4, 2),
(3, 'TOYOTA', 'AE86', 4, 4),
(4, 'LAMBORGHINI', 'Aventador LP 700-4', 2, 5),
(5, 'RENAULT', 'CLIO', 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `idCarpoolAd` int NOT NULL,
  `idClient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `idCarpoolAd`, `idClient`) VALUES
(1, 2, 2),
(2, 3, 5),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08 00:00:00'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08 00:00:00'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08 00:00:00'),
(4, 'Nicolas', 'Lecomte', 'nicolaslovetoyota@orange.fr', '2002-09-07 00:00:00'),
(5, 'Tom', 'Col', 'insanelamborghini@orange.fr', '2000-10-15 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carpool_ads`
--
ALTER TABLE `carpool_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAdvertiser` (`idAdvertiser`),
  ADD KEY `idCar` (`idCar`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOwner` (`idOwner`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idCarpoolAd` (`idCarpoolAd`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carpool_ads`
--
ALTER TABLE `carpool_ads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carpool_ads`
--
ALTER TABLE `carpool_ads`
  ADD CONSTRAINT `idAdvertiser` FOREIGN KEY (`idAdvertiser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idCar` FOREIGN KEY (`idCar`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `idOwner` FOREIGN KEY (`idOwner`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `idCarpoolAd` FOREIGN KEY (`idCarpoolAd`) REFERENCES `carpool_ads` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idClient` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
