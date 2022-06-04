@extends('admin._partials.app')
@section('title', 'Log Aktifitas')
@section('main-content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Log Aktifitas Sistem</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          {{ Breadcrumbs::render('activity-log.index') }}
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="timeline">
          @foreach ($activities as $day => $appointments)
          <div class="time-label">
            @if ($day <= 6) <span class="bg-teal">{{ $day }}</span>
              @elseif ($day <= 11) <span class="bg-navy">{{ $day }}</span>
                @elseif ($day <= 16) <span class="bg-purple">{{ $day }}</span>
                  @elseif ($day <= 21) <span class="bg-maroon">{{ $day }}</span>
                    @elseif ($day <= 26) <span class="bg-teal">{{ $day }}</span>
                      @elseif ($day <= 31) <span class="bg-olive">{{ $day }}</span>
                        @endif
          </div>
          @foreach($appointments as $appointment)
          <div>
            @if ( $appointment->log_name === 'admin' )
            <i class="fas fa-user bg-red"></i>
            @elseif ( $appointment->subject_type === 'App\Models\User\Pengaduan' )
            <i class="fas fa-newspaper bg-purple"></i>
            @endif
            <div class="timeline-item">
              <span class="time format-date"><i class="fas fa-clock"></i> {{ $appointment->updated_at->format('H:i a')
                }}</span>
              @foreach($appointment->properties as $description)
              <h3 class="timeline-header no-border">
                {{-- <a href="#">{{ $appointment->causer['name'] }}</a> --}}
                @if ( $appointment->log_name === 'admin' )
                telah membuat {{ $description['name'] }}
                @elseif ( $appointment->subject_type === 'App\Models\User\Pengaduan' )
                Pengaduan telah diadukan oleh <a href="#">{{ $description['pengaduan.pelapor.nama_p'] }}</a>
                @elseif ( $appointment->subject_type === 'App\Models\User\Status' )
                Pengaduan telah diadukan oleh <a href="#">{{ $description['pengaduan.pelapor.nama_p'] }}</a>
                @endif
              </h3>
              <div class="timeline-body">
                @if ( $appointment->subject_type === 'App\Models\User\Status' )
                {{ $description['pengaduan.kronologi'] }}
                {{ str_limit(strip_tags($description['pengaduan.kronologi']), 9) }}
                @if (strlen(strip_tags($description['pengaduan.kronologi'])) > 9)
                ... <a href="#">Selengkapnya</a>
                @endif
                @endif
              </div>
              <div class="timeline-footer">
                @if ( $appointment->subject_type === 'App\Models\User\Pengaduan' )
                <a class="btn btn-primary btn-sm">Read more</a>
                <a class="btn btn-danger btn-sm">Delete</a>
                @endif
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footerSection')
<script>
  if ($('.format-date').length > 0) {
    $('.format-date').each(function() {
        var ini = $(this);
        var tgl = ini.text();
        //moment.locale('id');
        if (moment(tgl, 'YYYY-MM-DD', true).isValid() || moment(tgl, 'YYYY-MM-DD HH:mm:ss', true).isValid()) {
              var formatTgl = moment(tgl).format('LL');
            ini.html(formatTgl);
        }
    });
}
</script>
@endsection