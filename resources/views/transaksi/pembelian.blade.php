@extends('layouts.template')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
  crossorigin="anonymous"
        referrerpolicy="no-referrer" />
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
            toastr.success('Data Berhasil DiUpdate', '')
        </script>
    @endif
    @if ($errors->any())
        <script>
            toastr.error('Keterangan Tidak Boleh Kosong', 'Data Gagal Diupate')
        </script>
    @endif
    <div class="page-title mt-0">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Pembelian</h4>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('pembelian') }}">Pembelian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('historypembelian') }}">History Pembelian</a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <div id="success-message" class="alert alert-success" style="display: none;"></div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Foto Domba</label>
                    <div class="input-group">
                        <input type="file" id="gambar"
                            class="form-control form-control-sm @error('gambar') is-invalid @enderror" id="foto"
                            name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Jenis Domba</label>
                    <div class="input-group">
                        <select class="form-control form-control-sm @error('id_jenis') is-invalid @enderror" name="id_jenis"
                            id="id_jenis_domba">
                            <option value="" {{ old('id_jenis') === '' ? 'selected' : '' }}>Pilih</option>
                            @foreach ($jenisdomba as $value)
                                <option id="jenis_domba" value="{{ $value->id }}"
                                    {{ old('id_jenis') === $value->id ? 'selected' : '' }}>
                                    {{ $value->jenis_domba }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Tipe Domba</label>
                    <select class="form-control form-control-sm @error('tipe_domba') is-invalid @enderror" name="tipe_domba"
                        id="tipe_domba">
                        <option value="" {{ old('tipe_domba') === '' ? 'selected' : '' }}>Pilih</option>
                        <option value="Trading" {{ old('tipe_domba') === 'Trading' ? 'selected' : '' }}>
                            Trading
                        </option>
                        <option value="Breeding" {{ old('tipe_domba') === 'Breeding' ? 'selected' : '' }}>
                            Breeding</option>
                    </select>
                    @error('tipe_domba')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Jenis Kelamin</label>
                    <select class="form-control form-control-sm  @error('jenis_kelamin') is-invalid @enderror"
                        name="jenis_kelamin" id="jenis_kelamin">
                        <option value="" {{ old('jenis_kelamin') === '' ? 'selected' : '' }}>Pilih</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin') === 'Laki-Laki' ? 'selected' : '' }}>
                            Jantan
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>
                            Betina</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for=""> Tanggal Lahir</label>
                    <fieldset>
                        <div class="input">
                            <input type="date"
                                class="form-control form-control-sm @error('tgl_lahir') is-invalid @enderror"
                                value="{{ old('tgl_lahir') }}" id="tgl_lahir" name="tgl_lahir">
                            @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Bobot</label>
                    <input type="number" class="form-control form-control-sm @error('bobot') is-invalid @enderror"
                        value="{{ old('bobot') }}" id="bobot" name="bobot" placeholder="Masukkan Bobot">
                    @error('bobot')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Harga Beli (Rp)</label>
                    <input data-harga="" id="harga_beli" type="text" class="form-control form-control-sm"
                        placeholder="Isi Harga Beli">
                </div>
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Harga Jual (Rp)</label>
                    <input type="number" step="0.01"
                        class="money form-control form-control-sm @error('harga_jual') is-invalid @enderror"
                        value="{{ old('harga_jual') }}" id="harga_jual" name="harga_jual"
                        placeholder="Masukkan Perkiraan Harga Jual">
                    @error('harga_jual')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="text-sm" style="font-weight: 500;" for="">Keterangan</label>
                    <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror"
                        value="{{ old('keterangan') }}" id="keterangan" name="keterangan"
                        placeholder="Masukkan Keterangan">
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-sm" style="background-color: #228896; color: white" onclick="tambahItem()">
                        Tambah
                        Domba
                    </button>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ url('admin/home/transaksi/pembelian/store') }}" method="post" id="pembelianForm">
        @csrf
        <input type="hidden" name="list_item" id="list_item">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="text-sm" style="font-weight: 500;" for="">Tanggal Pembelian</label>
                        <input type="date" name="tgl_pembelian" class="form-control form-control-sm"
                            style="border-color: #E6E1E5;" required>
                    </div>
                    <div class="col-md-4">
                        <label class="text-sm" style="font-weight: 500;" for="">Supplier</label>
                        <div class="input-group">
                            <select class="form-control form-control-sm @error('id_supplier') is-invalid @enderror"
                                name="id_supplier" id="id_supplier">
                                <option value="" {{ old('id_supplier') === '' ? 'selected' : '' }}>Pilih</option>
                                @foreach ($supplier as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('id_supplier') === $value->id ? 'selected' : '' }}>
                                        {{ $value->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-sm" style="font-weight: 500;" for="">Kasir</label>
                        <div class="input-group">
                            <input type="text" name="id_user" class="form-control form-control-sm"
                                value="{{ Auth::user()->id }}" readonly>
                        </div>
                    </div>
                </div>
                <p class="text-sm-start" style="font-size: 14px; color: #0B4149; font-weight: 800">Domba Dibeli</p>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-sm" style="font-weight:500">No</th>
                                    <th class="text-sm" style="font-weight:500">Domba</th>
                                    <th class="text-sm" style="font-weight:500">Tipe Domba</th>
                                    <th class="text-sm" style="font-weight:500">Jenis Kelamin</th>
                                    <th class="text-sm" style="font-weight:500">Bobot</th>
                                    <th class="text-sm" style="font-weight:500">Harga Jual</th>
                                    <th class="text-sm" style="font-weight:500">Harga Beli</th>
                                    <th class="text-sm" style="font-weight:500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="transaksiItem">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-sm" style="font-weight:500" colspan="6">Total Harga Beli</th>
                                    <th class="text-sm" style="font-weight:500" class="totalHargaBeli">0</th>
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
            </div>
        </div>
    </form>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hargaBeliInput = document.getElementById("harga_beli");

        hargaBeliInput.addEventListener("input", function() {
            const unformattedValue = this.value.replace(/[^0-9]/g,
                ""); // Menghilangkan semua karakter kecuali angka
            const formattedValue = formatNumber(unformattedValue); // Format ulang angka dengan koma
            const displayValue = `Rp ${formattedValue}`; // Menambahkan "Rp" di depan angka

            this.value = displayValue;
        });

        // Fungsi untuk memformat angka dengan koma sebagai pemisah ribuan
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    });
</script>



