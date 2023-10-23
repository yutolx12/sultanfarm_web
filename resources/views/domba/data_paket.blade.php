@extends('layouts.template')
@section('content')

<div class="page-title mt-0">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Data Paket</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('paket.store') }}" method="post">
            @csrf
            <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Tambah Data Paket</p>
            <hr class="hr hr-blurry" />
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" placeholder="Isi Nama Paket">
                </div>
                <div class="col-md-6">
                    <label for="">Keterangan Paket</label>
                    <textarea type="text" class="form-control" name="keterangan" placeholder="Isi Keterangan">
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="btn btn-sm" type="submit" style="background-color: #228896; color: white"> Tambah
                        Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<!--Card-->
<div class="card">
    <div class="card-body">
        <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Paket</p>
        <hr class="hr hr-blurry" />
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A;">{{ $value->nama_paket }}</p>
                    </td>
                    <td>
                        <p class="text-lg-start" style="color: #3B484A;">{{ $value->keterangan }}</p>
                    </td>
                    <td>
                        <div class="btn-group ">
                            <button type="button" class="btn btn-sm btn-warning" href="" data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $value->id }}">
                                <span class="btn-label "><i class="bi bi-pencil-fill"></i></span>
                            </button>
                            <a type="button" class="btn btn-sm btn-danger"
                                href="{{ url('admin/home/data_paket/delete/'. $value->id) }}">
                                <span class="btn-label"><i class="bi bi-trash-fill"></i></span>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach ($data as $value)
<div class="modal fade" id="modalEdit{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Paket</h5>
            </div>
            <form action="{{ url('admin/home/data_paket/update/'. $value->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Nama Paket</label>
                            <input type="text" value="{{ $value->nama_paket }}" class="form-control"
                                placeholder="Isi Nama Paket" name="nama_paket">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="fw-normal">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan"
                                placeholder="Isi Keterangan">{{ $value->keterangan }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection