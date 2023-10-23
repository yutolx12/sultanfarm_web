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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Data Customer</h4>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white">Tambah Data Customer
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
                    <th>Alamat</th>
                    <th>Telepon & Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $item)
                <tr>
                    <td class="text-sm">
                        {{ $loop->iteration }}
                    </td>
                    <td class="text-sm">
                        {{ $item->nama_customer }}
                    </td>
                    <td class="text-sm">
                        {{ $item->alamat }}
                    </td>
                    <td class="text-sm">
                        No Telp : {{ $item->no_telp }} <br> {{ $item->email }}
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

        {{$customers->onEachSide(1)->links()}}

    </div>
</div>


{{-- modal tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Input Data Customer</h5>
            </div>
            <form id="formTambah" method="POST" action="{{ route('customer.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Nama Customer</label>
                                <input type="text" class="form-control @error('nama_customer') is-invalid @enderror"
                                    value="{{ old('nama_customer') }}" id="nama_customer" name="nama_customer"
                                    placeholder="Silahkan Isi Nama..">
                                @error('nama_customer')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">No Telepon</label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                    value="{{ old('no_telp') }}" id="no_telp" name="no_telp"
                                    placeholder="Silahkan Isi No Telepon..">
                                @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" id="email" name="email"
                                    placeholder="Silahkan Isi Email..">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" id="password" name="password"
                                    placeholder="Silahkan Isi Password..">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Alamat</label>
                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" placeholder="Silahkan Isi Alamat..">{{ old('alamat') }}</textarea>
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
@foreach ($customers as $value)
<div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Customer</h5>
            </div>
            <form id="formEdit" method="POST" action="{{ url('admin/home/customer/update/' . $value->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Nama Customer</label>
                                <input type="text" class="form-control  @error('nama_customer') is-invalid
                                    @enderror" value="{{ old('nama_customer', $value->nama_customer) }}"
                                    id="nama_customer" name="nama_customer" placeholder="Silahkan Isi Nama..">
                                @error('nama_customer')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">No Telepon</label>
                                <input type="text" class="form-control  @error('no_telp') is-invalid
                                    @enderror" value="{{ old('no_telp', $value->no_telp) }}" id="no_telp"
                                    name="no_telp" placeholder="Silahkan Isi No Telepon..">
                                @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid
                                    @enderror" value="{{ old('email', $value->email) }}" id="email" name="email"
                                    placeholder="Silahkan Isi Email..">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Password</label>
                                <input type="text" class="form-control  @error('password') is-invalid
                                    @enderror" value="{{ old('password') }}" id="password" name="password"
                                    placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Alamat</label>
                            <textarea type="text" class="form-control @error('alamat') is-invalid
                            @enderror" id="alamat" name="alamat">{{ old('alamat', $value->alamat) }}</textarea>
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
@endforeach

{{-- modal hapus --}}
@foreach ($customers as $value)
<div class="modal fade" id="modalHapus{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Hapus Data Customer</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $value->id }}">
                Yakin untuk menghapus data {{ $value->nama_customer }}
            </div>
            <form method="GET" action="{{ url('admin/home/customer/destroy/' . $value->id) }}">
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