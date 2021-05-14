<?php
include_once('DAO/ProduitDAO.php');
include_once('DTO/ProduitDTO.php');
class ControllerPanier
{

    function includeView()
    {
        include_once('panier.php');
    }

    function getPanierVerif()
    {
        if(isset($_GET['id']))
        {
            $product = ProduitDAO::getProduitById($_GET['id']);
            if(empty($product))
            {
                die("Ce produit n'existe pas");
            }
            $this->addProduct($_GET['id']);
            header('Location: index.php?page=carte');
        } else {
            die("Vous n'avez pas sélectionné de produit à ajouter");
        }
    }

    function addProduct($product_id)
    {
        foreach ($_SESSION['panier'] as $key => $value)
        {
            if ($value[0] == $product_id)
            {
                $value[1]++;
                $_SESSION['panier'][$key] =[$product_id, $value[1]];
                header('Location: '.$_SERVER["HTTP_REFERER"].'');
                die("Produit bien ajouté a l'autre");
            }
        }
        $quantite = 1;
        $_SESSION['panier'][] =[$product_id, $quantite];
    }

    public static function SuprPanier($supr_id)
    {
        if(isset($supr_id))
        {
            foreach ($_SESSION['panier'] as $key => $value)
            {
                if ($key == $supr_id)
                {
                    unset($_SESSION['panier'][$key]);
                    header('Location: index.php?page=panier');
                }
            }
        }

    }

    public static function supprimerPanierAll()
    {
        foreach ($_SESSION['panier'] as $key => $value)
        {
            unset($_SESSION['panier'][$key]);
        }
        header('Location: index.php?page=panier');
    }

    public static function suprQuantite($add_id,$product_id)
    {
        if(isset($add_id))
        {
            foreach ($_SESSION['panier'] as $key => $value)
            {
                if ($key == $add_id)
                {
                    if ($value[1] == 1)
                    {
                        ControllerPanier::SuprPanier($add_id);
                    }
                    else {
                        $value[1]--;
                        $_SESSION['panier'][$key] =[$product_id, $value[1]];
                    }

                    header('Location: index.php?page=panier');
                }
            }
        }

    }

    public static function addQuantite($supr_id,$product_id)
    {
        if(isset($supr_id))
        {
            foreach ($_SESSION['panier'] as $key => $value)
            {
                if ($key == $supr_id)
                {
                    $value[1]++;
                    $_SESSION['panier'][$key] =[$product_id, $value[1]];
                    header('Location: index.php?page=panier');
                }
            }
        }
    }

    public static function getCalculPrixQte($prix,$qte)
    {
        if(isset($prix) && isset($qte))
        {
            $prix *= $qte;
        }
        return $prix;
    }

    public static function afficherPanier()
    {
        $prix = 0;
        $prix1 = 0;

        if(!empty($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $key => $value) {
                $produit = new ProduitDTO();
                $produit = ProduitDAO::getProduitById($value[0]);

                if (isset($produit)) {
                    foreach ($produit as $pt) {
                        echo '
                        <tr>
                            <td><div class="img"><img src="' . $pt->getPhoto() . '"></div></td>
                            <td>' . $pt->getNom() . '</td>
                            <td>' . $pt->getPrix() . ' €</td>
                            <td><a href="index.php?page=suprQuantite&id=' . $key . '&idp=' . $pt->getId() . '">-</a>' . $value[1] . '<a href="index.php?page=addQuantite&id=' . $key . '&idp=' . $pt->getId() . '">+</a></td>
                            <td><a href="index.php?page=supprimerPanier&id=' . $key . '">Supprimer</a></td>
                        </tr>';
                        $prix1 += ControllerPanier::getCalculPrixQte($pt->getPrix(), $value[1]);
                        $prix += $prix1;
                        $_SESSION['prix'] = $prix;
                    }
                }
            }

            echo "</div>
            <tfoot>
            <td class='borderFoot'><a href='index.php?page=supprimerPanierAll'>Supprimer tout le panier</a></td>
            <td class='borderFoot'></td>
            <td class='borderFoot'></td>
            <td class='borderFoot'></td>
            <td class='borderFoot'><div class='prix'>Prix Total  : " . $_SESSION['prix'] . " €</div></td>
            </tfoot>
            </table>";
        }
        else {
            echo "</div>
            <tfoot>
            <td class='borderFoot'></td>
            <td class='borderFoot'></td>
            <td class='borderFoot'>Votre panier est vide</td>
            <td class='borderFoot'></td>
            <td class='borderFoot'></td>
            </tfoot>
            </table>";
        }


    }

}