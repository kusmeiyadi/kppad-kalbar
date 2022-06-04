$(function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText.trim()
            }
        }
    });

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list','bootstrap'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        locale:'id',
        navLinks: true,
        eventLimit: true,
        selectable:true,
        editable: true,
        droppable: true,
        drop: function(element) {
            let Event = JSON.parse(element.draggedEl.dataset.event);

            if (document.getElementById('drop-remove').checked) {
                element.draggedEl.parentNode.removeChild(element.draggedEl);

                Event._method = "DELETE";
                sendEvent(routeEvents('routeFastEventDelete'),Event);
            }

            let start = moment(`${element.dateStr} ${Event.start}`).format("YYYY-MM-DD HH:mm:ss");
            let end = moment(`${element.dateStr} ${Event.end}`).format("YYYY-MM-DD HH:mm:ss");

            Event.start = start;
            Event.end = end;

            delete Event.id;
            delete Event._method;

            sendEvent(routeEvents('routeEventStore'),Event);
            console.log(Event);
        },
        eventDrop: function(element){
          let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
          let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

          let newEvent = {
            _method:'PUT',
            title:element.event.title,
            id: element.event.id,
            start: start,
            end: end
          };

          sendEvent(routeEvents('routeEventUpdate'),newEvent);
        },
        eventClick: function(element){
          clearMessages('.message');
          resetForm("#formEvent");

          $("#modalCalendar").modal('show');
          $("#modalCalendar #titleModal").text('Ubah Kegiatan');
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

          let description = element.event.extendedProps.description;
          $("#modalCalendar textarea[name='description']").val(description);
        },
        eventResize: function(element){
          let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
          let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

          let newEvent = {
            _method:'PUT',
            id: element.event.id,
            start: start,
            end: end
          };

          sendEvent(routeEvents('routeEventUpdate'),newEvent);
        },
        select: function(element){
          clearMessages('.message');
          resetForm("#formEvent");

          $("#modalCalendar").modal('show');
          $("#modalCalendar #titleModal").text('Tambah Kegiatan');
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
        events: routeEvents('routeLoadEvents'),

    });
    objCalendar = calendar;
    calendar.render();

});
