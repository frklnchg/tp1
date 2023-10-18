CREATE DATABASE tp1;


CREATE TABLE maison(
    matricule INT(20) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    addresse VARCHAR(255),
    nb_chambres INT(10),
    pied_carre FLOAT,
    annee_construite FLOAT
);

INSERT INTO maison (matricule, addresse, nb_chambres, pied_carre, annee_construite)
VALUES (1,'123 Bel Air', 3, 1500.50, 1998),
       (2,'456 Central Park', 4, 2000.75, 2005),
       (3,'789 Hollywood', 2, 1000.25, 2010);