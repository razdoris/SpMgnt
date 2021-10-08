let canvasAssiduityMatch = document.querySelector("#canvasAssiduityMatch");
let canvasAssiduityPractice = document.querySelector("#canvasAssiduityPractice");

function createChartMatch(nom, presence, absence, indisponible){
    let data = [presence, absence, indisponible]
    return new Chart(canvasAssiduityMatch, {
        type: "pie",
        data: {
            labels: ["present", "indisponible", "absent"],
            datasets: [{
                label: "répartition des presences",
                data: data,
                backgroundColor: ["green", "orange", "red"],
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
                    text: 'taux de presence de ' + nom
                }
            }
        },
    })
}


function createChartPractice(nom, presence, absence, indisponible){
    return new Chart(canvasAssiduityPractice,{
        type:"pie",
        data:{
            labels: ["present", "indisponible", "absent"],
            datasets: [{
                label:"répartition des presences",
                data:[presence,absence,indisponible],
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
                    text: 'taux de presence de ' + nom
                }
            }
        },
    })
}


let tableau = document.querySelectorAll('.chartContainer');


tableau.forEach(tab=> {
    tab.querySelectorAll('tr').forEach(ligne=>{
        ligne.addEventListener('click', e => {
            nom = ligne.querySelector('.nomeMatchPractice').innerHTML;
            presence = ligne.querySelector('.presenceMatchPractice').innerHTML;
            absence = ligne.querySelector('.absenceMatchPractice').innerHTML;
            indisponibilite = ligne.querySelector('.indispoMatchPractice').innerHTML;
            console.log(ligne)
            if(ligne.classList.contains('ligneMatch')){
                chartMatch = createChartMatch(nom,presence,absence,indisponibilite)
                console.log(chartMatch);
            }else{
                chartPractice = createChartPractice(nom,presence,absence,indisponibilite)
                console.log(chartPractice);
            }
            tab.querySelector('.tableDiv').classList.add('hide');
            tab.querySelector('.chartDiv').classList.remove('hide');
        })
    })

    tab.querySelector('.chartDiv').addEventListener('click', e => {
        tab.querySelector('.tableDiv').classList.remove('hide');
        tab.querySelector('.chartDiv').classList.add('hide');
        console.log(tab)
        if(tab.querySelector('.chartDiv').classList.contains('chartDivMatch')){
            chartMatch.destroy();
        }else{
            chartPractice.destroy();
        }
    })

})
