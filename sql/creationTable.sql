CREATE TABLE Parametre(
   nomPar VARCHAR(50),
   valeurPar INT,
   PRIMARY KEY(nomPar)
);

CREATE TABLE ElementFixe(
   idElement INT AUTO_INCREMENT,
   nomElement VARCHAR(50),
   cheminImage VARCHAR(255),
   PRIMARY KEY(idElement)
);

CREATE TABLE Mobilier(
   idMobilier INT,
   largeur INT,
   longueur INT,
   deplacable BOOLEAN,
   PRIMARY KEY(idMobilier),
   FOREIGN KEY(idMobilier) REFERENCES ElementFixe(idElement)
);

CREATE TABLE Equipement(
   idEquipement INT,
   pieceOr INT,
   PRIMARY KEY(idEquipement),
   FOREIGN KEY(idEquipement) REFERENCES ElementFixe(idElement)
);

CREATE TABLE Piege(
   idPiege INT,
   Categorie VARCHAR(50),
   zoneEffetLargeur INT,
   zoneEffetLongueur INT,
   diffDetection VARCHAR(50),
   diffEsquive VARCHAR(50),
   diffDesamorsage VARCHAR(50),
   PRIMARY KEY(idPiege),
   FOREIGN KEY(idPiege) REFERENCES ElementFixe(idElement)
);

CREATE TABLE EtreVivant(
   idEtreVivant INT AUTO_INCREMENT,
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
   descriptionEnvironnement VARCHAR(250),
   PRIMARY KEY(nomEnvironnement)
);

CREATE TABLE Objectif(
   idObjectif INT AUTO_INCREMENT,
   type VARCHAR(20),
   PRIMARY KEY(idObjectif)
);

CREATE TABLE ObjEquipement(
   idObjEquip INT,
   nom VARCHAR(50),
   idEquipement INT,
   PRIMARY KEY(idObjEquip),
   FOREIGN KEY(idObjEquip) REFERENCES Objectif(idObjectif),
   FOREIGN KEY(idEquipement) REFERENCES Equipement(idEquipement)
);


CREATE TABLE Contributrice(
   idContributrice INT AUTO_INCREMENT,
   nomContributrice VARCHAR(50) NOT NULL,
   prenomContributrice VARCHAR(50) NOT NULL,
   dateInscriptionContributrice DATE DEFAULT CURDATE(),
   PRIMARY KEY(idContributrice)
);

CREATE TABLE Carte(
   nomCarte VARCHAR(50),
   descriptionCarte VARCHAR(255),
   dateCreationCarte DATE DEFAULT CURDATE(),
   idObjectif INT,
   idCreateur INT,
   PRIMARY KEY(nomCarte),
   FOREIGN KEY(idObjectif) REFERENCES Objectif(idObjectif),
   FOREIGN KEY(idCreateur) REFERENCES Contributrice(idContributrice)
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
   FOREIGN KEY(nomCarte) REFERENCES Carte(nomCarte)
);

CREATE TABLE PassageSecret(
   idPassage INT AUTO_INCREMENT,
   difficultees INT,
   idMobilierPS INT,
   idZone INT NOT NULL,
   PRIMARY KEY(idPassage),
   UNIQUE(difficultees),
   FOREIGN KEY(idMobilierPS) REFERENCES Mobilier(idMobilier),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone)
);

CREATE TABLE Creature(
   idCreature INT,
   climat VARCHAR(50),
   niveauDifficulte INT,
   nomEnvCreature VARCHAR(50) DEFAULT NULL,
   PRIMARY KEY(idCreature),
   FOREIGN KEY(idCreature) REFERENCES EtreVivant(idEtreVivant),
   FOREIGN KEY(nomEnvCreature) REFERENCES Environnement(nomEnvironnement)
);

CREATE TABLE ObjZone(
   idObjZone INT,
   nom VARCHAR(50),
   idZone INT,
   PRIMARY KEY(idObjZone),
   FOREIGN KEY(idObjZone) REFERENCES Objectif(idObjectif),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone)
);

CREATE TABLE GenererAPartir(
   nomCarte VARCHAR(50),
   nomPar VARCHAR(50),
   PRIMARY KEY(nomCarte, nomPar),
   FOREIGN KEY(nomCarte) REFERENCES Carte(nomCarte),
   FOREIGN KEY(nomPar) REFERENCES Parametre(nomPar)
);

CREATE TABLE Modifier(
   nomCarte VARCHAR(50),
   idContributrice INT,
   dateModification DATE DEFAULT CURDATE(),
   descriptionModif VARCHAR(250),
   PRIMARY KEY(nomCarte, idContributrice),
   FOREIGN KEY(nomCarte) REFERENCES Carte(nomCarte),
   FOREIGN KEY(idContributrice) REFERENCES Contributrice(idContributrice)
);

CREATE TABLE RelierZones(
   idZoneA INT,
   idZoneB INT,
   direction VARCHAR(50),
   PRIMARY KEY(idZoneA, idZoneB),
   FOREIGN KEY(idZoneA) REFERENCES Zone(idZone),
   FOREIGN KEY(idZoneB) REFERENCES Zone(idZone)
);

CREATE TABLE OnTrouve(
   idZone INT,
   idElement INT,
   posX INT DEFAULT NULL,
   posY INT DEFAULT NULL,
   PRIMARY KEY(idZone, idElement),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone),
   FOREIGN KEY(idElement) REFERENCES ElementFixe(idElement)
);

CREATE TABLE Contient(
   idZone INT,
   idEtreVivant INT,
   posX INT DEFAULT NULL,
   posY INT DEFAULT NULL,
   PRIMARY KEY(idZone, idEtreVivant),
   FOREIGN KEY(idZone) REFERENCES Zone(idZone),
   FOREIGN KEY(idEtreVivant) REFERENCES EtreVivant(idEtreVivant)
);

CREATE TABLE EnvironnementSecondaire(
   idCreature INT,
   nomEnvironnement VARCHAR(50),
   PRIMARY KEY(idCreature, nomEnvironnement),
   FOREIGN KEY(idCreature) REFERENCES Creature(idCreature),
   FOREIGN KEY(nomEnvironnement) REFERENCES Environnement(nomEnvironnement)
);

CREATE TABLE Sauvegarde(
   nomPar VARCHAR(50),
   valeur INT,
   dateSauvegarde DATE DEFAULT CURDATE(),
   PRIMARY KEY(nomPar),
   FOREIGN KEY(nomPar) REFERENCES Parametre(nomPar)
);
