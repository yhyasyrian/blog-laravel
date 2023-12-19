import {Chart} from "chart.js/auto";
export default function (element){
    let labels = JSON.parse(element.getAttribute('data-label'));
    let data = {
        labels: labels,
        datasets: [{
            label: 'visitors',
            data: JSON.parse(element.getAttribute(('data-value'))),
            fill: true,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.5,
        }],
    };
    let config = {
        type: 'line',
        data: data,
        options:{
            maintainAspectRatio:false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    };
    new Chart(element,config);
}
