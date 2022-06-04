<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="{{ route('user.beranda') }}">
                            <img class="max-s-full" src="{{ asset('magnews2/images/icons/logo-05.png') }}" alt="LOGO">
                        </a>
                    </div>
                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            KPPAD Kalimantan Barat merupakan lembaga yang dibentuk oleh pemerintah daerah untuk
                            mendukung pengawasan penyelenggaraan perlindungan anak di daerah.
                        </p>
                        <div class="p-t-15">
                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-facebook-f"></span>
                            </a>
                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-twitter"></span>
                            </a>
                            <a href="https://www.instagram.com/kppad_kalbar/"
                                class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-instagram"></span>
                            </a>
                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Link
                        </h5>
                    </div>
                    <ul class="m-t--12">
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('user.pengaduan-online') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Pengaduan Online
                            </a>
                        </li>
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('user.tracking-pengaduan') }}"
                                class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Monitoring Pengaduan
                            </a>
                        </li>
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('regulasi-anak') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Regulasi
                            </a>
                        </li>
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('user.hubungi-kami') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Hubungi Kami
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                &copy;2020. Komisi Perlindungan dan Pengawasan Anak Daerah
            </span>
        </div>
    </div>
</footer>
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <span class="fas fa-angle-up"></span>
    </span>
</div>

<script src="{{ asset('magnews2/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('magnews2/vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('magnews2/vendor/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('magnews2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('magnews2/js/main.js') }}"></script>
@include('sweetalert::alert')

@section('footer')
@show