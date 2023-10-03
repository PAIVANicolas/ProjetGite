-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 03 oct. 2023 à 08:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ProjetGite`
--

-- --------------------------------------------------------

--
-- Structure de la table `Contenu`
--

CREATE TABLE `Contenu` (
                           `Id_Contenu` int(11) NOT NULL,
                           `section` enum('Accueil','réservation','transport','activités','repas') NOT NULL,
                           `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Image`
--

CREATE TABLE `Image` (
                         `Id_Image` int(11) NOT NULL,
                         `image_path` varchar(250) DEFAULT NULL,
                         `image_alt` varchar(250) DEFAULT NULL,
                         `is_featured` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
                                `id` int(11) NOT NULL,
                                `start_date` date NOT NULL,
                                `end_date` date NOT NULL,
                                `client_name` varchar(255) NOT NULL,
                                `client_email` varchar(255) NOT NULL,
                                `client_phone` varchar(20) DEFAULT NULL,
                                `status` enum('en attente','confirmée','rejetée') NOT NULL,
                                `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                                `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
                               `Id_Utilisateur` int(11) NOT NULL,
                               `identifiant` varchar(200) DEFAULT NULL,
                               `password` varchar(200) DEFAULT NULL,
                               `email` varchar(200) DEFAULT NULL,
                               `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id_Utilisateur`, `identifiant`, `password`, `email`, `role`) VALUES
    (1, 'root', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Contenu`
--
ALTER TABLE `Contenu`
    ADD PRIMARY KEY (`Id_Contenu`);

--
-- Index pour la table `Image`
--
ALTER TABLE `Image`
    ADD PRIMARY KEY (`Id_Image`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
    ADD PRIMARY KEY (`Id_Utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Contenu`
--
ALTER TABLE `Contenu`
    MODIFY `Id_Contenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Image`
--
ALTER TABLE `Image`
    MODIFY `Id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
    MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
