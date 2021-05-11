#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS Prestachopebdd4;
CREATE DATABASE Prestachopebdd4;
USE Prestachopebdd4;

#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (20) NOT NULL
	,CONSTRAINT categorie_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        id           Int  Auto_increment  NOT NULL ,
        nom          Varchar (30) NOT NULL ,
        prix         Float NOT NULL ,
        stock        Int NOT NULL ,
        photo        Varchar (255) NOT NULL ,
        id_categorie Int NOT NULL
	,CONSTRAINT produit_PK PRIMARY KEY (id)

	,CONSTRAINT produit_categorie_FK FOREIGN KEY (id_categorie) REFERENCES categorie(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: adresse
#------------------------------------------------------------

CREATE TABLE adresse(
        id            Int  Auto_increment  NOT NULL ,
        nom           Varchar (35) NOT NULL ,
        prenom        Varchar (35) NOT NULL ,
        adresse_ligne Varchar (50) NOT NULL ,
        ville         Varchar (50) NOT NULL ,
        code_postal   Int NOT NULL ,
        telephone     Int NOT NULL
	,CONSTRAINT adresse_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id         Int  Auto_increment  NOT NULL ,
        email      Varchar (50) NOT NULL ,
        pseudo     Varchar (50) NOT NULL ,
        password   Varchar (50) NOT NULL ,
        argent     Float NOT NULL ,
        admin      Int NOT NULL ,
        id_adresse Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)

	,CONSTRAINT user_adresse_FK FOREIGN KEY (id_adresse) REFERENCES adresse(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id      Int  Auto_increment  NOT NULL ,
        titre   Varchar (30) NOT NULL ,
        contenu Text NOT NULL ,
        date    Date NOT NULL ,
        id_user Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (id)

	,CONSTRAINT message_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: facture
#------------------------------------------------------------

CREATE TABLE facture(
        id      Int  Auto_increment  NOT NULL ,
        prix    Float NOT NULL ,
        id_user Int NOT NULL
	,CONSTRAINT facture_PK PRIMARY KEY (id)

	,CONSTRAINT facture_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contenir
#------------------------------------------------------------

CREATE TABLE contenir(
        id         Int NOT NULL ,
        id_facture Int NOT NULL ,
        quantite   Int NOT NULL
	,CONSTRAINT contenir_PK PRIMARY KEY (id,id_facture)

	,CONSTRAINT contenir_produit_FK FOREIGN KEY (id) REFERENCES produit(id)
	,CONSTRAINT contenir_facture0_FK FOREIGN KEY (id_facture) REFERENCES facture(id)
)ENGINE=InnoDB;

