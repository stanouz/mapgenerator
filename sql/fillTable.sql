/* Insertion de PNJ */

INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('nain', 5, 8, 2, 'montagnard');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='nain'),	
	   'mineur',
	   'grincheux',
	   'Salut ça va ?');

INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Paul', 4, 2, 7, 'citadin');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Paul'),	
	   'marchand',
	   'Heureux',
	   'Venez dans ma boutique !');



INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Zidane', 8, 1, 3, 'sportif');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Zidane'),	
	   'footballer',
	   'Heureux',
	   'Attention au coup de boul!');


INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Emmanuel Macron', 4, 2, 7, 'Politique');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Emmanuel Macron'),	
	   'Président',
	   'Solennel',
	   'Et vive la République !');


INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Camille', 4, 2, 7, 'Jeune');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Camille'),	
	   'Etudiante',
	   'Souriante',
	   'Comment ça va ?! :)');


INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Stan', 4, 2, 7, 'Jeune');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Stan'),	
	   'Etudiante en BDD',
	   'Travailleur',
	   'Tu connais le SQL ?');


INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Bobby', 4, 2, 7, 'citadin');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Bobby'),	
	   'Skater',
	   'Sérieux',
	   'Tu as vu le tricks ?!');


INSERT INTO EtreVivant(nomEtreVivant, piece, pointAttaque, pointDeVie, categorie) 
VALUES('Joseph', 4, 2, 7, 'citadin');

INSERT INTO PNJ 
VALUES((SELECT MAX(idEtreVivant)
			FROM EtreVivant 
			WHERE nomEtreVivant='Joseph'),	
	   'Poissonier',
	   'Bavard',
	   'Qui veut du bon poisson !');

/* Insertion Equipement */
INSERT INTO ElementFixe(nomElement) VALUES ('épée');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='épée'), 8);

INSERT INTO ElementFixe(nomElement) VALUES ('sac');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='sac'), 13);

INSERT INTO ElementFixe(nomElement) VALUES ('bouclier');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='bouclier'), 23);

INSERT INTO ElementFixe(nomElement) VALUES ('chaussure');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='chaussure'), 4);

INSERT INTO ElementFixe(nomElement) VALUES ('casque');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='casque'), 12);

INSERT INTO ElementFixe(nomElement) VALUES ('armure');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='armure'), 38);

INSERT INTO ElementFixe(nomElement) VALUES ('GPS');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='GPS'), 18);

INSERT INTO ElementFixe(nomElement) VALUES ('carte');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='carte'), 8);

INSERT INTO ElementFixe(nomElement) VALUES ('gourde');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='gourde'), 18);

INSERT INTO ElementFixe(nomElement) VALUES ('chaussette');

INSERT INTO Equipement
VALUES ((SELECT idElement FROM ElementFixe WHERE nomElement='chaussette'), 1);



/* Insertion description environnement */

UPDATE Environnement
SET descriptionEnvironnement = "Contient beaucoup de zone avec de l'eau"
WHERE nomEnvironnement = 'Aquatic';

UPDATE Environnement
SET descriptionEnvironnement = "Haride et hostile, que du sable et des cactus"
WHERE nomEnvironnement = 'Desert';

UPDATE Environnement
SET descriptionEnvironnement = "Une jungle, des arbres tropicaux à perte de vue"
WHERE nomEnvironnement = 'ForestJungle';

UPDATE Environnement
SET descriptionEnvironnement = "De la neige et de la glace partout, attention aux crevasses"
WHERE nomEnvironnement = 'Mountains';

UPDATE Environnement
SET descriptionEnvironnement = "Une jolie plaine avec des fleurs"
WHERE nomEnvironnement = 'Plains';

UPDATE Environnement
SET descriptionEnvironnement = "On dit que des esprits habites les ruines de dongeons"
WHERE nomEnvironnement = 'RuinsDungeons';

UPDATE Environnement
SET descriptionEnvironnement = "La tête dans les nuages"
WHERE nomEnvironnement = 'Sky';

UPDATE Environnement
SET descriptionEnvironnement = "De l'eau et de la boue partout, attention aux moustiques"
WHERE nomEnvironnement = 'Swamp';

UPDATE Environnement
SET descriptionEnvironnement = "Souterrains, déconseiller au clostrophobe"
WHERE nomEnvironnement = 'Underground';

UPDATE Environnement
SET descriptionEnvironnement = "La ville, avec du béton de partout"
WHERE nomEnvironnement = 'Urban';

UPDATE Environnement
SET descriptionEnvironnement = "Des collines, encore des collines"
WHERE nomEnvironnement = 'Hills';
