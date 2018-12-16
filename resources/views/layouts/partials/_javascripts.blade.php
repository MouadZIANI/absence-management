@if ( \Request::is('admin/bikes/*') || \Request::is('admin/accessories/*') || \Request::is('admin/components/*'))

@else
<script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}"></script>
@endif
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/js.cookie.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('assets/global/plugins/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/morris/morris.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.sparkline.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ URL::asset('assets/global/scripts/app.min.js') }}"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('assets/pages/scripts/dashboard.min.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('assets/bootstrap-select.js') }}"></script>
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ URL::asset('assets/layouts/layout/scripts/layout.min.js') }}"></script>
<script src="{{ URL::asset('assets/layouts/layout/scripts/demo.min.js') }}"></script>
<script src="{{ URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}"></script>