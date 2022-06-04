@extends('user._partials.app')
@section('title','Tabulasi Data')
@section('main-content')
<style>
    .ribbon {
        display: block;
        overflow: hidden;
    }

    .ribbon span {
        text-align: center;
        display: block;
        background-color: #ea4335;
        position: absolute;
        color: #fff;
        -webkit-transform: none;
        transform: none;
        bottom: 91px;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
</style>
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="index.html" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <a href="blog-list-01.html" class="breadcrumb-item f1-s-3 cl9">
                Tabulasi Data
            </a>
        </div>
    </div>
</div>
<section class="bg0 p-b-60 p-t-10">
    <div class="bg-img1 size-a-18 how-overlay1"
        style="background-image: url( {{ asset('magnews2/images/blog-detail-01.jpg') }} );">
    </div>
    <div class="container p-t-82">
        <div class="row justify-content-center text-center">
            <div class="col-md-10 col-lg-12">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-0">
                        <p class="f1-m-6 cl5 p-b-25">
                            <b> BANK DATA PERLINDUNGAN ANAK </b> adalah pusat sarana pelayanan informasi publik berbasis
                            situs online yang mencakup bank data dan informasi tentang perlindugan anak secara
                            komprehensif, mudah diakses oleh masyarakat maupun stakeholder yang terintegrasi dengan
                            seluruh kementerian/lembaga terkait penyelenggara perlindungan anak di Indonesia.
                        </p>
                        <p class="f1-m-6 cl5 p-b-25">
                            <b> BANK DATA PERLINDUNGAN ANAK </b> yang dikelola secara online merupakan kebutuhan
                            mendesak ditengah beragamnya masalah perlindungan anak yang dewasa ini semakin
                            mengkhawatirkan, dimana persentase perlindungan anak semakin meningkat. Sedangkan
                            pelanggaran hak anak semakin hari trennya cenderung meningkat dan kompleks. Keberadaan
                            lembaga penyelenggara perlindungan anak di pusat maupun daerah memiliki urgensi dan manfaat
                            yang sangat signifikan terhadap pelayanan dan penyelesaian masalah perlindungan anak di
                            Indonesia. Namun selama ini masyarakat tidak memiliki informasi yang cukup untuk mengakses
                            data, informasi, kebijakan/regulasi terkait anak, maupun mengadukan masalah pelanggaran hak
                            anak yang dialaminya. Oleh karena itu melalui situs Bank Data Perlindungan Anak ini, kami
                            ingin memberikan kemudahan bagi masyarakat ataupun stakeholder dalam memperoleh data dan
                            informasi yang akurat, serta pengaduan masyarakat secara online terkait perlindungan anak,
                            yang mana dalam penanganan kasusnya langsung terintegrasi dengan kementerian/lembaga terkait
                            perlindungan anak di Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection