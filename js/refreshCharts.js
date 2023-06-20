    function updateTable() {
      // Requête AJAX pour récupérer les données depuis le serveur
      $.ajax({
        url: 'http://172.10.10.56/AirQuality/php/fetchtest.php',
        type: 'GET',
        success: function (data) {
          // Analyse les données JSON récupérées
          parsedData = JSON.parse(data);
        },
        error: function () {
          console.log('Erreur lors de la récupération des données');
        }
      });
    }

    // Met à jour les données de la table toutes les 10 secondes
    setInterval(updateTable, 10000);

    // Fonction pour récupérer les données initiales
    function firstFetch() {
      // Requête AJAX pour récupérer les données depuis le serveur
      $.ajax({
        url: 'http://172.10.10.56/AirQuality/php/fetchtest2.php', 
        type: 'GET', 
        success: function(response) {
            // Analyse les données JSON récupérées
            firstParsed = JSON.parse(response);
            // Récupère les données de température, CO2, humidité et horaire
            firstTemp = firstParsed.temp;
            firstCO2 = firstParsed.co2;
            firstHumi = firstParsed.humi.pop();
            firstHoraire = firstParsed.horaire.reverse();

            // Crée un graphique pour la température
            var tempChart = new Chart("tempChart", {
              type: "line",
              data: {
                labels: firstHoraire,
                datasets: [{
                  data: firstTemp,
                  borderColor: "#9a00ff",
                  fill: false
                }]
              },
              options: {
                legend: {
                  display: false
                },
                scales: {
                  yAxes: [{
                    gridLines: {
                      color: "#616161",
                    },
                  }],
                  xAxes: [{
                    gridLines: {
                      color: "#616161",
                    },
                  }]
                },
                elements: {
                  point: {
                    radius: 0
                  }
                }
              }
            });
          
            // Crée un graphique pour le CO2
            var co2Chart = new Chart("co2Chart", {
              type: "line",
              data: {
                labels: firstHoraire,
                datasets: [{
                  data: firstCO2,
                  borderColor: "#919191",
                  fill: false
                }]
              },
              options: {
                legend: {
                  display: false
                },
                scales: {
                  yAxes: [{
                    gridLines: {
                      color: "#616161",
                    },
                  }],
                  xAxes: [{
                    gridLines: {
                      color: "#616161",
                    },
                  }]
                },
                elements: {
                  point: {
                    radius: 0
                  }
                }
              }
            });

            // Récupère les données des graphiques
            tempData = tempChart.data.datasets[0].data;
            co2Data = co2Chart.data.datasets[0].data;
            // Met à jour les graphiques
            tempChart.update();
            co2Chart.update();

            // Options pour le graphique d'humidité
            var opts = {
              angle: 0.28, // L'étendue de l'arc du jauge
              lineWidth: 0.1, // L'épaisseur de la ligne
              radiusScale: 1, // Rayon relatif
              pointer: {
                length: 0.49, // Relatif au rayon de la jauge
                strokeWidth: 0.026, // L'épaisseur
                color: '#000000' // Couleur de remplissage
              },
              limitMax: false,     // Si false, la valeur maximale augmente automatiquement si value > maxValue
              limitMin: false,     // Si true, la valeur minimale de la jauge sera fixée
              colorStart: '#9A00FF',   // Couleurs
              colorStop: '#f257ff',    // expérimentez avec elles
              strokeColor: '#919191',  // pour voir lesquelles fonctionnent le mieux pour vous
              generateGradient: true,
              highDpiSupport: true,     // Support haute résolution
            };
          
            // Récupère l'élément canvas pour le graphique d'humidité
            var target = document.getElementById('humidite');
            // Crée une jauge
            var gauge = new Donut(target).setOptions(opts);
            // Définit la valeur maximale de la jauge
            gauge.maxValue = 100;
            // Définit la valeur minimale de la jauge
            gauge.setMinValue(0);
            // Définit la vitesse d'animation de la jauge
            gauge.animationSpeed = 27;
          
            // Affiche le taux d'humidité
            document.getElementById("tauxHumidite").innerHTML = `${firstHumi}%`;
            // Définit la valeur actuelle de la jauge
            gauge.set(firstHumi);

            // Fonction pour remplir les données du graphique de température
            function remplirDataTempChart() {
              if (tempData.length < 20) {
                tempData.push(parsedData.temperature);
              } else {
                tempData.shift();
                tempData.push(parsedData.temperature);
              }
              tempChart.update();
            }
          
            // Fonction pour remplir les données du graphique de CO2
            function remplirDataco2Chart() {
              if (co2Data.length < 20) {
                co2Data.push(parsedData.CO2);
              } else {
                co2Data.shift();
                co2Data.push(parsedData.CO2);
              }
              co2Chart.update();
            }

            // Fonction pour remplir les labels des graphiques
            function remplirLabel() {
              if (firstHoraire.length < 20) {
                firstHoraire.push(parsedData.horaire);
              } else {
                firstHoraire.shift();
                firstHoraire.push(parsedData.horaire);
              }
              tempChart.update();
              co2Chart.update();
            }
          
            // Fonction pour mettre à jour le taux d'humidité
            function updateHumi() {
              document.getElementById("tauxHumidite").innerHTML = `${parsedData.humidite}%`;
              gauge.set(parsedData.humidite); // Définit la valeur actuelle de la jauge
            }
          
            // Met à jour les données des graphiques toutes les 30 secondes
            setInterval(remplirDataTempChart, 30000);
            setInterval(remplirDataco2Chart, 30000);
            setInterval(updateHumi, 30000);
            setInterval(remplirLabel, 30000);
        },
        error: function() {
          console.log('Erreur lors de la récupération des données');
        }
      });
    }
      // Appelle la fonction pour récupérer les données initiales
  firstFetch();
