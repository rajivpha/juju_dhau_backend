<header role="banner">
    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-4 text-center">
                <img src="{{asset('assets/test/images/logo.png')}}" alt="logo" >
            </div>
            <div class="col-8 ">
                <h1 class="site-logo"><a href="{{route('homepage')}}">Khwopa</a></h1>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto">
                    <li {!! request()->is('/')?'class="active"':'' !!} class="nav-item">
                        <a class="nav-link " href="{{route('homepage')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('login') }}" >
                            Login
                        </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a>

                        </div>

                    </li>

                    <li {!! request()->is('/register')?'class="active"':'' !!} class="nav-item">
                        <a class="nav-link" href="{{ route('user.register.show') }}">Register</a>
                    </li>
                    <li {!! request()->is('/contactus')?'class="active"':'' !!} class="nav-item">
                        <a class="nav-link" href="{{ route('contactus') }}">Contact</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>