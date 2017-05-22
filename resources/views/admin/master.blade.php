<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>



    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a href="/"><img src="../images/logo.png"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="/admin" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a data-target="#passModel" data-toggle="modal"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>               
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a  data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-1" class="collapse">
                            <li><a href="{{route('users')}}"><i class="fa fa-angle-double-right"></i> User</a></li>
                            <li><a href="{{route('jobseekers')}}"><i class="fa fa-angle-double-right"></i> JobSeekers</a></li>
                            <li><a href="{{route('companies')}}"><i class="fa fa-angle-double-right"></i> Companies</a></li>
                        </ul>
                    </li>
                    <li>
                        <a  data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  Companies' Activities <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-2" class="collapse">
                            <li><a href="{{route('jobs')}}"><i class="fa fa-angle-double-right"></i> Jobs</a></li>
                            <li><a href="{{route('courses')}}"><i class="fa fa-angle-double-right"></i> Courses</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Following</a></li>

                        </ul>
                    </li>
                    <li>
                        <a  data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-plus"></i> Seeker's Properties  <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-3" class="collapse">
                            <li><a href="{{route('skills')}}"><i class="fa fa-angle-double-right"></i> Skills</a></li>
                            <li><a href="{{route('languages')}}"><i class="fa fa-angle-double-right"></i> Languages</a></li>
                            <li><a href="{{route('availableLanguages')}}"><i class="fa fa-angle-double-right"></i> Available Languages</a></li>
                            <li><a href="{{route('experiences')}}"><i class="fa fa-angle-double-right"></i> Experience</a></li>
                            <li><a href="{{route('educations')}}"><i class="fa fa-angle-double-right"></i> Education</a></li>
                            <li><a href="{{route('certifications')}}"><i class="fa fa-angle-double-right"></i> Certifications</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Following</a></li>

                        </ul>
                    </li>
                    @if(Auth::user()->role=="super")
                    <li>
                        <a href="/admin/displayAdmins"><i class="fa fa-fw fa-paper-plane-o"></i> Admins </a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main" >
                        @yield('content')                
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div><!-- /#wrapper -->




    <!-- change admin password Modal -->
              <div class="modal fade" id="passModel" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Change Paswrod</h4>
                    </div>
                    <form action="/admin/ChangePassword" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="modal-body">
                          <div class="col-md-12">
                           <label for="Password">New Password </label>
                           <input type="Password"  id="password" name="newpassword" placeholder="New Password">
                          </div>

                          <div class="col-md-12">
                           <label for="Password">Confirm Password </label>
                           <input type="Password"  id="password" name="confpassword" placeholder="Cpnfirm Password">
                          </div>
                                                    
                      </div>
                      <div class="modal-footer">
                         <input type="submit" class="btn-info"  id="button" value="Add">
                      </div>
                  </form>
                </div>
              </div>
              </div>



  


        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{asset('js/jssor.slider-22.2.16.min')}}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/js.js') }}"></script>


</body>
</html>
