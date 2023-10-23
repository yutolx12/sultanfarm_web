@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
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
        "closeButton": false
        , "debug": false
        , "newestOnTop": false
        , "progressBar": false
        , "positionClass": "toast-top-right"
        , "preventDuplicates": false
        , "onclick": null
        , "showDuration": "300"
        , "hideDuration": "1000"
        , "timeOut": "5000"
        , "extendedTimeOut": "1000"
        , "showEasing": "swing"
        , "hideEasing": "linear"
        , "showMethod": "fadeIn"
        , "hideMethod": "fadeOut"
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

<div class="page-title mt-0">
  <div class="row align-items-center">
    <div class="col-12 col-md-6">
      <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Data Pegawai</h4>
    </div>
  </div>
</div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="">Input Pegawai</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('pegawai') }}">Data Pegawai</a>
  </li>
</ul>
<div class="card">
  @if (session('success'))
  <div class="alert alert-success" id="alert" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="card-body">
    <form action="{{ route('pegawai.store') }}" method="post">
      @csrf
      <p class="text-lg-start" style="font-size: 18px; color: #0B4149; font-weight: 600">Input Pegawai Baru</p>
      <hr class="hr hr-blurry" />
      <div class="container">
        <div class="row mb-3">
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">NIP Pegawai</p>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}"
              name="nip" placeholder="Isi NIP Pegawai">
            @error('nip')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Nama Pegawai</p>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
              name="name" placeholder="Isi Nama Pegawai">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control mt-3 @error('jenis_kelamin') is-invalid @enderror"
              value="{{ old('jenis_kelamin') }}" name="jenis_kelamin" autocomplete="off" id="exampleFormControlSelect1">
              <option value="" {{ 'pilih'===old('jenis_kelamin') ? 'selected' : '' }}>Pilih
              </option>
              <option value="Laki-Laki" {{ 'Laki-Laki'===old('jenis_kelamin') ? 'selected' : '' }}>
                Laki-Laki
              </option>
              <option value="Perempuan" {{ 'Perempuan'===old('jenis_kelamin') ? 'selected' : '' }}>
                Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mb-3">
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Alamat</p>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"
              name="alamat" placeholder="Isi Alamat">
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">No. Telepon</p>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}"
              name="no_telp" placeholder="Isi No. Telepon">
            @error('no_telp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">E-Mail</p>
            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
              name="email" placeholder="Isi E-Mail">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mb-3">
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Password</p>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
              value="{{ old('password') }}" name="password" placeholder="Isi Password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <label for="jenis_kelamin">Role</label>
            <select class="form-control mt-3 @error('role') is-invalid @enderror" value="{{ old('role') }}" name="role"
              autocomplete="off" id="exampleFormControlSelect1">
              <option value="" {{ ''===old('role') ? 'selected' : '' }}>Pilih
              </option>
              <option value="admin" {{ 'admin'===old('role') ? 'selected' : '' }}>
                Admin
              </option>
              <option value="pemilik" {{ 'pemilik'===old('role') ? 'selected' : '' }}>
                Pemilik</option>
            </select>
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col">
            <p class="text-lg-start" style="color: #4E5B5C">Tambah Pegawai</p>
            <button type="submit" class="btn btn-primary" style="background-color: #228896;" href="#">
              <span class="btn-label">Tambah</span></button>
          </div>


        </div>
      </div>
    </form>
  </div>
</div>
@endsection
