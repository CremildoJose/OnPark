<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="./css/app.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="dashboard" class="navbar-brand">ParkOn</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="../help/">Ajuda</a>
            </li>
            <li>
              <a href="http://news.bootswatch.com">Sobre n&oacute;s</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Defini&ccedil;oes 
              <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="http://jsfiddle.net/bootswatch/9y480qo5/">Mudar Conta</a></li>
                <li class="divider"></li>
                <li><a href="./bootstrap.min.css">Log out</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
              <h2></h2>
              <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
              </ul>
            </div>
          </div>
        <div class="row">
          
           <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="list-group table-of-contents">
              <a class="list-group-item" href="dashboard">Dashboard</a>
              <a class="list-group-item" href="diario">Cliente Diario</a>
              <a class="list-group-item" href="#buttons">Cliente Mensal</a>
              <a class="list-group-item" href="#typography">Operador</a>
              <a class="list-group-item" href="espaco">Espaco</a>
              <a class="list-group-item" href="viatura">Viatura</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-9 col-sm-8">
             <div class="panel panel-default">
                <div class="panel-heading">@yield('heading')</div>
                <div class="panel-body">
                @yield('content')
                
                </div>
              </div>
          </div>
        
        </div>
      </div>
    <footer>
        &copy; 2018 - ParkOn. Todos os direitos reservados
    </footer>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
  </html>
