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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Breeding</h4>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white"> Tambah Data
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
                    <th>Gambar</th>
                    <th>Paket</th>
                    <th>Spesifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>1</td>
                    <td><img src="{{ asset('breeding/'. $item->gambar) }}" class="rounded float-left"
                            alt="Responsive image" width="150px">
                    </td>
                    <td class="text-sm">{{ $item->nama_paket }} <br>
                        Rp. {{ $item->harga }}</td>
                    <td class="text-sm">{{ $item->keterangan }}</td>
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

{{-- modal tambah --}}

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('admin/home/breeding/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel1">Input Paket Breading</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaPaket" class="fw-normal">Nama Paket</label>
                        <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                            value="{{ old('nama_paket') }}" id="nama_paket" name="nama_paket"
                            placeholder="Masukkan Nama Paket">
                        @error('nama_paket')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hargaPaket" class="fw-normal">Harga Paket</label>
                        <input type="number" step="0.01" class="money form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga') }}" id="harga" name="harga" placeholder="Masukkan Harga">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gambarPaket" class="fw-normal">Gambar Paket</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="foto"
                            name="gambar">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi" class="fw-normal">Spesifikasi</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                            name="keterangan" placeholder="Masukkan Keterangan"
                            rows="3">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal edit --}}
@foreach($data as $value)
<div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="exampleModalLabel1">Input Paket Breading</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formTambah" method="POST" action="{{ url('admin/home/breeding/updateimage/'.$value->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="{{ asset('breeding/'.  $value->gambar ) }}" alt="" width="100%">
                    </div>
                    <div class="form-group">
                        <label for="gambarPaket" class="fw-normal">Gambar Paket</label>
                        <div class="row">
                            <div class="col-md-9">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="foto"
                                    name="gambar">
                                @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="formTambah" method="POST" action="{{ url('admin/home/breeding/update/'.$value->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaPaket" class="fw-normal">Nama Paket</label>
                        <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                            value="{{ old('nama_paket', $value->nama_paket) }}" id="nama_paket" name="nama_paket"
                            placeholder="Masukkan Nama Paket">
                        @error('nama_paket')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hargaPaket" class="fw-normal">Harga Paket</label>
                        <input type="number" step="0.01" class="money form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga', $value->harga) }}" id="harga" name="harga"
                            placeholder="Masukkan Harga">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi" class="fw-normal">Spesifikasi</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                            name="keterangan" placeholder="Masukkan Keterangan"
                            rows="3">{{ old('keterangan', $value->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($data as $value)
<div class="modal fade" id="modalHapus{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Yakin Ingin Menghapus </h5>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="">
                Yakin untuk menghapus data
            </div>
            <form method="GET" action="">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a type="button" href="{{ url('admin/home/breeding/delete/'. $value->id) }}" class="btn"
                        style="background-color: #228896; color: white;">Yakin</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection