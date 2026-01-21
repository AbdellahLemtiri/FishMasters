

CREATE TABLE roles (
    id_role SERIAL PRIMARY KEY,
    nom_role VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE utilisateurs (
    id_user SERIAL PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(255) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    user_role_id INT NOT NULL REFERENCES roles(id_role) ON DELETE RESTRICT
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
prise,score,especes

INSERT INTO competitions (titreCompetition, lieuCompetition, dateDebut, dateFin, typeCompetition, image) VALUES 
('Grand Prix de la Baie', 'Dakhla', '2024-10-12', '2024-10-14', 'Mer', 'https://lh3.googleusercontent.com/aida-public/AB6AXuC3cmYHLi21Ysqi_xbbhTChL2N-gv4jzQ5BT-yNj5frDPUsdYmuzEyu8eBlRetQAgocQdr7zOuQ_1NXT8JUNQIrNxK_ODG3jN0PYMD0eJVIN9w8eQUYBIoimMCLIxVxPIj_mFyaHoZyEhFqDLJgx4hudnE6V8aNLAnF3SUrP-J9cdLA2Iv2XaBGWHCMQf0bisNBESiUUjbEEhlUPZRJMsrwwlWNKASgGgYDFPmWP--w9IF6cnueL5jpca3C_ZKOjA5C-b5xm3oMd-TM');