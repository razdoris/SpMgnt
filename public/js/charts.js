let canvasAssiduityMatch = document.querySelector("#canvasAssiduityMatch");
let chartAssiduityMatch = new Chart(canvasAssiduityMatch,{
    type:"pie",
    data:{
        labels: ["present", "indisponible", "absent"],
        datasets: [{
            label:"répartition des presences",
            data:[50,12,10],
            backgroundColor:["green","orange","red"],
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'taux de presence de '
            }
        }
    },
})


let canvasAssiduityPractice = document.querySelector("#canvasAssiduityPractice");
let chartAssiduityPractice = new Chart(canvasAssiduityPractice,{
    type:"pie",
    data:{
        labels: ["present", "indisponible", "absent"],
        datasets: [{
            label:"répartition des presences",
            data:[50,12,10],
            backgroundColor:["green","orange","red"],
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'taux de presence de '
            }
        }
    },
})

let tableau = document.querySelectorAll('.chartContainer');


tableau.forEach(tab=> {
    tab.querySelectorAll('td').forEach(ligne=>{
        ligne.addEventListener('click', e => {
            tab.querySelector('.tableDiv').classList.add('hide');
            tab.querySelector('.chartDiv').classList.remove('hide');
        })
    })

    tab.querySelector('.chartDiv').addEventListener('click', e => {
        tab.querySelector('.tableDiv').classList.remove('hide');
        tab.querySelector('.chartDiv').classList.add('hide');
    })

})
