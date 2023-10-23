<div class="container">
    <div class="row mb-3">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Domba</th>
                    <th>Bobot</th>
                    <th>Tanggal Timbang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_domba }}</td>
                    <td>{{ $item->bobot }}</td>
                    <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>