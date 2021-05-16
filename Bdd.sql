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
        email    Varchar (255),
        pseudo   Varchar (255),
        password Varchar (255),
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
        titre   Varchar (255),
        contenu Text,
        date    Date,
        id_user Int 
	,CONSTRAINT message_PK PRIMARY KEY (id)

	,CONSTRAINT message_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;

--
-- Donnée dans la table " message "
--

INSERT INTO `message` (`id`, `titre`, `contenu`, `date`, `id_user`) VALUES
(NULL, 'Problème retour commande de bières', 'Bonjour, je nai pas reçus la totalité de ma commande.', CURRENT_TIMESTAMP(), '2');

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

--
-- Donnée dans la table " facture "
--

INSERT INTO `facture` (`id`, `prix`, `id_user`) VALUES
(NULL, '4', '1');


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id  Int  Auto_increment ,
        nom Varchar (255)
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
        nom          Varchar (255),
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
    (NULL, 'la Lutine', '4', '24', 'assets/images/images/Bières/biere-artisanale-du-perigord-a-la-noix-brasserie-la-lutine-33cl.png', '1'),
    (NULL, 'la Barbaude', '3', '30', 'assets/images/images/Bières/biere-artisanale-l-ocre-33cl-ambree-bio-brasserie-la-barbaude.png', '1'),
    (NULL, 'la Flemme', '5', '25', 'assets/images/images/Bières/biere-la-flemme.png', '1'),
    (NULL, 'la Graine de bulle', '3.50', '20', 'assets/images/images/Bières/Graine-de-bulle.png', '1'),
    (NULL, 'la Dur à cuire', '4', '24', 'assets/images/images/Bières/la-dure-a-cuire-biere-artisanale-ambree.png', '1'),
    (NULL, 'Impecable', '5', '28', 'assets/images/images/Bières/l-impeccable-blonde-pale-ale-33-cl-veyrat.png', '1'),
    (NULL, 'Foie gras', '5', '20', 'assets/images/images/Charcuterie/foiegras.png', '2'),
    (NULL, 'Mortadelle', '2.50', '30', 'assets/images/images/Charcuterie/i147825-mortadelle.png', '2'),
    (NULL, 'Jambon blanc', '3', '25', 'assets/images/images/Charcuterie/jambon-blanc-sans-sel-nitrite-en-tranche.png', '2'),
    (NULL, 'Rosette', '2', '20', 'assets/images/images/Charcuterie/rosette.png', '2'),
    (NULL, 'Saucisson sec pur porc des Cévennes', '3.50', '15', 'assets/images/images/Charcuterie/saucisson-sec-pur-porc-des-cevennes.png', '2'),
    (NULL, 'Camembert', '2', '30', 'assets/images/images/Fromage/camembert.png', '3'),
    (NULL, 'Comté extra AOP', '3', '25', 'assets/images/images/Fromage/comte-extra-aop-.png', '3'),
    (NULL, 'Fourme dAmbert', '3.50', '35', 'assets/images/images/Fromage/fourme-d-ambert.png', '3'),
    (NULL, 'Gruyère', '2.50', '10', 'assets/images/images/Fromage/gruyere.png', '3'),
    (NULL, 'Saint nectaire', '4', '22', 'assets/images/images/Fromage/saint-nectaire.png', '3'),
    (NULL, 'Planche à découpper', '5.50', '10', 'assets/images/images/Autres/planche.png', '4'),
    (NULL, 'Tire bouchon décapsuleur', '2', '12', 'assets/images/images/Autres/tire-bouchon-decapsuleur.png', '4'),
    (NULL, 'Verre à bière', '5', '35', 'assets/images/images/Autres/verre-biere-drink-good-beer_1.png', '4');


#------------------------------------------------------------
# Table: adresse
#------------------------------------------------------------

CREATE TABLE adresse(
        id            Int  Auto_increment ,
        nom           Varchar (255),
        prenom        Varchar (255),
        adresse_ligne Varchar (255),
        ville         Varchar (255),
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
(NULL, 'Besserve', 'Maxence', '3 rue du cheval blanc', 'CLERMONT-FERRAND', '63000', '0678541285', '1');

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

--
-- Donnée dans la table " contenir "
--

INSERT INTO `contenir` (`id`, `id_facture`, `quantite`)
VALUES ('1', '1', '2');

