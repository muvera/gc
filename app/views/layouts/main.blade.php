<html>
<head>
	<meta charset="UTF-8">


		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/assets/img/favicon.png">
	<title>Gogo Cake </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
@yield('script')
</head>
<body>
  @include('layouts.admin_nav')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color:#fff5ff;">
       @include('partials._flash')
      <div class="container">

        @yield('content')
      </div>
    </div>

    <div class="container">


      <hr>

      <footer>
        <p>Gogo Cake LLC. &copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->

	
</body>
</html>