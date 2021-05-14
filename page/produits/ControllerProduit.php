<?php
include_once('DAO/ProduitDAO.php');
include_once('DTO/ProduitDTO.php');
class ControllerProduit
{
    public static function includeView()
    {
        include_once("produit.php");
    }

    public static function afficherCategorie($id)
    {
        $produit=ProduitDAO::getProduitById($id);
        if (!empty($produit))
        {
            foreach ($produit as $pt)
            {
                echo '
                <div id="make-3D-space">
                    <div class="product-card">
                        <div id="product-front">
                            <div class="shadow"></div>
                            <img id="img" src="'.$pt->getPhoto().'" alt="Image de '.$pt->getNom().'" />
                            <div class="image_overlay"></div>
                            <a href="index.php?page=details&id='.$pt->getId().'">
                                <div id="view_details">View details</div>
                            </a>
                            <div class="stats">
                                <div class="stats-container">
                                    <span class="product_price">'.$pt->getPrix().' €</span>
                                    <span class="product_name">'.$pt->getNom().'</span>
                                    <p>A remplir</p>
                                    <div class="product-options">
                                        <div class="button_cont" align="center">
                                            <a class="buttonAddProduct" href="index.php?page=launchPanier&id='.$pt->getId().'">Ajouter au panier</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }
    }

    public static function afficherNameCategorie()
    {
        $categorie = CategorieDAO::getCategorieById($_GET['id']);

        foreach ($categorie as $ct)
        {
            echo $ct->getNom();
        }
    }

}
?>
