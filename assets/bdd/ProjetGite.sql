-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 nov. 2023 à 15:13
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
-- Base de données : `projetgite`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
                           `Id_Contenu` int(11) NOT NULL,
                           `section` enum('Accueil') NOT NULL,
                           `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
                         `Id_Image` int(11) NOT NULL,
                         `image_path` varchar(250) DEFAULT NULL,
                         `image_alt` varchar(250) DEFAULT NULL,
                         `is_featured` enum('yes','no') NOT NULL,
                         `section` enum('Carrousel') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`Id_Image`, `image_path`, `image_alt`, `is_featured`, `section`) VALUES
                                                                                          (21, '../assets/images/carrousel/1699020686_figuies1.jpg', 'maison', 'no', 'Carrousel'),
                                                                                          (22, '../assets/images/carrousel/1699020692_figuies1.jpg', 'maison 2', 'no', 'Carrousel'),
                                                                                          (23, '../assets/images/carrousel/1699020699_figuies2.jpg', 'maison 3', 'no', 'Carrousel'),
                                                                                          (24, '../assets/images/carrousel/1699020704_salleslasourcecascadedelacrouzie_w2000.jpg', 'Cascade', 'no', 'Carrousel');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
                                `id` int(11) NOT NULL,
                                `start_date` datetime NOT NULL,
                                `end_date` datetime NOT NULL,
                                `client_name` varchar(255) NOT NULL,
                                `client_email` varchar(255) NOT NULL,
                                `client_phone` varchar(20) DEFAULT NULL,
                                `status` enum('en attente','confirmée','rejetée') NOT NULL,
                                `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                                `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                                `client_surname` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `start_date`, `end_date`, `client_name`, `client_email`, `client_phone`, `status`, `created_at`, `updated_at`, `client_surname`) VALUES
                                                                                                                                                                       (26, '2023-10-21 00:00:00', '2023-10-22 00:00:00', 'Adap', 'o@gma.com', '0602267210', 'en attente', '2023-10-20 08:34:13', '2023-10-20 08:34:13', 'Ubar'),
                                                                                                                                                                       (27, '2023-10-26 00:00:00', '2023-10-29 00:00:00', 'nn', 'o@gma.com', '0989728191', 'en attente', '2023-10-20 09:00:56', '2023-10-20 09:00:56', 'nnj'),
                                                                                                                                                                       (28, '2023-10-31 00:00:00', '2023-11-03 00:00:00', 'des', 'test@gaiml.com', '515115151551515', 'en attente', '2023-10-30 14:44:06', '2023-10-30 14:44:06', 'zdas'),
                                                                                                                                                                       (29, '2024-01-01 00:00:00', '2024-01-02 00:00:00', 'Ju', 'test@gaiml.com', '0606060606', 'en attente', '2023-10-31 08:30:26', '2023-10-31 08:30:26', 'Ad');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
                               `Id_Utilisateur` int(11) NOT NULL,
                               `identifiant` varchar(200) DEFAULT NULL,
                               `password` varchar(200) DEFAULT NULL,
                               `email` varchar(200) DEFAULT NULL,
                               `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_Utilisateur`, `identifiant`, `password`, `email`, `role`) VALUES
    (1, 'root', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
    ADD PRIMARY KEY (`Id_Contenu`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
    ADD PRIMARY KEY (`Id_Image`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
    ADD PRIMARY KEY (`Id_Utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
    MODIFY `Id_Contenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
    MODIFY `Id_Image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
    MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
