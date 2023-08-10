<html lang="en">
<!-- Mirrored from www.ansonika.com/fooyes/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Aug 2022 09:05:24 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Admin dashboard</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('cms-styles/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="{{ asset('cms-styles/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('cms-styles/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{ asset('cms-styles/css/admin.css') }}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{ asset('cms-styles/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- Plugin styles -->
    <link href="{{ asset('cms-styles/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{ asset('cms-styles/css/custom.css') }}" rel="stylesheet">
    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
 
    @yield('css')
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="{{route("dashboard")}}"><img src="{{ asset('cms-styles/img/logo.svg') }}" alt=""
                width="167" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Dashboard">
                    <a class="nav-link" href="{{route("dashboard")}}" >
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Dashboard">
                    <a class="nav-link" href="{{route("website.index")}}" target="_blank">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">WebSite</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Messages">
                    <a class="nav-link" href="{{route("stores.index")}}">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span class="nav-link-text">Stores</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Add listing + Menu List">
                    <a class="nav-link" href="{{route("categories.index")}}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="nav-link-text">categories</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Orders Page">
                    <a class="nav-link" href="{{route("products.index")}}">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        <span class="nav-link-text">Products</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Edit Order">
                    <a class="nav-link" href="edit-order.html">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <span class="nav-link-text">Orders</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Invoice">
                    <a class="nav-link" href="invoice.html" target="_blank">
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <span class="nav-link-text">Ratings</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title=""
                    data-original-title="Reviews">
                    <a href="{{ route("comments.index") }}" class="nav-link" >
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        <span class="nav-link-text">Comments</span>
                    </a>
                </li>
               
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">Messages
                            <span class="badge badge-pill badge-primary">12 New</span>
                        </span>
                        <span class="indicator text-primary d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>David Miller</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty
                                awesome! These messages clip off when they reach the end of the box so they don't
                                overflow over to the sides!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>Jane Smith</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I was wondering if you could meet for an appointment at
                                3:00 instead of 4:00. Thanks!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>John Doe</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I've sent the final files over to you for review. When
                                you're able to sign off of them let me know and we can discuss distribution.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts
                            <span class="badge badge-pill badge-warning">6 New</span>
                        </span>
                        <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">New Alerts:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-success">
                                <strong>
                                    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-danger">
                                <strong>
                                    <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-success">
                                <strong>
                                    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all alerts</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control search-top" type="text" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search" style="height: 24.4px"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="nav-link" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button style="background: none;border: none;color: gray;font-size: 16px" type="submit"> <i
                                class="fa fa-fw fa-sign-out"></i>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">@yield('page-title')</a>
                </li>
                <li class="breadcrumb-item active">@yield('page-sub-title')</li>
            </ol>
            @yield('page-content')
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © SUHIAB {{now()->format("Y")}}</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="#0">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('cms-styles/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cms-styles/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('cms-styles/vendor/jquery-easing/jquery.easing.min.j') }}s"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('cms-styles/vendor/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('cms-styles/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('cms-styles/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('cms-styles/vendor/jquery.magnific-popup.min.js') }}"></script>
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @yield('js')
</body>
<!-- Mirrored from www.ansonika.com/fooyes/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Aug 2022 09:05:37 GMT -->

</html>
