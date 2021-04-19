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

    }
