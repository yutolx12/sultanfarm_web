@extends('layouts.template')
@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4 class="py-3 mb-4 fw-normal" style="color: #228896">Data Kamera</h4>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route ('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kamera</li>
                </ol>
            </nav>
        </div>
    </div>
      </div>

  <!--Nav Tab-->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ route('data_kamera') }}">Kamera</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('data_plasma') }}">Plasma</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data_kamar') }}">Kamar</a>
      </li>
  </ul>

<div class="card">
    <div class="card-body">


<p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Tambah Data Kamera</p>

<hr class="hr hr-blurry" />

   <!--Container 1-->
   <div class="container">
    <div class="row">
    <div class="col">
    <p class="text-lg-start" style="color: #4E5B5C">Nama Kamera</p>
    <input type="text" class="form-control" placeholder="Isi Nama Kamera">
    </div>
  
    <div class="col">
    <p class="text-lg-start" style="color: #4E5B5C">IP Kamera</p>
    <input type="text" class="form-control" placeholder="Isi IP Kamera">
    </div>

    <div class="col">
        <p class="text-lg-start" style="color: #4E5B5C">Keterangan</p>
        <input type="text" class="form-control" placeholder="Keterangan">
        </div>

        <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Tambah Kamera</p>
            <button type="button" class="btn btn-primary" style="background-color: #228896;" href="#">
                <span class="btn-label">Tambah</span></button>
            </div>
  </div>
  </div>
<br>



</div>
</div>
    

<!--Card-->
<div class="card">
  <div class="card-body">
      <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Data Kamera</p>
      <hr class="hr hr-blurry" />

      <table class="table" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kamera</th>
                <th>IP Kamera</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td> 
                    <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Camera 1</p>
                    <p class="text-lg-start" style="color: #228896">Kondisi Baik</p>
                </td>
                <td> 
                    <p class="text-lg-start" style="color: #3B484A; font-weight: 700">IP 12345678</p>

                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary" style="color: #228896;" data-bs-toggle="modal" data-bs-target="#modalEdit">
                        <span class="btn-label"><i class="bi bi-pencil-fill"></i></span></button>
                    <button type="button" class="btn btn-outline-danger" style="color: #F04747;">
                    <span class="btn-label"><i class="bi bi-trash-fill"></i></span></button>
                   
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td> 
                    <p class="text-lg-start" style="color: #3B484A; font-weight: 700">Camera 1</p>
                    <p class="text-lg-start" style="color: #228896">Kondisi Baik</p>
                </td>
                <td> 
                    <p class="text-lg-start" style="color: #3B484A; font-weight: 700">IP 12345678</p>

                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary" style="color: #228896;" data-bs-toggle="modal" data-bs-target="#modalEdit">
                        <span class="btn-label"><i class="bi bi-pencil-fill"></i></span></button>
                    <button type="button" class="btn btn-outline-danger" style="color: #F04747;" >
                    <span class="btn-label"><i class="bi bi-trash-fill"></i></span></button>
                   
                </td>
            </tr>
           
            
           
           
        
           
           
        </tbody>
    </table>
      
  </div>
</div>

{{-- modal edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212E30; color: #E7E9E9;">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kamera</h5>
            </div>
            <form id="formEdit" method="POST" action="#">
                @csrf
                <div class="modal-body">
                        <div class="col">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="basicInput" class="fw-normal">Nama Kamera</label>
                                    <input type="text" class="form-control" placeholder="Isi Nama Kamera">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="basicInput" class="fw-normal">Nama IP Kamera</label>
                                    <input type="text" class="form-control" placeholder="Isi IP Kamera">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="basicInput" class="fw-normal">Keterangan</label>
                                    <input type="text" class="form-control" placeholder="Isi Keterangan">
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