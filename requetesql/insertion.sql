INSERT INTO competitions (titreCompetition, lieu, dateDebut, dateFin, typeMilieu, nbManches, idCategorie, status) VALUES
('Coupe Atlantique', 'Agadir', '2025-06-01', '2025-06-03', 'Mer', 2, 1, 'ouvert'),
('Truite Cup', 'Ifrane', '2025-05-10', '2025-05-11', 'Eau douce', 1, 1, 'ouvert'),
('Carpe Trophy', 'Beni Mellal', '2025-07-01', '2025-07-05', 'Eau douce', 3, 2, 'en cours'),
('Ocean Master', 'Dakhla', '2025-08-10', '2025-08-12', 'Mer', 2, 2, 'ouvert'),
('Lake Challenge', 'Bin El Ouidane', '2025-09-01', '2025-09-02', 'Eau douce', 1, 1, 'ouvert'),
('Fishing Fest', 'Essaouira', '2025-10-05', '2025-10-06', 'Mer', 1, 1, 'terminé'),
('Predator Cup', 'Ouarzazate', '2025-11-01', '2025-11-02', 'Eau douce', 1, 2, 'ouvert'),
('Open Sea', 'Tanger', '2025-12-01', '2025-12-03', 'Mer', 2, 1, 'ouvert'),
('Fresh Water Pro', 'Azrou', '2025-04-15', '2025-04-16', 'Eau douce', 1, 2, 'terminé'),
('Final Master', 'Casablanca', '2025-06-20', '2025-06-22', 'Mer', 2, 1, 'en cours');



INSERT INTO especes (nom, nomScientifique, description) VALUES
('Truite', 'Salmo trutta', 'Poisson eau douce'),
('Brochet', 'Esox lucius', 'Prédateur'),
('Perche', 'Perca fluviatilis', 'Commun en lac'),
('Sandre', 'Sander lucioperca', 'Carnassier'),
('Carpe', 'Cyprinus carpio', 'Sportive'),
('Silure', 'Silurus glanis', 'Eau douce'),
('Black Bass', 'Micropterus salmoides', 'Sportif');


 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Ahmed Safi', 'ahmed@fish.ma', '$2y$10$xyz...', 2, 'Safi - Abda', 'Chasse sous-marine', 'uploads/pecheurs/p1.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Youssef Dakhla', 'youssef@fish.ma', '$2y$10$xyz...', 2, 'Dakhla - Oued Eddahab', 'Pêche à la canne', 'uploads/pecheurs/p2.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Leila Oualidia', 'leila@fish.ma', '$2y$10$xyz...', 2, 'Oualidia', 'Collecte de coquillages', 'uploads/pecheurs/p3.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Karim Tanger', 'karim@fish.ma', '$2y$10$xyz...', 2, 'Tanger - Tetouan', 'Spinning Shore', 'uploads/pecheurs/p4.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Mohamed Mogador', 'mohamed@fish.ma', '$2y$10$xyz...', 2, 'Essaouira', 'Surfcasting', 'uploads/pecheurs/p5.jpg');

 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Omar Mehdia', 'omar@fish.ma', '$2y$10$xyz...', 2, 'Kenitra - Mehdia', 'Pêche aux leurres', 'uploads/pecheurs/p6.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Yassine Agadir', 'yassine@fish.ma', '$2y$10$xyz...', 2, 'Agadir - Souss', 'Pêche au gros', 'uploads/pecheurs/p7.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Hassan Nador', 'hassan@fish.ma', '$2y$10$xyz...', 2, 'Nador - Marchica', 'Pêche artisanale', 'uploads/pecheurs/p8.jpg');
 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Driss Casa', 'driss@fish.ma', '$2y$10$xyz...', 2, 'Casablanca - Ain Diab', 'Bait Casting', 'uploads/pecheurs/p9.jpg');

 
INSERT INTO pecheurs (nomUser, emailUser, passwordUser, roleId, region, specialite, photoPecheur)
VALUES ('Mourad Bouznika', 'mourad@fish.ma', '$2y$10$xyz...', 2, 'Bouznika', 'Jigging', 'uploads/pecheurs/p10.jpg');

INSERT INTO utilisateurs (nomUser, emailUser, passwordUser, roleId) VALUES
('Ali', 'ali@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('Sara', 'sara@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('Yassine', 'yass@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('Omar', 'omar@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('Imane', 'imane@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 3),
('Khalid', 'khalid@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('Nora', 'nora@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 3),
('Hassan', 'hassan@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('Fatima', 'fatima@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 2),
('AdminUser', 'admin@mail.com', '$2y$10$VfFV4TwgCAE3p1LW8h4z5ekWHZ3/Neg5dAEDfAyJSrY7AjZiKR6wy', 1);

INSERT INTO reglements (competitionId, especeId, tailleMin, pointsFixes, pointsParCm) VALUES
(1,1,20,10,2),
(1,2,30,15,3),
(2,1,25,12,2),
(3,1,40,20,4),
(4,1,35,18,3),
(5,1,15,8,1);


-- Lpass howa   password123 


-- ملاحظة: استعملت نفس الـ IDs اللي تكرروا في جدول utilisateurs (بافتراض SERIAL)
-- علي (ID: 1)
INSERT INTO pecheurs (idUser, nomUser, emailUser, passwordUser, roleId, region, specialite, club, photoPecheur)
SELECT idUser, nomUser, emailUser, passwordUser, roleId, 'Safi', 'Surfcasting', 'Club Shark', 'p1.jpg'
FROM utilisateurs WHERE emailUser = 'ali@mail.com';
 
INSERT INTO pecheurs (idUser, nomUser, emailUser, passwordUser, roleId, region, specialite, club, photoPecheur)
SELECT idUser, nomUser, emailUser, passwordUser, roleId, 'Agadir', 'Spinning', 'Indépendant', 'p2.jpg'
FROM utilisateurs WHERE emailUser = 'sara@mail.com';
 
INSERT INTO pecheurs (idUser, nomUser, emailUser, passwordUser, roleId, region, specialite, club, photoPecheur)
SELECT idUser, nomUser, emailUser, passwordUser, roleId, 'Dakhla', 'Chasse sous-marine', 'Dakhla Fishing', 'p3.jpg'
FROM utilisateurs WHERE emailUser = 'yass@mail.com';
 
INSERT INTO pecheurs (idUser, nomUser, emailUser, passwordUser, roleId, region, specialite, club, photoPecheur)
SELECT idUser, nomUser, emailUser, passwordUser, roleId, 'Casablanca', 'Eging', 'Casa Anglers', 'p4.jpg'
FROM utilisateurs WHERE emailUser = 'omar@mail.com';
 DELETE FROM pecheurs WHERE idUser = 9;
