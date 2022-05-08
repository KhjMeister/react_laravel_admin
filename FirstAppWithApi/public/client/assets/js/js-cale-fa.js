// const sidebar = document.getElementById("external-events-list");
// const submitTask = document.getElementById("submitTask");
// const taskInput = document.getElementById("task");
// const saveCaleBtn = document.getElementById("saveCale");


// let bgColor;
// const setColor = (color) => {
//     bgColor = color;
// }

// submitTask.addEventListener("click", (e) => {
//     e.preventDefault();
//     if (taskInput.value !== "") {
//         sidebar.innerHTML += `
//         <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event' style="background-color: ${bgColor};">
//         <div class='fc-event-main'>${taskInput.value}</div>
//         </div>
//         `
//     } else {
//         alert("لطفا یک رویداد اضافه کنید")
//     }
//     taskInput.value = "";
// })

// let events = localStorage.getItem("events");
// console.log(events);

// let arratEvents;
// if (events) {
//     arratEvents = JSON.stringify(events)
// } else {
// }



document.addEventListener('DOMContentLoaded', function () {

    /* initialize the external events
    -----------------------------------------------------------------*/

    // var containerEl = document.getElementById('external-events-list');
    // new FullCalendar.Draggable(containerEl, {
    //     itemSelector: '.fc-event',
    //     eventData: function (eventEl) {
    //         return {
    //             title: eventEl.innerText.trim()
    //         }
    //     }
    // });


    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            right: 'title',
        },
        eventClick: function (info) {
            info.jsEvent.preventDefault();
            arratEvents.push(info.event);
            console.log(info);
        },
        locale: 'fa',
        selectable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        events: [
            {
                id: 'a',
                title: 'قرار کاری',
                start: '2022-04-01'
            },
            {
                id: 'a',
                title: 'قرار کاری',
                start: '2022-04-02'
            },
        ],
        eventColor: "#000",
        drop: function (arg) {
            console.log(arg);
            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        },
    });
    calendar.render();
});