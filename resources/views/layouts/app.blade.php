<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link href="{{ asset('css/flags.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">

    @if(trans('navbar.login')=="تسجيل الدخول")
    <link href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet">  
    @endif
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    


    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

                <ul style="list-style: none">

                </ul>

    <div id="app">
        <div class="container ">
          <div class="row">


            <div class="col-md-2 logo">
                @if(Auth::guest())
                    <a href="/"><img src="../images/logo.png"></a>
                @else
                    <img src="../images/logo.png">
                @endif
            </div>
            
            <nav class="navbar navbar-default navbar-static-top col-md-10 col-xs-10">
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->

                            @if(Auth::guest())
                                <li><a href="{{ route('login') }}">{{trans('navbar.login')}}</a></li>
                                <li><a href="{{ route('register') }}">{{trans('navbar.register')}}</a></li>
                                <li class="dropdown languaes-drop">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">          @if(trans('navbar.login')=="تسجيل الدخول")
                                            العربية
                                      @else
                                            English  
                                      @endif<span class="caret"></span></a>
                                      <ul class="dropdown-menu">
                                         <li>
                                             <a href="setlocale/en">
                                                 <img src="images/usa.png" class="flag flag-usa"/>
                                                 English
                                             </a>
                                         </li>
                                         <li>
                                             <a href="setlocale/ar">
                                                 <img src="images/egypt.png" class="flag flag-eg" />
                                                العربية
                                             </a>
                                         </li>  
                                      </ul>
                                </li>
                            @else

                                    <form action="/search" method="get" class="navbar-form navbar-left">

                                        <div class="input-group">
                                            <input type="text" id="search" placeholder="{{trans('navbar.search')}}" name="search" class="form-control">

                                            <!-- insert this line -->
                                            <span class="input-group-addon" style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                            <select name="purpose" class="form-control" id="selector">
                                                <option value="seeker">{{trans('navbar.Job Seeker')}}</option>
                                                <option value="company">{{trans('navbar.Companies')}}</option>
                                                <option value="jobs">{{trans('navbar.Jobs')}}</option>
                                                <option value="courses">{{trans('navbar.Courses')}}</option>

                                            </select>
                                        </div>
                                    </form>
                                
                                    @if(Auth::user()->type=="jobseeker")
                                        <li><a href="/seekerHome">{{trans('navbar.Home')}}</a></li>
                                        <li><a href="{{route('profile')}}">   
                                         <img data-name="{{Auth::user()->name}}" class="profile_nav" /> 
                                        {{substr(Auth::user()->name, 1)}}</a></li>
                                    @else
                                        <li><a href="/companyHome">{{trans('navbar.Home')}}</a></li>
                                        <li><a href="{{route('comprofile')}}">
                                         <img data-name="{{Auth::user()->name}}" class="profile_nav"/> 
                                        {{substr(Auth::user()->name, 1)}}</a></li>
                                    @endif 

                                        <li><a href="/getJobs">{{trans('navbar.Jobs')}}</a></li>
                                        <li><a href="/getCourses">{{trans('navbar.Training Course')}}</a></li>
                                        <li><a href="/contactForm">{{trans('navbar.Contact Us')}}</a></li>

                              
                                <li class="dropdown">
                                    
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret"></span>
                                    </a>
                                <ul class="dropdown-menu" role="menu">

                                   <li>
                                       <a href="setlocale/en">
                                           <img src="images/usa.png" class="flag flag-usa"/>
                                           English
                                       </a>
                                   </li>
                                   <li>
                                       <a href="setlocale/ar">
                                           <img src="images/egypt.png" class="flag flag-eg" />
                                          العربية
                                       </a>
                                   </li> 
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-key" aria-hidden="true"></i>{{trans('navbar.Logout')}}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>



                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
 </div>
     @if(count($errors)>0)

      <div class="col-md-12">
        <div class="alert alert-dangers">
          <ul>
          @foreach($errors->all() as $error)
               <li>{{$error}}</li> 
          @endforeach
          </ul>
        </div>
      </div> 
    @endif

    @if(session()->has('flash_notification.message'))
            <div class="alert alert-success text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('flash_notification.message')}}
            </div>
    @endif

         @yield('content')


        <footer>
            <div class="container">           
                <div class="row">
                

                    <div class="col-md-6 copyright">
                        <p>Powered by yourjob team &copy; {{Date('Y')}}</p>
                    </div>
                    <div class="col-md-6 social-media">
                        <a><i class="fa fa-facebook"></i></a>
                        <a><i class="fa fa-twitter"></i></a>
                        <a><i class="fa fa-google-plus"></i></a>                            
                        <a><i class="fa fa-linkedin"></i></a>
                    </div>        
                
                </div>
            </div>  
        </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{asset('js/jssor.slider-22.2.16.min')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/initial.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-formhelpers-languages.js') }}"></script>
    <script src="{{ asset('js/bootstrap-formhelpers-countries.ar.js') }}"></script>
    <script src="{{ asset('js/bootstrap-formhelpers-countries.en_US.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>


</body>
</html>
