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
</head>


<section id="domba">
    
    <div class="container px-5 mt-2">
        <!-- Ganti mt-2 menjadi kelas margin atas yang sesuai -->
        
        <div class="col-lg-12">
            <!-- Tulisan "Tentang Kami" -->
            <p class="text-center tentang-kami" style="color: #0B4149">Detail Domba</p>

            <div class="container text-center">
                <div class="row align-items-start">
                  <div class="col">
                    <img src="{{ asset('landing/img/detaildomba.png') }}" class="rounded float-left" alt="Responsive image" width="550px">
                  </div>
                  <div class="col">
                    <div class="product-cards-container">
                        <div class="product-card" style="width: 18rem;">
                            <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Jenis Domba</p>
                            <p class="text-lg-start" style="color: #3B484A">Umur 0 Tahun 0 Bulan 00 Hari</p>
                            <p class="text-lg-start" style="color: #3B484A">Jenis Kelamin : Neutral</p>
                            <p class="text-lg-start" style="color: #3B484A">Keterangan Lain : Neutral</p>
                            <a href="{{ url('detail_landing') }}" style="background-color: #228896; color: white;"
                            class="btn rounded-pill px-3 mb-2 mb-lg-0">
                            <span class="d-flex align-items-center">
                                <i class="bi bi-whatsapp"></i>
                                <span class="fw-normal" style="padding-left:8px"> Chat WA</span>
                            </span>
                        </a>
                        </div>
                        
                    </div>
                  </div>
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
                    <p style="color: white; margin-right: 100px;">CV Sultan Farm Jember merupakan PUSAT PETERNAKAN
                        DOMBA
                        TERBAIK dan
                        tempat untuk MEMBELI DOMBA TERPERCAYA</p>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <p style="color: white;">KONTAK KAMI</p>
                    <p style="color: white;"> <i class="bi-telephone me-2"></i>0852-9047-4758</p>
                    <p style="color: white;"> <i class="bi-envelope me-2"></i> support@sultanfarm.id</p>
                    <!-- Tambahkan 5 ikon di bawah support sultan farm -->
                    <p style="color: white;"> <i class="bi bi-whatsapp me-2"></i> <i
                            class="bi bi-instagram me-2"></i> <i class="bi bi-facebook me-2"></i> <i
                            class="bi bi-youtube me-2"></i><i class="bi bi-music-note me-2"></i></p>
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