@extends('layouts.template')
@section('content')

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
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="kelahiran">Kelahiran</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('historykelahiran') }}">History Kelahiran</a>
  </li>
</ul>
<div class="card">
  <form action="{{ route('kelahiran.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 800">Kelahiran Domba Baru</p>
      <hr class="hr hr-blurry" />
      <div class="container">
        <div class="row mb-3">
            <div class="col">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control mt-3">
                  <option value="">Pilih
                  </option>
                  <option value="">
                    Jantan
                  </option>
                  <option value="">
                    Betina</option>
                </select>
              </div>
          <div class="col">
            <label for="jenis_kelamin">Induk Betina</label>
            <select class="form-control mt-3">
              <option value="">Pilih
              </option>
              <option value="">
                Induk 1
              </option>
              <option value="">
                Induk 2</option>
            </select>
          </div>

          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Tanggal Lahir</p>
            <fieldset>
              <div class="input">
              <input type="date" class="form-control" style="border-color: #E6E1E5;">
              </div>
            </fieldset>
          </div>

          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Tambah Kelahiran</p>
            <button type="submit" class="btn btn-primary" style="background-color: #228896;" href="#">
              <span class="btn-label">Tambah</span></button>
          </div>
        </div>

</div>


      {{-- <div class="row">
        <div class="d-flex justify-content-end">
          <button class="btn btn-sm" type="submit" style="background-color: #228896; color: white"> Tambah
            Domba
          </button>
        </div>
      </div> --}}
    </div>
  </form>
</div>
@endsection
