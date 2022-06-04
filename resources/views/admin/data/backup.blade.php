@extends('admin._partials.app')
@section('title', 'Backup Data')
@section('headSection')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.2/plugins/daterangepicker/daterangepicker.css') }}">
@endsection
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadangkan Pengaduan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('backupdata.index') }}
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                aria-selected="true">Pengaduan</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                                aria-selected="false">Data berdasarkan jenis kasus
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                                aria-selected="false">Berdasarkan klaster</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                            aria-labelledby="custom-tabs-three-home-tab">
                            <table id="example"
                                class="table table-bordered table-striped table-hover dataTable dtr-inline text-nowrap"
                                role=grid>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Kode</th>
                                        <th>Jenis</th>
                                        <th>Pelapor</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $pengaduan)
                                    <tr>
                                        <td align="center">{{ $loop->iteration }}.</td>
                                        <td>
                                            <dt>{{ $pengaduan->kode }}</dt>
                                        </td>
                                        <td>{{ $pengaduan->jenis_kasus->nama_kasus }}</td>
                                        <td>{{ $pengaduan->pelapor->nama_p }}</td>
                                        <td>{{ $pengaduan->created_at->isoFormat('DD/MM/YYYY') }}</td>
                                        <td align="center">
                                            @if($pengaduan->is_approved == 1)
                                            <span class="badge bg-success">Diterima</span>
                                            @elseif($pengaduan->is_approved == 2)
                                            <span class="badge bg-danger">Ditolak</span>
                                            @elseif($pengaduan->is_approved == 0)
                                            <span class="badge bg-info">Belum di konfirmasi</span>
                                            @endif
                                        </td>
                                        <!-- <td class="format-date">{{ $pengaduan->created_at }}</td> -->
                                        <td align="center">
                                            @foreach($pengaduan->status as $status)
                                            {{ $status->status }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-three-profile-tab">
                            <table id="example2"
                                class="table table-bordered table-striped table-hover dataTable dtr-inline text-nowrap"
                                role=grid>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Jenis Kasus</th>
                                        <th>Pengaduan</th>
                                        <th>Non</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jenis_kasus as $kasus)
                                    <tr>
                                        <td align="center">{{ $loop->iteration }}</td>
                                        @if ($kasus->nama_kasus == 'Kejahatan Seksual')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->confirmed }}</td>
                                        <td>{{ $totals->ab }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Kekerasan Fisik')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->unconfirmed }}</td>
                                        <td>{{ $totals->ac }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Kekerasan Psikis')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->unconfirmed }}</td>
                                        <td>{{ $totals->ad }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Anak Berhadapan dengan Hukum (ABH)')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->unconfirmed }}</td>
                                        <td>{{ $totals->ae }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Trafficking')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->unconfirmed }}</td>
                                        <td>{{ $totals->af }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Hak Kuasa Asuh dan Penelantaran')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->hkap }}</td>
                                        <td>{{ $totals->ag }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Perlindungan (Pendidikan, Kesehatan, Agama,
                                        Sosial)')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->pl }}</td>
                                        <td>{{ $totals->ah }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Penculikan dan Anak Hilang')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->pah }}</td>
                                        <td>{{ $totals->ai }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Napza dan HIV/Aids')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->nh }}</td>
                                        <td>{{ $totals->aj }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Pekerja Anak')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->pa }}</td>
                                        <td>{{ $totals->ak }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Pornografi')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->pr }}</td>
                                        <td>{{ $totals->al }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Hak Sipil')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->hs }}</td>
                                        <td>{{ $totals->am }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'ABK, Politik dan Perlindungan Khusus')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->abk }}</td>
                                        <td>{{ $totals->an }}</td>
                                        @endif
                                        @if ($kasus->nama_kasus == 'Konsultasi dll')
                                        <td>
                                            {{ $kasus->nama_kasus }}
                                        </td>
                                        <td>{{ $totals->ksl }}</td>
                                        <td>{{ $totals->ao }}</td>
                                        @endif
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> --}}
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                            aria-labelledby="custom-tabs-three-messages-tab">
                            <table id="example3"
                                class="table table-bordered table-striped table-hover dataTable dtr-inline text-nowrap display"
                                role=grid>
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" rowspan="2">#</th>
                                        <th rowspan="2" class="align-middle">Klaster/Bidang</th>
                                        <th style="border: 0cm">
                                            Tahun
                                        </th>
                                    </tr>
                                    <tr>
                                        @foreach ($totals as $total)
                                        <th> {{ $total->year }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_kasus as $kasus)
                                    <tr>
                                        <td align="center">{{ $loop->iteration }}.</td>
                                        <td>{{ $kasus->nama_kasus }}</td>
                                        @foreach ($totals as $total)
                                        <td>
                                            @if ($kasus->id == 14)
                                            {{ $total->ksl }}
                                            @endif
                                            @if ($kasus->id == 13)
                                            {{ $total->abk }}
                                            @endif
                                            @if ($kasus->id == 12)
                                            {{ $total->kf }}
                                            @endif
                                            @if ($kasus->id == 11)
                                            {{ $total->pr }}
                                            @endif
                                            @if ($kasus->id == 10)
                                            {{ $total->pa }}
                                            @endif
                                            @if ($kasus->id == 9)
                                            {{ $total->nap }}
                                            @endif
                                            @if ($kasus->id == 8)
                                            {{ $total->pen }}
                                            @endif
                                            @if ($kasus->id == 7)
                                            {{ $total->per }}
                                            @endif
                                            @if ($kasus->id == 6)
                                            {{ $total->hka }}
                                            @endif
                                            @if ($kasus->id == 5)
                                            {{ $total->tr }}
                                            @endif
                                            @if ($kasus->id == 4)
                                            {{ $total->abh }}
                                            @endif
                                            @if ($kasus->id == 3)
                                            {{ $total->kp }}
                                            @endif
                                            @if ($kasus->id == 2)
                                            {{ $total->kf }}
                                            @endif
                                            @if ($kasus->id == 1)
                                            {{ $total->ks }}
                                            @endif
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center align-middle"></th>
                                        <th class="align-middle">Jumlah</th>
                                        @foreach ($totals as $total)
                                        <th> {{ $total->total }}</th>
                                        @endforeach
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footerSection')
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.2/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": false,
        "paging": true,
        "info": true,
        "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": false,
        "paging": true,
        "info": true,
        "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": false,
        "paging": true,
        "info": true,
        "buttons": [
            {extend: 'excelHtml5',
            title: 'DATA KASUS ANAK BERDASARKAN KLASTER',
            messageTop: 'this.chnageDataTableMessageTop()',
   

        }]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
});

</script>
<script type="text/javascript">
    //fungsi untuk filtering data berdasarkan tanggal 
    var start_date;
    var end_date;
    var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
       var dateStart = parseDateValue(start_date);
       var dateEnd = parseDateValue(end_date);
       var evalDate= parseDateValue(aData[4]);
         if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
              ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
              ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
              ( dateStart <= evalDate && evalDate <= dateEnd ) )
         {
             return true;
         }
         return false;
   });
 
   
   function parseDateValue(rawDate) {
       var dateArray= rawDate.split("/");
       var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  
       return parsedDate;
   }    
 
   $( document ).ready(function() {
    var $dTable = $('#example').DataTable({
     "dom": "<'row'<'col-sm-4'B><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
       "<'row'<'col-sm-12'tr>>" +
       "<'row'<'col-sm-5'i><'col-sm-7'p>>",
       "buttons": ["copy", "excel", "pdf", "print"]
    });
 
    $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');
 
    document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";
 
    $('#datesearch').daterangepicker({
       autoUpdateInput: false
     });
 
     $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        start_date=picker.startDate.format('DD/MM/YYYY');
        end_date=picker.endDate.format('DD/MM/YYYY');
        $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
        $dTable.draw();
     });
 
     $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
       $(this).val('');
       start_date='';
       end_date='';
       $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
       $dTable.draw();
     });
   });
</script>
@endsection