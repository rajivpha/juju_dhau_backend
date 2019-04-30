<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/scss/style.css')}}">
    <link href="{{asset('assets/admin-panel/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>
<body>




@include('admin.includes.menubar')


<div id="right-panel" class="right-panel">

    @include('admin.includes.navbar')


    @yield('content')

</div>


<script src="{{asset('assets/admin-panel/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{asset('assets/admin-panel/js/plugins.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/main.js')}}"></script>


<script src="{{asset('assets/admin-panel/js/lib/chart-js/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/dashboard.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/widgets.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/lib/vector-map/jquery.vmap.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

</body>
</html>
