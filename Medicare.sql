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

INSERT INTO medecin (nom, prenom, specialite, telephone, email, adresse, cv, login, mdp, type) VALUES
-- Médecins généralistes
('Legrand', 'Sophie', 'Généraliste', '0612345678', 'sophie.legrand@example.com', '1 Rue de la Santé, Paris', 'Diplômée de la Faculté de Médecine de Paris. 10 ans d\'expérience en médecine générale.', 'sophie.legrand@example.com', 'password111', 'medecin'),
('Durand', 'Pierre', 'Généraliste', '0623456789', 'pierre.durand@example.com', '2 Avenue de la Santé, Lyon', 'Diplômé de la Faculté de Médecine de Lyon. 8 ans d\'expérience en médecine générale.', 'pierre.durand@example.com', 'password222', 'medecin'),
('Martin', 'Julie', 'Généraliste', '0634567890', 'julie.martin@example.com', '3 Boulevard de la Santé, Marseille', 'Diplômée de la Faculté de Médecine de Marseille. 7 ans d\'expérience en médecine générale.', 'julie.martin@example.com', 'password333', 'medecin'),
('Bernard', 'Luc', 'Généraliste', '0645678901', 'luc.bernard@example.com', '4 Rue de la Santé, Toulouse', 'Diplômé de la Faculté de Médecine de Toulouse. 9 ans d\'expérience en médecine générale.', 'luc.bernard@example.com', 'password444', 'medecin'),
('Petit', 'Marie', 'Généraliste', '0656789012', 'marie.petit@example.com', '5 Rue de la Santé, Nice', 'Diplômée de la Faculté de Médecine de Nice. 6 ans d\'expérience en médecine générale.', 'marie.petit@example.com', 'password555', 'medecin'),

-- Médecins spécialistes
('Roux', 'Claire', 'Addictologie', '0667890123', 'claire.roux@example.com', '6 Rue de l\'Addiction, Paris', 'Diplômée de la Faculté de Médecine de Paris. 5 ans d\'expérience en addictologie.', 'claire.roux@example.com', 'password666', 'medecin'),
('Morel', 'Jean', 'Andrologie', '0678901234', 'jean.morel@example.com', '7 Rue de l\'Andrologie, Lyon', 'Diplômé de la Faculté de Médecine de Lyon. 10 ans d\'expérience en andrologie.', 'jean.morel@example.com', 'password777', 'medecin'),
('Lemoine', 'Alice', 'Cardiologie', '0689012345', 'alice.lemoine@example.com', '8 Rue du Coeur, Marseille', 'Diplômée de la Faculté de Médecine de Marseille. 12 ans d\'expérience en cardiologie.', 'alice.lemoine@example.com', 'password888', 'medecin'),
('Dufour', 'Marc', 'Dermatologie', '0690123456', 'marc.dufour@example.com', '9 Avenue de la Peau, Toulouse', 'Diplômé de la Faculté de Médecine de Toulouse. 15 ans d\'expérience en dermatologie.', 'marc.dufour@example.com', 'password999', 'medecin'),
('Garcia', 'Emilie', 'Gastro-Hépato-Entérologie', '0610123456', 'emilie.garcia@example.com', '10 Boulevard de l\'Estomac, Nice', 'Diplômée de la Faculté de Médecine de Nice. 8 ans d\'expérience en gastro-entérologie.', 'emilie.garcia@example.com', 'password101', 'medecin'),
('Durand', 'Paul', 'Gynécologie', '0620123456', 'paul.durand@example.com', '11 Rue des Femmes, Paris', 'Diplômé de la Faculté de Médecine de Paris. 6 ans d\'expérience en gynécologie.', 'paul.durand@example.com', 'password102', 'medecin'),
('Lefevre', 'Julie', 'I.S.T.', '0630123456', 'julie.lefevre@example.com', '12 Avenue des Maladies, Lyon', 'Diplômée de la Faculté de Médecine de Lyon. 9 ans d\'expérience en I.S.T.', 'julie.lefevre@example.com', 'password103', 'medecin'),
('Mercier', 'Jacques', 'Ostéopathie', '0640123456', 'jacques.mercier@example.com', '13 Rue des Os, Marseille', 'Diplômé de l\'École d\'Ostéopathie de Marseille. Praticien en ostéopathie depuis 7 ans.', 'jacques.mercier@example.com', 'password104', 'medecin');

INSERT INTO administrateur (nom, prenom, email, telephone, login, mdp, type) VALUES
('Durand', 'Paul', 'paul.durand@example.com', '0712345678', 'paul.durand', 'adminpassword1', 'administrateur'),
('Lefevre', 'Julie', 'julie.lefevre@example.com', '0723456789', 'julie.lefevre', 'adminpassword2', 'administrateur'),
('Mercier', 'Jacques', 'jacques.mercier@example.com', '0734567890', 'jacques.mercier', 'adminpassword3', 'administrateur'),
('Garcia', 'Emilie', 'emilie.garcia@example.com', '0745678901', 'emilie.garcia', 'adminpassword4', 'administrateur'),
('Rousseau', 'Nicolas', 'nicolas.rousseau@example.com', '0756789012', 'nicolas.rousseau', 'adminpassword5', 'administrateur');