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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Data Supplier</h4>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white">Tambah Data Supplier
            </button>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $item)
                <tr>
                    <td class="text-sm">{{ $loop->iteration }}</td>
                    <td class="text-sm">{{ $item->nama }}</td>
                    <td class="text-sm">{{ $item->no_hp }}</td>
                    <td class="text-sm">{{ $item->alamat }}</td>
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

        {{$suppliers->onEachSide(1)->links()}}

    </div>
</div>

{{-- modal tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Input Supplier</h5>
            </div>
            <form id="formTambah" method="POST" action="{{ route('supplier.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Nama Supplier</label>
                            <input type="text" class="form-control @error('nama') is-invalid
                            @enderror" value="{{ old('nama') }}" id="nama" name="nama" style="border-color: #A2A9AA;"
                                placeholder="Silahkan Isi..">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Nomor Telepon</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid
                            @enderror" value="{{ old('no_hp') }}" id="no_hp" name="no_hp"
                                style="border-color: #A2A9AA;" placeholder="Silahkan Isi..">
                            @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid
                            @enderror" value="{{ old('alamat') }}" id="alamat" name="alamat"
                                style="border-color: #A2A9AA;" placeholder="Silahkan Isi..">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal edit --}}
@foreach ($suppliers as $value)
<div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Supplier</h5>
            </div>
            <form id="formEdit" method="POST" action="{{ url('admin/home/supplier/update/' . $value->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Nama Supplier</label>
                            <input type="text" class="form-control @error('nama') is-invalid
                            @enderror" value="{{ old('nama', $value->nama) }}" id="nama" name="nama"
                                style="border-color: #A2A9AA;" placeholder="Silahkan Isi..">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Nomer Telepon</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid
                            @enderror" value="{{ old('no_hp', $value->no_hp) }}" id="no_hp" name="no_hp"
                                style="border-color: #A2A9AA;" placeholder="Silahkan Isi..">
                            @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid
                            @enderror" value="{{ old('alamat', $value->alamat) }}" id="alamat" name="alamat"
                                style="border-color: #A2A9AA;" placeholder="Silahkan Isi..">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus --}}
@foreach ($suppliers as $value)
<div class="modal fade" id="modalHapus{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Hapus Data Supplier</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    Yakin Ingin Menghapus Data {{ $value->nama }}?
                </div>
            </div>
            <form id="formHapus" method="GET" action="{{ url('admin/home/supplier/delete/' . $value->id) }}">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection