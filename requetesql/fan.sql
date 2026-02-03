-- Création tableau Badge:
CREATE TABLE IF NOT EXISTS badges(
    id_badge SERIAL PRIMARY KEY,
    titre_badge VARCHAR(200),
    icon_badge VARCHAR(500),
    min_score INT
);

-- Création tableau Like:
CREATE TABLE IF NOT EXISTS likes(
    id_like SERIAL PRIMARY KEY,
    statut_like BOOLEAN,
    pecheur_id INT REFERENCES utilisateurs(id_user),
    prise_id INT REFERENCES prises(idprise),
    competition_id INT REFERENCES competitions(idCompetition),
    fan_id INT REFERENCES utilisateurs(id_user)
);

-- Création tableau Commentaire:
CREATE TABLE IF NOT EXISTS commentaires(
    id_commentaire SERIAL PRIMARY KEY,
    contenu TEXT NOT NULL,
    statut_commentaire BOOLEAN,
    date_commentaire TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fan_id INT REFERENCES utilisateurs(id_user)
);

-- Création tableau Fan:
CREATE TABLE IF NOT EXISTS fans(
    statut_fan BOOLEAN,
    dateInscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) INHERITS (utilisateurs);

-- Création tableau Collection des badges:
CREATE TABLE IF NOT EXISTS collectionBadges(
    fan_id INT REFERENCES utilisateurs(id_user),
    badge_id INT REFERENCES badges(id_badge),
    dateRecuperation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(fan_id, badge_id)
);