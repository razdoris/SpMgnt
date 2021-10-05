headerTrigger = document.querySelector('#headerPrincipal');
burgerTrigger = document.querySelector('#burgerMenu');
rankingTrigger = document.querySelectorAll('input[name="rankingView"]');


console.log("test" + rankingTrigger);

headerTrigger.addEventListener('click', e=>{
    //console.log(e);
    headerTrigger.children[1].classList.toggle('hide')
})

if(burgerTrigger != null)
{
    burgerTrigger.addEventListener('click', e=>{
        document.querySelectorAll('.navGroupe').forEach(elt=>{
                elt.classList.toggle('navGroupeShow')
            }

        )

    })
}

if(rankingTrigger != null)
{
    rankingTrigger.forEach(radio=>{
        radio.addEventListener('change', e=>{
            console.log(radio.value)
            if(radio.value == "firstTeamRanking")
            {
                document.querySelector('#firstTeamRanking').classList.remove('hide');
                document.querySelector('#allTeamRanking').classList.add('hide');
            }
            else
            {
                document.querySelector('#firstTeamRanking').classList.add('hide');
                document.querySelector('#allTeamRanking').classList.remove('hide');
            }
        })
    })

}

