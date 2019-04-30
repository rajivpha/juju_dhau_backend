<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand">Admin Panel</a>
            <a class="navbar-brand hidden" >K</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="ti-dashboard"></i>
                        Dashboard
                    </a>
                </li>

                <li  class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class=" ti-desktop"></i>
                        Products
                    </a>
                    <ul class="sub-menu children dropdown-menu">

                        <li>
                            <a href="{{route('admin.product.view')}}">
                                <i class="ti-angle-double-right"></i>
                                View Product
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.product.add')}}">
                                <i class="ti-angle-double-right"></i>
                                Add Product
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-flickr"></i>
                        Product Category
                    </a>

                    <ul class="sub-menu children dropdown-menu">

                                <li>
                                    <a href="{{route('admin.category.view')}}">
                                        <i class="ti-angle-double-right"></i>
                                        View Category
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('admin.category.add')}}">
                                        <i class="ti-angle-double-right"></i>
                                        Add Category
                                    </a>
                                </li>



                            </ul>
                        </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-truck"></i>
                        Supply
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li >
                            <a href="{{route('admin.supplies.list')}}">
                                <i class="ti-angle-double-right"></i>
                                Supplied Product List
                            </a>
                        </li>


                        <li >
                            <a href="{{route('admin.supplies.addSupply')}}">
                                <i class="ti-angle-double-right"></i>
                                Add Supply
                            </a>
                        </li>


                        <li >
                            <a href="{{route('admin.supplies.supply')}}">
                                <i class="ti-angle-double-right"></i>
                                Supplier List
                            </a>
                        </li>
                    </ul>
                </li>

                <li   class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-user"></i>
                        User Management
                    </a>

                    <ul class="sub-menu children dropdown-menu">
                        <li >
                            <a href="{{route('admin.userManagement.view')}}">
                                <i class="ti-angle-double-right"></i>
                                list of Dealers
                            </a>
                        </li>

                        <li >
                            <a href="{{route('admin.userManagement.addStaff')}}">
                                <i class="ti-angle-double-right"></i>
                                Add Staff
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.userManagement.dealerRequests')}}">
                                <i class="ti-angle-double-right"></i>
                                Dealership Requests
                            </a>
                        </li>

                    </ul>
                </li>

                <li  class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-money"></i>
                        Payment
                    </a>

                    <ul class="sub-menu children dropdown-menu">
                        <li >
                            <a href="{{route('admin.payment.received')}}">
                                <i class="ti-angle-double-right"></i>
                                Payment Received
                            </a>
                        </li>

                        <li >
                            <a href="{{route('admin.payment.paid')}}">
                                <i class="ti-angle-double-right"></i>
                                Payment paid
                            </a>
                        </li>


                    </ul>
                </li>

                <li  class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-server"></i>
                        Orders
                    </a>

                    <ul class="sub-menu children dropdown-menu">

                        <li >
                            <a href="{{route('admin.order.pending')}}">
                                <i class="ti-angle-double-right"></i>
                                Pending Orders
                            </a>
                        </li>

                        <li >
                            <a href="{{route('admin.order.approved')}}">
                                <i class="ti-angle-double-right"></i>
                                Approved Orders
                            </a>
                        </li>


                    </ul>
                </li>

                <li  class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-image"></i>
                        Banners
                    </a>

                    <ul class="sub-menu children dropdown-menu">
                        <li >
                            <a href="{{route('admin.banners.view')}}">
                                <i class="ti-angle-double-right"></i>
                                View Banner
                            </a>
                        </li>

                        <li >
                            <a href="{{route('admin.banners.add')}}">
                                <i class="ti-angle-double-right"></i>
                                Add Banner
                            </a>
                        </li>



                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</aside>