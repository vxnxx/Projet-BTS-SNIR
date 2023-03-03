
var tempChart = new Chart("tempChart", {
    type: "line",
    data: {
        labels: [1,2,3,4,5,6,7,8,9,10],
        datasets: [{
        data: [],
        borderColor: "magenta",
        fill: false
        }]
    },
    options: {
        legend: {
        display: false
        }
    }
});

var co2Chart = new Chart("co2Chart", {
    type: "line",
    data: {
        labels: [1,2,3,4,5,6,7,8,9,10],
        datasets: [{
        data: [],
        borderColor: "black",
        fill: false
        }]
    },
    options: {
        legend: {
        display: false
        }
    }
});



function updateCharts(tempChart, co2Chart) {
    tempChart.data.datasets.forEach(dataset => {
        dataset.data.push(Math.random()*31); // Ajoute une valeur aléatoire à chaque dataset
    });

    co2Chart.data.datasets.forEach(dataset => {
        dataset.data.push(Math.random()*31); // Ajoute une valeur aléatoire à chaque dataset
    });
    console.log('updated');
}

setInterval(updateCharts, 3000);