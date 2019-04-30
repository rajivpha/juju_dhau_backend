<!doctype html>
<html lang="en">
<head>
    <title>Khwopa JuJu Dhau</title>
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/test/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/test/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/test/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/test/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/test/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/test/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('assets/test/css/style.css')}}">
</head>
<body>



@include('user.includes.userheader')

@yield('content')

@include('user.includes.footer')





<script src="{{asset('assets/test/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/test/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('assets/test/js/popper.min.js')}}"></script>
<script src="{{asset('assets/test/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/test/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/test/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/test/js/jquery.stellar.min.js')}}"></script>


<script src="{{asset('assets/test/js/main.js')}}"></script>
</body>
</html>