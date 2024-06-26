<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts/>
<script>
    Livewire.on('modalTambah', function (component) {
        $('#' + component).modal('show');
    });

    Livewire.on('modalEdit', function (component) {
        $('#' + component).modal('show');
    });

    Livewire.on('openModal', function (component) {
        $('#' + component).modal('show');
    });

    Livewire.on('close', function (component) {
        $('#' + component).modal('hide');
    });



    /*let updatedForm = false;

    Livewire.hook('element.updated', (el, component) => {
        updatedForm = true;
    })

    window.addEventListener('alert', event => {
        updatedForm = false;
    })

    window.onbeforeunload = function (e) {
        if (updatedForm == true) {
            return "Data yang dibuat belum tersimpan"
        }
    };*/

</script>

