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

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('penjualan') }}">Penjualan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('antrian') }}">Antrian</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('historypenjualan') }}">History Penjualan</a>
  </li>
</ul>
<div class="card">
  <div class="card-body">
    <div id="success-message" class="alert alert-success" style="display: none;"></div>
    <div class="row">
      <div class="col-md-6">
        <label for="id_domba">Cari Domba</label>
        <div class="input-group">
          <select class="form-control" id="id_domba">
            @foreach ($domba as $value)
            <option value="{{ $value->id }}" data-kode="{{ $value->kode_domba }}" data-harga="{{ $value->harga_jual }}"
              data-id="{{ $value->id }}">
              {{ $value->id }} |
              {{ $value->kode_domba }} (
              Rp.
              <?= number_format($value->harga_jual) ?> )
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">&nbsp;</label>
          <button class="btn btn-primary d-block btn-sm" style="background-color: #228896; color: white" type="button"
            onclick="tambahItem()">Tambah
            Item</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form action="{{ url('admin/home/transaksi/penjualan/store') }}" method="post">
      @csrf
      <input type="hidden" name="list_item" id="list_item">
      <p class="text-lg-start" style="font-size: 14px; color: #0B4149; font-weight: 800">Penjualan Domba</p>
      <div class="row mb-3">
        <div class="col-md-3">
          <label class="text-sm" style="font-weight: 600 " for="">Tanggal Penjualan</label>
          <input type="date" name="tgl_pembelian" class="form-control" style="border-color: #E6E1E5;" required>
        </div>
        <div class="col-md-3">
          <label class="text-sm" style="font-weight: 600 " for="">Customer</label>
          <div class="input-group">
            <select class="form-control form-control-sm @error('id_customer') is-invalid @enderror" name="id_customer"
              id="id_customer">
              <option value="" {{ old('id_customer')==='' ? 'selected' : '' }}>Pilih</option>
              @foreach($customer as $value)
              <option value="{{ $value->id }}" {{ old('id_customer')===$value->id ? 'selected' : '' }}>
                {{ $value->nama_customer }}
              </option>
              @endforeach
            </select>
            @error('id_customer')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-sm" style="font-weight: 600 " for="">Paket Domba</label>
          <div class="input-group">
            <select class="form-select" id="inputGroupSelect01">
              <option selected>Pilih Paket Domba</option>
              <option value="1">Trading</option>
              <option value="2">Breeding</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-sm" style="font-weight: 500;" for="">Kasir</label>
          <div class="input-group">
            <input type="text" name="id_user" class="form-control form-control-sm" value="{{ Auth::user()->id }}"
              readonly>
          </div>
        </div>
      </div>
      <input type="hidden" name="id_domba" id="listItemInput" value="">
      <div class="row">
        <div class="col-md-12 table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-sm" style="font-weight:500">No</th>
                <th class="text-sm" style="font-weight:500">Domba</th>
                <th class="text-sm" style="font-weight:500">Kode Domba</th>
                <th class="text-sm" style="font-weight:500">Harga Jual</th>
                <th class="text-sm" style="font-weight:500">Aksi</th>
              </tr>
            </thead>
            <tbody class="transaksiItem">
            </tbody>
            <tfoot>
              <tr>
                <th class="text-sm" style="font-weight:500" colspan="3">Total Harga Jual</th>
                <th class="text-sm font-weight-bold totalHargaBeli">0</th>
                <th class="text-sm" style="font-weight:500"></th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
      <div class="row">
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-sm" style="background-color: #228896; color: white">Simpan
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
<script>
  var listItem = []; 
  var totalHarga = 0;
  var dombaDipilih = false;

  function tambahItem() {
    var selectedDomba = $('#id_domba').find(':selected');
    var idDomba = selectedDomba.data('id');
    var kodeDomba = selectedDomba.data('kode');
    var hargaJual = selectedDomba.data('harga');
    var successMessage = document.getElementById('success-message');
    
    // Periksa apakah domba sudah dipilih sebelumnya
    for (var i = 0; i < listItem.length; i++) {
        if (listItem[i].id_domba === idDomba) {
            dombaDipilih = true;
            break;
        } else {
            dombaDipilih = false;
        }
    }
    
    // Tampilkan pesan kesalahan jika domba sudah dipilih
    if (dombaDipilih) {
        successMessage.innerHTML = 'Domba sudah dipilih sebelumnya!';
        successMessage.className = 'alert alert-danger';
        successMessage.style.display = 'block';
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    } else {
        var item = {
            id_domba: idDomba,
            nama: kodeDomba,
            harga: hargaJual,
            quantity: 1
        };
        
       
        listItem.push(item);
        updateTotalHarga(item.harga);
        updateTable(); // Memanggil fungsi updateTable() setelah menambahkan item
        document.getElementById('list_item').value = JSON.stringify(listItem);
        successMessage.innerHTML = 'Data berhasil ditambahkan!';
        successMessage.className = 'alert alert-success';
        successMessage.style.display = 'block';
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }
}

function updateTotalHarga(nom) {
    totalHarga += parseInt(nom);
}

function updateTable() {
    var html = '';
    var totalHargaBeli = 0;
    listItem.forEach(function (item, index) {
        totalHargaBeli += parseFloat(item.harga);
        var harga = formatRupiah(item.harga.toString());
        html += `
        <tr>
            <td>${index + 1}</td>
            <td>Domba ${index + 1}</td>
            <td>${item.nama}</td>
            <td>${harga}</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" onclick="deleteItem(${index})">
                    <i class="bi bi-trash-fill"></i></span>
                </button>
            </td>
        </tr>`;
    });

    $('.totalHargaBeli').text(formatRupiah(totalHargaBeli.toString()));
    $('.transaksiItem').html(html);
}



function emptyTable() {
    $('.transaksiItem').html(`
        <tr>
            <td colspan="4">Belum ada item, silahkan tambahkan</td>
        </tr>
    `);
}

function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp. ' + ribuan;
}

function deleteItem(index) {
    var deletedItem = listItem[index];
    totalHarga -= deletedItem.harga; // Mengurangkan harga item yang dihapus dari totalHarga
    listItem.splice(index, 1);
    updateTable();
}


$(document).ready(function() {
    emptyTable();
});

</script>

<style>
  #success-message {
    font-size: 14px;
    padding: 8px 16px;
    margin: 10px 0;
  }
</style>