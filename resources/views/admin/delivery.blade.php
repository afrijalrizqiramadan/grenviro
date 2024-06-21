<x-app-layout>

 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-2">Pengiriman</h4>
                            <div class="dropdown">
                                {{-- <a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
                                <a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="settingsDropdownsales">
                                    <i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="settingsDropdownsales">
                                        <a class="dropdown-item">
                                            <i class="mdi mdi-grease-pencil text-primary"></i>
                                            Edit
                                        </a>
                                        <a class="dropdown-item">
                                            <i class="mdi mdi-delete text-primary"></i>
                                            Delete
                                        </a> --}}
                                    </div>
                            </div>
                        </div>
                        <div>
                            <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-2 pe-2" id="proses-tab" data-bs-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="true">Diproses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2" id="kirim-tab" data-bs-toggle="tab" href="#kirim" role="tab" aria-controls="kirim" aria-selected="false">Pengiriman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2" id="selesai-tab" data-bs-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2" id="batal-tab" data-bs-toggle="tab" href="#batal" role="tab" aria-controls="batal" aria-selected="false">Dibatalkan</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-no-active-fill-tab-content">
                                <div class="tab-pane fade show active" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Lokasi</th>
                                                    <th>Jadwal</th>
                                                    <th>Total Pengiriman</th>
                                                    <th>No Telepon</th>
                                                    <th>Status</th>
                                                  <th>Aksi</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($statuses as $index=>$delivery)

                                                <tr>
                                                    <td class="py-1">{{ $index + 1 }}</td>

                                                  <td class="py-1">
                                                    {{ $delivery->customer->name }}
                                                  </td>
                                                  <td class="py-1">
                                                    {{ $delivery->customer->location }}
                                                  </td>
                                                    <td>{{ \Carbon\Carbon::parse($delivery->delivery_date)->translatedFormat('d F Y')}}</td>
                                                  <td class="py-1">
                                                    {{ $delivery->total }}
                                                  </td>
                                                  <td>
                                                    {{ $delivery->customer->telp }}
                                                    <button onclick="redirectToWhatsApp(' {{ $delivery->customer->telp }}')" type="button" class="btn btn-inverse-success btn-icon">
                                                        <i class="mdi mdi-whatsapp"></i>
                                                      </button>
                                                  </td>
                                                  <td><label class="badge
                                                    @if($delivery->status == 'Selesai')
                                                       badge-success
                                                   @elseif($delivery->status == 'Dalam Perjalanan')
                                                       badge-warning
                                                   @elseif($delivery->status == 'Batal')
                                                       badge-danger
                                                   @elseif($delivery->status == 'Disiapkan')
                                                       badge-info
                                                   @endif
                                                   ">{{ $delivery->status }}</label></td>
                                                  <td>

                                                    <button type="button" class="btn-sm btn-success btn-icon-text">
                                                        Kirim
                                                      </button>
                                                    </td>
                                                </tr>

                                                @endforeach

                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                    <canvas id="revenue-for-last-month-chart"></canvas>
                                </div>
                                <div class="tab-pane fade" id="kirim" role="tabpanel" aria-labelledby="kirim-tab">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-4">+5.2% vs last 7 days</p>
                                        <div id="serveLoading-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="serveLoading"></canvas>
                                </div>
                                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-4">+5.2% vs last 7 days</p>
                                        <div id="dataManaged-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="dataManaged"></canvas>
                                </div>
                                <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="batal-tab">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-4">+5.2% vs last 7 days</p>
                                        <div id="salesTrafic-legend" class="revenuechart-legend">f</div>
                                    </div>
                                    <canvas id="salesTrafic"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            @push('javascript')
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

            <script>
                function redirectToWhatsApp(phoneNumber) {
                    phoneNumber = phoneNumber.replace(/\D/g, '');

// Logika untuk menambahkan +62 jika diperlukan
if (!phoneNumber.startsWith('62')) {
    if (phoneNumber.startsWith('0')) {
        phoneNumber = '62' + phoneNumber.slice(1);
    } else {
        phoneNumber = '62' + phoneNumber;
    }
}

// Menambahkan tanda +
phoneNumber = '+' + phoneNumber;
                    var message = ''; // Ganti dengan pesan yang Anda inginkan
                    var url = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message);
                    console.log(url)
                    window.location.href = url;
                }
                </script>
                @endpush
        </x-app-layout>
