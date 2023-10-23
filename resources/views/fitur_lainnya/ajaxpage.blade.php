@foreach ($data as $item)
<form action="{{ url('admin/home/kematian/update/' . $item->id) }}" method="post">
    @csrf
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <p class="text-lg-start" style="color: #4E5B5C">Kode Domba</p>
                <input type="text" class="form-control" value="{{ $item->kode_domba }}" readonly>
            </div>
            <div class="col">
                <p class="text-lg-start" style="color: #4E5B5C">Jenis Kelamin</p>
                <input type="text" class="form-control" value="{{ $item->jenis_kelamin }}" readonly>
            </div>
            <div class="col">
                <p class="text-lg-start" style="color: #4E5B5C">Tipe Domba</p>
                <input type="text" class="form-control" value="{{ $item->tipe_domba }}" readonly>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <p class="text-lg-start" style="color: #4E5B5C">Bobot</p>
                <input type="text" class="form-control" value="{{ $item->bobot }} Kg" readonly>
            </div>
            <div class="col">
                <p class="text-lg-start" style="color: #4E5B5C">Harga Beli</p>
                <input type="text" class="form-control" value="Rp. {{ $item->harga_beli }}" readonly>
            </div>
            <div class="col">
                <p class="text-lg-start" style="color: #4E5B5C">Harga Jual</p>
                <input type="text" class="form-control" value="Rp. {{ $item->harga_jual }}" readonly>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mb-3">
            <label for="keterangan">Penyebab Kematian</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                placeholder="Masukkan Keterangan" rows="3">{{ old('keterangan') }}</textarea>
            @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-Success">Simpan</button>
    </div>
</form>
@endforeach