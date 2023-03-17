//code here

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

tempData = tempChart.data.datasets[0].data;
co2Data = co2Chart.data.datasets[0].data;

tempChart.update();


function remplirDataTempChart() {
    if(tempData.length < 10) {
    tempData.push(Number(Math.random()*31));
    } else {
        tempData.shift();
        tempData.push(Number(Math.random()*31));
    }


    tempChart.update();
}
function remplirDataco2Chart() {
    if(co2Data.length < 10) {
    co2Data.push(Number(Math.random()*31));
    } else {
        co2Data.shift();
        co2Data.push(Number(Math.random()*31));
    }


    co2Chart.update();
}

setInterval(remplirDataTempChart, 1500);
setInterval(remplirDataco2Chart, 1500);