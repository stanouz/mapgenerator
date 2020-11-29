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