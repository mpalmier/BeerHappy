#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        id_produit Int  Auto_increment   ,
        nom        Varchar (30)  ,
        prix       Float  ,
        categorie  Varchar (30)  ,
        photo      Varchar (30) 
	,CONSTRAINT produit_PK PRIMARY KEY (id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user   Int  Auto_increment   ,
        pseudo    Varchar (30)  ,
        mdp       Varchar (30)  ,
        argent    Varchar (30)  ,
        adresse   Varchar (30)  ,
        admin     Int  ,
        id_panier Int 
	,CONSTRAINT user_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: panier
#------------------------------------------------------------

CREATE TABLE panier(
        id_panier      Int  Auto_increment   ,
        id_user_panier Int  ,
        id_produit     Int  ,
        id_user        Int  ,
        id             Int
	,CONSTRAINT panier_PK PRIMARY KEY (id_panier)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: achat
#------------------------------------------------------------

CREATE TABLE achat(
        id            Int  Auto_increment   ,
        id_user_achat Int  ,
        id_achat      Int  ,
        id_user       Int 
	,CONSTRAINT achat_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id_message  Int  Auto_increment   ,
        pseudo_user Varchar (30)  ,
        content     Varchar (250)  ,
        date        Date  ,
        id_user     Int 
	,CONSTRAINT message_PK PRIMARY KEY (id_message)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartient
#------------------------------------------------------------

CREATE TABLE appartient(
        id_panier  Int  ,
        id_produit Int 
	,CONSTRAINT appartient_PK PRIMARY KEY (id_panier,id_produit)
)ENGINE=InnoDB;




ALTER TABLE user
	ADD CONSTRAINT user_panier0_FK
	FOREIGN KEY (id_panier)
	REFERENCES panier(id_panier);

ALTER TABLE user 
	ADD CONSTRAINT user_panier0_AK 
	UNIQUE (id_panier);

ALTER TABLE panier
	ADD CONSTRAINT panier_user0_FK
	FOREIGN KEY (id_user)
	REFERENCES user(id_user);

ALTER TABLE panier
	ADD CONSTRAINT panier_achat1_FK
	FOREIGN KEY (id)
	REFERENCES achat(id);

ALTER TABLE panier 
	ADD CONSTRAINT panier_user0_AK 
	UNIQUE (id_user);

ALTER TABLE achat
	ADD CONSTRAINT achat_user0_FK
	FOREIGN KEY (id_user)
	REFERENCES user(id_user);

ALTER TABLE message
	ADD CONSTRAINT message_user0_FK
	FOREIGN KEY (id_user)
	REFERENCES user(id_user);

ALTER TABLE appartient
	ADD CONSTRAINT appartient_panier0_FK
	FOREIGN KEY (id_panier)
	REFERENCES panier(id_panier);

ALTER TABLE appartient
	ADD CONSTRAINT appartient_produit1_FK
	FOREIGN KEY (id_produit)
	REFERENCES produit(id_produit);
