@extends('user._partials.app')
@section('title','Regulasi Anak')
@section('main-content')
<script src="{{ asset('PDFJSExpress/lib/webviewer.min.js') }}"></script>
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ route('user.beranda') }}" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>
            <a href="#" class="breadcrumb-item f1-s-3 cl9">
                Regulasi Anak
            </a>
        </div>
    </div>
</div>
<section class="bg12 p-b-60 p-t-10">
    <div class="container">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="badge badge-danger">
                        <a class="cl0 hov-cl1" href="{{ route('regulasi.show',$regulasi->id) }}">{{
                            $regulasi->kategori }}</a>
                    </div>
                    <h2 class="f2-l-1 card-title">{{ $regulasi->deskripsi }}</h2>
                    <p class="f2-s-3 card-text">Diupload oleh <strong>{{ $regulasi->upload_by }} </strong> - <span>{{
                            $regulasi->created_at->isoFormat('D MMMM Y') }}</span></p>
                    <p class="f1-s-13 card-text"> Unduh : <a href="{{ route('regulasi.download', $regulasi->slug) }}">{{
                            $regulasi->deskripsi }}
                        </a>
                    </p>
                </div>
                <div class="card-body">
                    <div class="embed-responsive p-b-5">
                        <div id='viewer' class="embed-responsive" style='width: 1024px; height: 900px; margin: 0 auto;'>
                        </div>
                    </div>
                    <p class="card-text">
                        Label:
                        <a href="#" class="cl8 hov-cl1">
                            {{ $regulasi->kategori }}
                        </a>
                    </p>
                    <p class="card-text cl5">
                        Bagikan:
                    <div class="flex-wr-s-s size-w-0">
                        <a href="http://www.facebook.com/sharer.php?u=http://localhost:8000/regulasi-anak/{{ $regulasi->slug }}"
                            target="_blank"
                            class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 trans-03">
                            <i class="fab fa-facebook-f m-r-7"></i>
                            Facebook
                        </a>
                    </div>
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-6">
                            @if (isset($previous))
                            <a class="f1-s-12 cl5 hov-cl1" href="{{ url('regulasi-anak/'.$previous->slug) }}">
                                <div class="btn-content">
                                    <div class="btn-content-title"> Sebelumnya </div>
                                    <p class="btn-content-subtitle">{{ $previous->deskripsi }}</p>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if (isset($next))
                            <a class="f1-s-12 cl5 hov-cl1" href="{{ url('$regulasi-anak'.$next->slug) }}">
                                <div class="btn-content float-right text-right">
                                    <div class="btn-content-title"> Selanjutnya </div>
                                    <p class="btn-content-subtitle">{{ $next->deskripsi }}</p>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    WebViewer({
        path: '{{ asset("PDFJSExpress/lib") }}',
        licenseKey: 'Insert commercial license key here after purchase',
        initialDoc: '{{ asset("/AdminLTE-3.0.2/dist/file/regulasi/".$regulasi->file) }}',
    }, document.getElementById('viewer'))
    .then(instance => {
        const { docViewer, annotManager } = instance;
        // call methods from instance, docViewer and annotManager as needed
        var FitMode = instance.FitMode;
        instance.setFitMode(FitMode.FitPage);
        var LayoutMode = instance.LayoutMode;
        instance.setLayoutMode(LayoutMode.Single);
        // you can also access major namespaces from the instance as follows:
        // const Tools = instance.Tools;
        // const Annotations = instance.Annotations;
        instance.setTheme('dark');
        instance.disableElements(['header']);
        instance.disableTools();

        docViewer.on('documentLoaded', () => {
            // call methods relating to the loaded document
        });
    });

</script>
@endsection