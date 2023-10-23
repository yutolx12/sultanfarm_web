@extends('layouts.template')
@section('content')

<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Monitoring Domba</h4>

      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Monitoring Domba</li>
              </ol>
          </nav>
      </div>
  </div>
    </div>

<div class="card">
    <div class="card-body">

<!--Table-->
<table class="table" id="table1">
  <thead>
      <tr>
          <th>No</th>
          <th>Kode Domba</th>
          <th>Nama Customer</th>
          <th>No Plasma & Kamar</th>
          <th>Aksi</th>


      </tr>
  </thead>
  <tbody>
      <tr>
          <td>1</td>
          <td>
            <p class="text-lg-start" style="color: #3B484A; font-weight: 700">D1EF2309090001</p>
          </td>
          <td>
              <p class="text-lg-start" style="color: #3B484A">Edy Attohila</p>
          </td>
          <td>Plasma 1 Kammar 2</td>
          <td>  <a class="btn btn-outline-primary" data-bs-toggle="modal" style="border-color: #228896; color: #228896;"
            data-bs-target="#modalEdit">
            <i class="bi bi-pencil" style="color:#228896;"></i>
        </a>
        <a class="btn btn-primary"  style="background-color: #228896; color: white"  href="{{ route('monitor') }}">
            <i class="bi bi-display"></i>
        </a></td>

      </tr>

      <tr>
        <td>2</td>
        <td>
          <p class="text-lg-start" style="color: #3B484A; font-weight: 700">D1EF2309090001</p>
        </td>
        <td>
            <p class="text-lg-start" style="color: #3B484A">Faisal</p>
        </td>
        <td>Plasma 1 Kammar 2</td>
        <td>  <a class="btn btn-outline-primary" data-bs-toggle="modal" style="border-color: #228896; color: #228896;"
          data-bs-target="#modalEdit">
          <i class="bi bi-pencil" style="color:#228896;"></i>
      </a>
      <a class="btn btn-primary"  style="background-color: #228896; color: white" href="{{ route('monitor') }}">
          <i class="bi bi-display"></i>
      </a></td>

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
              <h5 class="modal-title" id="exampleModalLabel1">Edit Nomor Plasma & Kamar</h5>
          </div>
          <form id="formEdit" method="POST" action="#">
              @csrf
              <div class="modal-body">
                      <div class="col">
                          <div class="mb-3">
                            <div class="input-group">
                                <select class="form-control form-control-sm">
                                    <option value="" >Pilih</option>

                                    <option value="">Plasma </option>

                                </select>

                            </div>
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


@endsection
