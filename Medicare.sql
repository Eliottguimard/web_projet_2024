CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    adresse_ligne1 VARCHAR(255),
    adresse_ligne2 VARCHAR(255),
    ville VARCHAR(100),
    code_postal VARCHAR(20),
    pays VARCHAR(100),
    telephone VARCHAR(20),
    carte_vitale VARCHAR(50),
    type_carte_paiement VARCHAR(50),
    numero_carte VARCHAR(50),
    nom_carte VARCHAR(100),
    date_expiration_carte DATE,
    code_securite VARCHAR(5),
    login VARCHAR(100),
    mdp VARCHAR(100),
    type VARCHAR(50) -- Ajout du champ type
);

CREATE TABLE medecin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    photo VARCHAR(100),
    specialite VARCHAR(100),
    telephone VARCHAR(20),
    email VARCHAR(100),
    adresse VARCHAR(255),
    cv TEXT,
    login VARCHAR(100),
    mdp VARCHAR(100),
    type VARCHAR(50) -- Ajout du champ type
);

CREATE TABLE administrateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(100),
    telephone VARCHAR(20),
    login VARCHAR(100),
    mdp VARCHAR(100),
    type VARCHAR(50) -- Ajout du champ type
);

INSERT INTO clients (nom, prenom, adresse_ligne1, adresse_ligne2, ville, code_postal, pays, telephone, carte_vitale, type_carte_paiement, numero_carte, nom_carte, date_expiration_carte, code_securite, login, mdp, type) VALUES
('Dupont', 'Jean', '123 Rue Principale', '', 'Paris', '75001', 'France', '0123456789', '1234567890', 'Visa', '4111111111111111', 'Jean Dupont', '2025-12-31', '123', 'jean.dupont@example.com', 'password123', 'client'),
('Martin', 'Anne', '456 Avenue des Champs', 'Apt 789', 'Lyon', '69001', 'France', '0987654321', '0987654321', 'MasterCard', '5500000000000004', 'Anne Martin', '2024-11-30', '456', 'anne.martin@example.com', 'securepassword456', 'client'),
('Bernard', 'Luc', '789 Boulevard Saint-Germain', '', 'Marseille', '13001', 'France', '0678901234', '1122334455', 'American Express', '340000000000009', 'Luc Bernard', '2026-10-31', '7890', 'luc.bernard@example.com', 'lucpassword789', 'client'),
('Petit', 'Marie', '12 Rue de la Paix', '', 'Toulouse', '31000', 'France', '0654321098', '5566778899', 'PayPal', '5105105105105100', 'Marie Petit', '2023-09-30', '1234', 'marie.petit@example.com', 'mariepassword321', 'client'),
('Moreau', 'Pierre', '34 Rue des Fleurs', 'Bâtiment B', 'Nice', '06000', 'France', '0643210987', '6677889900', 'Visa', '4111111111111111', 'Pierre Moreau', '2027-08-31', '567', 'pierre.moreau@example.com', 'pierrepassword567', 'client');

