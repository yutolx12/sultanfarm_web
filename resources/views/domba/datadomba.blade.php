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
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Domba</h4>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white"> Tambah Data Domba
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
                    <th>Domba</th>
                    <th>Detail</th>
                    <th>Barcode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @foreach($data as $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('images/'. $value->gambar ) }}" class="rounded float-left" alt="Responsive image"
                        width="150px"></td>
                <td class="text-sm">Kode: {{ $value->kode_domba }}<br>
                    Jenis Domba: {{ $value->jenis->jenis_domba }} <br>
                    Bobot: {{ $value->bobot }} Kg<br>
                    Jenis kelamin: {{ $value->jenis_kelamin }}<br>
                    Tanggal Lahir: {{ $value->tgl_lahir }}<br>
                    Jenis Paket: {{ $value->tipe_domba }}</td>
                <td>
                    {!! QrCode::size(70)->generate($value->kode_domba) !!}
                    <script>
                        function openPopup() {
                        var popupWindow = window.open();
                        var htmlContent = `
                            <html>
                            <head>
                                <title>A5 Pop-up</title>
                            </head>
                            <body>
                                <div class="container mt-5">
                                    <div class="card mx-auto" style="width: 210mm; height: 148mm;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="card-title">Cetak QR Code Domba</h5>
                                                    <img src="{{ asset('images/'. $value->gambar ) }}" class="img-fluid" alt="Domba Image">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column h-100 justify-content-between">
                                                        {!! QrCode::size(150)->generate($value->kode_domba) !!}
                                                        <p class="card-text">Kode Domba : </p>
                                                        <p class="card-text">{{ $value->kode_domba }}</p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </body>
                            </html>
                        `;
                        popupWindow.document.open();
                        popupWindow.document.write(htmlContent);
                        popupWindow.document.close();
                        popupWindow.resizable = false;
                        popupWindow.print();
                        popupWindow.close();
                    }
                    </script>
                    <br>
                </td>
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
                        <button type="button" class="btn btn-primary btn-sm" onclick="openPopup()">
                            <span class="btn-label"><i class="bi bi-printer"></i></span>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{$list->onEachSide(1)->links()}}
    </div>
