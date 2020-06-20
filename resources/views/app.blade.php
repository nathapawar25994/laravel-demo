<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>

    </style>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/login-theme/Login_v16/images/icons/favicon.ico') }}">
    <title>On Call Staffing Solutions</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/theme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Menu CSS -->
    <link href="{{ URL::asset('assets/css/sidebar-nav.min.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- Dropdown CSS -->
    <link href="{{ URL::asset('assets/css/dropdown.css') }}" rel="stylesheet" />
    <!-- fontawesome -->
    <link href="{{ URL::asset('assets/css/font-awesome.min.css') }}" id="theme" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ URL::asset('assets/css/default.css') }}" id="theme" rel="stylesheet">
    <!-- Sweet Alert -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
    <link href="{{ URL::asset('assets/sweetAlert/sweetalert.min.css') }}" id="" rel="stylesheet">
    <!-- BOOTSTRAP vALIDATION  -->
    <link href="{{ URL::asset('assets/BootstrapValidation/bootstrapValidator.min.css') }}" id="" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">


    <!-- <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @yield('header_scripts')
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{ route('dashboard') }}">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!-- This is dark logo icon<img src="{{ URL::asset('assets/login-theme/Login_v16/images/log1.png') }}" alt="home" class="dark-logo" /> -->
                            <!--This is light logo icon--><img src="{{ URL::asset('assets/login-theme/Login_v16/images/fav_icon.png') }}" alt="home" class="light-logo" style="display: none;"/>
                        </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!-- This is dark logo text<img src="{{ URL::asset('assets/login-theme/Login_v16/images/log.png') }}" alt="home" class="dark-logo" /> -->
                            <!--This is light logo text--><img src="{{ URL::asset('assets/login-theme/Login_v16/images/Sss1.png') }}" alt="home" class="light-logo" />
                        </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ URL::asset('assets/login-theme/Login_v16/images/varun.jpg') }}" alt="user-img" width="36" class="img-circle"> Profile
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{ route('dashboard') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="#" class="waves-effect dropdown-btn"><i class="fa fa-file fa-fw" aria-hidden="true"></i>Job</a>

                        <ul class="dropdown-container" id="side-menu">
                            <li>
                                <a href="{{ action('JobController@index') }}" class="waves-effect">Job List</a>
                            </li>
                            <li>
                                <a href="{{ action('JobController@create') }}" class="waves-effect">Add Job</a>
                            </li>

                        </ul>

                    </li>

                    <li>
                        <a href="#" class="waves-effect dropdown-btn"><i class="fa fa-file fa-fw" aria-hidden="true"></i>Job Category</a>

                        <ul class="dropdown-container" id="side-menu">
                            <li>
                                <a href="{{ action('JobCategoryController@index') }}" class="waves-effect">Job Category List</a>
                            </li>
                            <li>
                                <a href="{{ action('JobCategoryController@create') }}" class="waves-effect">Add Job Category</a>
                            </li>

                        </ul>

                    </li>

                    <li>
                        <a href="#" class="waves-effect dropdown-btn"><i class="fa fa-file fa-fw" aria-hidden="true"></i>Job Type</a>

                        <ul class="dropdown-container" id="side-menu">
                            <li>
                                <a href="{{ action('JobTypeController@index') }}" class="waves-effect">Job Type List</a>
                            </li>
                            <li>
                                <a href="{{ action('JobTypeController@create') }}" class="waves-effect">Add Job Type</a>
                            </li>

                        </ul>

                    </li>

                    <li>
                        <a href="#" class="waves-effect dropdown-btn"><i class="fa fa-file fa-fw" aria-hidden="true"></i>Refered From</a>

                        <ul class="dropdown-container" id="side-menu">
                            <li>
                                <a href="{{ action('ReferedFromController@index') }}" class="waves-effect">Refered From List</a>
                            </li>
                            <li>
                                <a href="{{ action('ReferedFromController@create') }}" class="waves-effect">Add Refered From</a>
                            </li>

                        </ul>

                    </li>


                    <li>
                        <a href="#" class="waves-effect dropdown-btn"><i class="fa fa-file fa-fw" aria-hidden="true"></i>Country/State/City</a>

                        <ul class="dropdown-container" id="side-menu">
                            <li>
                                <a href="{{ action('CountryController@index') }}" class="waves-effect">Country List</a>
                            </li>
                            <li>
                                <a href="{{ action('CountryController@create') }}" class="waves-effect">Add Country</a>
                            </li>

                            <li>
                                <a href="{{ action('StateController@index') }}" class="waves-effect">State List</a>
                            </li>
                            <li>
                                <a href="{{ action('StateController@create') }}" class="waves-effect">Add State</a>
                            </li>

                            <li>
                                <a href="{{ action('CityController@index') }}" class="waves-effect">City List</a>
                            </li>
                            <li>
                                <a href="{{ action('CityController@create') }}" class="waves-effect">Add City</a>
                            </li>
                        </ul>

                    </li>
                    <!-- <li>
                        <a href="#" class="waves-effect dropdown-btn"><i class="fa fa-gear fa-spin fa-fw" aria-hidden="true"></i>Settings</a>

                        <ul class="dropdown-container" id="side-menu">
                            <li>
                                <a href="{{ action('UserController@index') }}" class="waves-effect">Users</a>
                            </li>
                            <li>
                                <a href="{{ route('roles.index') }}" class="waves-effect">Roles</a>
                            </li>
                            <li>
                                <a href="{{ route('permissions.index') }}" class="waves-effect">Permissions</a>
                            </li>
                            <li>
                                <a href="{{ action('ProjectTypeController@index') }}" class="waves-effect">List Of Project Type</a>
                            </li>
                            <li>
                                <a href="{{ action('TechnologiesController@index') }}" class="waves-effect">List of technologies</a>
                            </li>
                            <li>
                                <a href="{{ action('DatabaseController@index') }}" class="waves-effect">List of Database</a>
                            </li>
                            <li>
                                <a href="{{ action('ServerController@index') }}" class="waves-effect">List of Server</a>
                            </li>
                        </ul>

                    </li> -->
                </ul>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        @yield('content')
        <footer class="footer text-center"> 2020 &copy; <a href="http://vishleshak.io" target="_blank">Vishleshak</a>. </footer>

        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/theme/jquery/jquery.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('assets/theme/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ URL::asset('assets/js/sidebar-nav.min.js') }}" type="text/javascript"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ URL::asset('assets/js/jquery.slimscroll.js') }}" type="text/javascript"></script>
    <!--Wave Effects -->
    <script src="{{ URL::asset('assets/js/waves.js') }}" type="text/javascript"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('assets/js/custom.min.js') }}" type="text/javascript"></script>
    <!-- Delete JavaScript -->
    <script src="{{ URL::asset('assets/js/delete.js') }}" type="text/javascript"></script>
    <!-- core js -->
    <script src="{{ URL::asset('assets/js/core.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/dropDown.js') }}" type="text/javascript"></script>
    <!-- Sweet Alert -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
    <script src="{{ URL::asset('assets/sweetAlert/sweetalert.min.js') }}" type="text/javascript"></script>
    <!-- BOOTSTRAP VALIDATION  -->
    <script src="{{ URL::asset('assets/BootstrapValidation/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script> -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    @yield('footer_scripts')

    @yield('footer_script_init')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>