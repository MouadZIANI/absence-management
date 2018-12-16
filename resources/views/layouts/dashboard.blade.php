<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Bike Morocco | Administration</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Twitter -->
        <meta name="twitter:site" content="@themepixels">
        <meta name="twitter:creator" content="@themepixels">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Bracket">
        <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

        <!-- Facebook -->
        <meta property="og:url" content="http://themepixels.me/bracket">
        <meta property="og:title" content="Bracket">
        <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

        <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
        <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">

        @include('layouts/partials/_stylesheets')
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        @include('layouts/partials/_nav-top-admin')
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            @include('layouts/partials/_nav-sidebar-admin')
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="clearfix"> </div>
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="@yield('breadcrumb-1-key')">@yield('breadcrumb-1-value')</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="@yield('breadcrumb-2-key')">@yield('breadcrumb-2-value')</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span class="breadcrumb-item active">@yield('breadcrumb-3-value')</span>
                            </li>
                        </ul>
                    </div>
                    <div class="height-40"></div>
                    @include('layouts/partials/_messages')
                    <!-- END PAGE BAR -->
                    <div class="clearfix"> </div>

                    @yield('content')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2018 &copy;
                <a href="/" title="Mon-docteur.net" target="_blank"> Bike-Morocco by SEOCOM</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>

        @yield('jqueryscripts')
        @include('layouts/partials/_javascripts')

        @yield('scripts')
        
    </body>
</html>
