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

/*
    /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\     
    A AMELIORER CAR GARDE L'ENVIRONNEMENT 'Unknown'
    /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
*/

INSERT INTO Environnement(nomEnvironnement)
SELECT DISTINCT(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'environnement=', -1), ',', 1))
FROM dataset.DonneesFournies
WHERE type='créature';







/*
=============Remplissage de la table créature=============
*/

INSERT INTO creature(idCreature)
SELECT id
FROM dataset.DonneesFournies
WHERE type = 'créature';


UPDATE creature
SET climat=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'climat=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idCreature);


UPDATE creature
SET niveauDifficulte=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'difficulté=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idCreature);


UPDATE creature
SET nomEnvCreature=
(SELECT DISTINCT(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'environnement=', -1), ',', 1))
FROM dataset.DonneesFournies
    WHERE id = idCreature);


/*
=============Remplissage de la table elementFixe=============
*/

/*
Pour remise à 0 des id mais pas sûr que ce soit nécessaire donc voir instruction suivante !

INSERT INTO elementFixe(idElement)
SELECT id-(SELECT min(id) 
            FROM dataset.DonneesFournies                  
            WHERE type='piège' OR type='mobilier')+1
FROM dataset.DonneesFournies
WHERE type='piège' OR type='mobilier';
*/

INSERT INTO elementFixe(idElement, nomElement)
SELECT id, nom
FROM dataset.DonneesFournies
WHERE type='piège' OR type='mobilier';



UPDATE elementFixe
SET cheminImage=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'image=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idElement);


/*
=============Remplissage de la table piege=============
*/

INSERT INTO piege(idPiege)
SELECT id 
FROM dataset.DonneesFournies
WHERE type='piège';


UPDATE piege
SET Categorie=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'catégorie=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);


UPDATE piege
SET zoneEffet=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'zone=', -1), ',', 1), 'mètre', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);


UPDATE piege
SET diffDetection=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'detecter=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);
    
UPDATE piege
SET diffDesamorsage=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'desamorcer=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);
    
UPDATE piege
SET diffEsquive=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'esquiver=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idPiege);


/*
=============Remplissage de la table mobilier=============
*/

INSERT INTO mobilier(idMobilier)
SELECT id 
FROM dataset.DonneesFournies
WHERE type='mobilier';


UPDATE mobilier
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


UPDATE mobilier
SET dimensions=
(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(attributs, 'dimensions=', -1), ',', 1)
FROM dataset.DonneesFournies
    WHERE id = idMobilier);


