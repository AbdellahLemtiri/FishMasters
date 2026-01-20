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
    user_role_id INT REFERENCES roles(id_role) ON DELETE RESTRICT
);