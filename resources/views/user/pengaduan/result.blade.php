@extends('user._partials.app')
@section('title', 'Monitoring Pengaduan')
@section('head')
<link rel="stylesheet" href="{{ asset('css/progres.css') }}">
<style>
    .dropzone-wrapper {
        border: 2px dashed #91b0b3;
        border-radius: 10px;
        color: #92b0b3;
        position: relative;
        height: 150px;
    }

    .dropzone-desc {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        text-align: center;
        width: 100%;
        top: 30px;
        font-size: 16px;
    }

    .dropzone,
    .dropzone:focus {
        position: absolute;
        outline: none !important;
        width: 100%;
        height: 150px;
        cursor: pointer;
        opacity: 0;
    }

    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
        background: #F5FFFA;
    }

    .preview-zone .box {
        box-shadow: none;
        border-radius: 0;
        margin-bottom: 0;
        margin-right: auto;
    }

    .thumb {
        background: #fff;
        border: 1px solid #777;
        border-radius: 0.25rem;
        box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
        width: 140px;
        height: auto;
        padding: 0.25rem;
    }

    ul.thumb-Images {
        background: #eee;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
    }

    .close {
        display: none;
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 10em;
        padding: 2px 6px 3px;
        text-decoration: none;
        font: 700 21px/20px sans-serif;
        background: #555;
        border: 3px solid #fff;
        color: #FFF;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        -webkit-transition: background 0.5s;
        transition: background 0.1s;
    }

    .close:hover {
        background: #E54E4E;
        color: #FFF;
        padding: 3px 7px 5px;
        top: -11px;
        right: -11px;
    }

    .close:active {
        color: #E54E4E;
        top: -10px;
        right: -11px;
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #FF5722
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }
</style>
@endsection
@section('main-content')
<div class="container">
    <div class="headline bg12 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="index.html" class="breadcrumb-item f1-s-3 cl9">
                Beranda
            </a>
            <a href="#" class="breadcrumb-item f1-s-3 cl9">
                Monitoring Pengaduan
            </a>
        </div>
    </div>
