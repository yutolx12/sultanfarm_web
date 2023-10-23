@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">


    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Landing Page</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Landing Page</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!--Nav Tab-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " aria-current="page"
                href="@if (Auth::user()->role == 'pemilik') {{ route('landingpage') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.landingpage') }} @endif">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active"
                href="@if (Auth::user()->role == 'pemilik') {{ route('galery') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.galery') }} @endif">Galeri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                href="@if (Auth::user()->role == 'pemilik') {{ route('sosialmedia') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.sosialmedia') }} @endif">Sosial
                Media</a>
        </li>
        <li class="nav-item">
            <a class="nav-link "
                href="@if (Auth::user()->role == 'pemilik') {{ route('slider') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.slider') }} @endif">Slider</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                href="@if (Auth::user()->role == 'pemilik') {{ route('footer') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.footer') }} @endif">Footer</a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <button class="btn float-end" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white"><i class="bi bi-plus-lg"></i> Tambah</button>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Caption</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galerys as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img style="width: 150px; height: 100px;  border-radius: 5%;"
                                    src="{{ asset('images/' . $item->gambar) }}" class="rounded float-left">
                            </td>
                            <td>{{ $item->caption }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <button type="button" class="btn" style="border-color: #228896; color: #228896;"
                                    href=""data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                    <span class="btn-label"><i class="bi bi-pencil-fill"></i></span></button>
                                <button type="button" class="btn" style="border-color: #F04747; color: #F04747;"
                                    href="" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->id }}">
                                    <span class="btn-label"><i class="bi bi-trash-fill"></i></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                    <h5 class="modal-title" id="exampleModalLabel1">Input Foto Galery</h5>
                </div>
                <form id="formTambah" method="POST" action="{{ route('galery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="gambar" class="fw-normal">Foto Slider</label>
                                <input type="file" class="form-control" style="border-color: #A2A9AA;" id="gambar"
                                    name="gambar" placeholder="Silahkan Isi" value="{{ old('gambar') }}">
                            </div>
                            <div class="form-group">
                                <label for="caption" class="fw-normal">Caption</label>
                                <input type="text" class="form-control" style="border-color: #A2A9AA;" id="caption"
                                    name="caption" placeholder="Silahkan Isi" value="{{ old('caption') }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="fw-normal">Deskripsi</label>
                                <input type="text" class="form-control" style="border-color: #A2A9AA;" id="deskripsi"
                                    name="deskripsi" placeholder="Silahkan Isi" value="{{ old('deskripsi') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn"
                            style="background-color: #228896; color: white;">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($galerys as $value)
        <div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit Jenis Domba</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/home/pengaturan/updateimage/' . $value->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <img width="100%;" style="border: gray; bo" height="100%;"
                                    src="{{ asset('images/' . $value->gambar) }}" alt="">
                            </div>
                            <div class="row form-group">
                                <div class="col-md-9">
                                    <input type="file" name="gambar"
                                        class="form-control @error('gambar')is-invalid
                        @enderror">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <button type=" submit" class="btn"
                                        style="background-color: #228896; color: white;">Update
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ url('admin/home/pengaturan/update/' . $value->id) }}">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="basicInput" class="fw-normal">Caption</label>
                                    <input type="text" class="form-control" style="border-color: #A2A9AA;"
                                        id="caption" name="caption" value="{{ $value->caption }}">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput" class="fw-normal">Deskripsi</label>
                                    <input type="text" class="form-control" style="border-color: #A2A9AA;"
                                        id="deskripsi" name="deskripsi" value="{{ $value->deskripsi }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button type="submit" class="btn"
                                    style="background-color: #228896; color: white;">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- modal hapus --}}
    @foreach ($galerys as $value)
        <div class="modal fade" id="modalHapus{{ $value->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                        <h5 class="modal-title" id="exampleModalLabel1">Apakah Anda Yakin Ingin Menghapus Data?</h5>
                    </div>
                    <form id="formHapus" action="{{ route('galery.destroy', $value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn"
                                style="background-color: #228896; color: white;">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
