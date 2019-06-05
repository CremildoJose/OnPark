<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


</head>
<body>
	<style type="text/css">
        body {
            margin: 10em;        
        }
        .container {
            margin: 10em;
        }
		.pad {
			padding: 2em;
			width: 350px;
			margin: 10em 25em;
		}

    .pad #login{
      height: 180px;
    }

    .pad .fix{
      padding: 4px;
    }

    .pad .fix input[type="text"]{
      margin:0.5px -1px;
    }

    .pad .fix input[type="password"]{
      margin:0.5px -1px;
    }

    .pad .fix input[type="submit"]{
      width: 5em
    }

    footer {
        text-align:center;    
    }
	</style>

    <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

	<div class="container">
    <div class="col-md-4 col-md-offset-4">
    <div id="login" class="well">
          <form class="form form-group" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="input-group fix form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <span class="input-group-addon glyphicon glyphicon-user"></span>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              
            </div>
            <div class=" input-group fix form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <span class="input-group-addon glyphicon glyphicon-lock"></span>
              <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="input-group fix">
              {!! Form::input('submit','login','Login', ['class' => 'btn btn-primary'])!!}
            </div>

          </form>
    </div>
    @if ($errors->has('email'))
                 <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
                 </span>
     @endif
    @if ($errors->has('password'))
                 <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
                 </span>
     @endif
    </div>    
        
    
</div>
      
     <footer>
        &copy; 2018 - ParkOn. Todos os direitos reservados
    </footer>

   <script type="text/javascript" src="js/bootstrap.js"></script>
   <script type="text/javascript" src="js/jquery.smooth-scroll.min.js"></script>
   <script src="/js/app.js"></script>
</body>
</html>
