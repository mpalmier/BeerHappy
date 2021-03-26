<?php
class ProduitDTO{
    
    private $idProduit;
    private $nom;
    private $prix;
    private $categorie;
    private $photo;
    
    
    function getIdProduit() {
        return $this->idProduit;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrix() {
        return $this->prix;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setIdProduit($idProduit): void {
        $this->idProduit = $idProduit;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

    function setCategorie($categorie): void {
        $this->categorie = $categorie;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }


}