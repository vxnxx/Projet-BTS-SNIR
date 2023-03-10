<?php

Class Requete {
    public $id;
    public $salle;
    public $date;
    public $horaire;
    public $humidite;
    public $temperature;

    
    public function __construct($id, $salle, $date, $horaire, $humidite, $temperature) {
        $this->id = $id;
        $this->salle = $salle;
        $this->date = $date;
        $this->horaire = $horaire;
        $this->humidite = $humidite;
        $this->temperature = $temperature;
        
    }
}

?>