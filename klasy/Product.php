<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author student
 */
class Product {
    
    
    protected $id; 
    protected $nazwa; 
    protected $zdjecie;
    protected $cena;
    
    function __construct($id, $nazwa, $zdjecie, $cena)
    { 
    $this->id=$id;
    $this->nazwa = $nazwa;
    $this->zdjecie=$zdjecie;
    $this->cena=$cena;
    } 
    
    function getNazwa() {
        return $this->nazwa;
    }

    function getZdjecie() {
        return $this->zdjecie;
    }

    function getCena() {
        return $this->cena;
    }

    function setNazwa($nazwa): void {
        $this->nazwa = $nazwa;
    }

    function setZdjecie($zdjecie): void {
        $this->zdjecie = $zdjecie;
    }

    function setCena($cena): void {
        $this->cena = $cena;
    }

    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }


    
    
//zdefiniować pozostałe metody
}
