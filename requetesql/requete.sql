CREATE TABLE roles (
    id_role SERIAL PRIMARY KEY,
    nom_role VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE utilisateurs (
    id_user SERIAL PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(255) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    user_role_id INT NOT NULL REFERENCES roles (id_role) ON DELETE RESTRICT
);

CREATE TABLE competitions (
    idCompetition INT AUTO_INCREMENT PRIMARY KEY,
    titreCompetition VARCHAR(255) NOT NULL,
    lieuCompetition VARCHAR(255) NOT NULL,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    typeCompetition VARCHAR(50) NOT NULL,
    statutCompetition VARCHAR(50) DEFAULT 'A venir',
    image VARCHAR(255) DEFAULT 'default.jpg'
);

INSERT INTO
    competitions (
        titreCompetition,
        lieuCompetition,
        dateDebut,
        dateFin,
        typeCompetition,
        image
    )
VALUES (
        'Grand Prix de la Baie',
        'Dakhla',
        '2024-10-12',
        '2024-10-14',
        'Mer',
        'https://lh3.googleusercontent.com/aida-public/AB6AXuC3cmYHLi21Ysqi_xbbhTChL2N-gv4jzQ5BT-yNj5frDPUsdYmuzEyu8eBlRetQAgocQdr7zOuQ_1NXT8JUNQIrNxK_ODG3jN0PYMD0eJVIN9w8eQUYBIoimMCLIxVxPIj_mFyaHoZyEhFqDLJgx4hudnE6V8aNLAnF3SUrP-J9cdLA2Iv2XaBGWHCMQf0bisNBESiUUjbEEhlUPZRJMsrwwlWNKASgGgYDFPmWP--w9IF6cnueL5jpca3C_ZKOjA5C-b5xm3oMd-TM'
    );


 
DROP TABLE IF EXISTS inscriptionsCompetitions CASCADE;
DROP TABLE IF EXISTS reglements CASCADE;
DROP TABLE IF EXISTS prise CASCADE;  
DROP TABLE IF EXISTS prises CASCADE;  
 
DROP TABLE IF EXISTS pecheurs CASCADE;
DROP TABLE IF EXISTS competitions CASCADE;
DROP TABLE IF EXISTS especes CASCADE;
 
DROP TYPE IF EXISTS competition_water_type CASCADE;
DROP TYPE IF EXISTS competition_category CASCADE;
DROP TYPE IF EXISTS competition_status CASCADE;
CREATE TABLE pecheurs (
    region VARCHAR(60),
    specialite VARCHAR(40),
    photoPecheur VARCHAR(250),
    statutPecheur BOOLEAN DEFAULT TRUE
) INHERITS (utilisateurs);
 
 
CREATE TABLE prise (
    idPrise SERIAL PRIMARY KEY,
    idespece INT REFERENCES especes (idEspece) ON DELETE CASCADE,
    poids FLOAT DEFAULT NULL,
    taille FLOAT DEFAULT NULL,
    photo VARCHAR(250),
    dateHeure TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    spot VARCHAR(100),
    statut BOOLEAN DEFAULT TRUE,
    idPecheur INT REFERENCES utilisateurs (id_user) ON DELETE CASCADE,
    idCompetition INT REFERENCES competitions (idCompetition) ON DELETE CASCADE
);

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
    UNIQUE(competitionId, especeId)
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
    UNIQUE(competitionId, especeId)
);

INSERT INTO utilisateurs (nomuser, emailuser, passworduser, role_id) 
VALUES (
    'Administrateur', 
    'admin@exemple.com', 
    '$2y$10$ak/OkVsM2.l8RSTgjO7houqTnk8z.28bl9Et86dBzSb4W3tz7rjqq', 
    1
);

-- //////////////////////////////////////////////////////////////////////////////////////////////////////////
