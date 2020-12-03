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
