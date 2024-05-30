-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 mai 2024 à 12:06
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medicare`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
                                                `id` int NOT NULL AUTO_INCREMENT,
                                                `nom` varchar(100) DEFAULT NULL,
    `prenom` varchar(100) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `telephone` varchar(20) DEFAULT NULL,
    `login` varchar(100) DEFAULT NULL,
    `mdp` varchar(100) DEFAULT NULL,
    `type` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `login`, `mdp`, `type`) VALUES
                                                                                                       (1, 'Durand', 'Paul', 'paul.durand@example.com', '0712345678', 'paul.durand', 'adminpassword1', 'administrateur'),
                                                                                                       (2, 'Lefevre', 'Julie', 'julie.lefevre@example.com', '0723456789', 'julie.lefevre', 'adminpassword2', 'administrateur'),
                                                                                                       (3, 'Mercier', 'Jacques', 'jacques.mercier@example.com', '0734567890', 'jacques.mercier', 'adminpassword3', 'administrateur'),
                                                                                                       (4, 'Garcia', 'Emilie', 'emilie.garcia@example.com', '0745678901', 'emilie.garcia', 'adminpassword4', 'administrateur'),
                                                                                                       (5, 'Rousseau', 'Nicolas', 'nicolas.rousseau@example.com', '0756789012', 'nicolas.rousseau', 'adminpassword5', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

DROP TABLE IF EXISTS `calendrier`;
CREATE TABLE IF NOT EXISTS `calendrier` (
                                            `id` int NOT NULL AUTO_INCREMENT,
                                            `Lundi1` varchar(20) DEFAULT NULL,
    `Lundi2` varchar(20) DEFAULT NULL,
    `Lundi3` varchar(20) DEFAULT NULL,
    `Lundi4` varchar(20) DEFAULT NULL,
    `Lundi5` varchar(20) DEFAULT NULL,
    `Lundi6` varchar(20) DEFAULT NULL,
    `Lundi7` varchar(20) DEFAULT NULL,
    `Lundi8` varchar(20) DEFAULT NULL,
    `Lundi9` varchar(20) DEFAULT NULL,
    `Lundi10` varchar(20) DEFAULT NULL,
    `Lundi11` varchar(20) DEFAULT NULL,
    `Lundi12` varchar(20) DEFAULT NULL,
    `Mardi1` varchar(20) DEFAULT NULL,
    `Mardi2` varchar(20) DEFAULT NULL,
    `Mardi3` varchar(20) DEFAULT NULL,
    `Mardi4` varchar(20) DEFAULT NULL,
    `Mardi5` varchar(20) DEFAULT NULL,
    `Mardi6` varchar(20) DEFAULT NULL,
    `Mardi7` varchar(20) DEFAULT NULL,
    `Mardi8` varchar(20) DEFAULT NULL,
    `Mardi9` varchar(20) DEFAULT NULL,
    `Mardi10` varchar(20) DEFAULT NULL,
    `Mardi11` varchar(20) DEFAULT NULL,
    `Mardi12` varchar(20) DEFAULT NULL,
    `Mercredi1` varchar(20) DEFAULT NULL,
    `Mercredi2` varchar(20) DEFAULT NULL,
    `Mercredi3` varchar(20) DEFAULT NULL,
    `Mercredi4` varchar(20) DEFAULT NULL,
    `Mercredi5` varchar(20) DEFAULT NULL,
    `Mercredi6` varchar(20) DEFAULT NULL,
    `Mercredi7` varchar(20) DEFAULT NULL,
    `Mercredi8` varchar(20) DEFAULT NULL,
    `Mercredi9` varchar(20) DEFAULT NULL,
    `Mercredi10` varchar(20) DEFAULT NULL,
    `Mercredi11` varchar(20) DEFAULT NULL,
    `Mercredi12` varchar(20) DEFAULT NULL,
    `Jeudi1` varchar(20) DEFAULT NULL,
    `Jeudi2` varchar(20) DEFAULT NULL,
    `Jeudi3` varchar(20) DEFAULT NULL,
    `Jeudi4` varchar(20) DEFAULT NULL,
    `Jeudi5` varchar(20) DEFAULT NULL,
    `Jeudi6` varchar(20) DEFAULT NULL,
    `Jeudi7` varchar(20) DEFAULT NULL,
    `Jeudi8` varchar(20) DEFAULT NULL,
    `Jeudi9` varchar(20) DEFAULT NULL,
    `Jeudi10` varchar(20) DEFAULT NULL,
    `Jeudi11` varchar(20) DEFAULT NULL,
    `Jeudi12` varchar(20) DEFAULT NULL,
    `Vendredi1` varchar(20) DEFAULT NULL,
    `Vendredi2` varchar(20) DEFAULT NULL,
    `Vendredi3` varchar(20) DEFAULT NULL,
    `Vendredi4` varchar(20) DEFAULT NULL,
    `Vendredi5` varchar(20) DEFAULT NULL,
    `Vendredi6` varchar(20) DEFAULT NULL,
    `Vendredi7` varchar(20) DEFAULT NULL,
    `Vendredi8` varchar(20) DEFAULT NULL,
    `Vendredi9` varchar(20) DEFAULT NULL,
    `Vendredi10` varchar(20) DEFAULT NULL,
    `Vendredi11` varchar(20) DEFAULT NULL,
    `Vendredi12` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `calendrier`
--

INSERT INTO `calendrier` (`id`, `Lundi1`, `Lundi2`, `Lundi3`, `Lundi4`, `Lundi5`, `Lundi6`, `Lundi7`, `Lundi8`, `Lundi9`, `Lundi10`, `Lundi11`, `Lundi12`, `Mardi1`, `Mardi2`, `Mardi3`, `Mardi4`, `Mardi5`, `Mardi6`, `Mardi7`, `Mardi8`, `Mardi9`, `Mardi10`, `Mardi11`, `Mardi12`, `Mercredi1`, `Mercredi2`, `Mercredi3`, `Mercredi4`, `Mercredi5`, `Mercredi6`, `Mercredi7`, `Mercredi8`, `Mercredi9`, `Mercredi10`, `Mercredi11`, `Mercredi12`, `Jeudi1`, `Jeudi2`, `Jeudi3`, `Jeudi4`, `Jeudi5`, `Jeudi6`, `Jeudi7`, `Jeudi8`, `Jeudi9`, `Jeudi10`, `Jeudi11`, `Jeudi12`, `Vendredi1`, `Vendredi2`, `Vendredi3`, `Vendredi4`, `Vendredi5`, `Vendredi6`, `Vendredi7`, `Vendredi8`, `Vendredi9`, `Vendredi10`, `Vendredi11`, `Vendredi12`) VALUES
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   (1, '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0'),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   (2, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '1', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   (3, '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   (6, '1', '1', '1', '1', '1', '1', '1', '0', '1', '0', '1', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
                                         `id` int NOT NULL AUTO_INCREMENT,
                                         `nom` varchar(100) DEFAULT NULL,
    `prenom` varchar(100) DEFAULT NULL,
    `adresse_ligne1` varchar(255) DEFAULT NULL,
    `adresse_ligne2` varchar(255) DEFAULT NULL,
    `ville` varchar(100) DEFAULT NULL,
    `code_postal` varchar(20) DEFAULT NULL,
    `pays` varchar(100) DEFAULT NULL,
    `telephone` varchar(20) DEFAULT NULL,
    `carte_vitale` varchar(50) DEFAULT NULL,
    `type_carte_paiement` varchar(50) DEFAULT NULL,
    `numero_carte` varchar(50) DEFAULT NULL,
    `nom_carte` varchar(100) DEFAULT NULL,
    `date_expiration_carte` date DEFAULT NULL,
    `code_securite` varchar(5) DEFAULT NULL,
    `login` varchar(100) DEFAULT NULL,
    `mdp` varchar(100) DEFAULT NULL,
    `type` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse_ligne1`, `adresse_ligne2`, `ville`, `code_postal`, `pays`, `telephone`, `carte_vitale`, `type_carte_paiement`, `numero_carte`, `nom_carte`, `date_expiration_carte`, `code_securite`, `login`, `mdp`, `type`) VALUES
                                                                                                                                                                                                                                                                         (1, 'Dupont', 'Jean', '123 Rue Principale', '', 'Paris', '75001', 'France', '0123456789', '1234567890', 'Visa', '4111111111111111', 'Jean Dupont', '2025-12-31', '123', 'jean.dupont@example.com', 'password123', 'client'),
                                                                                                                                                                                                                                                                         (2, 'Martin', 'Anne', '456 Avenue des Champs', 'Apt 789', 'Lyon', '69001', 'France', '0987654321', '0987654321', 'MasterCard', '5500000000000004', 'Anne Martin', '2024-11-30', '456', 'anne.martin@example.com', 'securepassword456', 'client'),
                                                                                                                                                                                                                                                                         (3, 'Bernard', 'Luc', '789 Boulevard Saint-Germain', '', 'Marseille', '13001', 'France', '0678901234', '1122334455', 'American Express', '340000000000009', 'Luc Bernard', '2026-10-31', '7890', 'luc.bernard@example.com', 'lucpassword789', 'client'),
                                                                                                                                                                                                                                                                         (4, 'Petit', 'Marie', '12 Rue de la Paix', '', 'Toulouse', '31000', 'France', '0654321098', '5566778899', 'PayPal', '5105105105105100', 'Marie Petit', '2023-09-30', '1234', 'marie.petit@example.com', 'mariepassword321', 'client'),
                                                                                                                                                                                                                                                                         (5, 'Moreau', 'Pierre', '34 Rue des Fleurs', 'Bâtiment B', 'Nice', '06000', 'France', '0643210987', '6677889900', 'Visa', '4111111111111111', 'Pierre Moreau', '2027-08-31', '567', 'pierre.moreau@example.com', 'pierrepassword567', 'client');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
                                         `id` int NOT NULL AUTO_INCREMENT,
                                         `nom` varchar(100) DEFAULT NULL,
    `prenom` varchar(100) DEFAULT NULL,
    `specialite` varchar(100) DEFAULT NULL,
    `telephone` varchar(20) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `adresse` varchar(255) DEFAULT NULL,
    `cv` text,
    `login` varchar(100) DEFAULT NULL,
    `mdp` varchar(100) DEFAULT NULL,
    `type` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `specialite`, `telephone`, `email`, `adresse`, `cv`, `login`, `mdp`, `type`) VALUES
                                                                                                                               (1, 'Legrand', 'Sophie', 'Généraliste', '0612345678', 'sophie.legrand@example.com', '1 Rue de la Santé, Paris', 'Diplômée de la Faculté de Médecine de Paris. 10 ans d\'expérience en médecine générale.', 'sophie.legrand@example.com', 'password111', 'medecin'),