INSERT INTO medecin (nom, prenom,photo, specialite, telephone, email, adresse, cv, login, mdp, type) VALUES
-- Médecins généralistes
    ('Durand', 'Pierre','photo_medecin1.jpg', 'Généraliste', '0623456789', 'pierre.durand@example.com', '2 Avenue de la Santé, Lyon', 'Pierre Durand\n38 ans\npierre.durand@example.com\n0623456789\n2 Avenue de la Santé, Lyon\n- Diplômé de la Faculté de Médecine de Lyon (2006-2012)\n- Certificat en soins palliatifs de l''Université Claude Bernard Lyon 1 (2014)\n- Médecin généraliste à la Maison de Santé de Lyon (2013-présent)\n- Volontaire pour Médecins du Monde en Afrique Centrale (2015-2016)\n- Formateur en soins palliatifs à l''Université de Lyon (2017-présent)', 'pierre.durand@example.com', 'password222', 'medecin'),
    ('Martin', 'Julie','photo_medecin2.jpg', 'Généraliste', '0634567890', 'julie.martin@example.com', '3 Boulevard de la Santé, Marseille', 'Julie Martin\n35 ans\njulie.martin@example.com\n0634567890\n3 Boulevard de la Santé, Marseille\n- Diplômée de la Faculté de Médecine de Marseille (2005-2011)\n- Stage en médecine générale à l''Hôpital de la Timone, Marseille (2011-2012)\n- Certificat en pédiatrie de l''Université Aix-Marseille (2013)\n- Médecin généraliste à la Clinique de Provence, Marseille (2012-présent)\n- Volontaire pour la Croix-Rouge en Asie du Sud-Est (2014-2015)', 'julie.martin@example.com', 'password333', 'medecin'),
    ('Bernard', 'Luc','photo_medecin3.jpg', 'Généraliste', '0645678901', 'luc.bernard@example.com', '4 Rue de la Santé, Toulouse', 'Luc Bernard\n39 ans\nluc.bernard@example.com\n0645678901\n4 Rue de la Santé, Toulouse\n- Diplômé de la Faculté de Médecine de Toulouse (2003-2009)\n- Stage en médecine générale à l''Hôpital Purpan, Toulouse (2009-2010)\n- Certificat en gériatrie de l''Université Paul Sabatier (2011)\n- Médecin généraliste à la Clinique de l''Ariane, Toulouse (2010-présent)\n- Volontaire pour Médecins Sans Frontières en Amérique du Sud (2012-2013)', 'luc.bernard@example.com', 'password444', 'medecin'),
    ('Petit', 'Marie','photo_medecin4.jpg', 'Généraliste', '0656789012', 'marie.petit@example.com', '5 Rue de la Santé, Nice', 'Marie Petit\n34 ans\nmarie.petit@example.com\n0656789012\n5 Rue de la Santé, Nice\n- Diplômée de la Faculté de Médecine de Nice (2007-2013)\n- Stage en médecine générale à l''Hôpital Pasteur, Nice (2013-2014)\n- Certificat en médecine sportive de l''Université de Nice Sophia Antipolis (2015)\n- Médecin généraliste à la Polyclinique Saint-Jean, Nice (2014-présent)\n- Volontaire pour Médecins du Monde en Afrique de l''Est (2015-2016)', 'marie.petit@example.com', 'password555', 'medecin'),

