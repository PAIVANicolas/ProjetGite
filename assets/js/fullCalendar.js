var calendar;
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');



    var toolbarOptions;
    if (window.innerWidth < 768) {
        toolbarOptions = {
            left: 'prev,next',
            center: 'title',
            right: ''
        };
    } else {
        toolbarOptions = {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
            locale: 'fr'
        };
    }


    calendar = new FullCalendar.Calendar(calendarEl, {
        eventClick: function(info) {
            var confirmDelete = confirm("Voulez-vous supprimer cette réservation ?");
            if (confirmDelete) {
                deleteEvent(info.event.id);
            }
        },
        locale: 'fr',
        initialView: 'timeGridWeek',
        headerToolbar: toolbarOptions,
        eventOverlap: true,
        allDaySlot: false,
        buttonText: {
            today : 'aujourd\'hui',
            day : 'jour',
            month:'mois',
            week : 'semaine',
        },
        events: eventsData, height: 'auto',
        contentHeight: 'auto',
        aspectRatio: 1.8,


        windowResize: function(view, element) {
            if (window.innerWidth < 768) {
                calendar.changeView('timeGridDay');
            } else {
                calendar.changeView('timeGridWeek');
            }
        }
    });

    calendar.render();
});

