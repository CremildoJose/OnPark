<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Login - OnPark</title>
</head>
<body>

	<style type="text/css">
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

	<div class="pad container">

        <div id="login" class="well">
          <form role="form" method="POST" action="{{ url('/') }}" class="form form-group">
            <div class="input-group fix">
              <span class="input-group-addon glyphicon glyphicon-user"></span>
              {!!  Form::text('username', '', ['class'=>'form-control','placeholder'=>'Username...','required']) !!}
            </div>
            <div class=" input-group fix form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <span class="input-group-addon glyphicon glyphicon-lock"></span>
              {!!  Form::password('password', ['class'=>'form-control','placeholder'=>'Password...','required']) !!}
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="input-group fix">
              {!! Form::input('submit','login','Login', ['class' => 'btn btn-primary'])!!}
            </div>

          </form>
      </div>
      
     <footer>
        &copy; 2018 - ParkOn. Todos os direitos reservados
    </footer>

   <script type="text/javascript" src="js/bootstrap.js"></script>
   <script type="text/javascript" src="js/jquery.smooth-scroll.min.js"></script>
</body>
</html>
