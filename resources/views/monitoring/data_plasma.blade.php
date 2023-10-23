@extends('layouts.template')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="script.js"></script>
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
    toastr.success('Data Berhasil Ditambahkan', '')
</script>
@endif
@if (Session::has('successedit'))
<script>
    toastr.success('Data Berhasil Diedit', '')
</script>
@endif
@if (Session::has('successhapus'))
<script>
    toastr.success('Data Berhasil Dihapus', '')
</script>
@endif
@if ($errors->any())
<script>
    toastr.error('Gagal Ditambahkan', '')
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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Plasma</h4>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white"> Tambah Data Plasma
            </button>
        </div>
    </div>
</div>


<!--Nav Tab-->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="{{ route('data_kamera') }}">Kamera</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('data_plasma') }}">Plasma</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data_kamar') }}">Kamar</a>
    </li>
</ul>
<!--Card-->
<div class="card">
    <div class="card-body">
        <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Plasma</p>
        <hr class="hr hr-blurry" />

        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Plasma</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_plasma }}</td>
                    <td>
                        {{ $item->alamat_plasma }}
                    </td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn btn-sm btn-warning" href="" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $item->id }}">
                                <span class="btn-label "><i class="bi bi-pencil-fill"></i></span>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" href="" data-bs-toggle="modal"
                                data-bs-target="#modalHapus{{ $item->id }}">
                                <span class="btn-label"><i class="bi bi-trash-fill"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: white">
                <h4 class="modal-title">Input Data Plasma</h4>
                <button type="button" style="color: black" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <form action="{{ url('admin/home/data_plasma/store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="">Nama Plasma</label>
                        <input type="text" class="form-control" name="nama_plasma">
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat Plasma</label>
                        <textarea class="form-control @error('alamat_plasma') is-invalid @enderror" id="alamat_plasma"
                            name="alamat_plasma" placeholder="Masukkan Alamat Plasma"
                            rows="3">{{ old('alamat_plasma') }}</textarea>
                        @error('alamat_plasma')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal"
                        style="background-color: #228896">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($data as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: white">
                <h4 class="modal-title">Edit Data Plasma</h4>
                <button type="button" style="color: black" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <form action="{{ url('admin/home/data_plasma/update/'. $item->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col mb-3">
                        <label for="">Nama Plasma</label>
                        <input type="text" class="form-control @error('nama_plasma') is-invalid @enderror"
                            name="nama_plasma" value="{{ old('nama_plasma', $item->nama_plasma) }}">
                        @error('nama_plasma')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control @error('alamat_plasma') is-invalid @enderror" id="alamat_plasma"
                            name="alamat_plasma" placeholder="Masukkan Alamat Plasma"
                            rows="3">{{ old('alamat_plasma', $item->alamat_plasma) }}</textarea>
                        @error('alamat_plasma')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal"
                        style="background-color: #228896">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($data as $item)
<div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formHapus" method="GET" action="">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Yakin Ingin Menghapus Data Plasma?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a type="submit" href="{{ url('admin/home/data_plasma/delete/'.$item->id) }}" class="btn"
                        style="background-color: #228896; color: white;">Yakin</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection