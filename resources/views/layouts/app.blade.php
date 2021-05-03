<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @if(strpos(\Illuminate\Support\Facades\Route::current()->getPrefix(), 'admin'))
        <link href="{{asset('css/admin/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/styles.css')}}" rel="stylesheet">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <script src="{{asset('js/admin/html5shiv.min.js')}}"></script>
        <script src="{{asset('js/admin/respond.min.js')}}"></script>
    @else
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif

    @livewireStyles
</head>
<body>
    @if(strpos(\Illuminate\Support\Facades\Route::current()->getPrefix(), 'admin'))
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>Data</span>Labeling</a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{$user->name}}</div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <ul class="nav menu">
                <li><a href="/admin/dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li><a href="/admin/users"><em class="fa fa-users">&nbsp;</em> Users</a></li>
                <li><a href="/"><em class="fa fa-arrow-left">&nbsp;</em> To the app</a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <em class="fa fa-power-off">&nbsp;</em>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @else
        @include('layouts.navbar')
    @endif
    @if(\Auth::user())
        {{$slot}}
    @endif
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if(strpos(\Illuminate\Support\Facades\Route::current()->getPrefix(), 'admin'))
        <script src="{{asset('js/admin/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/admin/chart.min.js')}}"></script>
        <script src="{{asset('js/admin/chart-data.js')}}"></script>
        <script src="{{asset('js/admin/easypiechart.js')}}"></script>
        <script src="{{asset('js/admin/easypiechart-data.js')}}"></script>
        <script src="{{asset('js/admin/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/admin/custom.js')}}"></script>
    @endif
    <script>
        // import WaveSurfer from 'wavesurfer.js';
        console.log(WaveSurfer);
    </script>
    @livewireScripts
</body>
</html>
