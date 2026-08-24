<?php 

class Marque {
    public $id;
    public $nom;
    
    public function __construct($i, $n) {
        $this-> id = $i;
        $this-> nom = $n;
    }
}