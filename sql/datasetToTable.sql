/*
=============Remplissage de la table EtreVivant=============
*/

INSERT INTO EtreVivant(idEtreVivant, nomEtreVivant)
SELECT id, nom
FROM dataset.DonneesFournies
WHERE type = 'créature';


UPDATE EtreVivant
SET categorie= 
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'catégorie=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idEtreVivant);



UPDATE EtreVivant
SET piece=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'pieces=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idEtreVivant);


UPDATE EtreVivant
SET pointAttaque=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'attaque=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idEtreVivant);


UPDATE EtreVivant
SET pointDeVie=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'vie=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idEtreVivant);


/*
=============Remplissage de la table Environnement=============
*/


INSERT INTO Environnement(nomEnvironnement)
SELECT DISTINCT(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'environnement=', -1), ',', 1)) 
FROM dataset.DonneesFournies
WHERE type='créature';


DELETE FROM Environnement
WHERE nomEnvironnement='Unknown';



/*
=============Remplissage de la table créature=============
*/

INSERT INTO Creature(idCreature)
SELECT id
FROM dataset.DonneesFournies
WHERE type = 'créature';


UPDATE Creature
SET climat=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'climat=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idCreature);


UPDATE Creature
SET niveauDifficulte=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'difficulté=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idCreature);




UPDATE Creature
SET nomEnvCreature=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'environnement=', -1), ',', 1)
FROM dataset.DonneesFournies
WHERE id = idCreature AND 
        (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'environnement=', -1), ',', 1)
         FROM dataset.DonneesFournies
         WHERE id = idCreature) != 'Unknown'
);

/*
=============Remplissage de la table elementFixe=============
*/



INSERT INTO ElementFixe(idElement, nomElement)
SELECT id, nom
FROM dataset.DonneesFournies
WHERE type='piège' OR type='mobilier';



UPDATE ElementFixe
SET cheminImage=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'image=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idElement);


/*
=============Remplissage de la table piege=============
*/

INSERT INTO Piege(idPiege)
SELECT id 
FROM dataset.DonneesFournies
WHERE type='piège';


UPDATE Piege
SET Categorie=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'catégorie=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);


UPDATE Piege
SET zoneEffetLongueur=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'zone=', -1), ',', 1), 'mètre', 1),'x', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);

UPDATE Piege
SET zoneEffetLargeur=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'zone=', -1), ',', 1), 'mètre', 1),'x', -1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);


UPDATE Piege
SET diffDetection=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'detecter=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);
    
UPDATE Piege
SET diffDesamorsage=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'desamorcer=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);
    
UPDATE Piege
SET diffEsquive=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'esquiver=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);


/*
=============Remplissage de la table mobilier=============
*/

INSERT INTO Mobilier(idMobilier)
SELECT id 
FROM dataset.DonneesFournies
WHERE type='mobilier';


UPDATE Mobilier
SET deplacable=
CASE 
    WHEN (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'deplacable=', -1), ',', 1)
            FROM dataset.DonneesFournies
            WHERE id = idMobilier) = 'oui' THEN True
    WHEN (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'deplacable=', -1), ',', 1)
            FROM dataset.DonneesFournies
            WHERE id = idMobilier) = 'non' THEN False
    ELSE NULL
END;


UPDATE Mobilier
SET longueur=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'dimensions=', -1), ',', 1), ',', 1),'x', 1)
FROM dataset.DonneesFournies
    WHERE id = idMobilier);

UPDATE Mobilier
SET largeur=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'dimensions=', -1), ',', 1), ',', 1),'x', -1)
FROM dataset.DonneesFournies
    WHERE id = idMobilier);


