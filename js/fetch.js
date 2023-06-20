$(document).ready(function() {

    // Fonction qui met à jour le tableau
    function updateTable() {

      // Requête AJAX pour récupérer les données depuis le serveur
      $.ajax({
        url: 'http://172.10.10.56/AirQuality/fetchtest.php', 
        type: 'GET', 
        success: function(data) {
            // Les données sont récupérées sous forme de chaîne de caractères JSON
            // On les parse pour les transformer en objet JavaScript
            parsedData = JSON.parse(data);
            // On met à jour le contenu de l'élément HTML avec les données récupérées
            document.getElementById("test").innerHTML = `temp = ${parsedData.temperature} <br> co2 = ${parsedData.CO2}`
        },
        error: function() {
          console.log('Erreur lors de la récupération des données');
        }
      });
    }
    // On appelle la fonction updateTable toutes les 3 secondes
    setInterval(updateTable, 3000);
});