<?php

class AppartientDAO{
    private $id_panier;
    private $id_produit;
    function getId_panier() {
        return $this->id_panier;
    }

    function getId_produit() {
        return $this->id_produit;
    }

    function setId_panier($id_panier): void {
        $this->id_panier = $id_panier;
    }

    function setId_produit($id_produit): void {
        $this->id_produit = $id_produit;
    }


}