(2, 'Durand', 'Pierre', 'Généraliste', '0623456789', 'pierre.durand@example.com', '2 Avenue de la Santé, Lyon', 'Diplômé de la Faculté de Médecine de Lyon. 8 ans d\'expérience en médecine générale.', 'pierre.durand@example.com', 'password222', 'medecin'),
                                                                                                                               (3, 'Martin', 'Julie', 'Généraliste', '0634567890', 'julie.martin@example.com', '3 Boulevard de la Santé, Marseille', 'Diplômée de la Faculté de Médecine de Marseille. 7 ans d\'expérience en médecine générale.', 'julie.martin@example.com', 'password333', 'medecin'),
(4, 'Bernard', 'Luc', 'Généraliste', '0645678901', 'luc.bernard@example.com', '4 Rue de la Santé, Toulouse', 'Diplômé de la Faculté de Médecine de Toulouse. 9 ans d\'expérience en médecine générale.', 'luc.bernard@example.com', 'password444', 'medecin'),
                                                                                                                               (5, 'Petit', 'Marie', 'Généraliste', '0656789012', 'marie.petit@example.com', '5 Rue de la Santé, Nice', 'Diplômée de la Faculté de Médecine de Nice. 6 ans d\'expérience en médecine générale.', 'marie.petit@example.com', 'password555', 'medecin'),
