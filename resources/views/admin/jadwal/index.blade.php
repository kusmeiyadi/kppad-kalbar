@extends('admin._partials.app')
@section('title', 'Jadwal Kegiatan')
@section('headSection')
<link href="{{url(mix('assets/fullcalendarNPM/css/fullcalendar.css'))}}" rel='stylesheet' />
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-daygrid/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-timegrid/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-bootstrap/main.min.css') }}">
@endsection

@section('main-content')
@include('admin.jadwal.modais.events')
@include('admin.jadwal.modais.fastEvents')
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
                            <div id='external-events'>
                                <div id='external-events-list'>
                                    @isset($fastEvents)
                                    @forelse($fastEvents as $fastEvent)
                                    <div id="boxFastEvent{{ $fastEvent->id }}"
                                        style="border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                                        class='external-event event'
                                        data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                                        {{ $fastEvent->title }}
                                    </div>
                                    @empty
                                    <p>Tidak ada data</p>
                                    @endforelse
                                    @endisset
                                </div>
                                <p>
                                    <input type='checkbox' id='drop-remove' />
                                    <label for='drop-remove'>remove after drop</label>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Event</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-sm btn-success" id="newFastEvent"
                                style="font-size: 1em; width: 100%;">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id='calendar' data-route-load-events="{{ route('routeLoadEvents') }}"
                            data-route-event-update="{{ route('routeEventUpdate') }}"
                            data-route-event-store="{{ route('routeEventStore') }}"
                            data-route-event-delete="{{ route('routeEventDelete') }}"
                            data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
                            data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
                            data-route-fast-event-store="{{ route('routeFastEventStore') }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('footerSection')
<script src="{{ asset('AdminLTE-3.0.2/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-interaction/main.min.js') }}">
</script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/fullcalendar-ori/packages/core/locales-all.js') }}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="{{asset('assets/fullcalendarNPM/js/fullcalendar.js')}}"></script>
<script src="{{asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')}}"></script>
<script src="{{asset('assets/fullcalendarNPM/js/scriptCalendar.js')}}"></script>
<script src="{{asset('assets/fullcalendarNPM/js/bootstrap.js')}}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection