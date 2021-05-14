#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS prestachopebdd4;
CREATE DATABASE prestachopebdd4;
USE prestachopebdd4;

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id       Int  Auto_increment,
        email    Varchar (50),
        pseudo   Varchar (50),
        password Varchar (50),
        argent   Float,
        admin    Int 
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

--
-- Donnée dans la table " user "
--

INSERT INTO `user` (`id`, `email`, `pseudo`, `password`, `argent`, `admin`) VALUES
(NULL, 'besserve.maxence@gmail.com', 'mamax', SHA1('mamax'), '99999', '1'),
(NULL, 'palmier.mathéo@gmail.com', 'matheo', SHA1('matheo'), '99999', '1'),
(NULL, 'utilisateur.test@gmail.com', 'test', SHA1('test'), '99999', '0');

#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id      Int  Auto_increment ,
        titre   Varchar (30),
        contenu Text,
        date    Date,
        id_user Int 
	,CONSTRAINT message_PK PRIMARY KEY (id)

	,CONSTRAINT message_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: facture
#------------------------------------------------------------

CREATE TABLE facture(
        id      Int  Auto_increment ,
        prix    Float,
        id_user Int 
	,CONSTRAINT facture_PK PRIMARY KEY (id)

	,CONSTRAINT facture_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id  Int  Auto_increment ,
        nom Varchar (20) 
	,CONSTRAINT categorie_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

--
-- Donnée dans la table " categorie "
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(NULL, 'Bières'),
(NULL, 'Charcuterie'),
(NULL, 'Fromage'),
(NULL, 'Autres');

#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        id           Int  Auto_increment ,
        nom          Varchar (30),
        prix         Float,
        stock        Int,
        photo        Varchar (255),
        id_categorie Int 
	,CONSTRAINT produit_PK PRIMARY KEY (id)

	,CONSTRAINT produit_categorie_FK FOREIGN KEY (id_categorie) REFERENCES categorie(id)
)ENGINE=InnoDB;

--
-- Donnée dans la table " produit "
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `stock`, `photo`, `id_categorie`) VALUES
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '1'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '4'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '4'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '4'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '3'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '3'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '3'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '3'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '3'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '2'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '2'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '2'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '2'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '2'),
(NULL, 'La verte', '4', '24', 'https://vandb-vandb-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/2ad54c89a073a2855b94a6d4c64825790bf5f175_4622BBO032042_1.png', '2');

#------------------------------------------------------------
# Table: adresse
#------------------------------------------------------------

CREATE TABLE adresse(
        id            Int  Auto_increment ,
        nom           Varchar (35),
        prenom        Varchar (35),
        adresse_ligne Varchar (50),
        ville         Varchar (50),
        code_postal   Int,
        telephone     Int,
        id_user       Int 
	,CONSTRAINT adresse_PK PRIMARY KEY (id)

	,CONSTRAINT adresse_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;

--
-- Donnée dans la table " adresse "
--

INSERT INTO `adresse` (`id`, `nom`, `prenom`, `adresse_ligne`, `ville`, `code_postal`, `telephone`, `id_user`) VALUES
(NULL, 'Besserve', 'Maxence', 'Jsp', 'CLERMONT-FERRAND', '63000', '0678541285', '1');

#------------------------------------------------------------
# Table: contenir
#------------------------------------------------------------

CREATE TABLE contenir(
        id         Int,
        id_facture Int,
        quantite   Int 
	,CONSTRAINT contenir_PK PRIMARY KEY (id,id_facture)

	,CONSTRAINT contenir_produit_FK FOREIGN KEY (id) REFERENCES produit(id)
	,CONSTRAINT contenir_facture0_FK FOREIGN KEY (id_facture) REFERENCES facture(id)
)ENGINE=InnoDB;

