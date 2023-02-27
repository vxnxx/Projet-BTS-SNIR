
//simulation requete sql
data1 = [];
data2 = [];
labels = [];

function generateRandom() {
    return(Math.random() * 31);
}

function remplirData() {
    data1.push(Number(generateRandom()));
    data2.push(Number(generateRandom()));


    if(data1.length <= 10 && data2.length <= 10) {
    labels.push(Number(data1.length));
    }


    if(data1.length() >= 10 && data2.length() >= 10) {
        data1.shift();
        data2.shift();
        labels = [1,2,3,4,5,6,7,8,9,10];
    }

    console.log("rempli");
    console.log(labels);
    console.log(data1);
    console.log(data2);
}


function generateCharts() {
new Chart("tempChart", {
    type: "line",
    data: {
        labels: labels,
        datasets: [{
        data: data1,
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

    new Chart("co2Chart", {
    type: "line",
    data: {
        labels: labels,
        datasets: [{
        data: data2,
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
}

setInterval(remplirData, 3000);
setInterval(generateCharts, 3000);