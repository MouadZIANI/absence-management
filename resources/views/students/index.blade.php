@extends('layouts.master')

@section('content')
  <div class="my-3 my-md-5">
    <div class="container">
      <div class="page-header">
        <h1 class="page-title"> @yield('page-title') </h1>
      </div>
      <div class="row">
          @extends('layouts.partials._nav-sidebar-left')
        <div class="col-lg-9">
          @yield('content-2')
        </div>
      </div>
    </div>
  </div>
@endsection