CREATE TABLE parametre(
   nomPar VARCHAR(50),
   valeurPar INT,
   PRIMARY KEY(nomPar)
);

CREATE TABLE elementFixe(
   idElement INT,
   nomElement VARCHAR(50),
   cheminImage VARCHAR(255),
   positionElementFixe_x INT,
   positionElementFixe_y INT,
   PRIMARY KEY(idElement)
);

CREATE TABLE mobilier(
   idMobilier INT,
   dimensions VARCHAR(10),
   deplacable BOOLEAN,
   PRIMARY KEY(idMobilier),
   FOREIGN KEY(idMobilier) REFERENCES elementFixe(idElement)
);

CREATE TABLE equipement(
   idEquipement INT,
   pieceOr INT,
   PRIMARY KEY(idEquipement),
   FOREIGN KEY(idEquipement) REFERENCES elementFixe(idElement)
);

CREATE TABLE piege(
   idPiege INT,
   Categorie VARCHAR(50),
   zoneEffet VARCHAR(50),
   diffDetection VARCHAR(50),
   diffEsquive VARCHAR(50),
   diffDesamorsage VARCHAR(50),
   PRIMARY KEY(idPiege),
   FOREIGN KEY(idPiege) REFERENCES elementFixe(idElement)
);

CREATE TABLE EtreVivant(
   idEtreVivant INT,
   nomEtreVivant VARCHAR(50),
   piece INT,
   pointAttaque INT,
   pointDeVie INT,
   categorie VARCHAR(50),
   PRIMARY KEY(idEtreVivant)
);

CREATE TABLE PNJ(
   idPNJ INT,
   metier VARCHAR(50),
   traitCaractere VARCHAR(50),
   phraseType VARCHAR(50),
   PRIMARY KEY(idPNJ),
   FOREIGN KEY(idPNJ) REFERENCES EtreVivant(idEtreVivant)
);

CREATE TABLE Environnement(
   nomEnvironnement VARCHAR(50),
   descriptionEnvironnement VARCHAR(50),
   PRIMARY KEY(nomEnvironnement)
);

CREATE TABLE objectif(
   Id_objectif INT AUTO_INCREMENT,
   type INT,
   PRIMARY KEY(Id_objectif)
);

CREATE TABLE objEquipement(
   Id_objectif INT,
   nom VARCHAR(50),
   idEquipement INT,
   PRIMARY KEY(Id_objectif),
   FOREIGN KEY(Id_objectif) REFERENCES objectif(Id_objectif),
   FOREIGN KEY(idEquipement) REFERENCES equipement(idEquipement)
);

CREATE TABLE carte(
   nomCarte VARCHAR(50),
   descriptionCarte VARCHAR(255) NOT NULL,
   dateCreationCarte DATE NOT NULL,
   Id_objectif INT NOT NULL,
   PRIMARY KEY(nomCarte),
   FOREIGN KEY(Id_objectif) REFERENCES objectif(Id_objectif)
);

CREATE TABLE contributeur_ice_(
   Id_contributeur_ice_ INT AUTO_INCREMENT,
   nomContributeur_ice_ VARCHAR(50) NOT NULL,
   prenomContributeur_ice_ VARCHAR(50) NOT NULL,
   dateInscriptionContributeur_ice_ TIMESTAMP NOT NULL,
   nomCarte VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_contributeur_ice_),
   FOREIGN KEY(nomCarte) REFERENCES carte(nomCarte)
);

CREATE TABLE Zone(
   idZone INT AUTO_INCREMENT,
   posZone_x INT,
   posZone_y INT,
   descriptionZone VARCHAR(255),
   longueurZone DOUBLE NOT NULL,
   largeurZone DOUBLE NOT NULL,
   nomEnvironnement VARCHAR(50) NOT NULL,
   nomCarte VARCHAR(50),
   PRIMARY KEY(idZone),
   FOREIGN KEY(nomEnvironnement) REFERENCES Environnement(nomEnvironnement),
   FOREIGN KEY(nomCarte) REFERENCES carte(nomCarte)
);

CREATE TABLE passageSecret(
   idPassage INT AUTO_INCREMENT,
   difficultees INT,
   idMobilierPS INT,
   idZone INT NOT NULL,
   PRIMARY KEY(idPassage),
   UNIQUE(difficultees),
   FOREIGN KEY(idMobilierPS) REFERENCES mobilier(idMobilier),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone)
);

CREATE TABLE creature(
   idCreature INT,
   climat VARCHAR(50),
   niveauDifficulte INT,
   nomEnvCreature VARCHAR(50),
   PRIMARY KEY(idCreature),
   FOREIGN KEY(idCreature) REFERENCES EtreVivant(idEtreVivant),
   FOREIGN KEY(nomEnvCreature) REFERENCES Environnement(nomEnvironnement)
);

CREATE TABLE objZone(
   Id_objectif INT,
   nom VARCHAR(50),
   idZone INT,
   PRIMARY KEY(Id_objectif),
   FOREIGN KEY(Id_objectif) REFERENCES objectif(Id_objectif),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone)
);

CREATE TABLE Generer_a_partir(
   nomCarte VARCHAR(50),
   nomPar VARCHAR(50),
   PRIMARY KEY(nomCarte, nomPar),
   FOREIGN KEY(nomCarte) REFERENCES carte(nomCarte),
   FOREIGN KEY(nomPar) REFERENCES parametre(nomPar)
);

CREATE TABLE Modifier(
   nomCarte VARCHAR(50),
   Id_contributeur_ice_ INT,
   PRIMARY KEY(nomCarte, Id_contributeur_ice_),
   FOREIGN KEY(nomCarte) REFERENCES carte(nomCarte),
   FOREIGN KEY(Id_contributeur_ice_) REFERENCES contributeur_ice_(Id_contributeur_ice_)
);

CREATE TABLE Relier_a(
   idZone INT,
   idZone_1 INT,
   direction VARCHAR(50),
   PRIMARY KEY(idZone, idZone_1),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone),
   FOREIGN KEY(idZone_1) REFERENCES Zone(idZone)
);

CREATE TABLE on_trouve(
   idZone INT,
   idElement INT,
   PRIMARY KEY(idZone, idElement),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone),
   FOREIGN KEY(idElement) REFERENCES elementFixe(idElement)
);

CREATE TABLE contient(
   idZone INT,
   idEtreVivant INT,
   PRIMARY KEY(idZone, idEtreVivant),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone),
   FOREIGN KEY(idEtreVivant) REFERENCES EtreVivant(idEtreVivant)
);

CREATE TABLE environnementSecondaire(
   idCreature INT,
   nomEnvironnement VARCHAR(50),
   PRIMARY KEY(idCreature, nomEnvironnement),
   FOREIGN KEY(idCreature) REFERENCES creature(idCreature),
   FOREIGN KEY(nomEnvironnement) REFERENCES Environnement(nomEnvironnement)
);

CREATE TABLE Sauvegarde(
   nomPar VARCHAR(50),
   nomPar_1 VARCHAR(50),
   valeur INT,
   dateSauvegarde TIMESTAMP,
   PRIMARY KEY(nomPar, nomPar_1),
   FOREIGN KEY(nomPar) REFERENCES parametre(nomPar),
   FOREIGN KEY(nomPar_1) REFERENCES parametre(nomPar)
);
