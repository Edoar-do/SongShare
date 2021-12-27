<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('titolo')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="{{ url('/')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/')}}/css/style.css?v=version2">
        <link rel="stylesheet" href="{{ url('/')}}/css/stile.css">
        <link rel="stylesheet" href="css/carousel.css?v=version2">
        <!-- jQuery e plugin JavaScript -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/js/myScript.js"></script>
    </head>

    <body>
        <div class='container'>
            <nav class="navbar navbar-default">
                <div class='container'>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img alt="Brand" src="{{ url('/') }}/img/logo.png" width="70" height="70">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('register') }}">@lang('labels.register')<span class="sr-only">(current)</span></a></li>
                            <li><a href="{{ route('aboutMe') }}">@lang('labels.whoWeAre')</a></li>
                            <li><a href="{{ route('musicSearch') }}">@lang('labels.searchMusic')</a></li>
                            <li><a href="{{ route('helpUs') }}">@lang('labels.helpUs')</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @auth
                            <li><a href="{{ route('song.index') }}"><i>{{ trans('labels.profile') }} {{ Auth::user()->name }}</i></a></li>
                            <li>
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ trans('labels.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> {{ trans('labels.login') }}</a></li>
                            @endauth
                        </ul>
                    </div>
            </nav>
            @yield('corpo')
        </div>
    </body>
</html>