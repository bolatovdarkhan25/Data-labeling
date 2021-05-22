<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @if(strpos(\Illuminate\Support\Facades\Route::current()->getPrefix(), 'admin') !== false)
        <link href="{{asset('css/admin/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/styles.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/admin.css')}}" rel="stylesheet">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <script src="{{asset('js/admin/html5shiv.min.js')}}"></script>
        <script src="{{asset('js/admin/respond.min.js')}}"></script>
    @else
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
{{--        <script src="{{ asset('js/main.js') }}"></script>--}}
        <script src="{{ asset('js/wavesurfer.js/dist/wavesurfer.js')}}"></script>
        <script src="{{ asset('js/wavesurfer.js/dist/plugin/wavesurfer.regions.js')}}"></script>
        <script src="{{ asset('js/wavesurfer.js/dist/plugin/wavesurfer.timeline.js') }}"></script>
{{--            <script src="https://unpkg.com/wavesurfer.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.min.js" integrity="sha512-mhqErQ0f2UqnbsjgKpM96XfxVjVMnXpszEXKmnJk8467vR8h0MpiPauil8TKi5F5DldQGqNUO/XTyWbQku22LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer-html-init.js" integrity="sha512-wpmZ0cB8mzQ9VAjgbKU52ETWXyOQszM50EDfEqs3NDxIozhOL0l0W8/L+fpD8T891mN1jzpoY3uRVtHrYJCWIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer-html-init.min.js" integrity="sha512-7mHuj5zcCeLhW2HryH9Vb89QRXQtGrY/KXiOEMVztqxPqBPBpx2kpgGM+696W+B14ka1BkD/nDH3RU4pEDjX1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.js" integrity="sha512-EzCbfC9iSPSt0JeHyoNvNn1xct9KkFg/1S4gdQRLX9T/gnj17zl+F9j3O0DIbRMvfHx0VQ85oF8ynTcDuvkTAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.cursor.js" integrity="sha512-3GTVwmKCcYb4SKQB3Vxw38k52DUMB5XgtJE/t5JaFBSW2tFfLe41WPPtVJPsMotpRdUdE5Uk9jfyC+IGDAAceA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.cursor.min.js" integrity="sha512-rLJ6OA56VhtUVZVG3TLklc3wfPzY/jwPPyGFatW46SVtSMF9RvD1rVsy7+SPQ62ZSlrWBWGHbW3vj54Ohu6cpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.elan.js" integrity="sha512-KAiYdyRk6NR5tKamDhVcE+qgJgUh2M7bb58cEiosxueyPRwhqLQUdhuZN1ywnyOasbqhRwQ1b+AUFPGwwIh6ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.elan.min.js" integrity="sha512-k6lkcvEX8fRNwGgXo1dLT+GFQQ9KJ9odT4funtj+Q0E+nbRm8S3TroxJGE4l/w4U5eMVNeuP2FI624YSxvyC0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.mediasession.js" integrity="sha512-SysAIdEgzxxN4BWpu0ZHXt5VVs10D5hAzzhn2KGCaB2GuKGcKLEL69+6qOsui3QbLCrWFpnq2MtB4wwBK/W5SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.mediasession.min.js" integrity="sha512-2Z7OACqEgxDRyI5X9R4RgC2KzciuYfRpzihZfkLCy6NH0QYEOXHUF9ZerGNwcUF0pjW+5OsAXOHSuMaGKltQIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.microphone.js" integrity="sha512-pNlB54UsIZsseAKz3wyA6WRIZw7FVhi7+E0E2Fd8vMKm/rNTQO1dSnHQQQTPcuuam93c+WTBke4uGnJYyz0gTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.microphone.min.js" integrity="sha512-0gRzVXiPKje8UuD8iv3Ahqk3ey9JKaQeQAucGjDDLBBcdxTK7TnBOm7+RmS6Lif/cSDZqMa1w5wB2o0533d89A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.minimap.js" integrity="sha512-yqJqt+kiL/eDmYWdOURMyev5+OQiu5xg4pN7LM/eXNiZGTGpD+irHh7rxR775yrRkYU/tsetwzcBkIyemt0BpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.minimap.min.js" integrity="sha512-r29nrLad6v1wf8S9oj0NvQWtE8+ZDrszGQ4d157PIr59vGfD1PE6+ff/1nKWqOig5ciEYPco6KkrA87Lk43aGQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.regions.js" integrity="sha512-D+ihz2gcGcwdgcgEKrMSSMZ8WdVaItkAyJIpTvEx5vOybQ4iPK++k520Zp5OfkEsoXrflAho/123Ax+EiG8uhA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/4.0.1/plugin/wavesurfer.regions.min.js" integrity="sha512-v0LlCenzxYcYH0iNUuTYlb+lIYM4/eodREgzd3DrhVbgF8aB1srzb4YCTe+IzCOR+98JFRZLcQO2dXqMXQ5jPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.spectrogram.js" integrity="sha512-TmNL0/E775i5/JfNJeyt525L+aBhRYSoGP5mB6xql0EIiQTHoxucXYs96zSM7Ro0859VySGVf4qhKO9mfxd+Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.spectrogram.min.js" integrity="sha512-WLgK4N4pNakKPTR8MpuTa0lot+VVrnblSmYj688/4Mht++sWgPitzrcuMhaqmul1zzKO7bNKIAuFBBr3Op08Hw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.timeline.js" integrity="sha512-zK0qPz1lCamDTy/b72VPWx107IPFowGjk/HZUWqK/w/Cg5v2vD1cCcrFCI7dTuPBSWaJmgLZ6HHI+/28fgl0HQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.timeline.min.js" integrity="sha512-19l1vkvyDE+ExCpA2yNsGX1xdKAaeZGsyCiI9TqVLAEDXgZNucBnVCbVFTDmmTp9PGJoNBNSo5PMWwGFPNnTKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer-html-init.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer-html-init.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.cursor.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.cursor.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.elan.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.elan.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.mediasession.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.mediasession.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.microphone.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.microphone.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.minimap.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.minimap.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.regions.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.regions.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.spectrogram.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.spectrogram.min.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.timeline.js.map"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/plugin/wavesurfer.timeline.min.js.map"></script>--}}
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif

    <link href="{{asset('css/admin/font-awesome.min.css')}}" rel="stylesheet">

    @livewireStyles
</head>
<body>
    @if(strpos(\Illuminate\Support\Facades\Route::current()->getPrefix(), 'admin') !== false)
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
                <li><a href="/admin/subscriptions"><em class="fa fa-star">&nbsp;</em> Subscriptions</a></li>
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
    @if(strpos(\Illuminate\Support\Facades\Route::current()->getPrefix(), 'admin') !== false)
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
        // console.log(WaveSurfer);
    </script>
    @livewireScripts
</body>
</html>
