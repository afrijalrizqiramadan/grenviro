<x-app-layout>
 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Status Tekanan Gas</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                          <th>Progress</th>
                          <th>Tekanan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($latestPressures as $index=>$pressure)

                        <tr>
                            <td class="py-1">{{ $index + 1 }}</td>

                          <td class="py-1">
                            {{ $pressure->name }}
                          </td>
                          <td>
                            {{ $pressure->location }}
                          </td>
                          <td>
                            <div class="progress">
                                <div class="progress-bar
                                @if($pressure->pressure < 20)
                                    bg-danger
                                @elseif($pressure->pressure  >= 20 && $pressure->pressure  < 40)
                                    bg-warning
                                @else
                                    bg-success
                                @endif
                            " role="progressbar" style="width: {{$pressure->pressure }}%" aria-valuenow="{{$pressure->pressure }}" aria-valuemin="0" aria-valuemax="100"></div>                            </div>
                          </td>
                                                    <td class="@if($pressure->pressure < 20)
                                   text-danger
                                @elseif($pressure->pressure  >= 20 && $pressure->pressure  < 40)
                                    text-warning
                                @else
                                    text-success
                                @endif font-weight-bold">{{ $pressure->pressure }}%

                             <td><label class="badge @if($pressure->pressure < 20)
                                   badge-danger
                                @elseif($pressure->pressure  >= 20 && $pressure->pressure  < 40)
                                    badge-warning
                                @else
                                    badge-success
                                @endif"> @if($pressure->pressure < 20)
                                Waktu Pengisian
                            @elseif($pressure->pressure >= 20 && $pressure->pressure < 40)
                                Hampir Habis
                            @else
                                Masih Penuh
                            @endif</label></td>
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
