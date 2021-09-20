headerTrigger = document.querySelector('#headerPrincipal');

headerTrigger.addEventListener('click', event=>{
    //console.log(event);
    headerTrigger.children[1].classList.toggle('hide')
})


navTrigger = document.querySelector('.commandeSwitchMenuNavigation');

navTrigger.addEventListener('click', (event)=>{
    document.querySelector('#navBar').classList.toggle('hide');
    if(!document.querySelector('#navBar').classList.contains('hide')){
        navTrigger.innerHTML = '<svg width="2.2em" height="2.2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>'
    }else{
        navTrigger.innerHTML = '<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>'
    }

})
