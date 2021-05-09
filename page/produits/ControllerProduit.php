<?php
include_once('DAO/ProduitDAO.php');
include_once('DTO/ProduitDTO.php');
class ControllerProduit
{
    public static function includeView()
    {
        include_once("produit.php");
    }

    public static function afficherCategorie()
    {
        $produit=new ProduitDTO();
        $produit=ProduitDAO::getProduitByCategorie($_GET['id']);
        foreach ($produit as $pt)
        {

            echo '
               
                <div id="make-3D-space">
                    <div id="product-card">
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
                                    <p>Petite Description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                ';

        }

    }

}


