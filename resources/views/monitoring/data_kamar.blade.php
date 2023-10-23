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
                <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Kamar</h4>
            </div>
        </div>
    </div>

    <!--Nav Tab-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{ route('data_kamera') }}">Kamera</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('data_plasma') }}">Plasma</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('data_kamar') }}">Kamar</a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kamar.store') }}" method="post">
                @csrf
                <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Tambah Data Kamar</p>
                <hr class="hr hr-blurry">
                <div class="row">
                    <div class="col-md-5">
                        <label class="text-sm" style="font-weight: 500;" for="">Plasma</label>
                        <div class="input-group">
                            <select class="form-control form-control-sm @error('id_plasma') is-invalid @enderror"
                                name="id_plasma">
                                <option value="" {{ old('id_plasma') === '' ? 'selected' : '' }}>Pilih</option>
                                @foreach ($plasma as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('id_plasma') === $value->id ? 'selected' : '' }}>
                                        Plasma {{ $loop->iteration }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_plasma')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="text-sm" style="font-weight: 500;" for="">Kamar</label>
                        <input type="number"
                            class="form-control form-control-sm @error('no_kamar') is-invalid
                        @enderror"
                            value="{{ old('no_kamar') }}" id="no_kamar_ke" name="no_kamar">
                        @error('no_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 btn-sm" style="background-color: #228896;">
                            <span class="btn-label">Tambah</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Card-->
    <div class="card">
        <div class="card-body">
            <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Kamar</p>
            <hr class="hr hr-blurry" />
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Plasma</th>
                        <th>No Kamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Plasma
                                    {{ $loop->iteration }}
                                </p>
                            </td>
                            <td>
                                List kamar <br>
                                @foreach ($item->kamar as $value)
                                    Kamar : {{ $value->no_kamar }} ({{$value->status}}) <br>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn btn-sm btn-warning" href=""
                                        data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                        <span class="btn-label "><i class="bi bi-pencil-fill"></i></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($data as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kamar</h5>
                    </div>
                    @csrf
                    <div class="modal-body">
                        <div class="col">
                            <div class="mb-3">
                                <p>Data Kamar {{ $item->alamat_plasma }}</p>
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>kamar</th>
                                            <th>Status Kamar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->kamar as $value)
                                            <tr>
                                                <form action="{{ url('admin/home/data_kamar/update/' . $value->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><input type="text" class="form-control" name="no_kamar"
                                                            value="{{ $value->no_kamar }}"></td>
                                                    <td> <select class="form-control @error('status') is-invalid @enderror"
                                                            value="{{ old('status', $value->status) }}" name="status"
                                                            autocomplete="off" id="exampleFormControlSelect1">
                                                            <option>{{ $value->status }}</option>
                                                            <option value="Tersedia"
                                                                {{ 'Tersedia' === old('status') ? 'selected' : '' }}>
                                                                Tersedia
                                                            </option>
                                                            <option value="Tidak Tersedia"
                                                                {{ 'Tidak Tersedia' === old('status') ? 'selected' : '' }}>
                                                                Tidak Tersedia</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <div class="btn-group ">
                                                            <button type="submit" class="btn btn-sm btn-success"
                                                                href="" data-bs-toggle="modal">
                                                                <span class="btn-label "><i
                                                                        class="bi bi-pencil-fill"></i></span>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                href="" data-bs-toggle="modal"
                                                                data-bs-target="#modalhapus{{ $value->id }}">
                                                                <span class="btn-label"><i
                                                                        class="bi bi-trash-fill"></i></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!--Card-->
    {{-- <div class="card">
        <div class="card-body">
            <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Kamar</p>
            <hr class="hr hr-blurry" />

            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Plasma</th>
                        <th>No Kamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Plasma
                                    {{ $loop->iteration }}
                                </p>
                            </td>
                            <td>
                                List kamar <br>
                                @foreach ($item->kamar as $value)
                                    Kamar : {{ $value->no_kamar }} <br>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn btn-sm btn-warning" href=""
                                        data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                        <span class="btn-label "><i class="bi bi-pencil-fill"></i></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    {{-- @foreach ($data as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kamar</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col">
                            <div class="mb-3">
                                <p>Data Kamar {{ $item->alamat_plasma }}</p>
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>kamar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->kamar as $value)
                                            <form method="POST" action="{{ route('kamar.update', $value->id) }}">
                                                @csrf
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="no_kamar"
                                                            value="{{ $value->no_kamar }}">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="submit" class="btn btn-sm btn-warning">
                                                                <span class="btn-label"><i
                                                                        class="bi bi-pencil-fill"></i></span>
                                                            </button>
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <span class="btn-label"><i
                                                                        class="bi bi-trash-fill"></i></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}


    @foreach ($data as $item)
        @foreach ($item->kamar as $value)
            <div class="modal fade text-left" id="modalhapus{{ $value->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modalhapus" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-sm" role="document">
                    <div class="modal-content">
                        <form action="{{ route('jenisdomba.delete') }}" method="get">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">Hapus Jenis Domba</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{ $value->id }}">
                                Yakin untuk menghapus Kamar {{ $value->no_kamar }}
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Batal</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal"
                                    style="background-color: #228896">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">hapus</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
