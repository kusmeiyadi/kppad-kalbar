@extends('admin._partials.app')
@section('title', 'Dashboard')
@section('main-content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('admin.dashboard') }}
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-edit"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total pengaduan</span>
                        <span class="info-box-number">
                            {{$pengaduan}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Belum verifikasi</span>
                        <span class="info-box-number">{{ $approved }}</span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengaduan selesai</span>
                        <span class="info-box-number">{{ $finish }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengaduan berdasarkan jenis kasus</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="canvas" height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div id="do_legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('footerSection')
<script src="{{ asset('AdminLTE-3.0.2/plugins/chart.js/Chart.min.js') }}"></script>
<script>
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var configd = {
    type: 'doughnut',
    data: {
        datasets: [{
            data: cData.data,       
            backgroundColor: [
                '#33b35a',
                "#ffce56",
                "#4bc0c0",
                "#CDDC39",
                "#9C27B0",
                "#fb7145",
                "#5971f9"
            ],
            label: 'Energy usage'
        }],
        labels: cData.label
    },
    options: {
        responsive: true,
        legend: {
            display: false
        },
        legendCallback: function (chart) {             
            console.log(chart.data.datasets);
            var text = [];
            text.push('<ul class="' + chart.id + ' chart-legend clearfix">');
            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                text.push('<li onclick="updateDataset(event, ' + '\'' + i + '\'' + ')"><i class="far fa-circle" style="color:' + chart.data.datasets[0].backgroundColor[i] + '" ></i> ');
                if (chart.data.labels[i]) {
                    text.push(chart.data.labels[i]);
                }
                text.push('</span></li>');
            }
            text.push('</ul>');
            return text.join("");
        },
        title: {
            display: false,
            text: 'Chart.js Doughnut Chart'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        },
    }
};

 var ctxd = document.getElementById('canvas').getContext('2d');
    
    window.myDoughnut = new Chart(ctxd, configd);
    $("#do_legend").html(window.myDoughnut.generateLegend());

updateDataset = function (e, datasetIndex) {    
    var index = datasetIndex;
    var ci = e.view.myDoughnut;
    var meta = ci.getDatasetMeta(0);    
    var result= (meta.data[datasetIndex].hidden == true) ? false : true;
    if(result==true)
    {
        meta.data[datasetIndex].hidden = true;
        $('#' + e.path[0].id).css("text-decoration", "line-through");
    }else{
        $('#' + e.path[0].id).css("text-decoration","");
        meta.data[datasetIndex].hidden = false;
    }
     
    ci.update();   
};
</script>
@endsection