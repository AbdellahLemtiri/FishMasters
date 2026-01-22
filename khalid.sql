CREATE DATABASE FishMasters ;

CREATE TABLE roles (
    id_role SERIAL PRIMARY KEY,
    nom_role VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE utilisateurs (
    id_user SERIAL PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(255) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    
    user_role_id INT NOT NULL,

    FOREIGN KEY (user_role_id) 
    REFERENCES roles(id_role) 
    ON DELETE RESTRICT

);

CREATE TABLE IF NOT EXISTS competitions (
    idCompetition INT AUTO_INCREMENT PRIMARY KEY,
    titreCompetition VARCHAR(255) NOT NULL,
    lieu VARCHAR(255) NOT NULL,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    typeMilieu ENUM('Mer','Eau Douce') NOT NULL,
    statut ENUM('Ouvert','En cours','Terminé') NOT NULL DEFAULT 'Ouvert',
    nbManches INT NOT NULL CHECK (nbManches > 0),
    modeScoring ENUM('Poids Total','Taille Cumulee') NOT NULL,
    reglement VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE rounds (
    id SERIAL PRIMARY KEY,
    competition_id INT NOT NULL,
    round_number INT NOT NULL,
    FOREIGN KEY (competition_id)
        REFERENCES competitions(id)
        ON DELETE CASCADE
);

CREATE TABLE species (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    min_size DECIMAL(6,2) NOT NULL,
    coefficient DECIMAL(4,2) NOT NULL,
    environment VARCHAR(20) NOT NULL -- mer | eau_douce
);


CREATE TABLE catches (
    id SERIAL PRIMARY KEY,
    fisherman_id INT NOT NULL,
    competition_id INT NOT NULL,
    species_id INT NOT NULL,
    weight DECIMAL(8,2),
    length DECIMAL(8,2),
    photo VARCHAR(255),
    is_released BOOLEAN DEFAULT false,
    validated BOOLEAN DEFAULT false,
    caught_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (fisherman_id) REFERENCES users(id),
    FOREIGN KEY (competition_id) REFERENCES competitions(id),
    FOREIGN KEY (species_id) REFERENCES species(id)
);


CREATE TABLE registrations (
    id SERIAL PRIMARY KEY,
    fisherman_id INT NOT NULL,
    competition_id INT NOT NULL,
    status VARCHAR(20) DEFAULT 'pending',

    FOREIGN KEY (fisherman_id) REFERENCES users(id),
    FOREIGN KEY (competition_id) REFERENCES competitions(id)
);


CREATE TABLE scores (
    id SERIAL PRIMARY KEY,
    fisherman_id INT NOT NULL,
    competition_id INT NOT NULL,
    total_points DECIMAL(10,2) NOT NULL,
    total_weight DECIMAL(10,2),
    biggest_catch DECIMAL(10,2),

    FOREIGN KEY (fisherman_id) REFERENCES users(id),
    FOREIGN KEY (competition_id) REFERENCES competitions(id)
);


CREATE TABLE rankings (
    id SERIAL PRIMARY KEY,
    competition_id INT NOT NULL,
    fisherman_id INT NOT NULL,
    rank_position INT NOT NULL,

    FOREIGN KEY (competition_id) REFERENCES competitions(id),
    FOREIGN KEY (fisherman_id) REFERENCES users(id)
);


 