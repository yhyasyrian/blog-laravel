import {Chart} from "chart.js/auto";

export default function (element){
    let data = {
        labels: JSON.parse(element.getAttribute(('data-label'))),
        datasets: [{
            label: 'category',
            data: JSON.parse(element.getAttribute(('data-value'))),
            hoverOffset: 4
        }],
    };
    let config = {
        type: 'pie',
        data: data,
        options: {
            plugins:{
                legend: {
                    display: false
                }
            }
        }
    };
    new Chart(element,config);

}
