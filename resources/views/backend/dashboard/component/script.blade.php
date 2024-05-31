<!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dashboard/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
    <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('dashboard/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('dashboard/js/dashboard.js')}}"></script>
    <script src="{{asset('dashboard/js/todolist.js')}}"></script>
    <script src="{{asset('dashboard/library/library.js')}}"></script>
    <script src="{{asset('dashboard/library/location.js')}}"></script>
    <script src="{{asset('dashboard/plugin/ckfinder/ckfinder.js')}}"></script>
    <script src="{{asset('dashboard/library/finder.js')}}"></script>
    <script src="{{asset('dashboard/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dashboard/js/main.js')}}"></script>
    <script src="{{asset('dashboard/js/file-upload.js')}}"></script>
    <!-- End custom js for this page -->
@stack('scripts')
