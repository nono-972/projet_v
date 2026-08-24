<?php

class Voiture {

    public $id;
    public $nom;
    public $puissance;
    public $prix;
    public $marque_id;

    public function __construct($i, $n, $p, $pr, $m) {
        $this-> id = $i;
        $this-> nom = $n;
        $this-> puissance = $p;
        $this-> prix = $pr;
        $this-> marque_id = $m;
    }
}