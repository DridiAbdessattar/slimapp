-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 03 avr. 2019 à 01:59
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `address`, `city`, `state`) VALUES
(2, 'dridi10', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(3, 'Brad', 'Traversy', '333-333-3333', 'brad@test.com', '333 South st', 'Portland', 'ME'),
(4, 'Sam', 'Smith', '333-333-3333', 'ssmith@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(5, 'dridi', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(6, 'dridi', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(7, 'dridi', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(8, 'dridi', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(9, 'dridi', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(11, 'dridi12', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(12, 'dridi1iiiiiii0iiiiiii', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL'),
(13, 'dridi1iiiiiii012', 'abdessattar', '25 77 20 85', 'abdessattar@yahoo.com', '33 Birch Rd', 'Miami', 'FL');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
