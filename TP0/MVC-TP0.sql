CREATE TABLE JOUEUR(
   ID_joueur INT AUTO_INCREMENT,
   Nom VARCHAR(50) ,
   Prenom VARCHAR(50) ,
   DateNaissance VARCHAR(50) ,
   PRIMARY KEY(ID_joueur)
);

CREATE TABLE LIGUE(
   ID_ligue INT AUTO_INCREMENT,
   Region VARCHAR(50) ,
   PRIMARY KEY(ID_ligue)
);

CREATE TABLE EQUIPE(
   ID_equipe INT AUTO_INCREMENT,
   Nom VARCHAR(50) ,
   President VARCHAR(50) ,
   ID_ligue INT NOT NULL,
   PRIMARY KEY(ID_equipe),
   FOREIGN KEY(ID_ligue) REFERENCES LIGUE(ID_ligue)
);

CREATE TABLE MEMBRE(
   ID_joueur INT,
   ID_equipe INT,
   PRIMARY KEY(ID_joueur, ID_equipe),
   FOREIGN KEY(ID_joueur) REFERENCES JOUEUR(ID_joueur),
   FOREIGN KEY(ID_equipe) REFERENCES EQUIPE(ID_equipe)
);
