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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Data Pegawai</h4>
        </div>
    </div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pegawai.input') }}">Input Pegawai</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="data_pegawai" href="{{ route('pegawai') }}">Data Pegawai</a>
    </li>
</ul>
<div class="card">
    @if (session('success'))
    <div class="alert alert-success" id="alert" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>E-mail</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-sm">
                        {{ $value->name }}<br>
                        {{ $value->nip }}<br>
                        {{ $value->jenis_kelamin }}<br>
                        {{ $value->alamat }}<br>
                    </td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A">{{ $value->email }}</p>
                    </td>
                    <td><span class="badge text-bg-success">{{ $value->role }}</span></td>

                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn btn-sm btn-warning" href="" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $value->id }}">
                                <span class="btn-label "><i class="bi bi-pencil-fill"></i></span>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" href="" data-bs-toggle="modal"
                                data-bs-target="#modalHapus{{ $value->id }}">
                                <span class="btn-label"><i class="bi bi-trash-fill"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$data->onEachSide(1)->links()}}

    </div>
</div>
@foreach($data as $value)
<div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30">
                <h5 class="modal-title" style="color: white" id="exampleModalLabel1">Edit Data Pegawai</h5>
            </div>
            <form method="post" action="{{ url('admin/home/pegawai/update/'.$value->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">NIP Pegawai</p>
                                        <input type="text" class="form-control @error('nip') is-invalid
                                        @enderror" value="{{ old('nip', $value->nip) }}" name="nip"
                                            placeholder="Isi NIP Pegawai">
                                        @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">Nama Pegawai</p>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid
                                        @enderror" value="{{ old('name', $value->name) }}"
                                            placeholder="Isi Nama Pegawai">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label>Jenis Kelamin</label>
                                        <div class="col">
                                            <select
                                                class="form-control mt-3 @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" autocomplete="off" id="exampleFormControlSelect1">
                                                <option>{{ $value->jenis_kelamin }}</option>
                                                <option value="Laki-Laki" {{ 'Laki-Laki'===old('jenis_kelamin')
                                                    ? 'selected' : '' }}>
                                                    Laki Laki
                                                </option>
                                                <option value="Perempuan" {{ 'Perempuan'===old('jenis_kelamin')
                                                    ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">Alamat</p>
                                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid
                                        @enderror" value="{{ old('alamat', $value->alamat) }}"
                                            placeholder="Isi Alamat">
                                        @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">No. Telepon</p>
                                        <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid
                                        @enderror" value="{{ old('no_telp', $value->no_telp) }}"
                                            placeholder="Isi No. Telepon">
                                        @error('no_telp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">E-Mail</p>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid
                                        @enderror" value="{{ old('email', $value->email) }}" placeholder="Isi E-Mail">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">Password</p>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid
                                        @enderror" value="{{ old('password', $value->password) }}"
                                            placeholder="Isi Password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <p class="text-lg-start" style="color: #4E5B5C">Level</p>
                                        <div class="input-group">
                                            <select class="form-control @error('role') is-invalid @enderror" name="role"
                                                autocomplete="off" id="exampleFormControlSelect1">
                                                <option>{{ $value->role }}</option>
                                                <option value="admin" {{ 'admin'===old('role') ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                                <option value="pemilik" {{ 'pemilik'===old('role') ? 'selected' : '' }}>
                                                    Pemilik
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary" style="background-color: #228896;" href="#">
                        <span class="btn-label">Simpan</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($data as $value)
<div class="modal fade" id="modalHapus{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3">
                    Yakin Ingin Menghapus Data {{ $value->name }}?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    Batal
                </button>
                <a type="button" class="btn btn-danger btn-sm"
                    href="{{ url('admin/home/pegawai/delete/'.  $value->id ) }}">
                    <span class="btn-label">Hapus</span></a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection