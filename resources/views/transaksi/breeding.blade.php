@extends('layouts.template')
@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Breeding</h4>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route ('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Breeding</li>
                </ol>
            </nav>
        </div>
    </div>
</div>



<!--Table-->
<div class="card">
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Data Pembelian</th>
                    <th>Bukti Transfer</th>
                    <th>Audio Akad</th>
                    <th>Status Antrian</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <p class="text-lg-start" style="color: #228896; font-weight: 700">09876545678</p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">21-07-2023 14:46:31</p>
                        <p class="text-lg-start" style="color: #3B484A">Gojo Santoryu</p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primairy" href=""
                            style="background-color: #228896; color:white" data-bs-toggle="modal"
                            data-bs-target="#modalGambar">
                            <span class="btn-label">Lihat Gambar</span></button>
                    </td>
                    <td>
                        <audio controls autoplay>
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/ogg">
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/mpeg">
                        </audio>
                    </td>
                    <td><span class="badge text-bg-success">Selesai</span></td>

                    <td>
                        <button type="button" class="btn btn-warning" href="" data-bs-toggle="modal"
                            data-bs-target="#modalTambah">
                            <span class="btn-label"><i class="bi bi-pencil"></i></span></button>
                        <button type="button" class="btn btn-success" href="" data-bs-toggle="modal"
                            data-bs-target="#modal">
                            <span class="btn-label"><i class="bi bi-check-lg"></i></span></button>
                        <button type="button" class="btn btn-danger" href="" data-bs-toggle="modal"
                            data-bs-target="#modalHapus">
                            <span class="btn-label"><i class="bi bi-x-lg"></i></span></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <p class="text-lg-start" style="color: #228896; font-weight: 700">09876545678</p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">21-07-2023 14:46:31</p>
                        <p class="text-lg-start" style="color: #3B484A">Gojo Santoryu</p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primairy" href=""
                            style="background-color: #228896; color:white" data-bs-toggle="modal"
                            data-bs-target="#modalGambar">
                            <span class="btn-label">Lihat Gambar</span></button>
                    </td>
                    <td>
                        <audio controls autoplay>
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/ogg">
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/mpeg">
                        </audio>
                    </td>
                    <td><span class="badge text-bg-warning">Diproses</span></td>

                    <td>
                        <button type="button" class="btn btn-warning" href="" data-bs-toggle="modal"
                            data-bs-target="#modalTambah">
                            <span class="btn-label"><i class="bi bi-pencil"></i></span></button>
                        <button type="button" class="btn btn-success" href="" data-bs-toggle="modal"
                            data-bs-target="#modal">
                            <span class="btn-label"><i class="bi bi-check-lg"></i></span></button>
                        <button type="button" class="btn btn-danger" href="" data-bs-toggle="modal"
                            data-bs-target="#modalHapus">
                            <span class="btn-label"><i class="bi bi-x-lg"></i></span></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <p class="text-lg-start" style="color: #228896; font-weight: 700">09876545678</p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">21-07-2023 14:46:31</p>
                        <p class="text-lg-start" style="color: #3B484A">Gojo Santoryu</p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primairy" href=""
                            style="background-color: #228896; color:white" data-bs-toggle="modal"
                            data-bs-target="#modalGambar">
                            <span class="btn-label">Lihat Gambar</span></button>
                    </td>
                    <td>
                        <audio controls autoplay>
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/ogg">
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/mpeg">
                        </audio>
                    </td>
                    <td><span class="badge text-bg-primary">Diajukan</span></td>

                    <td>
                        <button type="button" class="btn btn-warning" href="" data-bs-toggle="modal"
                            data-bs-target="#modalTambah">
                            <span class="btn-label"><i class="bi bi-pencil"></i></span></button>
                        <button type="button" class="btn btn-success" href="" data-bs-toggle="modal"
                            data-bs-target="#modal">
                            <span class="btn-label"><i class="bi bi-check-lg"></i></span></button>
                        <button type="button" class="btn btn-danger" href="" data-bs-toggle="modal"
                            data-bs-target="#modalHapus">
                            <span class="btn-label"><i class="bi bi-x-lg"></i></span></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <p class="text-lg-start" style="color: #228896; font-weight: 700">09876545678</p>
                        <p class="text-lg-start" style="color: #3B484A; font-weight: 700">21-07-2023 14:46:31</p>
                        <p class="text-lg-start" style="color: #3B484A">Gojo Santoryu</p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primairy" href=""
                            style="background-color: #228896; color:white" data-bs-toggle="modal"
                            data-bs-target="#modalGambar">
                            <span class="btn-label">Lihat Gambar</span></button>
                    </td>
                    <td>
                        <audio controls autoplay>
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/ogg">
                            <source src="{{ asset('audio/audio.mp3')}}" type="audio/mpeg">
                        </audio>
                    </td>
                    <td><span class="badge text-bg-danger">Batal</span></td>

                    <td>
                        <button type="button" class="btn btn-warning" href="" data-bs-toggle="modal"
                            data-bs-target="#modalTambah">
                            <span class="btn-label"><i class="bi bi-pencil"></i></span></button>
                        <button type="button" class="btn btn-success" href="" data-bs-toggle="modal"
                            data-bs-target="#modal">
                            <span class="btn-label"><i class="bi bi-check-lg"></i></span></button>
                        <button type="button" class="btn btn-danger" href="" data-bs-toggle="modal"
                            data-bs-target="#modalHapus">
                            <span class="btn-label"><i class="bi bi-x-lg"></i></span></button>
                    </td>
                </tr>



            </tbody>
        </table>
    </div>
</div>

{{-- modal gambar --}}
<div class="modal fade" id="modalGambar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Bukti Trnasfer</h5>
            </div>

            <div class="modal-body">
                <div class="col">
                    <div class="text-center">

                        <img src="{{ asset('assets/images/bukti.jpg') }}" alt="">


                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn" style="background-color: #228896; color: white;">Unduh</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{--Modal Tambah--}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{-- <form action="{{ route('domba.store') }}" method="post" enctype="multipart/form-data">
                @csrf --}}
                <div class="modal-header" style="background-color: #212E30; color: white">
                    <h4 class="modal-title" id="myModalLabel17">Input Data Domba</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                value="{{ old('jenis_kelamin') }}" name="jenis_kelamin" autocomplete="off"
                                id="exampleFormControlSelect1">
                                <option value="" {{ ''===old('jenis_kelamin') ? 'selected' : '' }}>Pilih
                                </option>
                                <option value="Laki-Laki" {{ 'Laki-Laki'===old('jenis_kelamin') ? 'selected' : '' }}>
                                    Jantan
                                </option>
                                <option value="Perempuan" {{ 'Perempuan'===old('jenis_kelamin') ? 'selected' : '' }}>
                                    Betina</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="id_jenis">Jenis Domba</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            </select>


                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid
                                @enderror" value="{{ old('tgl_lahir') }}" id="tgl_lahir" name="tgl_lahir">
                            @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control @error('gambar') is-invalid
                                @enderror" value="{{ old('gambar') }}" value="" id="foto" name="gambar">
                            @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bobot">Bobot</label>
                            <input type="number" class="form-control  @error('bobot') is-invalid
                                @enderror" value="{{ old('bobot') }}" id="bobot" name="bobot"
                                placeholder="Masukkan Bobot">
                            @error('bobot')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="harga_jual">Perkiraan Harga Jual</label>
                            <input type="text" step="0.01"
                                class="money form-control @error('harga_jual') is-invalid @enderror"
                                value="{{ old('harga_jual') }}" id="harga_jual" name="harga_jual"
                                placeholder="Masukkan Perkiraan Harga Jual">
                            @error('harga_jual')
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
                                value="{{ old('induk_betina') }}" name="induk_betina" autocomplete="off"
                                id="exampleFormControlSelect1">
                                <option value="{{ ''===old('induk_betina') ? 'selected' : '' }}">Pilih
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
                            <label for="tipe_domba">Tipe Domba</label>
                            <select class="form-control @error('tipe_domba') is-invalid @enderror"
                                value="{{ old('tipe_domba') }}" name="tipe_domba" autocomplete="off"
                                id="exampleFormControlSelect1">
                                <option value="" {{ ''===old('tipe_domba') ? 'selected' : '' }}>Pilih
                                </option>
                                <option value="Trading" {{ 'Trading'===old('tipe_domba') ? 'selected' : '' }}>
                                    Trading
                                </option>
                                <option value="Breeding" {{ 'Breeding'===old('tipe_domba') ? 'selected' : '' }}>
                                    Breeding</option>
                            </select>
                            @error('tipe_domba')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="turunan_ke">Turunan Ke</label>
                            <input type="number" class="form-control  @error('turunan') is-invalid
                                @enderror" value="{{ old('turunan') }}" id="turunan_ke" name="turunan">
                            @error('turunan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="keterangan">Deskripsi atau Keterangan</label>
                            <textarea class="form-control  @error('keterangan') is-invalid
                                @enderror" value="{{ old('keterangan') }}" id="keterangan" name="keterangan"
                                placeholder="Masukkan Keterangan" rows="3">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-3">
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

{{-- Modal Hapus --}}
<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Hapus Data Customer</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                Yakin untuk menghapus data?
            </div>
            <form>

                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Yakin</button>
                </div>
            </form>
        </div>
    </div>



    @endsection