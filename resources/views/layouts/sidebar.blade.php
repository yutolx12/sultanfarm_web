<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo_sultan.png') }}"
                            style="width: 150px; height: 100%" alt="Logo" srcset=""></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <div class="form-check  fs-6">
                        <input type="hidden" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item ">
                    <a href="@if (Auth::user()->role == 'pemilik') {{ route('admin.home') }} @elseif(Auth::user()->role == 'admin') {{ route('home') }} @endif"
                        class='sidebar-link'>
                        <i class="bi bi-columns-gap" style="color: white"></i>
                        <span style="color: white">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="@if (Auth::user()->role == 'pemilik') {{ route('customer') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.customer') }} @endif"
                        class='sidebar-link'>
                        <i class="bi bi-person" style="color: white"></i>
                        <span style="color: white">Customer</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="@if (Auth::user()->role == 'pemilik') {{ route('supplier') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.supplier') }} @endif"
                        class='sidebar-link'>
                        <i class="bi bi-people" style="color: white"></i>
                        <span style="color: white">Supplier</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-clipboard-data" style="color: white"></i>
                        <span style="color: white">Domba</span>
                    </a>
                    <ul class="submenu ">
                        @if (Auth::user()->role == 'pemilik')
                            <li class="submenu-item ">
                                <a href="{{ route('jenisdomba') }}" style="color: white">Jenis Domba</a>
                            </li>
                        @endif
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('domba') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.domba') }} @endif"
                                style="color: white">Data Domba</a>
                        </li>
                        @if (Auth::user()->role == 'pemilik')
                            <li class="submenu-item ">
                                <a href="{{ route('data_paket') }}" style="color: white">Data Paket</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('paketbreading') }}" style="color: white">Paket Breeding</a>
                            </li>
                        @endif
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('scanqr') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.scanqr') }} @endif"
                                style="color: white">Sqan QR</a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->role == 'pemilik')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-display" style="color: white"></i>
                            <span style="color: white">Monitoring</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ route('data_kamera') }}" style="color: white">Data Monitoring</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('monitoring_domba') }}" style="color: white">Rekap Sekat</a>
                            </li>

                        </ul>
                    </li>
                @endif
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calculator" style="color: white"></i>
                        <span style="color: white">Transaksi</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('pembelian') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.pembelian') }} @endif"
                                style="color: white">Pembelian</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('penjualan') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.penjualan') }} @endif"
                                style="color: white">Penjualan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-card-list" style="color: white"></i>
                        <span style="color: white">Fitur Lainnya</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('kelahiran') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.kelahiran') }} @endif"
                                style="color: white">Kelahiran</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('kematian') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.kematian') }} @endif"
                                style="color: white">Kematian</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('timbang') }}  @elseif(Auth::user()->role == 'admin') {{ route('admin.timbang') }} @endif"
                                style="color: white">Timbang</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear" style="color: white"></i>
                        <span style="color: white">Pengaturan</span>
                    </a>
                    <ul class="submenu ">
                        {{-- <li class="submenu-item ">
                            <a href="{{ route('galery') }}" style="color: white">Galery</a>
                        </li> --}}
                        <li class="submenu-item ">
                            <a href="@if (Auth::user()->role == 'pemilik') {{ route('landingpage') }} @elseif(Auth::user()->role == 'admin') {{ route('admin.landingpage') }} @endif"
                                style="color: white">Landing Page</a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->role == 'pemilik')
                    <li class="sidebar-item  ">
                        <a href="{{ route('pegawai.input') }}" class='sidebar-link'>
                            <i class="bi bi-person-badge" style="color: white"></i>
                            <span style="color: white">Pegawai</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
