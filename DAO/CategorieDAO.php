<?php
    class CategorieDAO
    {
        public static function getCategorie()
        {
            $bdd = DatabaseLinker::getConnexion();
            $reponse = $bdd->prepare("SELECT * from categorie");
            $reponse->execute();
            $cat = $reponse->fetchAll();
            $tab = array();
            foreach ($cat as $cats)
            {
                $categorieDTO = new CategorieDTO();
                $categorieDTO->setId($cats[0]);
                $categorieDTO->setNom($cats[1]);
                $tab[] = $categorieDTO;
            }

            return $tab;
        }

        public static function addCategorie($nom)
        {

            $bdd = DatabaseLinker::getConnexion();
            $reponse = $bdd->prepare("Insert into categorie (nom) VALUE (?)");
            $reponse->execute(array($nom));
        }

        public static function deleteCategorie($id){
            $bdd = DatabaseLinker::getConnexion();
            $reponse = $bdd->prepare("DELETE from categorie where id=?");
            $reponse->execute(array($id));
        }

        public static function modifierCategorie($nom,$id){
            $bdd = DatabaseLinker::getConnexion();
            $reponse = $bdd->prepare("Update categorie set nom=? where id=?");
            $reponse->execute(array($nom,$id));
        }


    }
