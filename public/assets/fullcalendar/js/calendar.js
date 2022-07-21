document.addEventListener('DOMContentLoaded', function() {
    const valores = window.location.href;

    //Mostramos los valores en consola:
    console.log(valores);
    const myArray = valores.split("/");
    console.log(myArray[5])
    const dado= parseInt(myArray[5]) ;
    

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl){
            return {
                title: eventEl.innerText.trim()
            }
        }
    });


    /* initialize the calendar
    -----------------------------------------------------------------*/
    console.log(dado);
    console.log(typeof(dado));
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,timeGridDay,listWeek'
        },
        navLinks: true,
        locale: 'es',
        navLinks: true,
        eventLimit: true,
        selectable:true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(element) {

            let Event = JSON.parse(element.draggedEl.dataset.event);

            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                element.draggedEl.parentNode.removeChild(element.draggedEl);

                Event._method = "DELETE";
                sendEvent(routeEvents('routeFastEventDelete'), Event);
            }
            
            let start = moment(`${element.dateStr} ${Event.start}`).format("YYYY-MM-DD HH:mm:ss");
            let end = moment(`${element.dateStr} ${Event.end}`).format("YYYY-MM-DD HH:mm:ss");

            Event.start = start;
            Event.end = end;
            Event.id_dicta = dado;
            delete Event.id;
            delete Event._method;
            sendEvent(routeEvents('routeEventStore'), Event);
            console.log(Event);
        },
        eventDrop: function(info) {
            // alert(info.event.title + " was dropped on " + info.event.start.toISOString());
        
            // if (!confirm("Are you sure about this change?")) {
            //   info.revert();
            // }else{
                let start = moment(info.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(info.event.end).format("YYYY-MM-DD HH:mm:ss");
                let newEvent = {
                    _method:'PUT',
                    id: info.event.id,
                    title: info.event.title,
                    start: start,
                    end: end,
                    description: info.event.descripcion,
                    id_dicta: info.event.id_dicta,
                };
                sendEvent(routeEvents('routeEventUpdate'),newEvent);
            // }
          },
       
        eventClick: function(element){
            // alert('event click');
            clearMessages('.message');
            resetForm("#formEvent");

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Alterar Evento');
            $("#modalCalendar button.deleteEvent").css("display","flex");

            let id = element.event.id;
            $("#modalCalendar input[name='id']").val(id);

            let title = element.event.title;
            $("#modalCalendar input[name='title']").val(title);

            let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(end);

            let color = element.event.backgroundColor;
            $("#modalCalendar input[name='color']").val(color);

            let descripcion = element.event.extendedProps.descripcion;
            $("#modalCalendar textarea[name='descripcion']").val(descripcion);


        },
        eventResize: function(element){
            // alert('event resize');
            let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
            let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

            let newEvent = {
                _method:'PUT',
                title: element.event.title,
                id: element.event.id,
                start: start,
                end: end,
                descripcion: element.event.descripcion,
            };

            sendEvent(routeEvents('routeEventUpdate'),newEvent);
        },
        select: function(element){
            // alert('event select')
            clearMessages('.message');
            resetForm("#formEvent");
            $("#modalCalendar input[name='id']").val('');

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Adicionar Evento');
            $("#modalCalendar button.deleteEvent").css("display","none");

            let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(end);

            $("#modalCalendar input[name='color']").val("#3788D8");

            calendar.unselect();

        },
        eventReceive: function(element){
            element.event.remove();
        },
       
        
        
        // events: routeEvents('routeLoadEvents'),
        events: 'http://127.0.0.1:8000/admin/agenda/'+dado,

    });
    objCalendar = calendar;
    calendar.render();

});
// console.log(routeEvents('routeLoadEvents'));
