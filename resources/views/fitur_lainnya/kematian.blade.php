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
      <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Scan Qr</h4>
    </div>
  </div>
</div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('kematian') }}">Kematian</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('historykematian') }}">History Kematian</a>
  </li>
</ul>
<div class="card">
  <div class="card-body">
    <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Input Data Kematian Baru</p>
    <hr class="hr hr-blurry" />
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="form-group">
            <label for="pencarian">kode Domba</label>
            <input type="text" id="input" class="form-control" placeholder="Masukkan kode Domba">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h2 class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Domba Mati</h2>
    <hr class="hr hr-blurry" />
    <div class="container">
      <div class="row">
        <div id="read"></div>
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
                    url: "{{ url('admin/home/kematian/ajax') }}",
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