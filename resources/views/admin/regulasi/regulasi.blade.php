@extends('admin._partials.app')

@section('title', 'Regulasi')

@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Regulasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('regulasi.index') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Section -->
<section class="content">
    <!-- Row -->
    <div class="row">
        <!-- Form -->
        <div class="col-lg-12">

            <div class="card card-primary mb-4">
                <div class="card-header">
                    <h3 class="card-title">Regulasi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('regulasi.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                            <label for="deskripsi">Judul Regulasi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="Regulasi">
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                            <label for="kategori">Kategori</label>
                            <select class="form-control custom-select" id="kategori" name="kategori">
                                <option selected="" disabled="">Pilih salah satu</option>
                                <option value="Undang-Undang">UNDANG-UNDANG</option>
                                <option value="Peraturan Pemerintah">PERATURAN PEMERINTAH</option>
                                <option value="Peraturan Presiden">PERATURAN PRESIDEN</option>
                                <option value="Peraturan Menteri">PERATURAN MENTERI</option>
                                <option value="Peraturan Daerah">PERATURAN DAERAH</option>
                                <option value="Peraturan Bupati">PERATURAN BUPATI</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                            <a id="upload-dialog">Pilih file PDF</a>
                            <input type="file" id="pdf-file" accept="application/pdf" name="pdf-file"
                                style="display:none" />
                            <div id="pdf-loader" style="display:none">Loading Preview ..</div>
                            <canvas id="pdf-preview" width="600" height="800"
                                style="display:none; border:1px solid #000000;"></canvas>
                        </div>
                </div>
            </div>
        </div>
        <!-- Form -->
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <a href="{{ route('regulasi.index') }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success float-right" type="submit">Buat Regulasi baru</button>
        </div>
    </div>
    </form>
    <br>
    <!-- Row -->
</section>
<!-- .Section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.99/pdf.min.js"
    integrity="sha512-c9oghY0u79G61vyG8F+a+W72S5eZTyeVwSjMR0d7EuVtZEw1t9UQbEO8mAxZ582ein7i6oUJJaOY2MuzLxoVag=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.99/pdf.worker.min.js"
    integrity="sha512-FIEhMScmQSi1QnAaSjo0xWWYNYdqe4z/vZzjD0xFt9aqtJ56t1E8Vpx8F5E27eLj1cHFav56xVx3fwgyWxU34Q=="
    crossorigin="anonymous"></script>
<script>
    // will hold the PDF handle returned by PDF.JS API
    var _PDF_DOC;

    // PDF.JS renders PDF in a <canvas> element
    var _CANVAS = document.querySelector('#pdf-preview');

    // will hold object url of chosen PDF
    var _OBJECT_URL;

    // load the PDF
    function showPDF(pdf_url) {
        PDFJS.getDocument({
            url: pdf_url
        }).then(function(pdf_doc) {
            _PDF_DOC = pdf_doc;

            // show the first page of PDF
            showPage(1);

            // destroy previous object url
            URL.revokeObjectURL(_OBJECT_URL);
        }).catch(function(error) {
            // error reason
            alert(error.message);
        });;
    }

    // show page of PDF
    function showPage(page_no) {
        _PDF_DOC.getPage(page_no).then(function(page) {
            // set the scale of viewport
            var scale_required = _CANVAS.width / page.getViewport(1).width;

            // get viewport of the page at required scale
            var viewport = page.getViewport(scale_required);

            // set canvas height
            _CANVAS.height = viewport.height;

            var renderContext = {
                canvasContext: _CANVAS.getContext('2d'),
                viewport: viewport
            };

            // render the page contents in the canvas
            page.render(renderContext).then(function() {
                document.querySelector("#pdf-preview").style.display = 'inline-block';
                document.querySelector("#pdf-loader").style.display = 'none';
            });
        });
    }

    /* showing upload file dialog */
    document.querySelector("#upload-dialog").addEventListener('click', function() {
        document.querySelector("#pdf-file").click();
    });

    /* when users selects a file */
    document.querySelector("#pdf-file").addEventListener('change', function() {
        // user selected PDF
        var file = this.files[0];

        // allowed MIME types
        var mime_types = ['application/pdf'];

        // validate whether PDF
        if (mime_types.indexOf(file.type) == -1) {
            alert('Error : Incorrect file type');
            return;
        }

        // validate file size
        if (file.size > 10 * 1024 * 1024) {
            alert('Error : Exceeded size 10MB');
            return;
        }

        // validation is successful

        // hide upload dialog
        document.querySelector("#upload-dialog").style.display = 'none';

        // show the PDF preview loader
        document.querySelector("#pdf-loader").style.display = 'inline-block';

        // object url of PDF
        _OBJECT_URL = URL.createObjectURL(file)

        // send the object url of the pdf to the PDF preview function
        showPDF(_OBJECT_URL);
    });
</script>
@endsection