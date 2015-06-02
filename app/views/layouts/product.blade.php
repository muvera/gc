<html>
<head>
	<meta charset="UTF-8">


		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/favicon.png">
	    <title>
      @yield('title')
    </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

@yield('script')
</head>
<body>
  @include('partials._flash')
  @if(Auth::user())
    @if(Auth::user()->roles()->first()->name == 'admin')
  @include('layouts.admin_nav')
    @endif
  @endif
       
      
      <div class="well">
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