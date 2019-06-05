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
		.pad {
			margin-top:100px;
            padding: -1px;
            
		}

    .pad #login{
      padding: 1.5em;
      margin: 1em;
      height:200px;
    }

    

    footer {
        text-align:center;    
    }
	</style>

    
	<div class="container">
    <div class="col-md-4 col-md-offset-4 pad">
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
