@extends('layouts.template')
@section('content')

<div class="page-title mt-0">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">History Pembelian</h4>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end">
            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"
                style="background-color: #228896; color: white"> <i class="bi bi-printer"></i> Laporan Pembelian
            </button>
        </div>
    </div>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="{{ route('pembelian') }}">Pembelian</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('historypembelian') }}">History Pembelian</a>
    </li>
</ul>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered" id="table1">
            <thead>
                <tr>
                    <th class="text-sm">No</th>
                    <th class="text-sm">Id Pembelian</th>
                    <th class="text-sm">Tanggal</th>
                    <th class="text-sm">Total</th>
                    <th class="text-sm">Domba</th>
                    <th class="text-sm">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-sm">{{ $loop->iteration }}</td>
                    <td class="text-sm">{{ $item->kode_pembelian }}</td>
                    <td class="text-sm">{{ $item->tgl_pembelian }}</td>
                    <td class="text-sm">{{ $item->total }} </td>
                    <td class="text-sm">@foreach ($item->dombas as $domba)
                        - {{ $domba->kode_domba }} | {{ $domba->jenis_kelamin }} | Rp. {{ $domba->harga_beli }} <br>
                        @endforeach</td>
                    <td class="text-sm">
                        <button type="button" class="btn-sm btn btn-primary"
                            style="background-color: #228896; color: white" href="" data-bs-toggle="modal"
                            data-bs-target="#modalEdit">
                            <span class="btn-label"><i class="bi bi-printer"></i></span></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- modal cetak --}}
<div class="modal fade" id="modalCetak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Cetak Laporan Pembelian</h5>
            </div>
            <form id="formCetak" method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Mulai Tanggal</label>
                                <fieldset>
                                    <div class="input">
                                        <input type="date" class="form-control" style="border-color: #E6E1E5;">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Sampai Tanggal</label>
                                <fieldset>
                                    <div class="input">
                                        <input type="date" class="form-control" style="border-color: #E6E1E5;">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #228896; color: white;">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection