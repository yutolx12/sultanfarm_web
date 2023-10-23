@extends('layouts.template')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    toastr.options = {
"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": false,
"positionClass": "toast-top-right",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
</script>
@if (Session::has('success'))
<script>
    toastr.success('Data Berhasil DiUpdate', '')
</script>
@endif
@if ($errors->any())
<script>
    toastr.error('Keterangan Tidak Boleh Kosong', 'Data Gagal Diupate')
</script>
@endif
<style>
    th {
        font-weight: 500;
        font-size: 14px;
    }
</style>
<div class="page-title mt-0">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Timbang</h4>
        </div>
    </div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('timbang') }}">Timbang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('historytimbang') }}">History Timbang</a>
    </li>
</ul>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group col-lg-11">
                    <div id="scanner"></div>
                </div>
                <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
                <script>
                    function onScanSuccess(decodedText, decodedResult) {
                    $("#result").val(decodedText)
                }
                function onScanFailure(error) {
                console.warn(`Code scan error = ${error}`);
                }
        
                let html5QrcodeScanner = new Html5QrcodeScanner(
                "scanner",
                { fps: 10, qrbox: {width: 250, height: 250} },
                /* verbose= */ false);
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                </script>
            </div>
            <div class="col-md-6">
                <label for="">Kode Domba</label>
                <div class="form-group col-lg-11">
                    <input type="text" id="input" class="form-control" placeholder="Masukkan kode Domba">
                </div>
                <label for="">Tanggal Timbang</label>
                <div class="form-group col-lg-11">
                    <input type="date" id="result" class="form-control" style="border-color: #A2A9AA;">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Timbang Domba</p>
        <hr class="hr hr-blurry" />
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="row">
                            <div id="read"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function() {
        readData()
        $('#input').keyup(function() {
            var strcari = $("#input").val();
            if (strcari != "") {
                $("#read").html('<p class="text-muted">Menunggu Mencari Data ...</p>')
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/home/timbang/ajax') }}",
                    data: "kode_domba=" + strcari,
                    success: function(data) {
                        $("#read").html(data);
                    }
                });
            } else {
                readData()
            }
        });
    });
    function readData() {
        $.get("{{ url('read') }}", {}, function(data, status) {
            $("#read").html(data);
        });
    }
</script>