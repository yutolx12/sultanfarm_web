<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page | Sultan Farm</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('landing/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/galery/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/galery/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav style="background-color: #C2DCE0;" class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
        <div class="container px-5">
            {{-- <a class="navbar-brand fw-bold" href="#page-top">Sultan Farm</a> --}}
            <a class="navbar-brand fw-bold" href="#page-top">
                <img src="{{ asset('landing/img/logo.png') }}" alt="Logo Sultan Farm"> Sultan Farm
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#domba">Domba</a></li>

                </ul>
                <a href="{{ route('login') }}" style="background-color: #228896; color: white;"
                    class="btn rounded-pill px-3 mb-2 mb-lg-0">
                    <span class="d-flex align-items-center">
                        <i class="bi-lock-fill me-2"></i>
                        <span class="small">Masuk</span>
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <section id="beranda" style="overflow: hidden;">
        <header class="masthead"
            style="background-color: #C2DCE0; background-size: cover; background-position: center; position: relative;">
            <div class="container px-5" style="width: 100%; height: 100vh; margin-top: -100px;">
                <img id="awan1" src="{{ asset('landing/img/awan1.svg') }}" alt="Awan"
                    style="position: absolute; left: 11%; top: 100px; width: 30%; z-index: 0;">
                <img src="{{ asset('landing/img/pengunungan.png') }}" alt="Pegunungan"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
                <img id="awan2" src="{{ asset('landing/img/awan2.svg') }}" alt="Awan"
                    style="position: absolute; right: 1%; top: 70px; width: 30%; z-index: 2;">
                <img id="awan3" src="{{ asset('landing/img/awan3.svg') }}" alt="Awan"
                    style="position: absolute; left: 50%; top: 180px; width: 15%; z-index: 3;">
                <img id="awan4" src="{{ asset('landing/img/awan4.svg') }}" alt="Awan"
                    style="position: absolute; left: 8%; top: 170px; width: 15%; z-index: 4;">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start"
                            style="margin-top: 220px; line-height: 1.25; position: relative; z-index: 5;">
                            <p style="font-size: 40px; font-weight: 700; color: white;">
                                {{ $landingpage->judul_beranda }}</p>
                            <p class="lead fw-normal  mb-5" style="font-size: 17px; color: white;">
                                {{ $landingpage->deskripsi_beranda }}</p>
                        </div>
                    </div>
                </div>
                {{-- <img id="domba1" src="{{ asset('landing/img/domba1.svg') }}" alt="Domba"
                    style="position: absolute; right: 8%; top: 170px; width: 15%; z-index: 6;">
                <img id="domba2" src="{{ asset('landing/img/domba2.svg') }}" alt="Domba"
                    style="position: absolute; right: 8%; top: 170px; width: 15%; z-index: 7;">
                <img id="domba3" src="{{ asset('landing/img/domba3.svg') }}" alt="Domba"
                    style="position: absolute; right: 8%; top: 170px; width: 15%; z-index: 8;"> --}}
            </div>
        </header>
    </section>

    <script>
        window.addEventListener('scroll', function() {
            var awan2 = document.getElementById('awan2');
            var scrollY = window.scrollY;
            var rightValue = 1 - scrollY * 0.1;
            awan2.style.right = rightValue + '%';
        });
        window.addEventListener('scroll', function() {
            var awan3 = document.getElementById('awan3');
            var scrollY = window.scrollY;
            var rightValue = 50 - scrollY * -0.1;
            awan3.style.left = rightValue + '%';
        });
        window.addEventListener('scroll', function() {
            var awan4 = document.getElementById('awan4');
            var scrollY = window.scrollY;
            var leftValue = 11 - scrollY * 0.2;
            awan4.style.left = leftValue + '%';
        });
        window.addEventListener('scroll', function() {
            var awan4 = document.getElementById('awan1');
            var scrollY = window.scrollY;
            var leftValue = 8 - scrollY * 0.2;
            awan4.style.left = leftValue + '%';
        });
    </script>


    {{-- <section id="galeri">
        <div class="container px-5 mt-2">
            <!-- Ganti mt-2 menjadi kelas margin atas yang sesuai -->
            <div class="col-lg-12">
                <!-- Tulisan "Tentang Kami" -->
                <p class="text-center tentang-kami" style="color: #0B4149">Galeri</p>
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <center>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('landing/img/landscape3.png') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>caption</h5>
                                    <p>deskripsi</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('landing/img/landscape3.png') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Ini adalah Caption</h5>
                                    <p>Ini adalah tempat untuk deskripsi</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('landing/img/landscape1.png') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Ini adalah Caption</h5>
                                    <p>Ini adalah tempat untuk deskripsi</p>
                                </div>
                            </div>
                        </div>
                    </center>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="galeri">
        <div class="container px-5 mt-2">
            <div class="col-lg-12">
                <p class="text-center tentang-kami" style="color: #0B4149">Galeri</p>
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <!-- Buat indikator carousel di sini jika diperlukan -->
                    </div>
                    <div class="carousel-inner">
                        @foreach ($galerys as $galery)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('images/' . $galery->gambar) }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $galery->caption }}</h5>
                                    <p>{{ $galery->deskripsi }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" ariahidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- Basic features section-->
    <section id="domba">
        <div class="container px-5 mt-2">
            <!-- Ganti mt-2 menjadi kelas margin atas yang sesuai -->
            <div class="col-lg-12">
                <!-- Tulisan "Tentang Kami" -->
                <p class="text-center tentang-kami" style="color: #0B4149">Jenis Domba</p>
                <div class="product-cards-container">
                    <div class="product-card">
                        <img src="{{ asset('landing/img/image1.png') }}" alt="Nama Produk 1">
                        <p>Jenis Domba</p>
                        <p style="color: #3B484A">Tersedia: 5</p>
                        <a class="btn" style="background-color: #228896; color: white; border-radius: 30px;"
                            href="lihat_semua_domba">Lihat Semua</a>
                    </div>
                    <div class="product-card">
                        <img src="{{ asset('landing/img/image2.png') }}" alt="Nama Produk 2">
                        <p>Jenis Domba</p>
                        <p style="color: #3B484A">Tersedia: 3</p>
                        <a class="btn" style="background-color: #228896; color: white; border-radius: 30px;"
                            href="lihat_semua_domba">Lihat Semua</a>
                    </div>
                    <div class="product-card">
                        <img src="{{ asset('landing/img/image3.png') }}" alt="Nama Produk 3">
                        <p>Jenis Domba</p>
                        <p style="color: #3B484A">Tersedia: 0</p>
                        <a class="btn" style="background-color: #228896; color: white; border-radius: 30px;"
                            href="lihat_semua_domba">Lihat Semua</a>
                    </div>
                    <div class="product-card">
                        <img src="{{ asset('landing/img/image1.png') }}" alt="Nama Produk 1">
                        <p>Jenis Domba</p>
                        <p style="color: #3B484A">Tersedia: 5</p>
                        <a class="btn" style="background-color: #228896; color: white; border-radius: 30px;"
                            href="lihat_semua_domba">Lihat Semua</a>
                    </div>
                    <div class="product-card">
                        <img src="{{ asset('landing/img/image2.png') }}" alt="Nama Produk 2">
                        <p>Jenis Domba</p>
                        <p style="color: #3B484A">Tersedia: 3</p>
                        <a class="btn" style="background-color: #228896; color: white; border-radius: 30px;"
                            href="lihat_semua_domba">Lihat Semua</a>
                    </div>
                    <div class="product-card">
                        <img src="{{ asset('landing/img/image3.png') }}" alt="Nama Produk 3">
                        <p>Jenis Domba</p>
                        <p style="color: #3B484A">Tersedia: 0</p>
                        <a class="btn" style="background-color: #228896; color: white; border-radius: 30px;"
                            href="lihat_semua_domba">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- App badge section-->
    <section style="background-color:#212E30;" id="download">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <p style="color: white; font-size: 20px;">Tentang Sultan farm</p>
                        <p style="color: white; margin-right: 100px;">{{ $landingpage->deskripsi_footer }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <p style="color: white;">KONTAK KAMI</p>
                        <p style="color: white;"> <i class="bi-telephone me-2"></i>+{{ $landingpage->nomor_telepon }}
                        </p>
                        <p style="color: white;"> <i class="bi-envelope me-2"></i> {{ $landingpage->email }}</p>
                        <!-- Tambahkan 5 ikon di bawah support sultan farm -->
                        <p>
                            <a href="https://wa.me/{{ $landingpage->nomor_telepon }}"
                                style="color: white; text-decoration: none;" target="_blank" class="me-2">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="{{ $landingpage->instagram }}" style="color: white; text-decoration: none;"
                                target="_blank" class="me-2">
                                <i class="bi bi-instagram"></i>
                            </a>
                            {{-- <a href="https://link-facebook.com" style="color: white; text-decoration: none;"
                                target="_blank" class="me-2">
                                <i class="bi bi-facebook"></i>
                            </a> --}}
                            {{-- <a href="https://link-youtube.com" style="color: white; text-decoration: none;"
                                target="_blank" class="me-2">
                                <i class="bi bi-youtube"></i>
                            </a> --}}
                            <a href="mailto:{{ $landingpage->email }}" style="color: white; text-decoration: none;"
                                target="_blank">
                                <i class="bi-envelope me-1"></i>
                            </a>
                            <a href="{{ $landingpage->tiktok }}" style="color: white; text-decoration: none;"
                                target="_blank">
                                <i class="bi bi-music-note"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="text-center py-4" style="background-color:#212E30;">
        <div class="container px-4">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; 2023 All Rights Reversed By Sultan Farm </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
