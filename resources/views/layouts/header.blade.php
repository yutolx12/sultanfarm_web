<header class="p-2" style="background-color: white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="dropdown text-end ms-auto">
                <!-- Menggunakan ms-auto di sini -->
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="ms-2" style="margin-right: 5px;">
                        <div class="text-sm"> {{ Auth::user()->name }}<br>{{ Auth::user()->role }}
                        </div>
                    </div>
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"
                        style="">
                </a>
                <ul class="dropdown-menu text-sm" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>

    {{-- modal ubah password --}}
    <div class="modal fade" id="modalGanti" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">x
                <div class="modal-header" style="background-color: #212E30">
                    <h5 class="modal-title" id="exampleModalLabel1" style="color: #E7E9E9">Ubah Password
                    </h5>
                </div>
                <form id="formGanti" method="" action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Password Lama</label>
                                <input type="password" class="form-control" style="border-color: #A2A9AA;"
                                    placeholder="Silahkan Isi">
                            </div>
                            <div class="form-group">
                                <label for="basicInput" class="fw-normal">Password Baru</label>
                                <input type="password" class="form-control" style="border-color: #A2A9AA;"
                                    placeholder="Silahkan Isi">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn"
                            style="background-color: #228896; color: white;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal keluar --}}
    <div class="modal fade" id="modalKeluar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #212E30">
                    <h5 class="modal-title" id="exampleModalLabel1" style="color: #E7E9E9">Apakah Anda Yakin Ingin
                        Keluar?
                    </h5>
                </div>
                <form id="formKeluar" method="" action="">

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn"
                            style="background-color: #228896; color: white;">Yakin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
        setTimeout(function() {document.getElementById('alert').style.display = "none";},2000);
    </script> --}}
</header>