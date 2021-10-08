/*
* call in calendar
* todo change the page who call this methode
*/


let urlApiExtern = "http://api.football-data.org/v2/competitions/FL1/"
let urlApiIntern = window.location.origin + "/SpMgnt/public/api/"
    //todo remove "/SpMgnt/public/" in prod


/**
 * function that create the standings for the current season
 * use the external api "http://api.football-data.org" to obtain information
 * create a club object and call creatOrMajClubInStandingDataBase function
 */
function createOrMajStanding() {
    let urlEnd = "standings"
    fetch(urlApiExtern+urlEnd, {
        type: "GET",
        mode: "cors",
        dataType: "json",
        headers: {'X-Auth-Token': 'e3231490203a453ab234a06bc972b95e'}
    })
        .then(response => {
            return response.json();
        }).then((valeurBrut) => {
            let currentMatchDay = valeurBrut.season.currentMatchday;
            console.log("currentMatchDay: " + currentMatchDay);
            let classement = valeurBrut.standings[0].table;
            let classementArray = []
            for (var i = 0; i < classement.length; i++) {
                club = {
                    position: classement[i].position,
                    equipe: classement[i].team.name,
                    logo: classement[i].team.crestUrl,
                    points: classement[i].points,
                    played: classement[i].playedGames,
                    won: classement[i].won,
                    lost: classement[i].lost,
                    draw: classement[i].draw,
                    goalFor: classement[i].goalsFor,
                    goalAgainst: classement[i].goalsAgainst,
                    idApi: classement[i].team.id
                }
                creatOrMajClubInStandingDataBase(club);
            }
        console.log(classementArray)
        }).catch(err => {
            console.log(err);
        });
}

/**
 * call by createOrMajStanding
 * add or modify club in standing database
 * @param {object}team object who contains important information about club that we went add in database
 * use an internal api
 */
function creatOrMajClubInStandingDataBase(team){
    let url = new URL(urlApiIntern + "majClub")
    //console.log(url)
    url.search = new URLSearchParams(team).toString()

    fetch(url)
        .then(retour => {
            //console.log(retour);

        }).catch(err => {
        console.log(err);
    });
}


/**
 * function that create the list of match results for the current season
 * since last day of match until today
 * use the external api "http://api.football-data.org" to obtain informations
 * create a match object and persist data in database using internal api call.
 * use an internal api call in order to obtain the last day of match
 * for don't creat a match who already exist in database
 *
 */
async function createOrMajMatch() {
    let date = new Date;
    let year = date.getFullYear();
    let month = numberformat(date.getMonth() + 1);
    let day = numberformat(date.getDate());
    let aujourdhui = year+"-"+month+"-"+day;
    dayLastMatch = await getLastDayOfMatch(year);
    console.log("date in main" + dayLastMatch);
    let urlTotal = new URL(urlApiExtern + "matches");
    let dates = {
        dateFrom:dayLastMatch,
        dateTo:aujourdhui
    };
    urlTotal.search = new URLSearchParams(dates).toString();
    fetch(urlTotal, {
        type: "GET",
        mode: "cors",
        dataType: "json",
        headers: {'X-Auth-Token': 'e3231490203a453ab234a06bc972b95e'}
    })
        .then(response => {
            return response.json();
        })
        .then((match) => {
            allMatches=match.matches;
            console.log(allMatches);
            for (var j = 0; j < allMatches.length; j++) {
                newMatch = {
                    awayTeam: allMatches[j].awayTeam.id,
                    awayTeamGoal: allMatches[j].score.fullTime.awayTeam,
                    homeTeam: allMatches[j].homeTeam.id,
                    homeTeamGoal: allMatches[j].score.fullTime.homeTeam,
                    idApi: allMatches[j].id,
                    matchDay: allMatches[j].matchday,
                    dateDay: (allMatches[j].utcDate).substring(0, 10)
                }
                console.log(newMatch);
                let urlAdd = new URL(urlApiIntern + "addMatch")
                urlAdd.search = new URLSearchParams(newMatch).toString()
                fetch(urlAdd)
                    .then(response=>{
                        console.log(response);
                    })
                    .catch(err=>{
                        console.log("ereur dans l'ajout du match"+ err)
                    })
            }
        })
        .catch(err => {
            console.log(err);
        });
}


/**
 * function that return a promise with the last day of a match was played before today
 * @param year current year
 * @return {Promise<any>} promise with the date
 */
async function getLastDayOfMatch(year){
    let urlLastMatch = new URL(urlApiIntern + "lastMatchDay")
    return fetch(urlLastMatch)
        .then(response=>{
            return response.json()
        })
        .then(lastDayMatch=>{
            dayLastMatch = lastDayMatch.lastDay[0][1];
            if(dayLastMatch == null){
                dayLastMatch = year + '-08-01'
            }
            console.log("date in async" + dayLastMatch)
            return dayLastMatch
        })
        .catch(err => {
            console.log("erreur dans la recuperation du derneir jour de match." + err);
        })
}

/**
 * add a 0 before number under 10
 * @param number(int) the month or day number
 * @return {string} creat by the number and a 0 if the number is under ten
 */
function numberformat(number){
    if(number<10)
    {
        number="0" + number;
    }
    return number;
}

//createOrMajStanding()
createOrMajMatch().then(response=>{})



