@foreach ($data as $item)
<form action="{{ url('admin/home/timbang/update/' . $item->id) }}" method="post">
    @csrf
    <div class="container">
        <div class="row mb-3">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Detail</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="{{ asset('images/'. $item->gambar) }}" class="rounded float-left"
                                alt="Responsive image" width="150px">
                        </td>
                        <td class="text-sm">Kode Domba : {{ $item->kode_domba }} <br>
                            Jenis Domba : {{ $item->jenis->jenis_domba }} <br>
                            Bobot : {{ $item->bobot }} <br>
                            Jenis Kelamin : {{ $item->jenis_kelamin }} <br>
                        </td>
                        <td>
                            <input type="number" class="form-control @error('bobot') is-invalid
                                    @enderror" value="{{ old('bobot') }}" name="bobot" placeholder="Masukkan Bobot">
                            @error('bobot')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                        <td><button type="submit" class="btn btn-success">
                                <span class="btn-label"></i> Simpan</span></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>
@endforeach