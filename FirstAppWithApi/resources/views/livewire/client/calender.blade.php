<div class="content">
    <section>
    
        <div id='calendar'></div>

        
    </section>

@push('scripts')
<script src="{{ asset('client/assets/js/main.js') }}"></script>
<script>

document.addEventListener('DOMContentLoaded', function () {
    let myobj = @js($allsessions);
    
        myobj.forEach(element => {
            console.log(element.id,element.name,element.start_date)
        });

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
        droppable: true, 
        
        events: [
            {
                id: 'a',
                title: 'جلسه استانداری',
                start: '2022-05-24'
            },
            
        ],
        eventColor: "#ff4a4f",
        drop: function (arg) {
            console.log(arg);
            
            if (document.getElementById('drop-remove').checked) {
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        },
    });
    calendar.render();

    })

</script>
@endpush
</div>