</div>
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: white">
                <h4 class="modal-title">Input Data Domba</h4>
                <button type="button" style="color: black" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <form action="{{ route('domba.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="foto"
                            name="gambar">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control  @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin" id="jenis_kelamin">
                                <option value="" {{ old('jenis_kelamin')==='' ? 'selected' : '' }}>Pilih</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin')==='Laki-Laki' ? 'selected' : '' }}>
                                    Jantan
                                </option>
                                <option value="Perempuan" {{ old('jenis_kelamin')==='Perempuan' ? 'selected' : '' }}>
                                    Betina</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="id_jenis">Jenis Domba</label>
                            <select class="form-control @error('id_jenis') is-invalid @enderror" name="id_jenis"
                                id="id_jenis">
                                <option value="" {{ old('id_jenis')==='' ? 'selected' : '' }}>Pilih</option>
                                @foreach($jenisdomba as $value)
                                <option value="{{ $value->id }}" {{ old('id_jenis')===$value->id ? 'selected' : '' }}>
                                    {{ $value->jenis_domba }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6"><label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                value="{{ old('tgl_lahir') }}" id="tgl_lahir" name="tgl_lahir">
                            @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="bobot">Bobot</label>
                            <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                value="{{ old('bobot') }}" id="bobot" name="bobot" placeholder="Masukkan Bobot">
                            @error('bobot')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipe_domba">Tipe Domba</label>
                            <select class="form-control @error('tipe_domba') is-invalid @enderror" name="tipe_domba"
                                id="tipe_domba">
                                <option value="" {{ old('tipe_domba')==='' ? 'selected' : '' }}>Pilih</option>
                                <option value="Trading" {{ old('tipe_domba')==='Trading' ? 'selected' : '' }}>
                                    Trading
                                </option>
                                <option value="Breeding" {{ old('tipe_domba')==='Breeding' ? 'selected' : '' }}>
                                    Breeding</option>
                            </select>
                            @error('tipe_domba')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="turunan_ke">Turunan Ke</label>
                            <input type="number" class="form-control @error('turunan') is-invalid @enderror"
                                value="{{ old('turunan') }}" id="turunan_ke" name="turunan">
                            @error('turunan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="harga_jual">Perkiraan Harga Jual</label>
                            <input type="number" step="0.01"
                                class="money form-control @error('harga_jual') is-invalid @enderror"
                                value="{{ old('harga_jual') }}" id="harga_jual" name="harga_jual"
                                placeholder="Masukkan Perkiraan Harga Jual">
                            @error('harga_jual')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Kamar</label>
                            <div class="input-group">
                                <select class="form-control @error('id_kamar') is-invalid @enderror" name="id_kamar"
                                    id="id_kamar">
                                    <option value="" {{ old('id_kamar')==='' ? 'selected' : '' }}>Pilih</option>
                                    @foreach($kamar as $value)
                                    <option value="{{ $value->id }}" {{ old('id_kamar')===$value->id ? 'selected' :
                                        ''}}>
                                        Plasma {{ $value->plasma->id }}, Kamar no {{ $value->no_kamar }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_kamar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="keterangan">Deskripsi atau Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                name="keterangan" placeholder="Masukkan Keterangan"
                                rows="2">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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

@foreach($data as $value)
<div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" style="color: black" id="exampleModalLabel1">Edit Data Domba</h5>
                </div>
                <form method="POST" action="{{ url('admin/home/domba/updateimage/'.$value->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('images/'.  $value->gambar ) }}" alt="" width="100%">
                            </div>
                            <div class="col-md-6">
                                <label class="" for="foto">Images</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="foto"
                                    name="gambar">
                                @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ url('admin/home/domba/update/'. $value->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                value="{{ old('jenis_kelamin', $value->jenis_kelamin) }}" name="jenis_kelamin"
                                autocomplete="off" id="exampleFormControlSelect1">
                                <option>{{ $value->jenis_kelamin}}</option>
                                <option value="Laki-Laki" {{ 'Laki-Laki'===old('jenis_kelamin') ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" {{ 'Perempuan'===old('Perempuan') ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_domba">Jenis Domba</label>
                            <select class="form-control @error('id_jenis') is-invalid @enderror" name="id_jenis"
                                autocomplete="off" id="exampleFormControlSelect1">
                                <option value="{{ old('id_jenis', $value->id_jenis) }}">{{ old('id_jenis',
                                    $value->id_jenis) }}</option>
                                @foreach($data as $value)
                                <option value="{{ $value->id }}">{{ $value->jenis->jenis_domba }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid
                                    @enderror" value="{{ old('tgl_lahir', $value->tgl_lahir) }}" id="tgl_lahir"
                                name="tgl_lahir">
                            @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="bobot">Bobot</label>
                            <input type="number" class="form-control @error('bobot') is-invalid
                                    @enderror" value="{{ old('bobot', $value->bobot) }}" name="bobot">
                            @error('bobot')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="harga_jual">Perkiraan Harga Jual</label>
                            <input type="number" class="form-control @error('harga_jual') is-invalid
                                    @enderror" value="{{ old('harga_jual', $value->harga_jual) }}" id="harga_jual"
                                name="harga_jual" placeholder="Masukkan Perkiraan Harga Jual">
                            @error('harga_jual')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Tipe Domba</label>
                            <select class="form-control @error('tipe_domba') is-invalid @enderror" name="tipe_domba"
                                autocomplete="off" id="exampleFormControlSelect1">
                                <option value="Trading" {{ old('tipe_domba', 'Trading' )==='Trading' ? 'selected' : ''
                                    }}>
                                    Trading
                                </option>
                                <option value="Breeding" {{ old('tipe_domba')==='Breeding' ? 'selected' : '' }}>
                                    Breeding
                                </option>
                            </select>
                            @error('tipe_domba')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="induk_jantan">Induk Jantan</label>
                            <select class="form-control @error('induk_jantan') is-invalid @enderror"
                                value="{{ old('induk_jantan') }}" name="induk_jantan" autocomplete="off"
                                id="exampleFormControlSelect1">
                                <option value="" {{ ''===old('induk_jantan') ? 'selected' : '' }}>Pilih
                                </option>
                                <option value="1">Induk Jantan 1</option>
                                <option value="2">Induk Jantan 2</option>
                            </select>
                            @error('induk_jantan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="induk_betina">Induk Betina</label>
                            <select class="form-control @error('induk_betina') is-invalid @enderror"
                                value="{{ old('induk_betina', $value->induk_betina) }}" name="induk_betina"
                                autocomplete="off" id="exampleFormControlSelect1">
                                <option value="" {{ ''===old('induk_betina') ? 'selected' : '' }}>Pilih
                                </option>
                                <option value="2">Induk Betina 2</option>
                            </select>
                            @error('induk_betina')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="turunan_ke">Turunan Ke</label>
                            <input type="number" class="form-control  @error('turunan') is-invalid
                                    @enderror" value="{{ old('turunan', $value->turunan) }}" id="turunan_ke"
                                name="turunan">
                            @error('turunan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="keterangan">Deskripsi atau Keterangan</label>
                            <textarea class="form-control  @error('keterangan') is-invalid
                                    @enderror" value="" id="keterangan" name="keterangan"
                                rows="3">{{ $value->keterangan }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus --}}
@foreach($data as $value)
<div class="modal fade" id="modalHapus{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Apakah Anda Yakin Ingin Menghapus Data?</h5>
            </div>
            <form id="formHapus" method="post" action="{{ url('admin/home/domba/delete/'.$value->id) }}">
                @csrf
                @method('DELETE')
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