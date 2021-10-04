headerTrigger = document.querySelector('#headerPrincipal');
burgerTrigger = document.querySelector('#burgerMenu')

headerTrigger.addEventListener('click', e=>{
    //console.log(e);
    headerTrigger.children[1].classList.toggle('hide')
})

burgerTrigger.addEventListener('click', e=>{
    document.querySelectorAll('.navGroupe').forEach(elt=>{
        elt.classList.toggle('navGroupeShow')
        }

    )

})

