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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">History Timbang</h4>
        </div>
    </div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('timbang') }}">Timbang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('historytimbang') }}">History Timbang</a>
    </li>
</ul>
<div class="card">
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('images/'.$item->gambar) }}" class="rounded float-left"
                            alt="Responsive image" width="150px">
                    </td>
                    <td>{{ $item->kode_domba }} <br>
                        {{ $item->jenis->jenis_domba }} <br>
                        {{ $item->bobot }} Kg <br>
                        {{ $item->jenis_kelamin }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" href="" data-bs-toggle="modal"
                            data-bs-target="#modaldetail{{ $item->kode_domba }}">
                            <span class="btn-label">Detail Timbang</i></span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach ($data as $value)
<div class="modal fade text-left" id="modaldetail{{ $value->kode_domba }}" tabindex="-1" role="dialog"
    aria-labelledby="modalhapus" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Riwayat Timbang Domba</h4>
            </div>
            <div class="modal-body">
                <label for="">Kode Domba</label>
                <div class="form-group">
                    <input type="text" id="input" class="form-control" value="{{ $value->kode_domba }}"
                        placeholder="Masukkan kode Domba">
                </div>
                <div id="read"></div>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
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
                    url: "{{ url('admin/home/timbang/ajaxhistory') }}",
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