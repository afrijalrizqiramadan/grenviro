<x-app-layout>
 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Status Pengiriman</h4>
                        <div class="row">
                            <div class="col-sm-6 mb-4 mb-xl-0">
                                <div class="d-lg-flex align-items-center">
                                    <div>
                                        <h3 class="text-dark font-weight-bold mb-2">Hi, Admin</h3>
                                        <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
                                    </div>
                                    <!--<div class="ms-lg-5 d-lg-flex d-none">-->
                                    <!--		<button type="button" class="btn bg-white btn-icon">-->
                                    <!--			<i class="mdi mdi-view-grid text-success"></i>-->
                                    <!--	</button>-->
                                    <!--		<button type="button" class="btn bg-white btn-icon ms-2">-->
                                    <!--			<i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>-->
                                    <!--		</button>-->
                                    <!--</div>-->
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="d-flex align-items-center justify-content-md-end">
                                    <div class="pe-1 mb-3 mb-xl-0">
                                            <button type="button"onclick="window.location.href='{{ route('customer.create') }}'" class="btn btn-success btn-icon-text">
                                                Tambah
                                                <i class="mdi mdi-account-plus btn-icon-append"></i>
                                        </button>
                                    </div>
                                    <!--<div class="pe-1 mb-3 mb-xl-0">-->
                                    <!--		<button type="button" class="btn btn-outline-inverse-info btn-icon-text">-->
                                    <!--			Print-->
                                    <!--			<i class="mdi mdi-printer btn-icon-append"></i>                          -->
                                    <!--		</button>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                        </p>
                        <div class="table-responsive">
                        </div>
                    <div>
                </div>
            </div>

        </div>

    </div>
</div>
</x-app-layout>