-- Médecins spécialistes
('Roux', 'Claire','addictologist.jpg', 'Addictologie', '0667890123', 'claire.roux@example.com', '6 Rue de l''Addiction, Paris', 'Claire Roux\n33 ans\nclaire.roux@example.com\n0667890123\n6 Rue de l''Addiction, Paris\n- Diplômée de la Faculté de Médecine de Paris (2008-2014)\n- Stage en addictologie à l''Hôpital Sainte-Anne, Paris (2014-2015)\n- Certificat en psychologie clinique de l''Université Paris Descartes (2016)\n- Médecin addictologue à la Clinique de l''Espérance, Paris (2015-présent)\n- Volontaire pour Médecins du Monde en Europe de l''Est (2016-2017)','claire.roux@example.com', 'password666', 'medecin'),
('Morel', 'Jean','andrologist.jpg', 'Andrologie', '0678901234', 'jean.morel@example.com', '7 Rue de l''Andrologie, Lyon', 'Jean Morel\n42 ans\njean.morel@example.com\n0678901234\n7 Rue de l''Andrologie, Lyon\n- Diplômé de la Faculté de Médecine de Lyon (2000-2006)\n- Stage en andrologie à l''Hôpital Édouard Herriot, Lyon (2006-2007)\n- Certificat en endocrinologie de l''Université Claude Bernard Lyon 1 (2008)\n- Médecin andrologue à la Clinique du Parc, Lyon (2007-présent)\n- Volontaire pour Médecins Sans Frontières en Afrique du Nord (2009-2010)', 'jean.morel@example.com', 'password777', 'medecin'),
('Lemoine', 'Alice','cardiologist.jpg', 'Cardiologie', '0689012345', 'alice.lemoine@example.com', '8 Rue du Coeur, Marseille', 'Alice Lemoine\n45 ans\nalice.lemoine@example.com\n0689012345\n8 Rue du Coeur, Marseille\n- Diplômée de la Faculté de Médecine de Marseille (1995-2001)\n- Stage en cardiologie à l''Hôpital de la Timone, Marseille (2001-2002)\n- Certificat en cardiologie interventionnelle de l''Université Aix-Marseille (2003)\n- Médecin cardiologue à l''Institut de Cardiologie de Marseille (2002-présent)\n- Volontaire pour Médecins du Monde en Amérique du Sud (2004-2005)', 'alice.lemoine@example.com', 'password888', 'medecin'),
('Dufour', 'Marc','dermatologist.jpg', 'Dermatologie', '0690123456', 'marc.dufour@example.com', '9 Avenue de la Peau, Toulouse', 'Marc Dufour\n50 ans\nmarc.dufour@example.com\n0690123456\n9 Avenue de la Peau, Toulouse\n- Diplômé de la Faculté de Médecine de Toulouse (1988-1994)\n- Stage en dermatologie à l''Hôpital Purpan, Toulouse (1994-1995)\n- Certificat en dermato-allergologie de l''Université Paul Sabatier (1996)\n- Médecin dermatologue à la Clinique de la Peau, Toulouse (1995-présent)\n- Volontaire pour Médecins du Monde en Asie du Sud-Est (1998-1999)', 'marc.dufour@example.com', 'password999', 'medecin'),
('Garcia', 'Emilie','gastroenterologist.jpg', 'Gastro-Hépato-Entérologie', '0610123456', 'emilie.garcia@example.com', '10 Boulevard de l''Estomac, Nice', 'Emilie Garcia\n37 ans\nemilie.garcia@example.com\n0610123456\n10 Boulevard de l''Estomac, Nice\n- Diplômée de la Faculté de Médecine de Nice (2002-2008)\n- Stage en gastro-entérologie à l''Hôpital Pasteur, Nice (2008-2009)\n- Certificat en hépatologie de l''Université de Nice Sophia Antipolis (2010)\n- Médecin gastro-entérologue à la Clinique de l''Estomac, Nice (2009-présent)\n- Volontaire pour Médecins Sans Frontières en Amérique Centrale (2011-2012)', 'emilie.garcia@example.com', 'password101', 'medecin'),
('Durand', 'Paul','gynecologist.jpg', 'Gynécologie', '0620123456', 'paul.durand@example.com', '11 Rue des Femmes, Paris', 'Paul Durand\n36 ans\npaul.durand@example.com\n0620123456\n11 Rue des Femmes, Paris\n- Diplômé de la Faculté de Médecine de Paris (2005-2011)\n- Stage en gynécologie à l''Hôpital Cochin, Paris (2011-2012)\n- Certificat en obstétrique de l''Université Paris Descartes (2013)\n- Gynécologue à la Clinique des Femmes, Paris (2012-présent)\n- Volontaire pour Médecins Sans Frontières en Afrique de l''Ouest (2014-2015)', 'paul.durand@example.com', 'password102', 'medecin'),
('Lefevre', 'Julie','ist_specialist.jpg', 'I.S.T.', '0630123456', 'julie.lefevre@example.com', '12 Avenue des Maladies, Lyon', 'Julie Lefevre\n40 ans\njulie.lefevre@example.com\n0630123456\n12 Avenue des Maladies, Lyon\n- Diplômée de la Faculté de Médecine de Lyon (1999-2005)\n- Stage en maladies infectieuses à l''Hôpital de la Croix-Rousse, Lyon (2005-2006)\n- Certificat en épidémiologie de l''Université Claude Bernard Lyon 1 (2007)\n- Spécialiste en I.S.T. à la Clinique de l''Infection, Lyon (2006-présent)\n- Volontaire pour Médecins du Monde en Asie du Sud-Est (2008-2009)', 'julie.lefevre@example.com', 'password103', 'medecin'),
('Mercier', 'Jacques', 'osteopath.jpg','Ostéopathie', '0640123456', 'jacques.mercier@example.com', '13 Rue des Os, Marseille', 'Jacques Mercier\n35 ans\njacques.mercier@example.com\n0640123456\n13 Rue des Os, Marseille\n- Diplômé de l''École d''Ostéopathie de Marseille (2003-2009)\n- Stage en ostéopathie à l''Hôpital de la Timone, Marseille (2009-2010)\n- Certificat en biomécanique de l''Université Aix-Marseille (2011)\n- Ostéopathe à la Clinique de l''Ostéopathie, Marseille (2010-présent)\n- Volontaire pour Médecins Sans Frontières en Afrique de l''Ouest (2012-2013)', 'jacques.mercier@example.com', 'password104', 'medecin');

INSERT INTO administrateur (nom, prenom, email, telephone, login, mdp, type) VALUES
('Durand', 'Paul', 'paul.durand@example.com', '0712345678', 'paul.durand', 'adminpassword1', 'administrateur'),
('Lefevre', 'Julie', 'julie.lefevre@example.com', '0723456789', 'julie.lefevre', 'adminpassword2', 'administrateur'),
('Mercier', 'Jacques', 'jacques.mercier@example.com', '0734567890', 'jacques.mercier', 'adminpassword3', 'administrateur'),
('Garcia', 'Emilie', 'emilie.garcia@example.com', '0745678901', 'emilie.garcia', 'adminpassword4', 'administrateur'),
('Rousseau', 'Nicolas', 'nicolas.rousseau@example.com', '0756789012', 'nicolas.rousseau', 'adminpassword5', 'administrateur');

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