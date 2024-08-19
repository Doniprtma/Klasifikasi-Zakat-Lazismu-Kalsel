<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('T4/assets/images/umbjm.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="lni lni-menu"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ url('dana-zakat') }}">
                <div class="parent-icon"><i class='bx bxs-wallet'></i>
                </div>
                <div class="menu-title">Dana Zakat</div>
            </a>
        </li>
        @if (auth()->user()->level == 'admin')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                    </div>
                    <div class="menu-title">Transaksi</div>
                </a>
                <ul>
                    <li> <a href="{{ route('jurnal.index') }}"><i class="bx bx-right-arrow-alt"></i>Jurnal</a>
                    </li>
                    {{-- <li> <a href="{{ route('penyalurandana.index') }}"><i class="bx bx-right-arrow-alt"></i>Riwayat Penyaluran Dana</a>
                    </li> --}}
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                    </div>
                    <div class="menu-title">Data Master</div>
                </a>
                <ul>
                    <li> <a href="{{ route('pengaturandana.index') }}"><i class="bx bx-right-arrow-alt"></i>Pengaturan
                            Dana</a>
                    </li>
                    <li> <a href="{{ route('kategoridana.index') }}"><i class="bx bx-right-arrow-alt"></i>Kategori
                            Dana</a>
                    </li>
                    <li> <a href="{{ route('cabang.index') }}"><i class="bx bx-right-arrow-alt"></i>Kantor</a>
                    </li>
                    <li> <a href="{{ route('user.index') }}"><i class="bx bx-right-arrow-alt"></i>User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                    </div>
                    <div class="menu-title">Data SAW</div>
                </a>
                <ul>
                    <li> <a href="{{ route('penerimazakat.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Penerima
                            Zakat</a>
                    </li>
                    <li> <a href="{{ route('kriteria.index') }}"><i class="bx bx-right-arrow-alt"></i>Kriteria &
                            Bobot</a>
                    </li>
                    <li> <a href="{{ route('perhitungansaw.index') }}"><i class="bx bx-right-arrow-alt"></i>Perhitungan
                            SAW</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="{{ route('inmemo.index') }}">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                    </div>
                    <div class="menu-title">IN Memo</div>
                </a>
            </li>
            <li>
                <a href="{{ url('laporan-saw') }}">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-detail"></i>
                    </div>
                    <div class="menu-title">Laporan SAW</div>
                </a>
            </li>
        @endif
        <!--------------------------------------------------------------------------------->
        @if (auth()->user()->level == 'user')
        @endif
    </ul>
</div>