(6, 'Roux', 'Claire', 'Addictologie', '0667890123', 'claire.roux@example.com', '6 Rue de l\'Addiction, Paris', 'Diplômée de la Faculté de Médecine de Paris. 5 ans d\'expérience en addictologie.', 'claire.roux@example.com', 'password666', 'medecin'),
(7, 'Morel', 'Jean', 'Andrologie', '0678901234', 'jean.morel@example.com', '7 Rue de l\'Andrologie, Lyon', 'Diplômé de la Faculté de Médecine de Lyon. 10 ans d\'expérience en andrologie.', 'jean.morel@example.com', 'password777', 'medecin'),
(8, 'Lemoine', 'Alice', 'Cardiologie', '0689012345', 'alice.lemoine@example.com', '8 Rue du Coeur, Marseille', 'Diplômée de la Faculté de Médecine de Marseille. 12 ans d\'expérience en cardiologie.', 'alice.lemoine@example.com', 'password888', 'medecin'),
                                                                                                                               (9, 'Dufour', 'Marc', 'Dermatologie', '0690123456', 'marc.dufour@example.com', '9 Avenue de la Peau, Toulouse', 'Diplômé de la Faculté de Médecine de Toulouse. 15 ans d\'expérience en dermatologie.', 'marc.dufour@example.com', 'password999', 'medecin'),
(10, 'Garcia', 'Emilie', 'Gastro-Hépato-Entérologie', '0610123456', 'emilie.garcia@example.com', '10 Boulevard de l\'Estomac, Nice', 'Diplômée de la Faculté de Médecine de Nice. 8 ans d\'expérience en gastro-entérologie.', 'emilie.garcia@example.com', 'password101', 'medecin'),
(11, 'Durand', 'Paul', 'Gynécologie', '0620123456', 'paul.durand@example.com', '11 Rue des Femmes, Paris', 'Diplômé de la Faculté de Médecine de Paris. 6 ans d\'expérience en gynécologie.', 'paul.durand@example.com', 'password102', 'medecin'),
                                                                                                                               (12, 'Lefevre', 'Julie', 'I.S.T.', '0630123456', 'julie.lefevre@example.com', '12 Avenue des Maladies, Lyon', 'Diplômée de la Faculté de Médecine de Lyon. 9 ans d\'expérience en I.S.T.', 'julie.lefevre@example.com', 'password103', 'medecin'),
(13, 'Mercier', 'Jacques', 'Ostéopathie', '0640123456', 'jacques.mercier@example.com', '13 Rue des Os, Marseille', 'Diplômé de l\'École d\'Ostéopathie de Marseille. Praticien en ostéopathie depuis 7 ans.', 'jacques.mercier@example.com', 'password104', 'medecin');