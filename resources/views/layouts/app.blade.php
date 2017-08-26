<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nerospi | Sommerlager 2017</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,400italic' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="app-layout">
<header role="banner">
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        @include('layouts.nav')
    </div>
</nav>
<h1>Nerospi</h1>
</header>

<main role="main">
<div class="container">
    @if(isset($title))
        <section class="page-title">
            <h1 class="page-title">{{ $title }}</h1>
        </section>
    @endif
    @if(Session::has('message') || Session::has('success'))
      <div class="alert alert-{{ Session::has('success') ? 'success' : (Session::has('message') ? 'warning' : '') }}">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ Session::has('message') ? Session::get('message') : Session::get('success') }}</strong>
      </div>
    @endif

    <section>
      @yield('content')
    </section>
</div>
</main>

<!-- JavaScripts -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
</body>
</html>
