
<header role="banner">

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-4 text-center">
                <img src="{{asset('assets/test/images/logo.png')}}" alt="logo" >
            </div>
            <div class="col-8">
                <h1 class="site-logo"><a href="{{route('userdash')}}">Khwopa</a></h1>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ll class="navbar-nav mx-auto">
                    <li {!! request()->is('userdash')?'class="active"':'' !!} class="nav-item">
                        <a class="nav-link " href="{{route('userdash')}}">Dashboard</a>
                    </li>

                    <li {!! request()->is('product')?'class="active"':'' !!} class="nav-item">
                        <a class="nav-link " href="{{route('user.product.view')}}">Products</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " >Order</a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{route('user.order.list')}}">Order List</a>
                            <a class="dropdown-item" href="{{route('user.order.placeorder')}}">Place Order</a>
                            <a class="dropdown-item" href="{{route('user.order.approved')}}">Previous Orders</a>

                        </div>

                    </li>

                    <li {!! request()->is('/feedback')?'class="active"':'' !!} class="nav-item">
                        <a class="nav-link" href="{{route('user.user.feedback')}}">Feedback</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " id="username"><i class="fa fa-user"></i><b>{{ Auth::user()->name }}</b> <i class="fa fa-caret-down"></i> </a>
                        <div class="dropdown-menu" >

                                <a class="dropdown-item" id ="logout" href="{{ route('user.logout') }}">
                                    Logout
                                </a>

                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>