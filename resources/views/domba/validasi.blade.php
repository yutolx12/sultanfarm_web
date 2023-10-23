@extends('layouts.template')
@section('content')
    <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Validasi Domba</h4>
    </h4>

    <div class="card">
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Domba</th>
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="{{ asset('landing/img/detaildomba.png') }}" class="rounded float-left"
                                alt="Responsive image" width="150px">
                        </td>
                        <td>D1XX2308300001 <br>
                            Batur <br>
                            Bobot 10 Kg <br>
                            Jantan <br>
                            Umur 1 Hari </td>
                        <td>
                            <div class="badges">
                                <span class="badge bg-success">Dari Input Domba</span>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn" style="border-color: #228896; color: #228896;"
                                href=""data-bs-toggle="modal" data-bs-target="#modalEdit">
                                <span class="btn-label"><i class="bi bi-pencil-fill"></i></span></button>
                            <button type="button" class="btn" style="border-color: #F04747; color: #F04747;"
                                href="" data-bs-toggle="modal" data-bs-target="#modalHapus">
                                <span class="btn-label"><i class="bi bi-trash-fill"></i></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Data Validasi</h5>
                </div>
                <form id="formEdit" method="" action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Perkiraan Harga Jual (Rp)</label>
                                <input type="text" class="form-control" style="border-color: #A2A9AA;">
                            </div>
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

    {{-- modal hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                    <h5 class="modal-title" id="exampleModalLabel1">Apakah Anda Yakin Ingin Menghapus Data?</h5>
                </div>
                <form id="formHapus" method="GET" action="">
                    @csrf
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
@endsection
