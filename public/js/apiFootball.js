fetch("http://api.football-data.org/v2/competitions/FL1/standings", {
    type: "GET",
    mode:"cors",
    dataType: "json",
    headers: { 'X-Auth-Token': 'e3231490203a453ab234a06bc972b95e' }
})
    .then(response => {
        console.log(response);
        return response.json();
    }).then((classement)=>{
        console.log(classement);
    }).catch(err => {
        console.log(err);
    });

fetch("http://api.football-data.org/v2/competitions/FL1/matches", {
    type: "GET",
    mode:"cors",
    dataType: "json",
    headers: { 'X-Auth-Token': 'e3231490203a453ab234a06bc972b95e' }
})
    .then(response => {
        console.log(response);
        return response.json();
    }).then((classement)=>{
    console.log(classement);
}).catch(err => {
    console.log(err);
});
