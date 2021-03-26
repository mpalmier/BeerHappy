<?php

class MessageDTO{
    
    private $idUser;
    private $pseudo;
    private $content;
    private $date;
    function getIdUser() {
        return $this->idUser;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getContent() {
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

    function setIdUser($idUser): void {
        $this->idUser = $idUser;
    }

    function setPseudo($pseudo): void {
        $this->pseudo = $pseudo;
    }

    function setContent($content): void {
        $this->content = $content;
    }

    function setDate($date): void {
        $this->date = $date;
    }


}