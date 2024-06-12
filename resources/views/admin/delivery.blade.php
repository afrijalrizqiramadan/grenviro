<x-app-layout>
 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Status Pengiriman</h4>
                  <p class="card-description">
                  </p>
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
            </div>

        </x-app-layout>
