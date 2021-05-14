<?php
include_once('DAO/ProduitDAO.php');
include_once('DTO/ProduitDTO.php');
include_once('DAO/UserDAO.php');
include_once('DTO/UserDTO.php');

class ControllerCommande {

    public static function includeView()
    {
        include_once('commande.php');
    }

    public static function argentUserById($id)
    {
        $user = UserDAO::getUserById($id);
        foreach ($user as $u) {
            echo $u->getArgent();
        }
    }

    public static function argentUserByIdMoins($id)
    {
        $user = UserDAO::getUserById($id);
        foreach ($user as $u) {
            $value1 = $u->getArgent();
            $value2 = $_SESSION['prix'];
            $value = $value1 - $value2;
            echo $value;
        }
    }

    public static function argentUserByIdMoinsValue($id) {
        $user = UserDAO::getUserById($id);
        foreach ($user as $u) {
            $value1 = $u->getArgent();
            $value2 = $_SESSION['prix'];
            $value = $value1 - $value2;
            return $value;
        }
    }

    public static function getCommandeFinish()
    {

        $qteTotal = 0;

        if (!empty($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $key => $value) {
                $produit = new ProduitDTO();
                $produit = ProduitDAO::getProduitById($value[0]);
                if (isset($produit)) {
                    foreach ($produit as $pt) {

                        $qteTotal += $value[1];
                        $valueStock = $pt->getStock() - $value[1];

                        ProduitDAO::setFacture($pt->getPrix(),$_SESSION['id']);

                        $bdd = DatabaseLinker::getConnexion();
                        $lastInsertId = $bdd->lastInsertId();

                        ProduitDAO::setContenir($pt->getId(),$lastInsertId,$value[1]);
                        ProduitDAO::SuprStockByQte($valueStock,$pt->getId());

                    }
                }
            }
        }

        $value = ControllerCommande::argentUserByIdMoinsValue($_SESSION['id']);
        ProduitDAO::updatePrixUser($value,$_SESSION['id']);

        foreach ($_SESSION['panier'] as $key => $value)
        {
            unset($_SESSION['panier'][$key]);
        }
        header('Location: index.php?page=accueil');

    }

}