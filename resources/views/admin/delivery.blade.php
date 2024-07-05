<x-app-layout>
    @push('javascript')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
       document.addEventListener('DOMContentLoaded', function () {
        var deliveryId='';
            $('.update-btn').on('click', function () {
                var deliveryId = $(this).data('delivery-id');
                var deliveryStatus = $(this).data('delivery-status');
                $('#formStatus').val(deliveryStatus);
                $('#formDeliveryId').val(deliveryId);

            });

            $('#updateForm').on('submit', function (e) {
                e.preventDefault();
                let id = $('#formDeliveryId').val();
                let status = $('#formStatus').val();
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "http://127.0.0.1:8000/api/update-status/1",
                    type: "POST",
                    data: {
                        _token: _token,
                        status: status
                    },
                    success: function(response) {
                        if(response.success) {
                            alert('Status updated successfully');
                        } else {
                            alert('Failed to update status');
                        }
                    },
                    error: function(response) {
                        alert('Error occurred');
                    }
                });
            });
});
</script>
@endpush
 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-2">Pengiriman</h4>
                            <div class="alert alert-success" id="successAlert" role="alert" style="display:none;">
                                Data inserted successfully!
                            </div>
                            <div class="alert alert-danger" id="errorAlert" role="alert" style="display:none;">
                                Failed to insert data.
                            </div>
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

                            <ul class="nav nav-tabs tab-no-active-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2 active" id="proses-tab" data-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="true">Diproses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2 nav-link" id="kirim-tab" data-toggle="tab" href="#kirim" role="tab" aria-controls="kirim" aria-selected="false">Pengiriman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2 nav-link" id="selesai-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 pe-2 nav-link" id="batal-tab" data-toggle="tab" href="#batal" role="tab" aria-controls="batal" aria-selected="false">Dibatalkan</a>
                                </li>
                            </ul>

                            <!-- Tab content -->
                            <div class="tab-content tab-no-active-fill-tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table ">
                                              <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Lokasi</th>
                                                    <th>Jadwal</th>
                                                    <th>Total Pengiriman</th>
                                                    <th>No Telepon</th>
                                                    <th>Status</th>
                                                    @if($user->hasRole('administrator'))
                                                        <th>Aksi</th>
                                                    @endif
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($statusesProses as $index=>$delivery)

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
                                                   @if($user->hasRole('administrator'))

                                                  <td>
                                                    <button class="btn btn-warning update-btn"
                                                    data-delivery-status="{{ $delivery->status }}"
                                                    data-delivery-id="{{ $delivery->id }}"
                                                    data-toggle="modal"
                                                    data-target="#updateModal">
                                                    Update
                                                </button>
                                                    </td>
                                                    @endif
                                                </tr>

                                                @endforeach

                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kirim" role="tabpanel" aria-labelledby="kirim-tab">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Lokasi</th>
                                                    <th>Jadwal</th>
                                                    <th>Total Pengiriman</th>
                                                    <th>No Telepon</th>
                                                    <th>Status</th>
                                                    @if($user->hasRole('administrator'))

                                                  <th>Aksi</th>
                                                  @endif
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($statusesKirim as $index=>$delivery)

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
                                                   @if($user->hasRole('administrator'))
                                                  <td>
                                                   <button class="btn btn-warning update-btn"
                                                   data-delivery-status="{{ $delivery->status }}"
                                                   data-delivery-id="{{ $delivery->id }}"

                                                   data-toggle="modal"
                                                   data-target="#updateModal">
                                                   Update
                                               </button>
                                                    </td>
                                                    @endif
                                                </tr>

                                                @endforeach

                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Lokasi</th>
                                                    <th>Jadwal</th>
                                                    <th>Total Pengiriman</th>
                                                    <th>No Telepon</th>
                                                    <th>Status</th>
                                                    @if($user->hasRole('administrator'))
                                                  <th>Aksi</th>
                                                  @endif
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($statusesSelesai as $index=>$delivery)

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
                                                   @if($user->hasRole('administrator'))
                                                  <td>

                                                    <button class="btn btn-warning update-btn"
                                                    data-delivery-status="{{ $delivery->status }}"
                                                    data-delivery-id="{{ $delivery->id }}"

                                                    data-toggle="modal"
                                                    data-target="#updateModal">
                                                    Update
                                                </button>
                                                    </td>
                                                    @endif
                                                </tr>

                                                @endforeach

                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="batal-tab">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Lokasi</th>
                                                    <th>Jadwal</th>
                                                    <th>Total Pengiriman</th>
                                                    <th>No Telepon</th>
                                                    <th>Status</th>

                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($statusesBatal as $index=>$delivery)

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

                                                </tr>

                                                @endforeach

                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                      <!-- Modal -->
                      <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Update Pengiriman</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateForm">
                                        @csrf
                                        <input type="hidden" name="delivery_id" id="formDeliveryId">

                                        <div class="form-group">
                                            <label for="formStatus">Status</label>
                                            <select class="form-control" id="formStatus" name="status" required>
                                                <option value="Disiapkan">Diproses</option>
                                                <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                                                <option value="Selesai">Selesai</option>
                                                <option value="Batal">Batal</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            @push('javascript')
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
