
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Marcel&marcel</title>

    <!-- Bootstrap core CSS -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,500" rel="stylesheet">

    <!-- Font awesome -->
    <!--<script src="https://use.fontawesome.com/2895d36a22.js"></script>-->

    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
    <link href="/css/nav.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">

    <!-- CSS Fonts -->
    <link rel="stylesheet" href="{{ voyager_asset('fonts/voyager/styles.css') }}">

    <!-- Dynamic styles for this template -->
    @stack('styles')


  </head>

  <body>

    @include('layouts.nav')

    @if($flash = session('message'))
        <div id="flash-message" class="alert alert-success" role="alert">
          
          {{ $flash }}

        </div>
    @endif

  	<div class="container main-content">
  		
  	 @yield ('content')

  	</div>

    @include ('layouts.footer')


  </body>


</html>

<!-- JQUERY -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
@stack('scripts')

