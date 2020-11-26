/*
Script SQL pour transferer et surtout formater le champs attributs des données du prof
ex d'attributs = "catégorie=Undead, climat=Temperate, pieces=8,
				 environnement=RuinsDungeons, difficulté=3, 
				 attaque=1, vie=2"  
Pour mettre dans catégorie la valeur "Undead" etc...


Création d'une table créature similaire à celle qu'on aura
pour faire des tests 
*/
CREATE TABLE créature(
    id INT PRIMARY KEY,
    nom VARCHAR(100),
    catégorie VARCHAR(50),
    climat VARCHAR(50),
    environnement VARCHAR(50),
    difficulté INT,
    pièce INT,
    attaque INT,
    vie INT,
    attributs_tmp VARCHAR(250)
);

/* 
On insère dans la table les données n'ayant pas besoin 
d'être formaté 
*/
INSERT INTO créature(id, nom, attributs_tmp)
SELECT c.id, c.nom, c.attributs
FROM dataset.DonneesFournies c
WHERE c.type = 'créature';

/* 
On récupére ce qu'il y a après 'catégorie=' et avant la virgule
et on le met dans la colonne catégorie
*/

UPDATE créature
SET catégorie= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'catégorie=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);


/* 
On récupére ce qu'il y a après 'climat=' et avant la virgule
et on le met dans la colonne climat
*/

UPDATE créature
SET climat= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'climat=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);


/* 
On récupére ce qu'il y a après 'environnement=' et avant la virgule
et on le met dans la colonne environnement
*/

UPDATE créature
SET environnement= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'environnement=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);

/* 
On récupére ce qu'il y a après 'vie=' et avant la virgule
et on le met dans la colonne vie
*/

UPDATE créature
SET vie= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'vie=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);


/* 
On récupére ce qu'il y a après 'attaque=' et avant la virgule
et on le met dans la colonne attaque
*/

UPDATE créature
SET attaque= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'attaque=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);

/* 
On récupére ce qu'il y a après 'difficulté=' et avant la virgule
et on le met dans la colonne difficulté
*/

UPDATE créature
SET difficulté= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'difficulté=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);

/* 
On récupére ce qu'il y a après 'pièce=' et avant la virgule
et on le met dans la colonne pièce
*/

UPDATE créature
SET pièce= 
	(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs_tmp, 'pieces=', -1), ',', 1)
	FROM créature c
    WHERE créature.id = id);

/*
Suppression de la colonne temporaire
*/

ALTER TABLE créature
DROP attributs_tmp;



/*
Pour remettre les ID à 0
*/

INSERT INTO test(id)
SELECT c.id
FROM dataset.DonneesFournies c
WHERE c.type = 'mobilier';


UPDATE test
SET id = id - (SELECT min(id)
               FROM test)

