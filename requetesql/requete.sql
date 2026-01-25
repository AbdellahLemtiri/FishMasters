CREATE TABLE roles (
    idRole SERIAL PRIMARY KEY,
    nomRole VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE utilisateurs (
    idUser SERIAL PRIMARY KEY,
    nomUser VARCHAR(100) NOT NULL,
    emailUser VARCHAR(255) UNIQUE NOT NULL,
    passwordUser VARCHAR(255) NOT NULL,
    roleId INT NOT NULL REFERENCES roles (idRole) ON DELETE RESTRICT
);

DROP TABLE IF EXISTS roles CASCADE;

DROP TABLE IF EXISTS reglements CASCADE;

DROP TABLE IF EXISTS utilisateurs CASCADE;

DROP TABLE IF EXISTS prises CASCADE;

DROP TABLE IF EXISTS pecheurs CASCADE;

DROP TABLE IF EXISTS competitions CASCADE;

DROP TABLE IF EXISTS especes CASCADE;

DROP TYPE IF EXISTS competition_water_type CASCADE;

DROP TYPE IF EXISTS competition_category CASCADE;

DROP TYPE IF EXISTS competition_status CASCADE;

CREATE TABLE pecheurs (
    idUser INT PRIMARY KEY, 
    region VARCHAR(60),
    specialite VARCHAR(40),  
    club VARCHAR(100) DEFAULT 'Indépendant',  
    photoPecheur VARCHAR(250),
    statutPecheur BOOLEAN DEFAULT TRUE,
CONSTRAINT fk_user_pecheur FOREIGN KEY (idUser) REFERENCES utilisateurs(idUser) ON DELETE CASCADE
) INHERITS (utilisateurs);

-- //////////////////////////////////////////////////////////////////////////////////////////////
-- table competitions, especes, reglements, inscriptions n'apportez aucune modification sans autorisation
CREATE TYPE competition_water_type AS ENUM ('Mer', 'Eau douce');

CREATE TYPE competition_category AS ENUM ('Individuel', 'Équipe');

CREATE TYPE competition_status AS ENUM ('ouvert', 'en cours', 'terminé') ;

CREATE TABLE competitions (
    idCompetition SERIAL PRIMARY KEY,
    titreCompetition VARCHAR(255) NOT NULL,
    lieu VARCHAR(255),
    dateDebut TIMESTAMP NOT NULL,
    dateFin TIMESTAMP NOT NULL,
    typeMilieu competition_water_type,
    nbManches INT DEFAULT 1,
    idCategorie INT REFERENCES categories (idCategorie),
    status competition_status
);

create table categories (
    idCategorie SERIAL PRIMARY KEY,
    nomCategorie VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE especes (
    idEspece SERIAL PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    nomScientifique VARCHAR(150),
    description TEXT
);

CREATE TABLE reglements (
    idReglement SERIAL PRIMARY KEY,
    competitionId INT NOT NULL,
    especeId INT NOT NULL,
    tailleMin FLOAT DEFAULT 0,
    pointsFixes INT DEFAULT 0,
    pointsParCm INT DEFAULT 0,
    CONSTRAINT fk_competition FOREIGN KEY (competitionId) REFERENCES competitions (idCompetition) ON DELETE CASCADE,
    CONSTRAINT fk_espece FOREIGN KEY (especeId) REFERENCES especes (idEspece) ON DELETE CASCADE,
    UNIQUE (competitionId, especeId)
);

CREATE TABLE inscriptionsCompetitions (
    id SERIAL PRIMARY KEY,
    idPecheur INT NOT NULL,
    competitionId INT NOT NULL,
    dateInscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_competition_insc FOREIGN KEY (competitionId) REFERENCES competitions (idCompetition) ON DELETE CASCADE,
    CONSTRAINT unique_inscription UNIQUE (idPecheur, competitionId)
);

CREATE TABLE reglements (
    idReglement SERIAL PRIMARY KEY,
    competitionId INT NOT NULL,
    especeId INT NOT NULL,
    tailleMin FLOAT DEFAULT 0,
    pointsFixes INT DEFAULT 0,
    pointsParCm INT DEFAULT 0,
    CONSTRAINT fk_competition FOREIGN KEY (competitionId) REFERENCES competitions (idCompetition) ON DELETE CASCADE,
    CONSTRAINT fk_espece FOREIGN KEY (especeId) REFERENCES especes (idEspece) ON DELETE CASCADE,
    UNIQUE (competitionId, especeId)
);

ALTER TABLE "utilisateurs" RENAME COLUMN "nom_user" TO "nomUser";

ALTER TABLE "utilisateurs" RENAME COLUMN "email_user" TO "emailUser";

ALTER TABLE "utilisateurs"
RENAME COLUMN "password_user" TO "passwordUser";
-- //////////////////////////////////////////////////////////////////////////////////////////////////////////

CREATE TABLE prises (
    idPrise SERIAL PRIMARY KEY,
    idEspece INT REFERENCES especes (idEspece) ON DELETE CASCADE,
    poids FLOAT DEFAULT NULL,
    taille FLOAT DEFAULT NULL,
    photo VARCHAR(250),
    dateHeure TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    spot VARCHAR(100),
    relache BOOLEAN DEFAULT TRUE, -- TRUE = Catch & Release, FALSE = Gardé
    statut VARCHAR(20) DEFAULT 'En attente', --  En attente', 'Validée', 'Refusée'
    idPecheur INT REFERENCES utilisateurs (idUser) ON DELETE CASCADE,
    idCompetition INT REFERENCES competitions (idCompetition) ON DELETE CASCADE
);

INSERT INTO roles (nomRole) VALUES ('Admin'), ('Pecheur');

INSERT INTO
    categories (nomCategorie)
VALUES ('Individuel'),
    ('Équipe');


 INSERT INTO scores (id_pecheur, id_competition, points) VALUES 
(4, 2, 1200),
(4, 2, 850),
(4, 2, 2300),
(4, 4, 1500),
(4, 5, 3100),
(4, 2, 900),
(4, 7, 1750),
(4, 8, 2100),
(4, 9, 1300),
(4, 2, 2800);