</div>
<section class="bg12 p-b-60 p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($pengaduans->isNotEmpty())
                @foreach ($pengaduans as $pengaduan)
                <div class="card">
                    <div class="card-header bg-transparent d-flex justify-content-between">
                        <h1 class="f1-s-12"><strong>Monitoring | {{ $pengaduan->kode }}</strong></h1>
                        <div class="float-right">
                            <h1 class="f1-s-12">Status : @if($pengaduan->is_approved == 1)
                                <span class="badge badge-success">Diterima</span>
                                @elseif($pengaduan->is_approved == 2)
                                <span class="badge badge-danger">Ditolak</span>
                                @elseif($pengaduan->is_approved == 0)
                                <span class="badge badge-info">Belum di konfirmasi</span>
                            </h1> @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12 m-b-240">
                            @foreach($pengaduan->status as $status)
                            @if($pengaduan->is_approved == 0)
                            @include('steps.pending')
                            @elseif($pengaduan->is_approved == 1 && $status->status=="VERIFIKASI")
                            @include('steps.verifikasi')
                            @elseif($pengaduan->is_approved == 1 && $status->status=="PENYIDIKAN")
                            @include('steps.penyidikan')
                            @elseif($pengaduan->is_approved == 1 && $status->status=="PERSIDANGAN")
                            @include('steps.persidangan')
                            @elseif($pengaduan->is_approved == 1 && $status->status=="PENGADILAN")
                            @include('steps.pengadilan')
                            @elseif($pengaduan->is_approved == 1 && $status->status=="SELESAI")
                            @include('steps.selesai')
                            @endif
                            @endforeach
                        </div>
                        <div class="col-lg-12">
                            {{-- <div class="col-lg-2 d-flex justify-content-center">
                                <div class="float-left">
                                    {!!
                                    QrCode::size(100)->gradient(100,100,55,100,100,255,'vertical')->generate('Medikre.com')
                                    !!}
                                </div>
                            </div> --}}
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <th>Progres</th>
                                        <td>@foreach($pengaduan->status as $status)
                                            @if($status->status=="VERIFIKASI")
                                            <span>{{ $status->status }}</span>
                                            @elseif($status->status=="PENYIDIKAN")
                                            <span>{{ $status->status }}</span>
                                            @elseif($status->status=="PERSIDANGAN")
                                            <span>{{ $status->status }}</span>
                                            @elseif($status->status=="PENGADILAN")
                                            <span>{{ $status->status }}</span>
                                            @elseif($status->status=="MEDIASI")
                                            <span>{{ $status->status }}</span>
                                            @elseif($status->status=="SELESAI")
                                            <span>{{ $status->status }}</span>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Jenis Kasus</th>
                                        <td>{{ $pengaduan->jenis_kasus->nama_kasus }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pelapor</th>
                                        <td>{{ $pengaduan->pelapor->nama_p }}</td>
                                    </tr>
                                    <tr>
                                        <th>Korban</th>
                                        <td>
                                            @foreach($pengaduan->pelapor->korban as $korban)
                                            <p>{{$korban->nama_k}}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Terlapor</th>
                                        <td>
                                            @foreach($pengaduan->pelapor->terlapor as $terlapor)
                                            <p>{{$terlapor->nama_t}}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>
                                            @foreach($pengaduan->status as $status)
                                            @if($status->status=="VERIFIKASI")
                                            {!! $status->isi !!}
                                            @elseif($status->status=="PENYIDIKAN")
                                            {!! $status->isi !!}
                                            @elseif($status->status=="PERSIDANGAN")
                                            {!! $status->isi !!}
                                            @elseif($status->status=="PENGADILAN")
                                            {!! $status->isi !!}
                                            @elseif($status->status=="MEDIASI")
                                            {!! $status->isi !!}
                                            @elseif($status->status=="SELESAI")
                                            {!! $status->isi !!}
                                            @elseif($status->isi == NULL)
                                            Tidak ada keterangan
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="how-bor3"></div>
                        @if($pengaduan->is_approved == 1 && $status->status=="VERIFIKASI")
                        <form method="post" action="{{ route('user.upload-bukti')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="id" value="{{ $pengaduan->id }}" hidden>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-group col-lg-6">
                                    <h1 class="text-center p-b-10">
                                        Upload bukti disini
                                    </h1>
                                    <div class="dropzone-wrapper">
                                        <div class="dropzone-desc">
                                            <i class="fa fa-2x fa-file-pdf"></i>
                                            <p> Klik upload atau Drop file disini (file berupa gambar) </p>
                                            <p> Maksimum upload /size: 300KB </p>
                                        </div>
                                        <input type="file" class="dropzone" name="filenames[]" id="files" multiple
                                            accept="image/jpeg, image/png, image/gif," required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <output id="Filelist"></output>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class="size-a-20 bg10 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                                    KIRIM </button>
                            </div>
                        </form>
                        @endif
                        @endforeach
                        @else
                        <div class="card-panel red darken-3 white-text">Oops.. Data Tidak Ditemukan</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</section>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", init, false);

var AttachmentArray = [];

var arrCounter = 0;

var filesCounterAlertStatus = false;

var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";

function init() {
    document
        .querySelector("#files")
        .addEventListener("change", handleFileSelect, false);
}

function handleFileSelect(e) {
    if (!e.target.files) return;

    var files = e.target.files;

    for (var i = 0, f;
        (f = files[i]); i++) {
        var fileReader = new FileReader();

        fileReader.onload = (function(readerEvt) {
            return function(e) {
                ApplyFileValidationRules(readerEvt);

                RenderThumbnail(e, readerEvt);

                FillAttachmentArray(e, readerEvt);
            };
        })(f);

        fileReader.readAsDataURL(f);
    }
    document
        .getElementById("files")
        .addEventListener("change", handleFileSelect, false);
}

jQuery(function($) {
    $("div").on("click", ".img-wrap .close", function() {
        var id = $(this)
            .closest(".img-wrap")
            .find("img")
            .data("id");

        var elementPos = AttachmentArray.map(function(x) {
            return x.FileName;
        }).indexOf(id);
        if (elementPos !== -1) {
            AttachmentArray.splice(elementPos, 1);
        }

        $(this)
            .parent()
            .find("img")
            .not()
            .remove();

        $(this)
            .parent()
            .find("div")
            .not()
            .remove();

        $(this)
            .parent()
            .parent()
            .find("div")
            .not()
            .remove();

        var lis = document.querySelectorAll("#imgList li");
        for (var i = 0;
            (li = lis[i]); i++) {
            if (li.innerHTML == "") {
                li.parentNode.removeChild(li);
            }
        }
    });
});

function ApplyFileValidationRules(readerEvt) {
    if (CheckFileType(readerEvt.type) == false) {
        alert(
            "The file (" +
            readerEvt.name +
            ") does not match the upload conditions, You can only upload jpg/png/gif files"
        );
        e.preventDefault();
        return;
    }

    if (CheckFileSize(readerEvt.size) == false) {
        alert(
            "The file (" +
            readerEvt.name +
            ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
        );
        e.preventDefault();
        return;
    }

    if (CheckFilesCount(AttachmentArray) == false) {
        if (!filesCounterAlertStatus) {
            filesCounterAlertStatus = true;
            alert(
                "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
            );
        }
        e.preventDefault();
        return;
    }
}

function CheckFileType(fileType) {
    if (fileType == "image/jpeg") {
        return true;
    } else if (fileType == "image/png") {
        return true;
    } else if (fileType == "image/gif") {
        return true;
    } else {
        return false;
    }
    return true;
}

function CheckFileSize(fileSize) {
    if (fileSize < 300000) {
        return true;
    } else {
        return false;
    }
    return true;
}

function CheckFilesCount(AttachmentArray) {
    var len = 0;
    for (var i = 0; i < AttachmentArray.length; i++) {
        if (AttachmentArray[i] !== undefined) {
            len++;
        }
    }
    if (len > 9) {
        return false;
    } else {
        return true;
    }
}

function RenderThumbnail(e, readerEvt) {
    var li = document.createElement("li");
    li.className = "d-inline-block align-middle text-center m-rl-5";
    ul.appendChild(li);
    li.innerHTML = [
        '<div class="img-wrap rounded position-relative d-inline-block m-rl-10 m-t-10 p-b-5"> <span class="close d-inline">&#215;</span>' +
        '<img class="thumb" src="',
        e.target.result,
        '" title="',
        escape(readerEvt.name),
        '" data-id="',
        readerEvt.name,
        '"/>' + "</div>"
    ].join("");

    var div = document.createElement("div");
    div.className = "text-center";
    li.appendChild(div);
    div.innerHTML = [readerEvt.name].join("");
    document.getElementById("Filelist").insertBefore(ul, null);
}

function FillAttachmentArray(e, readerEvt) {
    AttachmentArray[arrCounter] = {
        AttachmentType: 1,
        ObjectType: 1,
        FileName: readerEvt.name,
        FileDescription: "Attachment",
        NoteText: "",
        MimeType: readerEvt.type,
        Content: e.target.result.split("base64,")[1],
        FileSizeInBytes: readerEvt.size
    };
    arrCounter = arrCounter + 1;
}

</script>
@endsection