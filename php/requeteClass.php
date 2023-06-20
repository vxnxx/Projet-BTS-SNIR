<?php

// Définition de la classe Requete
Class Requete {
    // Définition des propriétés de la classe
    public $id; // Identifiant de la requête
    public $salle; // Nom de la salle
    public $date; // Date de la requête
    public $horaire; // Horaire de la requête
    public $co2; // Niveau de CO2 de la salle
    public $temperature; // Température de la salle

    
    // Définition du constructeur de la classe
    public function __construct($id, $salle, $date, $horaire, $co2, $temperature) {
        // Initialisation des propriétés de la classe avec les valeurs passées en paramètres
        $this->id = $id;
        $this->salle = $salle;
        $this->date = $date;
        $this->horaire = $horaire;
        $this->co2 = $co2;
        $this->temperature = $temperature;
        
    }
}

?>