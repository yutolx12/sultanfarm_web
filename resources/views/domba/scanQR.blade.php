@extends('layouts.template')
@section('content')
<div class="page-title mt-0">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <h4 class="py-3 mb-0" style="color: #228896; font-weight: 500;">Scan Qr</h4>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group col-lg-11">
                    <div id="scanner"></div>
                </div>
                <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
                <script>
                    function onScanSuccess(decodedText, decodedResult) {
                            $("#result").val(decodedText)
                        }

                        function onScanFailure(error) {
                            console.warn(`Code scan error = ${error}`);
                        }

                        let html5QrcodeScanner = new Html5QrcodeScanner(
                            "scanner", {
                                fps: 10,
                                qrbox: {
                                    width: 250,
                                    height: 250
                                }
                            },
                            /* verbose= */
                            false);
                        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                </script>
            </div>
            {{-- Informasi Domba --}}
            <div class="col-md-5">
                <div class="card border-secondary" style="background-color: #F3F3F3">
                    <div class="card-body">
                        <p class="text-lg-center" style="font-size: 17px; color: #0B4149; font-weight: 700">Informasi
                            Domba</p>

                        <div class="form-group col-lg-11">
                            <p class="text-lg-start" style="font-size: 15px; color: #0B4149">Kode Domba</p>
                            <input type="text" id="result" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                        <div class="form-group col-lg-11">
                            <p class="text-lg-start" style="font-size: 15px; color: #0B4149">Jenis Domba</p>
                            <input type="text" id="result" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                        <div class="form-group col-lg-11">
                            <p class="text-lg-start" style="font-size: 15px; color: #0B4149">Tipe Domba</p>
                            <input type="text" id="result" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                        <div class="form-group col-lg-11">
                            <p class="text-lg-start" style="font-size: 15px; color: #0B4149">Usia Domba</p>
                            <input type="text" id="result" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                        <div class="form-group col-lg-11">
                            <p class="text-lg-start" style="font-size: 15px; color: #0B4149">Bobot Domba</p>
                            <input type="text" id="result" class="form-control" style="border-color: #A2A9AA;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection