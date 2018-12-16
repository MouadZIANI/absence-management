<!-- vendor css -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/plugins/morris/morris.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/global/css/plugins.min.css') }}" rel="stylesheet">
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ URL::asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/custom.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/bootstrap-select.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/admin-custom.css') }}" rel="stylesheet">
<!-- END THEME LAYOUT STYLES -->

<script type="text/javascript">
	
	var APP_URL = "{{ route('admin') }}/";

</script>

@yield('stylesheets')