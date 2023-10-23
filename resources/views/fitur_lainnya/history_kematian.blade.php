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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">History Kematian</h4>
        </div>
    </div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('kematian') }}">Kematian</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('historykematian') }}">History Kematian</a>
    </li>
</ul>
<div class="card">
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Data Domba</th>
                    <th>Penyebab Kematian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>
                    <td class="text-sm">1</td>
                    <td class="text-sm">
                        <img src="{{ asset('landing/img/image3.png') }}" class="rounded float-left"
                            alt="Responsive image" width="150px">
                    </td>
                    <td class="text-sm">
                        Kode Domba : {{ $value->kode_domba }}<br>
                        Jenis Domba :{{ $value->jenis->jenis_domba }}<br>
                        Bobot : {{ $value->bobot }} Kg<br>
                        Jenis Kelamin : {{ $value->jenis_kelamin }}<br>
                        tgl Lahir : {{ $value->tgl_lahir }}<br>
                        Status : {{ $value->status }}<br>
                    </td>
                    <td class="text-sm">
                        <p class="text-lg-start" style="color: #3B484A">{{ $value->keterangan }}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection