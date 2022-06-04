@extends('admin._partials.app')
@section('title', 'Jadwal Kegiatan')
@section('headSection')
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar/main.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-daygrid/main.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-timegrid/main.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-bootstrap/main.min.css') }}">
@endsection

@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Jadwal Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('kegiatan.index') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Events</h4>
                        </div>
                        <div class="card-body">
                            <!-- the events -->
                            <div id="external-events">

                                @if($fastEvents)
                                    @foreach($fastEvents as $fastEvent)
                                        <div style="border:1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                                            class="external-event"
                                            data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                                            {{ $fastEvent->title }}</div>
                                    @endforeach
                                @endif

                                <div class="checkbox">
                                    <label for="drop-remove">
                                        <input type="checkbox" id="drop-remove" />
                                        remove after drop
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Event</h3>
                        </div>
                        <div class="card-body">
                            <!-- /btn-group -->
                            <div class="input-group">
                                <button class="btn btn-flat btn-success" id="newFastEvent">Create Event</button>
                                <!-- /btn-group -->
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar" data-route-load-events="{{ route('routeLoadEvents') }}"
                            data-route-event-update="{{ route('routeEventUpdate') }}"
                            data-route-event-store="{{ route('routeEventStore') }}"
                            data-route-event-delete="{{ route('routeEventDelete') }}"
                            data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
                            data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
                            data-route-fast-event-store="{{ route('routeFastEventStore') }}"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Modal -->
            <div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleModal">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="message"></div>
                            <form id="formEvent">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title">
                                        <input type="hidden" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start" class="col-sm-2 col-form-label">Tanggal/Waktu Mulai</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control date-time" id="start">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end" class="col-sm-2 col-form-label">Tanggal/Waktu Selesai</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control date-time" id="end">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="color" class="col-sm-2 col-form-label">Warna Kegiatan</label>
                                    <div class="col-sm-10">
                                        <input type="color" name="color" class="form-control" id="color">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" class="form-control" rows="4"
                                            cols="40"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger deleteEvent">Delete</button>
                            <button type="button" class="btn btn-primary saveEvent">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal fastEvents-->
            <div class="modal fade" id="modalFastEvent" tabindex="-1" role="dialog" aria-labelledby="titleModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleModal">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="message"></div>
                            <form id="formFastEvent">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title">
                                        <input type="hidden" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start" class="col-sm-2 col-form-label">Tanggal/Waktu Mulai</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control time" id="start">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end" class="col-sm-2 col-form-label">Tanggal/Waktu Selesai</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control time" id="end">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="color" class="col-sm-2 col-form-label">Warna Kegiatan</label>
                                    <div class="col-sm-10">
                                        <input type="color" name="color" class="form-control" id="color">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger deleteFastEvent">Delete</button>
                            <button type="button" class="btn btn-primary saveFastEvent">Save</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection

@section('footerSection')
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('AdminLTE-3.0.2/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-interaction/main.min.js') }}">
</script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
<script
    src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-ori/packages/core/locales-all.js') }}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    let objCalendar;

</script>

<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-ori/js/script.js') }}"></script>
<script type="text/javascript">
    $(function () {
        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
        -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function (eventEl) {
                console.log(eventEl);
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                        'background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                        'background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'bootstrap'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locale: 'id',
            navLinks: true,
            eventLimit: true,
            selectable: true,
            editable: true,
            droppable: true,
            drop: function (element) {
                let Event = JSON.parse(element.draggedEl.dataset.event);

                if (document.getElementById('drop-remove').checked) {
                    element.draggedEl.parentNode.removeChild(element.draggedEl);

                    Event._method = "DELETE";
                    sendEvent(routeEvents('routeFastEventDelete'), Event);
                }

                let start = moment(`${element.dateStr} ${Event.start}`).format(
                    "YYYY-MM-DD HH:mm:ss");
                let end = moment(`${element.dateStr} ${Event.end}`).format("YYYY-MM-DD HH:mm:ss");

                Event.start = start;
                Event.end = end;

                delete Event.id;
                delete Event._method;

                sendEvent(routeEvents('routeEventStore'), Event);
                console.log(Event);
            },
            eventDrop: function (element) {
                let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

                let newEvent = {
                    _method: 'PUT',
                    title: element.event.title,
                    id: element.event.id,
                    start: start,
                    end: end
                };

                sendEvent(routeEvents('routeEventUpdate'), newEvent);
            },
            eventClick: function (element) {
                clearMessages('.message');
                resetForm("#formEvent");

                $("#modalCalendar").modal('show');
                $("#modalCalendar #titleModal").text('Ubah Kegiatan');
                $("#modalCalendar button.deleteEvent").css("display", "flex");

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
            eventResize: function (element) {
                let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

                let newEvent = {
                    _method: 'PUT',
                    id: element.event.id,
                    start: start,
                    end: end
                };

                sendEvent(routeEvents('routeEventUpdate'), newEvent);
            },
            select: function (element) {
                clearMessages('.message');
                resetForm("#formEvent");

                $("#modalCalendar").modal('show');
                $("#modalCalendar #titleModal").text('Tambah Kegiatan');
                $("#modalCalendar button.deleteEvent").css("display", "none");

                let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
                $("#modalCalendar input[name='start']").val(start);

                let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
                $("#modalCalendar input[name='end']").val(end);

                $("#modalCalendar input[name='color']").val("#3788D8");

                calendar.unselect();
            },
            eventReceive: function (element) {
                element.event.remove();
            },
            events: routeEvents('routeLoadEvents'),

        });
        objCalendar = calendar;
        calendar.render();

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function (e) {
            e.preventDefault()
            let id = $("#modalFastEvent input[name='id']").val();
            let title = $("#new-event").val();

            let Event = {
                title: title,
            };

            let route;

            if (id == '') {
                route = routeEvents('routeFastEventStore');
            } else {
                route = routeEvents('routeFastEventUpdate');
                Event.id = id;
                Event._method = 'PUT';
            }

            sendEvent(route, Event);
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)

            //Add draggable funtionality
            ini_events(event)

            //Remove event from text input
            $('#new-event').val('')
        })
    });

</script>
@endsection
