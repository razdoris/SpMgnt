

    let calendarDiv = document.querySelector("#mainCalendar");
    let calendarDiv2 = document.querySelector("#calendarCalendar");

    if(calendarDiv != null)
    {
        calendar = new FullCalendar.Calendar(calendarDiv, {
            initialView: 'dayGridMonth',
            locale:"fr",
            timeZone: 'Europe/Paris',
            firstDay: 1,
            headerToolbar:{
                start:'',
                center:'title',
                end:'prev,today,next',

            },
            buttonText: {
                today: 'maintenant'
            }
        })
    }
    else
    {
        calendar = new FullCalendar.Calendar(calendarDiv2, {
            initialView: 'dayGridMonth',
            locale:"fr",
            timeZone: 'Europe/Paris',
            firstDay: 1,
            headerToolbar:{
                start:'',
                center:'title',
                end:'prev,today,next',

            },
            buttonText: {
                today: 'maintenant'
            }
        })
    }


    calendar.render()

