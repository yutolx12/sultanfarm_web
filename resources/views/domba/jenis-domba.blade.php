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
                <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Jenis Domba</h4>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-end">
                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modaltambah"
                    style="background-color: #228896; color: white"> Tambah Jenis Domba
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
                        <th>Jenis Domba</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img style="width: 150px; height: 100px;  border-radius: 5%;"
                                    src="{{ asset('images/' . $value->gambar) }}"></td>
                            <td class="text-sm">Jenis Domba : {{ $value->jenis_domba }}<br>
                                Kode Ras : {{ $value->kode }}<br>
                                Urutan Ke : {{ $value->urutan }}</td>
                            <td>
                                <div class="btn-group ">
                                    <button type="button" class="btn btn-sm btn-warning" href=""
                                        data-bs-toggle="modal" data-bs-target="#modaledit{{ $value->id }}">
                                        <span class="btn-label "><i class="bi bi-pencil-fill"></i></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" href=""
                                        data-bs-toggle="modal" data-bs-target="#modalhapus{{ $value->id }}">
                                        <span class="btn-label"><i class="bi bi-trash-fill"></i></span>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data->onEachSide(1)->links() }}


        </div>
    </div>

    <!--large size Modal -->
    <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modaltambah"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('jenisdomba.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header" style="background-color: #212E30; color:white">
                        <h4 class="modal-title" id="myModalLabel17">Input Jenis Domba</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="jenis_domba">Jenis Domba</label>
                                <input type="text" class="form-control @error('jenis_domba') is-invalid @enderror"
                                    value="{{ old('jenis_domba') }}" id="jenis_domba" name="jenis_domba"
                                    placeholder="Masukkan Jenis Domba" autocomplete="off">
                                @error('jenis_domba')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="kode">Kode</label>
                                <input type="text"
                                    class="form-control @error('kode') is-invalid
                            @enderror"
                                    value="{{ old('kode') }}" id="kode" name="kode" placeholder="Ex: A"
                                    autocomplete="off">
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="foto">Foto</label>
                                <input type="file"
                                    class="form-control @error('gambar') is-invalid
                            @enderror"
                                    value="{{ old('gambar') }}" id="foto" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="urutan">Urutan</label>
                                <input type="number"
                                    class="form-control @error('urutan') is-invalid
                            @enderror"
                                    value="{{ old('urutan') }}" id="urutan" name="urutan">
                                @error('urutan')
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

    @foreach ($data as $value)
        <div class="modal fade text-left" id="modaledit{{ $value->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modaledit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #212E30; color: white">
                        <h4 class="modal-title">Update Jenis Domba</h4>
                        <button type="button" style="color: black" data-bs-dismiss="modal" aria-label="Close">
                            x
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/home/jenisdomba/updateimage/' . $value->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
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
                                    <button type=" submit" class="btn btn-success" background-color: #228896>Update
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ url('admin/home/jenisdomba/update/' . $value->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="jenis_domba">Jenis Domba</label>
                                <input type="text"
                                    class="form-control  @error('jenis_domba') is-invalid
                            @enderror"
                                    value="{{ old('jenis_domba', $value->jenis_domba) }}" id=" jenis_domba"
                                    name="jenis_domba" placeholder="Masukkan Jenis Domba" autocomplete="off">
                                @error('jenis_domba')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="kode">Kode</label>
                                    <input type="text"
                                        class="form-control @error('kode') is-invalid
                            @enderror"
                                        value="{{ old('kode', $value->kode) }}" id="kode" name="kode"
                                        placeholder="Ex: A" autocomplete="off">
                                    @error('kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="urutan">Urutan</label>
                                    <input type="number"
                                        class="form-control @error('urutan') is-invalid
                            @enderror"
                                        value="{{ old('urutan', $value->urutan) }}" id="urutan" name="urutan">
                                    @error('urutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Batal</span>
                                </button>
                                <button type="submit" class="btn ml-1" data-bs-dismiss="modal"
                                    style="background-color: #228896">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($data as $value)
        <div class="modal fade text-left" id="modalhapus{{ $value->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalhapus" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('jenisdomba.delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Hapus Jenis Domba</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            Yakin untuk menghapus jenis domba {{ $value->jenis_domba }}
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
@endsection
