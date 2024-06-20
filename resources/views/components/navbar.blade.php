<div>
    <div class="app-menu navbar-menu">
        <div class="navbar-brand-box">
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" class="rounded" alt="" height="40">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="rounded" alt="" height="40">
                </span>
            </a>
            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" class="rounded" alt="" height="40">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-light.png') }}" class="rounded" alt=""
                        height="40">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>

                <ul class="navbar-nav fw-medium" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ menuAktif('dashboard') }}" href="{{ route('dashboard') }}"
                            aria-expanded="false">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                        </a>
                    </li>
                    @if (hasOneOfPermissions($permissions_per_menu['santri']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                                role="button" aria-expanded=" {{ expand('santri*|konseling*') }}"
                                aria-controls="sidebarDashboards">
                                <i class="las la-user-friends fs-21"></i> <span data-key="t-dashboards">Santri</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('santri*|konseling*') }}"
                                id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('kesantrian.santri.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri.semua') }}"
                                                class="nav-link {{ Request::is(['santri', 'santri/tambah', 'santri/detail*', 'santri/edit*', 'santri/cetakkartu*', 'santri/cetakbiodata^', 'santri/import-add', 'santri/import-update']) ? 'active' : '' }}" data-key="t-crm"> Semua
                                                Santri </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kesantrian.tahfidz.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-tahfidz.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-tahfidz.semua')) }}"
                                                data-key="t-analytics">
                                                Tahfidz </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kesantrian.kesehatan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-kesehatan.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-kesehatan.semua')) }}"
                                                data-key="t-analytics"> Kesehatan
                                                Santri </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kesantrian.perizinan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-perizinan.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-perizinan.semua')) }}"
                                                data-key="t-analytics"> Perizinan
                                                Santri </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kesantrian.pelanggaran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('konseling.semua') }}"
                                                class="nav-link {{ menuAktif(route('konseling.semua')) }}"
                                                data-key="t-detached">Pelanggaran Santri</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link menu-link {{menuAktif('administrasisurat')}}" aria-expanded="false" aria-controls="administrasisurat" href="{{route('administrasisurat.semua')}}">
                            <i class=ri-mail-line></i> <span data-key="t-apps">Administrasi Surat</span>
                        </a>
                        {{-- <a class="nav-link menu-link" href="#administrasisurat" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="administrasisurat">
                            <i class=ri-mail-line></i> <span data-key="t-apps">Administrasi Surat</span>
                        </a>
                        <div class="collapse menu-dropdown {{ expand('administrasisurat*') }}" id="administrasisurat">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('surat-keluar.semua') }}"
                                        class="nav-link {{ menuAktif(route('surat-keluar.semua')) }}" data-key="t-calendar">
                                        Surat Keluar </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('surat-masuk.semua') }}"
                                        class="nav-link {{ menuAktif(route('surat-masuk.semua')) }}" data-key="t-calendar">
                                        Surat Masuk </a>
                                </li>
                            </ul>
                        </div> --}}

                    </li>
                    @if (hasOneOfPermissions($permissions_per_menu['pegawai']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#dataGuru" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="dataGuru">
                                <i class="mdi mdi-school fs-21"></i> <span data-key="t-dashboards">Pegawai</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('guru*|hak-akses*') }}" id="dataGuru">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('kepegawaian.guru.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('guru.semua') }}"
                                                class="nav-link {{ Request::is(['guru', 'guru/tambah', 'guru/detail*', 'guru/edit*', 'guru/cetakkartu*', 'guru/cetakbiodata^', 'guru/import-add', 'guru/import-update']) ? 'active' : '' }}"
                                                data-key="t-analytics"> Semua
                                                Pegawai </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kepegawaian.jabatan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('jabatan.semua') }}"
                                                class="nav-link {{ menuAktif(route('jabatan.semua')) }}"
                                                data-key="t-analytics"> Jabatan </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kepegawaian.penunjukan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('guru-penunjukan.semua') }}"
                                                class="nav-link {{ menuAktif(route('guru-penunjukan.semua')) }}"
                                                data-key="t-analytics"> Penunjukan </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kepegawaian.hak_akses.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('hak-akses.semua') }}"
                                                class="nav-link {{ Request::is('hak-akses*') ? 'active' : '' }}"
                                                data-key="t-analytics"> Hak Akses </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('kepegawaian.pengguna.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('pengguna.semua') }}"
                                                class="nav-link {{ menuAktif(route('pengguna.semua')) }}"
                                                data-key="t-analytics"> Pengguna </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if (hasOneOfPermissions($permissions_per_menu['akademik']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#akademik" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="akademik">
                                <i class="mdi mdi-book-education-outline fs-21"></i> <span
                                    data-key="t-dashboards">Akademik</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('akademik*') }}" id="akademik">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('akademik.unit_sekolah.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('unit-sekolah.semua') }}"
                                                class="nav-link {{ menuAktif(route('unit-sekolah.semua')) }}"
                                                data-key="t-analytics">
                                                Unit Sekolah </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.asrama.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('asrama.semua') }}"
                                                class="nav-link {{ menuAktif(route('asrama.semua')) }}"
                                                data-key="t-analytics">
                                                Asrama </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.kamar.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kamar.semua') }}"
                                                class="nav-link {{ menuAktif(route('kamar.semua')) }}"
                                                data-key="t-analytics">
                                                Kamar </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.konsulat.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('konsulat.semua') }}"
                                                class="nav-link {{ menuAktif(route('konsulat.semua')) }}"
                                                data-key="t-analytics">
                                                Konsulat </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.madin.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('madin.semua') }}"
                                                class="nav-link {{ menuAktif(route('madin.semua')) }}"
                                                data-key="t-analytics">
                                                Madin </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.kelas_alquran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('quran.semua') }}"
                                                class="nav-link {{ menuAktif(route('quran.semua')) }}"
                                                data-key="t-analytics">
                                                Kelas Al-Qur'an </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.tahun_ajaran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('tahun-ajaran.semua') }}"
                                                class="nav-link {{ menuAktif(route('tahun-ajaran.semua')) }}"
                                                data-key="t-analytics">
                                                Tahun
                                                Ajaran </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.kelas.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kelas.semua') }}"
                                                class="nav-link {{ menuAktif(route('kelas.semua')) }}" data-key="t-crm">
                                                Kelas </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.pindah_kelas.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kelas.migrasi') }}"
                                                class="nav-link {{ menuAktif(route('kelas.migrasi')) }}" data-key="t-crm">
                                                Pindah Kelas </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.ubah_status_santri.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('ubah-status-santri.semua') }}"
                                                class="nav-link {{ menuAktif(route('ubah-status-santri.semua')) }}"
                                                data-key="t-crm"> Ubah Status Santri </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.kelulusan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kelulusan.semua') }}"
                                                class="nav-link {{ menuAktif(route('kelulusan.semua')) }}" data-key="t-crm">
                                                Kelulusan </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.mata_pelajaran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('mapel.semua') }}"
                                                class="nav-link {{ menuAktif(route('mapel.semua')) }}" data-key="t-crm">
                                                Mata Pelajaran </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.jadwal_pelajaran.view'))
                                        <li class="nav-item">
                                            <a class="nav-link menu-link" href="#jadwal-pelajaran"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="jadwal-pelajaran">
                                                <span data-key="t-apps">Jadwal Pelajaran</span>
                                            </a>
                                            <div class="collapse menu-dropdown {{ Request::is('akademik/jadwal*') ? 'true show' : '' }}"
                                                id="jadwal-pelajaran">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{ route('jadwal-formal.semua') }}"
                                                            class="nav-link {{ Request::is('akademik/jadwal-formal*') ? 'active' : ''}}"
                                                            data-key="t-calendar">
                                                            Formal </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('jadwal-diniyah.semua') }}"
                                                            class="nav-link {{ Request::is('akademik/jadwal-diniyah*') ? 'active' : '' }}"
                                                            data-key="t-calendar">
                                                            Diniyah </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    @if (hasPermission('akademik.penilaian.view'))
                                        <li class="nav-item">
                                            <a class="nav-link menu-link" href="#penilaian" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="penilaian">
                                                <span data-key="t-apps">Penilaian</span>
                                            </a>
                                            <div class="collapse menu-dropdown {{ expand('akademik/penilaian*') }}"
                                                id="penilaian">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{ route('penilaian-bulanan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('penilaian-bulanan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Bulanan </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('penilaian-tengah-semester.semua') }}"
                                                            class="nav-link {{ menuAktif(route('penilaian-tengah-semester.semua')) }}"
                                                            data-key="t-calendar">
                                                            UTS </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('penilaian-akhir-semester.semua') }}"
                                                            class="nav-link {{ menuAktif(route('penilaian-akhir-semester.semua')) }}"
                                                            data-key="t-calendar">
                                                            UAS </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if (hasOneOfPermissions($permissions_per_menu['tabungan']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#tabungan" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="tabungan">
                                <i class="ri-money-dollar-circle-line"></i> <span data-key="t-apps">Tabungan</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('tabungan*') }}" id="tabungan">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('tabungan.transaksi_tabungan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('tabungan.semua') }}"
                                                class="nav-link {{ Request::is('tabungan/transaksi') ? 'active' : '' }}" data-key="t-calendar">
                                                Transaksi Tabungan </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('tabungan.data_titipan_khusus.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('tabungan.data-titipan-khusus.semua') }}"
                                                class="nav-link {{ menuAktif(route('tabungan.data-titipan-khusus.semua')) }}"
                                                data-key="t-calendar">
                                                Data Titipan Khusus</a>
                                        </li>
                                    @endif
                                    @if (hasPermission('tabungan.transaksi_titipan_khusus.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('tabungan.semua-titipan-khusus') }}"
                                            class="nav-link {{ menuAktif(route('tabungan.semua-titipan-khusus')) }}"
                                            data-key="t-calendar">
                                            Transaksi Titipan Khusus</a>
                                    </li>
                                    @endif
                                    @if (hasPermission('tabungan.limit_transaksi_cashless.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('tabungan.limit-transaksi-cashless.semua') }}"
                                                class="nav-link {{ menuAktif(route('tabungan.limit-transaksi-cashless.semua')) }}"
                                                data-key="t-calendar">
                                                Limit Transaksi Cashless</a>
                                        </li>
                                    @endif
                                    @if (hasPermission('tabungan.kondisi_kas_tab.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('tabungan.kondisi-kas-tab.semua') }}"
                                                class="nav-link {{ menuAktif(route('tabungan.kondisi-kas-tab.semua')) }}"
                                                data-key="t-calendar">
                                                Kondisi Kas Tab</a>
                                        </li>
                                    @endif 
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (hasOneOfPermissions($permissions_per_menu['presensi']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#presensi" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="presensi">
                                <i class="ri-fingerprint-2-line"></i> <span data-key="t-apps">Presensi</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('absensi*') }}" id="presensi">
                                <ul class="nav nav-sm flex-column">
                                    <!-- <li class="nav-item">
                                    <a href="{{ route('presensi.daftar-kelas') }}"
                                       class="nav-link {{ menuAktif(route('presensi.daftar-kelas')) }}" data-key="t-calendar">
                                        Absensi </a>
                                </li> -->
                                    @if (hasPermission('presensi.absensi_pegawai.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('absensi-pegawai.semua') }}"
                                                class="nav-link {{ menuAktif(route('absensi-pegawai.semua')) }}"
                                                data-key="t-calendar">
                                                Absensi Pegawai </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('presensi.absensi_makan_santri.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-absensi-makan.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-absensi-makan.semua')) }}"
                                                data-key="t-chat">
                                                Absensi Makan Santri </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('presensi.absensi_kelas_perjam.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-absensi-perjam.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-absensi-perjam.semua')) }}"
                                                data-key="t-chat">
                                                Absensi Kelas Perjam </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('presensi.absensi_kelas_perhari.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-absensi-perhari.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-absensi-perhari.semua')) }}"
                                                data-key="t-chat">
                                                Absensi Kelas Perhari </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('presensi.absensi_sholat_berjamaah.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-absensi-sholat.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-absensi-sholat.semua')) }}"
                                                data-key="t-chat">
                                                Absensi Sholat Berjamaah </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('presensi.kunjungan_wali_santri.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('santri-kunjungan-wali.semua') }}"
                                                class="nav-link {{ menuAktif(route('santri-kunjungan-wali.semua')) }}"
                                                data-key="t-chat">
                                                Kunjungan Wali Santri </a>
                                        </li>
                                    @endif
                                    {{-- <li class="nav-item">
                                    <a href="{{route('presensi.laporan-presensi')}}"
                                       class="nav-link {{menuAktif('presensi.laporan-presensi'))}}" data-key="t-chat">
                                        Laporan Presensi </a>
                                </li> --}}
                                </ul>
                            </div>
                        </li>
                    @endif
                    {{-- @hasanyrole('Administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#tagihan" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="tagihan">
                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Penagihan</span>
                        </a>
                        <div class="collapse menu-dropdown {{expand('tagihan*')}}" id="tagihan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('kategori-tagihan.semua')}}"
                                       class="nav-link {{menuAktif('kategori-tagihan.semua'))}}"
                                       data-key="t-calendar">
                                        Kategori Tagihan </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('tagihan.semua')}}"
                                       class="nav-link {{menuAktif('tagihan.semua'))}}" data-key="t-chat"> Data
                                        Tagihan </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endhasanyrole --}}
                    @if (hasOneOfPermissions($permissions_per_menu['keuangan']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#keuangan" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="keuangan">
                                <i class="ri-bank-card-line"></i> <span data-key="t-apps">Keuangan</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('keuangan*') }}" id="keuangan">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('keuangan.pembayaran_santri.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('keuangan.pembayaran-santri.semua') }}"
                                            class="nav-link {{ menuAktif(route('keuangan.pembayaran-santri.semua')) }}"
                                            data-key="t-calendar"> Pembayaran Santri </a>
                                    </li>
                                    @endif
                                    @if (hasPermission('keuangan.pembayaran_transfer.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('keuangan.pembayaran-transfer.semua') }}"
                                            class="nav-link {{ menuAktif(route('keuangan.pembayaran-transfer.semua')) }}"
                                            data-key="t-calendar"> Pembayaran Transfer </a>
                                    </li>
                                    @endif

                                    @if (hasOneOfPermissions($permissions_per_menu['keuangan_setting_pembayaran']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#keuangan-setting" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="keuangan-setting">
                                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Setting
                                                Pembayaran</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expand('keuangan/setting*') }}"
                                            id="keuangan-setting">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.akun_biaya.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.setting.akun-biaya.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.setting.akun-biaya.semua')) }}"
                                                        data-key="t-calendar">
                                                        Akun Biaya </a>
                                                </li>
                                                @endif
                                                @if (hasPermission('keuangan.pos_bayar.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('keuangan.setting.pos-bayar.semua') }}"
                                                            class="nav-link {{ menuAktif(route('keuangan.setting.pos-bayar.semua')) }}"
                                                            data-key="t-chat"> Pos Bayar </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('keuangan.jenis_bayar.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('keuangan.setting.jenis-bayar.semua') }}"
                                                            class="nav-link {{ menuAktif(route('keuangan.setting.jenis-bayar.semua')) }}"
                                                            data-key="t-chat"> Jenis Bayar </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('keuangan.pajak.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.setting.pajak.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.setting.pajak.semua')) }}"
                                                        data-key="t-chat"> Pajak </a>
                                                </li>
                                                @endif
                                                {{-- <li class="nav-item">
                                                <a href="{{route('keuangan.setting.unit-pos.semua')}}"
                                                   class="nav-link {{menuAktif('keuangan.setting.unit-pos.semua'))}}" data-key="t-chat"> Unit Pos </a>
                                            </li> --}}
                                            @if (hasPermission('keuangan.kas_bank.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.setting.tipe-bayar.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.setting.tipe-bayar.semua')) }}"
                                                        data-key="t-chat"> Kas Bank </a>
                                                </li>
                                            @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif

                                    @if (hasOneOfPermissions($permissions_per_menu['keuangan_penggajian']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#penggajian" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="penggajian">
                                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Penggajian</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expand('keuangan/penggajian*') }}"
                                            id="penggajian">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.setting_penggajian.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.penggajian.setting-penggajian.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.penggajian.setting-penggajian.semua')) }}"
                                                        data-key="t-chat"> Setting Penggajian </a>
                                                </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.slip_gaji.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.penggajian.slip-gaji.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.penggajian.slip-gaji.semua')) }}"
                                                        data-key="t-chat"> Slip Gaji </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif

                                    @if (hasOneOfPermissions($permissions_per_menu['keuangan_transaksi_kas']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#transaksi-kas" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="transaksi-kas">
                                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Transaksi Kas</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expand('keuangan/transaksi-kas*') }}"
                                            id="transaksi-kas">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.kas_masuk.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.transaksi-kas.kas-masuk.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.transaksi-kas.kas-masuk.semua')) }}"
                                                        data-key="t-chat"> Kas Masuk </a>
                                                </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.kas_keluar.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('keuangan.transaksi-kas.kas-keluar.semua') }}"
                                                            class="nav-link {{ menuAktif(route('keuangan.transaksi-kas.kas-keluar.semua')) }}"
                                                            data-key="t-chat"> Kas Keluar </a>
                                                    </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.transfer_kas.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.transaksi-kas.transfer-kas.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.transaksi-kas.transfer-kas.semua')) }}"
                                                        data-key="t-chat"> Transfer Kas </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif

                                    @if (hasOneOfPermissions($permissions_per_menu['keuangan_hutang']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#hutang" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="hutang">
                                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Hutang</span>
                                        </a>
                                          <div class="collapse menu-dropdown {{ expand('keuangan/hutang*') }}"
                                            id="hutang">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.pos_hutang.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('keuangan.hutang.pos-hutang.semua') }}"
                                                            class="nav-link {{ menuAktif(route('keuangan.hutang.pos-hutang.semua')) }}"
                                                            data-key="t-chat"> Pos Hutang </a>
                                                    </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.setting_hutang.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.hutang.setting-hutang.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.hutang.setting-hutang.semua')) }}"
                                                        data-key="t-chat"> Setting Hutang </a>
                                                </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.bayar_hutang.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.hutang.bayar-hutang.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.hutang.bayar-hutang.semua')) }}"
                                                        data-key="t-chat"> Bayar Hutang </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif

                                    @if (hasOneOfPermissions($permissions_per_menu['keuangan_piutang']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#piutang" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="piutang">
                                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Piutang</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expand('keuangan/piutang*') }}"
                                            id="piutang">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.pos_piutang.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.piutang.pos-piutang.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.piutang.pos-piutang.semua')) }}"
                                                        data-key="t-chat"> Pos Piutang </a>
                                                </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.setting_piutang.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.piutang.setting-piutang.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.piutang.setting-piutang.semua')) }}"
                                                        data-key="t-chat"> Setting Piutang </a>
                                                </li>
                                                @endif
                                            </ul>
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.bayar_piutang.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.piutang.bayar-piutang.semua') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.piutang.bayar-piutang.semua')) }}"
                                                        data-key="t-chat"> Bayar Piutang </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif

                                    @if (hasOneOfPermissions($permissions_per_menu['keuangan_laporan']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#keuangan-laporan" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="keuangan-laporan">
                                            <i class="ri-wallet-line"></i> <span data-key="t-apps">Laporan</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expand('keuangan/laporan*') }}"
                                            id="keuangan-laporan">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('keuangan.laporan_tagihan.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.laporan.tagihan') }}"
                                                        class="nav-link {{ menuAktif('keuangan.laporan.tagihan') }}"
                                                        data-key="t-chat"> Laporan Tagihan </a>
                                                </li>
                                                @endif
                                                @if (hasPermission('keuangan.laporan_jurnal_umum.view'))
                                                <li class="nav-item">
                                                    <a href="{{ route('keuangan.laporan.jurnal-umum') }}"
                                                        class="nav-link {{ menuAktif(route('keuangan.laporan.jurnal-umum')) }}"
                                                        data-key="t-chat"> Laporan Jurnal Umum </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (hasOneOfPermissions($permissions_per_menu['cetak']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#cetak" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="cetak">
                                <i class="ri-printer-line"></i> <span data-key="t-apps">Cetak</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('cetak*') }}" id="cetak">
                                @if (hasPermission('cetak.kartu_santri.view'))
                                    <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('kartu-santri') }}"
                                                    class="nav-link {{ Request::is('cetak/kartu-santri*') ? 'active' : '' }}"
                                                    data-key="t-calendar">
                                                    Kartu Santri </a>
                                            </li>
                                    </ul>
                                @endif
                                @if (hasPermission('cetak.kartu_kesehatan.view'))
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('kartu-kesehatan') }}"
                                                class="nav-link {{ Request::is('cetak/kartu-kesehatan*') ? 'active' : '' }}"
                                                data-key="t-calendar">
                                                Kartu Kesehatan </a>
                                        </li>
                                    </ul>
                                @endif
                                @if (hasPermission('cetak.kartu_wali_santri.view'))
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('kartu-walisantri') }}"
                                                class="nav-link {{ Request::is('cetak/kartu-wali-santri*') ? 'active' : '' }}"
                                                data-key="t-calendar">
                                                Kartu Wali Santri </a>
                                        </li>
                                    </ul>
                                @endif
                                @if (hasPermission('cetak.buku_induk_santri.view'))
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('kartu-induk-santri') }}"
                                                class="nav-link {{ Request::is('cetak/kartu-induk-santri*') ? 'active' : '' }}"
                                                data-key="t-calendar">
                                                Buku Induk Santri </a>
                                        </li>
                                    </ul>
                                @endif
                                @if (hasPermission('cetak.biodata_pegawai.view'))
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('biodata-pegawai') }}"
                                                class="nav-link {{ Request::is('cetak/biodata-pegawai*') ? 'active' : '' }}"
                                                data-key="t-calendar">
                                                Biodata Pegawai </a>
                                        </li>
                                    </ul>
                                @endif
                                @if (hasPermission('cetak.biodata_pegawai.view'))
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('kartu-pegawai') }}"
                                                class="nav-link {{ Request::is('cetak/kartu-pegawai*') ? 'active' : '' }}"
                                                data-key="t-calendar">
                                                Kartu Pegawai </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if (hasOneOfPermissions($permissions_per_menu['master']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#master" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="master">
                                <i class="ri-save-3-line"></i> <span data-key="t-apps">Data Master</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('master*|tahfidz*') }}" id="master">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasOneOfPermissions($permissions_per_menu['master_kesantrian']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#master-kesantrian"
                                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="master-kesantrian">
                                            <i class="ri-save-3-line"></i> <span data-key="t-apps"> Master
                                                Kesantrian</span>
                                        </a>
                                        <div class="collapse menu-dropdown  {{ expandDropdownGroup(['master/kategoriperizinan*', 'master/kategoripenghasilan*', 'master/kategoripekerjaan*', 'master/penanganankesehatan*', 'master/kategoristatusrumah*', 'master/penindakanpelanggaran*', 'master/kategoripendidikan*', 'master/kategorihubunganwali*', 'master/kategoristatusanak*', 'master/kategoripenghargaan*']) }}  {{ Request::is(['tahfidz/hafalanaurad*', 'tahfidz/kategoritahfidz*']) ? 'true show' : '' }}"
                                            id="master-kesantrian">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('master.kategori_perizinan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-perizinan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-perizinan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Perizinan </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_penghasilan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-penghasilan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-penghasilan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Penghasilan </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_pekerjaan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-pekerjaan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-pekerjaan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Pekerjaan </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.status_penanganan_kesehatan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('penanganan-kesehatan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('penanganan-kesehatan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Penanganan Kesehatan </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_status_rumah.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-status-rumah.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-status-rumah.semua')) }}"
                                                            data-key="t-calendar">
                                                            Status Rumah</a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.penindakan_pelanggaran.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('penindakan-pelanggaran.semua') }}"
                                                            class="nav-link {{ menuAktif(route('penindakan-pelanggaran.semua')) }}"
                                                            data-key="t-calendar">
                                                            Penindakan Pelanggaran</a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_pendidikan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-pendidikan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-pendidikan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Pendidikan </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_hubungan_wali.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-hubungan-wali.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-hubungan-wali.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Hubungan Wali</a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_status_anak.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-status-anak.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-status-anak.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Status Anak</a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_tahfidz.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-tahfidz.semua') }}"
                                                            class="nav-link  {{ menuAktif(route('kategori-tahfidz.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Tahfidz </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.hafalan_aurad.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('hafalan-aurad.semua') }}"
                                                            class="nav-link  {{ menuAktif(route('hafalan-aurad.semua')) }}"
                                                            data-key="t-calendar">
                                                            Hafalan Aurad </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_penghargaan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-penghargaan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-penghargaan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Kategori Penghargaan</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif
                                    @if (hasOneOfPermissions($permissions_per_menu['master_kepegawaian']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#master-kepegawaian"
                                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="master-kepegawaian">
                                            <i class="ri-save-3-line"></i> <span data-key="t-apps">Master
                                                Kepegawaian</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expand('master/statuspernikahan*') }}"
                                            id="master-kepegawaian">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('master.kategori_status_pernikahan.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('status-pernikahan.semua') }}"
                                                            class="nav-link {{ menuAktif(route('status-pernikahan.semua')) }}"
                                                            data-key="t-calendar">
                                                            Status Pernikahan</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif
                                    @if (hasOneOfPermissions($permissions_per_menu['master_akademik']))
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#master-akademik"
                                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="master-akademik">
                                            <i class="ri-save-3-line"></i> <span data-key="t-apps">Master
                                                Akademik</span>
                                        </a>
                                        <div class="collapse menu-dropdown {{ expandDropdownGroup(['master/kategoristatusmukim*', 'master/kategoriprogrampesantren*', 'master/kategorimatapelajaran*']) }}"
                                            id="master-akademik">
                                            <ul class="nav nav-sm flex-column">
                                                @if (hasPermission('master.kategori_status_mukim.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-status-mukim.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-status-mukim.semua')) }}"
                                                            data-key="t-calendar">
                                                            Status Mukim </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_program_pesantren.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-program-pesantren.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-program-pesantren.semua')) }}"
                                                            data-key="t-calendar">
                                                            Program Pesantren </a>
                                                    </li>
                                                @endif
                                                @if (hasPermission('master.kategori_mata_pelajaran.view'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('kategori-mata-pelajaran.semua') }}"
                                                            class="nav-link {{ menuAktif(route('kategori-mata-pelajaran.semua')) }}"
                                                            data-key="t-calendar">
                                                            Mata Pelajaran </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @endif




                                    {{-- @if (hasPermission('master.kategori_perizinan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-perizinan.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Perizinan </a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_penghasilan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-penghasilan.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Penghasilan </a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_pekerjaan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-pekerjaan.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Pekerjaan </a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_status_mukim.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-status-mukim.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Status Mukim </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('master.kategori_program_pesantren.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-program-pesantren.semua') }}"
                                                class="nav-link" data-key="t-calendar">
                                                Kategori Program Pesantren </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('master.kategori_mata_pelajaran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-mata-pelajaran.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Mata Pelajaran </a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.status_penanganan_kesehatan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('penanganan-kesehatan.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Status Penanganan Kesehatan </a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_pendidikan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-pendidikan.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Pendidikan </a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_hubungan_wali.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-hubungan-wali.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Hubungan Wali</a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_status_anak.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-status-anak.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Status Anak</a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_status_pernikahan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('status-pernikahan.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Status Pernikahan</a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_status_rumah.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-status-rumah.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Kategori Status Rumah</a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.penindakan_pelanggaran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('penindakan-pelanggaran.semua') }}" class="nav-link"
                                                data-key="t-calendar">
                                                Penindakan Pelanggaran</a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasPermission('master.kategori_penghargaan.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('kategori-penghargaan.semua') }}"
                                                class="nav-link {{ menuAktif(route('kategori-penghargaan.semua')) }}"
                                                data-key="t-calendar">
                                                Kategori Penghargaan</a>
                                        </li>
                                    @endif --}}
                                    {{-- @if (hasOneOfPermissions($permissions_per_menu['tahfidz']))
                                        <li class="nav-item">
                                            <a class="nav-link menu-link" href="#master-tahfidz"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="master-tahfidz">
                                                <i class="ri-save-3-line"></i> <span data-key="t-apps">Master
                                                    Tahfidz</span>
                                            </a>
                                            <div class="collapse menu-dropdown {{ expand('master-tahfidz') }}"
                                                id="master-tahfidz">
                                                <ul class="nav nav-sm flex-column">
                                                    @if (hasPermission('master.kategori_tahfidz.view'))
                                                        <li class="nav-item">
                                                            <a href="{{ route('kategori-tahfidz.semua') }}"
                                                                class="nav-link  {{ menuAktif(route('kategori-tahfidz.semua')) }}"
                                                                data-key="t-calendar">
                                                                Kategori Tahfidz </a>
                                                        </li>
                                                    @endif
                                                    @if (hasPermission('master.hafalan_aurad.view'))
                                                        <li class="nav-item">
                                                            <a href="{{ route('hafalan-aurad.semua') }}"
                                                                class="nav-link  {{ menuAktif(route('hafalan-aurad.semua')) }}"
                                                                data-key="t-calendar">
                                                                Hafalan Aurad </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif --}}
                                    @if (hasOneOfPermissions($permissions_per_menu['jadwal']))
                                        <li class="nav-item">
                                            <a class="nav-link menu-link" href="#master-absen"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="master-absen">
                                                <i class="ri-save-3-line"></i> <span data-key="t-apps">Master
                                                    Absen</span>
                                            </a>
                                            <div class="collapse menu-dropdown {{ expand('master/master-absensi*') }}"
                                                id="master-absen">
                                                <ul class="nav nav-sm flex-column">
                                                    @if (hasPermission('master.jadwal_makan.view'))
                                                        <li class="nav-item">
                                                            <a href="{{ route('master-absensi-makan.semua') }}"
                                                                class="nav-link  {{menuAktif(route('master-absensi-makan.semua'))}}" data-key="t-calendar">
                                                                Master Jadwal Makan </a>
                                                        </li>
                                                    @endif
                                                    @if (hasPermission('master.jadwal_sholat.view'))
                                                        <li class="nav-item">
                                                            <a href="{{ route('master-absensi-sholat.semua') }}"
                                                                class="nav-link  {{menuAktif(route('master-absensi-sholat.semua'))}}" data-key="t-calendar">
                                                                Master Jadwal Sholat </a>
                                                        </li>
                                                    @endif
                                                    @if (hasPermission('master.jadwal_jam_mata_pelajaran.view'))
                                                        <li class="nav-item">
                                                            <a href="{{ route('master-absensi-matpel.semua') }}"
                                                                class="nav-link  {{menuAktif(route('master-absensi-matpel.semua'))}}" data-key="t-calendar">
                                                                Master Jadwal Jam Mata Pelajaran </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    @if (hasPermission('master.administrasi_surat.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('master-surat.semua') }}" class="nav-link  {{menuAktif(route('master-surat.semua'))}}"
                                            data-key="t-calendar">
                                            Administrasi Surat </a>
                                    </li>
                                    @endif

                                </ul>
                            </div>

                        </li>
                    @endif

                    @if (hasOneOfPermissions($permissions_per_menu['informasi']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#informasi" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="informasi">
                                <i class="ri-information-line"></i> <span data-key="t-apps">Informasi</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('informasi*') }}" id="informasi">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('informasi.berita.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('informasi.all') }}"
                                                class="nav-link {{ menuAktif(route('informasi.all')) }}" data-key="t-calendar">
                                                Berita
                                            </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('informasi.broadcast_pesan.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('informasi.broadcast-pesan') }}"
                                            class="nav-link {{ menuAktif(route('informasi.broadcast-pesan')) }}"
                                            data-key="t-calendar">
                                            Broadcast Pesan
                                        </a>
                                    </li>
                                    @endif
                                    @if (hasPermission('informasi.broadcast_tagihan_pembayaran.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('informasi.broadcast-tagihan-pembayaran') }}"
                                                class="nav-link {{ menuAktif(route('informasi.broadcast-tagihan-pembayaran')) }}"
                                                data-key="t-calendar">
                                                Broadcast Tagihan Pembayaran
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if (hasOneOfPermissions($permissions_per_menu['pengaturan']))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#pengaturan" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="pengaturan">
                                <i class="ri-settings-4-line"></i> <span data-key="t-apps">Pengaturan</span>
                            </a>
                            <div class="collapse menu-dropdown {{ expand('pengaturan*') }}" id="pengaturan">
                                <ul class="nav nav-sm flex-column">
                                    @if (hasPermission('pengaturan.general.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('pengaturan.semua') }}" class="nav-link {{ Request::is('pengaturan') ? 'active' : '' }}"
                                                data-key="t-calendar">
                                                General </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('pengaturan.general_setting.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('pengaturan.general-setting') }}" class="nav-link {{ menuAktif(route('pengaturan.general-setting')) }}"
                                                data-key="t-calendar">
                                                General Setting </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('pengaturan.pengguna.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('reset-password') }}" class="nav-link {{ menuAktif(route('reset-password')) }}" data-key="t-calendar">
                                                Pengguna </a>
                                        </li>
                                    @endif
                                    @if (hasPermission('pengaturan.data_instansi.view'))
                                        <li class="nav-item">
                                            <a href="{{ route('pengaturan.data-instansi') }}"
                                                class="nav-link {{ menuAktif(route('pengaturan.data-instansi')) }}"
                                                data-key="t-chat">
                                                Data
                                                Instansi </a>
                                        </li>
                                    @endif
                                    {{-- <li class="nav-item">
                                    <a href="{{route('blanko.semua')}}" class="nav-link" data-key="t-calendar">
                                        Blanko Kartu </a>
                                </li> --}}
                                @if (hasPermission('pengaturan.template_kartu.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('pengaturan.template-kartu') }}"
                                            class="nav-link {{ menuAktif(route('pengaturan.template-kartu')) }}"
                                            data-key="t-chat">
                                            Template
                                            Kartu </a>
                                    </li>
                                @endif
                                @if (hasPermission('pengaturan.administrasi_surat.view'))
                                    <li class="nav-item">
                                        <a href="{{ route('administrasi-surat.semua') }}"
                                            class="nav-link {{ menuAktif('administrasi-surat.semua') }}"
                                            data-key="t-chat">
                                            Administrasi Surat </a>
                                    </li>
                                @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (hasPermission('laporan.history.view'))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ menuAktif('log.semua') }}"
                                href="{{ route('log.semua') }}">
                                <i class="ri-file-paper-2-line fs-20"></i> <span>History</span>
                            </a>
                        </li>
                    @endif

                    {{-- menu untuk Santri --}}
                    @hasallroles('Santri')
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ menuAktif('log.semua') }}"
                                href="{{ route('tagihan.semua') }}">
                                <i class="ri-price-tag-line fs-20"></i> <span>Tanggungan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ menuAktif('log.semua') }}"
                                href="{{ route('log.semua') }}">
                                <i class="ri-calendar-todo-line fs-20"></i> <span>Rekap Absensi</span>
                            </a>
                        </li>
                    @endhasanyrole

                    {{-- Laporan --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#laporan" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="laporan">
                            <i class="mdi mdi-file-document-outline"></i> <span data-key="t-apps">Laporan</span>
                        </a>
                        <div class="collapse menu-dropdown {{ expand('laporan*') }}" id="laporan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#pembayaran-laporan"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="pembayaran-laporan">
                                        Lap. Pembayaran</span>
                                    </a>
                                    <div class="collapse menu-dropdown {{ expand('laporan/laporan-pembayaran*') }}"
                                        id="pembayaran-laporan">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('laporan.pembayaran-laporan.perkelas') }}"
                                                    class="nav-link {{ menuAktif(route('laporan.pembayaran-laporan.perkelas')) }}"
                                                    data-key="t-chat">Per Kelas </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('laporan.pembayaran-laporan.pertanggal') }}"
                                                    class="nav-link {{ menuAktif(route('laporan.pembayaran-laporan.pertanggal')) }}"
                                                    data-key="t-chat">Per Tanggal </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('laporan.pembayaran-laporan.tagihan-santri') }}"
                                                    class="nav-link {{ menuAktif(route('laporan.pembayaran-laporan.tagihan-santri')) }}"
                                                    data-key="t-chat">Tagihan Santri </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('laporan.tahfidz')}}" class="nav-link {{ menuAktif(route('laporan.tahfidz')) }}" data-key="t-calendar">
                                        Lap. Tahfidz </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('laporan.perizinan')}}" class="nav-link {{ menuAktif(route('laporan.perizinan')) }}" data-key="t-calendar">
                                        Lap. Perizinan </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.pelanggaran') }}" class="nav-link {{ menuAktif(route('laporan.pelanggaran')) }}"
                                        data-key="t-calendar">
                                        Lap. Pelanggaran </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.kesehatan') }}" class="nav-link {{ menuAktif(route('laporan.kesehatan')) }}"
                                        data-key="t-calendar">
                                        Lap. Kesehatan </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#laporan-absensi" data-bs-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="laporan-absensi"> <span
                                            data-key="t-apps">Lap. Absensi</span>
                                    </a>
                                    <div class="collapse menu-dropdown {{ expand('laporan/absensi*') }}"
                                        id="laporan-absensi">
                                        <ul class="nav nav-sm flex-column">
                                            {{-- @if (hasPermission('laporan.tahfidz.view')) --}}
                                                <li class="nav-item">
                                                    <a href="{{ route('laporan.absensi-tahfidz') }}"
                                                        class="nav-link {{ menuAktif(route('laporan.absensi-tahfidz')) }}"
                                                        data-key="t-calendar">
                                                        Tahfidz </a>
                                                </li>
                                            {{-- @endif --}}
                                            {{-- @if (hasPermission('laporan.kelas_perhari.view')) --}}
                                                <li class="nav-item">
                                                    <a href="{{ route('laporan.absensi-kelas-perhari') }}"
                                                        class="nav-link {{ menuAktif(route('laporan.absensi-kelas-perhari')) }}"
                                                        data-key="t-calendar">
                                                        Kelas Perhari </a>
                                                </li>
                                            {{-- @endif --}}
                                            {{-- @if (hasPermission('laporan.kelas_perjam.view')) --}}
                                                <li class="nav-item">
                                                    <a href="{{ route('laporan.absensi-kelas-perjam') }}"
                                                        class="nav-link {{ menuAktif(route('laporan.absensi-kelas-perjam')) }}"
                                                        data-key="t-chat">
                                                        Kelas Perjam </a>
                                                </li>
                                            {{-- @endif --}}
                                            {{-- @if (hasPermission('laporan.absensi_pegawai.view')) --}}
                                                <li class="nav-item">
                                                    <a href="{{ route('laporan.absensi-guru-perhari') }}"
                                                        class="nav-link {{ menuAktif(route('laporan.absensi-guru-perhari')) }}"
                                                        data-key="t-chat">
                                                        Absensi Pegawai </a>
                                                </li>
                                            {{-- @endif --}}
                                            {{-- @if (hasPermission('laporan.absensi_sholat_berjamaah.view')) --}}
                                                <li class="nav-item">
                                                    <a href="{{ route('laporan.absensi-sholat-berjamaah') }}"
                                                        class="nav-link {{ menuAktif(route('laporan.absensi-sholat-berjamaah')) }}"
                                                        data-key="t-chat">
                                                        Absensi Sholat Berjamaah </a>
                                                </li>
                                            {{-- @endif --}}
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.status-perizinan') }}" class="nav-link {{ menuAktif(route('laporan.status-perizinan')) }}"
                                        data-key="t-calendar">
                                        Lap. Status Perizinan </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.penilaian') }}" class="nav-link {{ menuAktif(route('laporan.penilaian')) }}"
                                        data-key="t-calendar">
                                        Lap. Penilaian </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>
