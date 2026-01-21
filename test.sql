-- =====================================
-- TABLE: admins
-- =====================================
CREATE TABLE admins (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);

-- =====================================
-- TABLE: categories
-- =====================================
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    statut VARCHAR(50) NOT NULL,         -- 'Eau douce' ou 'Mer'
    competition_type VARCHAR(50) NOT NULL,   -- 'Individuelle' ou 'Équipe'
    level VARCHAR(50) NOT NULL               -- 'Junior', 'Senior', 'Open'
);

-- =====================================
-- TABLE: competitions
-- =====================================
CREATE TABLE competitions (
    id SERIAL PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    date DATE NOT NULL,
    type VARCHAR(50) NOT NULL,              -- 'Mer', 'Eau douce', etc.
    category_id INT REFERENCES categories(id) ON DELETE SET NULL,
    location VARCHAR(150),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);

-- =====================================
-- TABLE: species
-- =====================================
CREATE TABLE species (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    min_size NUMERIC(5,2) DEFAULT 0,        -- taille minimale en cm
    points_coefficient NUMERIC(5,2) DEFAULT 1.0
);

-- =====================================
-- TABLE: catches
-- =====================================
CREATE TABLE prises (
    id SERIAL PRIMARY KEY,
    pecheur_id INT NOT NULL,                -- FK vers table des pêcheurs (à créer)
    competition_id INT REFERENCES competitions(id) ON DELETE CASCADE,
    species_id INT REFERENCES species(id) ON DELETE SET NULL,
    weight NUMERIC(6,2),                    -- poids en grammes
    length NUMERIC(5,2),                    -- longueur en cm
    photo_url VARCHAR(255),
    catch_time TIMESTAMP DEFAULT NOW(),
    spot VARCHAR(150),
    mode VARCHAR(50),                        -- 'Relâché' ou 'Gardé'
    validated BOOLEAN DEFAULT FALSE
);

-- =====================================
-- TABLE: fans (optional, pour futur fan management)
-- =====================================
CREATE TABLE fans (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW()
);

-- =====================================
-- TABLE: pecheurs (pêcheurs sportifs)
-- =====================================
CREATE TABLE pecheurs (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    club VARCHAR(100),
    region VARCHAR(100),
    favorite_type VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT NOW()
);