<script>
    var totalHarga = 0;
    var listItem = [];
    var index = listItem.length;

    function tambahItem() {
        var gambar = document.getElementById('gambar').value;
        var idJenisDomba = document.getElementById('id_jenis_domba').value;
        var tipeDomba = document.getElementById('tipe_domba').value;
        var jenisKelamin = document.getElementById('jenis_kelamin').value;
        var tglLahir = document.getElementById('tgl_lahir').value;
        var bobot = document.getElementById('bobot').value;
        var hargaBeli = document.getElementById('harga_beli').value;
        var hargaJual = document.getElementById('harga_jual').value;
        var keterangan = document.getElementById('keterangan').value;
        var successMessage = document.getElementById('success-message');
        var HargaBeli = parseFloat($('#harga_beli').val());
        var HargaJual = parseFloat($('#harga_jual').val());

        if (!gambar || !idJenisDomba || !tipeDomba || !jenisKelamin || !tglLahir || !bobot || !hargaBeli || !
            hargaJual || !keterangan) {
            alert('Semua Field Harus Diisi! Cek Kembali Data Domba');
            return;
        }

        var item = {
            gambar: gambar,
            id_jenis: idJenisDomba,
            tipe_domba: tipeDomba,
            jenis_kelamin: jenisKelamin,
            tgl_lahir: tglLahir,
            bobot: bobot,
            harga_beli: HargaBeli,
            harga_jual: HargaJual,
            keterangan: keterangan
        };

        listItem.push(item);
        updateTable();
        resetInputFields();

        // Update input hidden dengan data list item sebagai JSON
        document.getElementById('list_item').value = JSON.stringify(listItem);
        successMessage.innerHTML = 'Data berhasil ditambahkan!';
        successMessage.style.display = 'block';
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }


    function updateTable() {
        var html = '';
        var totalHargaBeli = 0;
        var totalHargaJual = 0;

        listItem.forEach((item, index) => {
            totalHargaBeli += item.harga_beli;
            totalHargaJual += item.harga_jual;

            html += `
          
              <tr>
                  <td>${index + 1}</td>
                  <td>Domba ${index + 1}</td>
                  <td>${item.tipe_domba}</td>
                  <td>${item.jenis_kelamin}</td>
                  <td>${item.bobot}</td>
                  <td>${item.harga_jual}</td>
                  <td>${item.harga_beli}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-danger"  onclick="deleteItem(${index})">
                            <i class="bi bi-trash-fill"></i></span>
                    </button>
                  </td>
              </tr>
          `;
        });
        $('.totalHargaBeli').text(totalHargaBeli);
        $('.totalHargaJual').text(totalHargaJual);
        $('.transaksiItem').html(html);
    }

    function resetInputFields() {
        $('#gambar').val('');
        $('#id_jenis_domba').val('');
        $('#tipe_domba').val('');
        $('#jenis_kelamin').val('');
        $('#tgl_lahir').val('');
        $('#bobot').val('');
        $('#harga_beli').val('');
        $('#harga_jual').val('');
        $('#keterangan').val('');
    }

    function emptyTable() {
        totalHarga = 0;
        $('.transaksiItem').html(`
          <tr>
              <td colspan="4">Belum ada item, silahkan tambahkan</td>
          </tr>
      `);
    }

    $(document).ready(function() {
        emptyTable();
    });

    function deleteItem(index) {
        listItem.splice(index, 1);
        updateTable();
    }
</script>
