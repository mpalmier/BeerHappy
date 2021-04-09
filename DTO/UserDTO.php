<?php

Class UserDTO{
    private $idUser;
    private $pseudo;
    private $mdp;
    private $argent;
    private $adresse;
    private $admin;


    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin): void
    {
        $this->admin = $admin;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getArgent() {
        return $this->argent;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function setIdUser($idUser): void {
        $this->idUser = $idUser;
    }

    function setPseudo($pseudo): void {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp): void {
        $this->mdp = $mdp;
    }

    function setArgent($argent): void {
        $this->argent = $argent;
    }

    function setAdresse($adresse): void {
        $this->adresse = $adresse;
    }


}