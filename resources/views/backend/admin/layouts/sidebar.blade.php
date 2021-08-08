@section('sidebar')

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                <div class="sidebar-brand-icon">
                    <img src="{{url('uploads/admins/'.Auth::guard('admin')->user()->image)}}">
                </div>
                <div class="sidebar-brand-text mx-3">
                    {{Auth::guard('admin')->user()->username}}

                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>

            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")||(\Illuminate\Support\Facades\Auth::user()->role == "client"))
                <li class="nav-item">

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                       aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-fw fa-window-maximize"></i>
                        <span>Admin Users</span>
                    </a>
                    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin"))

                                <a class="collapse-item" href="{{route('addAdminUser')}}">add-admin-user</a>
                                <a class="collapse-item" href="{{route('showAdminUser')}}">show-admin-user</a>

                            @else
                                <a class="collapse-item" href="{{route('showAdminUser')}}">show-admin-user</a>
                            @endif
                        </div>
                    </div>
                </li>
            @else
            @endif




            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")||(\Illuminate\Support\Facades\Auth::user()->role == "client")||(\Illuminate\Support\Facades\Auth::user()->role == "developer"))

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#scollapsePage"
                       aria-expanded="scollapsePage"
                       aria-controls="scollapsePage">
                        <i class="fab fa-fw fa-accessible-icon"></i>
                        <span>Client</span>
                    </a>
                    <div id="scollapsePage" class="collapse" aria-labelledby=""
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")
                            ||(\Illuminate\Support\Facades\Auth::user()->role == "client")
                             ||(\Illuminate\Support\Facades\Auth::user()->role == "developer"))

                                <a class="collapse-item" href="{{route('addClient')}}">Add Client</a>
                                <a class="collapse-item" href="{{route('showClient')}}">Show Client</a>
                            @else
                                <a class="collapse-item" href="{{route('showClient')}}">Show Client</a>
                            @endif
                        </div>
                    </div>
                </li>

            @else


            @endif









        @if( auth()->check() && (Auth::user()->role == "super-admin")
                    ||(\Illuminate\Support\Facades\Auth::user()->role == "sales")
                    ||(\Illuminate\Support\Facades\Auth::user()->role == "client")

                     )

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                       aria-expanded="true"
                       aria-controls="collapseForm">
                        <i class="fab fa-fw fa-wpforms"></i>
                        <span>Leads</span>
                    </a>
                    <div id="collapseForm" class="collapse" aria-labelledby="headingForm"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if( auth()->check() && (Auth::user()->role == "super-admin")
                             ||(\Illuminate\Support\Facades\Auth::user()->role == "sales")
                           )

                                <a class="collapse-item" href="{{route('add-company')}}">Add Lead</a>
                                <a class="collapse-item" href="{{route('show-company')}}">Show Leads</a>
                                <a class="collapse-item" href="{{route('addService')}}">Add service type</a>
                            @else
                                <a class="collapse-item" href="{{route('show-company')}}">Show Leads</a>
                            @endif
                        </div>
                    </div>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                       aria-expanded="true"
                       aria-controls="collapseForm">
                        <i class="fab fa-fw fa-wpforms"></i>
                        <span>Leads</span>
                    </a>
                    <div id="collapseForm" class="collapse" aria-labelledby="headingForm"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('show-company')}}">Show Leads</a>
                        </div>
                    </div>
                </li>

            @endif


            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")||(\Illuminate\Support\Facades\Auth::user()->role == "account")
                 ||(\Illuminate\Support\Facades\Auth::user()->role == "client")
                 ||(\Illuminate\Support\Facades\Auth::user()->role == "sales") )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                       aria-expanded="true"
                       aria-controls="collapseTable">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Accounts</span>
                    </a>
                    <div id="collapseTable" class="collapse" aria-labelledby="headingTable"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")
                                 ||(\Illuminate\Support\Facades\Auth::user()->role == "account"))

                                <a class="collapse-item" href="{{route('addAccounts')}}">Add Accounts</a>

                                <a class="collapse-item" href="{{route('show-accounts')}}">Show Accounts</a>
                            @else
                                <a class="collapse-item" href="{{route('show-accounts')}}">Show Accounts</a>
                            @endif

                        </div>
                    </div>
                </li>
            @else
            @endif



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
                   aria-expanded="true"
                   aria-controls="scollapseData">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>Invoice</span>
                </a>

                <div id="collapseData" class="collapse" aria-labelledby="scollapseData" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{--                        <h6 class="collapse-header">Example Pages</h6>--}}
                        <a class="collapse-item" href="{{route('invoice')}}">Invoice</a>
                        <a class="collapse-item" href="{{route('showInvoice')}}">Show invoice</a>

                    </div>
                </div>
            </li>







            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Examples
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                   aria-expanded="true"
                   aria-controls="collapsePage">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>Pages</span>
                </a>

                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{--                        <h6 class="collapse-header">Example Pages</h6>--}}
                        <a class="collapse-item" href="{{route('admin-logout')}}">Logout</a>
                        <a class="collapse-item" href="#">Register</a>

                    </div>
                </div>
            </li>


        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small"
                                               placeholder="What do you want to look for?"
                                               aria-label="Search" aria-describedby="basic-addon2"
                                               style="border-color: #3f51b5;">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                     src="{{url('uploads/admins/'.Auth::guard('admin')->user()->image)}}"
                                     style="max-width: 60px">
                                <span
                                    class="ml-2 d-none d-lg-inline text-white small">{{Auth::guard('admin')->user()->name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{route('admin-logout')}}"
                                   class="btn btn-danger btn-small " data-toggle="modal" data-target="#logoutModal">
                                    {{--                                <a href="{{route('admin-logout')}}" class="btn btn-danger btn-small ">Logout</a>--}}


                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>


                            </div>
                        </li>
                    </ul>
                </nav>

@endsection
