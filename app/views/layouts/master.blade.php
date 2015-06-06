<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Custom Edible Photos and Prints">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>
      @yield('title')
    </title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="p:domain_verify" content="1a6d44c0afbcf1640ec7c2743dece864"/>

    <style>
.well{
    background: #ffefff url('http://bonkerzfuncentre.co.uk/wp-content/uploads/2012/01/background1.jpg') repeat-x top left; 
}

    </style>
  </head>

  <body>


  @include('partials._flash')

  @if(Auth::user())
    @if(Auth::user()->roles()->first()->name == 'admin')
     @include('layouts.admin_nav')
    @endif

  @else
 <!--  ('layouts.user_nav') -->
  
  @endif

       <div class="well">
      <div class="container">

        @yield('content')
     
      </div>
   </div>
    <div class="container">

      <footer>
        <center>
        <p>1227 Pasadena Ca, 91103 USA Gogo Cake LLC. &copy; Company 2014 Contact: (818) 310-3652 sales@gogocakes.com</p>
      </center>
      </footer>
    </div> <!-- /container -->

  


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  
  </body>
</html>

