<?php

Class Requete {
    public $id;
    public $salle;
    public $date;
    public $horaire;
    public $co2;
    public $temperature;

    
    public function __construct($id, $salle, $date, $horaire, $co2, $temperature) {
        $this->id = $id;
        $this->salle = $salle;
        $this->date = $date;
        $this->horaire = $horaire;
        $this->co2 = $co2;
        $this->temperature = $temperature;
        
    }
}

?>