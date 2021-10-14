let tableau = document.querySelectorAll('.chartContainer');


tableau.forEach(tab=> {
    tab.querySelectorAll('tr').forEach(ligne=>{
        ligne.addEventListener('click', e => {
            let nom = ligne.querySelector('.nomeMatchPractice').innerHTML;
            let presence = ligne.querySelector('.presenceMatchPractice').innerHTML;
            let absence = ligne.querySelector('.absenceMatchPractice').innerHTML;
            let indisponibilite = ligne.querySelector('.indispoMatchPractice').innerHTML;
            console.log(ligne)
            let canvasAssiduity = document.querySelector("#canvasAssiduityMatch");
            if(ligne.classList.contains('ligneMatch')){
                chartMatch = createChart(nom,presence,absence,indisponibilite, canvasAssiduity)
                console.log(chartMatch);
            }else{
                canvasAssiduity = document.querySelector("#canvasAssiduityPractice");
                chartPractice = createChart(nom,presence,absence,indisponibilite, canvasAssiduity)
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


/**
 *
 * @param nom
 * @param presence
 * @param absence
 * @param indisponible
 * @param canvasAssiduity
 * @return {Chart}
 */
function createChart(nom, presence, absence, indisponible, canvasAssiduity){
    let data = [presence, absence, indisponible]
    return new Chart(canvasAssiduity, {
        type: "doughnut",
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

